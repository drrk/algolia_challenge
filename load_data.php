<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

use Algolia\AlgoliaSearch\SearchClient;

// Load in data from sample file.
// This would be replaced with the functions to read from the NodeJS XML endpoint, 
// which is then sumplimented with the data in the kafka topic.

$products = json_decode(file_get_contents(
    './payload.json'
), true);

$client = SearchClient::create(
    APP_ID,
    API_ADMIN_KEY
);

$index = $client->initIndex('demo_ecommerce');

$index->saveObjects($products, [
    'autoGenerateObjectIDIfNotExist' => true,
]);