<html lang="en">
<head>
    <link rel="icon" href="favicon.ico" type="image/x-icon" >
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link href="donate.css" rel="stylesheet" >
	<title>RoseUp- Donate </title>
</head>

<body onload="myMove()">

    <?php 
         
    include("config1.php");
    if(isset($_POST['submit'])){
       $username = $_POST['username'];
       $email = $_POST['email'];
      
       

    //verifying the unique email

    $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

    if(mysqli_num_rows($verify_query) !=0 ){
       echo "<div class='message'>
                 <p>This email is used, Try another One Please!</p>
             </div> <br>";
       echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
    }
    else{

       mysqli_query($con,"INSERT INTO users(Username,Email) VALUES('$username','$email')") or die("Erroe Occured");

       echo "<div class='message'><p>Registration successfully!</p></div> <br>";
       echo "<a href='index.php'><button class='btn'>Login Now</button>";
    

    }

    }else{
    
   ?>

    <div id="myContainer">

        <div class="wrapper">

            <form action="" method="POST">
                <h1>DONATE</h1>
                <br><p>Select gift frequency </p>
                <div class="box">

                    <div class="time">
                        <br><span>Monthly</span>
                        <br><span>Onetime</span>
                    </div>

                    <br><p>Select amount </p>
                    <div class="value">
                        <span class="money">$12</span>
                        <span class="money">$30</span>
                        <span class="money">$40</span>
                        <span class="money">$50</span>
                        <span class="money">$60</span>   
                    </div>
                    <br><div class="remember-forgot">
                        <label><input type="checkbox">Yes i will generously add $0.3 to cover the transaction</label> 
                    </div>

                </div>

                <div class="input-box">
                <input type="text" placeholder="username" id="username" autocomplete="off" required> 
                    <i class='bx bxs-user'></i>  
                </div>

                <div class="input-box">
                <input type="text" placeholder="Email" name="email" id="email" autocomplete="off" required>
                    <i class='bx bx-envelope'></i>
                </div>

                <p>Give in honor to Help </p>
                <button type="submit" class="btn">Donate now</button>
        
                <p>By donating, you agree to our <span class="blue">terms of service</span> and <span class="blue">privacy policy</span></p>
            
           </form>
        </div> 

        
    </div> 
    <div id="myAnimation"></div>
    <script>
        function myMove() {
          var elem = document.getElementById("myAnimation");
          var pos = 0;
          var direction = 1; // 1 pour le mouvement vers le bas, -1 pour le mouvement vers le haut
          var id;
          var colors = ["red", "green", "blue"]; // Couleurs pour l'ombre
          var colorIndex = 0; // Index de la couleur actuelle
        
          function frame() {
            if (pos === 350) {
              direction = -1; // Inverser la direction lorsque l'élément atteint la position finale
              changeShadowColor(); // Changer la couleur de l'ombre
            } else if (pos === 0) {
              direction = 1; // Inverser la direction lorsque l'élément revient à la position initiale
              changeShadowColor(); // Changer la couleur de l'ombre
            }
        
            pos += direction; // Mettre à jour la position en fonction de la direction
        
            elem.style.top = pos + 'px';
            elem.style.left = pos + 'px';
          }
        
          function changeShadowColor() {
            colorIndex = (colorIndex + 1) % colors.length; // Passer à la couleur suivante
            var color = colors[colorIndex];
            elem.style.boxShadow = `0 0 10px ${color}`; // Mettre à jour la couleur de l'ombre
          }
        
          id = setInterval(frame, 10);
        }
    </script> 
    <?php } ?>
</body>
</html>