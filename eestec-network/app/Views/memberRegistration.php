
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'css/jovan.css'; ?>
    </style>
    <title>Feed</title>
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
    <?php if(isset($msg)) echo "<p  style='text-align:center; color: red;'>$msg</p>"; ?>
    <form action="<?php echo site_url("Gost/memberRegisterClick") ?>" method="post">

        <div class="container">
            <div></div>
            <div>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
                <br>
                
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <br>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <br>
                
                <label for="psw"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="pswRepeat" required>
                <br>
                
                <label for="fistname"><b>First Name</b></label>
                <input type="text" placeholder="Enter your First Name" name="fistname" required>
                <br>
                
                <label for="lastname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter your Last Name" name="lastname" required>
                <br>
                
                <div class = "razmak">
                <label for="committee"><b>Select your Committee</b></label>
                <input list="browsers" name="committee" required>
                    <datalist id="browsers">
                        <option value="LC Belgrade">
                        <option value="Observer Guimares">
                        <option value="JLC Porto">
                    </datalist>
                </div>
                
                <div class = "razmak">
                    <label for="picture"><b>Submit a picture</b></label>
                    <input type="file" name="picture">
                    <br>
                </div>
                
                <div class = "buttons">
                    <div></div>
                    <div></div>
                    <div>
                        <button class = "login" type="submit">Register</button>
                        <!-- memberPage -->
                    </div>
                </div>

                <br>
            </div> 
            <div></div>
      </div>



    </form>    

</body>
</html>