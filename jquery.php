<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
    .test{
        border: 1px solid black;
        text-align: center;
    }
    </style>
</head>

<body>

    <h1>Hi Lesson for JS</h1>
    <div class="container">


        <div id="div1" hidden></div><br>

        <div class="btt">
            <button type="" id="btn1">Show</button>
            <button type="" id="btn2">hide</button>
            <button id="btn3"> toggle </button>
        </div>
    </div>

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
    <br>
    <br>
    <br>
    <div class="JUNK">
    <button id="cm" name="cm">CLICK ME</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        $('button').on('click', function() {
        const v = $(this).val();
        event.preventDefault();

        const num1 = parseInt($('#txt1').val());
        const num2 = parseInt($('#txt2').val());
        let num3 = '';
        // const num3 = parseInt($('#txt3').val());

        if (v === '*') {
            // console.log(num1 * num2);    
            
            num3 = num1 * num2;
            console.log(num3);
            $("#txt3").val(num3) ;
            // $("#txt3").attr("value","num3");
        } else if (v === '/') {
            num3 = num1 / num2 ;
            $("#txt3").val(num3) ;
            // console.log(num1 / num2);
        } else if (v === '%') {
            num3 = num1 % num2 ;
            $("#txt3").val(num3) ;
            // console.log(num1 % num2);
        } else if (v === '+') {
            num3 = num1 + num2 ;
            $("#txt3").val(num3) ;
            // console.log(num1 + num2);
        } else if (v === '-') {
            num3 = num1 - num2 ;
            $("#txt3").val(num3) ;
            // console.log(num1 - num2);
        }

    })
        $(function(){
            $("#cm").click(function(){
                $(".JUNK").addClass("test");
            })
            // $("#cm").click(function(){
            //     $(".JUNK").toggleClass("test");
            // })
        })

        // $(function() {
        //     $("#btn1").click(function() {
        //         $("#div1").fadeIn(3000);
        //     });
        //     $("#btn2").click(function() {
        //         $("#div1").fadeOut(3000);
        //     });
        //     $("#btn3").click(function() {
        //         $("#div1").fadeToggle(3000);
        //     });
     
        // });


    </script>
</body>

</html>