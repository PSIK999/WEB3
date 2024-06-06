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
$('#add-to-cart-button').click(function() {
    // Add the item to the cart
    //...
  
    // Update the cart count
    updateCartCount();
  });
  function updateCartCount() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'update-cart-count.php', true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        var count = xhr.responseText;
        document.getElementById('cart-count').innerHTML = '(' + count + ')';
      }
    };
    xhr.send();
  }
