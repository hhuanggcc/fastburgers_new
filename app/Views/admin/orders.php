// menu.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark:bg-rose-100/30 bg-[#1b1b1b]">

<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- PAGE TITLE -->
    <h2 class="text-3xl lg:text-5xl text-center font-serif font-semibold mb-12 dark:text-black text-white">
        Choose Your Best Food
    </h2>

    <!-- ================= MAIN MENU ================= -->
    <h3 class="text-2xl font-semibold mb-2 dark:text-black text-white">
        Main Menu
    </h3>
    <p class="text-sm mb-8 text-gray-300 dark:text-gray-700">
        Includes regular items and breakfast (available until 11:00 AM)
    </p>

    <!-- MAIN MENU GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">

        <!-- ITEM 1 -->
        <div class="flex flex-col rounded-lg shadow-lg dark:bg-white bg-[#262525]">
            <img class="w-full h-40 object-cover rounded-t-lg"
                 src="https://img.freepik.com/premium-photo/beef-burger-wooden-board-with-french-fries_23-2148290643.jpg"
                 alt="Burger">

            <div class="p-4">
                <h4 class="text-xl font-semibold dark:text-black text-white">
                    Classic Burger
                </h4>
                <p class="text-gray-300 dark:text-gray-700 mb-4">
                    flame-grilled Aberdeen Angus Beef burger
                </p>
                <p class="text-lg font-bold text-rose-600 mb-3">
                    £9.50
                </p>
                <button class="text-rose-700 font-bold border border-gray-500 rounded-full px-4 py-2">
                    Order Now
                </button>
            </div>
        </div>

        <!-- ITEM 2 -->
        <div class="flex flex-col rounded-lg shadow-lg dark:bg-white bg-[#262525]">
            <img class="w-full h-40 object-cover rounded-t-lg"
                 src="https://editor.danishcrown.com/media/oc0j5shw/crispy-chicken-cheeseburger_1920x1080px.jpg?width=1344&height=840&v=1dbd52b53c4ad70&rmode=contain&format=jpeg&quality=75&autoorient=true"
                 alt="Chicken">

            <div class="p-4">
                <h4 class="text-xl font-semibold dark:text-black text-white">
                    Chicken Burger
                </h4>
                <p class="text-gray-300 dark:text-gray-700 mb-4">
                    Crispy juicy fried chicken with homemade mayo
                </p>
                <p class="text-lg font-bold text-rose-600 mb-3">
                    £9.00
                </p>
                <button class="text-rose-700 font-bold border border-gray-500 rounded-full px-4 py-2">
                    Order Now
                </button>
            </div>
        </div>

        <!-- BREAKFAST ITEM -->
        <div class="flex flex-col rounded-lg shadow-lg dark:bg-white bg-[#262525]">
            <img class="w-full h-40 object-cover rounded-t-lg"
                 src="https://t3.ftcdn.net/jpg/18/90/44/88/360_F_1890448898_Sc7RECh8Qz5UmdNeuWFfW0MUW7gIPMWi.jpg"
                 alt="Breakfast Burger">

            <div class="p-4">
                <h4 class="text-xl font-semibold dark:text-black text-white">
                    Breakfast Burger
                </h4>
                <p class="text-gray-300 dark:text-gray-700 mb-4">
                    Egg, bacon & cheese
                </p>
                <p class="text-lg font-bold text-rose-600 mb-3">
                    £4.20
                </p>
                <button class="text-rose-700 font-bold border border-gray-500 rounded-full px-4 py-2">
                    Order Now
                </button>
            </div>
        </div>

    </div>

    <!-- ================= SAVERS + DRINKS (SAME SIZE AS MAIN MENU) ================= -->
    <!-- Single 3-column grid for both sections -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- SAVERS MENU (occupies 1 column) -->
        <div>
            <h3 class="text-2xl font-semibold mb-6 dark:text-black text-white">
                Savers Menu
            </h3>
            <!-- SAVERS ITEM (NOT AVAILABLE) -->
            <div class="relative flex flex-col rounded-lg shadow-lg dark:bg-white bg-[#262525] opacity-60 pointer-events-none">
                <!-- OVERLAY -->
                <div class="absolute inset-0 bg-black/70 flex items-center justify-center rounded-lg z-10">
                    <span class="text-white text-xl font-bold uppercase">
                        Not Available
                    </span>
                </div>
                <img class="w-full h-40 object-cover rounded-t-lg"
                     src="https://images.unsplash.com/photo-1550547660-d9450f859349"
                     alt="Saver Burger">
                <div class="p-4">
                    <h4 class="text-xl font-semibold dark:text-black text-white">
                        Saver Burger
                    </h4>
                    <p class="text-gray-300 dark:text-gray-700 mb-4">
                        Limited time offer
                    </p>
                    <button class="text-rose-700 font-bold border border-gray-500 rounded-full px-4 py-2">
                        Order Now
                    </button>
                </div>
            </div>
        </div>

        <!-- DRINKS MENU (occupies 1 column, same size as Savers) -->
        <div>
            <h3 class="text-2xl font-semibold mb-6 dark:text-black text-white">
                Drinks
            </h3>
            <!-- DRINK ITEM -->
            <div class="flex flex-col rounded-lg shadow-lg dark:bg-white bg-[#262525]">
                <img class="w-full h-40 object-cover rounded-t-lg"
                     src="https://static.wixstatic.com/media/8f1abd_80bf432a005041b59c2a7fa1960ce71e~mv2.jpeg/v1/fill/w_8499,h_3727,al_c,q_90/8f1abd_80bf432a005041b59c2a7fa1960ce71e~mv2.jpeg"
                     alt="Soft Drink">
                <div class="p-4">
                    <h4 class="text-xl font-semibold dark:text-black text-white">
                        Soft Drink
                    </h4>
                    <p class="text-gray-300 dark:text-gray-700 mb-4">
                        Chilled carbonated beverage
                    </p>
                    <button class="text-rose-700 font-bold border border-gray-500 rounded-full px-4 py-2">
                        Order Now
                    </button>
                </div>
            </div>
        </div>

        <!-- EMPTY COLUMN (to maintain 3-column grid, same as Main Menu) -->
        <div class="hidden lg:block"></div>
    </div>

</div>

</body>
</html>