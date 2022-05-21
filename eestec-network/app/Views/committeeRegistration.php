@@ -1,95 +1,95 @@
<!-- AUTOR JOVAN DOJCILOVIC -->

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
    <form action="<?php echo site_url("Gost/committeeRegisterClick") ?>" method="post">

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
                
                <label for="pswRepeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="pswRepeat" required>
                <br>
                
                <label for="comname"><b>Name of your Committee</b></label>
                <input type="text" placeholder="Enter Name of your Committee without 'LC'" name="comname" required>
                <br>
                
                <label for="university"><b>Name of your University</b></label>
                <input type="text" placeholder="Enter Name of your University" name="university" required>
                <br>
                <div class = "razmak">
                    <label for="picture"><b>Submit a picture</b></label>
                    <input type="file" name="picture">
                    <br>
                </div>
                <div class = "razmak">
                <label for="type"><b>Type of your Committee</b></label><br>
                <input type="radio" placeholder="Enter Username" name="type" value = "Local Committee" required> LocalCommittee
                <input type="radio" placeholder="Enter Username" name="type" value = "Junior Local Committee" required> Junior Local Committee
                <input type="radio" placeholder="Enter Username" name="type" value = "Observer" required> Observer
                <br>
                </div>
                
                <div class = "buttons">
                    <div></div>
                    <div></div>
                    <div>
                        <button class = "login" type="submit">Register</button>
                    </div>
                </div>

                <br>
            </div> 
            <div></div>
      </div>



    </form>    

</body>
</html>