<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <input type="button" name="btnGetJson" id="btnGetJson" value="Get Json">
    <div id="content"></div>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {

        $("#btnGetJson").click(function() {

            $.ajax({
                type: "POST",
                url: "newapi.php",
                data: '',
                success: function(result){
                    var content = '';
                    $.each(result, function(i,item){ // loop
                        content = content + "id : " + item.id + "Firstname : " + item.Firstname + "Lastname : " +item.Lastname + "Email: " + item.Email + "MobileNo : " +item.MobileNo + "Address : " +item.Address + '<br>';

                    });  //loop
                    $('#content').html(content);
                }

            })

        })




    })
</script>