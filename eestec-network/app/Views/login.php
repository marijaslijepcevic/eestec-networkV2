
<!DOCTYPE html>
<html>
<title>eestec-network</title>
<head>
   
    <style>
        <?php include 'css/jovan.css'; ?>
    </style>
</head>
<body>
    <header class="header">
        <div class="wrapper">
            <div class="left">
             
             <img src="<?php echo base_url('images/eestec.png')?>" alt=""  width="300px" height="135px">
                
            </div>
            <div class="right">
                <span class="helper"></span>
                <img src="<?php echo base_url('images/eestectekst.svg')?>" alt=""  width="300px" height="135px">
            
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
    
    <form action="<?php echo site_url("Gost/loginSubmit") ?>" method="post">

        <div class="container">
            <div></div>
            <div>
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <br>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <div class = "buttons">
                    <div>
                        <a href="<?= site_url("Gost/register")?>"><button class = "register "  type="button">Register</button></a>
                       <!-- <a href = "registrationPicker.html" class = "dugmence"> </a>  ovo treba da se sredi u cssu-->
                    </div>
                    <div></div>
                    <div>
                        <button class = "login" type="submit">Login</button>
                        <!--<a href = "adminAcceptEvents.html" class = "dugmence">-->
                    </div>
                </div>

                <br>

                <a href ="guestPage.html" class = "guestLogin">Continue as a Guest?</a>
            </div> 
            <div></div>
      </div>



    </form>    
    
</body>


</html>