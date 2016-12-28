<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("p").click(function(){
         $(this).parent().submit();
    });
});
</script>
</head>
<body>




<h3>this is for managers' tasks</h3>

<form action="/logout" method="POST" id="logout-form">
	{!! csrf_field()  !!}
	<p>Logout</p>

	<!--   onclick="document.getElementByID('logout-form').submit()"    -->
</form> 

		
</body>
</html>