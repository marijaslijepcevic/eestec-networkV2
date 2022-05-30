<!-- Jovan Dojčilović 0340/2019-->
<!-- Marija Slijepčević 0342/2019-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
        <?php include 'css/sava.css'; ?>
    </style>
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
                <li><a href="<?= site_url("Gost/index")?>" class = "dugmence">Login</a></li>  
              </ul>
        </div>

    </nav>
<main class="main">
    <div class="container">
        <div class="col-sm-1">&nbsp;</div>
        <?php foreach ($events as $event) {?>  
            <div class='artikal col-sm-11'>  
                <div class='lc container'>

                    <div class='row'>
                        <div class='levaivica col-sm-2'>

                           <?php echo '<img src = "/upload/'.$event->picture.'"/ alt="" width="100px" height="100px">'; ?> 
                        </div>

                        <div class='kutija col-sm-10 text-center'>
                            <span class='levaivica'>
                                <?php
                                $committeeModel = new \App\Models\committeeModel();
                                $committee = $committeeModel->find($event->IdEventCom);
                                echo "
                                <h1>$event->eventName - $committee->committeeName</h1>

                                   " ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class='opis row-cols-1'>
                        <?php echo "
                        $event->description;
                        "?>
                    </div>
                    
                    <div class='row-cols-1 dugmad'>
                        <a href='<?= site_url("Gost/eventReadMore/$event->IdEvent")?>'><button class = 'dugme'  type='submit' name='rdmacc' value = <?php echo $event->IdEvent?>>Read more</button></a>
                    </div>
            </div>
        </div>

         <?php }?> 
        <div class="col-sm-1">&nbsp;</div>
    </div>
</main>

</body>
</html>