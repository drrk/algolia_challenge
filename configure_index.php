<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

use Algolia\AlgoliaSearch\SearchClient;

$client = SearchClient::create(
    APP_ID,
    API_ADMIN_KEY
);

$index = $client->initIndex('demo_ecommerce');

$index->setSettings([

    // Select the attributes you want to search in
    'searchableAttributes' => [
        'brand', 'name', 'categories', 'description',
    ],

    // Define business metrics for ranking and sorting
    'customRanking' => [
        'desc(popularity)',
    ],
    
    // Set up some attributes to filter results on
    'attributesForFaceting' => [
        'categories', 'searchable(brand)', 'price', 'rating'
    ],
]);