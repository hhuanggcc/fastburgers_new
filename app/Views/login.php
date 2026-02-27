<?php

?>

<!-- Full-page background section -->
<div class="relative min-h-screen overflow-hidden">

  <!-- Background image -->
  <img
    src="https://media.istockphoto.com/id/1154731746/photo/cheeseburger-with-cola-and-french-fries.jpg?s=612x612&w=0&k=20&c=DfuI7KyMDIF8_JH66oAhIZLOgL4RRXulfv24PQ5vTEo="
    alt="Burger background"
    class="absolute inset-0 w-full h-full object-cover"
  />

  <!-- Dark overlay -->
  <div class="absolute inset-0 bg-black/60"></div>

  <!-- Centered content -->
  <div class="relative z-10 min-h-screen flex items-center justify-center px-4">

    <!-- Login card -->
    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md">
      <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">
        Login
      </h1>

     <!-- Error Messages -->
        <?php if (!empty($errors)): ?>
          <div class="mb-4 rounded bg-red-100 p-3 text-sm text-red-700">
            <ul class="list-disc pl-4">
              <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <!-- FORM START -->
        <form method="POST" action="" class="space-y-4">

          <input
            type="email"
            name="email"
            placeholder="Email address"
            required
            class="w-full rounded-md bg-[#E9EFF6] p-2.5 placeholder:text-[#000000]"
            style="box-shadow:rgb(0 0 0 / 21%) 0px 7px 5px 0px" />

          <input
            type="password"
            name="password"
            placeholder="Password"
            required
            class="w-full rounded-md bg-[#E9EFF6] p-2.5 placeholder:text-[#000000]"
            style="box-shadow:rgb(0 0 0 / 21%) 0px 7px 5px 0px" />

          <div class="pt-2">
            <span
              class="ml-2 cursor-pointer text-[10px] text-[#228CE0] hover:underline">
              Forget Password?
            </span>
          </div>

          <div class="flex justify-center">
            <button
              type="submit"
              class="h-10 w-full cursor-pointer rounded-md bg-gradient-to-br from-[#7336FF] to-[#3269FF] text-white shadow-md shadow-blue-950">
              Sign In
            </button>
          </div>

        </form>
        <!-- FORM END -->

        <div class="mt-4 text-center text-[#969696]">
          Don't have an account?
          <a href="/register"
             class="cursor-pointer text-[#7337FF] hover:underline">
            Sign up
          </a>
        </div>

      </div>
    </div>
  </div>
</div>