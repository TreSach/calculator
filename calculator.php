<?php

$error = [];
$output = 0;
$int1 = $_POST['int1'];
$int2 = $_POST['int2'];
$operator = $_POST['op'];

if(!is_numeric($int1)){
    $error[] = "You have entered an invalid input for first input. Please input numbers only";
}

if(!is_numeric($int2)){
    $error[] = "You have entered an invalid input for second input. Please input numbers only";
}

if(empty($operator)){
    $error[] = "Please select an operator to process your calculation.";
}

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
        return $this->a % $this->b;
        break;


/* Work on this complex operations later */

        case 'x^2':
        return $this->a ** 2;
        break;

        case 'x^y':
        return $this->a + $this->b; //Uses pow(base, exponent);
        break;

        case 'x!':
        return $this->a + $this->b; //Maybe add a separate function. Reference: Factorial notation?
        break;

        case 'sin':
        return $this->a + $this->b; //Uses sin()
        break;

        case 'cos':
        return $this->a + $this->b; //Uses cos()
        break;

        case 'tan':
        return $this->a + $this->b; //Uses tan()
        break;

        case 'pi':
        return $this->a + $this->b; //Uses pi() * number
        break;

        case 'sinh':
        return $this->a + $this->b; //Uses sinh()
        break;

        case 'cosh':
        return $this->a + $this->b; //Uses cosh()
        break;

        case 'tanh':
        return $this->a + $this->b; //Uses tanh()
        break;

        case 'sqrt':
        return $this->a + $this->b; //Uses sqrt()
        break;

        case 'log10':
        return $this->a + $this->b; //Uses log10()
        break;

        case 'e':
        return $this->a + $this->b; //Uses exp(1) = 2.718281828459
        break;

        case 'e^x':
        return $this->a + $this->b; //Uses exp(number) = 2.718281828459
        break;

        default:
        return "Syntax Error";
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
    if(sizeof($error) == 0) {
        $output = $calc->calculateNow($int1, $int2, $calculate);
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP-based Calculator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
div.error {
	display: inline-block;
	background-color: #ffcccc;
  color: #990000;
	border-radius: 6px;
	padding: 5px 5px 5px 5px;
	width: auto;
	font-size: smaller;
}
  </style>
  </head>

  <body>
<div class="error">
<?php 
           if (isset($error) && sizeof($error) > 0) { 
             ?>

			<div class="error"><b>Syntax Error Reporting:</b>
	<?php
				foreach ($error as $errory) {
					echo "<br/>";
					echo "&bullet; $errory";
				}
	?>
			</div><br>
<?php } 
?>
</div>
  <form method="POST" action="calculator.php" enctype="multipart/form-data">
<input type="text" value="int1" id="int1">
<input type="text" value="int2" id="int2">
<select name="op">
    <option value="">Pick an operator</option>
     <option value="+" >+</option>
     <option value="-">-</option>
     <option value="*">*</option>
     <option value="/">/</option>
     <option value="%">% - Modulus</option>
<input type="submit" value="=">
  </form>