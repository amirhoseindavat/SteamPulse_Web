<?php
try {
//USD
$USDjson = file_get_contents('https://steamcommunity.com/market/priceoverview/?appid=440&currency=1&market_hash_name=Mann%20Co.%20Supply%20Crate%20Key');
$USDobj = json_decode($USDjson);
$USD = preg_replace("/[^0-9\.]/", '', $USDobj->lowest_price); 
// Argentina
$ARGjson = file_get_contents('https://steamcommunity.com/market/priceoverview/?appid=440&currency=34&market_hash_name=Mann%20Co.%20Supply%20Crate%20Key');
$ARGobj = json_decode($ARGjson);
$ARG = preg_replace("/[^0-9\.]/", '', $ARGobj->lowest_price)/100; 
// TR
$TRjson = file_get_contents('https://steamcommunity.com/market/priceoverview/?appid=440&currency=17&market_hash_name=Mann%20Co.%20Supply%20Crate%20Key');
$TRobj = json_decode($TRjson);
$TR = preg_replace("/[^0-9\.]/", '', $TRobj->lowest_price)/100; 
// UA
$UAjson = file_get_contents('https://steamcommunity.com/market/priceoverview/?appid=440&currency=18&market_hash_name=Mann%20Co.%20Supply%20Crate%20Key');
$UAobj = json_decode($UAjson);
$UA = preg_replace("/[^0-9\.]/", '', $UAobj->lowest_price)/100; 
// RU
$RUjson = file_get_contents('https://steamcommunity.com/market/priceoverview/?appid=440&currency=5&market_hash_name=Mann%20Co.%20Supply%20Crate%20Key');
$RUobj = json_decode($RUjson);
$RU = preg_replace("/[^0-9\.]/", '', $RUobj->lowest_price)/100; 
// IN
$INjson = file_get_contents('https://steamcommunity.com/market/priceoverview/?appid=440&currency=24&market_hash_name=Mann%20Co.%20Supply%20Crate%20Key');
$INobj = json_decode($INjson);
$IN = preg_replace("/[^0-9\.]/", '', $INobj->lowest_price); 
// BR
$BRjson = file_get_contents('https://steamcommunity.com/market/priceoverview/?appid=440&currency=7&market_hash_name=Mann%20Co.%20Supply%20Crate%20Key');
$BRobj = json_decode($BRjson);
$BR = preg_replace("/[^0-9\.]/", '', $BRobj->lowest_price)/100; 
// KZ
$KZjson = file_get_contents('https://steamcommunity.com/market/priceoverview/?appid=440&currency=37&market_hash_name=Mann%20Co.%20Supply%20Crate%20Key');
$KZobj = json_decode($KZjson);
$KZ = preg_replace("/[^0-9\.]/", '', $KZobj->lowest_price)/100; 

} catch (Exception $e) {
    echo "<script type='text/javascript'>alert('$e->getMessage()');</script>";
}

?>
<!DOCTYPE html>
<html >
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="module" defer="">
		import { polyfillCountryFlagEmojis } from "https://cdn.skypack.dev/country-flag-emoji-polyfill";
		polyfillCountryFlagEmojis();
		</script>
  <meta charset="UTF-8">
  <title>SteamPulse</title>
      <link rel="stylesheet" href="css/style.css">
	  <link rel="icon" type="image/png" href="favicon.png"/> 
 
</head>
<script>

var countDownDate = new Date().getTime();

