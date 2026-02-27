<?php
// Optional: show errors if set
$errors = $errors ?? [];
?>

<!-- Full-page background section -->
<div class="relative min-h-screen overflow-hidden">

  <!-- Background image -->
  <img
    src="https://thumbs.dreamstime.com/b/unhealthy-fast-food-delivery-menu-featuring-assorted-burgers-cheeseburgers-nuggets-french-fries-soda-high-calorie-low-356045884.jpg"
    alt="Burger background"
    class="absolute inset-0 w-full h-full object-cover"
  />

  <!-- Dark overlay -->
  <div class="absolute inset-0 bg-black/60"></div>

  <!-- Centered registration card -->
  <div class="relative z-10 min-h-screen flex items-center justify-center px-4">
    <div class="w-96 backdrop-blur-lg bg-opacity-80 rounded-lg shadow-lg p-8 bg-gray-900 text-white">
      <h2 class="text-2xl font-bold mb-6 text-center">Sign Up</h2>

      <!-- Display errors -->
      <?php if (!empty($errors)): ?>
        <div class="mb-5 rounded border border-red-500 bg-red-100 text-red-800 px-4 py-3">
          <ul class="list-disc pl-5">
            <?php foreach ($errors as $err): ?>
              <li><?= htmlspecialchars($err) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <!-- Registration form -->
      <form method="POST" action="" class="space-y-4">
        <div class="mb-4">
          <label for="first_name" class="block mb-2 text-sm font-medium">First Name</label>
          <input
            type="text"
            id="first_name"
            name="first_name"
            required
            class="bg-gray-100 text-gray-900 text-sm rounded-lg w-full py-2.5 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          >
        </div>

        <div class="mb-4">
          <label for="last_name" class="block mb-2 text-sm font-medium">Last Name</label>
          <input
            type="text"
            id="last_name"
            name="last_name"
            required
            class="bg-gray-100 text-gray-900 text-sm rounded-lg w-full py-2.5 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          >
        </div>

        <div class="mb-4">
          <label for="phone" class="block mb-2 text-sm font-medium">Phone (Optional)</label>
          <input
            type="tel"
            id="phone"
            name="phone"
            placeholder="Optional"
            class="bg-gray-100 text-gray-900 text-sm rounded-lg w-full py-2.5 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          >
        </div>

        <div class="mb-4">
          <label for="email" class="block mb-2 text-sm font-medium">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            required
            class="bg-gray-100 text-gray-900 text-sm rounded-lg w-full py-2.5 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          >
        </div>

        <div class="mb-4">
          <label for="password" class="block mb-2 text-sm font-medium">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            required
            minlength="8"
            class="bg-gray-100 text-gray-900 text-sm rounded-lg w-full py-2.5 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          >
        </div>

        <button
          type="submit"
          class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2.5 rounded-lg text-lg transition-colors"
        >
          Register
        </button>
      </form>

      <p class="mt-4 text-center text-gray-300 text-sm">
        Already have an account? <a href="/login" class="text-purple-400 hover:underline">Login here</a>
      </p>
    </div>
  </div>
</div>