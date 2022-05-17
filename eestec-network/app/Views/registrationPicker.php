
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
    
    <div class = "center">
        <h1>What are you?</h1>
    
    <div class = "whatAreYou">
        <div></div>
        <div>
            <a href = "<?php echo site_url("Gost/committeeRegister") ?>" class = "dugmence"><button class = "redButton"><h1>Local Comitee</h1></button></a>
 
        </div>
        <div></div>
        <div>
            <a href = "<?php echo site_url("Gost/memberRegister") ?>" class = "dugmence"><button class = "redButton"><h1>Member</h1></button></a>
           
        </div>
        <div></div>
    </div>
    </div>


</body>
</html>