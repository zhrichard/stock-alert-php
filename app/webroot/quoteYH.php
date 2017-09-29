<?php
	$p = $_SERVER['QUERY_STRING'];
	
	$p = substr($p, 2);
	
	$curl = curl_init();
	$url = sprintf("%s%s%s", "http://query.yahooapis.com/v1/public/yql?q=select%20symbol,LastTradePriceOnly,StockExchange%20from%20yahoo.finance.quote%20where%20symbol%20in%20(", $p, ")&format=json&diagnostics=false&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=");
	echo $url;
	echo "=============================";


    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    echo $result;
	echo "=============================";

    curl_close($curl);
    $payload = "";
    
    $idx = strpos($result, "\"quote\":");
	if ($idx >= 0) {
		$idx += 8;
		$startTag = substr($result, $idx, 1);
	    $endTag = $startTag === "{" ? "}" : "]"; 
		$idx2 = strpos($result, $endTag, $idx);
		if ($idx2 >= 0 ){
			$payload = substr($result, $idx, $idx2 + 1 - $idx);
			echo $payload;
			echo "=============================";
			if ($startTag === "{") {
				$payload = "[$payload]";
			}
			//echo $payload;
		}
	}
	
	header('Content-Type: application/json; charset=utf-8');
	echo $payload;
	
?>