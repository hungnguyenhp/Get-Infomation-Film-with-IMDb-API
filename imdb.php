<?php
/*
@author info@nguyenanhung.com
@target Lay thong tin mot bo phim bang IMDb Api
@support omdbapi, myapifilms, themoviedb
@using curl library
@function getImdb
@params Url, Int, Int
@example getImdb('http://www.imdb.com/title/tt0478970/', 1, 1);
*/
require 'curl.php';
function getImdb($url, $api, $type = 3)
{
	preg_match("#www.imdb.com/title/(.*)/#U", $url, $id_IMDb);
	if ($api == 2) {
		$api_url = 'http://www.myapifilms.com/imdb?idIMDB=' . $id_IMDb[1] . '&format=JSON&token=bbc8b258-a256-4239-b276-dbc3d3acdcea';
	} elseif ($api == 3) {
		$api_url = 'http://api.themoviedb.org/3/find/' . $id_IMDb[1] . '?external_source=imdb_id&api_key=9a52e4a2037d77d9d03746badc692ae6';
	} else {
		$api_url = 'http://www.omdbapi.com/?apikey=e4e2646e&i=' . $id_IMDb[1] . '&plot=full&tomatoes=true&r=json';
	}
	// Cac dinh dang tra ve
	// 1 = Array
	// 2 = Object
	// Ngoai ra se tra ve dinh dang JSON
	if ($type == 1) {
		$imdb = json_decode(curl($api_url), true);
	} elseif ($type == 2) {
		$imdb = json_decode(curl($api_url));
	} else {
		$imdb = curl($api_url);
	}
	return $imdb;
}
