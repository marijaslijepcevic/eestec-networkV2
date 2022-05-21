<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'css/sava.css'; ?>
    </style>
    <script type="text/javascript" src="<?=base_url()?>/admin.js" ></script>
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
                <div class='lc'>
                    <div class='levaivica'>
                        
                           <?php echo 'Motivational letter:'; ?>
                    </div>

                    
                    <div class='opis'>
                         <textarea id="letter" id="" cols="30" rows="10"></textarea> <br>
 
                    </div>
                    
                    <div>
                        <a href='<?= site_url("RegUser/viewEvents")?>'><button class = 'btn '  type='button' name='acc'>Back</button></a>    
                    </div>
                    <div>                     
                    </div>
                    <div>
                    </div>
            </div>
        </div>
        <div></div>
        <div></div>
    </div>
</main>

</body>
</html>