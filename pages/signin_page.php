<?php 
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $user_email = $_POST['useremail'];
        $user_pass = $_POST['userpass'];

        $query1 = "SELECT * FROM users WHERE user_email = '$user_email'";
        $query2 = "SELECT * FROM admin WHERE a_user = '$user_email' AND a_pass = '$user_pass'";
        $result1 = $conn->query($query1);
        $result2 = $conn->prepare($query2);

        if ($user_email === 'admin@nei.com') {
            $result2->execute();
            $result2->store_result();
            if ($result2->num_rows == 1) {
                alert_message('Login successful');
                header("Location: /studentmanager/pages/admin_page.php");
                exit();
            } else {
                alert_message('Invalid email or password');
            }
        }
        else {
            if ($result1->num_rows == 1) {
                $row = $result1->fetch_assoc();
                $hash_pass = $row['user_pass'];

                if (password_verify($user_pass, $hash_pass)) {
                    alert_message('Login successful');
                    header("Location: /studentmanager/pages/user_page.php?$row[user_id]");
                    exit();
                } else {
                    alert_message('Invalid email or password');
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTEC - Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex justify-center items-center h-screen">
        <div class="p-6">
            <div class="text-center mb-10">
                <h1 class="font-bold text-[2.3em] mb-5">Sign In</h1>
                <p>to Student Management</p>
            </div>
            <div class="m-4 p-3">
                <form action="" method="post">
                    <div class="m-3">
                        <p class="text-lg font-semibold mb-2">Email:</p>
                        <div class="border-2 border-slate-500 rounded-xl px-2 py-1">
                            <label for="icon-name"><i class="fa-solid fa-envelope px-2 py-2"></i></label>
                            <input class="focus:outline-none px-2 py-2 w-[30vh]" type="email" name="useremail" id="useremail" required>
                        </div>
                    </div>
                    <div class="m-3">
                        <p class="text-lg font-semibold mb-2">Password:</p>
                        <div class="border-2 border-slate-500 rounded-xl px-2 py-1">
                            <label for="icon-name"><i class="fa-solid fa-key px-2 py-2"></i></label>
                            <input class="focus:outline-none px-2 py-2 w-[30vh]" type="password" name="userpass" id="userpass" required>
                        </div>
                    </div>
                    <div class="flex justify-center bg-slate-900 hover:bg-slate-600 px-2 py-1 text-white rounded-lg mt-9">
                        <input class="px-4 py-2 hover:cursor-pointer" type="submit" value="Sign In">
                    </div>
                </form>
                <div class="text-center mt-[5vh]">
                    <p>Don't have an account?<a href="/studentmanager/pages/signup_page.php" class="ml-2 hover:text-sky-400 hover:underline">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>