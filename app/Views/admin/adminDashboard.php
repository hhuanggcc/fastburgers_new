<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-md">
    <div class="p-6 font-bold text-purple-700 text-2xl">AdminPanel</div>
    <nav class="mt-8">
      <a href="/admin-dashboard" class="block py-3 px-6 text-gray-700 hover:bg-purple-100">Dashboard</a>
      <a href="/customers" class="block py-3 px-6 text-gray-700 hover:bg-purple-100">Customers</a>
      <a href="/orders" class="block py-3 px-6 text-gray-700 hover:bg-purple-100">Orders</a>
      <a href="/products" class="block py-3 px-6 text-gray-700 hover:bg-purple-100">Products</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">
    <!-- Top Navbar -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-purple-700">Dashboard</h1>
      <div class="flex items-center gap-4">
        <div class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold">
          <?= strtoupper(substr($_SESSION['staff']['name'] ?? 'A', 0, 1)) ?>
        </div>
      </div>
    </header>

    <!-- Content -->
    <main class="p-6 space-y-6">

      <!-- Stats Cards -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="text-sm text-gray-500">Total customers</p>
          <h2 class="text-3xl font-bold text-purple-700 mt-2"><?= $totalCustomers ?></h2>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="text-sm text-gray-500">Revenue</p>
          <h2 class="text-3xl font-bold text-green-600 mt-2">£<?= number_format($totalRevenue, 2) ?></h2>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="text-sm text-gray-500">Total Orders</p>
          <h2 class="text-3xl font-bold text-blue-600 mt-2"><?= $totalOrders ?></h2>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="text-sm text-gray-500">Top staff member</p>
          <p class="text-md text-gray-600"><?= $topStaffName ?></p>
          <h2 class="text-3xl font-bold text-red-500 mt-2"><?= $topStaffOrders ?></h2>
        </div>
      </div>

      <!-- BEST TABLE: Recent Orders (real data) -->
      <div class="bg-white rounded-lg shadow-md">
        <div class="p-4 border-b font-bold text-purple-700">Recent Orders</div>
        <table class="w-full text-left">
          <thead class="bg-purple-50">
            <tr>
              <th class="p-4">Order ID</th>
              <th class="p-4">Customer</th>
              <th class="p-4">Taken By</th>
              <th class="p-4">Total</th>
              <th class="p-4">Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($recentOrders)): ?>
              <?php foreach ($recentOrders as $order): ?>
              <tr class="border-t">
                <td class="p-4">#<?= htmlspecialchars($order['order_id']) ?></td>
                <td class="p-4"><?= htmlspecialchars($order['customer_first_name'] . ' ' . $order['customer_last_name']) ?></td>
                <td class="p-4"><?= htmlspecialchars($order['staff_first_name'] . ' ' . $order['staff_last_name']) ?></td>
                <td class="p-4">£<?= number_format($order['order_total'], 2) ?></td>
                <td class="p-4"><?= htmlspecialchars($order['order_datetime']) ?></td>
              </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="p-4 text-center">No recent orders</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Action Buttons -->
      <div class="bg-white p-6 rounded-lg shadow-md grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="/orders" class="bg-purple-600 text-white py-3 rounded-lg shadow hover:bg-purple-700 text-center">View All Orders</a>
        <a href="/customers" class="bg-blue-600 text-white py-3 rounded-lg shadow hover:bg-blue-700 text-center">View Customers</a>
        <a href="/products" class="bg-green-600 text-white py-3 rounded-lg shadow hover:bg-green-700 text-center">Manage Products</a>
        <a href="/logout" class="bg-red-600 text-white py-3 rounded-lg shadow hover:bg-red-700 text-center">Logout</a>
      </div>

      <!-- KEEP YOUR ADMIN PROFILE SECTION -->
      <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-6">
        <img src="https://i.pravatar.cc/100" alt="Profile" class="w-20 h-20 rounded-full shadow">
        <div>
          <h3 class="text-xl font-bold text-purple-700"><?= $_SESSION['staff']['name'] ?? 'Admin User' ?></h3>
          <p class="text-gray-500">Administrator</p>
          <button class="mt-2 bg-purple-600 text-white px-4 py-2 rounded-lg shadow hover:bg-purple-700">Edit Profile</button>
        </div>
      </div>

    </main>

    <footer class="bg-white p-4 text-center text-sm text-gray-400 border-t">
      © 2025 Fast Burgers Admin. All rights reserved.
    </footer>
  </div>
</div>