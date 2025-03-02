<?php
session_start();

if(isset($_POST['submit'])) {
    include 'config.php';
	
    $name = $_POST['fname'];
    $password = $_POST['pwd'];
	
    $getdata = "select * from register_mast where name='$name' AND password='$password' ";
    $getresult = mysqli_query($link , $getdata);
    $getdatar = mysqli_fetch_array($getresult);
	
    if(!empty($getdatar)) {
        $_SESSION['username'] = $name;
        echo "<script> 
                alert('Successfully logged in');
                document.location.href = 'menu_home.php';
              </script>";
    } else {
        echo "<script> 
                alert('Username and password not matched');
                document.location.href = 'login.php';
              </script>";
    }
}
?>

<html>
<head>


     <script src="jquery-3.7.0.js"> </script>
<!--
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <style>
        #submit {
            background-color: grey;
        }
        
        div.error {
            color: red;
            font-size: 16px;
            font-weight: bold;
			padding:1px;
            margin-top: 1px; /* Added margin for better spacing */
        }

    </style>

    <link rel="stylesheet" href="style1.css">
    <script>
        $(document).ready(function() {
            $("#loginForm").validate({
                rules: {
                    fname: {
                        required: true
                    },
                    pwd: {
                        required: true,
                        minlength: 6,
                        maxlength: 15
                    }
                },
                messages: {
                    fname: {
                        required: "Please enter your username."
                    },
                    pwd: {
                        required: "Please enter your password.",
                        minlength: "Password must be at least 6 characters long.",
                        maxlength: "Password must not exceed 15 characters."
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
	
	
   <script>
       function blink_text() {
		   $('#blink').fadeOut(500);
		   $('#blink').fadeIn(500);  
	   }
	   setInterval(blink_text,1500);
   </script>
</head>

<body bgcolor="lightyellow">
    <div id="login-form1">
        <img src="user.png" id="user-logo">
        <form method="POST" id="loginForm" novalidate>
            <h1 id="blink"> LOGIN </h1>
            <br>
            Username: <input type="text" placeholder="Enter Your Username" name="fname" ng-model="student.fname" ng-required="true" />
            <br><br>
            Password: <input type="password" placeholder="Enter Your Password" name="pwd" ng-minlength="6" ng-maxlength="15" ng-model="pwd"  />
            <br><br><br>
            <button type="submit" id="submit" name="submit">Submit</button> &nbsp; 
            <button id="submit"><a href="home.php">back</a></button> 
            <br><br>
            <a href="forget_pass.php" class="btn btn-sm btn-warning">Forgot Password?</a>
        </form>
    </div>
</body>
</html>
