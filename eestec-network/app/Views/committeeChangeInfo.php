<!-- AUTOR JOVAN DOJCILOVIC -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
        <?php include 'css/jovan.css'; ?>
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
     <?php if(isset($msg)) echo "<p  style='text-align:center; color: red;'>$msg</p>"; ?>
    <form action="<?= site_url("LocalCommittee/changeInfoClick")?>" method="post">

        <div class="container">
            <div></div>
            <div>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="<?php echo "$user->psw" ?>" name="psw" >
                <br>
                
                <label for="psw"><b>Repeat Password</b></label>
                <input type="password" placeholder="<?php echo "$user->psw" ?>" name="pswRepeat" >
                <br>
                
                <label for="comname"><b>Name of your Committee</b></label>
                <input type="text" placeholder="<?php echo "$committee->committeeName" ?>" name="comname" >
                <br>
                
                <div class = "razmak">
                    <label for="picture"><b>Submit a picture</b></label>
                    <input type="file" name="picture">
                    <br>
                </div>
                
                <div class = "razmak">
                    <label for="type"><b>Type of your Committee</b></label><br>
                    <input type="radio" name="type" value="Local Committee"> Local Committee
                    <input type="radio"  name="type" value="Junior Local Committee" > Junior Local Committee
                    <input type="radio" name="type" value="Observer" > Observer
                    <br>
                </div>
                
                <div class = "buttons">
                    <div></div>
                    <div></div>
                    <div>
                        <!--ODLUCITI GDE TE VODI-->
                        <button class = "login" type="submit">Change Info</button>
                    </div>
                </div>

                <br>
            </div> 
            <div></div>
      </div>



    </form>    

</body>
</html>