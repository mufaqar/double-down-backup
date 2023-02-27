<?php


function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function sendmail($to,$password,$name) {
	$to = $to;
	$admin = 'hei@doubledowndish.no';
	$subject = 'Double Down Dish | Username & Password';
	$body  = "<p>Velkommen til Double Down Dish! Vi er glade for å ha deg med!</p>
			  <p>Nå som du har registrert ($name) er du klar til å komme i gang med en smartere lunsjordning for deg og alle dine kolleger.</p>";
	$body  .= "<p><strong> Username :  </strong> $to </p> <p> <strong> Password : </strong> $password  </p>";
	$body  .= "<p>Jeg er din kundekontakt, og uansett hva du lurer på så er det bare å ta kontakt. Du kan alltid nå meg på hei@doubledowndish.no </p>
			  <p>Jeg lar deg få trykke litt rundt først, så ringer jeg deg opp enten i løpet av dagen eller morgendagen slik at vi sammen kan sørge for at alt er på plass til dere.</p>
			  <p>Under får du info om hvordan løsningen vår fungerer.</p>
			  <p>Legg til ansatte</p>
			  <p> Det som er viktig nå er at alle ansatte får muligheten til å opprette seg sin egen konto. Dette er selve grunnlaget for at din bedrift skal effektivisere og spare unødvendig kostnader. </p>
              <p>En av grunnene til at dere vil spare kostnader på dette er at de ansatte med få trykk, fjerner/ endrer leveringen, selv de dagene de ikke skal på kontoret. Slik vil dere kun betale for mat dere faktisk spiser.</p>
			  <p>(Link / knapp for å legge til ansatte!)</p>
			  <p>Hvordan legge til ansatte - se filmen under</p>
			  <p>Nå som du har opprettet bedriftskontoen din er du automatisk administrator, i tillegg til at du har muligheten til å bestille mat som alle andre.</p>
			  <p>Om du har andre på kontoret som har ansvar for å organisere lunsj, invitere nye ansatte, endre/ kansellere leveringer etc. kan du gi disse administratortilgang.</p>
              <p>Ønsker du dette kan du sende meg en epost med navn og epost til de du ønsker skal ha administratortilgang. De vil motta en info-epost om dette sammen med en oversikt over funksjonene slik som du har mottatt nå. De kan også ta direkte kontakt med meg om de trenger ytterligere opplæring.</p>
			";
	

	$headers  = "From: " . $admin . "\r\n";
	$headers .= "Reply-To: " . $to . "\r\n";		
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	mail( $to, $subject, $body, $headers );
	}


	function sendmail_users($to,$password,$name) {
		$to = $to;
		$admin = 'hei@doubledowndish.no';
		$subject = 'Double Down Dish | Username & Password';
		$body  = "<p> Hei :) </p><p>($name) har inngått en bedriftsavtale med oss i Double Down Dish og du har blitt invitert med disse loggin detaljer:</p>";
		$body  .= "<p><strong> Username :  </strong> $to </p> <p> <strong> Password : </strong> $password  </p>";
		$body  .= "<p>Litt om oss, og litt om hva din bedriftsavtale gjør for deg.</p>
					<p>Double Down Dish leverer porsjonspakket, hjemmelaget og smakfull lunsj direkte på jobben, hver dag. </p>
					<p>Alt styres enkelt med telefonen eller PC. Når du registrerer deg får du din egen profil og her kan du styre og tilpasse jobblunsjen din slik at den blir akkurat slik du ønsker deg.</p>
					<p>Noen funksjoner (og fordeler) hos Double Down Dish:</p>
					<p>Velg selv hvilken lunsj du ønsker daglig</p>
					<p>Nye retter hver eneste dag</p>
					<p>Kommer fersk og klar til å spises, der du er</p>
					<p>Avbestill/ endre lunsjen enkelt om du har hjemmekontor eller er bortreist</p>
					<p>Hjemmelaget, smakfull og mettende lunsj hver dag på jobben</p>
					<p>Velg mellom enkeltbestilling eller fast leveranse</p>
					<p>Ingen bindingstid</p>
					<p>I filmen under viser vi deg hvordan du enkelt setter opp din egen profil, legger til allergener/ behov (f eks vegetar), legger inn betalingsinformasjon og bestiller lunsjen din!</p>		
					<p>PHOTO WITH EXPLAINING VIDEO LINK WILL BE HERE</p>
					<p>Vi gleder oss til å få lage lunsj til deg!</p>
					<p>Mvh</p>
					<p>Double Down Dish AS </p>				
				  ";
		
	
		$headers  = "From: " . $admin . "\r\n";
		$headers .= "Reply-To: " . $to . "\r\n";		
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		mail( $to, $subject, $body, $headers );
		}



