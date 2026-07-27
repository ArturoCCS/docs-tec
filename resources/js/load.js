window.addEventListener("load", () => {
    const loader = document.getElementById("page-loader");
    const content = document.getElementById("main-content");

    gsap.to(loader, {
        opacity: 0,
        duration: 0.4,
        onComplete: () => {
            loader.style.display = "none";
        }
    });

    content.classList.remove("opacity-0");
});