<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', $url);

$operator = $parts[1];
$number1 = $parts[2];
$number2 = $parts[3];

$number1 = filter_var($number1, FILTER_VALIDATE_FLOAT);
$number2 = filter_var($number2, FILTER_VALIDATE_FLOAT);

$sum = 0;
$result = [
    "result" => 0,
];

if (is_numeric($number1) && is_numeric($number2)) {
    switch ($operator) {
        case "add":
            $sum = $number1 + $number2;
            $result = ["result" => $sum];
            break;
        case "sub":
            $sum = $number1 - $number2;
            $result = ["result" => $sum];
            break;
        case "div":
            $sum = $number1 / $number2;
            $result = ["result" => $sum];
        case "mult":
            $sum = $number1 * $number2;
            $result = ["result" => $sum];
            break;
        case "mod":
            $sum = $number1 % $number2;
            $result = ["result" => $sum];
            break;
        case "sqrt":
            $sum = $sum =  $number1 + $number2;
            $sum = sqrt($sum);
            $result = ["result" => $sum];
            break;
    }
}

echo json_encode($result);
