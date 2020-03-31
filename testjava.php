<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <!-- css -->
    <!-- <link rel="stylesheet" href="style.css"> -->

    <!-- awesome Font -->
    <script src="https://kit.fontawesome.com/c1e251547b.js" crossorigin="anonymous"></script>
    <title>Test Java</title>
</head>
<style>
    h1 {
        text-align: center;
    }

    .t1 {
        text-align: center;
    }

    #div1 {
        background-color: yellow;
        border: 1px solid black;
        width: 200px;
        height: 30px;
        margin: 0 auto;
    }

    .btt {
        text-align: center;
        /* margin: 0 auto; */
    }
</style>

<body>
    <h1>Hi Lesson for JS</h1>
    <!-- <div class="container">


        <div id="div1" hidden ></div><br>

        <div class="btt">
            <button type="" id="btn1">Show</button>
            <button type="" id="btn2">hide</button>
            <button id="btn3"> toggle </button>
        </div>
    </div>

    <br>
    <br>
    <br> -->

    <!-- <div class="container">
        name : <input type="text" name="t1" id="t2">
    </div>
    <br>

    d

    <form action="">
        <div class="row">
            <div class="col-6">
                <input type="number" id="txt1">
                <input type="number" id="txt2">
                <input type="number" id="txt3">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" value="*" id="sub">Multiply</button>
                <button type="submit" value="/" id="div">Divide</button>
                <button type="submit" value="%" id="mod">Modulus</button>
                <button type="submit" value="+" id="add">Addition</button>
                <button type="submit" value="-" id="subt">Subtraction</button>
            </div>
        </div>
        </div>
    </form>

    





</body>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>

<script>
    $('button').on('click', function() {
        const v = $(this).val();
        event.preventDefault();

        const num1 = parseInt($('#txt1').val());
        const num2 = parseInt($('#txt2').val());
        const num3 = num1 + num2 ;
        // const num3 = parseInt($('#txt3').val());

        if (v === '*') {
            // console.log(num1 * num2);    
            num3 = num1 * num2;

        } else if (v === '/') {
            console.log(num1 / num2);
        } else if (v === '%') {
            console.log(num1 % num2);
        } else if (v === '+') {
            console.log(num1 + num2);
        } else if (v === '-') {
            console.log(num1 - num2);
        }

    })
    // $(function() {
    //     // เมื่อมีการกดปุ่ม หรือกดปุ่มค้า
    //     $("input").keydown(function() {
    //         $("input").css("background-color", "blue");
    //     })
    //     // หลังจากการกดปุ่ม การเอานิ้วขึ้นมาหลังจากกดปุ่ม
    //     $("input").keyup(function() {
    //         $("input").css("background-color", "green");
    //     })
    //     // $("input").keypress(function(){
    //     //     $("input").css("background-color","black");
    //     // })
    // })

    // $(function(){
    //     $("#btn1").click(function() {
    //         $("#div1").fadeIn(3000);
    //     });
    //     $("btn2").click(function(){
    //         $("#div1").fadeOut(3000);
    //     })
    // });
</script>