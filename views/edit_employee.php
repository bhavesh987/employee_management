<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" value="<?php echo $employee['fname']; ?>" required>
        <br>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" value="<?php echo $employee['lname']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $employee['email']; ?>" required>
        <br>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="female">Female      
        <input type="radio" name="gender" value="male">Male      
        <input type="radio" name="gender" value="other">Other  
        <br>
        <label for="password">Password:</label>
        <input type="password" id="txtNewPassword" name="password" value="<?php echo $employee['password']; ?>" required>
        <br>
        <label for="repassword">Re-Password</label>
        <input type="password" id="txtConfirmPassword" onChange="isPasswordMatch();" value="" required>
        <div id="divCheckPassword"></div>
        <br>
        <input type="submit" id='update_employee_submit' value="Update Employee">
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