var x = setInterval(function() {

  var now = new Date().getTime();
    
  var distance = now - countDownDate;
    
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  var outputstrings ="";
  if(days >=1)
  {
  outputstrings = "آخرین آپدیت: "+days + " روز و " + hours + " ساعت و "+ minutes + " دقیقه و " + seconds + " ثانیه قبل";
  }
  else if(hours >=1)
  {
  outputstrings = "آخرین آپدیت: "+ hours + " ساعت و "+ minutes + " دقیقه و " + seconds + " ثانیه قبل";
  }
  else if(minutes >=1)
  {
  outputstrings = "آخرین آپدیت: "+ minutes + " دقیقه و " + seconds + " ثانیه قبل";
  }
  else
  {
  outputstrings = "آخرین آپدیت: "+ seconds + " ثانیه قبل";
  }
  
  //document.getElementById("timer").innerHTML = days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";
    document.getElementById("timer").innerHTML = outputstrings;
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

<body>
  <div class="container" id="frame">
  <h4 class="title"><img class="tf2" src="key.png">قیمت کلید TF2 در ریجن های مختلف</h4>
	<div class="table-responsive">

	<table>
		<thead>
			<tr>
				<th>ریجن</th>
				<th>قیمت</th>
				<th>خالص دریافتی بعد کسر مالیات</th>
				<th>نرخ مالیات</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="regions">🇺🇸 آمریکا</td>
				<td><?php echo $USDobj->lowest_price;?></td>
				<td><?php echo '$'.number_format((float)$USD/1.15, 2, '.', '')?></td>				
				<td><?php echo '$'.number_format((float)($USD-$USD/1.15), 2, '.', '')?></td>
			</tr>
            <tr>
				<td class="regions">🇦🇷 آرژاتین</td>
				<td><?php echo $ARGobj->lowest_price;?></td>
				<td><?php echo 'ARS$ '.number_format((float)$ARG/1.15, 2, '.', '')?></td>				
				<td><?php echo 'ARS$ '.number_format((float)($ARG-$ARG/1.15), 2, '.', '')?></td>
			</tr>
            <tr>
				<td class="regions">🇹🇷 ترکیه</td>
				<td><?php echo $TRobj->lowest_price;?></td>
				<td><?php echo number_format((float)$TR/1.15, 2, '.', '').' TL'?></td>				
				<td><?php echo number_format((float)($TR-$TR/1.15), 2, '.', '').' TL'?></td>
			</tr>
            <tr>
				<td class="regions">🇺🇦 اوکراین</td>
				<td><?php echo $UAobj->lowest_price;?></td>
				<td><?php echo number_format((float)$UA/1.15, 2, '.', '').'₴'?></td>				
				<td><?php echo number_format((float)($UA-$UA/1.15), 2, '.', '').'₴'?></td>
			</tr>
            <tr>
				<td class="regions">🇷🇺 روسیه</td>
				<td><?php echo $RUobj->lowest_price;?></td>
				<td><?php echo number_format((float)$RU/1.15, 2, '.', '').' pуб.'?></td>				
				<td><?php echo number_format((float)($RU-$RU/1.15), 2, '.', '').' pуб.'?></td>
			</tr>
            <tr>
				<td class="regions">🇮🇳 هند</td>
				<td><?php echo $INobj->lowest_price;?></td>
				<td><?php echo '₹ '.number_format((float)$IN/1.15, 2, '.', '')?></td>				
				<td><?php echo '₹ '.number_format((float)($IN-$IN/1.15), 2, '.', '')?></td>
			</tr>
            <tr>
				<td class="regions">🇧🇷 برزیل</td>
				<td><?php echo $BRobj->lowest_price;?></td>
				<td><?php echo 'R$ '.number_format((float)$BR/1.15, 2, '.', '')?></td>				
				<td><?php echo 'R$ '.number_format((float)($BR-$BR/1.15), 2, '.', '')?></td>
			</tr>
			<tr>
				<td class="regions">🇰🇿 قزاقستان</td>
				<td><?php echo number_format((float)$KZ, 2, '.', '').'₸'?></td>
				<td><?php echo number_format((float)$KZ/1.15, 2, '.', '').'₸'?></td>				
				<td><?php echo number_format((float)($KZ-$KZ/1.15), 2, '.', '').'₸'?></td>
			</tr>
		</tbody>
	</table>
	
	</div>
    <div id="timer" style="float: right;margin-top: 10px;"></div>
    <button id="button" onclick="window.location.reload()" type="button" class="update">به روز رسانی</button>
    
    
</div>
<p class="copyright">v1.1 - ساخته شده با ❤️
 توسط
  <img class="logo" src="https://gaming-club.ir/wp-content/uploads/2019/07/cropped-icon-32x32.png" width="20" height="20"> <a href="https://gaming-club.ir/">گیمینگ کلاب </a>
 x 
 <img class="logo" src="https://aresgame.ir/wp-content/uploads/2020/07/icon-50x50.png" width="20" height="20"> <a href="https://aresgame.ir/">آرِس گیم</a></p>
  
</body>
</html>

