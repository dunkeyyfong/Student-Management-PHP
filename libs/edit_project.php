<?php 
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $p_id = $_POST['project_id'];
        $p_title = $_POST['title'];
        $p_description = $_POST['desc'];
        $p_start_date = $_POST['start_date'];
        $p_end_date = $_POST['end_date'];

        $query = "UPDATE project SET p_title = '$p_title', p_description = '$p_description', start_date = '$p_start_date', end_date = '$p_end_date' WHERE p_id = '$p_id'";
        $result = $conn->query($query);

        if ($result) {
            alert_message("Project updated successfully", "success");
            echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_project_page.php">';
            
        } else {
            alert_message("Failed to update project", "error");
            echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_project_page.php">';
        }
    }
?>