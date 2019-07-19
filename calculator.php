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
    $operater = '';
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
  <link href="https://fonts.googleapis.com/css?family=Patua+One&display=swap" rel="stylesheet">
  <style>
  *{
    box-sizing: border-box;
  }
  body{
    font-family: 'Patua One', cursive;
  }
  div.success {
	display: inline-block;
	background-color: #66ff99;
  color: #009933;
	border-radius: 6px;
	padding: 5px 5px 5px 5px;
	width: 50%;
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

form{
  margin: 0 auto;

  padding-top: 3%;
  min-height: 70vh;
  display:flex;
  justify-content: center;
 align-items: flex-start;
}

.box {
  
  margin-top: 5%;
  padding-top: 5%;
  display:flex;
  flex-wrap: wrap;
  align-content: flex-start;
  justify-content: center;
 align-items: flex-start;
  flex: 0 1 60%;
  min-width:400px;
}

input[type="radio"] {
   display:none;
  
}

input[type="text"], div.success {
  text-align: right;
  max-width: 100%;
 
}



label {
    border: 1px solid black;
    background-color: #009bd9;
    color: #0207a1;
    font-size: 20px;
}

.selected {
    background-color: #b1b1b3 !important;
    color: #fff;
}

.basic {
  background-color: #0d0191;
  color: white;
  font-size:26px;
}

input[type="text"]{
  border: 5px solid #03013b;
  padding: 10px; 
  color: #000;
  width: 30%;
}

.left-text {
font-size: 24px;
  border-top-left-radius: 20px;
}

.right-text {
  font-size: 24px;
   border-top-right-radius: 20px;
}
.num{
  border: 0;
  
  display: flex;
  flex-wrap: wrap;
  flex: 0 1 100%;
  
 margin: 0 auto;
  justify-content: center;
  align-items: center;
  font-size: 18px;
}

.btn {
  display: flex;
  flex-wrap: wrap;
  flex: 0 1 100%;
 justify-content: center;
}

.small {
  font-size: 14px;
}

label, input[type="submit"] {
 // border-radius: 20px;
  display:flex;
   flex: 0 1 10%;
  justify-content: center;
  align-items: center;
  height: 50px;
}

input[type="submit"]{
  border: 1px solid black;
  flex: 0 1 20%;
  
  background-color: #66ff99;
  color: #009933;
font-size: 26px;
}

::placeholder { /* Firefox, Chrome, Opera */ 
    color: gray; 
} 
  
:-ms-input-placeholder { /* Internet Explorer  */ 
    color: gray; 
} 
  
::-ms-input-placeholder { /* Microsoft Edge */ 
    color: gray; 
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

      $(document).on("keydown", "input"), function(e){
        if(e.which == 13) {
          $("form").submit();
        }
      }
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

  <form method="POST" action="calculator.php" enctype="multipart/form-data" class="box">

  <?php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {

  ?>
  <div class="success">
<?php
  print $output;
?>

</div>
<?php
}
?>
  <div class="num">
<input type="text" name="int1" value="<?php print $int1; ?>" placeholder="0" class="left-text">
<input type="text" name="int2" value="<?php print $int2; ?>" placeholder="0" class="right-text">
</div>

<div class="btn">

<input type="radio" value="x^2"name="op" id="x^2"><label for="x^2">x<sup class="small">2</sup></label>
     
<input type="radio" value="log10"name="op" id="log10"><label for="log10">log<sub class="small">10</sub></label>
<input type="radio" value="sqrt"name="op" id="sqrt"><label for="sqrt">&#8730;</label>
     
     
     
    <input type="radio" value="%"name="op" id="%"><label for="%">%</label>
    <input type="radio" value="e"name="op" id="e"><label for="e">e</label>
    <input type="radio" value="+" name="op" id="+"><label for="+" class="basic">+</label></div>
     
     
      <div class="btn">
      
    
     <input type="radio" value="x^y"name="op" id="x^y"><label for="x^y">x<sup class="small">y</sup></label>
  
     <input type="radio" value="e^x"name="op" id="e^x"><label for="e^x">e<sup class="small">x</sup></label>
    
     <input type="radio" value="sin"name="op" id="sin"><label for="sin">sin</label>
     
     <input type="radio" value="cos"name="op" id="cos"><label for="cos">cos</label>
     <input type="radio" value="tan"name="op" id="tan"><label for="tan">tan</label>
     <input type="radio" value="-" name="op" id="-"><label for="-" class="basic">-</label>
     </div>


     <div class="btn">
     
     <input type="radio" value="ln"name="op" id="ln"><label for="ln">ln</label>
     <input type="radio" value="pi"name="op" id="&pi;"><label for="&pi;">&pi;</label>
     
     <input type="radio" value="sin^-1"name="op" id="sin^-1"><label for="sin^-1">sin<sup class="small">-1</sup></label>
     
     <input type="radio" value="cos^-1"name="op" id="cos^-1"><label for="cos^-1">cos<sup class="small">-1</sup></label>
     
     <input type="radio" value="tan^-1"name="op" id="tan^-1"><label for="tan^-1">tan<sup class="small">-1</sup></label>
     <input type="radio" value="*" name="op" id="*"><label for="*" class="basic">x</label></div>


     <div class="btn">
     
     <input type="radio" value="cubert"name="op" id="cubert"><label for="cubert">&#8731;</label>

     <input type="radio" value="nthrt"name="op" id="nthrt"><label for="nthrt"><sup class="small">x</sup>&#8730;</label>
     
     <input type="radio" value="sinh"name="op" id="sinh"><label for="sinh">sinh</label>
     
     <input type="radio" value="cosh"name="op" id="cosh"><label for="cosh">cosh</label>
     
     <input type="radio" value="tanh"name="op" id="tanh"><label for="tanh">tanh</label>
     <input type="radio" value="/" name="op" id="/"><label for="/" class="basic">&divide;</label>
    </div>

     <div class="btn">
     <input type="radio" value="+/-"name="op" id="+/-"><label for="+/-">+/-</label>
     <input type="radio" value="sinh^-1"name="op" id="sinh^-1"><label for="sinh^-1">sinh<sup class="small">-1</sup></label>
     
     <input type="radio" value="cosh^-1"name="op" id="cosh^-1"><label for="cosh^-1">cosh<sup class="small">-1</sup></label>
     
     <input type="radio" value="tanh^-1"name="op" id="tanh^-1"><label for="tanh^-1">tanh<sup class="small">-1</sup></label>
   
     <input type="submit" value="=">
     </div>



  </form>
  
  <div class="notice">
  NOTE: If you use an operator that does not require adding second input (i.e., x^2, sin, +/-), please only input number in the left hand text box and the operator. For instance, I type 5 in left text box, select x<sup class="small">2</sup>, and then select equal (or press Enter key!). That will be 25.
  This application is still working in progress.
  </div>
 
  