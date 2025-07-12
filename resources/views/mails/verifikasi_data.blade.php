<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Verifikasi Data Pendaftaran - RA Nurhidayah</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: url('https://www.transparenttextures.com/patterns/arabesque.png') repeat;
            background-color: #f9fafb;
            padding: 30px;
            color: #1f2937;
        }

        .container {
            max-width: 720px;
            margin: auto;
            background-color: #ffffff;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-top: 5px solid #10b981;
        }

        .heading {
            text-align: center;
            color: #047857;
            margin-bottom: 25px;
        }

        .result-box {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            border-radius: 8px;
            font-size: 16px;
        }

        .success {
            background-color: #ecfdf5;
            border-left: 6px solid #10b981;
            color: #065f46;
        }

        .fail {
            background-color: #fef2f2;
            border-left: 6px solid #ef4444;
            color: #991b1b;
        }

        .footer {
            margin-top: 50px;
            font-size: 14px;
            color: #6b7280;
        }

        .signature {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="heading">📜 Hasil Verifikasi Pendaftaran RA Nurhidayah</h2>

        <p>بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</p>

        <p>Assalamu’alaikum warahmatullahi wabarakatuh,</p>

        <p>Yth. Bapak/Ibu/Wali dari Ananda <strong>{{ $nama }}</strong>,</p>

        <p>Segala puji hanya milik Allah ﷻ, shalawat dan salam semoga tercurah kepada Nabi Muhammad ﷺ. Dengan penuh rasa hormat, kami informasikan bahwa proses verifikasi data pendaftaran Ananda telah selesai dilakukan oleh Panitia PPDB <strong>RA Nurhidayah</strong>. Berikut hasil verifikasi tersebut:</p>

        <div class="result-box {{ $verifikasi ? 'success' : 'fail' }}">
            @if($verifikasi)
            <h3>🌟 Alhamdulillah, Ananda dinyatakan <strong>LULUS</strong> verifikasi data.</h3>
            <p>Silakan menunggu informasi selanjutnya mengenai daftar ulang serta jadwal kegiatan awal tahun ajaran baru.</p>
            @else
            <h3>🙏 Mohon maaf, Ananda dinyatakan <strong>TIDAK LULUS</strong> verifikasi data.</h3>
            <p>Untuk klarifikasi atau pengajuan ulang, silakan menghubungi panitia PPDB RA Nurhidayah melalui kontak yang tersedia.</p>
            @endif
        </div>

        <p>Terima kasih atas kepercayaan Bapak/Ibu telah memilih <strong>RA Nurhidayah</strong> sebagai tempat pendidikan bagi putra/putrinya.</p>

        <p>Semoga Allah ﷻ senantiasa memberikan taufik dan hidayah-Nya kepada kita semua. Aamiin Yaa Rabbal 'Aalamiin.</p>

        <p class="signature">Wassalamu’alaikum warahmatullahi wabarakatuh,</p>

        <p><strong>Panitia Penerimaan Peserta Didik Baru (PPDB)<br>RA Nurhidayah</strong></p>

        <p class="footer">📍 Jl. Bojongsari, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat | ✉️ ranurhidayahcijeruk@gmail.com</p>
    </div>
</body>

</html>