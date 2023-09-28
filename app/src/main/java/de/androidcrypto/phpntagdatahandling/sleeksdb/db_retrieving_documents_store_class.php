<?php
require_once "db/Store.php";
require_once "db/Query.php";

// https://sleekdb.github.io/#/complete-examples
// retrieve documents

use SleekDB\Store;
use SleekDB\Query;

//$databaseDirectory = __DIR__."/dbdata/users/data";
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

$whereCondition = [
  ["location", "IN", ["new york", "london"]],
  "OR",
  ["age", ">", 19]
];

// Pagination
$page = 1;
$limit = 10;
$skip = ($page - 1) * $limit;

// order by _id and limit result to 10
$result = $userStore->findBy($whereCondition, ["_id" => "DESC"], $limit, $skip);

// Output
//header("Content-Type: application/json");

echo json_encode($result);
