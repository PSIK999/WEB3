// JavaScript to highlight the active navbar link
document.addEventListener('DOMContentLoaded', (event) => {
    const currentPage = window.location.pathname.split("/").pop();
    console.log("Current Page:", currentPage); // Debugging line
    const navLinks = document.querySelectorAll('.nav-link');
    console.log("Nav Links:", navLinks); // Debugging line

    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        console.log("Link Href:", href); // Debugging line
        if (href === currentPage || href === './' + currentPage) {
            console.log("Matching link found:", link); // Debugging line
            link.classList.add('active');
        }
    });
});
