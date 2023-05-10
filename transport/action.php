<?php 
$con=mysqli_connect('localhost','root','','transport');
session_start();
if (isset($_POST['alogin'])) {
	$name=$_POST['uname'];
	$psw=$_POST['psw'];
	$sql="SELECT * FROM admin WHERE name='$name'AND psw='$psw'";
	$run=mysqli_query($con,$sql);
	if (mysqli_num_rows($run)==1) {
		$_SESSION['aname']=$name;
		header('location:../admin.php');
	}
}
if (isset($_POST['signup'])) {
	$name=$_POST['name'];
	$uname=$_POST['uname'];
	$age=$_POST['age'];
	$pno=$_POST['pno'];
	$aidno=$_POST['aidno'];
	$psw=$_POST['psw'];
	$email=$_POST['email'];
	$sql="SELECT * FROM user_info WHERE uname='$uname'";
	$run=mysqli_query($con,$sql);
	if (mysqli_num_rows($run)>0) {
		echo "<h4>USERNAME ALREADY EXIST PLEASE ENTER VALID USERNAME</h4>";
	}else{
		$sql="INSERT INTO `user_info` (`uid`, `name`, `uname`, `age`, `adhar_no`, `psw`, `email`)
		 VALUES (NULL, '$name', '$uname', '$age', '$aidno', '$psw', '$email')";
		$run=mysqli_query($con,$sql);
		if($run){
			$_SESSION['uid']=mysqli_insert_id($con);
			$_SESSION['uname']=$uname;
			header('location:login.php');
		}
	}
}
if (isset($_POST['login'])) {
   $name=$_POST['uname'];
   $psw=$_POST['psw'];
   $sql="SELECT * FROM user_info WHERE uname='$name'AND psw='$psw'";
   $run=mysqli_query($con,$sql);
   $row=mysqli_fetch_array($run);
   if (mysqli_num_rows($run)==1) {
        $_SESSION['uid']=$row['uid'];
		$_SESSION['uname']=$name;
		header('location:../profile.php');
	}
}
if (isset($_POST['bus'])) {
	$bname=$_POST['bname'];
	$bno=$_POST['bno'];
	$from=$_POST['from'];
	$to=$_POST['to'];
	$time=$_POST['time'];
	$seat=$_POST['sno'];
	$type=$_POST['rad'];
	$fare=$_POST['fare'];
	$sql="SELECT * FROM bus_details WHERE bno='$bno'AND bfrom='$from'";
    $run=mysqli_query($con,$sql);
    if (mysqli_num_rows($run)>0) {
		echo "<h4>BUS DETAILS ALREADY EXIST PLEASE ENTER VALID DETAILS.... THANKS</h4>";
	}else{
		$sql="INSERT INTO `bus_details` (`bus_id`, `bname`, `bno`, `bfrom`, `bto`, `time`, `type`, `no_seat` ,`fare`) 
		VALUES (NULL, '$bname', '$bno', '$from', '$to','$time', '$type', '$seat' ,'$fare')";
		$run=mysqli_query($con,$sql);
		if ($run) {
			header('location:../admin.php');
		}
	}
}
if (isset($_POST['search'])) {
	$from=$_POST['from'];
	$to=$_POST['to'];
	$date=$_POST['date'];
	$sql="SELECT * FROM booking_det WHERE jdate='$date'AND bfrom='$from'AND bto='$to'AND vacant>0";
	$run=mysqli_query($con,$sql);
    if (mysqli_num_rows($run)>0) {
		while ($row=mysqli_fetch_array($run)) {
			$bus_id=$row['bus_id'];
			$vacant=$row['vacant'];
			$sql1="SELECT * FROM bus_details WHERE bus_id='$bus_id'";
			$run1=mysqli_query($con,$sql1);
			$rows=mysqli_fetch_array($run1);
			  $bname=$rows['bname'];
			  $bno=$rows['bno'];
			  $time=$rows['time'];
			  $type=$rows['type'];
			  $fare=$rows['fare'];
			  echo " <div class='card'>
                   <div class='card-header bg-info'>
                       <h3 class='text-center'>$bname</h3>
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
                            <h5>$bno</h5>
                            <h5>$from</h5>
                            <h5>$to</h5>
                            <h5>$time</h5>
                            <h5>$type</h5>
                             <h5>$fare</h5>
                            <h5>$vacant</h5>
                         </div>
                     </div>
                  </div>
                  <div class='card-footer bg-danger'>
                      <div class='btn btn-outline-light book' bid='$bus_id' jid='$date' seat='$vacant'>Book ticket</div>
                  </div>  
               </div>";
		}
	}else{
	$sql="SELECT * FROM bus_details WHERE bfrom='$from'AND bto='$to'";
	$run=mysqli_query($con,$sql);
	 if (mysqli_num_rows($run)>0) {
		while ($row=mysqli_fetch_array($run)) {
			  $bus_id=$row['bus_id'];
			  $bname=$row['bname'];
			  $bno=$row['bno'];
			  $time=$row['time'];
			  $type=$row['type'];
			  $fare=$row['fare'];
			  $seat=$row['no_seat'];
			  echo "<div class='card'>
                   <div class='card-header bg-info'>
                       <h3 class='text-center'>$bname</h3>
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
                            <h5>$bno</h5>
                            <h5>$from</h5>
                            <h5>$to</h5>
                            <h5>$time</h5>
                            <h5>$type</h5>
                             <h5>$fare</h5>
                            <h5>$seat</h5>
                         </div>
                     </div>
                  </div>
                  <div class='card-footer bg-danger'>
                      <div class='btn btn-outline-light book' bid='$bus_id' jid='$date' seat='$seat'>Book ticket</div>
                  </div>  
               </div>";
        }
     }else{
     	echo "<h1 class='text-dark text-center'>OOps no bus found</h1>";
     }
    }
}

