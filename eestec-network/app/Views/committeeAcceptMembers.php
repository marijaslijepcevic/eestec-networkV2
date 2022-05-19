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
        <?php foreach ($members as $member) { ?>  
            <label class="cont">
                <input type="checkbox" name="check_list[]" class="cb" value=<?php echo "$member->IdUser" ?>/>First Name:<?php echo " $member->name" ?>,  Last Name: <?php echo " $member->surname" ?>,  Date of Registration:<?php echo " $member->dateOfReg" ?> 
            </label><br>
          
          
        <?php }
        ?>  



    <div class="accdec">
        <div>
            <form method="post"> 
                <input type="submit" name="button1" class="accdecb" value="Accept" /> 
               
            </form> 
           
        </div>
        <div></div>
        <div>
            <a href="<?= site_url("LocalCommittee/acceptMembersDecline")?>"><button class = "accdecb" type="submit">Decline</button></a>
        </div>
    </div>
</main>
<?php
    if(array_key_exists('button1', $_POST)) { 
        button1(); 
    } 
  
    function button1() { 
      
         
        echo "<script language=\"javascript\">"
        . "var checkedValue = document.querySelector('.cb:checked').value;"
                . "</script>";

       return redirect()->to(site_url("LocalCommittee/acceptMembersAccept"));
   } 
  
    ?> 
</body>
</html>