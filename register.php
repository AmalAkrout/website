<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="favicon.ico" type="image/x-icon" >
    
    <link rel="stylesheet" href="style.css">
    <title>RoseUp - Sign Up</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Erroe Occured");

            echo "<div class='message'><p>Registration successfully!</p></div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>

            <header>Sign Up</header>
            <form action="" method="POST">
                <div class="field input"  calss="input-box">
                    <label for="username">Username</label>
                    <input type="text" placeholder="username" id="username" autocomplete="off" required> 
                      
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Email" name="email" id="email" autocomplete="off" required>
                    
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age"  placeholder="Age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>