<?php

function uptrend($data){

	$message = ['uptrend' => false, 'downtrend' => false, 'index' => -1];

	$checker = 0;

	$loop = count($data) - 1;

	for ($iterationVariable=0; $iterationVariable < $loop; $iterationVariable++){

        $subtractions= $data[$iterationVariable] - $data[($iterationVariable +1)];
        
        $subtractions < 0 ? $checker++ : $checker = 0;

		if ($checker === 3){

			$message['uptrend'] = true;

			$message['index'] = $iterationVariable - 2;

			break;
		}
	}

	return $message;

}

function downtrend($data){

	$message = ['uptrend' => false, 'downtrend' => false, 'index' => -1];

	$checker = 0;

	$loop = count($data) - 1;

	for ($iterationVariable=0; $iterationVariable < $loop; $iterationVariable++){

		$subtractions= $data[$iterationVariable] - $data[($iterationVariable +1)];
        
        $subtractions > 0 ? $checker++ : $checker = 0;

		if ($checker === 3){

			$message['downtrend'] = true;

			$message['index'] = $iterationVariable -2;

			break;
		}
	}

	return $message;

}

function checkTrend($j=null){


	$trend = uptrend($j);

	if ($trend['uptrend'] === true){

		return $trend;
	}


	$trend = downtrend($j);


	if ($trend['downtrend'] === true){

		return $trend;
	}


	return ['uptrend' => false, 'downtrend' => false, 'index' => -1];

}



$testData = [21, 78, 41, 15, 71, 49, 40, 18, 11, 5, 1];

$message = checkTrend($testData);

var_dump($message);

?>