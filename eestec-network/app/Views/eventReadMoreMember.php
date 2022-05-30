<!DOCTYPE html>
<!-- Jovan Dojčilović 0340/2019-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'css/sava.css'; ?>
    </style>
    <script type="text/javascript" src="<?=base_url()?>/admin.js" ></script>
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
            <div class='lc container'>
                
                <div class='row'>
                    <div class='levaivica col-sm-2'>

                           <?php echo '<img src = "data:image/jpeg;base64,'.base64_encode($event->picture).'"/ alt="" width="100px" height="100px">'; ?>
                    </div>

                    <div class='kutija col-sm-10 text-center'>
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
                </div>

                <div class='opis row-cols-1'>
                  <?php echo "
                    $event->description; <br>
                    Type of Event: $event->type; <br>
                    Number of Participants: $event->numOfParticipants; <br>
                    Dates: $event->dateStart - $event->dateEnd; <br>
                     "?>
                    <?php
                    if($event->finishedSelection==1):?>
                         <?php echo "Participants :             "?>
                    <?php  
                        $eventAppModel = new \App\Models\eventApplicationModel();
                        $applications = $eventAppModel->where('IdEvent', $event->IdEvent)->where('isAccepted', 1)->findAll();
                        
                        foreach ($applications as $application){
                            $reguserModel = new App\Models\regUserModel;
                            $user = $reguserModel->where("IdUser", $application->IdUser)->first();
                            ?>
                             <?php echo "$user->name $user->surname <br>"?>
                      <?php   }
                    endif; ?>
                    <br>
                </div>

                <div class='row-cols-1 dugmad'> 
                    <a href='<?= site_url("RegUser/viewEvents")?>'><button class = 'dugme'  type='button' name='acc'>Back</button></a>    
                </div>

        </div>
        </div>
    </div>
</main>

</body>
</html>