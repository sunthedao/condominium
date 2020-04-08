<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="style.css">

    <!-- awesome Font -->
    <script src="https://kit.fontawesome.com/c1e251547b.js" crossorigin="anonymous"></script>


</head>

<body>

    <!-- <button type="submit" onclick="window.print()">HI</button> -->

    <input type="number" id="ta" name="ta">
    <input type="number" id="ts" name="ts">
    <input type="number" id="td" name="td">
    <br>
    <input type="submit" id="dd" name="dd" value="CLICK">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

<script>
    $(document).ready(function() {
        $('#dd').on('click',function() {
            // const num1 = parseInt($('#txt1').val());
            $t1 = parseInt($('#ta').val());
            $t2 = parseInt($('#ts').val());
            $t3 = ($t1 - $t2) * 12;
            $('#td').val($t3);
            // console.log($t3);
            

        });

    });
</script>

</html>