
<?php /* Template Name: Checkout  (P)  */
get_header('');

?><?php include('navigation.php'); ?>


  <h1>Checkout</h1>
   <div id="checkout-container-div">   
   </div>
   <script src="https://test.checkout.dibspayment.eu/v1/checkout.js?v=1"></script>
   <script>

document.addEventListener('DOMContentLoaded', function () {
  const urlParams = new URLSearchParams(window.location.search);
  const paymentId = urlParams.get('paymentId');
  if (paymentId) {
    const checkoutOptions = {
      checkoutKey: 'test-checkout-key-8198712415ed45fdb15f4a624384762d', // Replace!
      paymentId: paymentId,
      containerId: "checkout-container-div",
    };
    const checkout = new Dibs.Checkout(checkoutOptions);
    checkout.on('payment-completed', function (response) {
     // window.location = 'completed.html';
    });
  } else {
    console.log("Expected a paymentId");   // No paymentId provided, 
    //window.location = 'cart.html';         // go back to cart.html
  }
});


   </script>
 