if (isset($_POST['book'])) {
	$jid=$_POST['jid'];
	$bid=$_POST['bid'];
	$seat=$_POST['seat'];
	echo "  <div class='signup-content'>
                <form  id='signup-form' class='signup-form'>
                    <h2>Booking Detail </h2>
                     <div class='form-group'>
                        <input type='text' class='form-input'  id='name' placeholder='Passenger Name' required />
                    </div>
                    <div class='form-group'>
                        <input type='number' class='form-input'  id='no' placeholder='Number of passenger' required />
                    </div>
                    <div class='form-group'>
                      <a href='#s' class='btn btn-success booking' bid='$bid' jid='$jid' seat='$seat'>Conform Booking</a>
                    </div>
                </form>
            </div>";
}

if (isset($_POST['booking'])) {
	$jid=$_POST['jid'];
	$bid=$_POST['bid'];
	$seat=$_POST['seat'];
	$name=$_POST['name'];
	$no_p=$_POST['no_p'];
	$uid=$_SESSION['uid'];
	$date=date("Y-m-d");
	$vacant=$seat-$no_p;
	$sql="SELECT * FROM booking_det WHERE bus_id='$bid'AND jdate='$jid'";
	$run=mysqli_query($con,$sql);
    if (mysqli_num_rows($run)>0) {
      $sql="UPDATE booking_det SET vacant='$vacant' WHERE bus_id='$bid'AND jdate='$jid'";
      $run=mysqli_query($con,$sql);
      if ($run) {
          $sql="SELECT * FROM bus_details WHERE bus_id='$bid'";
          $run=mysqli_query($con,$sql);
          $row=mysqli_fetch_array($run);
          $tseat=$row['no_seat'];
          $seatno=$tseat-$seat;
          $tseatno="";
          for ($i=0; $i <$no_p; $i++) { 
          	  ++$seatno;
          	  $tseatno=$tseatno." ".$seatno;
          }
          $sql="SELECT * FROM ticket WHERE uid='$uid'AND pname='$name'AND jdate='$jid' AND bus_id='$bid'  ";
          $run=mysqli_query($con,$sql);
          if (mysqli_num_rows($run)>0) {
          	echo "Your ticket is ALREADY booked, please check your ticket";
            
          }else{
          $sql="INSERT INTO `ticket` (`tid`, `bus_id`, `uid`, `seat_no`, `no_seat`, `ticket_status`, `jdate`, `booking_date`, `pname`) VALUES (NULL, '$bid', '$uid', '$tseatno', '$no_p', 'Conform', '$jid', '$date', '$name')";
          $run=mysqli_query($con,$sql);
          if ($run) {
             echo "Your Ticket is Conformed .....Thank you";
             
          }

        }
      }
   }else{
          $sql="SELECT * FROM bus_details WHERE bus_id='$bid'";
          $run=mysqli_query($con,$sql);
          $row=mysqli_fetch_array($run);
          $tseat=$row['no_seat'];
          $from=$row['bfrom'];
          $to=$row['bto'];

   	   $sql="INSERT INTO `booking_det` (`bus_id`, `vacant`, `jdate`, `bfrom`, `bto`)
   	   VALUES ('$bid', '$vacant', '$jid', '$from', '$to')";
   	   $run=mysqli_query($con,$sql);
   	    if ($run) {
          $seatno=$tseat-$seat;
          $tseatno="";
          for ($i=0; $i <$no_p; $i++) { 
          	  ++$seatno;
          	  $tseatno=$tseatno." ".$seatno;
          }
          $sql="SELECT * FROM ticket WHERE uid='$uid'AND pname='$name'AND jdate='$jid' AND bus_id='$bid'  ";
          $run=mysqli_query($con,$sql);
          if (mysqli_num_rows($run)>0) {
          	echo "Your ticket is ALREADY booked  please check your ticket";
          
          }else{
          $sql="INSERT INTO `ticket` (`tid`, `bus_id`, `uid`, `seat_no`, `no_seat`, `ticket_status`, `jdate`, `booking_date`, `pname`) VALUES (NULL, '$bid', '$uid', '$tseatno', '$no_p', 'Conform', '$jid', '$date', '$name')";
          $run=mysqli_query($con,$sql);
          if ($run) {
             echo "Your Ticket is Conformed .....Thank you";
            
          }

      }
   }

}

}

