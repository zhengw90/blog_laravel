<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("a").click(function(){
         $(this).parent().submit();
    });
});
</script>
</head>
<body>


Total earnings is 99999

<br>

<form action="/logout" method="POST" id="logout-form">
	{!! csrf_field()  !!}
	
	<a href="#" onclick="document.getElementByID('logout-form').submit()" >Logout</a>
</form> 


</body>
</html>