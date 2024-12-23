<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form values
    $isValid = true;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Format email tidak valid';
        $isValid = false;
    }

    if (strlen($password) < 8) {
        echo 'Password harus minimal 8 karakter';
        $isValid = false;
    }

    if ($isValid) {
        require_once './helper/database/UserController.php';

        $userController = new UserController();
        $user = $userController->login($email, $password);

        # set session
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header("Location: ./dashboard.php");
        } else {
            echo 'Email atau password salah';
        }

        if ($user) {
            // Redirect to the dashboard or home page
            header("Location: ./dashboard.php");
        } else {
            $loginError = 'Email atau password salah';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AcaraKita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <style>
        body {
            background-image: url('./assets/img/background.webp');
            background-size: cover;
            background-position: center;
        }
    </style>

    <div class="w-full h-screen grid grid-cols-2">
        <div class="bg-white/70 backdrop-blur w-full h-full max-w-xl rounded-r-3xl shadow-xl p-8 flex flex-col justify-center">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">AcaraKita</h1>
                <p class="text-gray-700 mt-2">Masuk untuk mulai memesan event kesukaanmu</p>
            </div>

            <?php if (isset($loginError)) { ?>
                <div class="text-red-600 mb-4"><?php echo $loginError; ?></div>
            <?php } ?>

            <form id="loginForm" action="#" method="post" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600">
                    <p id="emailError" class="mt-1 text-sm text-red-600 hidden"></p>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600">
                    <p id="passwordError" class="mt-1 text-sm text-red-600 hidden"></p>
                </div>

                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-600/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600">
                    Masuk
                </button>
            </form>

            <p class="mt-4 text-center text-sm text-gray-600">
                Belum punya akun?
                <a href="./register.php" class="font-medium text-blue-600 hover:text-blue-600/90">
                    Daftar di sini
                </a>
            </p>
        </div>
        <div></div>
    </div>

    <script src="./assets/js/cookie.js"></script>
<script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset errors
            const errors = document.querySelectorAll('.text-red-600');
            errors.forEach(error => error.classList.add('hidden'));
            
            // Get form values
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            let isValid = true;

            // Validate email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('emailError').textContent = 'Format email tidak valid';
                document.getElementById('emailError').classList.remove('hidden');
                isValid = false;
            }

            // Validate password
            if (password.length < 8) {
                document.getElementById('passwordError').textContent = 'Password harus minimal 8 karakter';
                document.getElementById('passwordError').classList.remove('hidden');
                isValid = false;
            }

            // If valid, submit the form
            if (isValid) {
                this.submit();
            }
        });

        const lastPageVisited = getCookie('lastPageVisited');
        const lastPageVisitedParagraph = document.createElement('p');
        lastPageVisitedParagraph.classList.add('fixed', 'bottom-2', 'z-50', 'right-0', 'bg-white', 'text-blue-400', 'p-2', 'rounded-l', 'shadow', 'text-xs');
        lastPageVisitedParagraph.textContent = `Terakhir kali Anda mengunjungi halaman ${lastPageVisited} (cookie)`;
        document.body.appendChild(lastPageVisitedParagraph);
        setCookie('lastPageVisited', window.location.pathname);
    </script>
</body>

</html>
