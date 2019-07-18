<?php

$error = [];
$output = 0;
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
        return $this->a / 100; // Removed Modulus; convert integer into percentage.
        break;


/* Work on this complex operations later */

        case 'x^2':
        return $this->a ** 2;
        break;

        case 'x^y':
        return $this->a ** $this->b; //Can use pow($this->a, $this->b); instead
        break;

        case 'x!':
        return gmp_strval(gmp_fact($this->a)); //GMP class extension was disabled by default.
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

        case 'cubert':
        return pow($this->a, 1/3); //Uses sqrt()
        break;

        case 'nthrt':
        return $this->a ** 1/$this->b; //Uses pow($this->a, 1/$this->b);
        break;

        case 'numrtnum':
        return $this->a * pow($this->a, 1/$this->b); //Uses sqrt()
        break;

        case 'ln':
        return log($this->a); //Uses log10()
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

        case 'sin^-1':
        return asin($this->a); //Uses sinh()
        break;

        case 'cos^-1':
        return acos($this->a); //Uses cosh()
        break;

        case 'tan^-1':
        return atan($this->a); //Uses tanh()
        break;

        case 'sinh^-1':
        return asinh($this->a); //Uses sinh()
        break;

        case 'cosh^-1':
        return acosh($this->a); //Uses cosh()
        break;

        case 'tanh^-1':
        return atanh($this->a); //Uses tanh()
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

input[type="radio"] {
    color: black;
    visibility: hidden;
    font-size: 20px;
}

input[type="radio"]:checked label {
    color: green;
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
  <table>
<input type="text" name="int1" value="<?php print $int1; ?>">
<input type="text" name="int2" value="<?php print $int2; ?>">

<td><label for="+">+</label>
     <input type="radio" value="+"></td>
     <td><label for="-">-</label>
     <input type="radio" value="-"></td>
     <td><label for="*">*</label>
     <input type="radio" value="*"></td>
     <td><label for="/">/</label>
     <input type="radio" value="/"></td>
    <!-- <input type="radio" value="%">
     <input type="radio" value="x^2">
     <input type="radio" value="x^y">
     <input type="radio" value="ln">
     <input type="radio" value="log10">
     <input type="radio" value="e^x">
     <input type="radio" value="e">
     <input type="radio" value="sin">
     <input type="radio" value="cos">
     <input type="radio" value="tan">
     <input type="radio" value="pi">&pi;
     <input type="radio" value="sin^-1">
     <input type="radio" value="cos^-1">
     <input type="radio" value="tan^-1">
     <input type="radio" value="sqrt">&#8730;
     <input type="radio" value="cubert">&#8731;
     <input type="radio" value="nthrt">x &#8730;
     <input type="radio" value="sinh">
     <input type="radio" value="cosh">
     <input type="radio" value="tanh">
     <input type="radio" value="+/-">
     <input type="radio" value="sinh^-1">
     <input type="radio" value="cosh^-1">
     <input type="radio" value="tanh^-1">-->
<input type="submit" value="=">
</table>
  </form>
  <br><br>

  <div class="notice">
  NOTE: If you use an operator that does not require adding second input (i.e., x^2, sin, +/-), please only input number in the left hand text box and the operator.
  This application is still working in progress
  </div>
 
  