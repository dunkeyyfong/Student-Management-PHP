<?php 
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $delete_id = $_POST['delete_id'];

        $query = "DELETE FROM project WHERE p_id = '$delete_id'";
        $result = $conn->query($query);

        if ($result) {
            alert_message("Project deleted successfully", "success");
            echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_project_page.php">';
            
        } else {
            alert_message("Failed to delete project", "error");
            echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_project_page.php">';
        }
    }
?>