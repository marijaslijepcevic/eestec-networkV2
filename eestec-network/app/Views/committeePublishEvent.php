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
    <?php if(isset($msg)) echo "<p  style='text-align:center; color: red;'>$msg</p>"; ?>
    <form action="<?= site_url("LocalCommittee/publishEventClick")?>" method="post">

        <div class="container">
            <div></div>
            <div>
                <label for="event_name" required><b>Event Name</b></label>
                <input type="text" placeholder="Enter Event Name" name="event_name" required>
                <br> <br>
                <label for="startDate" required><b>Start date</b></label>
                <input type="date" id="start" name="startDate" >
                <br>
                <br>
                <label for="endDate" required><b>End date</b></label> &nbsp;
                <input type="date" id="start" name="endDate" >
                <br>
                <div class="razmak">
                    <label for="type" required><b>Type of your Event</b></label><br>
                    <input type="radio" name="type" value="IMW" required> IMW
                    <input type="radio" name="type" value="Workshop" required> Workshop
                    <input type="radio" name="type" value="Exchange" required> Exchange
                    <input type="radio" name="type" value="Advanced workshop" required> Advanced workshop
                    <br>
                </div>

                <div class="razmak">
                    <label for="opis" ><b>Description</b></label>
                    <textarea name="opis" cols="60" rows="10" required></textarea>
                    <br>
               </div>      
               <div class="razmak">
                    <label for="br_uc" required><b>Number of Participants</b></label>
                    <input type="text" placeholder="Enter Number of Participants" name="br_uc" required>
                    <br>
               </div>
              
          
                <div class="razmak">
                    <label for="org_odbor" required><b>Organizing Committee</b></label>
                    <input type="textarea" placeholder="Name Surname..." name="org_odbor" required>
                    <br>
                </div>
                <div class = "razmak">
                    <label for="picture" ><b>Submit a picture</b></label>
                    <input type="file" name="picture" required>
                    <br>
                </div>
                                
                <div class = "buttons">
                    <div></div>
                    <div></div>
                    <div>
                  
                        <button class = "login" type="submit" required>Publish Event</button>
                    </div>
                </div>
                <br>
            </div> 
            <div></div>
      </div>



    </form>    

</body>
</html>