add_action('wp_ajax_company_signup', 'company_signup', 0);
add_action('wp_ajax_nopriv_company_signup', 'company_signup');


function company_signup() {	

	  //require_once('../../../wp-config.php');
	  global $wpdb;		
	  $username = ($_POST['username']);
      $email = ($_POST['username']);
      $phone = stripcslashes($_POST['phone']);
      $referral = stripcslashes($_POST['referral']);	
      $name = stripcslashes($_POST['name']);  
	  $password = generateRandomString();	
	  $user_data = array(
		'user_login' => $username,
		'user_email' => $email,
		'user_pass' => $password,	
		'display_name' => $name,
		'role' => 'company'
		);
	    $user_id = wp_insert_user($user_data);
	  	if (!is_wp_error($user_id)) {		    
			sendmail($username,$password, $name);
			echo wp_send_json( array('code' => 200 , 'message'=>__('We have created an account for you.')));

	  	} else {
	    	if (isset($user_id->errors['empty_user_login'])) {
	          
			  echo wp_send_json( array('code' => 0 , 'message'=>__('User Name and Email are mandatory')));
	      	} elseif (isset($user_id->errors['existing_user_login'])) {
	         // echo 'User name already exixts.';
			  echo wp_send_json( array('code' => 0 , 'message'=>__('This email address is already registered.')));
	      	} else {	         
			  echo wp_send_json( array('code' => 0 , 'message'=>__('Error Occured please fill up the sign up form carefully.')));
	      	}
	  	}
	die;   
		
}



add_action('wp_ajax_company_signup_with_employees', 'company_signup_with_employees', 0);
add_action('wp_ajax_nopriv_company_signup_with_employees', 'company_signup_with_employees');
function company_signup_with_employees() {	


		global $wpdb;		
		$username = ($_POST['username']);
		$email = ($_POST['username']);
		$name = $_POST['name'];
		$phone = stripcslashes($_POST['phone']);
		$compnay_name = $_POST['compnay_name'];	
		$compnay_number = $_POST['compnay_number'];	
		$compnay_delivery_address = $_POST['compnay_delivery_address'];		
		$lunch_benefit = $_POST['lunch_benefit'];
		$lunch_benfit_type = $_POST['lunch_benfit_type'];
		$start_date = $_POST['start_date'];		
		$invite_user1 = $_POST['invite_user1'];	
		$invite_user2 = $_POST['invite_user2'];	
		$invite_user3 = $_POST['invite_user3'];	
		$password = generateRandomString();	


		$user_data = array(
			'user_login' => $username,
			'user_email' => $email,
			'user_pass' => $password,	
			'display_name' => $name,
			'role' => 'company'
			);
	    $user_id = wp_insert_user($user_data);
		
	  	if (!is_wp_error($user_id)) {

	
			update_user_meta( $user_id, 'compnay_delivery_address', $compnay_delivery_address);
			update_user_meta( $user_id, 'lunch_benefit', $lunch_benefit);
			update_user_meta( $user_id, 'lunch_benfit_type', $lunch_benfit_type);
			update_user_meta( $user_id, 'starting_date', $start_date);
			update_user_meta( $user_id, 'profile_delivery_phone', $phone);
			update_user_meta( $user_id, 'compnay_name', $compnay_name);
			update_user_meta( $user_id, 'compnay_number', $compnay_number);

			sendmail($username,$password, $name);

			// User Inviated 
			if($invite_user1 != '') {
				$invited_user_data = array(
					'user_login' => $invite_user1,
					'user_email' => $invite_user1,
					'user_pass' => $password,
					'role' => 'personal'
					);
	
				$c_user_id = wp_insert_user($invited_user_data);
				update_user_meta( $c_user_id, '_afflite', $username);
				sendmail_users($invite_user1,$password,$name);
	
			}
			// User Inviated 
			if($invite_user2 != '') {
				$invited_user2_data = array(
					'user_login' => $invite_user2,
					'user_email' => $invite_user2,
					'user_pass' => $password,
					'role' => 'personal'
					);
	
				$c_user2_id = wp_insert_user($invited_user2_data);
				update_user_meta( $c_user2_id, '_afflite', $username);
				sendmail_users($invite_user2,$password,$name);
	
			}

			// User Inviated 
			if($invite_user3 != '') {
				$invite_user3_data = array(
					'user_login' => $invite_user3,
					'user_email' => $invite_user3,
					'user_pass' => $password,
					'role' => 'personal'
					);
	
				$c_user3_id = wp_insert_user($invite_user3_data);
				update_user_meta( $c_user3_id, '_afflite', $username);
				sendmail_users($invite_user3,$password,$name);
	
			}

	
			echo wp_send_json( array('code' => 200 , 'message'=>__('we have created an account for you.')));

	  	} else {
	    	if (isset($user_id->errors['empty_user_login'])) {	          
			  echo wp_send_json( array('code' => 0 , 'message'=>__('User Name and Email are mandatory')));
	      	} elseif (isset($user_id->errors['existing_user_login'])) {
			  echo wp_send_json( array('code' => 0 , 'message'=>__('This email address is already registered.')));
	      	} else {	         
			  echo wp_send_json( array('code' => 0 , 'message'=>__('Error Occured please fill up the sign up form carefully.')));
	      	}
	  	}
	die;
		
}



