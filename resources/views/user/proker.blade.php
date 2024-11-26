@extends('layouts.app')

@section('title', 'Program Kerja')

@section('content')
<div class="bg-white">
    {{-- carousel galeri --}}
    <div id="gallery" class="relative w-full h-56 overflow-hidden md:h-500" data-carousel="slide">
        <!-- Carousel Items -->
        <div class="absolute inset-0 flex transition-transform duration-700 ease-in-out" style="width: 100%;" data-carousel-wrapper>
            <!-- Item 1 -->
            <div class="w-full h-full flex-shrink-0" data-carousel-item>
                <img src="{{ asset('assets/series_img1.svg') }}" class="block w-full h-full object-cover" alt="Image 1">
            </div>
            <!-- Item 2 -->
            <div class="w-full h-full flex-shrink-0" data-carousel-item>
                <img src="{{ asset('assets/series_img1.svg') }}" class="block w-full h-full object-cover" alt="Image 2">
            </div>
            <!-- Item 3 -->
            <div class="w-full h-full flex-shrink-0" data-carousel-item>
                <img src="{{ asset('assets/series_img1.svg') }}" class="block w-full h-full object-cover" alt="Image 3">
            </div>
        </div>
    </div>


    {{-- card nama proker --}}
    <div class="mx-4 my-16 md:mx-16 p-16 grid grid-cols-4 border-2 rounded-lg justify-self-center border-amara bg-amara bg-opacity-5">
        <div class="col-span-4 items-center text-center p-auto md:col-span-2 my-auto">
            <h2 class="text-4xl font-bold text-amara uppercase sm:text-5xl">SERIES 2024</h2>
            <p class="text-dark text-base font-semibold">Kabinet Amara</p>
        </div>
        <div class="col-span-4 place-items-center p-auto md:col-span-2 mt-8">
            <div class="grid-rows-4">
                <div class="row-span-1 mb-4">
                    <p class="text-amara text-sm">Proker Divisi</p>
                    <p class="text-dark text-base font-semibold">PSDM</p>
                </div>
                <div class="row-span-1 mb-4">
                    <p class="text-amara text-sm">Dosen Pembina</p>
                    <p class="text-dark text-base font-semibold">Dinar Nugroho Pratomo, S.Kom., M.IM., M.Cs.</p>
                </div>
                <div class="row-span-1 mb-4">
                    <p class="text-amara text-sm">Ketua Pelaksana</p>
                    <p class="text-dark text-base font-semibold">Ahmad Luthfi Abdillah</p>
                </div>
                <div class="row-span-1 mb-4">
                    <p class="text-amara text-sm">Tanggal Pelaksanaan</p>
                    <p class="text-dark text-base font-semibold">Sabtu,  31 Agustus 2024 - Minggu, 14 Desember 2024</p>
                </div>
            </div>
        </div>
    </div>

    {{-- seputar proker --}}
    <div class="mx-8 mb-16 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-96 h-px my-8 bg-black">
            <span class="px-3 font-bold text-3xl md:text-4xl text-center text-amara bg-white uppercase">seputar series</span>
            <hr class="w-96 h-px my-8 bg-black">
        </div>
        <div class="m-4 lg:mx-32 text-font text-justify">
            <p>Series merupakan program kerja yang diinisiasi oleh divisi Pengembangan Sumber Daya Manusia (PSDM) dalam kabinet Amara. Tujuan utama dari program ini adalah untuk meningkatkan solidaritas dan memperkuat ikatan antar anggota Teknologi Rekayasa Perangkat Lunak (TRPL) angkatan 2024. Melalui berbagai kegiatan yang dirancang secara khusus, Series diharapkan dapat membangun rasa kebersamaan dan kekeluargaan di antara mahasiswa.</p>
            <br>
            <p>Melalui Series, mahasiswa baru TRPL 2024 akan mendapatkan kesempatan untuk mengenal satu sama lain, senior mereka, serta lingkungan akademik dan sosial di kampus. Program ini diharapkan dapat menjadi langkah awal yang positif bagi mahasiswa baru dalam memulai perjalanan akademik mereka di bidang Teknologi Rekayasa Perangkat Lunak.</p>
            {{-- {{ $proker->desc }} --}}
        </div>
    </div>

    {{-- detail proker --}}
    <div class="mx-8 mb-16 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-80 h-px my-8 bg-black">
            <span class="px-3 font-bold text-3xl md:text-4xl text-center text-amara bg-white uppercase">acara dalam series</span>
            <hr class="w-80 h-px my-8 bg-black">
        </div>
        <div class="m-4 lg:mx-32 text-font text-justify">
            <p>
                Acara Series dilaksanakan dalam tiga hari yang berbeda. Hari pertama berlangsung pada Sabtu, 31 Agustus 2024, pukul 09.00 - 12.00 WIB. Acara diawali dengan penyambutan mahasiswa baru oleh Dr.Eng. Ganjar Alfian, S.T., M.Eng. dan Bapak Dinar Nugroho Pratomo, S.Kom., M.IM., M.Cs. selaku dosen pembimbing aset. Selanjutnya, Dr. Umar Taufiq, S.Kom., M.Cs., selaku Kaprodi TRPL 2024, memberikan pemaparan materi dan sambutan. Acara dilanjutkan dengan mini games dan sesi tanya jawab mengenai TRPL, serta diakhiri dengan foto bersama.
            </p>
            <br>
            <p>
                Hari kedua diadakan pada Sabtu, 7 September 2024, pukul 09.00 - 12.00 WIB. Agenda utama hari ini adalah pemaparan materi mengenai berbagai kegiatan yang dapat diikuti oleh mahasiswa TRPL serta peluang yang dapat mereka raih. Acara dilanjutkan dengan permainan tebak tokoh dan diakhiri dengan penutupan.
            </p>
            <br>
            <p>
                Hari ketiga berlangsung pada Minggu, 8 September 2024, pukul 09.00 - 12.00 WIB. Acara ini menampilkan pemaparan materi dari alumni TRPL yang telah berkarir di industri. Para alumni akan berbagi pengalaman dan wawasan mengenai perjalanan karir mereka setelah lulus dari program studi TRPL.
            </p>
            {{-- {{ $proker->desc }} --}}
        </div>
    </div>

    {{-- panitia pelaksana --}}
    <div class="mx-8 mb-16 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-80 h-px my-8 bg-black">
            <span class="px-3 font-bold text-3xl md:text-4xl text-center text-amara bg-white uppercase">panitia pelaksana</span>
            <hr class="w-80 h-px my-8 bg-black">
        </div>

        <div class="grid grid-cols-2 mx-8 mb-16 md:grid-cols-6 gap-4">
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div><div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div><div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
        </div>
    </div>

    {{-- dokumentasi proker --}}
    <div class="mx-0 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-80 h-px my-8 bg-black">
            <span class="px-3 font-bold text-3xl md:text-4xl text-center text-amara bg-white uppercase">dokumentasi</span>
            <hr class="w-80 h-px my-8 bg-black">
        </div>
        <div class="grid grid-cols-2 mx-8 mb-16 md:grid-cols-3 gap-4">
            <div>
                <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/home_assets.svg') }}" alt="dokum_img1">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/pilihan_amara.svg') }}" alt="dokum_img">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg" alt="">
            </div>
        </div>


    </div>

</div>
@endsection
