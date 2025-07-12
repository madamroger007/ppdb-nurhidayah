<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran - RA Nurhidayah</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
        --color-clifford: #da373d;
      }
       .dropzone {
            @apply border-2 border-dashed border-gray-300 rounded-md p-4 text-center cursor-pointer relative;
        }

        .dropzone.dragover {
            @apply border-green-600 bg-green-50;
        }
    </style>

</head>

<body class="bg-white font-sans text-gray-800">

    <section class="min-h-screen py-16 px-6 md:px-10">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold text-center text-green-700 mb-2">Pendaftaran RA Nurhidayah</h1>
            <div class="border-t-4 border-green-600 w-32 mx-auto mb-20"></div>

            <form id="pendaftaranForm" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-8">
                @csrf
                <!-- Kolom Kiri -->
                <div class="space-y-5">
                    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="w-full border-b p-2 focus:outline-none" required />
                    <div class="flex gap-4">
                        <input type="text" name="tempat_lahir" placeholder="Tempat" class="w-1/2 border-b p-2 focus:outline-none" required />
                        <input type="date" name="tanggal_lahir" class="w-1/2 border-b p-2 focus:outline-none" required />
                    </div>
                    <input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" class="w-full border-b p-2 focus:outline-none" required />
                    <input type="text" name="agama" placeholder="Agama" class="w-full border-b p-2 focus:outline-none" required />
                    <input type="text" name="alamat" placeholder="Alamat Lengkap" class="w-full border-b p-2 focus:outline-none" required />
                    <input type="text" name="nik" placeholder="Nomor Induk Kependudukan" class="w-full border-b p-2 focus:outline-none" required />

                    <!-- Upload Akta Kelahiran -->
                    <label class="block text-sm font-medium text-gray-700">Masukkan Scan Akta Kelahiran</label>
                    <div class="dropzone" id="drop-akta">
                        <input type="file" name="scan_akta_kelahiran" accept="image/*" class="hidden" />
                        <p class="text-sm text-gray-500">Drop file here or click to upload</p>
                        <div class="preview hidden mt-3 relative">
                            <img src="" alt="Preview" class="w-24 h-24 object-cover rounded border" />
                            <button type="button" class="absolute top-0 right-0 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs -mt-2 -mr-2 hover:bg-red-700">✕</button>
                        </div>
                    </div>

                    <!-- Upload KK -->
                    <label class="block text-sm font-medium text-gray-700">Masukkan Scan Kartu Keluarga</label>
                    <div class="dropzone" id="drop-kk">
                        <input type="file" name="scan_kk" accept="image/*" class="hidden" />
                        <p class="text-sm text-gray-500">Drop file here or click to upload</p>
                        <div class="preview hidden mt-3 relative">
                            <img src="" alt="Preview" class="w-24 h-24 object-cover rounded border" />
                            <button type="button" class="absolute top-0 right-0 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs -mt-2 -mr-2 hover:bg-red-700">✕</button>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="space-y-5">
                    <input type="text" name="nama_ayah" placeholder="Nama Lengkap Ayah" class="w-full border-b p-2 focus:outline-none" required />
                    <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="w-full border-b p-2 focus:outline-none" required />
                    <input type="text" name="nama_ibu" placeholder="Nama Lengkap Ibu" class="w-full border-b p-2 focus:outline-none" required />
                    <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" class="w-full border-b p-2 focus:outline-none" required />
                    <input type="tel" name="no_hp" placeholder="Nomor HP yang dapat dihubungi" class="w-full border-b p-2 focus:outline-none" required />
                    <input type="email" name="email" placeholder="Email yang dapat dihubungi" class="w-full border-b p-2 focus:outline-none" />

                    <!-- Upload Foto -->
                    <label class="block text-sm font-medium text-gray-700">Masukkan Foto Latar Biru 3×4</label>
                    <div class="dropzone" id="drop-foto">
                        <input type="file" name="foto_latar" accept="image/*" class="hidden" />
                        <p class="text-sm text-gray-500">Drop file here or click to upload</p>
                        <div class="preview hidden mt-3 relative">
                            <img src="" alt="Preview" class="w-24 h-24 object-cover rounded border" />
                            <button type="button" class="absolute top-0 right-0 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs -mt-2 -mr-2 hover:bg-red-700">✕</button>
                        </div>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="md:col-span-2">
                    <button type="submit" class="bg-green-600 text-white w-full px-10 py-3 mt-8 rounded hover:bg-green-700 transition">KIRIM</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.getElementById('pendaftaranForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                const response = await fetch('/submit-pendaftaran', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': token,
                        // Jangan tambahkan Content-Type di sini, biarkan FormData mengatur boundary
                    },
                });

                const data = await response.json();

                if (response.ok) {
                    alert(data.message || 'Pendaftaran berhasil!');
                    form.reset();

                    // Reset preview gambar juga
                    document.querySelectorAll('.preview').forEach(p => {
                        p.classList.add('hidden');
                        p.querySelector('img').src = '';
                        p.parentElement.querySelector('p').classList.remove('hidden');
                    });
                } else {
                    if (data.errors) {
                        const messages = Object.entries(data.errors)
                            .map(([key, val]) => `${key}: ${val.join(', ')}`)
                            .join('\n');
                        alert(messages);
                    } else {
                        alert(data.message || 'Terjadi kesalahan.');
                    }
                }
            } catch (error) {
                console.error(error);
                alert('Gagal mengirim data. Cek koneksi atau server.');
            }
        });
    </script>

    <!-- Script Drag & Drop -->
    <script>
        const setupDrop = (id) => {
            const dropzone = document.getElementById(id);
            const fileInput = dropzone.querySelector('input');
            const preview = dropzone.querySelector('.preview');
            const imgPreview = preview.querySelector('img');
            const removeBtn = preview.querySelector('button');

            const showPreview = (file) => {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        imgPreview.src = e.target.result;
                        preview.classList.remove('hidden');
                        dropzone.querySelector('p').classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            };

            const clearPreview = () => {
                fileInput.value = '';
                preview.classList.add('hidden');
                dropzone.querySelector('p').classList.remove('hidden');
            };

            dropzone.addEventListener('click', () => fileInput.click());

            dropzone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropzone.classList.add('dragover');
            });

            dropzone.addEventListener('dragleave', () => {
                dropzone.classList.remove('dragover');
            });

            dropzone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropzone.classList.remove('dragover');
                const file = e.dataTransfer.files[0];
                fileInput.files = e.dataTransfer.files;
                showPreview(file);
            });

            fileInput.addEventListener('change', () => {
                if (fileInput.files.length > 0) {
                    showPreview(fileInput.files[0]);
                }
            });

            removeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                clearPreview();
            });
        };

        ['drop-akta', 'drop-kk', 'drop-foto'].forEach(setupDrop);
    </script>

</body>

</html>