if (isset($_POST['ticket'])) {
  $uid=$_SESSION['uid'];
  $sql="SELECT * FROM ticket WHERE uid='$uid'";
  $run=mysqli_query($con,$sql);
  if (mysqli_num_rows($run)==0) {
    echo "<h4>First Book the ticket</h4>";
  }else{
    while ($row=mysqli_fetch_array($run)) {
       $bid=$row['bus_id'];
       $uid=$row['uid'];
       $seat_no=$row['seat_no'];
       $no_seat=$row['no_seat'];
       $ticket_status=$row['ticket_status'];
       $jdate=$row['jdate'];
       $booking_date=$row['booking_date'];
       $pname=$row['pname'];
          $sql1="SELECT * FROM user_info WHERE uid='$uid' ";
          $run1=mysqli_query($con,$sql1);
          $rows=mysqli_fetch_array($run1);
          $age=$rows['age'];
          $adhar_no=$rows['adhar_no'];
          $email=$rows['email'];
          $sql2="SELECT * FROM bus_details WHERE bus_id='$bid'";
          $run2=mysqli_query($con,$sql2);
          $row1=mysqli_fetch_array($run2);
              $bname=$row1['bname'];
              $bno=$row1['bno'];
              $bfrom=$row1['bfrom'];
              $bto=$row1['bto'];
              $time=$row1['time'];
              $fare=$row1['fare'];
              $Tfare=$fare*$no_seat;

         echo "<div class='card'>
    <div class='card-header bg-info'>
      <h3 class='text-center'>Ticket Detail</h3>
    </div>
    <div class='card-body bg-dark'>
      <div class='card bg-dark '>
         <h2  class='text-center text-white'>Passenger Detail</h2><hr>
       <div class='row'>
         <div class='col-md-6'>
           <h4 class=' text-white'>Passenger Name :</h4>
           <h4 class='text-white'>Adhar Card No :</h4>
           <h4 class='text-white'>Age :</h4>
           <h4 class='text-white'>Email :</h4>
         </div> 
         <div class='col-md-6'>
           <h4 class=' text-white'>$pname </h4>
           <h4 class='text-white'>$adhar_no </h4>
           <h4 class='text-white'>$age</h4>
           <h4 class='text-white'>$email</h4>
         </div>
       </div>
      </div>
      <div class='card bg-dark '>
         <h2  class='text-center text-white'>Bus Detail</h2><hr>
       <div class='row'>
         <div class='col-md-6'>
           <h4 class=' text-white'>Bus Name :</h4>
           <h4 class='text-white'>Bus No :</h4>
           <h4 class='text-white'>Time :</h4>
           <h4 class='text-white'>From :</h4>
          <h4 class='text-white'>To :</h4>
         </div> 
         <div class='col-md-6'>
           <h4 class=' text-white'>$bname</h4>
           <h4 class='text-white'>$bno</h4>
           <h4 class='text-white'>$time</h4>
           <h4 class='text-white'>$bfrom</h4>
          <h4 class='text-white'>$bto</h4>
         </div>
       </div>
      </div>
       <div class='card bg-dark '>
         <h2  class='text-center text-white'>Ticket Detail</h2><hr>
       <div class='row'>
         <div class='col-md-6'>
           <h4 class=' text-white'>Number Of Seat :</h4>
           <h4 class='text-white'>Seat No :</h4>
           <h4 class='text-white'>Status :</h4>
           <h4 class='text-white'>Fare :</h4>
           <h4 class='text-white'>Journey Date :</h4>
          <h4 class='text-white'>Booking Date :</h4>
         </div> 
         <div class='col-md-6'>
           <h4 class=' text-white'>$no_seat</h4>
           <h4 class='text-white'>$seat_no</h4>
           <h4 class='text-white'>$ticket_status</h4>
           <h4 class='text-white'>$Tfare</h4>
          <h4 class='text-white'>$jdate</h4>
          <h4 class='text-white'>$booking_date</h4>
         </div>
       </div>
      </div>
    </div>
    <div class='card-footer bg-info'>
     <a href='profile.php' class='btn btn-outline-danger'>Home</a>
    </div>
  </div>";     

    }
  }
}

