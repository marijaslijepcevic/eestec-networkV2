<!-- Marija Slijepčević 0342/2019-->
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
                    <a href='<?= site_url("RegUser/eventReadMore/$event->IdEvent")?>'><button class = 'btn '  type='submit' name='rdmacc' value = <?php echo $event->IdEvent?>>Read more</button></a>   
                </div>
                <div>
                    <?php
                    $eventAppl = new \App\Models\eventApplicationModel;
                    $row = $eventAppl->where("IdEvent", $event->IdEvent)->where("IdUser", $user->IdUser)->findAll();
                    if($row==null && $event->finishedSelection==0): ?>
                        <a href='<?= site_url("RegUser/apply/$event->IdEvent")?>'><button class = 'btn '  type='button' name='acc' value = '<?php echo $event->IdEvent?>'>Apply</button></a>
                    <?php endif; ?>
                    <?php if($row!=null || $event->finishedSelection==1) : ?>
                         <input style="visibility:hidden;" type="button" value="Apply!" disabled>
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