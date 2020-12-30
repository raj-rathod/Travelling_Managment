<?php
session_start();
if(!isset($_SESSION['uid'])){
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transport </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
     <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <div class="container" id="search">
            <div class="signup-content">
                <form  id="signup-form" class="signup-form">
                    <h2>Bus search </h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="from" id="from" placeholder="From "/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="to" id="to" placeholder="To"/>
                    </div>
                      <div class="form-group">
                        <input type="date"  name="date" id="date" />
                    </div>
                    <div class="form-group">
                      <a href="#" class="btn btn-success bussearch">Submit</a>
                    </div>
                </form>
            </div>
        </div>
       
<div class="container-fluid" id="result">
    <div class="card">
        <div class="card-header bg-success">
            <h2 class="text-center">Your Result</h2>
        </div>
        <div class="card-body">
           <div class="card-columns">
            <div id="results"></div>
            <!--   <div class='card'>
                   <div class='card-header bg-info'>
                       <h3 class='text-center'>Bus Name</h3>
                   </div>
                  <div class='card-body bg-dark'>
                     <div class='row'>
                         <div class='col-md-6'>
                            <h5>Bus NO. :</h5>
                            <h5>From :</h5>
                            <h5>To :</h5>
                            <h5>Time :</h5>
                            <h5>Bus Type :</h5>
                             <h5>Fare :</h5>
                            <h5>Seat available :</h5>
                         </div>
                         <div class='col-md-6'>
                            <h5>Bus NO. :</h5>
                            <h5>From :</h5>
                            <h5>To :</h5>
                            <h5>Time :</h5>
                            <h5>Bus Type :</h5>
                             <h5>Fare :</h5>
                            <h5>Seat available :</h5>
                         </div>
                     </div>
                  </div>
                  <div class='card-footer bg-danger'>
                      <div class='btn btn-outline-light'>Book ticket</div>
                  </div>  
               </div>---->
              
            
               
           </div>
        </div>
    </div>
</div>
 <div class="container" id="booking">
        <div id="bookingres"></div>
          <!---  <div class='signup-content'>
                <form  id='signup-form' class='signup-form'>
                    <h2>Booking Detail </h2>
                     <div class='form-group'>
                        <input type='text' class='form-input'  id='name' placeholder='Passenger Name' required />
                    </div>
                    <div class='form-group'>
                        <input type='number' class='form-input'  id='no' placeholder='Number of passenger' required />
                    </div>
                    <div class='form-group'>
                      <a href='#s' class='btn btn-success booking' bid='$bid' jid='$date' seat='$seat'>Submit</a>
                    </div>
                </form>
            </div>------>
        </div>


    </div>


    <!-- JS -->
 <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/superfish/hoverIntent.js"></script>
  <script src="../lib/superfish/superfish.min.js"></script>
  <script src="../lib/wow/wow.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="../lib/sticky/sticky.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
     <script src="js/main1.js"></script>
</body>
</html>