add_action('wp_ajax_resetpassword', 'resetpassword', 0);
add_action('wp_ajax_nopriv_resetpassword', 'resetpassword');
function resetpassword() {	
	  $username = stripcslashes($_POST['username']);	
	  $password = generateRandomString();		
	  global $wpdb;  
    //We shall SQL escape all inputs  
      $username = $_POST['username'];
      $email = $_POST['username'];    
	  $password = generateRandomString();	
	  $user_data = array(
		'user_login' => $username,
		'user_email' => $username,
		'user_pass' => $password,	
		
		);

		$user = get_user_by( 'email', $email );
		$user_id = $user->ID;
	    $user_id = wp_update_user( array ( 'ID' => $user_id, 'user_pass' => $password ) );	
	  	if (!is_wp_error($user_id)) {		    
			sendmail($username,$password);
			echo wp_send_json( array('code' => 200 , 'message'=>__('Password Updated , Please check your email')));
	  	} else {	    		         
			  echo wp_send_json( array('code' => 0 , 'message'=>__('Error Occured please check your email address')));
	      	}
	  	
	die;   	
		
}





add_action('wp_ajax_add_employes', 'add_employes', 0);
add_action('wp_ajax_nopriv_add_employes', 'add_employes');
function add_employes() {	
	
		global $wpdb;		
		$uid = $_POST['uid'];
		$invite_user1 = $_POST['email'];
		$password = generateRandomString();	
		$user_id = wp_create_user($invite_user1, $password, $invite_user1);
		if (is_wp_error($user_id)) {
			echo wp_send_json(array('code' => 0 ,'message' => $user_id->get_error_message()));
			die;
		} else {
			update_user_meta( $user_id, 'employee', $uid);
			update_user_meta( $user_id, 'status', 'active');
			sendmail($invite_user1,$password,$invite_user1);
			echo wp_send_json( array('code' => 200 , 'message'=>__('New Employee created for this compnay')));
			die;
		}

	
		
	  	// if (!is_wp_error($user_id)) {

		// 	update_user_meta( $user_id, 'employee', $uid);
		// 	update_user_meta( $user_id, 'status', 'active');
		// 	sendmail($invite_user1,$password);
		// 	echo wp_send_json( array('code' => 200 , 'message'=>__('New user Created for this Compnay')));
			
	  	// } else {	
	    		         
		// 	  echo wp_send_json( array('code' => 0 , 'message'=>__('Sorry, that username already exists!)')));
			
	      	
	  	// }

	
	
		
}





add_action('wp_ajax_de_activate_employees', 'de_activate_employees', 0);
add_action('wp_ajax_nopriv_de_activate_employees', 'de_activate_employees');
function de_activate_employees() {	
	
		global $wpdb;		
		$uid = $_POST['uid'];
		$active_emp = $_POST['active_emp'];
		foreach($active_emp as $active_emp)
		{
			update_user_meta( $active_emp, 'status', 'inactive');
		}

		echo wp_send_json( array('code' => 0 , 'message'=>__('Selected employees updated with deactive status')));
	  
		die;
		
}



add_action('wp_ajax_activate_employees', 'activate_employees', 0);
add_action('wp_ajax_nopriv_activate_employees', 'activate_employees');
function activate_employees() {	
	
		global $wpdb;		
		$uid = $_POST['uid'];
		$active_emp = $_POST['active_emp'];
		foreach($active_emp as $active_emp)
		{
			update_user_meta( $active_emp, 'status', 'active');
		}

		echo wp_send_json( array('code' => 0 , 'message'=>__('Selected employees updated with active status')));
	  
		die;
		
}












