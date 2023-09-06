<?php
/*
Plugin Name: Quick Woo Fetch
Description: Rapid extraction of WooCommerce products directly from the database.
 * Version: 1.0
 * Author: Byron Jacobs
 * Author URI: https://byronjacobs.co.za
 * License: GPLv2 or later
 * Text Domain: quick-woo-fetch
 */

// Register a new REST API route
add_action('rest_api_init', function () {
	register_rest_route('quick-woo-fetch/v1', '/products/', array(
		'methods' => 'GET',
		'callback' => 'qwf_get_products',
	));
});

function qwf_get_products() {
	global $wpdb;

	$results = $wpdb->get_results("SELECT product_id, sku FROM {$wpdb->prefix}wc_product_meta_lookup WHERE sku != ''", ARRAY_A);

	$base_skus = array_map(function ($row) {
		return explode('-', $row['sku'])[0];
	}, $results);

	$distinct_skus = array_unique($base_skus);

	$filtered_rows = [];
	$seen_skus = [];

	foreach ($results as $row) {
		$sku_base = explode('-', $row['sku'])[0];
		if (in_array($sku_base, $distinct_skus) && !in_array($sku_base, $seen_skus)) {
			$seen_skus[] = $sku_base;
			$filtered_rows[] = [
				"id" => $row['product_id'],
				"sku" => $row['sku'],
			];
		}
	}

	return $filtered_rows;
}
