<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand p-0" href="https://github.com/mnaimfaizy" target="_blank">
        <img src="assets/images/logo.png" alt="PHP Phone Book" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo ($page_name === 'index.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($page_name === 'add_number.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="add_number.php">Add Number</a>
            </li>
            <li class="nav-item <?php echo ($page_name === 'all_numbers.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="all_numbers.php">All Numbers</a>
            </li>
            <?php // We will check if the user is admin or not
              if(isset($_SESSION['username']) && $_SESSION['username'] === 'admin') { ?>
              <li class="nav-item <?php echo ($page_name === 'register.php') ? 'active' : ''; ?>">
                  <a class="nav-link" href="register.php">Register User</a>
              </li>
            <?php } ?>
            <li class="nav-item <?php echo ($page_name === 'change_password.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="change_password.php">Change Password</a>
            </li>
            <li class="nav-item <?php echo ($page_name === 'logout.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>

        </ul>
        <ul class="justify-content-end">
            <li class="nav-item">
                <a class="nav-link disabled text-white" href="#">Welcome &nbsp;&nbsp;<span style="color: grey;">
                    <?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; } ?></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<div class="nav-scroller bg-white shadow-sm">&nbsp;</div>
