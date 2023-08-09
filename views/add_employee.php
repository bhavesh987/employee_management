<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>
    <h1>Add Employee</h1>
    <form method="post">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required>
        <br>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required>
        <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <br>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="female">Female      
        <input type="radio" name="gender" value="male">Male      
        <input type="radio" name="gender" value="other">Other   
        </br>   
        <label for="password">Password:</label>
        <input type="password" id="txtNewPassword" name="password" required>
        <br>
        <label for="repassword">Re-Password:</label>
        <input type="password" id="txtConfirmPassword" onChange="isPasswordMatch();" name="repassword" required>  
        <div id="divCheckPassword"></div>
        <br>
        <input type="submit" id='add_employee_submit' value="Add Employee">
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
