<!-- Marija Slijepčević 0342/2019-->
<!-- Jovan Dojčilović 0340/2019-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'css/sava.css'; ?>
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="/js.js"></script>
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
                <li><a href="<?= site_url("RegUser/viewEvents")?>" class = "dugmence">View events</a></li>  
                <li><a href="<?= site_url("RegUser/changeInfo")?>" class = "dugmence">Edit profile</a></li>  
                <li><a href="<?= site_url("RegUser/logout")?>" class = "dugmence">Logout</a></li> 
              </ul>
        </div>

    </nav>
<main class="main">
    <div class="sekcija">
        <div></div>
        
            <div class='artikal'>
              
                <br>
                <div class='box1'>
                    <font color="white" size="5"><b>Motivational letter:</b></font>


                 </div>

                <br>
                <textarea id="letter" id="" cols="80" rows="10"></textarea> <br>

               
                <br>
                <button hidden="hidden" id="hidden" value="<?php echo "$IdEvent" ?>"></button>
                <div>
                    <a href='<?= site_url("RegUser/viewEvents")?>'><button class = 'btn '  type='button' name='acc'>Back</button></a>    

                    <button class = 'btn '  type='submit' name='acc' onclick="submitLetter()">Submit</button>
                </div>
                <br>
          
        </div>
        <div></div>
        <div></div>
    </div>
</main>

</body>
</html>