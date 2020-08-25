<html>
<body>
<form  method="post" action="/login">
@csrf
<label for="first">First Name:</label>
<input name="first_name" type=text/>
<label for="last">Last Name:</label>
<input name="last name" type=text/>
<div>
<label for="Gender">Gender:</label>
<label for="Gender">Male:</label>
<input type=radio name="gender" value="male"/>
<label for="Gender">Female:</label>
<input type=radio name="gender" value="female"/>
</div>
<label for="email">Email:</label>
<input name="email" type=email/><br>
<label for="mobile">mobile no.:</label>
<input name="contact_no" type=number/><br>
<label for="order">order</label>
<input name="order" type=text/><br>
<label for="address">address:</label>
<input name="address" type=text/><br>
<label for="favourite">favourite item</label>
<input name="favourite_item" type=text/><br>
<label for="mode">mode of payment:</label>
<input name="mode_of_payment" type=text/><br>
<label for="type">order type:</label>
<input name="order_type" type=text/><br>
<input type="submit">
</form>
</body>
</html>
