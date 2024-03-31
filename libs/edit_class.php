<?php
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $class_id = $_POST['class_id'];
        $class_name = $_POST['classname'];

        $query = "UPDATE class SET c_name = '$class_name' WHERE c_id = '$class_id'";

        if ($conn->query($query)) {
            alert_message('Class created successfully!');
            echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_class_page.php">';
        } else {
            alert_message('Failed to create class!');
        }
    }
?>