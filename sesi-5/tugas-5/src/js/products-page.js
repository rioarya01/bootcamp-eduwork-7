import { products } from "./products-data.js";
import { renderProducts } from "./render-products.js";

// ================= ELEMENT =================
const container = document.getElementById("productContainer");
const searchInput = document.getElementById("searchInput");
const categoryFilter = document.getElementById("categoryFilter");
const priceSort = document.getElementById("priceSort");

// ================= AUTO GENERATE CATEGORY =================
function generateCategoryFilter() {
    if (!categoryFilter) return;

    const categories = [...new Set(products.map(p => p.category))];

    categoryFilter.innerHTML =
        `<option value="all">All Categories</option>`;

    categories.forEach(cat => {
        categoryFilter.innerHTML += `
        <option value="${cat}">${cat}</option>
        `;
    });
}

// ================= FILTER =================
function applyFilter() {
    let filtered = [...products];

    // Search
    const searchValue = searchInput?.value.toLowerCase();
    if (searchValue) {
        filtered = filtered.filter(p =>
        p.name.toLowerCase().includes(searchValue)
        );
    }

    // Category
    if (categoryFilter?.value !== "all") {
        filtered = filtered.filter(p =>
        p.category === categoryFilter.value
        );
    }

    // Sort price
    if (priceSort?.value === "low") {
        filtered.sort((a, b) => a.price - b.price);
    } else if (priceSort?.value === "high") {
        filtered.sort((a, b) => b.price - a.price);
    }

    renderProducts(container, filtered);
}

// ================= EVENT =================
searchInput?.addEventListener("input", applyFilter);
categoryFilter?.addEventListener("change", applyFilter);
priceSort?.addEventListener("change", applyFilter);

// ================= INIT =================
if (container) {
    generateCategoryFilter();
    renderProducts(container, products);
}