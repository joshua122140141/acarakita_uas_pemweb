<?php
require_once './helper/database/EventController.php';
require_once './helper/database/RegistrationController.php';
require_once './helper/model/User.php';
$eventController = new EventController();
$registrationController = new RegistrationController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $paymentMethod = $_POST['paymentMethod'];
    $quantity = $_POST['quantity'];
    $chairNumber = $_POST['chairNumber'];
    $eventId = $_GET['id'];
    $totalPrice = $quantity * 250000;

    $registrationController->create(1, $eventId, $name, $paymentMethod, $quantity, $totalPrice, $chairNumber, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
    header('Location: detail.php?id=' . $eventId);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $regId = $_GET['regId'];
    $registrationController->delete($regId);
    
    header('Location: detail.php?id=' . $eventId);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents('php://input'), $_PUT);
    $id = $_GET['id'];
    $name = $_PUT['name'];
    $paymentMethod = $_PUT['paymentMethod'];
    $quantity = $_PUT['quantity'];
    $totalPrice = $quantity * $event->price;

    $registrationController->update($id, $name, $paymentMethod, $quantity, $totalPrice, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
    header('Location: detail.php?id=' . $eventId);
    exit;
}

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

// Get the event ID from the URL parameter
$eventId = isset($_GET['id']) ? $_GET['id'] : null;
if ($eventId) {
    $event = $eventController->show($eventId);
} else {
    // Redirect to a default page if the ID is not provided
    header('Location: ../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcaraKita - Detail Acara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">    
</head>
<body class="bg-gray-50">
    <header class="">
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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 mt-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 rounded-xl shadow-xl bg-white p-12">
            <!-- Event Details -->
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4"><?php echo $event->title; ?></h1>
                <div class="p-6 mb-6">
                    <img src="https://picsum.photos/700/400" alt="Event Image" class="rounded">
                    <div class="my-4">
                        <span class="inline-block bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-sm font-medium">
                            <?php echo $event->category; ?>
                        </span>
                    </div>
                    <p class="text-gray-600 mb-4"><?php echo $event->description; ?></p>
                    <div class="space-y-2">
                        <p><strong>Tanggal:</strong> <?php echo $event->date; ?></p>
                        <p><strong>Lokasi:</strong> <?php echo $event->location; ?></p>
                        <p><strong>Harga:</strong> Rp <?php echo number_format($event->price, 0, ',', '.'); ?></p>
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Daftar Event</h2>
                <form id="registrationForm" method="POST" action="" class="p-6">
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" id="name" name="name" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600">
                            <p id="nameError" class="mt-1 text-sm text-red-600 hidden"></p>
                        </div>
                        <div>
                            <label for="paymentMethod" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                            <select id="paymentMethod" name="paymentMethod" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600">
                                <option value="Transfer">Transfer</option>
                                <option value="E-Wallet">E-Wallet</option>
                            </select>
                        </div>
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah Tiket</label>
                            <input type="number" id="quantity" name="quantity" required min="1"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600">
                            <p id="quantityError" class="mt-1 text-sm text-red-600 hidden"></p>
                        </div>
                        <div>
                            <label for="chairNumber" class="block text-sm font-medium text-gray-700">Nomor Kursi</label>
                            <input type="number" id="chairNumber" name="chairNumber"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-600 focus:border-blue-600">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Total Harga</label>
                            <p id="totalPrice" class="text-lg font-bold">Rp -</p>
                            <p>Pembayaran via <span id="methodStatus">Transfer</span></p>
                        </div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Registered Users Table -->
        <div class="mt-12 bg-white rounded-xl shadow-xl p-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Peserta Terdaftar</h2>
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Metode Pembayaran</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Tiket</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Harga</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Kursi</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="registeredUsersTable" class="bg-white divide-y divide-gray-200">
                        <?php
                        $registeredUsers = [];
                        if ($event) {
                            $registeredUsers = $registrationController->findByEventId($event->id);
                        }
                        
                        foreach ($registeredUsers as $user) {
                            echo '<tr>';
                            echo '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . $user->name . '</td>';
                            echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . $user->payment_method . '</td>';
                            echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . $user->quantity . '</td>';
                            echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp ' . number_format($user->total_price, 0, ',', '.') . '</td>';
                            echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> C' . ($user->chair_number ? $user->chair_number : '-') . '</td>';
                            // create a delete, edit, and view ticket button in this td
                            if (strval($user->user_id) != strval($_SESSION['user']->id)) {
                                echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 italic">Peserta Lain</td>';
                            } else {
                                echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-white flex gap-2">';
                                echo '<button onclick="showModal(\'editModal\', ' . htmlspecialchars(json_encode($user)) . ')" class="bg-blue-500 hover:bg-blue-700 transition rounded p-2 shadow"><i class="fas fa-edit"></i>Edit</button>';
                                echo '<button onclick="showModal(\'deleteModal\', { regId: ' . $user->id . ' })" class="bg-red-500 hover:bg-red-700 transition rounded p-2 shadow"><i class="fas fa-trash"></i>Hapus</button>';
                                echo '<button onclick="showModal(\'ticketModal\', ' . htmlspecialchars(json_encode($user)) . ')" class="bg-green-500 hover:bg-green-700 transition rounded p-2 shadow"><i class="fas fa-ticket-alt"></i>Tiket</button>';
                                echo '</td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-lg font-bold mb-4">Edit Peserta</h2>
        <form id="editForm">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium">Nama</label>
                    <input type="text" id="editName" name="editName" class="w-full border px-3 py-2 rounded" required max="100" min="3">
                </div>
                <div>
                    <label class="block text-sm font-medium">Metode Pembayaran</label>
                    <select id="editPaymentMethod" name="editPaymentMethod" class="w-full border px-3 py-2 rounded">
                        <option value="Transfer">Transfer</option>
                        <option value="E-Wallet">E-Wallet</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium">Jumlah Tiket</label>
                    <input type="number" id="editQuantity" name="editQuantity" class="w-full border px-3 py-2 rounded" min="1" max="100" required>
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button" onclick="hideModal('editModal')" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-lg font-bold mb-4">Hapus Registrasi</h2>
            <p>Apakah Anda yakin ingin menghapus data registrasi ini?</p>
            <div class="mt-4 flex justify-end">
                <button type="button" onclick="hideModal('deleteModal')" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Batal</button>
                <button onclick="confirmDelete()" class="px-4 py-2 bg-red-600 text-white rounded">Hapus</button>
            </div>
        </div>
    </div>

    <!-- View Ticket Modal -->
    <div id="ticketModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full">
            <div class="flex">
                <!-- QR Code Section -->
                <div class="w-1/3 p-6 flex items-center justify-center rounded-l-lg">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=AK1234567<?php echo $event->id ?>" alt="QR Code" class="w-full max-w-[150px]">
                </div>
                
                <!-- Ticket Details Section -->
                <div class="w-2/3 p-6">
                    <div class="flex justify-between items-start mb-8 flex-col">
                        <h2 class="text-2xl font-bold text-gray-800"><?php echo $event->title ?></h2>
                        <p class="text-sm text-gray-500">ID Tiket: #AK1234567<?php echo $event->id ?></p>
                        <p class="text-sm text-gray-500">Tunjukkan tiket ini ketika anda di lokasi event</p>
                    </div>
                    <div class="space-y-3">
                        <p class="text-gray-800"><i class="far fa-calendar-alt text-blue-600 mr-2"></i> 24 Juni 2024, 19:00 WIB</p>
                        <p class="text-gray-800"><i class="fas fa-map-marker-alt text-blue-600 mr-2"></i> Gelora Bung Karno, Jakarta</p>
                        <p class="text-gray-800"><i class="fas fa-ticket-alt text-blue-600 mr-2"></i> Tiket VIP</p>
                        <p class="text-gray-800"><i class="fas fa-user text-blue-600 mr-2"></i> <span id="ticketName"></span></p>
                        <p class="text-gray-800"><i class="fas fa-chair text-blue-600 mr-2" ></i><span id="ticketChair"></span></p>
                        <p class="text-gray-800"><i class="fas fa-chair text-blue-600 mr-2" ></i><span id="ticketQuantity"></span></p>
                    </div>
                    <div class="mt-6">
                        <button type="button" onclick="hideModal('ticketModal')" class="px-4 py-2 bg-blue-600 text-white rounded">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="./assets/js/cookie.js"></script>
<script>
        const registrationForm = document.getElementById('registrationForm');
        const nameInput = document.getElementById('name');
        const quantityInput = document.getElementById('quantity');
        const methodInput = document.getElementById('paymentMethod');
        const totalPriceElement = document.getElementById('totalPrice');
        const registeredUsersTable = document.getElementById('registeredUsersTable');
        const methodStatus = document.getElementById('methodStatus');
        const ticketPrice = parseInt('<?php echo $event->price; ?>');
        
        const editForm = document.getElementById('editForm');
        const editNameInput = document.getElementById('editName');
        const editPaymentMethodInput = document.getElementById('editPaymentMethod');
        const editQuantityInput = document.getElementById('editQuantity');

        let editId = null;
        let deleteId = null;

        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value) || 0;
            const total = quantity * ticketPrice;
            totalPriceElement.textContent = `Rp ${total.toLocaleString()}`;
        }

        function validateForm() {
            let isValid = true;
            
            if (nameInput.value.trim().length < 3) {
                document.getElementById('nameError').textContent = 'Nama harus minimal 3 karakter';
                document.getElementById('nameError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('nameError').classList.add('hidden');
            }

            if (quantityInput.value < 1) {
                document.getElementById('quantityError').textContent = 'Jumlah tiket minimal 1';
                document.getElementById('quantityError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('quantityError').classList.add('hidden');
            }

            return isValid;
        }
        
        quantityInput.addEventListener('keyup', updateTotalPrice);
        methodInput.addEventListener('change', () => methodStatus.textContent = methodInput.value);
        registrationForm.addEventListener('submit', function(e) {
            if (validateForm()) {
                const formData = new FormData(registrationForm);
                updateTotalPrice();
            } else {
                e.preventDefault();
            }
        });

        editForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(editForm);
            formData.append('id', editId);
            formData.append('name', editNameInput.value);
            formData.append('paymentMethod', editPaymentMethodInput.value);
            formData.append('quantity', editQuantityInput.value);

            fetch(`detail.php?id=<?php echo $eventId; ?>&regId=${editId}`, {
                method: 'PUT',
                body: formData
            });
            window.location.reload();
            hideModal('editModal');
        });

        function confirmDelete(regId) {
            hideModal('deleteModal');

            if (!deleteId) {
                alert('Registrasi tidak ditemukan');
                return;
            }

            // Send a DELETE request to the server
            fetch(`detail.php?id=<?php echo $eventId; ?>&regId=${deleteId}`, {
                method: 'DELETE'
            });
            window.location.reload();
        }

        function showModal(modalId, data = {}) {
            const modal = document.getElementById(modalId);
            if (modalId === 'editModal') {
                document.getElementById('editName').value = data.name || '';
                document.getElementById('editPaymentMethod').value = data.paymentMethod || 'Transfer';
                document.getElementById('editQuantity').value = data.quantity || 1;
                editId = data.id;
            } else if (modalId === 'ticketModal') {
                document.getElementById('ticketName').textContent = data.name || '-';
                document.getElementById('ticketQuantity').textContent = `Jumlah: ${data.quantity} Kursi` || 'Jumlah: -';
                document.getElementById('ticketChair').textContent = `Kursi: C-${data.chairNumber}` || '-';
            } else if (modalId === 'deleteModal') {
                deleteId = data.regId;
            }
            modal.classList.remove('hidden');
        }

        function hideModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        updateTotalPrice();

        const lastPageVisited = getCookie('lastPageVisited');
        const lastPageVisitedParagraph = document.createElement('p');
        lastPageVisitedParagraph.classList.add('fixed', 'bottom-2', 'z-50', 'right-0', 'bg-white', 'text-blue-400', 'p-2', 'rounded-l', 'shadow', 'text-xs');
        lastPageVisitedParagraph.textContent = `Terakhir kali Anda mengunjungi halaman ${lastPageVisited} (cookie)`;
        document.body.appendChild(lastPageVisitedParagraph);
        setCookie('lastPageVisited', window.location.pathname);
    </script>
</body>
</html>