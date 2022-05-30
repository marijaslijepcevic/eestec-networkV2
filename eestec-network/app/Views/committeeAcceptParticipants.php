<!--Marija Slijepčević 2019/0342-->
<!-- Sava Andrić 0365/2019-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'css/marija.css'; ?>
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
                <li><a href = "<?= site_url("LocalCommittee/viewEvents")?>">View events</a></li>
                <li><a href = "<?= site_url("LocalCommittee/acceptMembers")?>">Accept members</a></li>
                <li><a href="<?= site_url("LocalCommittee/publishEvents")?>">Publish event</a></li>
                <li><a href="<?= site_url("LocalCommittee/changeInfo")?>">Edit profile</a></li>  
                <li><a href="<?= site_url("LocalCommittee/logout")?>">Logout</a></li>
              </ul>
        </div>

    </nav>
<main>
    <br>
    <h1 id="list">List of Participants</h1>

    <?php foreach ($participants as $participant) { 
        $reguserModel = new \App\Models\regUserModel;
        $reguser = $reguserModel->find($participant->IdUser);?>  
        <div  class="cont">
            <label>
                <input type="checkbox" name="check_par[]" class="cb" value=<?php echo $participant->IdUser ?>/>First Name:<?php echo " $reguser->name" ?>,  Last Name: <?php echo " $reguser->surname" ?>,  Date of Application:<?php echo " $participant->dateOfAppl" ?> 
                        </label>&nbsp&nbsp
                        
                    <?php if($event->type!='IMW' && $event->type!='Exchange'):?>  
                        <a href="<?= site_url("LocalCommittee/motivationalLetterclick/$event->IdEvent/$participant->IdUser")?>"><input type="button" class="buttonMotivation" value="Motivational letter"></a><br>
                    <?php endif; ?>
        </div>
          
        <?php } ?>  
    
    <div class="accdec">
        <div>
            <button hidden="hidden" value="<?php echo $event->numOfParticipants ?>" id="numOfPar"></button>
            <button hidden="hidden" value="<?php echo $event->numOfAcc ?>" id="numOfAcc"></button>
            <button class = "accdecb" type="submit" onclick="acceptPar(<?php echo $event->IdEvent ?>)">Accept</button>
        </div>
        <div></div>
        <div>
                        <span id="post"></span>
            <button class = "accdecb" type="submit" onclick="finishPar(<?php echo $event->IdEvent ?>)">Finish</button>
        </div>
    </div>
</main>

</body>
</html>