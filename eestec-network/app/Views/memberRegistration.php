<!-- Marija Slijepčević 0342/2019-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'css/jovan.css'; ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Feed</title>
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
                        <?php
                        $committeeModel = new \App\Models\committeeModel();
                        $committees = $committeeModel->findAll();
                        foreach ($committees as $committee) {  ?>
                            <option  value = '<?php echo $committee->committeeName?>'>
                          
                        <?php }
                         
                       ?>
                        
                      
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
                        <button class = "login redButton" type="submit">Register</button>
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