if (isset($_POST['bkd'])) {
  $bid=$_POST['bid'];
   $sql2="SELECT * FROM bus_details WHERE bus_id='$bid'";
          $run2=mysqli_query($con,$sql2);
          $row1=mysqli_fetch_array($run2);
          if($row1){
            $bname=$row1['bname'];
           $seat=$row1['no_seat'];
           $time=$row1['time'];
          }
  $sql="SELECT * FROM booking_det WHERE bus_id='$bid' ";
  $run=mysqli_query($con,$sql);
  if (mysqli_num_rows($run)==0) {
    echo "<h4 class='text-center text-white'>Result Not Found</h4>";
  }else{
    while($row=mysqli_fetch_array($run)){
    $vacant=$row['vacant'];
    $booked=$seat-$vacant;
    $jdate=$row['jdate'];
    $bfrom=$row['bfrom'];
    $bto=$row['bto'];
    echo " <div class='row'>
          <div class='col-md-2'>
            <h3 class='text-center text-white'> $bname</h3>
          </div>
          <div class='col-md-2'>
            <h3 class='text-center text-white'>$booked</h3>
          </div>
          <div class='col-md-2'>
            <h3 class='text-center text-white'>$vacant</h3>
          </div>
          <div class='col-md-2'>
            <h3 class='text-center text-white'>$bfrom</h3>
          </div>
          <div class='col-md-2'>
            <h3 class='text-center text-white'>$bto</h3>
          </div>
          <div class='col-md-2'>
            <h3 class='text-center text-white'>$jdate</h3>
          </div>
        
        </div>";
    }

  }
}
if (isset($_POST['tbkd'])) {
   $bid=$_POST['bid'];
   $pdate=$_POST['date'];
   $sql2="SELECT * FROM bus_details WHERE bus_id='$bid'";
          $run2=mysqli_query($con,$sql2);
          $row1=mysqli_fetch_array($run2);
          if($row1){
             $fare=$row1['fare'];
          }else{
            $fare = 0;
          }
   $sql="SELECT * FROM ticket WHERE bus_id='$bid'AND jdate='$pdate'";
    $run=mysqli_query($con,$sql);
    if (mysqli_num_rows($run)==0) {
    echo "<h4 class='text-center text-white'>Result Not Found</h4>";
  }else{
    while ($row=mysqli_fetch_array($run)) {
      $pname=$row['pname'];
      $jdate=$row['jdate'];
      $seat_no=$row['seat_no'];
      $no_seat=$row['no_seat'];
      $status=$row['ticket_status'];
      $tfare=$fare*$no_seat;
       echo " <div class='row'>
          <div class='col-md-2'>
            <h3 class='text-center text-white'> $pname</h3>
          </div>
          <div class='col-md-2'>
            <h3 class='text-center text-white'>$seat_no</h3>
          </div>
          <div class='col-md-2'>
            <h3 class='text-center text-white'>$no_seat</h3>
          </div>
          <div class='col-md-2'>
            <h3 class='text-center text-white'>$tfare</h3>
          </div>
          <div class='col-md-2'>
            <h3 class='text-center text-white'>$status</h3>
          </div>
          <div class='col-md-2'>
            <h3 class='text-center text-white'>$jdate</h3>
          </div>
        
        </div>";
    }
  }
}
?> 