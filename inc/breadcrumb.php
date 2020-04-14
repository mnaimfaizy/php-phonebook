<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-info rounded shadow-sm">
    <img class="mr-3" src="" alt="" width="48" height="48">
    <div class="lh-100">
        <h6 class="mb-0 text-white lh-100 font-weight-bold">PHP Phone Book</h6>
        <small class="text-white">Dashboard</small>
        &nbsp; &nbsp; > &nbsp; &nbsp;
        <?php switch($page_name) {
            case 'index.php':
                echo '<small>Home</small>';
                break;
            case 'add_number.php':
                echo '<a href="add_number.php" class="text-light"><small>Add Number</small></a>';
                break;
            case 'all_numbers.php':
                echo '<a href="all_numbers.php" class="text-light"><small>All Numbers</small></a>';
                break;
            case 'change_password.php':
                echo '<a href="change_password.php" class="text-light"><small>Change Password</small></a>';
                break;
            case 'register.php':
                echo '<a href="register.php" class="text-light"><small>Register User</small></a>';
                break;
            default:
                echo '';    
        } ?>
    </div>
</div>
