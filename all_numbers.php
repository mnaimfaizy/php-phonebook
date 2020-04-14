<?php include('inc/header.php'); ?>

<?php include('inc/nav.php'); ?>

<?php // TODO: make the delete button ask able via jQuery ?>
<main role="main" class="container-fluid">

<?php include('inc/breadcrumb.php'); ?>

		<div class="my-3 p-3 bg-white rounded shadow-sm">
				<div class="row">
						<div class="col-sm-12 col-md-12">

							<?php 	if(isset($_GET['res'])) {
										if($_GET['res'] == 1) { ?>
										<div class="alert alert-success alert-dismissible fade show" role="alert">
											<strong>Success!</strong> Conctact has been deleted successfully.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
								<?php	} else if($_GET['res'] == 0) { ?>

										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<strong>Error!</strong> There seems to be a problem, please try again later.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
								<?php	}
									}
							?>
							<div class="panel panel-primary">
								<div class="panel-heading mb-2">
									<h3 class="h3 float-left">List of All Contacts</h3>
									<form method="post" action="export_to_csv.php">
									<button type="submit" name="export_data" class="btn btn-primary btn-sm float-right">Export to CSV</button>
									</form>
									<div class="clearfix"></div>
								</div>
								<hr />
									<div class="panel-body">
										<div class="table-responsive">
											 <table id="example" class="table table-hover table-bordered mt-3" cellspacing="0" width="100%">
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
