<!-- Sava Andrić 0365/2019-->
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
                <li><a href="<?= site_url("Admin/acceptEvents")?>">Accept events</a></li>  
                <li><a href="<?= site_url("Admin/deleteEvents")?>">Delete events</a></li>  
                <li><a href="<?= site_url("Admin/acceptCommittees")?>">Accept committees</a></li>  
                <li><a href="<?= site_url("Admin/logout")?>">Logout</a></li>  
              </ul>
        </div>

    </nav>
<main class="main">
    <div class="sekcija">
        <div></div>
        
         <?php foreach ($events as $event) {?>  
            <div class='artikal'>  
                <div class='lc'>

                    <div class='levaivica'>

                       <?php echo '<img src = "data:image/jpeg;base64,'.base64_encode($event->picture).'"/ alt="" width="100px" height="100px">'; ?>
                    </div>

                    <div class='box'>
                        <span class='levaivica'>
                            <?php
                            $committeeModel = new \App\Models\committeeModel();
                            $committee = $committeeModel->find($event->IdEventCom);
                            echo "
                            <h1>$event->eventName - $committee->committeeName</h1>
                                
                               " ?>
                        </span>
                    </div>

                    <div class='opis'>
                        <?php echo "
                        $event->description
                        "?>
                    </div>
                    <div>
                        <a href='<?= site_url("Admin/eventReadMore/$event->IdEvent/1")?>'><button class = 'btn '  type='submit' name='rdmacc' value = <?php echo $event->IdEvent?>>Read more</button></a>
                    </div>
                    <div>
                      <a href='<?= site_url("Admin/acceptEvents/$event->IdEvent/1")?>'><button class = 'btn '  type='button' name='acc' value = '<?php echo $event->IdEvent?>'>Accept</button></a>
                    </div>
                    <div>
                        <a href='<?= site_url("Admin/acceptEvents/$event->IdEvent/2")?>'><button class = 'btn '  type='submit' name='dec' value = '<?php echo $event->IdEvent?>'>Decline</button></a>
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