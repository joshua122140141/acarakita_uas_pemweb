<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcaraKita - Temukan & Atur Acara Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body class="bg-gray-50">
    <header class="relative h-[66vh] bg-[url('./assets/img/hero.webp')] bg-black/50 bg-blend-darken bg-cover bg-center bg-no-repeat">

        <!-- Navbar -->
        <nav class="bg-white/50 backdrop-blur shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-bold text-blue-600">AcaraKita</a>
                    </div>
                    <div class="hidden sm:flex items-center space-x-8">
                        <a href="#" class="text-gray-700 hover:text-blue-600">Beranda</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600">Jelajahi</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600">Tentang</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600">Kontak</a>
                        <a href="./login.php" class="text-blue-600 hover:text-blue-700 font-medium">Masuk</a>
                        <a href="./register.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Daftar</a>
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
        <div class="text-white py-16 z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold mb-4">Temukan Acara Menarik di Sekitarmu</h1>
                    <p class="text-xl mb-8">Jelajahi berbagai acara seru dan dapatkan pengalaman tak terlupakan</p>
                    <div class="flex justify-center space-x-4">
                        <a href="./register.php" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100">
                            Daftar
                        </a>
                        <a href="./login.php" class="border-2 border-white text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700">
                            Masuk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header class="bg-[url('./assets/img/background.webp')]">

    <!-- Featured Events -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Acara Unggulan</h2>
            <p class="mt-4 text-gray-600">Temukan acara-acara menarik yang sedang trending</p>
        </div>
        
        <!-- First Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                <img src="https://picsum.photos/400/300" alt="Event" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-blue-600 text-sm font-medium mb-1">MUSIK</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Festival Musik Jakarta</h3>
                    <p class="text-gray-600 mb-4">Nikmati pertunjukan musik live dari artis-artis terkenal</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700"><i class="far fa-calendar mr-2"></i>24 Juni 2024</span>
                        <span class="text-gray-700"><i class="far fa-map mr-2"></i>Jakarta</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                <img src="https://picsum.photos/400/300" alt="Event" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-blue-600 text-sm font-medium mb-1">WORKSHOP</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Workshop Digital Marketing</h3>
                    <p class="text-gray-600 mb-4">Pelajari strategi marketing digital dari para ahli</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700"><i class="far fa-calendar mr-2"></i>28 Juni 2024</span>
                        <span class="text-gray-700"><i class="far fa-map mr-2"></i>Surabaya</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                <img src="https://picsum.photos/400/300-festival" alt="Event" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-blue-600 text-sm font-medium mb-1">KULINER</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Festival Kuliner Nusantara</h3>
                    <p class="text-gray-600 mb-4">Jelajahi cita rasa kuliner khas nusantara</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700"><i class="far fa-calendar mr-2"></i>1 Juli 2024</span>
                        <span class="text-gray-700"><i class="far fa-map mr-2"></i>Bandung</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                <img src="https://picsum.photos/400/300-exhibition" alt="Event" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-blue-600 text-sm font-medium mb-1">SENI</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pameran Seni Rupa</h3>
                    <p class="text-gray-600 mb-4">Nikmati karya seni dari seniman kontemporer</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700"><i class="far fa-calendar mr-2"></i>5 Juli 2024</span>
                        <span class="text-gray-700"><i class="far fa-map mr-2"></i>Yogyakarta</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                <img src="https://picsum.photos/400/300" alt="Event" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-blue-600 text-sm font-medium mb-1">TEKNOLOGI</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Tech Conference 2024</h3>
                    <p class="text-gray-600 mb-4">Konferensi teknologi terbesar di Indonesia</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700"><i class="far fa-calendar mr-2"></i>10 Juli 2024</span>
                        <span class="text-gray-700"><i class="far fa-map mr-2"></i>Jakarta</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                <img src="https://picsum.photos/400/300" alt="Event" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-blue-600 text-sm font-medium mb-1">OLAHRAGA</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Jakarta Marathon</h3>
                    <p class="text-gray-600 mb-4">Bergabunglah dalam lomba lari marathon terbesar</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700"><i class="far fa-calendar mr-2"></i>15 Juli 2024</span>
                        <span class="text-gray-700"><i class="far fa-map mr-2"></i>Jakarta</span>
                    </div>
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
        const lastPageVisited = getCookie('lastPageVisited');
        const lastPageVisitedParagraph = document.createElement('p');
        lastPageVisitedParagraph.classList.add('fixed', 'bottom-2', 'z-50', 'right-0', 'bg-white', 'text-blue-400', 'p-2', 'rounded-l', 'shadow', 'text-xs');
        lastPageVisitedParagraph.textContent = `Terakhir kali Anda mengunjungi halaman ${lastPageVisited} (cookie)`;
        document.body.appendChild(lastPageVisitedParagraph);
        setCookie('lastPageVisited', window.location.pathname);
    </script>
</body>
</html>