<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Online Customers</h1>

    <div class="bg-white rounded-lg shadow p-6">
        <?php if (!empty($customers)): ?>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-3">ID</th>
                            <th class="text-left p-3">Full Name</th>
                            <th class="text-left p-3">Phone</th>
                            <th class="text-left p-3">Email</th>
                            <th class="text-left p-3">Total Orders</th>
                            <th class="text-left p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $cust): ?>
                            <tr class="border-b">
                                <td class="p-3"><?= htmlspecialchars($cust['customer_id']) ?></td>
                                <td class="p-3">
                                    <?= htmlspecialchars($cust['cust_first_name'] . ' ' . $cust['cust_last_name']) ?>
                                </td>
                                <td class="p-3"><?= htmlspecialchars($cust['customer_phoneNo']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($cust['email']) ?></td>
                                <td class="p-3 font-bold text-blue-600">
                                    <?= htmlspecialchars($cust['total_orders']) ?>
                                </td>
                                 <!-- ACTION BUTTONS -->
                                <td class="p-3">
                                    <div class="flex gap-2">
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1.5 rounded-lg">
                                            Edit
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1.5 rounded-lg">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No online customers found.</p>
        <?php endif; ?>
    </div>
</div>