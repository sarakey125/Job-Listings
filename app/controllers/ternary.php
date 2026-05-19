<?php

$config = require basePath('config/db.php');
$db = new Database($config);

$listing = null;
$listingId = $_GET['listing_id'] ?? null;

// If a listing ID is provided, fetch it
if ($listingId && ctype_digit((string)$listingId)) {
    $sth = $db->conn->prepare('SELECT * FROM listings WHERE id = :id LIMIT 1');
    $sth->execute(['id' => $listingId]);
    $listing = $sth->fetch();
}

loadView('ternary/ternary', [
    'listing' => $listing
]);
