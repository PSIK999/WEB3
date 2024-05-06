document.getElementById('track-btn').addEventListener('click', function () {
  var orderId = document.getElementById('order-id').value;
  if (!orderId) {
    alert('Please enter an order ID');
    return;
  }
  // Simulate an async API call

  var orderDetails = {
    orderId: orderId,
    status: 'In Transit',
    deliveryDate: 'May 10, 2024',
    trackingNumber: '1234567890',
    shippingCarrier: 'UPS'
  };

  document.getElementById('order-id-display').textContent = orderDetails.orderId;
  document.getElementById('order-status').textContent = orderDetails.status;
  document.getElementById('delivery-date').textContent = orderDetails.deliveryDate;
  document.getElementById('tracking-number').textContent = orderDetails.trackingNumber;
  document.getElementById('shipping-carrier').textContent = orderDetails.shippingCarrier;

  document.getElementById('order-details').classList.remove('hidden');

});