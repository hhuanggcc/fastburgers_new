<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Products</h1>

    <div class="bg-white rounded-lg shadow p-6">
        <?php if (!empty($products)): ?>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-3">ID</th>
                            <th class="text-left p-3">Product Name</th>
                            <th class="text-left p-3">Category</th>
                            <th class="text-left p-3">Menu</th>
                            <th class="text-left p-3">Outlet</th>
                            <th class="text-left p-3">Price</th>
                            <!-- NEW STOCK COLUMN -->
                            <th class="text-left p-3">Current Stock</th>
                            <th class="text-left p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $item): ?>
                            <tr class="border-b">
                                <td class="p-3"><?= htmlspecialchars($item['product_id']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($item['product_name']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($item['category']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($item['menu_name']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($item['outlet_name']) ?></td>
                                <td class="p-3">£<?= number_format((float)$item['price'], 2) ?></td>
                                <!-- SHOW STOCK QUANTITY -->
                                <td class="p-3 font-bold">
                                    <?= htmlspecialchars($item['current_quantity']) ?>
                                </td>
                                <td class="p-3">
                                    <button class="bg-blue-500 text-white px-3 py-1 rounded">Update</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>
</div>