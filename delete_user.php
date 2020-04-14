<?php 
    if(isset($_POST['user_id'])) {
        $user = $_POST['user_id'];
        if(file_exists('users/'.$user)) {
            $result = unlink('users/'.$user);
            echo ($result) ? 'success' : 'error';
        }
    }
?>