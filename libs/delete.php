<?php
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['btn-delete'])) {
            $delete_id = $_POST['delete_id'];
            $delete_query = "DELETE FROM students WHERE s_id = ?";
            $delete_stmt = $conn->prepare($delete_query);
            $delete_stmt->bind_param('s', $delete_id);
            $delete_stmt->execute();

            if ($delete_stmt->affected_rows > 0) {
                alert_message('Student deleted successfully!');
                echo '<meta http-equiv="refresh" content="0;url=/studentmanager/pages/manage_student_page.php">';
            } else {
                alert_message('Failed to delete student!');
            }
            $delete_stmt->close();

        }
    }
?>