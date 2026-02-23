// ================= WARNA KATEGORI =================
const categoryColors = {
    Shirt: "bg-indigo-100 text-indigo-700",
    Pants: "bg-blue-100 text-blue-700",
    Shoes: "bg-green-100 text-green-700",
    Outerwear: "bg-purple-100 text-purple-700",
    Dress: "bg-rose-100 text-rose-700",
    Accessories: "bg-amber-100 text-amber-700",
    Others: "bg-gray-100 text-gray-700"
};

// ================= RENDER PRODUK =================
export function renderProducts(container, list) {
    if (!container) return;

    container.innerHTML = "";

    if (list.length === 0) {
        container.innerHTML = `
        <p class="col-span-full text-center text-gray-500">
            Produk tidak ditemukan
        </p>`;
        return;
    }

    list.forEach(product => {
        const badgeColor =
        categoryColors[product.category] || categoryColors["Others"];

        container.innerHTML += `
        <div class="group bg-white rounded-xl border border-gray-200 overflow-hidden 
            shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2">

            <div class="relative overflow-hidden">
            <img src="${product.image}"
                alt="${product.name}"
                class="h-48 w-full object-cover transition-transform duration-500 group-hover:scale-110">

            ${product.isBestSeller ? `
                <span class="absolute top-3 left-3 bg-secondary text-white text-xs px-3 py-1 rounded-md">
                Best Seller
                </span>
            ` : ""}
            </div>

            <div class="p-5 space-y-2">
            <h2 class="font-semibold text-lg text-heading line-clamp-1">
                ${product.name}
            </h2>

            <p class="text-sm text-gray-500 line-clamp-2">
                ${product.description}
            </p>

            <p class="text-2xl font-bold text-primary">
                Rp. ${product.price.toLocaleString("id-ID")}
            </p>

            <div class="flex flex-wrap gap-2 pt-1">
                <span class="text-xs px-3 py-1 rounded-full font-medium ${badgeColor}">
                ${product.category}
                </span>

                <span class="text-xs px-3 py-1 bg-gray-100 text-gray-600 rounded-full">
                ${product.subcategory}
                </span>
            </div>

            <div class="flex items-center justify-between pt-2">
                <p class="text-xs text-gray-500">
                Stock: ${product.stock}
                </p>

                <a href="#"
                class="text-sm bg-primary text-white px-4 py-2 rounded-md 
                hover:bg-secondary transition-all duration-300">
                Beli
                </a>
            </div>
            </div>
        </div>
        `;
    });
}