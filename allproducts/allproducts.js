// function getNumber(div) {
//   return parseInt(div.querySelector('p').textContent);
// }

// function lessToMax(){

// const divs = document.querySelectorAll('div>p:nth-child(1)');
// divs.sort((a, b) => getNumber(a) - getNumber(b));
// const container = document.getElementById('container');
// container.innerHTML = '';
// divs.forEach(div => container.appendChild(div));

// }

// function maxToLess(){

// const divs = document.querySelectorAll('div>p:nth-child(1)');
// divs.sort((a, b) => getNumber(b) - getNumber(a));
// const container = document.getElementById('container');
// container.innerHTML = '';
// divs.forEach(div => container.appendChild(div));

// }
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
