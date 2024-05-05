<?php
include('../dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php 
    include '../server/api.php';  


    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COURIER MANAGEMENT</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
    <nav>
        <label class="logo">Kourier</label>
        <div class="navigation">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../about.php">About</a></li>
                <li><a href="../contact.php">Contact</a></li>
                <?php if (isset($_SESSION['customer'])) : ?>
                    <li><a href="../request.php">Request</a></li>
                <li><a href="../profile.php" class="nav-link">Profile</a></li>
                <li><a href="../tracking.php" class="nav-link">Tracking</a></li>
                <li><a href="/admin/logout.php" class="nav-link">Logout</a></li>
                <?php else : ?>
                <!-- <li><a href="/admin/login.php" class="btnLogin-popup">Login</a></li> -->
                <?php endif; ?>
                  
            </ul>
        </div>
    </nav>
    <div class="login-container">
        <div class="box">
            <!------------------ Login Box --------------------->
            <div class="box-login" id="login">
                <div class="top-header">
                    <h3>Hello, Again</h3>
                    <small>We are happy to have you back.</small>
                </div>
                <div class="input-group">
                <form method="post">
                    <div class="input-field">
                        <input type="text" class="input-box" id="logEmail" name="email" required>
                        <label for="logEmail">Email address</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input-box" id="logPassword" name="password"  required>
                        <label for="logPassword">Password</label>
                         <div class="eye-area">
                                <div class="eye-box" onclick="myLogPassword()">
                                    <i class="fa-regular fa-eye" id="eye"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                                </div>
                         </div>
                    </div>
                    <div class="remember">
                        <input type="checkbox" id="formCheck" class="check">
                        <label for="formCheck"> Remember Me</label>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="input-submit" id="signin" name="signin" onclick="login(this.form)" value="Sign In">
                    </div>
                    <div class="forgot">
                        <a href="#">Forgot password?</a>
                    </div>
                    </form>
                </div>
            </div>
         <!-------------------- Register --------------------------->
          
         <div class="box-register" id="register">
            <div class="top-header">
                <h3>Sign Up, Now</h3>
                <small>We are happy to have you with us.</small>
            </div>
            <div class="input-group">
                <form action="" method="post">
                <div class="input-field">
                    <input type="text" class="input-box" id="regUser" name="name" required>
                    <label for="regUser">Username</label>
                </div>
                <div class="input-field">
                    <input type="text" class="input-box" id="regEmail" name="email" required>
                    <label for="regEmail">Email address</label>
                </div>
                <!-- <div class="input-field">
                    <input type="text" class="input-box" id="regPhone" name="phone" required>
                    <label for="regPhone">Phone No</label>
                </div> -->
                <!-- <div class="input-field">
                    <input type="nic" class="input-box" id="regNIC" name="nic" required>
                    <label for="regEmail">NIC Number</label>
                </div> -->
                <!-- <div class="input-field">
                    <input type="address" class="input-box" id="regaddress" name="address" required>
                    <label for="regEmail">Address</label>
                </div> -->
                <!-- <div class="input-field">
                    <select class="input-box" name="gender" id="gender" aria-label="Default select example" required>
                                <option value="1" selected>Male</option>
                                <option value="0">Female</option>
                            </select>
                    <label for="regGender">Gender</label>
                </div> -->
                <div class="input-field">
                    <input type="password" class="input-box" id="regPassword" name="password">
                    <label for="regPassword">Password</label>
                     <div class="eye-area">
                            <div class="eye-box" onclick="myRegPassword()">
                                <i class="fa-regular fa-eye" id="eye-2"></i>
                                <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                            </div>
                     </div>
                </div>
                <div class="remember">
                    <input type="checkbox" id="formCheck-2" class="check">
                    <label for="formCheck-2"> Remember Me</label>
                </div>
                <div class="input-field">
                    <input type="submit" class="input-submit" name="signup" value="Sign Up" onclick="addCustomerSelf(this.form)">
                </div>
                </form>
                
            </div>
        </div>


        <div class="switch">
            <a href="#" class="login" onclick="switchlogin()">Login</a>
            <a href="#" class="register" onclick="switchregister()">Register</a>
            <div class="btn-active" id="btn"></div>
        </div>
        </div>
     </div>
    <script>
         var x = document.getElementById('login');
         var y = document.getElementById('register');
         var z = document.getElementById('btn');
     
         function switchlogin(){
            x.style.left = "27px";
            y.style.right = "-350px";
            z.style.left = "0px";
         }
         function switchregister(){
            x.style.left = "-350px";
            y.style.right = "25px";
            z.style.left = "150px";
         }
       // view password codes
       
       
       function myLogPassword(){
        var a = document.getElementById('logPassword');
        var b = document.getElementById('eye');
        var c = document.getElementById('eye-slash');
        if(a.type === "password"){
            a.type = "text"
            b.style.opacity = "0";
            c.style.opacity = "1";
        }else{    
            a.type = "password"
            b.style.opacity = "1";
            c.style.opacity = "0";
        }
       }
       
       
       function myRegPassword(){
    var d = document.getElementById('regPassword');
    var b = document.getElementById("eye-2");
    var c = document.getElementById("eye-slash-2");
    if(d.type === "password"){
        d.type = "text"
        b.style.opacity = "0";
        c.style.opacity = "1";
    }else{    
        d.type = "password"
        b.style.opacity = "1";
        c.style.opacity = "0";
    }
    }
    </script>
    <script>

addCustomerSelf = (form) => {
let fd = new FormData(form);

if (fd.get("name").trim() != "") {
if (fd.get("email").trim() != "") {
    if (fd.get("password").trim() != "") {
              $.ajax({
                method: "POST",
                url: "../server/api.php?function_code=addCustomer",
                data: fd,
                success: function ($data) {
                  console.log($data);

                  if ($data > 0) {
                    errorMessage("This Customer Already Registerd!");
                  } else {
                    successToastRedirect("add_request.php");
                  }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function (error) {
                  console.log(`Error ${error}`);
                },
              });
    } else {
      errorMessage("Please Enter Password");
} 
}else {
errorMessage("Please Enter Email");
}
} else {
errorMessage("Please Enter Full Name");
}
};

</script>
<?php
include('./pages/footer.php');
?>