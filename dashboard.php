<?php
require_once 'helper/database/EventController.php';
$eventController = new EventController();

    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: ../login.php');
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
    <header class="relative h-[66vh] bg-[url('./assets/img/hero.webp')] bg-black/50 bg-blend-darken bg-cover bg-center bg-no-repeat">

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
        
        <!-- Hero Banner -->
        <div class="text-white py-16 z-40 grid place-content-center h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold mb-4">Temukan Acara Menarik di Sekitarmu</h1>
                    <p class="text-xl mb-8">Jelajahi berbagai acara seru dan dapatkan pengalaman tak terlupakan</p>
                    <div class="flex justify-center space-x-4">
                        <a href="#jelajahi" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100">
                            Mulai Jelajahi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header class="bg-[url('./assets/img/background.webp')]">

    <!-- Featured Events -->
    <div class="w-full">
        <div class="m-8 px-4 sm:px-6 lg:px-8 py-8 bg-white rounded shadow-xl">
            <div class="text-left mb-8" id="jelajahi">
                <h2 class="text-3xl font-bold text-gray-900">Acara Unggulan</h2>
                <p class="mt-2 text-gray-600">Temukan acara-acara menarik yang sedang trending</p>
                <!-- create rounded search design -->
                <div class="flex items-start mt-8">
                    <input type="text" id="searchInput" placeholder="Search..." placeholder="Cari acara" class="flex-1 px-4 py-3 rounded-l-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    <button onclick="handleSearch()" class="bg-blue-600 text-white px-6 py-3 rounded-r-lg font-medium hover:bg-blue-700">
                        Cari
                    </button>
                </div>  
                <div id="recentSearches" class="flex gap-2 mt-2"></div>
                <p class="text-xs text-gray-500">Pencarian terbaru disimpan di localstorage</p>
            </div>
            
            <!-- Carousel -->
            <div class="swiper py-2">
                <!-- First Row -->
                <div class="swiper-wrapper">
                    <?php
                    $events = $eventController->index();
                    foreach ($events as $event) {
                    ?>
                        <a href="./detail.php?id=<?php echo $event->id; ?>" class="swiper-slide bg-white rounded-xl shadow overflow-hidden hover:shadow-md transition group">
                            <img src="https://picsum.photos/400/300" alt="Event" class="w-full h-40 group-hover:scale-105 object-cover transition-all">
                            <div class="p-4">
                                <div class="text-blue-600 text-sm font-medium mb-1"><?php echo $event->category; ?></div>
                                <h3 class="line-clamp-1 text-ellipsis text-xl font-bold text-gray-900"><?php echo $event->title; ?></h3>
                                <p class="line-clamp-1 text-ellipsis text-gray-600 mb-4"><?php echo $event->description; ?></p>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-700"><i class="far fa-calendar mr-2"></i><?php echo $event->date; ?></span>
                                    <span class="text-gray-700"><i class="far fa-map mr-2"></i><?php echo $event->location; ?></span>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Jangan Lewatkan Update Terbaru</h2>
                <p class="text-gray-600 mb-8">Dapatkan informasi tentang acara-acara menarik langsung di inbox Anda</p>
                <form class="max-w-md mx-auto">
                    <div class="flex gap-4">
                        <input type="email" placeholder="Masukkan email Anda" 
                            class="flex-1 px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700">
                            Berlangganan
                        </button>
                    </div>
                </form>
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
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper(".swiper", {
            loop: false, // Membuat carousel looping
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            slidesPerView: 1, // Jumlah slide yang terlihat
            spaceBetween: 16, // Jarak antar slide
            breakpoints: {
                640: {
                slidesPerView: 1.5,
                },
                768: {
                slidesPerView: 2.5,
                },
                1024: {
                slidesPerView: 3.5,
                },
            },
            });
        });

        const eventItems = document.querySelectorAll('.swiper-slide');

        function handleSearch() {
            const searchInput = document.getElementById('searchInput').value;
            if (searchInput.length > 0) {
                saveSearch(searchInput);

                eventItems.forEach(item => {
                    const title = item.querySelector('h3').textContent;
                    if (title.toLowerCase().includes(searchInput.toLowerCase())) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            } else {
                eventItems.forEach(item => {
                    item.style.display = 'block';
                });
            }
        }

        function saveSearch(searchTerm) {
            let recentSearches = JSON.parse(localStorage.getItem('recentSearches')) || [];
            if (!recentSearches.includes(searchTerm)) {
                recentSearches.push(searchTerm);
                if (recentSearches.length > 10) {
                    recentSearches.shift(); // Keep only the last 5 searches
                }
                localStorage.setItem('recentSearches', JSON.stringify(recentSearches));
            }
            loadRecentSearches();
        }

        function loadRecentSearches() {
            const recentSearches = JSON.parse(localStorage.getItem('recentSearches')) || [];
            const recentSearchesDiv = document.getElementById('recentSearches');
            recentSearchesDiv.innerHTML = '<h3>Pencarian terbaru:</h3>';
            recentSearches.forEach(search => {
                const searchItem = document.createElement('div');
                searchItem.classList.add('bg-gray-200', 'text-gray-700', 'px-2', 'py-1', 'rounded-full', 'w-fit');
                searchItem.textContent = search;
                recentSearchesDiv.appendChild(searchItem);
            });
        }

        loadRecentSearches();

        const lastPageVisited = getCookie('lastPageVisited');
        const lastPageVisitedParagraph = document.createElement('p');
        lastPageVisitedParagraph.classList.add('fixed', 'bottom-2', 'z-50', 'right-0', 'bg-white', 'text-blue-400', 'p-2', 'rounded-l', 'shadow', 'text-xs');
        lastPageVisitedParagraph.textContent = `Terakhir kali Anda mengunjungi halaman ${lastPageVisited} (cookie)`;
        document.body.appendChild(lastPageVisitedParagraph);
        setCookie('lastPageVisited', window.location.pathname);
    </script>
</body>
</html>