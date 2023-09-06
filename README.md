Quick Woo Fetch WordPress Plugin

Quick Woo Fetch is a streamlined WordPress plugin that enables the rapid extraction of WooCommerce products directly from the database. It bypasses the conventional WooCommerce API, resulting in faster data retrieval. The plugin exposes a REST API endpoint for fetching the products and returns the products as JSON objects with id and sku properties.

Features:

- Rapid Data Retrieval: Direct database connection for faster fetching of product data.
- REST API Endpoint: Provides an endpoint for easy querying.

Installation:

1. Download the quick-woo-fetch folder and upload it to your /wp-content/plugins/ directory.
2. Navigate to the WordPress admin dashboard.
3. Go to Plugins and activate the Quick Woo Fetch plugin.

Usage:

Once the plugin is activated:

- You can query the endpoint by visiting:
http://your-wordpress-site/wp-json/quick-woo-fetch/v1/products/
This will return a list of products as JSON objects with id and sku properties.

Contributing:

Pull requests are welcome.