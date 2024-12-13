<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;400;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .modal-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Latar belakang hitam transparan */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 50; /* Menampilkan modal di atas halaman lainnya */
        }
        .modal-content {
            max-width: 40rem;
            background-color: #fff;
            border-radius: 0.8rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.3s ease-in-out;
            z-index: 51; /* Menempatkan konten modal di atas background */
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resource/css/style.css', 'resource/js/script.js'])
    <title>Desain Dosen</title>
</head>
<body class="bg-gray-100">

<!-- Modal Background -->
<div class="modal-background" id="modal">
    <div class="modal-content p-4 mx-4 md:mx-0">
        <div class="grid max-w-max grid-cols-1 md:grid-cols-2">
            <!-- Modal Image -->
            <div class="p-4">
                <img class="object-cover w-full h-60 md:h-auto rounded-xl" src="{{ asset('storage/datadosen/' . $dosen->foto_profil_dosen) }}" alt="Detail dosen">
            </div>

            <!-- Content Modal -->
            <div class="p-4">
                <p class="text-end uppercase text-sm text-description">{{ $dosen->nika_dosen }}</p>
                <h3 class="py-2 text-xl lg:text-2xl font-bold text-assets">
                    {{ $dosen->nama_dosen }}
                </h3>
                <div class="flex justify-end">
                    <!-- Tombol Tutup untuk kembali ke halaman sebelumnya -->
                    <button onclick="goBack()" class="py-2 px-4 text-sm font-medium text-white bg-assets rounded-lg hover:bg-second_a">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk kembali ke halaman sebelumnya
    function goBack() {
        window.history.back();
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
