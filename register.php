<?php
	include('inc/header.php');

	$errors = array();
	if(isset($_POST['submit'])) {
		$username = preg_replace('/[^A-Za-z]/','',$_POST['username']);
		$email = $_POST['email'];
		$password = $_POST['password'];
		$c_password = $_POST['c_password'];

		if(file_exists('users/'.$username.'.xml')) {
			$errors[] = 'Username already exists!';
		}
		if($username == '') {
			$errors[] = 'Username is blank!';
		}
		if($email == '') {
			$errors[] = 'Email is blank!';
		}
		if($password == '' || $c_password == '') {
			$errors[] = 'Passwords are blank!';
		}
		if($password != $c_password) {
			$errors[] = 'Passwords do not match!';
		}
		if(count($errors) == 0) {
			$xml = new SimpleXMLElement('<user></user>');
			$xml->addChild('password', md5($password));
			$xml->addChild('email', $email);
			$xml->asXML('users/'.$username.'.xml');
			header("Location: login.php");
			die;
		}
	}
?>

</head>
<body>
	<!-- content-top -->
	<div class="content-top">
		<!-- container -->
		<div class="container">
			<div class="logo">
				<a href="index.php">MNF Phone Book</a>
			</div>
			<div class="content">
				<div class="header">
					<?php include('inc/nav.php'); ?>
					<div class="clearfix"> </div>
				</div>
				<div class="content-grids">
					<div class="col-md-8">
							<div class="col-md-12 contact-info">
								<div class="contact-grid">
									<h3>Register</h3>
                                    <?php if(count($errors) > 0) {	?>
                                    	<ul>
                                        	<?php foreach($errors as $error) { ?>
                                            	<li> <?php echo $error; ?> </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
									<form action="register.php" method="post">
										<input type="text" class="email" placeholder="Username" required="required" name="username" id="username">
										<input type="text" class="email" placeholder="E-mail" name="email" id="email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?">
										<input type="password" placeholder="Password" name="password" id="password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off">
										<input type="password" placeholder="Password Again" name="c_password" id="c_password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off">
										<input type="submit" name="submit" id="submit" value="Sign Up">
									</form>
								</div>
							</div>
						</div>
					<div class="col-md-4 video-info">
						<?php include('inc/users_list.php'); ?>
					</div>
                    <?php include('inc/footer.php'); ?>
				</div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- content-top -->
</body>
</html>
