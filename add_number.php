<?php include('inc/header.php'); ?>

<?php
	$errors = array();
	if(isset($_POST['submit'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone1 = $_POST['phone1'];
		$phone2 = $_POST['phone2'];
		$phone3 = $_POST['phone3'];
		$phone4 = $_POST['phone4'];
		$address = $_POST['address'];
		$organization = $_POST['organization'];
		$email = $_POST['email'];
		$date = date('d-m-Y', time());
		$time = date('H:i:s', time());

		if(file_exists('numbers/'.$firstname .'-'.$lastname.'.xml')) {
			$errors[] = 'Contact already exists!';
		}
		if($firstname == '') {
			$errors[] = 'Firstname is required';
		}
		if($lastname == '') {
			$errors[] = 'Lastname is required';
		}
		if($phone1 == '') {
			$errors[] = 'Phone #1 is required';
		}

		if(count($errors) == 0) {
			$xml = new SimpleXMLElement('<number></number>');
			$xml->addChild('firstname', $firstname);
			$xml->addChild('lastname', $lastname);
			$xml->addChild('phone1',$phone1);
			$xml->addChild('phone2', $phone2);
			$xml->addChild('phone3', $phone3);
			$xml->addChild('phone4', $phone4);
			$xml->addChild('address', $address);
			$xml->addChild('organization', $organization);
			$xml->addChild('email', $email);
			$xml->addChild('date', $date);
			$xml->addChild('time', $time);
			$xml->asXML('numbers/'.$firstname.'-'.$lastname.'.xml');
			echo '<script> alert("One Contact added successfully!"); </script>';
		}
	}
?>

<?php include('inc/nav.php'); ?>

<main role="main" class="container">
	
<?php include('inc/breadcrumb.php'); ?>

		<div class="my-3 p-3 bg-white rounded shadow-sm">
		    <div class="row">
		        <div class="col-sm-12 col-md-12">
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

							<?php }  ?>

						<form action="add_number.php" method="post">
								<div class="row">
										<div class="col-md-6">
											<div class="form-group">
													<label for="firstname">Firstname <span style="color:red;">*</span></label>
													<input type="text" name="firstname" id="firstname" placeholder="Firstname" class="form-control" />
											</div>
											</div>
											<div class="col-md-6">
											<div class="form-group">
													<label for="lastname">Lastname <span style="color:red;">*</span></label>
													<input type="text" name="lastname" id="lastname" placeholder="Lastname" class="form-control" />
											</div>
											</div>
									</div>

									<div class="row">
									<div class="col-md-3">
									<div class="form-group">
											<label for="phone1">Phone #1 <span style="color:red;">*</span></label>
											<input type="text" name="phone1" id="phone1" placeholder="Phone #1" class="form-control" />
									</div>
									</div>
									<div class="col-md-3">
									<div class="form-group">
											<label for="phone2">Phone #2</label>
											<input type="text" name="phone2" id="phone2" placeholder="Phone #2" class="form-control" />
									</div>
									</div>
									<div class="col-md-3">
									<div class="form-group">
											<label for="phone3">Phone #3</label>
											<input type="text" name="phone3" id="phone3" placeholder="Phone #3" class="form-control" />
									</div>
									</div>
									<div class="col-md-3">
									<div class="form-group">
											<label for="phone4">Phone #4</label>
											<input type="text" name="phone4" id="phone4" placeholder="Phone #4" class="form-control" />
									</div>
									</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
													<label for="address">Address</label>
													<input type="text" name="address" id="address" placeholder="Address" class="form-control" />
											</div>
											</div>
											<div class="col-md-6">
											<div class="form-group">
													<label for="organization">Organization</label>
													<input type="text" name="organization" id="organization" placeholder="Organization" class="form-control" />
											</div>
											</div>
									</div>

									<div class="row">
											<div class="col-md-6">
											<div class="form-group">
													<label for="email">E-mail</label>
													<input type="text" name="email" id="email" placeholder="E-mail" class="form-control" />
											</div>
											</div>
								 </div>
								 <div class="row">
											<div class="col-md-6">
											<div class="form-group">
													<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary" />
											</div>
											</div>
									</div>
							</form>
						</div>
				</div>
		</div>

	</main>

	<?php include('inc/footer.php'); ?>
