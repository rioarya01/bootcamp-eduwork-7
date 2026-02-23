async function loadComponent(id, file) {
    const res = await fetch(file);
    const html = await res.text();
    document.getElementById(id).innerHTML = html;

    // re-init Flowbite setelah element masuk DOM
    if (window.initFlowbite) {
        initFlowbite();
    }

    // kalau navbar → set active menu
    if (id === "navbar") {
        setActiveNav();
    }
}

// function active menu
function setActiveNav() {
    const navLinks = document.querySelectorAll(".nav-link");
    const currentPath = window.location.pathname;

    navLinks.forEach(link => {
        const linkPath = new URL(link.href).pathname;

        if (linkPath === currentPath) {
            link.classList.add("active-link");
        } else {
            link.classList.remove("active-link");
        }
    });
}

// load components
loadComponent("navbar", "/src/components/navbar.html");
loadComponent("footer", "/src/components/footer.html");