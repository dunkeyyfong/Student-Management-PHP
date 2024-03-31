<?php 
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $p_id = $_POST['p_id'];
        $p_title = $_POST['p_title'];
        $p_description = $_POST['p_desc'];
        $p_start_date = $_POST['s_date'];
        $p_end_date = $_POST['e_date'];

        $query = "INSERT INTO project (p_id, p_title, p_description, start_date, end_date) VALUES ('$p_id', '$p_title', '$p_description', '$p_start_date', '$p_end_date')";
        $result = $conn->query($query);

        if ($result) {
            alert_message("Project created successfully", "success");
            echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_project_page.php">';
            
        } else {
            alert_message("Failed to create project", "error");
            echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_project_page.php">';
        }
    }
?>