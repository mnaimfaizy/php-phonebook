<footer class="footer">
  <div class="container-fluid text-center">
    <span class="text-muted">© <?php echo date('Y', time()); ?> PHP Phone Book. All rights reserved.</span>
  </div>
</footer>

<script src="assets/js/jquery-3.4.1.slim.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dashboard.js"></script>

<?php // We will check if the page is index.php and load the script
      if(basename($_SERVER['PHP_SELF']) === 'index.php') { ?>
    <!-- EVO Calendar Script -->
    <script src="assets/event-calendar-evo/evo-calendar.js"></script>
    <script>
        $('#evoCalendar').evoCalendar({
            todayHighlight: true,
            sidebarToggler: true,
            eventListToggler: true,
            eventDisplayDefault: false,
            canAddEvent: true,
            calendarEvents: [
                { name: "New Year", date: "Wed Jan 01 2020 00:00:00 GMT-0800 (Pacific Standard Time)", type: "holiday", everyYear: true },
                { name: "Valentine's Day", date: "Fri Feb 14 2020 00:00:00 GMT-0800 (Pacific Standard Time)", type: "holiday", everyYear: true },
                { name: "Patient #1", date: "February/3/2020", type: "event" },
                { name: "Patient #3", date: "February/3/2020", type: "event" },
                { name: "Patient #4", date: "February/3/2020", type: "event" },
                { name: "Holiday #3", date: "February/3/2020", type: "holiday" },
                { name: "Birthday #2", date: "February/3/2020", type: "birthday" },
                { name: "Author's Birthday", date: "February/15/2020", type: "birthday", everyYear: true },
                { name: "Holiday #4", date: "February/15/2020", type: "event" },
                { name: "Patient #2", date: "February/8/2020", type: "event" },
                { name: "Leap day", date: "February/29/2020", type: "holiday", everyYear: true }
            ],
            onSelectDate: function() {
                console.log('onSelectDate!')
            },
            onAddEvent: function() {
                console.log('onAddEvent!')
            }
        });
    </script>
<?php } ?>

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
        $('#users_table').DataTable();  

        $('.delete_user').on('click', function(e) {
            if(confirm('Are you sure to delete this user?')) {
                var user_id = $(this).attr("id");
                $.ajax({
                    url: 'delete_user.php',
                    data: { user_id: user_id },
                    method: 'POST',
                    cache: false,
                    success: function(data) {
                        <?php $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                        window.location.href = '<?php echo $current_url; ?>?msg='+data;
                    }
                });
            }
        });
    });

</script>
<!--// DataTable JS -->

</body>
</html>
