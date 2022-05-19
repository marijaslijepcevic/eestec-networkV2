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
        </div>

    </nav>
<main>
    <h1 id="list">List of Members</h1>


    <label class="cont">
        <input type="checkbox"/>First Name: Petar, Last Name: Petrović, Date of Registration: 13.5.2015. 
    </label><br>

    <label class="cont">
        <input type="checkbox" />First Name: Jovan, Last Name: Dojčilović, Date of Registration: 23.5.2019.
    </label><br>
    <label class="cont">
        <input type="checkbox" />First Name: Marija, Last Name: Sljepčević, Date of Registration: 13.5.2022.
    </label><br>
    <label class="cont">
        <input type="checkbox" />First Name: Sava, Last Name: Andric, Date of Registration: 16.5.2022.
    </label><br>
   
    <div class="accdec">
        <div>
            <button class = "accdecb" type="submit">Accept</button>
        </div>
        <div></div>
        <div>
            <button class = "accdecb" type="submit">Decline</button>
        </div>
    </div>
</main>

</body>
</html>