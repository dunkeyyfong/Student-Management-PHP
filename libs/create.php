<?php
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $s_id = $_POST['s_id'];
        $s_name = $_POST['s_name'];
        $s_class = $_POST['s_class'];
        $s_birth = $_POST['s_birth'];
        $s_img = $_FILES['s_img']['name'];
        $s_img_tmp = $_FILES['s_img']['tmp_name'];
    
        $upload_dir = '../img/';
        $img_ext = pathinfo($s_img, PATHINFO_EXTENSION);
        $img_name = $s_id . '.' . $img_ext;
    
        move_uploaded_file($s_img_tmp, $upload_dir . $img_name);
    
        $query = "INSERT INTO students (s_id, s_name, s_class, s_birth, s_img) VALUES ('$s_id', '$s_name', '$s_class', '$s_birth', '$upload_dir$img_name')";
        $result = $conn->query($query);
    
        if ($result) {
            alert_message('Student added successfully!');
            echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_page.php">';
        } else {
            alert_message('Failed to add student!');
        }
    }
?>



