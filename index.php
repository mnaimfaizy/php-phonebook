<?php include('inc/header.php'); ?>
<?php include('inc/nav.php'); ?>

<main role="main" class="container">

<?php include('inc/breadcrumb.php'); ?>

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <!-- circles -->
            <div class="circles">
                <h3>Status</h3>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td width="50%" style="padding: 0px 30px;">
                                <div id="advanced" class="circle">
                                    <?php $files = glob('users/*.xml');
                                    if (count($files) > 0) {
                                        echo count($files);
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </div>
                            </td>
                            <td width="50%" style="padding: 0px 30px;">
                                <div id="advanced" class="circle">
                                    <?php $files = glob('numbers/*.xml');
                                    if (count($files) > 0) {
                                        echo count($files);
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><h3>Users</h3></td>
                            <td><h3>Contacts</h3></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- //circles -->
        </div>
        <div class="col-sm-12 col-md-4">
            <?php include('inc/users_list.php'); ?>
        </div>
    </div>
</div>

</main>

<?php include('inc/footer.php'); ?>
