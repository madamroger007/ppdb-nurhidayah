<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PPDB - RA Nurhidayah Bojongsoang</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script
        src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js"
        type="module"></script>

    <style type="text/tailwindcss">
        @theme {
        --color-clifford: #da373d;
      }
       html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body class="font-sans text-gray-800 bg-white">

    <!-- Navbar -->
    <!-- Navbar -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-md z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="#beranda" class="text-2xl font-bold text-green-700 tracking-wide hover:opacity-90 transition duration-300">
                RA Nurhidayah
            </a>

            <!-- Menu Desktop -->
            <nav class="hidden md:flex space-x-6 items-center font-medium text-gray-700">
                <a href="#beranda" class="hover:text-green-600 transition duration-300">Beranda</a>
                <a href="#tentang" class="hover:text-green-600 transition duration-300">Tentang Kami</a>
                <a href="#fasilitas" class="hover:text-green-600 transition duration-300">Fasilitas</a>
                <a href="#testimoni" class="hover:text-green-600 transition duration-300">Testimoni</a>
                <a href="/pendaftaran" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 shadow-md transition duration-300">Mulai Pendaftaran</a>
            </nav>
        </div>
    </header>


    <!-- Hero Section -->
    <section id="beranda" class="pt-28 md:pt-36 pb-20 bg-gradient-to-r from-green-100 to-white">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div data-aos="fade-right">
                <h2 class="text-4xl font-extrabold text-green-800 mb-4 leading-tight">PPDB Online <br> RA Nurhidayah</h2>
                <p class="text-gray-700 mb-6">Bergabunglah bersama kami untuk masa depan anak yang cemerlang dalam pendidikan Islami modern.</p>
                <div class="space-x-3">
                    <a href="/pendaftaran" class="bg-green-600 text-white px-6 py-3 rounded shadow hover:bg-green-700 transition">Mulai Daftar</a>
                    <a href="#tentang" class="border border-green-600 text-green-600 px-6 py-3 rounded hover:bg-green-50 transition">Tentang Kami</a>
                </div>
            </div>
            <div class="w-full flex justify-center" data-aos="fade-left">
                <dotlottie-wc
                    src="https://lottie.host/59ad3ee9-3680-4497-a0f2-77a7eada0cd9/JPBOLY6ExC.lottie"
                    style="width: 300px;height: 300px"
                    speed="1"
                    autoplay
                    loop></dotlottie-wc>
            </div>

        </div>
    </section>


    <!-- Tentang Kami-->
    <section id="tentang" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div data-aos="fade-right">
                <img src="/img/bgHero.svg" class="w-full h-auto rounded-lg" alt="Tentang Kami">
            </div>

            <div data-aos="fade-left">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang Kami</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">RA Nurhidayah merupakan lembaga pendidikan Islam yang menggabungkan kurikulum umum dan agama untuk mencetak generasi berakhlak mulia, cerdas, dan siap menghadapi masa depan.</p>
                <a href="https://maps.app.goo.gl/NxrmqNsziKXXk7rM9" target="_blank" class="text-green-600 underline">Lihat Lokasi Sekolah</a>
            </div>
        </div>
    </section>

    <!-- Visi dan Misi -->
    <section id="visi-misi" class="py-20 bg-green-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Visi & Misi</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Membangun generasi yang cerdas, berakhlak mulia, dan mencintai ilmu serta agama.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div data-aos="fade-up" class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-green-700 mb-3">Visi</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Menjadi lembaga pendidikan anak usia dini yang unggul dalam pembentukan karakter islami, kreatif, dan berwawasan.
                    </p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-green-700 mb-3">Misi</h3>
                    <ul class="list-disc pl-5 text-gray-700 space-y-2">
                        <li>Menanamkan akidah dan akhlak islami sejak dini.</li>
                        <li>Mengembangkan potensi anak melalui pembelajaran aktif dan menyenangkan.</li>
                        <li>Mengintegrasikan nilai-nilai keislaman dalam kegiatan harian.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Kurikulum Pembelajaran -->
    <!-- Kurikulum Pembelajaran -->
    <section id="kurikulum" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Apa Saja yang Dipelajari?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Materi pembelajaran di RA Nurhidayah dirancang untuk menanamkan nilai-nilai Islam sejak dini, serta mengembangkan potensi anak secara menyeluruh.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div data-aos="fade-up" class="bg-green-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-green-700 mb-2">Akidah & Tauhid</h3>
                    <p class="text-sm text-gray-700">Mengenalkan anak kepada Allah, rukun iman, dan keyakinan yang benar sejak usia dini.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="bg-green-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-green-700 mb-2">Fiqih Dasar</h3>
                    <p class="text-sm text-gray-700">Pembelajaran praktik ibadah seperti wudhu, shalat, puasa, dan tata cara bersuci sesuai usianya.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="bg-green-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-green-700 mb-2">BTQ (Baca Tulis Qur’an)</h3>
                    <p class="text-sm text-gray-700">Anak diajarkan membaca huruf hijaiyah, tajwid dasar, dan menulis huruf Arab dengan metode menyenangkan.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300" class="bg-green-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-green-700 mb-2">Doa-Doa Harian</h3>
                    <p class="text-sm text-gray-700">Menghafal dan membiasakan doa sehari-hari seperti doa makan, tidur, masuk-keluar rumah, dll.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="400" class="bg-green-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-green-700 mb-2">Adab & Akhlak</h3>
                    <p class="text-sm text-gray-700">Menanamkan sopan santun, menghormati guru, berbagi, dan bersikap baik kepada sesama.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="500" class="bg-green-50 p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-green-700 mb-2">Keterampilan & Seni</h3>
                    <p class="text-sm text-gray-700">Melatih kreativitas melalui menggambar, mewarnai, menari islami, dan keterampilan motorik halus.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Fasilitas -->
    <section id="fasilitas" class="py-20 bg-green-50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Fasilitas Unggulan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div data-aos="zoom-in" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <img src="/img/fasilitas/kelas.jpg" class="h-40 w-full object-cover rounded mb-4" alt="Kelas">
                    <h3 class="text-lg font-semibold text-green-700">Kelas</h3>
                    <p class="text-sm text-gray-600 mt-2">Ruang belajar yang nyaman dan kondusif untuk siswa.</p>
                </div>
                <div data-aos="zoom-in" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <img src="/img/fasilitas/perpustakaan.jpg" class="h-40 w-full object-cover rounded mb-4" alt="Perpustakaan">
                    <h3 class="text-lg font-semibold text-green-700">Perpustakaan</h3>
                    <p class="text-sm text-gray-600 mt-2">Pembelajaran berbasis literasi untuk siswa.</p>
                </div>
                <div data-aos="zoom-in" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <img src="/img/fasilitas/taman-bermain.jpg" class="h-40 w-full object-cover rounded mb-4" alt="Taman Anak">
                    <h3 class="text-lg font-semibold text-green-700">Taman Anak</h3>
                    <p class="text-sm text-gray-600 mt-2">Lingkungan asri dan islami yang menunjang kegiatan siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section id="testimoni" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Apa Kata Orang Tua?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div data-aos="fade-up" data-aos-delay="100" class="bg-gray-100 p-6 rounded-lg shadow text-center">
                    <!-- Inisial A -->
                    <div class="w-20 h-20 rounded-full mx-auto mb-4 flex items-center justify-center bg-green-600 text-white text-2xl font-bold">
                        A
                    </div>
                    <p class="italic text-gray-600">"Anak saya berkembang luar biasa sejak belajar di RA Nurhidayah."</p>
                    <p class="mt-4 font-semibold text-green-700">Ahmad Zaenuddin</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="bg-gray-100 p-6 rounded-lg shadow text-center">
                    <!-- Inisial B -->
                    <div class="w-20 h-20 rounded-full mx-auto mb-4 flex items-center justify-center bg-green-600 text-white text-2xl font-bold">
                        B
                    </div>
                    <p class="italic text-gray-600">"Lingkungannya islami dan guru-gurunya sangat peduli."</p>
                    <p class="mt-4 font-semibold text-green-700">Bimarni satarwasih</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300" class="bg-gray-100 p-6 rounded-lg shadow text-center">
                    <!-- Inisial C -->
                    <div class="w-20 h-20 rounded-full mx-auto mb-4 flex items-center justify-center bg-green-600 text-white text-2xl font-bold">
                        C
                    </div>
                    <p class="italic text-gray-600">"Saya senang dengan metode pengajaran yang seimbang dunia-akhirat."</p>
                    <p class="mt-4 font-semibold text-green-700">Celina Putri</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-green-700 text-white py-10">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
            <div>
                <h4 class="font-semibold mb-2">Informasi</h4>
                <ul>
                    <li><a href="#tentang" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#fasilitas" class="hover:underline">Fasilitas</a></li>
                    <li><a href="#testimoni" class="hover:underline">Testimoni</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Tautan</h4>
                <ul>
                    <li><a href="/pendaftaran" class="hover:underline">Formulir Pendaftaran</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Kontak</h4>
                <p>Email: ranurhidayahcijeruk@gmail.com</p>
                <p>Bandung, Jawa Barat</p>
                <p>+62 881 2256 938</p>
            </div>
        </div>
        <div class="text-center mt-6 text-xs text-green-200">© 2025 RA Nurhidayah</div>
    </footer>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
            easing: 'ease-in-out'
        });
    </script>
</body>

</html>