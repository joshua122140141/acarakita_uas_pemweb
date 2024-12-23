<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form values
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate form values
    $isValid = true;

    if (strlen($nama) < 3) {
        echo 'Nama harus minimal 3 karakter';
        $isValid = false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Format email tidak valid';
        $isValid = false;
    }

    if (strlen($password) < 8) {
        echo 'Password harus minimal 8 karakter';
        $isValid = false;
    }

    if ($password !== $confirmPassword) {
        echo 'Password tidak cocok';
        $isValid = false;
    }

    if ($isValid) {
        require_once './helper/database/UserController.php';

        $userController = new UserController();
        $user = $userController->create($nama, $email, $password);

        if ($user) {
            // Redirect to the dashboard or home page
            header("Location: ./login.php");
        } else {
            echo 'Gagal membuat akun';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - AcaraKita</title>
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
                <h1 class="text-3xl font-bold text-blue-600">AcaraKita</h1>
                <p class="text-gray-700 mt-2">Buat akun untuk mulai memesan event kesukaanmu</p>
            </div>

            <form id="registrationForm" action="#" method="post" class="space-y-6">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600">
                    <p id="namaError" class="mt-1 text-sm text-red-600 hidden"></p>
                </div>

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

                <div>
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600">
                    <p id="confirmPasswordError" class="mt-1 text-sm text-red-600 hidden"></p>
                </div>

                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-600/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600">
                    Daftar Sekarang
                </button>
            </form>

            <p class="mt-4 text-center text-sm text-gray-600">
                Sudah punya akun?
                <a href="./login.php" class="font-medium text-blue-600 hover:text-blue-600/90">
                    Masuk di sini
                </a>
            </p>
        </div>
        <div></div>
    </div>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset errors
            const errors = document.querySelectorAll('.text-red-600');
            errors.forEach(error => error.classList.add('hidden'));
            
            // Get form values
            const nama = document.getElementById('nama').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            let isValid = true;

            // Validate name
            if (nama.length < 3) {
                document.getElementById('namaError').textContent = 'Nama harus minimal 3 karakter';
                document.getElementById('namaError').classList.remove('hidden');
                isValid = false;
            }

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

            // Validate password confirmation
            if (password !== confirmPassword) {
                document.getElementById('confirmPasswordError').textContent = 'Password tidak cocok';
                document.getElementById('confirmPasswordError').classList.remove('hidden');
                isValid = false;
            }

            // If valid, submit the form
            if (isValid) {
                this.submit();
            }
        });
    </script>
</body>
</html>