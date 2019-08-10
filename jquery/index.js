$(document).ready(function () {
    var input1 = '0';
    var input2 = 0;
    var operator = '';
    var total = 0;

    calculateMe(total);

    $("label").on('click', function (evt) {
      var clicked = $(this).html();
      console.log(clicked);

      //Add values to the total box for each button pressed

      if (clicked === "AC") {
        total = 0;
        input1 = '0';
      } else if (clicked === "+/-") {
        input1 *= -1;
      } else if (clicked === '.') {
        input1 += '.';
      } else if (clicked === 'Del') {
        input1 = input1.substring(0, input1.length - 1);
      } else if (clickNum(clicked)) {
        if (input1 === '0')
          input1 = clicked;

        else input1 = input1 + clicked;

      } else if (clickOperator(clicked)) {
        input2 = parseFloat(input1);
        operator = clicked;
        input1 = '';
      } else if (clicked === '%') {
        input1 = input1 / 100;
      } else if (clicked === '=') {
        input1 = calculateNow(input2, input1, operator);
        operator = null;
      }



      calculateMe(input1);
    });

  });

  calculateMe = function (data) {
    var data = data.toString();
    $('#total').html(data.substring(0, 10)).val(data);
  };

  clickNum = function (num) {
    return !isNaN(num);
  }

  clickOperator = function (op) {
    return op === '/' || op === '*' || op === '+' || op === '-';
  };



  calculateNow = function (firstNum, secNum, operator) {

    //Process the operator based on what operator(s) are used.

    firstNum = parseFloat(firstNum);
    secNum = parseFloat(secNum);
    console.log(firstNum, secNum, operator);
    switch (operator) {
      case '+':
        return firstNum + secNum;
        break;

      case '-':
        return firstNum - secNum;
        break;

      case '*':
        return firstNum * secNum;
        break;

      case '/':
        return firstNum / secNum;
        break;

      default:

    }

  }


//Work on adding Keyboard input later
