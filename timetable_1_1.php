<?php

include_once "../../schema/v/code/schema.php";
include_once "../../schema/v/code/sql.php";

//
//Get the sql (for retrieving the interns) from timetable.sql
$sql = file_get_contents("./intern.sql");
//
//Create a new intern database
$dbase = new \mutall\database('mutall_tracker', true, true);
//
//Get  the  data from the databse using the sql
$days = $dbase->get_sql_data($sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>TimeTable</title>
        <!-- Link to css -->
        <!-- <link rel="stylesheet" type="text/css" href="http://206.189.207.206/tracker/timetable/timetable.css"> -->
        <link rel="stylesheet" type="text/css" href="timetable.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
    </head>
    <body>
     <!-- Navigation Bar -->
    <header>
        <div class="logo">
          <p>Mutall</p>
        </div>
          <nav>
            <ul class="nav-list">
              <li class="nav"><a class="ul" href="timetable.php">Home</a></li>
              <li class="nav"><a class="ul" href="#">About</a></li>
              <li class="nav"><a class="ul" href="#">Portfolios</a></li>
            </ul>
          </nav>  
          <button><a class="ul" href="#">Chat</a></button>
       
		</header>
        <!-- Title and Time -->
     <div class="title">
        <h1>TimeTable</h1>
     </div>
     <div class="time">
        <h5>  
        <?php 
            echo date("l jS \of F Y ");
         ?>        
        </h5>  
    </div>
    
    <?php foreach($days as $day){ ?>
        
        $name = $day['name']
        
        <div class="day <?php if(date('l') == $day) echo 'highlight'; ?> " id="monday">
            <h2><?php echo $name;?></h2>
        
            <?php foreach(json_decode($day['interns'], true) as $intern){?>
                //
                $image = $intern['image'];
                $portfolio = $intern['portfolio'];
                $name = $intern['name'];
                $initials = $intern['initials'];
                $qualification = $intern['qualification'];
                $year = $intern['year'];
                $university = $intern['university'];
                <img  src="<?php echo $image; ?>">
                <a href="<?php echo$portfolio?>"><?php echo $name.':'.$initials;?>)</a>
                <?php echo "${intern['qualification']} ${intern['year']} ${intern['university'}"; ?>
                
                
            <?php }?>
            
        </div>
         
    <?php }?>
    

    </body>
</html>
