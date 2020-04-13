<?php include('inc/header.php'); ?>
<?php include('inc/nav.php'); ?>

<main role="main" class="container-fluid">

<?php include('inc/breadcrumb.php'); ?>

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <div class="row">
        <div class="col-sm-12 col-md-2">
            <!-- circles -->
            <div class="circles">
                <h3>Status</h3>
                <div class="card text-center mb-3">
                    <div class="card-header">
                        Users
                    </div>
                    <div class="card-body">
                        <div id="advanced" class="circle">
                            <?php $files = glob('users/*.xml');
                            if (count($files) > 0) {
                                echo count($files);
                            } else {
                                echo 0;
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="card text-center mb-3">
                    <div class="card-header">
                        Contacts
                    </div>
                    <div class="card-body">
                        <div id="advanced" class="circle">
                            <?php $files = glob('numbers/*.xml');
                            if (count($files) > 0) {
                                echo count($files);
                            } else {
                                echo 0;
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- //circles -->
        </div>
        <div class="col-sm-12 col-md-10">
            <div id="evoCalendar"></div>
        </div>
    </div>
</div>

</main>

<?php include('inc/footer.php'); ?>
