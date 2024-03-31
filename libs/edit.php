<?php 
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $student_id = $_POST['student_id'];
        $s_name = $_POST['username'];
        $s_class = $_POST['class'];
        $s_birth = $_POST['birth'];
        $s_img = $_FILES['image']['name'];
        $s_img_tmp = $_FILES['image']['tmp_name'];

        $upload_dir = '../img/';
        $img_ext = pathinfo($s_img, PATHINFO_EXTENSION);
        $img_name = 'new_' . $student_id . '.' . $img_ext;

        move_uploaded_file($s_img_tmp, $upload_dir . $img_name);

        $s_img_new_path = $upload_dir . $img_name;

        $query = "UPDATE students SET s_name = '$s_name', s_class = '$s_class', s_birth = '$s_birth', s_img = '$s_img_new_path' WHERE s_id = '$student_id'";

        if ($conn->query($query)) {
            alert_message('Student updated successfully!');
            echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_page.php">';
        } else {
            alert_message('Failed to update student!');
        }
    }
?>