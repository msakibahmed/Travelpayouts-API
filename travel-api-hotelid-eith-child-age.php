<?php

		$cliesnIP = $_SERVER['REMOTE_ADDR'];
		$cliesnIP;
		$chack_in2	= '2018-01-19';
		$chack_out2	= '2018-01-20';
		$guest		= '1';
		$children 	= '3';
		$childAge1 =	'3';
		$childAge2 =	'2';
		$childAge3 =	'5';
		$marker = 131134;
		$token = 'f4a3fbea341f0630f6cc20b2927fcb70';
		$city_code = 353;
		//$signature = "$token:$marker:$guest:$chack_in2:$chack_out2:$children:USD:$cliesnIP:HKT:ru:20";
		//echo '</br>';echo '</br>';
		//echo  $mdd5 = "$token:$marker:$guest:$chack_in2:$chack_out2:$children:1676808:USD:114.31.20.47:en:0";

		if ($children == '1') {
			echo "Childred is 1";
		}elseif ($children == '2') {
			echo "Childred is 2";
		}elseif ($children == '3') {
			echo "Childred is 3";
		}else {
			echo "Childred is 0";
		}
		echo '</br>';echo '</br>';


		echo  $mdd5 = "$token:$marker:$guest:$chack_in2:$chack_out2:$childAge1:$childAge2:$childAge3:$children:USD:114.31.20.47:358105:en:0";

		echo '</br>';echo '</br>';
		$signature = md5($mdd5);
		echo $searchId =	'http://engine.hotellook.com/api/v2/search/start.json?hotelId=358105&checkIn='.$chack_in2.'&checkOut='.$chack_out2.'&adultsCount='.$guest.'&customerIP=114.31.20.47&childAge1='.$childAge1.'&childAge2='.$childAge2.'&childAge3='.$childAge3.'&childrenCount='.$children.'&lang=en&currency=USD&waitForResult=0&marker='.$marker.'&signature='.$signature.'';

		//var_dump($searchId);
		//5953
		//	f4a3fbea341f0630f6cc20b2927fcb70:131134:1:2017-10-04:2017-10-05:2:USD:114.31.20.35:HKT:ru:20:0

		$response 		= file_get_contents($searchId); //First call the json data with file_get_contents and put this a variable
		$data 			= json_decode($response); //Decode json the data
		$get_searchId 	= $data->searchId;
		echo '<h1> Search ID : '.$get_searchId.'</h1>';

		//echo '</br>';
		//$hotel_sig = "$token:$marker:limit:$get_searchId:popularity";
		if (!empty($get_searchId)) {
			$hotel_sig = "$token:$marker:0:0:0:$get_searchId:1:popularity";
			$hotel_signature = md5($hotel_sig);
			$searchHotel = 'http://engine.hotellook.com/api/v2/search/getResult.json?searchId='.$get_searchId.'&limit=0&sortBy=popularity&sortAsc=1&roomsCount=0&offset=0&marker='.$marker.'&signature='.$hotel_signature.'';
			echo $searchHotel;
		} else { echo "Niente";}


	
		/*Carlow 		=	5929
		-Cork 		= 	1418847
		Donegal		=	5958
		Monaghan	=	1419732

		*/


		