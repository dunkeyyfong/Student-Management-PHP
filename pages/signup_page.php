<?php
    include '../libs/db_connect.php';
    include '../libs/alert_message.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = 'uid_' . uniqid();
        $user_email = $_POST['useremail'];
        $user_pass = $_POST['userpass'];
        $re_user_pass = $_POST['re-userpass'];

        $hash_pass = password_hash($user_pass, PASSWORD_DEFAULT);

        $query = "SELECT * FROM users WHERE user_email = '$user_email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            alert_message('Email already exists!');
        } else {
            if ($user_pass !== $re_user_pass) {
                alert_message('Password does not match!');
            } else {
                $stmt = $conn->prepare("INSERT INTO users (user_id, user_email, user_pass) VALUES (?, ?, ?)");

                $stmt->bind_param('sss', $user_id, $user_email, $hash_pass);
    
                if ($stmt->execute()) {
                    alert_message('Created successfully!');
                    header('Location: /studentmanager/pages/signin_page.php?msg=success');
                    exit();
                } else {
                    alert_message('Failed to create new user!');
                    header('Location: /studentmanager/pages/signup_page.php?msg=failed');
                    exit();
                }

                $stmt->close();
                $conn->close();
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
                <h1 class="font-bold text-[2.3em] mb-5">Sign Up</h1>
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
                    <div class="m-3">
                        <p class="text-lg font-semibold mb-2">Re-password:</p>
                        <div class="border-2 border-slate-500 rounded-xl px-2 py-1">
                            <label for="icon-name"><i class="fa-solid fa-key px-2 py-2"></i></label>
                            <input class="focus:outline-none px-2 py-2 w-[30vh]" type="password" name="re-userpass" id="re-userpass" required>
                        </div>
                    </div>
                    <div class="flex justify-center bg-slate-900 hover:bg-slate-600 px-2 py-1 text-white rounded-lg mt-9">
                        <input class="px-4 py-2 hover:cursor-pointer" type="submit" value="Sign Up">
                    </div>
                </form>
                <div class="text-center mt-[5vh]">
                    <p>Already have an account?<a href="/studentmanager/pages/signin_page.php" class="ml-2 hover:text-sky-400 hover:underline">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>