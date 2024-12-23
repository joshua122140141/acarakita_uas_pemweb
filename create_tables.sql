CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    category VARCHAR(50) NOT NULL,
    location VARCHAR(255) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    price INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    payment_method ENUM('Transfer', 'E-Wallet') NOT NULL,
    quantity INT NOT NULL,
    total_price INT NOT NULL,
    chair_number INT,
    ip_address VARCHAR(50),
    browser TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id)
);

INSERT INTO events (title, category, location, description, date, price) 
VALUES
('Tech Summit 2024', 'Conference', 'Jakarta Convention Center, Jakarta', 
'Tech Summit 2024 adalah konferensi tahunan yang mengumpulkan para profesional teknologi dari seluruh dunia. Acara ini mencakup diskusi panel, workshop, dan presentasi tentang tren terbaru dalam AI, blockchain, dan teknologi cloud.', 
'2024-02-15', 500000),

('Music Fest Live', 'Concert', 'Gelora Bung Karno, Jakarta', 
'Music Fest Live adalah konser musik outdoor terbesar di Indonesia, menghadirkan artis internasional dan lokal. Pengunjung dapat menikmati berbagai genre musik mulai dari pop, rock, hingga EDM dalam satu malam yang spektakuler.', 
'2024-03-10', 750000),

('Art & Design Expo', 'Exhibition', 'Artotel Thamrin, Jakarta', 
'Art & Design Expo adalah pameran seni tahunan yang menampilkan karya seni kontemporer dari seniman Indonesia. Selain itu, acara ini juga mencakup diskusi interaktif dan workshop kreatif untuk pengunjung.', 
'2024-04-20', 250000),

('Startup Weekend', 'Workshop', 'CoHive Plaza, Surabaya', 
'Startup Weekend adalah program intensif tiga hari untuk membantu calon pengusaha membangun ide bisnis mereka. Peserta akan mendapatkan bimbingan dari mentor, sesi networking, dan kesempatan untuk mempresentasikan ide mereka kepada investor.', 
'2024-05-12', 300000),

('Culinary Festival 2024', 'Festival', 'Taman Impian Jaya Ancol, Jakarta', 
'Culinary Festival 2024 adalah acara kuliner terbesar di Jakarta yang menghadirkan berbagai macam hidangan dari seluruh Indonesia dan mancanegara. Nikmati makanan lezat, demo masak, dan kompetisi kuliner seru.', 
'2024-06-18', 200000),

('Health & Wellness Expo', 'Expo', 'Santika Hotel, Bandung', 
'Health & Wellness Expo adalah acara yang didedikasikan untuk kesehatan dan kesejahteraan. Acara ini menawarkan seminar kesehatan, sesi yoga, dan stan produk kesehatan yang membantu pengunjung hidup lebih sehat.', 
'2024-07-25', 150000);