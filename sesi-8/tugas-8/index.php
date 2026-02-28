<?php
include "connection.php";

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? 'all';
$sort = $_GET['sort'] ?? 'default';

$sql = "SELECT * FROM products WHERE 1=1";

// SEARCH
if (!empty($search)) {
    $searchSafe = $conn->real_escape_string($search);
    $sql .= " AND name LIKE '%$searchSafe%'";
}

// CATEGORY
if ($category !== 'all') {
    $categorySafe = $conn->real_escape_string($category);
    $sql .= " AND category = '$categorySafe'";
}

// SORT
if ($sort === 'low') {
    $sql .= " ORDER BY price ASC";
} elseif ($sort === 'high') {
    $sql .= " ORDER BY price DESC";
}

$result = $conn->query($sql);

$categoryColors = [
    "Shirt" => "bg-indigo-100 text-indigo-700",
    "Pants" => "bg-blue-100 text-blue-700",
    "Shoes" => "bg-green-100 text-green-700",
    "Outerwear" => "bg-purple-100 text-purple-700",
    "Dress" => "bg-rose-100 text-rose-700",
    "Accessories" => "bg-amber-100 text-amber-700",
    "Others" => "bg-gray-100 text-gray-700"
];

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/svg+xml" href="./img/logo-vertical.webp">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <style type="text/tailwindcss">
            /* Theme config Tailwind v4 */
            @theme {
                --color-primary: #FD6F00;
                --color-secondary: #FF8B31;
            }

            @theme {
                --font-sans: "Montserrat", sans-serif;
            }
        </style>
        <title>Awesome Store (Tugas 8)</title>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="bg-white backdrop-blur-md shadow-sm fixed w-full z-20 top-0 start-0 border-primary border-default">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-6 py-3">

                <!-- Logo -->
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse group">
                    <img src="./img/logo-horizontal.webp"
                        class="h-14 transition-transform duration-300 group-hover:scale-105"
                        alt="Logo" />
                </a>

                <!-- Menu -->
                <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-base md:space-x-10 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
                        <li>
                            <a href="#"
                                class="text-primary">Products</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Our Products Section -->
        <section class="max-w-7xl mx-auto px-4 py-36">
            <!-- Title -->
            <h1 class="text-4xl font-bold mb-8 text-primary">Our Products</h1>
            <!-- Filter Section -->
            <form method="GET" class="bg-white border border-gray-200 rounded-2xl shadow-sm p-5 mb-8">
                <div class="flex flex-col md:flex-row md:items-end gap-5">
                    <!-- Search -->
                    <div class="w-full md:w-1/3">
                        <label class="text-sm font-medium text-gray-700 mb-1 block">
                            Search Product
                        </label>
                        <input 
                            type="text"
                            name="search"
                            value="<?= $_GET['search'] ?? '' ?>"
                            placeholder="Search product..."
                            class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition">
                    </div>
                    <!-- Category -->
                    <div class="w-full md:w-1/4">
                        <label class="text-sm font-medium text-gray-700 mb-1 block">
                            Category
                        </label>
                        <select name="category"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition">

                            <option value="all">All Categories</option>

                            <?php
                            $categories = ["Shirt","Pants","Shoes","Outerwear","Dress","Accessories","Others"];
                            foreach ($categories as $cat) :
                            ?>
                                <option value="<?= $cat; ?>"
                                    <?= (($_GET['category'] ?? '') == $cat) ? 'selected' : ''; ?>>
                                    <?= $cat; ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <!-- Sort -->
                    <div class="w-full md:w-1/4">
                        <label class="text-sm font-medium text-gray-700 mb-1 block">
                            Sort Price
                        </label>
                        <select name="sort"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition">
                            <option value="default">Default</option>
                            <option value="low" <?= (($_GET['sort'] ?? '') == 'low') ? 'selected' : ''; ?>>Low to High</option>
                            <option value="high" <?= (($_GET['sort'] ?? '') == 'high') ? 'selected' : ''; ?>>High to Low</option>
                        </select>
                    </div>
                    <button class="bg-primary text-white px-6 py-2 rounded-lg cursor-pointer">
                        Cari
                    </button>
                </div>
            </form>

            <!-- Product Grid -->
            <div id="productContainer" class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="group bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <!-- Image -->
                        <div class="relative overflow-hidden">
                            <img src="<?= $row['image']; ?>"
                                alt="<?= $row['name']; ?>"
                                class="h-48 w-full object-cover transition-transform duration-500 group-hover:scale-110">

                            <?php if ($row['is_best_seller']) : ?>
                                <span class="absolute top-3 left-3 bg-secondary text-white text-xs px-3 py-1 rounded-md">
                                    Best Seller
                                </span>
                            <?php endif; ?>
                        </div>
                        <!-- Content -->
                        <div class="p-5 space-y-2">
                            <h2 class="font-semibold text-lg text-gray-800">
                                <?= $row['name']; ?>
                            </h2>
                            <p class="text-sm text-gray-500">
                                <?= $row['description']; ?>
                            </p>
                            <p class="text-2xl font-bold text-primary">
                                Rp. <?= number_format($row['price'], 0, ',', '.'); ?>
                            </p>
                            <div class="flex flex-wrap gap-2 pt-1">
                                <?php $badgeColor = $categoryColors[$row['category']] ?? $categoryColors['Others']; ?>
                                <span class="text-xs px-3 py-1 rounded-full font-medium <?= $badgeColor; ?>">
                                    <?= $row['category']; ?>
                                </span>

                                <span class="text-xs px-3 py-1 bg-gray-100 text-gray-600 rounded-full">
                                    <?= $row['subcategory']; ?>
                                </span>
                            </div>
                            <div class="flex items-center justify-between pt-2">
                                <p class="text-xs text-gray-500">
                                    Stock: <?= $row['stock']; ?>
                                </p>
                                <a href="#"
                                    class="text-sm bg-primary text-white px-4 py-2 rounded-md 
                                    hover:bg-secondary transition-all duration-300">
                                    Beli
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </body>
</html>