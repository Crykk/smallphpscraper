<?php

require_once __DIR__ . '/vendor/autoload.php';

use Goutte\Client;

$url = 'https://www.gornation.com/collections/workout-equipment';

$client = new Client();


$crawler = $client->request('GET', $url);


$productList = $crawler->filter('.product-item');

$productData = [];

$productList->each(function ($productNode) use (&$productData) {
    $productName = $productNode->filter('.product-item-meta__title')->text();
    $productPrice = $productNode->filter('.price')->text(); // Use the ".price" selector


    $productData[] = [
        'name' => $productName,
        'price' => $productPrice,
    ];
});


foreach ($productData as $product) {
    echo 'Product: ' . $product['name'] . PHP_EOL;
    echo 'Price: ' . $product['price'] . PHP_EOL;
    echo '------------------------' . PHP_EOL;
}
