<?php

error_reporting(E_ERROR); //only output for PHP Errors

//Initialize the variables
$error = [];
$int1 = '';
$int2 = '';


class calculateMe{

 var $a;
 var $b;


function processOperation($math){

    switch($math){

        case '+':
        return $this->a + $this->b;
        break;

        case '-':
        return $this->a - $this->b;
        break;

        case '*':
        return $this->a * $this->b;
        break;

        case '/':
        return $this->a / $this->b;
        break;

        case '^':
        return $this->a ** $this->b;
        break;

        case '%':
        return $this->a / 100; 
        break;

        case 'x^2':
        return $this->a ** 2;
        break;

        case 'x^y':
        return $this->a ** $this->b; //Can use pow($this->a, $this->b); instead
        break;

        case 'x!':
        return gmp_strval(gmp_fact($this->a)); //GMP class was disabled by default. Enable it to use factorial notation
        break;

        case 'sin':
        return sin($this->a);
        break;

        case 'cos':
        return cos($this->a); 
        break;

        case 'tan':
        return tan($this->a); 
        break;

        case 'pi':
        return pi(); //Only output as approximately 3.14
        break;

        case 'sinh':
        return sinh($this->a); 
        break;

        case 'cosh':
        return cosh($this->a); 
        break;

        case 'tanh':
        return tanh($this->a);
        break;

        case 'cubert':
        return pow($this->a, 1/3); 
        break;

        case 'nthrt':
        return $this->a ** 1/$this->b; 
        break;

        case 'numrtnum':
        return $this->a * pow($this->a, 1/$this->b);
        break;

        case 'ln':
        return log($this->a); // loge(X) = ln(X)
        break;

        case 'log10':
        return log10($this->a); 
        break;

        case 'e':
        return exp(1); //Only outputs the value of 'e'
        break;

        case 'e^x':
        return exp($this->a); 
        break;

        case 'sin^-1':
        return asin($this->a); 
        break;

        case 'cos^-1':
        return acos($this->a); 
        break;

        case 'tan^-1':
        return atan($this->a);
        break;

        case 'sinh^-1':
        return asinh($this->a); 
        break;

        case 'cosh^-1':
        return acosh($this->a);
        break;

        case 'tanh^-1':
        return atanh($this->a); 
        break;

        default:
        return null;
    }
}

function calculateNow($a, $b, $operator){ 
    $this->a = $a;
    $this->b = $b;
    return $this->processOperation($operator);

}

}

$calc = new calculateMe();


if($_SERVER['REQUEST_METHOD'] == 'POST'){

$int1 = $_POST['int1'];
$int2 = $_POST['int2'];
$operator = $_POST['op'];


//Validate inputs and replace empty space as 0. Some operators may take only the first number input
if(empty($int1)){
     $int1=0;
}

if(empty($int2)){
   $int2=0;
}

if(!preg_match("^(\.{1}|\d)$^", $int1)){
    $error[] = "First Input - Invalid Number Input.";

} elseif(strlen(trim($int1)) >= 31) {
    $error[] = "First Input - Too many digits. Only less than or equal to 30 digits are accepted.";

} elseif(substr_count($int1, '.') > 1){
  $error[] = "First Input - Only one decimal point is accepted.";
}

if(!preg_match("^(\.{1}|\d)$^", $int2)){
  $error[] = "Second Input - Invalid Number Input.";

} elseif(strlen(trim($int2)) >= 31) {
  $error[] = "Second Input - Too many digits. Only less than or equal to 30 digits are accepted.";

} elseif(substr_count($int2, '.') > 1){
$error[] = "Second Input - Only one decimal point is accepted.";
}

if(empty($operator)){
    $error[] = "Select an operator to process your calculation.";
    $operater = '';
}

    if(sizeof($error) == 0) {
        $output = $calc->calculateNow($int1, $int2, $operator);

    } 
}

?>