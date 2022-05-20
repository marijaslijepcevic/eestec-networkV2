<!--Marija Slijepčević 2019/0342-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'css/marija.css'; ?>
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
<main>
    <h1 id="list">List of Participants</h1>

    <?php foreach ($participants as $participant) { 
        $reguserModel = new \App\Models\regUserModel;
        $reguser = $reguserModel->find($participant->IdUser);?>  
        <div  class="cont">
            <label>
                <input type="checkbox"/>First Name:<?php echo " $reguser->name" ?>,  Last Name: <?php echo " $reguser->surname" ?>,  Date of Application:<?php echo " $participant->dateOfAppl" ?> 
            </label>&nbsp&nbsp<input type="button" class="buttonMotivation" value="Motivational letter"><br>
        </div>
          
        <?php } ?>  
    
    <div class="accdec">
        <div>
            <button class = "accdecb" type="submit">Accept</button>
        </div>
        <div></div>
        <div>
            <button class = "accdecb" type="submit">Finish</button>
        </div>
    </div>
</main>

</body>
</html>