<?php
require_once "db/Store.php";
require_once "db/Query.php";

// https://sleekdb.github.io/#/complete-examples
// Insert one document

use SleekDB\Store;
use SleekDB\Query;

$databaseDirectory = __DIR__."/dbdata";

// applying the store configuration is optional
$storeConfiguration = [
  "auto_cache" => true,
  "cache_lifetime" => null,
  "timeout" => 120,
  "primary_key" => "_id",
  "search" => [
    "min_length" => 2,
    "mode" => "or",
    "score_key" => "scoreKey",
    "algorithm" => Query::SEARCH_ALGORITHM["hits"]
  ]
];

// creating a new store object
$userStore = new Store("users", $databaseDirectory, $storeConfiguration);

$newUser = [
  "username" => "Bob2",
  "age" => 22,
  "address" => [
    "street" => "down street",
    "streetNumber" => 12,
    "postalCode" => "8174",
  ],
];

$newUser = $userStore->insert($newUser);

// Output user with its unique id.
header("Content-Type: application/json");

echo json_encode($newUser);

// creating a second new store object
$userStore = new Store("users", $databaseDirectory, $storeConfiguration);

$newUser = [
  "username" => "Bob3",
  "age" => 23,
  "address" => [
    "street" => "down street",
    "streetNumber" => 12,
    "postalCode" => "8174",
  ],
];

$newUser = $userStore->insert($newUser);

// Output user with its unique id.
header("Content-Type: application/json");

echo json_encode($newUser);



