import { products } from "./products-data.js";

const container = document.getElementById("categoryStockContainer");

if (container) {
    renderCategoryStock();
}

function renderCategoryStock() {
    // ================= HITUNG TOTAL STOCK PER KATEGORI =================
    const categoryMap = {};

    products.forEach(product => {
    if (!categoryMap[product.category]) {
        categoryMap[product.category] = 0;
    }
        categoryMap[product.category] += product.stock;
    });

    // ================= ICON PER KATEGORI =================
    const categoryIcons = {
        Shirt: "👕",
        Pants: "👖",
        Shoes: "👟",
        Outerwear: "🧥",
        Dress: "👗",
        Accessories: "👜",
        Others: "📦"
    };

    // ================= RENDER =================
    container.innerHTML = "";

    Object.entries(categoryMap).forEach(([category, totalStock]) => {
        container.innerHTML += `
        <div class="bg-white rounded-xl p-6 text-center shadow-sm 
        hover:shadow-lg transition group cursor-pointer">

            <div class="text-5xl mb-3">
                ${categoryIcons[category] || "📦"}
            </div>
            <h3 class="font-semibold text-lg">
                ${category}
            </h3>
            <p class="text-gray-500 text-sm">
                ${totalStock} items
            </p>
        </div>
        `;
    });
}