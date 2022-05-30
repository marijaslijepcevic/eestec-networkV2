<!-- Marija Slijepčević 0342/2019-->
<!-- Sava Andrić 0365/2019-->
<!-- Jovan Dojčilović 0340/2019-->
<!DOCTYPE html>
<html>
<title>eestec-network</title>
<head>
   
    <style>
        <?php include 'css/jovan.css'; ?>
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="header">
        <div class="omotac">
            <div class="left">
                <img src="<?php echo base_url('images/eestec.png')?>" alt=""  width="60%" height="auto">
              
            </div>
            <div class="right">
                <span class="pomagac"></span>
                   <img src="<?php echo base_url('images/eestectekst.svg')?>" alt=""  width="60%" height="auto">
            </div>
        </div>
    </header>
    <nav class="nav">
        <div>
            <ul class="ul">
                <li></li>
              </ul>
        </div>
    </nav>
        <?php if(isset($msg)) echo "<p  style='text-align:center; color: red;'>$msg</p>"; ?>
    <form action="<?php echo site_url("Gost/loginSubmit") ?>" method="post">

        <div class="container">
            <div></div>
            <div >
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <br>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <div class = "buttons">
                    <div>
                        <a href="<?= site_url("Gost/register")?>"><button class = "register "  type="button">Register</button></a>
                      
                    </div>
                    <div></div>
                    <div class="">
                        <button class = "login redButton" type="submit">Login</button>
                    
                    </div>
                </div>

                <br>

                <a href="<?= site_url("Gost/guestPage")?>" class = "guestLogin">Continue as a Guest?</a>
            </div> 
            <div></div>
      </div>



    </form>    
    
</body>


</html>