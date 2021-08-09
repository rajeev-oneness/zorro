<?php
	//Add error_reporting to track error in code
	error_reporting(E_ALL);

	// Specify domains from which requests are allowed
	header('Access-Control-Allow-Origin: *');

	// Specify which request methods are allowed
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

	//Additional headers which may be sent along with the CORS request
	header('Access-Control-Allow-Headers: X-Requested-With');

	// Additional header for app
	header('Content-Type:application/json');

	// Include required PHP files
	include "dbConnect.php";

	// Get action name
	$action = isset($_REQUEST['action'])?$_REQUEST['action']:"";

	//If action is there call that function
	if($action!=''){
		$action();
	}

	function fetchVehicleTypes(){
		$vehicle_types = array();

		//Query is written for getting all category
		$query = "select * from vehicle_types";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){

				//Pushing the category array into parent array
				array_push($vehicle_types, $row);
			}

			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Success",
				"vehicle_types" =>$vehicle_types
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"No vehicle type found",
			)));
		}
	}

	function fetchJobTimings(){
		$job_timings = array();

		//Query is written for getting all category
		$query = "select * from job_timings";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){

				//Pushing the category array into parent array
				array_push($job_timings, $row);
			}

			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Success",
				"job_timings" =>$job_timings
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"No job timing found",
			)));
		}
	}

	function fetchAreas(){
		$areas = array();

		//Query is written for getting all category
		$query = "select * from areas";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){

				//Pushing the category array into parent array
				array_push($areas, $row);
			}

			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Success",
				"areas" =>$areas
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"No area found",
			)));
		}
	}

	function driverLogin(){
		$email = (isset($_REQUEST['email']) && $_REQUEST['email']!='')?$_REQUEST['email']:"";
		$password = (isset($_REQUEST['password']) && $_REQUEST['password']!='')?$_REQUEST['password']:"";

		$encpass = md5($password);

		$query = "select * from drivers where email='$email' and password='$encpass'";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);

			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Success",
				"driver" =>$row
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"You have entered a wrong credentials. Please try with the correct one",
			)));
		}
	}

	function fetchDriverDetails(){
		$id = (isset($_REQUEST['id']) && $_REQUEST['id']!='')?$_REQUEST['id']:"";

		$query = "select * from drivers where id='$id'";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);
			
			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Success",
				"driver" =>$row
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"No driver details found with this id",
			)));
		}
	}

	function verifyDriver(){
		$driver_id = (isset($_REQUEST['driver_id']) && $_REQUEST['driver_id']!='')?$_REQUEST['driver_id']:"";
		$otp = (isset($_REQUEST['otp']) && $_REQUEST['otp']!='')?$_REQUEST['otp']:"";

		$query = "select * from drivers where id='$driver_id' and otp='$otp'";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);

			$query = "update drivers set is_verified=1 where id='$driver_id'";

			//Execute query
			$result=mysqli_query(connect(),$query) or die(mysqli_error());
			
			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Your account has been verified successfully",
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"You have entered a wrong OTP. Please enter the correct one to verify your account",
			)));
		}
	}

	function upcomingBookings(){
		$driver_id = (isset($_REQUEST['driver_id']) && $_REQUEST['driver_id']!='')?$_REQUEST['driver_id']:"";

		$bookings = array();

		//Query is written for getting all category
		$query = "select * from bookings where driver_id='$driver_id' and is_delivered=0 and is_accepted=1";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
                $booking_id = $row['id'];
                
                $query1 = "select * from revenue where order_id='$booking_id'";

        		//Execute query
        		$result1=mysqli_query(connect(),$query1) or die(mysqli_error());
        
        		//If result1 is present
        		if(mysqli_num_rows($result1)>0){
        			$row1 = mysqli_fetch_assoc($result1);
        
        			$rider_fee = $row1['rider_fee'];
        		}else{
        		    $rider_fee = 0;
        		}
		
		        $row['rider_fee'] = $rider_fee;
				//Pushing the category array into parent array
				array_push($bookings, $row);
			}

			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Success",
				"bookings" =>$bookings
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"No job timing found",
			)));
		}
	}

	function deliverOrder(){
		$booking_id = (isset($_REQUEST['booking_id']) && $_REQUEST['booking_id']!='')?$_REQUEST['booking_id']:"";
		$otp = (isset($_REQUEST['otp']) && $_REQUEST['otp']!='')?$_REQUEST['otp']:"";

		$query = "select * from bookings where id='$booking_id' and otp='$otp'";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);

			$query = "update bookings set is_delivered=1 where id='$booking_id'";

			//Execute query
			$result=mysqli_query(connect(),$query) or die(mysqli_error());
			
			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"This order is delivered successfully",
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"You have entered a wrong OTP. Please enter the correct one to deliver this order",
			)));
		}
	}
	
	function pickupOrder(){
		$booking_id = (isset($_REQUEST['booking_id']) && $_REQUEST['booking_id']!='')?$_REQUEST['booking_id']:"";
		$pickup_otp = (isset($_REQUEST['pickup_otp']) && $_REQUEST['pickup_otp']!='')?$_REQUEST['pickup_otp']:"";

		$query = "select * from bookings where id='$booking_id' and pickup_otp='$pickup_otp'";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);

			$query = "update bookings set is_picked=1 where id='$booking_id'";

			//Execute query
			$result=mysqli_query(connect(),$query) or die(mysqli_error());
			
			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"This order is picked successfully",
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"You have entered a wrong OTP. Please enter the correct one to deliver this order",
			)));
		}
	}

	function deliveredBookings(){
		$driver_id = (isset($_REQUEST['driver_id']) && $_REQUEST['driver_id']!='')?$_REQUEST['driver_id']:"";

		$bookings = array();

		//Query is written for getting all category
		$query = "select * from bookings where driver_id='$driver_id' and is_delivered=1";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
			    
			    $booking_id = $row['id'];
                
                $query1 = "select * from revenue where order_id='$booking_id'";

        		//Execute query
        		$result1=mysqli_query(connect(),$query1) or die(mysqli_error());
        
        		//If result1 is present
        		if(mysqli_num_rows($result1)>0){
        			$row1 = mysqli_fetch_assoc($result1);
        
        			$rider_fee = $row1['rider_fee'];
        		}else{
        		    $rider_fee = 0;
        		}
		
		        $row['rider_fee'] = $rider_fee;

				//Pushing the category array into parent array
				array_push($bookings, $row);
			}

			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Success",
				"bookings" =>$bookings
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"No job timing found",
			)));
		}
	}

	function driverRegister(){
		$fname = (isset($_REQUEST['fname']) && $_REQUEST['fname']!='')?$_REQUEST['fname']:"";
		$lname = (isset($_REQUEST['lname']) && $_REQUEST['lname']!='')?$_REQUEST['lname']:"";
		$email = (isset($_REQUEST['email']) && $_REQUEST['email']!='')?$_REQUEST['email']:"";
		$password = (isset($_REQUEST['password']) && $_REQUEST['password']!='')?$_REQUEST['password']:"";
		$mobile = (isset($_REQUEST['mobile']) && $_REQUEST['mobile']!='')?$_REQUEST['mobile']:"";
		$whatsapp_no = (isset($_REQUEST['whatsapp_no']) && $_REQUEST['whatsapp_no']!='')?$_REQUEST['whatsapp_no']:"";
		$dob = (isset($_REQUEST['dob']) && $_REQUEST['dob']!='')?$_REQUEST['dob']:"";
		$address = (isset($_REQUEST['address']) && $_REQUEST['address']!='')?$_REQUEST['address']:"";
		$landmark = (isset($_REQUEST['landmark']) && $_REQUEST['landmark']!='')?$_REQUEST['landmark']:"";
		$gender = (isset($_REQUEST['gender']) && $_REQUEST['gender']!='')?$_REQUEST['gender']:"";
		$vehicle_type = (isset($_REQUEST['vehicle_type']) && $_REQUEST['vehicle_type']!='')?$_REQUEST['vehicle_type']:"";
		//$license_image = (isset($_REQUEST['license_image']) && $_REQUEST['license_image']!='')?$_REQUEST['license_image']:"";
		$vehicle_name = (isset($_REQUEST['vehicle_name']) && $_REQUEST['vehicle_name']!='')?$_REQUEST['vehicle_name']:"";
		$vehicle_no = (isset($_REQUEST['vehicle_no']) && $_REQUEST['vehicle_no']!='')?$_REQUEST['vehicle_no']:"";
		$emergency_contact_name = (isset($_REQUEST['emergency_contact_name']) && $_REQUEST['emergency_contact_name']!='')?$_REQUEST['emergency_contact_name']:"";
		$emergency_contact_no = (isset($_REQUEST['emergency_contact_no']) && $_REQUEST['emergency_contact_no']!='')?$_REQUEST['emergency_contact_no']:"";
		$relation = (isset($_REQUEST['relation']) && $_REQUEST['relation']!='')?$_REQUEST['relation']:"";
		$preferred_job_timing_id = (isset($_REQUEST['preferred_job_timing_id']) && $_REQUEST['preferred_job_timing_id']!='')?$_REQUEST['preferred_job_timing_id']:"";
		$preferred_area_id = (isset($_REQUEST['preferred_area_id']) && $_REQUEST['preferred_area_id']!='')?$_REQUEST['preferred_area_id']:"";
		$pan_no = (isset($_REQUEST['pan_no']) && $_REQUEST['pan_no']!='')?$_REQUEST['pan_no']:"";
		$aadhar = (isset($_REQUEST['aadhar']) && $_REQUEST['aadhar']!='')?$_REQUEST['aadhar']:"";
		$driver_license = (isset($_REQUEST['driver_license']) && $_REQUEST['driver_license']!='')?$_REQUEST['driver_license']:"";
		$bank_account_no = (isset($_REQUEST['bank_account_no']) && $_REQUEST['bank_account_no']!='')?$_REQUEST['bank_account_no']:"";
		$ifsc_code = (isset($_REQUEST['ifsc_code']) && $_REQUEST['ifsc_code']!='')?$_REQUEST['ifsc_code']:"";

		$encpass = md5($password);
		$opt = '1234';

		$file_name = $_FILES['image']['name'];
      	$file_tmp =$_FILES['image']['tmp_name'];

      	move_uploaded_file($file_tmp,"uploads/".$file_name);

      	$file_name1 = $_FILES['license_image']['name'];
      	$file_tmp1 =$_FILES['license_image']['tmp_name'];

      	move_uploaded_file($file_tmp1,"uploads/".$file_name1);

		$query = "insert into drivers
					(fname,
					lname,
					email,
					password,
					mobile,
					whatsapp_no,
					image,
					dob,
					address,
					landmark,
					gender,
					vehicle_type,
					license_image,
					vehicle_name,
					vehicle_no,
					emergency_contact_name,
					emergency_contact_no,
					relation,
					preferred_job_timing_id,
					preferred_area_id,
					pan_no,
					aadhar,
					driver_license,
					bank_account_no,
					ifsc_code,
					otp)
				values
					('$fname',
					'$lname',
					'$email',
					'$encpass',
					'$mobile',
					'$whatsapp_no',
					'$file_name',
					'$dob',
					'$address',
					'$landmark',
					'$gender',
					'$vehicle_type',
					'$file_name1',
					'$vehicle_name',
					'$vehicle_no',
					'$emergency_contact_name',
					'$emergency_contact_no',
					'$relation',
					'$preferred_job_timing_id',
					'$preferred_area_id',
					'$pan_no',
					'$aadhar',
					'$driver_license',
					'$bank_account_no',
					'$ifsc_code',
					'$otp')";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		if($result){
			$driver = array();

			$query = "select * from drivers order by id desc limit 1";

			//Execute query
			$result=mysqli_query(connect(),$query) or die(mysqli_error());

			//If result is present
			if(mysqli_num_rows($result)>0){
				$row = mysqli_fetch_assoc($result);
				$driver = $row;
			}else{
				$driver = array();
			}

			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Driver registration is successful",
				"driver"     => $driver
			)));
		}else{
			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"Failed to register driver data",
			)));
		}
	}

	function forgetPassword(){
		$email = (isset($_REQUEST['email']) && $_REQUEST['email']!='')?$_REQUEST['email']:"";

		$query = "select * from drivers where email='$email'";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			$newpass = '123456';
			$encpass = md5($newpass);

			$query1 = "update drivers set password='$encpass' where email='$email'";

			$result1 = mysqli_query(connect(),$query1) or die(mysqli_error());

			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Your password has been updated successfully. Please check your sms for the new password and try with that credentials.",
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"This email id does not exists in the database. Please try with the correct one.",
			)));
		}
	}

	function updateDriverLocation(){
		$driver_id = (isset($_REQUEST['driver_id']) && $_REQUEST['driver_id']!='')?$_REQUEST['driver_id']:"";
		$lat = (isset($_REQUEST['lat']) && $_REQUEST['lat']!='')?$_REQUEST['lat']:"";
		$lon = (isset($_REQUEST['lon']) && $_REQUEST['lon']!='')?$_REQUEST['lon']:"";

		$query = "select * from driver_locations where driver_id='$driver_id'";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			$query1 = "update driver_locations set lat='$lat' , lon='$lon' where driver_id='$driver_id'";

			$result1 = mysqli_query(connect(),$query1) or die(mysqli_error());
		}else{
			$query1 = "insert into driver_locations
						(driver_id,
						lat,
						lon)
						values
						('$driver_id',
						'$lat',
						'$lon')";

			$result1 = mysqli_query(connect(),$query1) or die(mysqli_error());
		}

		//Calling success response
		die(json_encode(array(
			"status"     =>"1",
			"message"    =>"Success",
		)));
	}

	function getNewBookingForDrivers(){
		$driver_id = (isset($_REQUEST['driver_id']) && $_REQUEST['driver_id']!='')?$_REQUEST['driver_id']:"";

		$query = "select * from bookings where driver_id='$driver_id' and is_accepted = 0 and is_rejected = 0 order by id desc limit 1";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);

			//Calling success response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Success",
				"booking"    => $row
			)));
		}else{
			//Calling success response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"No new booking found",
			)));
		}
	}

	function rejectBooking(){
		$booking_id = (isset($_REQUEST['booking_id']) && $_REQUEST['booking_id']!='')?$_REQUEST['booking_id']:"";

		$query = "update bookings set is_rejected=1 where id='$booking_id'";

		$result = mysqli_query(connect(),$query) or die(mysqli_error());

		//Calling succuss response
		die(json_encode(array(
			"status"     =>"1",
			"message"    =>"You have successfully rejected this booking",
		)));
	}

	function acceptBooking(){
		$booking_id = (isset($_REQUEST['booking_id']) && $_REQUEST['booking_id']!='')?$_REQUEST['booking_id']:"";

		$query = "update bookings set is_accepted=1 where id='$booking_id'";

		$result = mysqli_query(connect(),$query) or die(mysqli_error());

		//Calling succuss response
		die(json_encode(array(
			"status"     =>"1",
			"message"    =>"You have successfully accepted this booking",
		)));
	}

	function bookingsFilter(){
		$start_date = (isset($_REQUEST['start_date']) && $_REQUEST['start_date']!='')?$_REQUEST['start_date']:"";
		$end_date = (isset($_REQUEST['end_date']) && $_REQUEST['end_date']!='')?$_REQUEST['end_date']:"";
		$driver_id = (isset($_REQUEST['driver_id']) && $_REQUEST['driver_id']!='')?$_REQUEST['driver_id']:"";

		$bookings = array();

		//Query is written for getting all category
		$query = "select * from bookings where created_at>='$start_date' and created_at<='$end_date' and is_accepted=1 and driver_id='$driver_id'";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){

				//Pushing the category array into parent array
				array_push($bookings, $row);
			}

			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Success",
				"bookings" =>$bookings
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"No job timing found",
			)));
		}
	}

	function transactionList(){
		$driver_id = (isset($_REQUEST['driver_id']) && $_REQUEST['driver_id']!='')?$_REQUEST['driver_id']:"";

		$transactions = array();

		//Query is written for getting all category
		$query = "select * from revenue where rider_id='$driver_id'";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){

				//Pushing the category array into parent array
				array_push($transactions, $row);
			}

			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Success",
				"transactions" =>$transactions
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"No job timing found",
			)));
		}
	}

	function transactionsFilter(){
		$start_date = (isset($_REQUEST['start_date']) && $_REQUEST['start_date']!='')?$_REQUEST['start_date']:"";
		$end_date = (isset($_REQUEST['end_date']) && $_REQUEST['end_date']!='')?$_REQUEST['end_date']:"";
		$driver_id = (isset($_REQUEST['driver_id']) && $_REQUEST['driver_id']!='')?$_REQUEST['driver_id']:"";

		$transactions = array();

		//Query is written for getting all category
		$query = "select * from revenue where order_id in (select id from bookings where created_at>='$start_date' and created_at<='$end_date' and is_accepted=1 and driver_id='$driver_id')";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){

				//Pushing the category array into parent array
				array_push($transactions, $row);
			}

			//Calling succuss response
			die(json_encode(array(
				"status"     =>"1",
				"message"    =>"Success",
				"transactions" =>$transactions
			)));
		}else{

			//Calling error response
			die(json_encode(array(
				"status"     =>"0",
				"message"    =>"No job timing found",
			)));
		}
	}

	function todayData(){
		$driver_id = (isset($_REQUEST['driver_id']) && $_REQUEST['driver_id']!='')?$_REQUEST['driver_id']:"";
		$today = date("Y-m-d");

		$total_distance = 0;
		$total_income = 0;
		$rank = 1;

		$query = "select sum(distance) as total_distance from bookings where driver_id='$driver_id' and created_at like '$today%'";

		//Execute query
		$result=mysqli_query(connect(),$query) or die(mysqli_error());

		//If result is present
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);

			$total_distance = $row['total_distance'];
		}

		$query1 = "select sum(rider_fee) as total_fee from revenue where rider_id='$driver_id' and created_at like '$today%'";

		//Execute query
		$result1=mysqli_query(connect(),$query1) or die(mysqli_error());

		//If result1 is present
		if(mysqli_num_rows($result1)>0){
			$row1 = mysqli_fetch_assoc($result1);

			$total_income = $row1['total_fee'];
		}

		//Calling succuss response
		die(json_encode(array(
			"status"     =>"1",
			"message"    =>"Success",
			"total_distance" =>$total_distance,
			"total_income" =>$total_income,
			"rank" =>$rank,
		)));
	}
?>