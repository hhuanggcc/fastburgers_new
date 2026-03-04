<?php

?>

<!-- HERO SECTION (no header included) -->
<section class="relative w-full min-h-[90vh] flex items-center justify-center px-6 lg:px-16">

  <!-- Background image -->
  <div
    class="absolute inset-0 bg-cover bg-center"
    style="background-image: url('https://plus.unsplash.com/premium_photo-1695762436987-1cf827e5f1dd?w=1200&auto=format&fit=crop&q=80');">
  </div>

  <!-- Dark overlay -->
  <div class="absolute inset-0 bg-black/50"></div>

  <!-- Hero content -->
  <div class="relative z-10 text-center text-white max-w-2xl">
    <h1 class="text-4xl md:text-6xl font-bold leading-tight">
      Welcome to FastBurgers
    </h1>

    <p class="mt-4 text-lg md:text-xl text-gray-200">
      Freshly grilled burgers, unforgettable taste.
    </p>

    <div class="mt-8 flex justify-center gap-4">
      <a
  href="/menu"
  class="px-6 py-3 bg-red-500 hover:bg-red-600 rounded-lg text-lg font-semibold transition">
  View Menu
</a>

      <a
        href="/contact"
        class="px-6 py-3 border border-white rounded-lg text-lg font-semibold hover:bg-white hover:text-black transition">
        Contact Us
      </a>
    </div>
  </div>

</section>


