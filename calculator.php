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
  *{
    box-sizing: border-box;
  }
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

body{
  min-height: 100vh;
  display:flex;
  justify-content: center;
 align-items: flex-start;
}

.box {
  display:flex;
  flex-wrap: wrap;
  flex: 0 1 60%;
  min-width:400px;
}

input[type="radio"] {
   
    visibility: hidden;
}

input[type="text"] {
  text-align: right;
}

.box table {
    display:flex;
    flex-wrap: wrap;
    flex: 0 1 60%;
    min-width: 800px;
}



label {
    
    background-color: yellow;
    color: black;
}

.selected {
    background-color: black;
    color: white;
}



.btn {
  display: flex;
  flex-wrap: wrap;
  flex: 0 1 100%;
 
}

label {
  display:flex;
   flex: 0 1 10%;
  justify-content: center;
  align-items: center;
  height: 50px;
}


  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
<script>
  
  $(function() {
     
      $('label').click(function() {
          $('label').removeClass('selected');
          var select = $(this).addClass('selected');
          if(select){
            $('input[type="radio"][id="+this.id+"]').attr('checked', true);
          }
          
          
      });
  });
</script>
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

 
?>
<div class="success">
<?php

  print $output;

    

?>

</div>

<br><br>

  <form method="POST" action="calculator.php" enctype="multipart/form-data" class="box">

  <div>
<input type="text" name="int1" value="<?php print $int1; ?>">
<input type="text" name="int2" value="<?php print $int2; ?>">
</div>

<div class="btn">
<input type="radio" value="+" name="op" id="+"><label for="+">+</label>
     
     <input type="radio" value="-" name="op" id="-"><label for="-">-</label>
     
     <input type="radio" value="*" name="op" id="*"><label for="*">*</label>
     
     <input type="radio" value="/" name="op" id="/"><label for="/">/</label>
     
    <input type="radio" value="%"name="op" id="%"><label for="%">%</label>
    <input type="radio" value="e"name="op" id="e"><label for="e">e</label></div>
     
     
      <div class="btn">
      <input type="radio" value="x^2"name="op" id="x^2"><label for="x^2">x^2</label>
    
     <input type="radio" value="x^y"name="op" id="x^y"><label for="x^y">x^y</label>
  
     <input type="radio" value="e^x"name="op" id="e^x"><label for="e^x">e^x</label>
    
     <input type="radio" value="sin"name="op" id="sin"><label for="sin">sin</label>
     
     <input type="radio" value="cos"name="op" id="cos"><label for="cos">cos</label>
     <input type="radio" value="tan"name="op" id="tan"><label for="tan">tan</label>
     </div>


     <div class="btn">
     <input type="radio" value="log10"name="op" id="log10"><label for="log10">log10</label>
     <input type="radio" value="ln"name="op" id="ln"><label for="ln">ln</label>
     <input type="radio" value="pi"name="op" id="&pi;"><label for="&pi;">&pi;</label>
     
     <input type="radio" value="sin^-1"name="op" id="sin^-1"><label for="sin^-1">sin^-1</label>
     
     <input type="radio" value="cos^-1"name="op" id="cos^-1"><label for="cos^-1">cos^-1</label>
     
     <input type="radio" value="tan^-1"name="op" id="tan^-1"><label for="tan^-1">tan^-1</label>
     </div>


     <div class="btn">
     <input type="radio" value="sqrt"name="op" id="sqrt"><label for="sqrt">&#8730;</label>
     <input type="radio" value="cubert"name="op" id="cubert"><label for="cubert">&#8731;</label>

     <input type="radio" value="nthrt"name="op" id="nthrt"><label for="nthrt">x&#8730;</label>
     
     <input type="radio" value="sinh"name="op" id="sinh"><label for="sinh">sinh</label>
     
     <input type="radio" value="cosh"name="op" id="cosh"><label for="cosh">cosh</label>
     
     <input type="radio" value="tanh"name="op" id="tanh"><label for="tanh">tanh</label>
     
    </div>

     <div class="btn">
     <input type="radio" value="+/-"name="op" id="+/-"><label for="+/-">+/-</label>
     <input type="radio" value="sinh^-1"name="op" id="sinh^-1"><label for="sinh^-1">sinh^-1</label>
     
     <input type="radio" value="cosh^-1"name="op" id="cosh^-1"><label for="cosh^-1">cosh^-1</label>
     
     <input type="radio" value="tanh^-1"name="op" id="tanh^-1"><label for="tanh^-1">tanh^-1</label>

     <input type="submit" value="=">
     </div>



  </form>
  <br><br>

  <!--<div class="notice">
  NOTE: If you use an operator that does not require adding second input (i.e., x^2, sin, +/-), please only input number in the left hand text box and the operator.
  This application is still working in progress
  </div>-->
 
  