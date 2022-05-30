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
    <nav class="nav justify-content-center">
        <div>
            <ul class="ul">
                <li><a href="<?= site_url("RegUser/viewEvents")?>" class = "dugmence">View events</a></li>  
                <li><a href="<?= site_url("RegUser/changeInfo")?>" class = "dugmence">Edit profile</a></li>  
                <li><a href="<?= site_url("RegUser/logout")?>" class = "dugmence">Logout</a></li>
              </ul>
        </div>
    </nav>
    
<main class="main">
    <div class="container">
        <div class="col-sm-1">&nbsp;</div>
        
        <div class='artikal col-sm-11'>
            <div class="lc container">
                
                <br>
                
                <div class='row-cols-1'>
                    <font color="white" size="5"><b>Motivational letter:</b></font>
                 </div>
                
                <br>
                
                <div class='row'>
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-8">
                    <textarea id="letter" class="form-control" id="" cols="80" rows="10"></textarea> <br>
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>  
                
                <br>
                
                <button hidden="hidden" id="hidden" value="<?php echo "$IdEvent" ?>"></button>
                <div class="row">
                    
                    <div class="col-sm-6">
                        <a href='<?= site_url("RegUser/viewEvents")?>'><button class = 'dugme'  type='button' name='acc'>Back</button></a>    
                    </div>
                    
                    <div class="col-sm-6">
                        <button class = 'dugme'  type='submit' name='acc' onclick="submitLetter()">Submit</button>
                    </div>
                </div>
                <br>
            </div>
        </div>
        
        <div class="col-sm-1">&nbsp;</div>
    </div>
</main>

</body>
</html>