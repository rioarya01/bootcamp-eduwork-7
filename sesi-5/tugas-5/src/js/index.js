import { products } from "./products-data.js";
import { renderProducts } from "./render-products.js";

const container = document.getElementById("bestSellerContainer");

if (container) {
    const bestSeller = products.filter(p => p.isBestSeller);
    renderProducts(container, bestSeller);
}