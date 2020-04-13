<footer class="footer">
  <div class="container-fluid text-center">
    <span class="text-muted">© <?php echo date('Y', time()); ?> PHP Phone Book. All rights reserved.</span>
  </div>
</footer>

<script src="assets/js/jquery-3.4.1.slim.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dashboard.js"></script>

<!-- script-for-menu -->
<script>
    $( "span.menu-info" ).click(function() {
        $( "ul.nav1" ).slideToggle( 300, function() {
            // Animation complete.
        });
    });
</script>
<!-- /script-for-menu -->

<!-- DataTable JS -->
<script type="text/javascript" language="javascript" src="assets/DataTables/datatables.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('#example').DataTable();
    } );

</script>
<!--// DataTable JS -->

</body>
</html>
