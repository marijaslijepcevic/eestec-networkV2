<!-- Jovan Dojčilović 0340/2019-->
<!DOCTYPE html>
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
                <li><a href="<?= site_url("Gost/index")?>" class = "dugmence">Login</a></li>  
              </ul>
        </div>

    </nav>
<main class="main">
    <div class="sekcija">
        <div></div>
        
            <div class='artikal'>
                <div class='lc'>
                    <div class='levaivica'>
                        
                           <?php echo '<img src = "data:image/jpeg;base64,'.base64_encode($event->picture).'"/ alt="" width="100px" height="100px">'; ?>
                    </div>

                    <div class='box'>
                        <span class='levaivica'>
                            <?php echo "
                            <h1>$event->eventName</h1>
                               " ?>
                        </span>
                        <span>
                             <?php
                            $committeeModel = new \App\Models\committeeModel();
                            $committee = $committeeModel->where('IdUser', $event->IdEventCom);
                             echo "<h4>$committee->committeeName</h4>"
                                    ?>
                        </span>
                    </div>

                    <div class='opis'>
                        <?php echo "
                        $event->description; <br>
                        Tip: $event->type; <br>
                        Broj participanata: $event->numOfParticipants; <br>
                        Datum: $event->dateStart - $event->dateEnd; <br>
                        "?>
                        <br>
 
                    </div>
                    
                    <div>
                        <a href='<?= site_url("Gost/guestPage")?>'><button class = 'btn '  type='button' name='acc'>Back</button></a>    
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