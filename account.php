<?php
require_once './helper/database/EventController.php';
require_once './helper/model/User.php';
$eventController = new EventController();

    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ./login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcaraKita - Temukan & Atur Acara Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Swiper CSS -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</head>
<body class="bg-gray-50">
    <header class="relative">

        <!-- Navbar -->
        <nav class="bg-white/30 backdrop-blur shadow-sm fixed w-full top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="./dashboard.php" class="text-2xl font-bold text-blue-600">AcaraKita</a>
                    </div>
                    <div class="hidden sm:flex items-center space-x-8">
                        <a href="#" class="text-gray-700 transition hover:text-blue-600">Beranda</a>
                        <a href="#" class="text-gray-700 transition hover:text-blue-600">Jelajahi</a>
                        <a href="#" class="text-gray-700 transition hover:text-blue-600">Tentang</a>
                        <a href="#" class="text-gray-700 transition hover:text-blue-600">Kontak</a>
                        <a href="./account.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Akun Anda</a>
                    </div>
                    <div class="sm:hidden flex items-center">
                        <button class="text-gray-700 hover:text-blue-600">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>


    <!-- Newsletter Section -->
    <div class="bg-gray-100 py-16 mt-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Akun Anda</h2>
                <p class="text-gray-600 mb-8">Berikut adalah informasi yang akan ditampilkan bagi penyelenggara Event</p>
                
                <form action="" class="flex flex-col gap-8">
                    <div>
                        <label for="name" class="block text-gray-600">Nama</label>
                        <input class="rounded bg-white shadow p-2 max-w-2xl w-full" type="text" value="<?php echo $_SESSION['user']->name ?>" disabled> 
                    </div>
                    <div>
                        <label for="email" class="block text-gray-600">Email</label>
                        <input class="rounded bg-white shadow p-2 max-w-2xl w-full" type="email" value="<?php echo $_SESSION['user']->email ?>" disabled>
                    </div>
                </form>

                <div class="flex justify-center mt-8">
                    <a href="./logout.php" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 max-w-2xl w-full transition">Logout</a>
                </div>  

                <p>Php Session:</p>
                <p class="w-full max-w-7xl text-xs text-start">
                    <?php
                        print_r($_SESSION);
                    ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-4">AcaraKita</h3>
                    <p class="text-gray-600">Platform untuk menemukan dan mengatur acara di Indonesia</p>
                </div>
                <div>
                    <h4 class="text-gray-900 font-medium mb-4">Navigasi</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Beranda</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Jelajahi</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Tentang</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-gray-900 font-medium mb-4">Kategori</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Musik</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Workshop</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Olahraga</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600">Teknologi</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-gray-900 font-medium mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-blue-600">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-600">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-600">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-600">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t mt-12 pt-8 text-center text-gray-600">
                <p>&copy; 2024 AcaraKita. Seluruh hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    <script src="./assets/js/cookie.js"></script>
    <script>
        // create a fixed paragraph showing last page visited from cookies
        const lastPageVisited = getCookie('lastPageVisited');
        const lastPageVisitedParagraph = document.createElement('p');
        lastPageVisitedParagraph.classList.add('fixed', 'bottom-2', 'z-50', 'right-0', 'bg-white', 'text-blue-400', 'p-2', 'rounded-l', 'shadow', 'text-xs');
        lastPageVisitedParagraph.textContent = `Terakhir kali Anda mengunjungi halaman ${lastPageVisited} (cookie)`;
        document.body.appendChild(lastPageVisitedParagraph);
        setCookie('lastPageVisited', window.location.pathname);
    </script>
</body>
</html>