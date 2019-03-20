<?php
 function has_presence($value) {
	$trimmed_value = trim($value);
  return isset($trimmed_value) && $trimmed_value !== "";
}

function has_length($value, $options=[]) {
	if(isset($options['max']) && (strlen($value) > (int)$options['max'])) {
		return false;
	}
	if(isset($options['min']) && (strlen($value) < (int)$options['min'])) {
		return false;
	}
	if(isset($options['exact']) && (strlen($value) != (int)$options['exact'])) {
		return false;
	}
	return true;
}

function html($string) {
	return htmlspecialchars($string);
}

// Sanitize for JavaScript output
function javascript($string) {
	return json_encode($string);
}

// Sanitize for use in a URL
function url($string) {
	return urlencode($string);
}

function request_is_get() {
	return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function request_is_post() {
	return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function redirect_to($new_location) {
	header( "Location: $new_location" );
	exit;
  }

  // Useful php.ini file settings:
// session.cookie_lifetime = 0
// session.cookie_secure = 1
// session.cookie_httponly = 1
// session.use_only_cookies = 1
// session.entropy_file = "/dev/urandom"

//session_start();

// Function to forcibly end the session
//function end_session() {
	// Use both for compatibility with all browsers
	// and all versions of PHP.
//	session_unset();
  //session_destroy();
//}

// Does the request IP match the stored value?
function request_ip_matches_session() {
	// return false if either value is not set
	if(!isset($_SESSION['ip']) || !isset($_SERVER['REMOTE_ADDR'])) {
		return false;
	}
	if($_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
		return true;
	} else {
		return false;
	}
}

// Does the request user agent match the stored value?
function request_user_agent_matches_session() {
	// return false if either value is not set
	if(!isset($_SESSION['user_agent']) || !isset($_SERVER['HTTP_USER_AGENT'])) {
		return false;
	}
	if($_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']) {
		return true;
	} else {
		return false;
	}
}

// Has too much time passed since the last login?
function last_login_is_recent() {
	$max_elapsed = 60 * 60 * 24; // 1 day
	// return false if value is not set
	if(!isset($_SESSION['last_login'])) {
		return false;
	}
	if(($_SESSION['last_login'] + $max_elapsed) >= time()) {
		return true;
	} else {
		return false;
	}
}

// Should the session be considered valid?
function is_session_valid() {
	$check_ip = true;
	$check_user_agent = true;
	$check_last_login = true;

	if($check_ip && !request_ip_matches_session()) {
		return false;
	}
	if($check_user_agent && !request_user_agent_matches_session()) {
		return false;
	}
	if($check_last_login && !last_login_is_recent()) {
		return false;
	}
	return true;
}

// If session is not valid, end and redirect to login page.
function confirm_session_is_valid() {
	if(!is_session_valid()) {
		end_session();
		// Note that header redirection requires output buffering 
		// to be turned on or requires nothing has been output 
		// (not even whitespace).
		header("Location: err.php");
		exit;
	}
}


function end_session() {
	// Use both for compatibility with all browsers
	// and all versions of PHP.
	session_unset();
  session_destroy();
}


// Is user logged in already?
function is_logged_in() {
	return (isset($_SESSION['logged_in']) && $_SESSION['logged_in']);
}

// If user is not logged in, end and redirect to login page.
function confirm_user_logged_in() {
	if(!is_logged_in()) {
		end_session();
		// Note that header redirection requires output buffering 
		// to be turned on or requires nothing has been output 
		// (not even whitespace).
		header("Location: err.php");
		exit;
	}
}


// Actions to preform after every successful login
function after_successful_login() {
	// Regenerate session ID to invalidate the old one.
	// Super important to prevent session hijacking/fixation.
	session_regenerate_id(true);
	
	$_SESSION['logged_in'] = true;

	// Save these values in the session, even when checks aren't enabled 

	
}

// Actions to preform after every successful logout
function after_successful_logout() {
	$_SESSION['logged_in'] = false;
	end_session();
}

// Actions to preform before giving access to any 
// access-restricted page.
function before_every_protected_page() {
	confirm_user_logged_in();
	confirm_session_is_valid();
}


// Uncomment to demonstrate usage

// if(isset($_GET['action'])) {
// 	if($_GET['action'] == "login") {
// 		after_successful_login();
// 	}
// 	if($_GET['action'] == "logout") {
// 		after_successful_logout();
// 	}
// } 
// 
// echo "Session ID: " . session_id() . "<br />";
// echo "Logged in: " . (is_logged_in() ? 'true' : 'false') . "<br />";
// echo "Session valid: " . (is_session_valid() ? 'true' : 'false') . "<br />";
// echo "<br />";
// echo "--- SESSION ---<br />";
// var_dump($_SESSION);
// echo "--------------------<br />";
// echo "<br />";
// 
// echo "<a href=\"?action=new_page\">Simulate a new page request</a><br />";
// echo "<a href=\"?action=login\">Simulate a log in</a><br />";
// echo "<a href=\"?action=logout\">Simulate a log out</a>";



//The code will not work if your client have proxy server. In that case use this function to get real IP address of client.
function getRealIPAddr()
{
	//check ip from share internet

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
	{
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	//to check ip is pass from proxy

	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
	{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
?>
