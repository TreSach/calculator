<?php

$error = [];
$output = 0;

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
        return $this->a / 100; // Removed Modulus; convert integer into percentage.
        break;


/* Work on this complex operations later */

        case 'x^2':
        return $this->a ** 2;
        break;

        case 'x^y':
        return pow($this->a, $this->b); //Uses pow(base, exponent);
        break;

        case 'x!':
        return $this->a + $this->b; //Maybe add a separate function. Reference: Factorial notation? - Not Complete
        break;

        case 'sin':
        return sin($this->a); //Uses sin()
        break;

        case 'cos':
        return cos($this->a); //Uses cos()
        break;

        case 'tan':
        return tan($this->a); //Uses tan()
        break;

        case 'pi':
        return pi(); //Treat this as an number rather than operator
        break;

        case 'sinh':
        return sinh($this->a); //Uses sinh()
        break;

        case 'cosh':
        return cosh($this->a); //Uses cosh()
        break;

        case 'tanh':
        return tanh($this->a); //Uses tanh()
        break;

        case 'sqrt':
        return sqrt($this->a); //Uses sqrt()
        break;

        case 'log10':
        return log10($this->a); //Uses log10()
        break;

        case 'e':
        return exp(1); //Treat this as an number rather than operator
        break;

        case 'e^x':
        return exp($this->a); //Uses exp(number) = 2.718281828459
        break;

        case '+/-':
        return $this->a * -1;
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

if(empty($int1)){
     $int1=0;
}

if(empty($int2)){
   $int2=0;
}

if(!is_numeric($int1)){
    $error[] = "You have entered an invalid input for first input. Please input numbers only";
}

if(!is_numeric($int2)){
    $error[] = "You have entered an invalid input for second input. Please input numbers only";
}



if(empty($operator)){
    $error[] = "Please select an operator to process your calculation.";
    $output = $calc->calculateNow($int1, $int2, $operator);
}

    if(sizeof($error) == 0) {
        $output = $calc->calculateNow($int1, $int2, $operator);
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
  div.success {
	display: inline-block;
	background-color: #66ff99;
  color: #009933;
	border-radius: 6px;
	padding: 5px 5px 5px 5px;
	width: auto;
	font-size: 20px;
}
div.error {
	display: inline-block;
	background-color: #ffcccc;
  color: #990000;
	border-radius: 6px;
	padding: 5px 5px 5px 5px;
	width: auto;
	font-size: 20px;
}

div.notice {
	display: inline-block;
	background-color: #ffff66;
    color: #cc9900;
	border-radius: 6px;
	padding: 5px 5px 5px 5px;
	width: auto;
	font-size: 20px;
}
  </style>
  </head>

  <body>

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

 if(!$output == null) {
?>
<div class="success">
<?php
print $output;
?>

</div>
<?php } ?>
<br><br>

  <form method="POST" action="calculator.php" enctype="multipart/form-data">
<input type="text" name="int1" value=0>
<input type="text" name="int2" value=0>
<select name="op">
    <option value="">Pick an operator</option>
     <option value="+" >+</option>
     <option value="-">-</option>
     <option value="*">*</option>
     <option value="/">/</option>
     <option value="%">%</option>
     <option value="x^2" >x^2</option>
     <option value="x^y">x^y</option>
     <!-- Unavailable <option value="x!">x!</option> -->
     <option value="sin">sin</option>
     <option value="cos">cos</option>
     <option value="tan" >tan</option>
     <option value="pi">&pi;</option>
     <option value="sinh">sinh</option>
     <option value="cosh">cosh</option>
     <option value="tanh">tanh</option>
     <option value="+/-">+/-</option>
<input type="submit" value="=">
  </form>
  <br><br>

  <div class="notice">
  NOTE: If you use an operator that does not require adding second input (i.e., x^2, sin, +/-), please only input number in the left hand text box and the operator.
  This application is still working in progress
  </div>
 
  