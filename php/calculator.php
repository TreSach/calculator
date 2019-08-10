<?php 
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Scientific PHP Calculator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Patua+One&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<script>
    //Trigger operator input when the button is clicked. When Equal button is clicked, it process the operation using the selected operator.
    $(document).ready(function () {
        $('label').click(function () {
            $('label').removeClass('selected');
            var select = $(this).addClass('selected');
            if (select) {
                $('input[type="radio"][id="+this.id+"]').attr('checked', true);
            }

        });
    })

</script>

<body>
    <form method="POST" action="calculator.php" enctype="multipart/form-data" class="box" id="calc-form">

        <?php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {

        ?>
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
        <?php } else {  ?>

        <input type="text" name="result" value="<?php if(is_infinite($output)){
    print "UNDEFINED"; } else{ print $output; } ?>" class="success" id="result" readonly>

        <?php
            }
    }
        ?>
        
        <div class="num">
            <input type="text" name="int1" value="<?php print $int1; ?>" placeholder="First Number">
            <input type="text" name="int2" value="<?php print $int2; ?>" placeholder="Second Number" id="break-it">
        </div>
        <div class="num">

        </div>

        <div class="btn">

            <input type="radio" value="x^2" name="op" id="x^2"><label for="x^2">x<sup class="small">2</sup></label>

            <input type="radio" value="log10" name="op" id="log10"><label for="log10">log<sub
                    class="small">10</sub></label>
            <input type="radio" value="sqrt" name="op" id="sqrt"><label for="sqrt">&#8730;</label>

            <input type="radio" value="%" name="op" id="%"><label for="%">%</label>
            <input type="radio" value="e" name="op" id="e"><label for="e">e</label>
            <input type="radio" value="+" name="op" id="+"><label for="+" class="basic">+</label></div>

        <div class="btn">

            <input type="radio" value="x^y" name="op" id="x^y"><label for="x^y">x<sup class="small">y</sup></label>

            <input type="radio" value="e^x" name="op" id="e^x"><label for="e^x">e<sup class="small">x</sup></label>

            <input type="radio" value="sin" name="op" id="sin"><label for="sin">sin</label>

            <input type="radio" value="cos" name="op" id="cos"><label for="cos">cos</label>

            <input type="radio" value="tan" name="op" id="tan"><label for="tan">tan</label>

            <input type="radio" value="-" name="op" id="-"><label for="-" class="basic">-</label>
        </div>


        <div class="btn">

            <input type="radio" value="ln" name="op" id="ln"><label for="ln">ln</label>

            <input type="radio" value="pi" name="op" id="&pi;"><label for="&pi;">&pi;</label>

            <input type="radio" value="sin^-1" name="op" id="sin^-1"><label for="sin^-1">sin<sup
                    class="small">-1</sup></label>

            <input type="radio" value="cos^-1" name="op" id="cos^-1"><label for="cos^-1">cos<sup
                    class="small">-1</sup></label>

            <input type="radio" value="tan^-1" name="op" id="tan^-1"><label for="tan^-1">tan<sup
                    class="small">-1</sup></label>

            <input type="radio" value="*" name="op" id="*"><label for="*" class="basic">x</label>
        </div>

        
        <div class="btn">

            <input type="radio" value="cubert" name="op" id="cubert"><label for="cubert">&#8731;</label>

            <input type="radio" value="nthrt" name="op" id="nthrt"><label for="nthrt"><sup
                    class="small">x</sup>&#8730;</label>

            <input type="radio" value="sinh" name="op" id="sinh"><label for="sinh">sinh</label>

            <input type="radio" value="cosh" name="op" id="cosh"><label for="cosh">cosh</label>

            <input type="radio" value="tanh" name="op" id="tanh"><label for="tanh">tanh</label>

            <input type="radio" value="/" name="op" id="/"><label for="/" class="basic">&divide;</label>
        </div>

        <div class="btn" id="eq">
            <input type="radio" value="x!" name="op" id="x!"><label for="x!">x!</label>

            <input type="radio" value="sinh^-1" name="op" id="sinh^-1"><label for="sinh^-1">sinh<sup
                    class="small">-1</sup></label>

            <input type="radio" value="cosh^-1" name="op" id="cosh^-1"><label for="cosh^-1">cosh<sup
                    class="small">-1</sup></label>

            <input type="radio" value="tanh^-1" name="op" id="tanh^-1"><label for="tanh^-1">tanh<sup
                    class="small">-1</sup></label>

            <input type="submit" value="=" class="basic">
        </div>

    </form>

    <div class="notice">
        NOTE: If you use an operator that does not require adding second input (i.e., x^2, sin, x!), please only input
        number in the left hand text box and the operator. For instance, I type 5 in left text box, select x<sup
            class="small">2</sup>, and then select equal (or press Enter key!). That will be 25.
        This application is still working in progress.
    </div>
 
  