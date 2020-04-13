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
				$errors[] = 'Firstname is blank!';
			}
			if($lastname == '') {
				$errors[] = 'Lastname is blank!';
			}
			if($phone1 == '') {
				$errors[] = 'Phone 1 is blank!';
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

<main role="main" class="container-fluid">

<?php include('inc/breadcrumb.php'); ?>

		<div class="my-3 p-3 bg-white rounded shadow-sm">
				<div class="row">
						<div class="col-sm-12 col-md-12">
							<?php // TODO: Add the bootstrap alert box
									if(count($errors) > 0) {	?>
									<ul>
											<?php foreach($errors as $error) { ?>
													<li> <?php echo $error; ?> </li>
											<?php } ?>
									</ul>
							<?php }
								if(isset($_GET['res'])) {
									if($_GET['res'] == 1) {
										echo '<p> Conctact has been deleted successfully! </p>';
									} else if($_GET['res'] == 0) {
										echo '<p> Sorry! There seems to be a problem, please try again later. </p>';
									}
								}
							?>
							<div class="panel panel-primary">
								<div class="panel-heading">List of All Contacts</div>
									<div class="panel-body">
										<div class="table-responsive">
											 <table id="example" class="table table-hover table-bordered" cellspacing="0" width="100%">
													<thead>
															<tr>
																	<th>Name</th>
																	<th>Phone #1</th>
																	<th>Phone #2</th>
																	<th>Phone #3</th>
																	<th>Phone #4</th>
																	<th>Address</th>
																	<th>Organization</th>
																	<th>E-mail</th>
																	<th>Action</th>
															</tr>
													</thead>
													<tbody>
															<?php $files = glob('numbers/*.xml');
																foreach($files as $file) {
																	$xml = new SimpleXMLElement($file, 0, true);
																	$number = $xml->firstname .'-'. $xml->lastname;
																	echo '
																		<tr>
																			<td>'.$xml->firstname. ' ' . $xml->lastname.'</td>
																			<td>'.$xml->phone1.'</td>
																			<td>'.$xml->phone2.'</td>
																			<td>'.$xml->phone3.'</td>
																			<td>'.$xml->phone4.'</td>
																			<td>'.$xml->address.'</td>
																			<td>'.$xml->organization.'</td>
																			<td>'.$xml->email.'</td>
																			<td><a href="delete.php?number='.$number.'"> X </a></td>
																		</tr>';
																}
															?>
													</tbody>
											</table>
										</div>
									</div>
							</div>
						</div>
				</div>
		</div>

</main>

<?php include('inc/footer.php'); ?>
