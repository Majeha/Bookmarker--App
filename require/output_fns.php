<?php
	// print an HTML header
	function do_html_header($title)
	{
?>
<html>
<head>
<head>
 <title><?php echo $title ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Website CSS style -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

</head>
<body>
 
  <h1>Bookmarker</h1> 
  <hr />
<?php
		if ($title) {
			do_html_heading($title);
		}
	}
	// print an HTML footer
	function do_html_footer()
	{
?>
  		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	}
	// print heading
	function do_html_heading($heading)
	{
?>
		<h2><?php echo $heading; ?></h2>
<?php
	}
	
	// print output URL as link and br
	function do_html_url($url, $name)
	{
?>
  <br /><a href="<?php echo $url; ?>"><?php echo $name; ?></a><br />
<?php
	}
	// display some site info
	function display_site_info()
	{
?>
  <ul>
    <li>Store your bookmarks online with us!</li>
	<li>See what other users use!</li>
	<li>Get recommendations!</li>
  </ul>
<?php
	}
	function display_login_form()
	{
?>
  <div class="container">
			<div class="row main">
				<div class="main-login main-center">
  <form class ="login_form "method="post" action="auth_main.php">
  <div class="form-group">
  <label for="username" class="cols-sm-2 control-label">Username</label>
  <div class="cols-sm-10">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
	<input type="text" class="form-control" name="username" placeholder="Enter your Username"/>
	</div>
	</div>
	</div>
	<div class="form-group">
	<label for="password" class="cols-sm-2 control-label">Password</label>
	<div class="cols-sm-10">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
	<input type="password" class="form-control" name="passwd" placeholder="Enter your Password"/>
</div>
</div>
</div>
<div class="form-group ">
<input type="submit" value="Login" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">
</form>
</div>
</div>
</div>
<td colspan="2"><a href="forgot_form.php">Forgot your Password?</a></td>
 <p><a href="register_form.php">Not a Member?</a></p>
<?php
	}
	function display_registration_form()
	{
?>
<div class="container">
<div class="row main">
<div class="main-login main-center">
<h5>Sign up to use our badass bookmarker!</h5>

<form class ="register_form" method="post" action="register_new.php">
  <div class="form-group">
<label for="email" class="cols-sm-2 control-label">Your Email</label>
<div class="cols-sm-10">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
<input type="text" class="form-control" name="email" placeholder="Enter your Email"/>
</div>
</div>
</div>
  <div class="form-group">
  <label for="username" class="cols-sm-2 control-label">Username</label>
  <div class="cols-sm-10">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
	<input type="text" class="form-control" name="username" placeholder="Enter your Username"/>
	</div>
	</div>
	</div>

	 <div class="form-group">
	<label for="password" class="cols-sm-2 control-label">Password</label>
	<div class="cols-sm-10">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
	<input type="password" class="form-control" name="passwd" placeholder="Enter your Password"/>
</div>
</div>
</div>
<div class="form-group">
<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
<div class="cols-sm-10">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
<input type="password" class="form-control" name="passwd2" placeholder="Confirm your Password"/>
</div>
</div>
</div>
<div class="form-group ">
<input type="submit" value="Register" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">
</div>					
</form>
</div>
</div>
</div>

<?php
	}
	// display the table of URLs
	function display_user_urls($url_array)
	{
		//set global variable, so we can test later if this is on page
		global $bm_table;
		$bm_table = true;
?>
  <br />
  <form name="bm_table" method="post" action="delete_bms.php">
  <table width="300" cellpadding="2" cellspacing="0">
<?php
	$color = "#cccccc";
	echo "<tr bgcolor=\"$color\">"
			
	   . "<td><strong>Bookmark</strong></td>"
	   . "<td><strong>Delete?</strong></td></tr>";
	   if ( is_array($url_array) && count($url_array) > 0 ) {
	       foreach ($url_array as $url) {
		       if ($color == "#cccccc") {
                   $color = "#ffffff";
			   } else {
			       $color = "#cccccc";
			   }
		       echo "<tr bgcolor=\"$color\">"
                 . "<td><a href=\"$url\">" . htmlspecialchars($url) . "</a></td>"
			     . "<td><input type=\"checkbox\" name=\"del_me[]\" "
			     . "value=\"$url\"/></td></tr>";
		   }
		   // remember to call htmlspecialchars() when we are displaying
		   // user data
	   } else {
           echo "<tr><td>No bookmarks on record.</td></tr>";
	   }
?>
  </table>
  </form>
<?php
	}
	// display menu options on this page
	function display_user_menu()
	{
?>
  <hr />
  <a href="member.php">Home</a>&nbsp;|&nbsp;
  <a href="add_bm_form.php">Add Bookmark</a>&nbsp;|&nbsp;
<?php
	// some times there is no bookmarks
	// only offer delete option if bookmark table on this page
	global $bm_table;
	if ($bm_table == true) {
		echo "<a href=\"#\" onclick=\"bm_table.submit();\">"
			. "Delete Bookmark</a>&nbsp;|&nbsp;";
	} else {
		echo "<span style=\"color: #cccccc\">Delete BM</span>&nbsp;|&nbsp;";
	}
?>
  <a href="change_passwd_form.php">Change password</a>
  <br />
  <a href="recommend.php">Recommend URLs to me</a>&nbsp;|&nbsp;
    <a href="top.php">Top URL</a>&nbsp;|&nbsp;
  <a href="logout.php">Logout</a>
  <hr />
<?php
	}
	// display the form form people to add a new bookmark
	function display_add_bm_form() 
	{
?>
  <form name='bm_table' action='add_bms.php' method='post'>
  <table width='250' cellpadding='2' cellspacing='0' bgcolor='#cccccc'>
    <tr>
	  <td>New Bookmark:</td>
	  <td><input type="text" name="new_url" value="http://" size="30" 
	     maxlength="255" /></td>
	</tr>
	<tr>
	  <td colspan="2" align="center">
	    <input type="submit" value="Add bookmark" /></td>
	</tr>
  </table>
  </form>
<?php
	}
	// display html change password form
	function display_password_form() 
	{
?>
  <br />
  <form name="change_password" action='change_passwd.php' method='post'>
  <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr>
     <td>Old password:</td>
	 <td><input type="password" name="old_passwd" size="16"
	            maxlength="16" /></td>
   </tr>
   <tr>
     <td>New password:</td>
	 <td><input type="password" name="new_passwd" size="16"
	            maxlength="16" /></td>
   </tr>
   <tr>
     <td>Repeat new password:</td>
	 <td><input type="password" name="new_passwd2" size="16"
	            maxlength="16" /></td>
   </tr>
   <tr>
     <td colspan="2" align="center">
	 <input type="submit" value="Change password" />
	 </td>
   </tr>
  </table>
  <br />
  </form>
<?php
	}
	// display HTML form to reset and email password
	function display_forgot_form()
	{
?>
  <form action="forgot_passwd.php" method="post">
  <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
    <tr>
	  <td>Enter your username</td>
	  <td><input type="text" name="username" size="16" maxlength="16" /></td>
	</tr>
   <tr>
     <td colspan="2" align="center">
	 <input type="submit" value="Change Password" />
	 </td>
  </table>
  <br />
  </form>
<?php
	}
	// similar output to display_user_urls
	// instead of displaying the users bookmarks, display recomendation
	function display_recommended_urls($url_array)
	{
?>
  <br />
  <table width="300" cellpadding="2" cellspacing="0">
<?php
	$color = "#cccccc";
	echo "<tr bgcolor=\"$color\">"
	   . "<td><strong>Recommedations</strong></td></tr>";
	if ( is_array($url_array) && count($url_array) > 0 ){
		foreach ($url_array as $url) {
			if ($color == "#cccccc") {
				$color = "#ffffff";
			} else {
				$color = "#cccccc";
			}
			echo "<tr bgcolor=\"$color\">"
			   . "<td><a href=\"$url\">" . htmlspecialchars($url) 
			   . "</a></td></tr>";
		}
	} else {
		echo "<tr><td>No recommendations for you today.</td></tr>";
	}
?>
  </table>
<?php
	}
?>