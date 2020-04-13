<?php include('inc/header.php'); ?>

<?php
	$error = false;
	if(isset($_POST['submit'])) {
		$o_password = md5($_POST['o_password']);
		$n_password = md5($_POST['n_password']);
		$c_password = md5($_POST['c_n_password']);

		$xml = new SimpleXMLElement('users/'.$_SESSION['username'].'.xml', 0, true);
		if($o_password == $xml->password) {
			if($n_password == $c_password) {
				$xml->password = $n_password;
				$xml->asXML('users/'.$_SESSION['username'].'.xml');
				header("Location: logout.php");
				die;
			}
		}
		$error = true;
	}
?>

<?php include('inc/nav.php'); ?>

<main role="main" class="container-fluid">

<?php include('inc/breadcrumb.php'); ?>

<div class="my-3 p-3 bg-white rounded shadow-sm">
		<div class="row">
				<div class="col-sm-12 col-md-8">
					<?php
						if($error) { ?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<strong>Error!</strong> Either Password do not match or Old Password is wrong, please try again.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php } ?>

						<form action="change_password.php" method="post" class="form">
							<div class="form-group">
								<label for="o_password">Old Password</label>
								<input type="password" class="form-control" placeholder="Old Password" required="required" name="o_password" id="o_password">
							</div>
							<div class="form-group">
								<label for="n_password">New Password</label>
								<input type="password" class="form-control" placeholder="New Password" name="n_password" id="n_password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="c_password">Confirm Password</label>
								<input type="password" class="form-control" placeholder="Cofirm New Password" name="c_n_password" id="c_n_password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off">
							</div>
							<input type="submit" class="btn btn-primary btn-block btn-lg" name="submit" id="submit" value="Change Password">
						</form>

				</div>
				<div class="col-sm-12 col-md-4">
					<?php include('inc/users_list.php'); ?>
				</div>
		</div>

</div>

</main>

<?php include('inc/footer.php'); ?>
