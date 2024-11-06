@extends('layouts.app')

@section('title', 'Program Kerja')

@section('content')
<div class="bg-white">
    {{-- carousel galeri --}}
    <div id="gallery" class="relative h-56 max-w-full overflow-hidden md:h-96" data-carousel="slide">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="assets/series_img1.svg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
            {{-- {{ $article->image }} --}}
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="assets/series_img1.svg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="assets/series_img1.svg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="assets/series_img1.svg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="assets/series_img1.svg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
    </div>

    {{-- card nama proker --}}
    <div class="m-16 p-16 grid grid-cols-4 border-2 rounded-lg justify-self-center border-amara bg-amara bg-opacity-5">
        <div class="col-span-4 items-center text-center p-auto md:col-span-2 ">
            <h2 class="mt-2 text-4xl font-bold text-amara uppercase sm:text-5xl">SERIES 2024</h2>
            <p class="text-dark text-base font-semibold">Kabinet Amara</p>
        </div>
        <div class="col-span-4 place-items-center p-auto md:col-span-2 ">
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
    <div class="mx-0 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-1000 h-px my-8 bg-dark">
            <span class="absolute px-3 font-bold text-5xl text-center text-amara -translate-x-1/2 bg-white left-1/2 uppercase">seputar series</span>
        </div>
        <div class="mx-16 mt-4 mb-24 text-dark leading-relaxed text-justify">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ad possimus commodi a modi officia eos eligendi quibusdam
                dignissimos at facere doloremque veritatis, incidunt maiores nostrum ut cupiditate explicabo error? Lorem ipsum dolor sit
                amet consectetur adipisicing elit. Fugiat porro natus, aut et autem possimus quae, dolores assumenda reprehenderit itaque
                minima. Quidem ut, quis debitis pariatur perspiciatis mollitia expedita quisquam. Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Ratione quidem neque, sapiente vel ab obcaecati consequuntur, optio iste quas aperiam architecto fugiat!
                Placeat rem hic, numquam molestias provident iusto obcaecati!
            </p>
            {{-- {{ $proker->desc }} --}}
        </div>
    </div>

    {{-- detail proker --}}
    <div class="mx-0 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-1000 h-px my-8 bg-dark">
            <span class="absolute px-3 font-bold text-5xl text-center text-amara -translate-x-1/2 bg-white left-1/2 uppercase">acara dalam series</span>
        </div>
        <div class="mx-16 mt-4 mb-24 text-dark leading-relaxed text-justify">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ad possimus commodi a modi officia eos eligendi quibusdam
                dignissimos at facere doloremque veritatis, incidunt maiores nostrum ut cupiditate explicabo error? Lorem ipsum dolor sit
                amet consectetur adipisicing elit. Fugiat porro natus, aut et autem possimus quae, dolores assumenda reprehenderit itaque
                minima. Quidem ut, quis debitis pariatur perspiciatis mollitia expedita quisquam. Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Ratione quidem neque, sapiente vel ab obcaecati consequuntur, optio iste quas aperiam architecto fugiat!
                Placeat rem hic, numquam molestias provident iusto obcaecati!
            </p>
            {{-- {{ $proker->desc }} --}}
        </div>
    </div>

    {{-- panitia pelaksana --}}
    <div class="mx-0 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-1000 h-px my-8 bg-dark">
            <span class="absolute px-3 font-bold text-5xl text-center text-amara -translate-x-1/2 bg-white left-1/2 uppercase">panitia pelaksana</span>
        </div>
        <div class="mx-16 mt-4 mb-24 grid grid-cols-6 text-justify">
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Sekretaris</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Bendahara</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Koordinator KSK</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Anggota KSK</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Anggota</p>
            </div>

        </div>
        <div class="mx-16 mt-4 mb-24 grid grid-cols-6 text-justify">
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Anggota</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Anggota</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Anggota</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Anggota</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Anggota</p>
            </div>

        </div>
    </div>

    {{-- dokumentasi proker --}}
    <div class="mx-0 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-1000 h-px my-8 bg-dark">
            <span class="absolute px-3 font-bold text-5xl text-center text-amara -translate-x-1/2 bg-white left-1/2 uppercase">dokumentasi</span>
        </div>

        <div class="grid grid-cols-2 mb-32 md:grid-cols-3 gap-4">
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
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
