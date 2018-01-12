<?php 
include ('config.php');
//logout session destroy



function addguardian(){
		include ('config.php');
		if (isset($_POST['submit_guardian_credentials'])){
	if(empty($_POST['user_number'])){
		
		echo
					'<div class="alert alert-danger">
					Tables is empty!
					
					</div>
					';	
		
	}else{
				for ($i=0; $i<count($_POST['user_number']); $i++){	

		
    					$user_number = addslashes($_POST['user_number'][$i]);
   					 $password = addslashes($_POST['password'][$i]);
   					  $user_level = addslashes($_POST['user_level'][$i]);
   					
				  mysqli_query($db,"insert into user_table (user_number,password,user_level) values ('$user_number','$password','$user_level')"); 
					
					
					mysqli_query($db,"UPDATE students_data SET indicator = '1' where students_number = '$user_number'"); 
				 
					
			}
			echo
					'<div class="alert alert-success">
				Guardian account successfully created!
					
					</div>
					';	
			}
		
	}
		}
	
	
	
		
	
		
		
		
		
		
		
	function updateadmin() {
		if (isset($_POST['update_admin'])){
			require 'config.php';
				$user_number = $_POST['user_number'];
				$hidden = $_POST['user-hidden'];
				$password = mysqli_real_escape_string($db,$_POST['password']);
				$confirmpassword = mysqli_real_escape_string($db,$_POST['confirmpassword']);

				
			if ($confirmpassword != $password) {
			echo
			'
			<div  class="alert alert-danger">
			Password mismatched!
			</div>
			';
			}else{
			$result = mysqli_query($db,"UPDATE user_table SET password = '$password',user_number = '$user_number'  WHERE user_id = '$hidden'");
			echo
			'
			<div  class="alert alert-success">
			You have successfully changed your password. 
			</div>
			';
			}

		}

			

	}
	function updateparentsprofile() {
		if (isset($_POST['update_profile'])){
			require 'config.php';
				$ID = $_POST['user_number'];
				$password = mysqli_real_escape_string($db,$_POST['password']);
				$confirmpassword = mysqli_real_escape_string($db,$_POST['confirmpassword']);

				$cellphone_number = mysqli_real_escape_string($db,$_POST['cellphone_number']);
				
			if ($confirmpassword != $password) {
			echo
			'
			<div  class="alert alert-danger">
			Password mismatched!
			</div>
			';
			}else{
			$result = mysqli_query($db,"UPDATE user_table SET password = '$password', cellphone_number = '$cellphone_number' WHERE user_number = '$ID'");
			echo
			'
			<div  class="alert alert-success">
			You have successfully changed your password. 
			</div>
			';
			}

		}

			

	}
	function updateprofile() {
		if (isset($_POST['update_profile'])){
			require 'config.php';
				$ID = $_POST['user_number'];
				$password = mysqli_real_escape_string($db,$_POST['password']);
				$confirmpassword = mysqli_real_escape_string($db,$_POST['confirmpassword']);

				$cellphone_number = mysqli_real_escape_string($db,$_POST['cellphone_number']);
				
			if ($confirmpassword != $password) {
			echo
			'
			<div  class="alert alert-danger">
			Password mismatched!
			</div>
			';
			}else{
			$result = mysqli_query($db,"UPDATE user_table SET password = '$password', cellphone_number = '$cellphone_number' WHERE user_number = '$ID'");
			echo
			'
			<div  class="alert alert-success">
			You have successfully changed your password. 
			</div>
			';
			}

		}

			

	}
	function updateattendance(){
		if (isset($_POST['submit_edit_attendance'])){
			
			require 'config.php';
				$attendance_id = $_POST['attendance_id'];
				$student_number = $_POST['student_number'];
				$newstatus = mysqli_real_escape_string($db,$_POST['status']);
			
		
			$result = mysqli_query($db,"UPDATE attendance SET 
				status = '$newstatus' WHERE attendance_id = '$attendance_id'");
				
				
			echo
			'
			<div  class="alert alert-success">
					Status successfully updated for this Student Number: '.$student_number.'

			</div>
			';
			}		
		}
	
		

//insert attendace data
	function insertattendance() {
		include ('config.php');
						if (isset($_POST['attendance_submit'])){
							
						for ($i=0; $i<count($_POST['student_number']); $i++){
    				
    				$student_number = addslashes($_POST['student_number'][$i]);
   					 $teachers_number = addslashes($_POST['teachers_number'][$i]);
   					  $subject = addslashes($_POST['subject'][$i]);
   					  $date = addslashes($_POST['date']);
   					   $day = addslashes($_POST['day'][$i]);
   					    $time_start = addslashes($_POST['time_start'][$i]);
   					     $end_time = addslashes($_POST['end_time'][$i]);
   					      $room_no = addslashes($_POST['room_no'][$i]);
						         $section = addslashes($_POST['section'][$i]);
   					            $grade = addslashes($_POST['grade'][$i]);

   					       $status = addslashes($_POST['status'][$i]);
   					     
    mysqli_query($db,"
                      insert into attendance (student_number, teachers_number,subject,date,day,time_start,end_time,room_no,grade,section,status) 
                      values ('$student_number','$teachers_number','$subject','$date','$day','$time_start','$end_time','$room_no','$grade','$section','$status')
    "); 

   					 
}
echo
					'<div class="alert alert-success">
					Success!</div>';
			}
			

    }

	

	function logout() {
			include("config.php");
			session_start();
			unset($_SESSION['user_id']); 
			header('location: ../login.php');
		}
 
		 
	
//login
	function login() {
		$time = Date('Y-m-d H:i:s'); 
		session_start();
		include 'config.php';
	
		if(isset($_POST['submit'])){
	  	$user_number = mysqli_real_escape_string($db,$_POST['user_number']);
	  	$password = mysqli_real_escape_string($db,$_POST['password']);
	  	
	  	$res=mysqli_query($db,"SELECT * FROM user_table WHERE 
	  	user_number='$user_number' AND 
	  	password='$password'");
	  	$row=mysqli_fetch_assoc($res);
		$user_level = $row['user_level'];
		
		
	    if($row['user_level'] === 'guardian'){
	       $_SESSION['user_id'] = $row['user_id'];
				
		  $result = mysqli_query($db,"INSERT INTO logs 
					(user_number,user_level,time) 
					 VALUES 
				('$user_number','guardian','$time')");
		  
	      header("Location: parentspage/index.php");
	    }
		elseif($row['user_level'] === 'teacher'){
		  $_SESSION['user_id'] = $row['user_id'];
			   
		  $result = mysqli_query($db,"INSERT INTO logs 
					(user_number,user_level,time) 
					 VALUES 
				('$user_number','teacher','$time')");
		  
	      header("Location: teacherspage/index.php");
		}
		elseif( $row['user_level'] === 'admin'){
			  $_SESSION['user_id'] = $row['user_id'];
			   
		  $result = mysqli_query($db,"INSERT INTO logs 
					(user_number,user_level,time) 
					 VALUES 
				('$user_number','admin','$time')");
		  
	      header("Location: admin/index.php");
		}
		
		else{
	  	echo 
	  	'
	  	<div class="alert alert-danger">
	  	Invalid Username or Password
	  	</div>
	  	';
	    	}
		}
	}
	
	

	

	function addteachers(){
		include ('config.php');
		
		if (isset($_POST['addteachers'])){
			
			
				$teachers_number = mysqli_real_escape_string($db,$_POST['teachers_number']);
				$password = mysqli_real_escape_string($db,$_POST['password']);
				$user_level = mysqli_real_escape_string($db,$_POST['user_level']);
				
				
				$check=mysqli_query($db,"SELECT * FROM user_table WHERE user_number = '$teachers_number'");
				$checkrows=mysqli_num_rows($check);
				
			
				
			if($checkrows>0) {
					echo
					'
					<div class="alert alert-danger">
					This Username <strong>'.$teachers_number.'</strong> was already existing in database.
					</div>
					';
					}else{
				
					
					
					$result = mysqli_query($db,"INSERT INTO user_table
					(user_number,password,user_level) 
					 VALUES 
					('$teachers_number','$password','$user_level')");
					echo
					'<div class="alert alert-success">
					Your account '.$teachers_number.' has been created.
					click the button below to login with your registered username.
					<form action="index.php" method="POST">
					<input type="hidden" name="username" value="'.$teachers_number.'">
					
					</form>
					</div>
					';	
				
			}
		}
		}
	
	
	
	
?>