<!DOCTYPE html>
<!-- Marija Slijepčević 0342/2019-->
<!-- Sava Andrić 0365/2019-->
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
                <li><a href="<?= site_url("Admin/acceptEvents")?>">Accept events</a></li>  
                <li><a href="<?= site_url("Admin/deleteEvents")?>">Delete events</a></li>  
                <li><a href="<?= site_url("Admin/acceptCommittees")?>">Accept committees</a></li>  
                <li><a href="<?= site_url("Admin/logout")?>">Logout</a></li>  
              </ul>
        </div>

    </nav>
<main>
    <br>
    <h1 id="list">List of Committees</h1>

        <?php foreach ($committees as $committee) { ?>  
        <label class="cont">
            <input type="checkbox" name="check_com[]" class="cb" value=<?php echo $committee->IdUser ?>/>Name: <?php echo " $committee->committeeName" ?>, Type: <?php echo " $committee->type" ?>,  University :<?php echo " $committee->universityName"?>, Date of Registration: <?php echo " $committee->dateOfReg" ?> 
        </label><br>


    <?php }
    ?>  

    <div class="accdec">
        <div>
            <button class = "accdecb" type="submit" onclick="lcAcceptCom()">Accept</button>
        </div>
        <div></div>
        <div>
            <button class = "accdecb" type="submit" onclick="lcDeclineCom()">Decline</button>
        </div>
    </div>
</main>

</body>
</html>