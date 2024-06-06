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
