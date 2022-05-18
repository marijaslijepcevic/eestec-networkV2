

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
                <li><a href = "memberPage.html" class = "dugmence">View events</a></li>  
                <li><a href = "memberChangeInfo.html" class = "dugmence">Edit profile</a></li>  
                <li><a href = "index.html" class = "dugmence">Logout</a></li>
              </ul>
        </div>

    </nav>
    
    <form action="#" method="post">

        <div class="container">
            <div></div>
            <div>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Ovde ce ici sifra dovucena iz baze" name="psw" required>
                <br>
                
                <label for="psw"><b>Repeat Password</b></label>
                <input type="password" placeholder="Ovde ce ici sifra dovucena iz baze" name="psw" required>
                <br>
                
                <label for="fistname"><b>First Name</b></label>
                <input type="text" placeholder="Ovde ce ime dovuceno iz baze" name="fistname" required>
                <br>
                
                <label for="lastname"><b>Last Name</b></label>
                <input type="text" placeholder="Ovde ce prezime dovuceno iz baze" name="lastname" required>
                <br>
                
                <div class = "razmak">
                    <label for="picture"><b>Submit a picture</b></label>
                    <input type="file" name="picture">
                    <br>
                </div>
                
                <div class = "buttons">
                    <div></div>
                    <div></div>
                    <div>
                        <!--ODLUCITI GDE TE VODI-->
                        <button class = "login" type="submit">Change Info</button>
                    </div>
                </div>

                <br>
            </div> 
            <div></div>
      </div>



    </form>    

</body>
</html>