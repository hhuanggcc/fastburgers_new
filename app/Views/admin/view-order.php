<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Order Details</h1>

    <?php if (!empty($order)): ?>

        <!-- ORDER SUMMARY -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p><strong>Order ID:</strong> <?= htmlspecialchars($order['order_id']) ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($order['status']) ?></p>
                    <p><strong>Order Date:</strong> <?= htmlspecialchars($order['order_datetime']) ?></p>
                </div>

                <div>
                    <p><strong>Total Amount:</strong> £<?= number_format($order['order_total'], 2) ?></p>
                    <p><strong>Payment Method:</strong> <?= htmlspecialchars($order['payment_method']) ?></p>
                    <p><strong>Staff:</strong> <?= htmlspecialchars($order['staff_first_name'] . ' ' . $order['staff_last_name']) ?></p>
                </div>
            </div>
        </div>

        <!-- CUSTOMER INFO -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Customer Information</h2>

            <p><strong>Name:</strong> <?= htmlspecialchars($customer['cust_first_name'] . ' ' . $customer['cust_last_name']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($customer['email']) ?></p>
            <p><strong>Phone:</strong> <?= htmlspecialchars($customer['phone']) ?></p>
        </div>

        <!-- ORDER ITEMS -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Items</h2>

            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="text-left p-3">Product</th>
                        <th class="text-left p-3">Category</th>
                        <th class="text-left p-3">Qty</th>
                        <th class="text-left p-3">Price</th>
                        <th class="text-left p-3">Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($items as $item): ?>
                        <tr class="border-b">
                            <td class="p-3"><?= htmlspecialchars($item['product_name']) ?></td>
                            <td class="p-3"><?= htmlspecialchars($item['category']) ?></td>
                            <td class="p-3"><?= htmlspecialchars($item['quantity']) ?></td>
                            <td class="p-3">£<?= number_format($item['paid_price'], 2) ?></td>
                            <td class="p-3">£<?= number_format($item['paid_price'] * $item['quantity'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="text-right mt-4">
                <a href="/orders" class="bg-gray-600 text-white px-4 py-2 rounded">Back to Orders</a>
            </div>
        </div>

    <?php else: ?>
        <p class="text-red-600">Order not found.</p>
    <?php endif; ?>
</div>
