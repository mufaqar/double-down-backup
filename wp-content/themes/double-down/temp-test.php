<?php /* Template Name: Test */

get_header('landing');



						
include(get_template_directory() . '/stripe/init.php');	
//$stripe = new \Stripe\StripeClient('pk_test_51LzR9tB7gTQeC9cUBlTwfbRhQXdpCd8ZlQ2Ym1ywybFIsuehLeZVpmcoh1gGfm00TslhdRu3w7OgcvGrTIUjokVc00yQFrXViz');
$email = 'mufaqar@gmail.com';

$stripe = new \Stripe\StripeClient("sk_test_51LzR9tB7gTQeC9cUuSk9M2d6UmOcDzbgZZLwW8zwQUSF4on9CIENpzRo1RtXjEWByNVj1sWxvotQbjP48LHYqXCc00HeF10taV");
$customers = $stripe->customers->all([
  'limit' => 1,
  'email' => $email,
]);

$customer = $customers['data'][0]['id'];

echo $customer;

print "<pre>";
//print_r($customers);


// $customers = \Stripe\Customer::all(['email' => $email, 'limit' => 1]);
// $customer = isset($customers['data'][0]) ? $customers['data'][0] : null;

// echo $customer;
	
//$customers = $stripe->customers->all(['email' => $email, 'limit' => 1]);




$intent = $stripe->charges->create([
  'customer' => $customer, // replace with the actual customer ID
  'amount' => 1500,
  'currency' => 'nok',
  'description' => 'Test Charge Custoer',
]);

//print_r($intent);

$status = $intent->status;


echo $status;







// $method =  $stripe->paymentMethods->create([
//   'type' => 'card',
//   'card' => [
//     'number' => '4242424242424242',
//     'exp_month' => 11,
//     'exp_year' => 2023,
//     'cvc' => '314',
//   ],
//   ]);
//    $customer_added = $stripe->paymentIntents->create(
//   array(
//      'amount' => intval($grand_total),
//      'currency' => 'NOK',      
//     'payment_method_types' => array('card'),
//     'payment_method' => $method->id,
//     'customer' => 'cus_MlTVknOyPYZluK',
//     'description' => "Order Week : ".$inovice_week." Order Year :".$inovice_year
    
    
//     )
//   );
//   $confirm_payment = $stripe->paymentIntents->confirm(
//   $customer_added->id,
//   ['payment_method' => 'pm_card_visa']
//   );						  

             // $status = $confirm_payment->status;
              add_post_meta($invoice_id, 'invoice_status',$status, true);
              add_post_meta($invoice_id, 'payment_message', $confirm_payment, true);

//print_r($confirm_payment);




