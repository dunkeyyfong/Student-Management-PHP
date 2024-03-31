<?php 
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTEC - Admin page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="fixed top-0 left-0 right-0 bg-[#222121]">
        <div class="flex items-center justify-between px-5 py-3">
            <img src="/studentmanager/img/logo.webp" alt="logo" class="w-[200px] h-auto">
            <div class="bg-slate-300 rounded-xl">
                <button class="px-3 py-2 font-semibold" name="btn-logout">Log Out</button>
            </div>
        </div>
    </div>
    <div class="">
        <div class="flex items-center h-screen justify-center">
            <div class="space-y-8">
                <div>
                    <a href="../pages/manage_student_page.php" class="bg-[#f6f6f6] shadow-lg shadow-slate-600 px-7 py-2 rounded-lg font-bold">Manage Student</a>
                </div>
                <div>
                    <a href="../pages/manage_account_page.php" class="bg-[#f6f6f6] shadow-lg shadow-slate-600 px-7 py-2 rounded-lg font-bold">Manage Account</a>
                </div>
                <div>
                    <a href="../pages/manage_class_page.php" class="bg-[#f6f6f6] shadow-lg shadow-slate-600 px-7 py-2 rounded-lg font-bold">Manage Class</a>
                </div>
                <div>
                    <a href="../pages/manage_project_page.php" class="bg-[#f6f6f6] shadow-lg shadow-slate-600 px-7 py-2 rounded-lg font-bold">Manage Project</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>