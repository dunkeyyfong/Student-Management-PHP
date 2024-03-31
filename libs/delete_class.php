<?php 
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btn-delete'])) {
            $delete_id = $_POST['delete_id'];
            $delete_query = "DELETE FROM class WHERE c_id = ?";
            $delete_stmt = $conn->prepare($delete_query);
            $delete_stmt->bind_param('s', $delete_id);
            $delete_stmt->execute();

            if ($delete_stmt->affected_rows > 0) {
                alert_message('Class deleted successfully!');
                echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_class_page.php">';
            } else {
                alert_message('Failed to delete class!');
            }
            $delete_stmt->close();
        }
    }
?>