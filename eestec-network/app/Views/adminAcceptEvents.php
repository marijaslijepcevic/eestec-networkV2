<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'css/sava.css'; ?>
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
                <li><a href="<?= site_url("Admin/acceptEvents")?>">Accept events</a></li>  
                <li><a href="<?= site_url("Admin/deleteEvents")?>">Delete events</a></li>  
                <li><a href="<?= site_url("Admin/acceptCommittees")?>">Accept committees</a></li>  
                <li><a href="<?= site_url("Admin/index")?>">Logout</a></li>  
              </ul>
        </div>

    </nav>
<main class="main">
    <div class="sekcija">
        <div></div>
        
         <?php foreach ($events as $event) {?>  
            <div class='artikal'>  <!--artikal treba da bude resizable-->
            <div class='lc'>

                <div class='levaivica'>
                    <?php $event->picture?>
                   <!-- <img src='<?php echo base_url('images/jobfair.jpg')?>' alt='' width='100px' height='100px'>  <!--ovo treba iz baze-->
                </div>
                                <?php echo "
                <div class='box'>
                    <span class='levaivica'>
                        <h1>$event->eventName</h1>
                    </span>"?>
                    <span>
                         <?php
                        $committeeModel = new \App\Models\committeeModel();
                        $committee = $committeeModel->where('IdUser', $event->IdEventCom);
                         echo "<h4>$committee->committeeName</h4>"
                                ?>
                    </span>
                </div>
                <?php echo "
                <div class='opis'>
                    $event->description;
                </div>"?>
                <div>
                    <a href='<?= site_url("Admin/clickReadMoreEvent")?>'><button class = 'btn '  type='button'>Read more</button></a>
                </div>
                <div>
                    <a href='<?= site_url("Admin/clickAcceptEvent")?>'><button class = 'btn '  type='button'>Accept</button></a>
                </div>
                <div>
                    <a href='<?= site_url("Admin/clickDeclineEvent")?>'><button class = 'btn '  type='button'>Decline</button></a>
                </div>
            </div>
        </div>
        <div></div>
        <div></div>
         <?php }?>  
    </div>
</main>

</body>
</html>