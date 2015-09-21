<?php
require 'imdb.php';
// Using with array 
$array  = getImdb('http://www.imdb.com/title/tt0478970/', 1, 1);
// Using with object
$object = getImdb('http://www.imdb.com/title/tt0478970/', 1, 2);
// Using with JSON
$json   = getImdb('http://www.imdb.com/title/tt0478970/', 1, 3);

// var_dump($array);
// var_dump($object);
// var_dump($json);

// Goi ra kieu mang
echo $object['Title'];

// Goi ra kieu object
echo $object->Title;

// ............. Cac thong tim tham khao them Tu cac site api duoc include trong file imdb.php
