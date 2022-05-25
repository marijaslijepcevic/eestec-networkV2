<!-- Jovan Dojčilović 0340/2019-->
<!-- Marija Slijepčević 0342/2019-->
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
                <li><a href = "<?= site_url("LocalCommittee/viewEvents")?>">View events</a></li>
                <li><a href = "<?= site_url("LocalCommittee/acceptMembers")?>">Accept members</a></li>
                <li><a href="<?= site_url("LocalCommittee/publishEvents")?>">Publish event</a></li>
                <li><a href="<?= site_url("LocalCommittee/changeInfo")?>">Edit profile</a></li>  
                <li><a href="<?= site_url("LocalCommittee/logout")?>">Logout</a></li>
              </ul>
        </div>

    </nav>
<main class="main">
    <div class="sekcija">
        <div></div>
        <?php foreach ($events as $event) {?>  
        <div class="artikal">  <!--artikal treba da bude resizable-->
            <div class="lc">
                <div class="levaivica">
                    <?php $event->picture?>
                    
                   <?php echo '<img src = "data:image/jpeg;base64,'.base64_encode($event->picture).'"/ alt="" width="100px" height="100px">'; ?>
                </div>
               <div class='box1'>
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
                    <a href='<?= site_url("LocalCommittee/eventReadMore/$event->IdEvent/3")?>'><button class = 'btn '  type='submit' name='rdmacc' value = <?php echo $event->IdEvent?>>Read more</button></a>   
                </div>
                <div>
                    <?php if($event->finishedSelection == 1) : ?>
                    <input style="visibility:hidden;" type="button" value="Accept participants" disabled>
                    <?php endif; ?>
                    <?php if($event->finishedSelection == 0) : ?> 
                        <a href='<?= site_url("LocalCommittee/acceptParticipants/$event->IdEvent")?>'><button class = 'btn '  type='button' name='acc' value = '<?php echo $event->IdEvent?>'>Accept participants</button></a>
                     <?php endif; ?>
                </div>
                <div>
                    <?php if($event->openApplications == 0) : ?>
                    <input style="visibility:hidden;" type="button" value="Close applications!" disabled>
                    <?php endif; ?>
                    <?php if($event->openApplications == 1) : ?>
                        <a href='<?= site_url("LocalCommittee/closeApplications/$event->IdEvent")?>'><button class = 'btn '  type='button' name='acc' value = '<?php echo $event->IdEvent?>'>Close applications</button></a>
                     <?php endif; ?>
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