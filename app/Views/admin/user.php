<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management | Fast Burgers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">


    <div class="flex h-screen">
        <!-- 侧边栏 -->
        <aside class="w-64 bg-black text-white flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-gray-800">
                <span class="text-indigo-400">Admin</span>Panel
            </div>
            <nav class="flex-1 p-4 space-y-3">
                <a href="/admin/users" class="block py-2 px-3 rounded hover:bg-gray-800">👥 Users</a>
                <a href="/admin/orders" class="block py-2 px-3 rounded hover:bg-gray-800">📦 Orders</a>
                <a href="#" class="block py-2 px-3 rounded hover:bg-gray-800">📈 Reports</a>
                <a href="#" class="block py-2 px-3 rounded hover:bg-gray-800">⚙️ Settings</a>
            </nav>
        </aside>

        <!-- 主内容区 -->
        <div class="flex-1 flex flex-col">
            <!-- 顶部栏 -->
            <header class="bg-white shadow flex justify-between items-center px-6 py-4">
                <h1 class="text-xl font-semibold">User Management</h1>

                <!-- 用户下拉菜单 -->
                <div class="relative">
                    <button onclick="toggleDropdown()" class="flex items-center space-x-2 bg-gray-100 px-3 py-2 rounded hover:bg-gray-200">
                        <span><?= htmlspecialchars($_SESSION['email']) ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- 下拉菜单 -->
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg z-50">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                        <hr>
                        <a href="/login" class="block px-4 py-2 hover:bg-gray-100 text-red-500">Logout</a>
                    </div>
                </div>
            </header>

            <!-- 主内容 -->
            <main class="flex-1 p-6 bg-white m-4 rounded-lg shadow">
                <h2 class="text-2xl font-semibold mb-4">All Users</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- 这里可以用 PHP 循环输出用户数据 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">1</td>
                                <td class="px-6 py-4 whitespace-nowrap">john.smith@email.com</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Customer</span></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">4</td>
                                <td class="px-6 py-4 whitespace-nowrap">alice.johnson@fastburgers.com</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Manager</span></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    
    <script>
        // 下拉菜单切换
        function toggleDropdown() {
            document.getElementById('dropdownMenu').classList.toggle('hidden');
        }
    </script>

</body>
</html>