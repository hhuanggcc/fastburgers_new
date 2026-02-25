<?php

?>

<section class="relative min-h-[80vh] flex items-center px-4 md:px-8 lg:px-16">

  <!-- Background image -->
  <img
    src="https://static.vecteezy.com/system/resources/thumbnails/037/236/579/small/ai-generated-beautuful-fast-food-background-with-copy-space-free-photo.jpg"
    alt="Fast food background"
    class="absolute inset-0 w-full h-full object-cover"
  />

  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/50"></div>

  <!-- Content -->
  <div class="relative z-10 w-full max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2">

    <!-- LEFT SIDE: Contact Form -->
    <div class="bg-gray-900/85 p-6 md:p-8 rounded-xl shadow-lg text-white">

      <h2 class="text-2xl font-semibold mb-5 text-center">
        Contact Us
      </h2>

      <form class="space-y-4">
        <div>
          <label class="block mb-1 text-sm text-gray-300">Name</label>
          <input
            type="text"
            placeholder="John Doe"
            class="w-full px-3 py-2 bg-gray-800 text-sm text-white rounded-md border border-gray-700 outline-none focus:ring-2 focus:ring-red-500"
          />
        </div>

        <div>
          <label class="block mb-1 text-sm text-gray-300">
            Email <span class="text-xs">(Required)</span>
          </label>
          <input
            type="email"
            placeholder="john@mail.com"
            class="w-full px-3 py-2 bg-gray-800 text-sm text-white rounded-md border border-gray-700 outline-none focus:ring-2 focus:ring-red-500"
          />
        </div>

        <div>
          <label class="block mb-1 text-sm text-gray-300">Phone</label>
          <input
            type="tel"
            placeholder="Phone Number"
            class="w-full px-3 py-2 bg-gray-800 text-sm text-white rounded-md border border-gray-700 outline-none focus:ring-2 focus:ring-red-500"
          />
        </div>

        <div>
          <label class="block mb-1 text-sm text-gray-300">
            Message <span class="text-xs">(Required)</span>
          </label>
          <textarea
            placeholder="Write message..."
            class="w-full px-3 py-2 bg-gray-800 text-sm text-white rounded-md border border-gray-700 outline-none focus:ring-2 focus:ring-red-500 h-24"
          ></textarea>
        </div>

        <button
          type="submit"
          class="w-full bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-2.5 rounded-md transition"
        >
          SEND
        </button>
      </form>
    </div>

    <!-- RIGHT SIDE: empty -->
    <div class="hidden md:block"></div>

  </div>
</section>
