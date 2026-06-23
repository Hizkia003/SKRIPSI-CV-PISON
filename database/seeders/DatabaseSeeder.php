<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Daftar gambar untuk Jasa Konstruksi (5 gambar per layanan)
     * URL dari Unsplash - pekerja konstruksi sesuai tema
     */
    private array $jasaImages = [
        'Jasa Pemasangan Talang & Skylight' => [
            'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&q=80', // Pekerja di atap
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80', // Rumah dengan skylight
            'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=800&q=80', // Pekerja atap
            'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80', // Pekerja konstruksi
            'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=800&q=80', // Pekerja bangunan
        ],
        'Jasa Pemasangan Safetyline & Railing' => [
            'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80', // Pekerja dengan helm
            'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=800&q=80', // Pekerja bangunan
            'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&q=80', // Pekerja atap
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80', // Konstruksi rumah
            'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=800&q=80', // Pekerja atap
        ],
        'Jasa Konstruksi Bangunan' => [
            'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=800&q=80', // Pekerja konstruksi
            'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80', // Pekerja dengan helm
            'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&q=80', // Pekerja atap
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80', // Konstruksi rumah
            'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=800&q=80', // Pekerja atap
        ],
        'Jasa Pemasangan Insulasi' => [
            'https://images.unsplash.com/photo-1581092335873-4d1d2d8e1d1a?w=800&q=80', // Pekerja dengan material
            'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&q=80', // Pekerja atap
            'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80', // Pekerja konstruksi
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80', // Konstruksi rumah
            'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=800&q=80', // Pekerja bangunan
        ],
        'Jasa Konstruksi Atap' => [
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80', // Atap rumah
            'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=800&q=80', // Pekerja atap
            'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&q=80', // Pekerja di atap
            'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80', // Pekerja konstruksi
            'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=800&q=80', // Pekerja bangunan
        ],
    ];

    /**
     * Daftar gambar untuk Projects (5 gambar per proyek)
     */
    private array $projectImages = [
        'Pemasangan Atap Kliplok & Insulasi Aluminium di Sidoarjo' => [
            'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=800&q=80',
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80',
            'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&q=80',
            'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80',
            'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=800&q=80',
        ],
        'Renovasi Atap Skylight Fiberglass di Surabaya' => [
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80',
            'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=800&q=80',
            'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&q=80',
            'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80',
            'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=800&q=80',
        ],
        'Pemasangan Railing Safetyline di Gedung DPRD Sidoarjo' => [
            'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80',
            'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=800&q=80',
            'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&q=80',
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80',
            'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=800&q=80',
        ],
        'Pembangunan Gudang Logistik di Sidoarjo' => [
            'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=800&q=80',
            'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80',
            'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&q=80',
            'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=800&q=80',
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80',
        ],
        'Pemasangan Insulasi Rockwool di Gedung Perkantoran' => [
            'https://images.unsplash.com/photo-1581092335873-4d1d2d8e1d1a?w=800&q=80',
            'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&q=80',
            'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800&q=80',
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80',
            'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=800&q=80',
        ],
    ];

    public function run(): void
    {
        $this->command->info('🌱 Starting database seeding...');

        // ============================================================
        // 1. USER ADMIN
        // ============================================================
        $this->command->info('📌 Creating admin user...');
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@pisonteknik.com'],
            [
                'name' => 'Admin Pison',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
                'last_login_at' => now(),
            ]
        );

        // ============================================================
        // 2. CONTACT INFO
        // ============================================================
        $this->command->info('📌 Creating contact info...');
        \App\Models\ContactInfo::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'CV. Pison Teknik Indonesia',
                'address' => 'Grand Alexandria Hills, Jl. Raya Grand Surya No.12 blok AH2, Dukuh Tengah Timur, Dukuhtengah, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61252',
                'whatsapp' => '82141520224',
                'email' => 'cv.pisonteknikindonesia@gmail.com',
                'working_hours' => 'Senin - Sabtu: 08:00 - 17:00 WIB',
                'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.459!2d112.723!3d-7.371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e0d0f2d5a6b1%3A0x2b6d8c0a3d8a9e4!2sGrand%20Alexandria!5e0!3m2!1sid!2sid!4v1234567890',
                'tiktok' => 'https://tiktok.com/@kuli_panggilansurabaya',
                'copyright_text' => '© ' . date('Y') . ' CV. PISON TEKNIK INDONESIA. All Rights Reserved.',
            ]
        );

        // ============================================================
        // 3. CERTIFICATES (3 sertifikat)
        // ============================================================
        $this->command->info('📌 Creating certificates...');
        $certificates = [
            [
                'name' => 'Sertifikat Bekerja di Ketinggian (KEMENAKER)',
                'subtitle' => 'Kementerian Ketenagakerjaan RI',
                'number' => 'KEMNAKER-2024-001',
                'category' => 'worker_certificate',
                'file' => 'certificates/wBCjV4rQeGn8U4I5S7edgW7y2iE9FZDPWrXS9l2n.pdf',
                'order' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Legalitas Izin Perusahaan (KEMENKUMHAM)',
                'subtitle' => 'Kementerian Hukum dan HAM',
                'number' => 'AHU-0042125-AH.01.14 Tahun 2025',
                'category' => 'company_legalitas',
                'file' => 'certificates/G19x3fQ05FS0NwwHDxPF1AXLHqlYYjmmpjkZI1rR.pdf',
                'order' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Sertifikat K3 Konstruksi (BNSP)',
                'subtitle' => 'Badan Nasional Sertifikasi Profesi',
                'number' => 'BNSP-K3-2024-045',
                'category' => 'worker_certificate',
                'file' => null,
                'order' => 1,
                'is_active' => true,
            ],
        ];
        foreach ($certificates as $cert) {
            \App\Models\Certificate::updateOrCreate(
                ['number' => $cert['number']],
                $cert
            );
        }

        // ============================================================
        // 4. SUPPLY MATERIALS (7 material dengan deskripsi lengkap)
        // ============================================================
        $this->command->info('📌 Creating supply materials...');
        $materials = [
            [
                'title' => 'Zincalum Metal',
                'icon' => 'bi-box-seam',
                'description' => 'Zincalum (atau Zincalume®) adalah baja yang dilapisi dengan campuran 55% aluminium, 43.4% seng, dan 1.6% silikon. Perpaduan ini memberikan ketahanan korosi yang luar biasa; aluminium memberikan ketahanan korosi jangka panjang, sementara seng menawarkan perlindungan galvanis jika permukaan tergores. Hasilnya, material ini bisa bertahan 3-6 kali lebih lama dibandingkan baja galvanis biasa. Tersedia dalam berbagai tingkat kekuatan, dengan yield strength mulai dari G250 (250 MPa) hingga G500 (500 MPa) dan ketebalan bervariasi dari 0.35 mm hingga 1.20 mm. Digunakan secara luas untuk atap, panel dinding, talang air, rangka rumah, dan berbagai peralatan rumah tangga. Keunggulan lain dari Zincalum adalah kemampuannya memantulkan panas matahari, sehingga membantu mengurangi suhu ruangan di bawah atap hingga 8-10 derajat Celcius. Material ini juga mudah dibentuk dan dipotong sesuai kebutuhan, sehingga sangat fleksibel untuk berbagai desain arsitektur modern.',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Sandwich Panel – PUR/PIR',
                'icon' => 'bi-box-seam',
                'description' => 'Panel sandwich adalah panel komposit yang terdiri dari dua lapisan material facing (biasanya baja atau aluminium) yang mengapit inti (core) insulasi busa kaku. Berdasarkan material intinya, ada dua jenis utama: PUR (Polyurethane) - Terbuat dari reaksi poliol dan isosianat, PUR memiliki sifat insulasi termal yang sangat baik, ringan, dan fleksibel. PIR (Polyisocyanurate) - Merupakan pengembangan dari PUR dengan struktur kimia yang lebih kompleks. Perbedaan utamanya adalah ketahanan api yang jauh lebih unggul, stabilitas termal yang lebih tinggi, dan emisi asap yang lebih rendah saat terbakar. Material inti ini memiliki densitas antara 38-55 kg/m³, konduktivitas termal rendah 0.019-0.024 W/m.K, dan ketebalan panel yang beragam (50-200 mm). Cocok untuk dinding dan atap bangunan industri, ruang pendingin (cold storage), dan clean room. Panel ini juga mudah dipasang dengan sistem sambungan lidah-alur (tongue-and-groove), sehingga mempercepat waktu konstruksi hingga 40% dibandingkan metode konvensional.',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'uPVC (PVC Kaku)',
                'icon' => 'bi-box-seam',
                'description' => 'uPVC adalah singkatan dari Unplasticized Polyvinyl Chloride. Tidak seperti PVC biasa yang fleksibel karena ditambahkan plasticizer, uPVC tidak mengandung zat pelunak sehingga bersifat kaku, kuat, dan cocok untuk aplikasi struktural. Sifat utamanya meliputi tahan terhadap cuaca, korosi, dan kelembaban, serta perawatannya sangat mudah dan tidak perlu pengecatan ulang. Material ini juga merupakan insulator termal dan akustik yang baik, serta tidak mendukung pembakaran. Karena karakteristiknya yang kuat, tahan lama, dan hemat biaya jangka panjang, uPVC menjadi pilihan utama untuk bingkai jendela, pintu, dan pipa air. Produk uPVC juga tersedia dalam berbagai warna dan tekstur, sehingga dapat menyesuaikan dengan gaya arsitektur bangunan tanpa perlu finishing tambahan. uPVC juga ramah lingkungan karena dapat didaur ulang sepenuhnya setelah masa pakai selesai.',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'FRP (Fiberglass-Reinforced Plastic)',
                'icon' => 'bi-box-seam',
                'description' => 'FRP atau Fiberglass-Reinforced Plastic (sering juga disebut Fiberglass) adalah material komposit yang terbuat dari serat kaca (fiberglass) yang tertanam dalam matriks polimer, biasanya resin poliester atau vinil ester. Material ini menawarkan kombinasi unik: sangat kuat (bahkan lebih kuat dari baja untuk berat yang sama), ringan (75-80% lebih ringan dari baja), dan sangat tahan terhadap korosi dari berbagai bahan kimia dan lingkungan keras. FRP juga non-konduktif, non-magnetik, dan transparan terhadap gelombang elektromagnetik. Densitasnya berkisar antara 1.25–2.5 g/cm³, dengan kekuatan tarik 480–1600 MPa. Aplikasi FRP sangat luas, mulai dari badan kapal, tangki kimia, pipa tahan karat, hingga panel dinding dan komponen otomotif. Selain itu, FRP memiliki sifat isolasi listrik yang sangat baik, sehingga sering digunakan untuk instalasi listrik dan telekomunikasi di daerah dengan risiko petir atau korosi tinggi.',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Stainless Steel (Baja Tahan Karat)',
                'icon' => 'bi-box-seam',
                'description' => 'Baja tahan karat atau Stainless Steel pada dasarnya adalah paduan baja (besi dan karbon) yang mengandung minimal 10,5% kromium. Kromium inilah yang bereaksi dengan oksigen membentuk lapisan oksida krom yang sangat tipis, pasif, dan melindungi logam di bawahnya dari karat dan korosi. Terdapat ratusan tingkatan (grade), tetapi yang paling umum adalah Austenitic (Seri 300) - Tipe 304 dan 316 yang paling populer, tipe 304 digunakan untuk peralatan dapur, tipe 316 mengandung molibdenum untuk ketahanan lebih terhadap asam dan air garam, cocok untuk aplikasi kelautan. Ferritic (Seri 400) - Tipe 430 bersifat magnetik dan lebih ekonomis, sering digunakan untuk trim otomotif dan panel dekoratif. Selain tahan karat, baja ini juga kuat, mudah dibersihkan, dan dapat didaur ulang. Stainless Steel memiliki umur pakai yang sangat panjang, bahkan hingga 50 tahun atau lebih dalam kondisi lingkungan normal, menjadikannya investasi jangka panjang yang sangat menguntungkan.',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'title' => 'Glasswool & Rockwool',
                'icon' => 'bi-box-seam',
                'description' => 'Keduanya adalah jenis insulasi mineral wool yang berbentuk serat mirip kapas, tetapi berbeda dalam bahan baku dan beberapa sifatnya. Glasswool dibuat dari kaca daur ulang dan pasir silika yang dilelehkan pada suhu 1400°C, lalu dipintal menjadi serat. Material ini lebih ringan, fleksibel, dan memiliki embodied carbon yang lebih rendah, sehingga sangat baik untuk aplikasi akustik di partisi dan lantai. Rockwool dibuat dari batuan vulkanik (basalt) yang dilelehkan pada suhu 1500°C, memiliki titik leleh yang lebih tinggi sehingga ketahanan api lebih baik (tahan hingga 1000°C) dan sering dipilih untuk aplikasi yang memerlukan ketahanan api ekstensif. Keduanya bersifat tidak mudah terbakar (Kelas A1), memberikan insulasi termal dan akustik yang sangat baik. Rockwool juga memiliki kemampuan menyerap suara yang sangat baik, sehingga sering digunakan di ruang studio musik, bioskop, dan ruang rapat untuk mencegah gema dan kebisingan.',
                'is_active' => true,
                'order' => 6,
            ],
            [
                'title' => 'Aluminium Bubble Insulation',
                'icon' => 'bi-box-seam',
                'description' => 'Insulasi gelembung aluminium adalah material insulasi reflektif yang terdiri dari satu atau dua lapisan aluminium foil murni yang merekat pada lapisan tengah berupa gelembung udara (biasanya terbuat dari polietilen/LDPE). Prinsip kerjanya adalah dengan memantulkan hingga 97% radiasi panas yang mengenainya, sehingga sangat efektif mencegah panas masuk (dari atap) atau keluar ruangan. Udara yang terperangkap dalam sel-sel gelembung juga membantu mengurangi konduksi panas. Material ini tipis (hanya 5-10 mm), ringan, fleksibel, mudah dipasang, dan berfungsi juga sebagai penghalang uap air yang baik. Sangat populer digunakan sebagai insulasi atap, dinding, dan lantai, terutama pada bangunan residensial, gudang, dan karavan. Selain itu, material ini juga tahan terhadap jamur dan bakteri, sehingga aman untuk digunakan di lingkungan dengan kelembaban tinggi seperti daerah tropis. Penggunaannya dapat mengurangi konsumsi energi AC hingga 30% dalam cuaca panas.',
                'is_active' => true,
                'order' => 7,
            ],
        ];
        foreach ($materials as $material) {
            $slug = Str::slug($material['title']) . '-' . time();
            \App\Models\SupplyMaterial::updateOrCreate(
                ['slug' => $slug],
                array_merge($material, ['slug' => $slug])
            );
        }

        // ============================================================
        // 5. JASA KONSTRUKSI (5 layanan + deskripsi panjang + gambar)
        // ============================================================
        $this->command->info('📌 Creating 5 Jasa Konstruksi with images...');

        $jasaList = [
            [
                'title' => 'Jasa Pemasangan Talang & Skylight',
                'description' => 'Layanan pemasangan skylight dan sistem talang air yang terintegrasi secara profesional untuk memaksimalkan pencahayaan alami dan drainase air hujan. Skylight adalah elemen arsitektur yang dipasang pada bagian atap bangunan untuk memungkinkan cahaya alami masuk ke dalam ruangan dari atas, menciptakan suasana terang dan mengurangi ketergantungan pada pencahayaan buatan yang dapat menghemat konsumsi listrik hingga 30 persen. Pemasangan skylight membutuhkan keahlian khusus agar terintegrasi sempurna dengan sistem drainase atap, mencegah risiko kebocoran yang dapat merusak struktur bangunan. Material yang umum digunakan antara lain kaca tempered yang aman dan tahan benturan, fiberglass yang ringan dan tahan cuaca, serta polikarbonat yang kuat dan fleksibel. Sebagai pelengkap, sistem talang air dipasang untuk mengalirkan air hujan dari atap dan skylight menuju saluran pembuangan, mencegah genangan air yang dapat menyebabkan kerusakan atap, rembesan, atau bahkan banjir lokal. Tim teknis kami akan melakukan survei lokasi terlebih dahulu untuk menentukan posisi skylight yang optimal, menghitung kemiringan atap yang tepat, serta memastikan sistem talang memiliki kapasitas yang cukup untuk menampung debit air hujan di area tersebut. Proses pemasangan dimulai dari pembuatan rangka penopang yang kokoh, pemasangan material skylight dengan teknik penyegelan yang presisi, hingga instalasi talang dan sambungannya ke saluran pembuangan utama. Kami juga memberikan layanan perawatan rutin berupa pembersihan talang dari dedaunan dan kotoran, serta pengecekan kondisi segel skylight untuk memastikan tidak ada kebocoran. Dengan kombinasi skylight dan talang yang tepat, bangunan Anda tidak hanya menjadi lebih terang dan hemat energi, tetapi juga memiliki perlindungan maksimal terhadap air hujan, meningkatkan nilai properti secara signifikan, serta menciptakan lingkungan dalam ruangan yang lebih nyaman dan sehat. Kami menjamin pemasangan dengan garansi 5 tahun untuk kebocoran dan material.',
                'icon' => 'bi-sun',
                'order' => 1,
            ],
            [
                'title' => 'Jasa Pemasangan Safetyline & Railing',
                'description' => 'Layanan pemasangan safetyline dan railing yang berfokus pada penerapan sistem keselamatan kerja dan perlindungan bangunan, khususnya pada area-area dengan risiko tinggi seperti ketinggian dan tepian bangunan. Safetyline (atau yang sering disebut sebagai safety lifeline) adalah sistem penambatan yang dipasang di atap atau area kerja vertikal untuk menjadi titik jangkar bagi pekerja yang menggunakan alat pelindung diri (APD) saat bekerja di ketinggian. Sistem ini memberikan fleksibilitas gerak bagi pekerja sekaligus memastikan keselamatan optimal dalam setiap tahap konstruksi, sehingga menjadi elemen krusial dalam penerapan standar Keselamatan dan Kesehatan Kerja (K3). Pemasangan safetyline kami lakukan dengan menggunakan baut angkur berkualitas tinggi yang ditanam kuat pada struktur bangunan, dilengkapi dengan kabel baja tahan karat atau tali sintetis yang memiliki kekuatan tarik tinggi. Titik-titik jangkar ditempatkan secara strategis di seluruh area kerja dengan jarak yang sesuai standar, sehingga pekerja dapat bergerak bebas namun tetap terhubung dengan sistem pengaman. Sementara itu, railing berfungsi sebagai pagar pembatas yang dipasang di tepi lantai, balkon, tangga, atau area terbuka lainnya untuk mencegah terjatuh. Untuk menjamin keamanan maksimal, railing yang kami pasang sesuai dengan standar K3 yang berlaku, dengan handrail setinggi 90 hingga 110 cm, dilengkapi dengan midrail (pagar tengah) untuk mencegah orang terjatuh di antara tiang, serta toe board (papan kaki) untuk menahan material agar tidak jatuh ke bawah. Material yang digunakan untuk railing adalah baja tahan karat (stainless steel), besi, atau aluminium yang tidak hanya kuat dan tahan karat, tetapi juga memiliki tampilan estetis yang dapat menyesuaikan dengan desain bangunan. Sebelum pemasangan, tim kami akan melakukan survei area, menghitung beban yang harus ditahan, dan menentukan jarak antar tiang yang ideal. Proses pemasangan dilakukan dengan presisi tinggi, menggunakan teknik pengelasan yang kuat dan sambungan baut yang aman. Dengan sistem safetyline dan railing yang terpasang dengan benar, Anda tidak hanya memenuhi kewajiban keselamatan kerja, tetapi juga melindungi pekerja dan penghuni bangunan dari risiko cedera serius, serta meningkatkan kepercayaan klien dan mitra bisnis terhadap profesionalisme perusahaan Anda. Kami memberikan garansi keselamatan 100% selama masa konstruksi.',
                'icon' => 'bi-shield-check',
                'order' => 2,
            ],
            [
                'title' => 'Jasa Konstruksi Bangunan',
                'description' => 'Jasa konstruksi bangunan yang mencakup seluruh aspek pekerjaan struktur secara menyeluruh, mulai dari fondasi hingga elemen struktural vertikal dan horizontal. Layanan ini merupakan layanan inti yang kami tawarkan untuk membangun gedung baru maupun melakukan renovasi dan perkuatan struktur pada bangunan yang sudah ada. Kami menangani berbagai jenis konstruksi, mulai dari bangunan perumahan, gedung komersial, hingga fasilitas industri dan pergudangan. Pekerjaan kami mencakup konstruksi baja untuk rangka atap, kolom, dan balok yang menawarkan kekuatan serta fleksibilitas desain, serta konstruksi beton untuk fondasi, lantai, dan struktur lainnya yang membutuhkan kestabilan maksimal. Proses pengerjaan dimulai dari tahap perencanaan yang matang, termasuk perhitungan struktur, pemilihan material yang tepat, dan persiapan lahan. Tim ahli kami kemudian melaksanakan pekerjaan fondasi dengan pengecoran beton berkualitas tinggi yang diperkuat dengan tulangan baja sesuai spesifikasi. Pekerjaan dilanjutkan dengan pembangunan struktur vertikal berupa kolom dan dinding penahan beban, diikuti dengan pemasangan rangka atap baja atau kayu, serta finishing akhir seperti pemasangan atap, plafon, dan lantai. Kami juga menangani pekerjaan instalasi saluran air, sistem listrik, dan ventilasi yang terintegrasi dengan struktur bangunan. Setiap tahap pengerjaan dilakukan dengan metode pemasangan yang presisi dan sesuai dengan gambar kerja, serta diawasi oleh tenaga ahli yang berpengalaman untuk memastikan setiap sambungan dan pengecoran dilakukan dengan teknik yang tepat. Kami juga memperhatikan aspek keselamatan kerja dengan menerapkan standar K3 di seluruh area proyek, termasuk pemasangan safetyline dan railing sementara untuk melindungi pekerja. Dengan pengalaman menangani berbagai jenis proyek di berbagai sektor, kami siap mewujudkan bangunan impian Anda dengan kualitas terbaik, tepat waktu, dan sesuai dengan anggaran yang telah disepakati. Kami juga memberikan garansi pengerjaan hingga 5 tahun sebagai bentuk tanggung jawab dan komitmen kami terhadap kepuasan pelanggan. Kami juga menyediakan layanan konsultasi gratis untuk membantu Anda menentukan desain dan material yang paling sesuai dengan kebutuhan dan anggaran.',
                'icon' => 'bi-building',
                'order' => 3,
            ],
            [
                'title' => 'Jasa Pemasangan Insulasi',
                'description' => 'Layanan pemasangan insulasi untuk atap, dinding, dan berbagai area bangunan lainnya yang memerlukan penyekatan termal, akustik, atau kelembaban. Insulasi adalah pelapis pelindung yang berfungsi mengendalikan perpindahan panas, meredam suara, dan melindungi bangunan dari kelembaban. Insulasi termal bekerja dengan memperlambat aliran panas antara bagian dalam dan luar bangunan, sehingga ruangan tetap sejuk saat cuaca panas dan tetap hangat saat suhu udara rendah, yang pada akhirnya dapat menurunkan konsumsi energi untuk pendingin atau pemanas ruangan hingga 30 persen. Sementara itu, insulasi akustik berperan penting dalam meredam kebisingan dari luar, menciptakan lingkungan dalam ruangan yang lebih tenang dan nyaman, sangat bermanfaat untuk bangunan di area perkotaan atau dekat jalan raya. Insulasi kelembaban mencegah masuknya uap air yang dapat menyebabkan pertumbuhan jamur, kerusakan struktural, dan masalah kesehatan bagi penghuni bangunan. Berbagai material insulasi yang kami pasang menawarkan karakteristik unik masing-masing, mulai dari Rockwool dan Glasswool yang dikenal memiliki ketahanan api sangat baik dan insulasi akustik tinggi, papan busa EPS/PIR yang unggul dalam isolasi termal untuk dinding dan atap, hingga Aluminium Bubble Insulation yang bersifat reflektif dan efektif memantulkan radiasi panas. Proses pemasangan kami lakukan dengan teknik yang efisien dan rapi, dimulai dari pengukuran area yang akan diinsulasi, pemilihan material yang paling sesuai berdasarkan fungsi bangunan dan kondisi iklim, pemotongan material dengan ukuran presisi, hingga pemasangan dan penyegelan agar insulasi bekerja optimal tanpa celah udara. Pemasangan dilakukan di area strategis seperti plafon atap, antara lapisan dinding, di bawah lantai, serta pada pipa dan saluran udara. Hasilnya, bangunan Anda akan memiliki kenyamanan termal yang lebih baik, penghematan biaya energi yang signifikan, serta perlindungan jangka panjang terhadap kelembaban dan perubahan cuaca ekstrem. Kami juga memberikan konsultasi gratis untuk menentukan jenis insulasi yang paling tepat untuk kebutuhan spesifik proyek Anda.',
                'icon' => 'bi-thermometer-half',
                'order' => 4,
            ],
            [
                'title' => 'Jasa Konstruksi Atap',
                'description' => 'Layanan konstruksi atap yang mencakup pemasangan struktur rangka atap, penutup atap, dan elemen pelengkap seperti lisplang dan talang, untuk memastikan atap yang kuat, tahan lama, dan estetis. Atap merupakan elemen paling vital dalam sebuah bangunan karena melindungi seluruh isi bangunan dari cuaca ekstrem, panas matahari, hujan, dan angin. Layanan konstruksi atap kami mencakup berbagai jenis atap sesuai dengan kebutuhan dan gaya arsitektur bangunan, mulai dari atap genteng metal ringan, atap zincalum yang tahan korosi, atap fiberglass yang transparan untuk pencahayaan alami, hingga atap polikarbonat yang kuat dan tahan benturan. Proses pengerjaan dimulai dari perencanaan struktur rangka atap yang kuat dan sesuai dengan beban yang harus ditanggung, termasuk perhitungan kemiringan atap yang optimal untuk drainase air hujan dan sirkulasi udara. Tim ahli kami kemudian memulai pembuatan rangka atap menggunakan material baja ringan atau kayu berkualitas dengan sambungan yang presisi dan kuat, diikuti dengan pemasangan penutup atap dengan teknik yang rapat dan kedap air untuk mencegah kebocoran. Selain itu, kami juga menangani pemasangan lisplang sebagai pelapis tepi atap yang memberikan tampilan rapi dan melindungi sambungan atap-dinding dari rembesan air hujan, serta talang air untuk mengalirkan air hujan dari atap menuju saluran pembuangan. Untuk atap yang memerlukan pencahayaan alami, kami dapat mengintegrasikan skylight atau atap fiberglass transparan pada bagian tertentu. Setiap tahap pengerjaan kami lakukan dengan metode pemasangan yang presisi, menggunakan material berkualitas tinggi, dan diawasi oleh tenaga berpengalaman untuk memastikan hasil yang maksimal. Kami juga menyediakan layanan perbaikan dan renovasi atap untuk meningkatkan kualitas, memperbaiki kebocoran, atau mengganti penutup atap yang sudah aus. Dengan pengalaman yang mumpuni, kami mampu menangani berbagai model atap, mulai dari atap miring, atap datar, atap pelana, hingga atap model modern yang kompleks. Hasil akhir yang kami tawarkan adalah atap yang kokoh, tahan terhadap cuaca ekstrem, memiliki isolasi termal yang baik untuk menjaga kenyamanan ruangan, serta tampilan yang estetis dan modern. Kami memberikan garansi pemasangan hingga 5 tahun dan layanan purna jual untuk memastikan kepuasan Anda.',
                'icon' => 'bi-house',
                'order' => 5,
            ],
        ];

        foreach ($jasaList as $data) {
            $slug = Str::slug($data['title']) . '-' . time();
            $jasa = \App\Models\JasaKonstruksi::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $data['title'],
                    'slug' => $slug,
                    'description' => $data['description'],
                    'icon' => $data['icon'],
                    'is_active' => true,
                    'order' => $data['order'],
                ]
            );

            // Hapus gambar lama jika ada
            \App\Models\JasaKonstruksiImage::where('jasa_konstruksi_id', $jasa->id)->delete();

            // Download gambar dari Unsplash
            $imageUrls = $this->jasaImages[$data['title']] ?? [];
            foreach ($imageUrls as $i => $url) {
                $this->downloadImage($url, "jasa-konstruksi/{$jasa->id}-" . ($i + 1) . ".jpg");
                \App\Models\JasaKonstruksiImage::create([
                    'jasa_konstruksi_id' => $jasa->id,
                    'image' => "jasa-konstruksi/{$jasa->id}-" . ($i + 1) . ".jpg",
                    'order' => $i,
                ]);
            }
        }

        // ============================================================
        // 6. PROJECTS (5 proyek + thumbnail + gambar)
        // ============================================================
        $this->command->info('📌 Creating projects with images...');

        $projectsData = [
            [
                'title' => 'Pemasangan Atap Kliplok & Insulasi Aluminium di Sidoarjo',
                'category' => 'atap-dinding-lisplang',
                'location' => 'Sidoarjo, Jawa Timur',
                'year' => '2024',
                'client' => 'PT. Industri Maju Jaya',
                'duration' => '2 bulan',
                'status' => 'completed',
                'is_featured' => true,
                'description' => 'Proyek pemasangan atap kliplok dan insulasi aluminium pada bangunan industri seluas 1.500 m² di kawasan Sidoarjo. Pekerjaan mencakup pemasangan rangka baja ringan, penutup atap zincalum, dan insulasi aluminium bubble untuk meningkatkan efisiensi termal bangunan. Proyek selesai tepat waktu dengan hasil yang kokoh dan tahan lama. Tim kami bekerja dengan presisi tinggi untuk memastikan setiap sambungan rapat dan kedap air, sehingga atap mampu bertahan dalam cuaca ekstrem. Material yang digunakan telah melalui uji kualitas ketat dan terjamin keawetannya. Selain itu, kami juga memberikan edukasi kepada klien mengenai cara perawatan atap dan insulasi agar fungsi optimal tetap terjaga dalam jangka panjang.',
            ],
            [
                'title' => 'Renovasi Atap Skylight Fiberglass di Surabaya',
                'category' => 'talang-skylight',
                'location' => 'Surabaya, Jawa Timur',
                'year' => '2024',
                'client' => 'CV. Karya Sejahtera',
                'duration' => '1 bulan',
                'status' => 'completed',
                'is_featured' => true,
                'description' => 'Proyek bongkar pasang skylight fiberglass pada gedung perkantoran di Surabaya. Pemasangan skylight baru dengan material fiberglass berkualitas untuk meningkatkan pencahayaan alami dan estetika bangunan. Dilengkapi dengan sistem talang air yang terintegrasi untuk mencegah kebocoran. Proyek ini memberikan solusi pencahayaan alami yang optimal, mengurangi konsumsi listrik hingga 25% di siang hari. Kami juga memperbaiki struktur atap yang sudah tua dan mengganti rangka dengan baja ringan yang lebih tahan lama. Pemasangan skylight dilakukan dengan teknik khusus agar tidak terjadi rembesan air hujan, dilengkapi dengan lapisan pelindung UV untuk mencegah penurunan kualitas material akibat paparan sinar matahari langsung.',
            ],
            [
                'title' => 'Pemasangan Railing Safetyline di Gedung DPRD Sidoarjo',
                'category' => 'safetyline-railing',
                'location' => 'Sidoarjo, Jawa Timur',
                'year' => '2023',
                'client' => 'Pemerintah Kabupaten Sidoarjo',
                'duration' => '3 minggu',
                'status' => 'completed',
                'is_featured' => false,
                'description' => 'Pemasangan sistem safetyline dan railing di Gedung DPRD Sidoarjo untuk meningkatkan keselamatan pekerja dan pengunjung. Pekerjaan mencakup pemasangan railing stainless steel di area balkon dan tangga, serta sistem safetyline untuk pekerja pemeliharaan gedung di ketinggian. Kami menggunakan material stainless steel berkualitas tinggi yang tahan karat dan memiliki daya tahan terhadap cuaca tropis. Sistem safetyline dirancang dengan titik jangkar yang kuat dan memenuhi standar K3 internasional. Pekerjaan dilakukan dengan metode pengelasan presisi dan baut berkekuatan tinggi untuk menjamin keamanan maksimal. Proyek ini menjadi salah satu contoh implementasi keselamatan kerja yang kami terapkan di gedung-gedung publik sebagai bentuk komitmen terhadap keselamatan pengguna.',
            ],
            [
                'title' => 'Pembangunan Gudang Logistik di Sidoarjo',
                'category' => 'konstruksi',
                'location' => 'Sidoarjo, Jawa Timur',
                'year' => '2024',
                'client' => 'PT. Logistik Nusantara',
                'duration' => '6 bulan',
                'status' => 'completed',
                'is_featured' => true,
                'description' => 'Proyek pembangunan gudang logistik seluas 3.000 m² di kawasan industri Sidoarjo. Pekerjaan mencakup konstruksi fondasi, struktur baja, pemasangan atap, dinding, dan sistem drainase. Gudang ini dirancang untuk menyimpan berbagai jenis barang dengan sistem rak tinggi dan sirkulasi udara yang baik. Kami menggunakan material baja berkualitas tinggi dengan standar SNI untuk menjamin kekuatan dan ketahanan bangunan terhadap gempa dan angin kencang. Pekerjaan pondasi menggunakan teknik bore pile yang dalam dan kuat, dengan pengecoran beton K-350 yang tahan lama. Struktur baja dikerjakan dengan sistem sambungan las dan baut yang presisi, memastikan kestabilan dan keamanan. Selain itu, kami juga memasang sistem penerangan LED dan ventilasi alami untuk efisiensi energi. Proyek ini selesai tepat waktu dan mendapatkan apresiasi dari klien atas kualitas hasil pekerjaan dan kedisiplinan tim kami. Proyek ini menjadi salah satu proyek andalan kami di bidang konstruksi gudang industri.',
            ],
            [
                'title' => 'Pemasangan Insulasi Rockwool di Gedung Perkantoran Surabaya',
                'category' => 'insulasi',
                'location' => 'Surabaya, Jawa Timur',
                'year' => '2024',
                'client' => 'PT. Properti Hijau',
                'duration' => '2 bulan',
                'status' => 'completed',
                'is_featured' => false,
                'description' => 'Proyek pemasangan insulasi Rockwool pada gedung perkantoran 10 lantai di Surabaya untuk meningkatkan kenyamanan termal dan akustik. Insulasi Rockwool dipasang pada dinding eksterior, plafon, dan lantai untuk mengurangi kebisingan dari luar serta menjaga suhu ruangan tetap stabil. Material Rockwool yang digunakan memiliki ketahanan api kelas A1 dan mampu meredam suara hingga 60%, sangat ideal untuk gedung perkantoran yang membutuhkan suasana tenang dan produktif. Pemasangan dilakukan dengan teknik spray dan pemasangan panel yang rapi tanpa celah udara, sehingga efektivitas insulasi optimal. Selain itu, Rockwool juga memberikan perlindungan terhadap kelembaban, mencegah tumbuhnya jamur dan lumut yang dapat merusak struktur gedung. Proyek ini selesai dalam waktu 2 bulan dan memberikan penghematan energi pendingin ruangan hingga 35%, yang berdampak signifikan pada pengurangan biaya operasional gedung. Klien sangat puas dengan hasil yang dicapai, dan kami mendapatkan kepercayaan untuk proyek serupa di gedung-gedung lain di Surabaya.',
            ],
        ];

        foreach ($projectsData as $data) {
            $slug = Str::slug($data['title']) . '-' . time();

            // Download thumbnail
            $thumbUrl = "https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=400&q=80";
            $thumbPath = "projects/{$slug}-thumbnail.jpg";
            $this->downloadImage($thumbUrl, $thumbPath);

            $project = \App\Models\Project::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $data['title'],
                    'slug' => $slug,
                    'category' => $data['category'],
                    'location' => $data['location'],
                    'year' => $data['year'],
                    'client' => $data['client'],
                    'duration' => $data['duration'],
                    'status' => $data['status'],
                    'is_featured' => $data['is_featured'],
                    'description' => $data['description'],
                    'thumbnail' => $thumbPath,
                ]
            );

            // Hapus gambar lama
            \App\Models\ProjectImage::where('project_id', $project->id)->delete();

            // Download 5 gambar galeri
            $imageUrls = $this->projectImages[$data['title']] ?? [];
            foreach ($imageUrls as $i => $url) {
                $this->downloadImage($url, "project-galleries/{$project->id}-" . ($i + 1) . ".jpg");
                \App\Models\ProjectImage::create([
                    'project_id' => $project->id,
                    'image' => "project-galleries/{$project->id}-" . ($i + 1) . ".jpg",
                    'order' => $i,
                ]);
            }
        }

        $this->command->info('✅ Database seeding completed successfully!');
        $this->command->info('✅ All data and images have been inserted.');
    }

    /**
     * Download gambar dari URL dan simpan ke storage
     */
    private function downloadImage(string $url, string $path): bool
    {
        try {
            $content = @file_get_contents($url);
            if ($content) {
                Storage::disk('public')->put($path, $content);
                return true;
            }
        } catch (\Exception $e) {
            $this->command->warn("⚠️ Gagal download: {$url}");
        }
        return false;
    }
}