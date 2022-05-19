
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
                <li><a href = "<?= site_url("LocalCommittee/viewEvents")?>">View events</a></li>
                <li><a href = "<?= site_url("LocalCommittee/acceptMembers")?>">Accept members</a></li>
                <li><a href="<?= site_url("LocalCommittee/publishEvents")?>">Publish event</a></li>
                <li><a href="<?= site_url("LocalCommittee/changeInfo")?>">Edit profile</a></li>  
                <li><a href="<?= site_url("LocalCommittee/logout")?>">Logout</a></li>
              </ul>
        </div>

    </nav>
<main class="main">
    <div class="sekcija">
        <div></div>
        <div class="artikal">  <!--artikal treba da bude resizable-->
            <div class="lc">
                <div class="levaivica">
                    <img src="images/jobfair.jpg" alt="" width="100px" height="100px">
                </div>
                <div class="box1">
                    <span class="levaivica">
                        <h1>Jobfair</h1>
                    </span>
                    <span>
                        <h4>LC Beograd</h4>
                    </span>
                </div>
                <div class="opis">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime, deserunt aliquid nihil ad voluptatibus ea mollitia porro repellat cumque voluptatum veniam adipisci, ullam cupiditate nobis provident quam inventore aperiam laudantium.
                </div>

                <div>
                    <button  class="btn">
                        Read more
                    </button>
                </div>
                <div>
                    <button  class="btn"><a href = "committeeAcceptParticipants.html" class = "dugmenceCrniTekst">
                        Accept participants
                        </a>
                    </button>
                </div>
                <div>
                    <button  class="btn">
                        Close applications
                    </button>
                </div>
            </div>
        </div>
        <div></div>

        <div></div>
        <div class="artikal">
            <div class="lc">
                <div class="levaivica">
                    <img src="images/kongres.jpg" alt="" width="100px" height="100px">
                </div>
                <div class="box1">
                    <span class="levaivica">
                        <h1>Spring Congress</h1>
                    </span>
                    <span>
                        <h4>LC Beograd</h4>
                    </span>
                </div>
                <div class="opis">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime, deserunt aliquid nihil ad voluptatibus ea mollitia porro repellat cumque voluptatum veniam adipisci, ullam cupiditate nobis provident quam inventore aperiam laudantium.
                </div>

                <div>
                    <button  class="btn">
                        Read more
                    </button>
                </div>
                <div>
                    <button  class="btn"><a href = "committeeAcceptParticipants.html" class = "dugmenceCrniTekst">
                        Accept participants
                    </a>
                    </button>
                </div>
                <div>
                    <button  class="btn">
                        Close applications
                    </button>
                </div>
            </div>
        </div>
        <div></div>
    </div>
</main>

</body>
</html>