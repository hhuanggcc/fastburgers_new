<?php

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
<div class="min-h-screen flex items-center justify-center bg-gray-800">
  <div class="w-96 backdrop-blur-lg bg-opacity-80 rounded-lg shadow-lg p-5 bg-gray-900 text-white">
    <h2 class="text-2xl font-bold pb-5">SignUp</h2>

    <form>
      <div class="mb-4">
          <label for="cust_first_name" class="block mb-2 text-sm font-medium">First Name</label>
          <input
            type="text"
            id="cust_first_name"
            name="cust_first_name"
            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
            
            required
          >
        </div>
        <div class="mb-4">
          <label for="cust_last_name" class="block mb-2 text-sm font-medium">Last Name</label>
          <input
            type="text"
            id="cust_last_name"
            name="cust_last_name"
            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
            
            required
          >
        </div>
        <div class="mb-4">
          <label for="customer_phoneNo" class="block mb-2 text-sm font-medium">Phone Number</label>
          <input
            type="tel"
            id="customer_phoneNo"
            name="customer_phoneNo"
            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
            
          >
        </div>
        <div class="mb-4">
          <label for="customer_email" class="block mb-2 text-sm font-medium">Your email</label>
          <input
            type="email"
            id="email"
            name="email"
            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
            placeholder="john@mail.com"
            required
          >
        </div>
        <div class="mb-4">
          <label for="password" class="block mb-2 text-sm font-medium">Your password</label>
          <input
            type="password"
            id="password"
            name="password"
            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full py-2.5 px-4"
            placeholder="*********"
            required
          >
        </div>
        <div class="flex items-center justify-between mb-4">
          <button
            type="submit"
            class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 px-5 w-full sm:w-auto"
          >
            Register
        </button>
      </div>
    </form>
  </div>
</div>

 <script>
      function signUpForm() {
        return {
          form: {
            first_name: "",
            last_name: "",
            phone: "",
            email: "",
            password: "",
          },
          showPwd: false,
          isLoading: false,

          init() {
            // Optional: light phone mask (keeps it flexible)
            if (this.$refs.phoneInput) {
              IMask(this.$refs.phoneInput, {
                mask: [
                  { mask: "+{44} 0000 000000" },
                  { mask: "00000 000000" },
                  { mask: "0000 000 0000" },
                  { mask: "000000000000000" }, // fallback digits
                ],
              });
            }
          },
        };
      }
    </script>
