<?php 
include('../action.php');
 if(!isset($_SESSION['aname'])){
   header('location:admin.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transport</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <div class="container">
            <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form">
                    <h2>Bus details </h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="bname" id="name" placeholder="Bus Name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="bno" id="name" placeholder="Bus No"/>
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-input" name="from" id="name" placeholder="From"/>
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-input" name="to" id="name" placeholder="To"/>
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-input" name="time" id="name" placeholder="Bus timming"/>
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-input" name="sno" id="name" placeholder="Number of seat"/>
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-input" name="fare" id="name" placeholder="Fare"/>
                    </div>
                    <div class="form-group">
                        <input type="radio" class="form-input" name="rad" id="name" value="Ac" />Ac
                         <input type="radio" class="form-input" name="rad" id="name" value="Non Ac" />Non Ac
                    </div>
                    <div class="form-group">
                        <input type="submit" name="bus" id="submit" class="form-submit submit" value="Submit"/>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>