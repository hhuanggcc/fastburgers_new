<?php
require_once '../config/database.php';

$errors = [];

// Ensure ID exists
if (!isset($_GET['id'])) {
    die("Order ID is required.");
}

$orderId = intval($_GET['id']);

// Load order
$stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
$stmt->bind_param("i", $orderId);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

if (!$order) {
    die("Order not found.");
}

// Handle POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $payment_method = trim($_POST['payment_method']);
    $status         = trim($_POST['status']);
    $order_total    = trim($_POST['order_total']);

    // VALIDATION
    $validPayments = ['cash', 'card'];
    $validStatus   = ['pending', 'paid'];

    if (!in_array(strtolower($payment_method), $validPayments)) {
        $errors[] = "Payment method must be Cash or Card.";
    }

    if (!in_array(strtolower($status), $validStatus)) {
        $errors[] = "Status must be Pending or Paid.";
    }

    if (!is_numeric($order_total)) {
        $errors[] = "Order total must be numeric.";
    } elseif ($order_total < 0) {
        $errors[] = "Order total cannot be negative.";
    }

    // If no errors → update
    if (count($errors) === 0) {
        $stmt = $conn->prepare("
            UPDATE orders
            SET payment_method = ?, status = ?, order_total = ?
            WHERE order_id = ?
        ");
        $stmt->bind_param("ssdi", $payment_method, $status, $order_total, $orderId);

        if ($stmt->execute()) {
            header("Location: /orders?updated=1");
            exit;
        } else {
            $errors[] = "Failed to update order. Please try again.";
        }
    }
}
?>

<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Order</h1>

    <?php if (!empty($errors)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="">
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Order ID</label>
                <input type="text"
                       value="<?= htmlspecialchars($order['order_id']) ?>"
                       class="w-full border rounded-lg px-3 py-2 bg-gray-100"
                       readonly>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Ordered At</label>
                <input type="text"
                       value="<?= htmlspecialchars($order['order_datetime']) ?>"
                       class="w-full border rounded-lg px-3 py-2 bg-gray-100"
                       readonly>
            </div>

            <!-- Payment dropdown -->
            <div class="mb-4">
                <label for="payment_method" class="block text-sm font-medium mb-2">Payment Method</label>
                <select id="payment_method" name="payment_method" class="w-full border rounded-lg px-3 py-2">
                    <option value="cash" <?= (($_POST['payment_method'] ?? $order['payment_method']) === 'cash') ? 'selected' : '' ?>>Cash</option>
                    <option value="card" <?= (($_POST['payment_method'] ?? $order['payment_method']) === 'card') ? 'selected' : '' ?>>Card</option>
                </select>
            </div>

            <!-- Status dropdown -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium mb-2">Status</label>
                <select id="status" name="status" class="w-full border rounded-lg px-3 py-2">
                    <option value="pending" <?= (($_POST['status'] ?? $order['status']) === 'pending') ? 'selected' : '' ?>>Pending</option>
                    <option value="paid" <?= (($_POST['status'] ?? $order['status']) === 'paid') ? 'selected' : '' ?>>Paid</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="order_total" class="block text-sm font-medium mb-2">Total (£)</label>
                <input type="number"
                       step="0.01"
                       id="order_total"
                       name="order_total"
                       value="<?= htmlspecialchars($_POST['order_total'] ?? $order['order_total']) ?>"
                       class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Update Order
                </button>

                <a href="/orders"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
