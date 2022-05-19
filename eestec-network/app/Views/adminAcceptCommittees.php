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
                <li><a href="<?= site_url("Admin/acceptEvents")?>">Accept events</a></li>  
                <li><a href="<?= site_url("Admin/deleteEvents")?>">Delete events</a></li>  
                <li><a href="<?= site_url("Admin/acceptCommittees")?>">Accept committees</a></li>  
                <li><a href="<?= site_url("Admin/logout")?>">Logout</a></li>  
              </ul>
        </div>

    </nav>
<main>
    <h1 id="list">List of Committees</h1>

        <?php
    foreach ($committees as $committee) {
        echo "<label class='cont'>
          <input type='checkbox'> Name: $committee->committeeName, Type: $committee->type, University: $committee->universityName, Date of Registration: $committee->dateOfReg
    </label><br>";
    }?>

    <div class="accdec">
        <div>
            <a href="<?= site_url("Admin/clickAcceptCommittee")?>"><button class = "accdecb "  type="button">Accept</button></a>
        </div>
        <div></div>
        <div>
             <a href="<?= site_url("Admin/clickDeclineCommittee")?>"><button class = "accdecb "  type="button">Decline</button></a>
        </div>
    </div>
</main>

</body>
</html>