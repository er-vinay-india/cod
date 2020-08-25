<html>
<body>
    <form  method="post" action="/address">
    @csrf
    <label >Address:</label><br>
    <label>Line 1:</label>
    <input name="address_line1" type=text><br>
    <label>Line 2:</label>
    <input name="address_line2" type=text><br>
    <label>landmark:</label>
    <input name="landmark" type=text><br>
    <label>pincode:</label>
    <input name="pincode" type=text><br>
    <label>City:</label>
    <input name="city" type=text><br>
    <label>Country:</label>
    <input name="country" type=text><br>
    <input name="" type=submit>

</body>
</html>