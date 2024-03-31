<?php 
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_POST['user_id'];
        $user_pass = $_POST['password'];

        $hash_pass = password_hash($user_pass, PASSWORD_DEFAULT);

        $query = "UPDATE users SET user_pass = '$hash_pass' WHERE user_id = '$user_id'";

        if ($conn->query($query)) {
            alert_message('Password changed successfully!');
            echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_account_page.php">';
        } else {
            alert_message('Failed to change password!');
        }
    }
?>