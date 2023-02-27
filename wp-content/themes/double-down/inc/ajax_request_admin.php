<?php


add_action('wp_ajax_update_shipping', 'update_shipping', 0);
add_action('wp_ajax_nopriv_update_shipping', 'update_shipping');

function update_shipping()
{
	global $wpdb;

	$shipping_price = $_POST['shipping_price'];
	$vat_price = $_POST['vat_price'];

	update_option('shipping_price', $shipping_price);
	update_option('vat_price', $vat_price);

	echo wp_send_json(array('code' => 200, 'message' => __('Shipping and vat updated')));

	die();


	
	$user_id = wp_insert_post($post);
	if (!is_wp_error($user_id)) {
	
		echo wp_send_json(array('code' => 200, 'message' => __('Shipping and vat updated')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please fill up form carefully.')));
	}

	die;
}

