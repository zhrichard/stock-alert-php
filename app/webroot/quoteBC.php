<?php
	$p = $_SERVER['QUERY_STRING'];
	$p = substr($p, 2);
	
	$curl = curl_init();
	$url = sprintf("%s%s", "http://marketdata.websol.barchart.com/getQuote.json?apikey=6772df36f8837d5a9cece4e36b1fd0d3&mode=R&jerq=false&symbols=", $p);
	//echo $url;


    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    	$result = curl_exec($curl);

    	curl_close($curl);
	
	header('Content-Type: application/json; charset=utf-8');
	echo $result;
	

?>