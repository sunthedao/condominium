<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Java</title>
</head>
<style>
   h1{
       text-align: center;
   }
</style>
<body>
        <h1> Welceom to JavaScript</h1>
</body>
</html>

<script>
  
 var person = {
     firstname : 'Tatchakorn',
     Lastname : 'Haemathulin',
     age : 28 ,
     car : ['lamboghini' , 'Sport'],
    //  embet object
    address : {
        street : 'srinakarin',
        city : 'Samutprakarn',
        stat : 'TH'
    },
    // function
    fullName : function(){
        return this.firstname + ' ' + this.Lastname ;
    }
 }
   console.log(person.fullName());
   


</script>