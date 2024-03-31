<?php 
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $class_id = $_POST['c_id'];
        $class_name = $_POST['c_name'];

        $query = "INSERT INTO class (c_id, c_name) VALUES ('$class_id', '$class_name')";

        if ($conn->query($query)) {
            alert_message('Class created successfully!');
            echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_class_page.php">';
        } else {
            alert_message('Failed to create class!');
        }
    }
?>