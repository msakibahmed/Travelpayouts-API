<?php
$searchId = '5201179';    
$resSignature = md5('4b52667603e3789242ec8cc48f0631ed:72872:10:0:0:'.$searchId.':1:price');
print_r($resSignature);

$s = curl_init();
curl_setopt($s,CURLOPT_URL,'http://engine.hotellook.com/api/v2/search/getResult.json?searchId='.$searchId.'&limit=10&offset=0&sortBy=price&sortAsc=1&roomsCount=0&marker=72872&signature='.$resSignature);
curl_setopt($s,CURLOPT_RETURNTRANSFER,1);
$answer_oj = curl_exec($s);
curl_close($s);
$answer_oj = json_decode($answer_oj,true);
echo '<pre>';
print_r($answer_oj);
echo '</pre>';
exit;
?>