<?php include('inc/header.php'); ?>

<?php

	$errors = array();
	if(isset($_POST['submit'])) {
		echo $username = preg_replace('/[^A-Za-z0-9]/','',$_POST['username']);
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
			echo '<script>alert("User registeration was successfull.");</script>';
		}
	}
?>

<?php include('inc/nav.php'); ?>

<main role="main" class="container-fluid">

<?php include('inc/breadcrumb.php'); ?>

<div class="my-3 p-3 bg-white rounded shadow-sm">
		<div class="row">
				<div class="col-sm-12 col-md-6">
					<?php if(count($errors) > 0) {	?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<ul>
								<?php foreach($errors as $error) { ?>
									<li> <?php echo $error; ?> </li>
								<?php } ?>
							</ul>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>				
					<?php } ?>

					<?php if(isset($_GET['msg'])) { 
							if($_GET['msg'] === 'success') { ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Success</strong> User deleted successfully.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php	} elseif($_GET['msg'] === 'error') { ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Error</strong> Some error occured, please try again.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php 	}
					} ?>

					<form action="register.php" method="post" class="form">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" placeholder="Username" required="required" name="username" id="username">
						</div>
						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="email" class="form-control" placeholder="E-mail" name="email" id="email" required="required" >
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" placeholder="Password" name="password" id="password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="c_password">Confirm Password</label>
							<input type="password" class="form-control" placeholder="Password Again" name="c_password" id="c_password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off">
						</div>

						<input type="submit" class="btn btn-primary btn-block btn-lg" name="submit" id="submit" value="Regsiter User">
					</form>
				</div>
				<div class="col-sm-12 col-md-6">
					<?php include('inc/users_list.php'); ?>
				</div>
		</div>
</div>

</main>

<?php include('inc/footer.php'); ?>
