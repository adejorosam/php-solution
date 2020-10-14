<?php

function uptrend($data){

	$result = ['uptrend' => false, 'downtrend' => false, 'index' => -1];

	$checker = 0;

	$loop = count($data) - 1;

	for ($iterationVariable=0; $iterationVariable < $loop; $iterationVariable++){

        $subtractions= $data[$iterationVariable] - $data[($iterationVariable +1)];
        
        $subtractions < 0 ? $checker++ : $checker = 0;

		if ($checker === 3){

			$result['uptrend'] = true;

			$result['index'] = $iterationVariable - 2;

			break;
		}
	}

	return $result;

}

function downtrend($data){

	$result = ['uptrend' => false, 'downtrend' => false, 'index' => -1];

	$checker = 0;

	$loop = count($data) - 1;

	for ($iterationVariable=0; $iterationVariable < $loop; $iterationVariable++){

		$subtractions= $data[$iterationVariable] - $data[($iterationVariable +1)];
        
        $subtractions > 0 ? $checker++ : $checker = 0;

		if ($checker === 3){

			$result['downtrend'] = true;

			$result['index'] = $iterationVariable -2;

			break;
		}
	}

	return $result;

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



$testData = [32, 12, 11, 15, 11, 9, 10, 8, 11, 5, 1];

$result = checkTrend($testData);

print_r($result);

?>