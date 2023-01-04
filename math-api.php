<?php
// Extract the operator and operands from the URL
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', $url);
// The first element will be empty, the second will be the operator,
// and the third and fourth will be the operands
$operator = $parts[1];
$number1 = $parts[2];
$number2 = $parts[3];
// Validate the operands and convert them to floats
$number1 = filter_var($number1, FILTER_VALIDATE_FLOAT);
$number2 = filter_var($number2, FILTER_VALIDATE_FLOAT);
// Initialize the result to 0
$sum = 0;
$result = [
    "result" => 0,
];
// If the operands are valid numbers, perform the operation
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
// Return the result as a JSON object
echo json_encode($result);
