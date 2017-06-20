<?php
$p = $_SERVER['QUERY_STRING'];
	
	$curl = curl_init();
	$url = sprintf("%s?%s", "http://finance.google.com/finance/info", $p);;
	//echo $url;


    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    	$result = curl_exec($curl);

    	curl_close($curl);
	
	header('Content-Type: application/json; charset=utf-8');
	echo substr($result, 3);
?>
