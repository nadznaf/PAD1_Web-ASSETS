@extends('layouts.app')

@section('title', 'KABINET')

@section('content')
<div class="bg-white">
    <!-- Header Section -->
    <div class="bg-amara p-8 md:p-16 text-center">
        <h2 class="mt-2 text-3xl md:text-4xl font-bold text-white uppercase">Kabinet {{ $kabinet->nama_kabinet }}</h2>
        <p class="mt-4 md:mt-6 text-base md:text-lg font-normal text-white">{{ $kabinet->deskripsi_kabinet }}</p>
    </div>

    <!-- Main Content Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mx-6 mb-24 md:mx-32 my-8 md:my-16">
        <div class="text-center">
            <img src="{{ asset('storage/datakabinet/' . $kabinet->logo_kabinet) }}" class="w-full h-auto" alt="Amara Logo">
        </div>
        <div class="flex flex-col justify-center space-y-6">
            <div class="flex items-start">
                <div class="w-6 h-6 bg-amara rounded-full mr-4"></div>
                <div>
                    <h3 class="text-xl font-semibold text-dark">Makna</h3>
                    <p class="font-light text-dark">{{ $kabinet->makna_kabinet }}</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="w-6 h-6 bg-amara rounded-full mr-4"></div>
                <div>
                    <h3 class="text-xl font-semibold text-dark">Visi</h3>
                    <p class="font-light text-dark">{{ $kabinet->visi_kabinet }}</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="w-6 h-6 bg-amara rounded-full mr-4"></div>
                <div>
                    <h3 class="text-xl font-semibold text-dark">Misi</h3>
                    <p class="font-light text-dark">{{ $kabinet->misi_kabinet }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Divisi Kepengurusan Section -->
    <div class="text-center mx-6 md:mx-auto max-w-2xl lg:max-w-4xl">
        <h2 class="mt-2 text-2xl md:text-4xl font-semibold text-amara uppercase">Divisi Kepengurusan {{ $kabinet->nama_kabinet }}</h2>
        <p class="mt-4 md:mt-6 mb-8 text-base md:text-lg font-normal text-amara">{{ $kabinet->deskripsi_kabinet }}</p>
    </div>
    {{-- pengurus harian --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16 px-6 md:px-12 justify-items-center">
        <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0" data-modal-target="default-modal" data-modal-toggle="default-modal">
            <img class="rounded-lg" src="{{ asset('assets/yodhim.svg') }}" alt="Ketua Kabinet">
            <figcaption class="absolute bottom-4 px-4 text-white">
                <p class="font-bold text-xl">Ketua Kabinet</p>
                <p class="text-lg">Yodhimas Geffananda</p>
            </figcaption>
        </figure>
        <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0" data-modal-target="default-modal" data-modal-toggle="default-modal">
            <img class="rounded-lg" src="{{ asset('assets/rioga.svg') }}" alt="Ketua Kabinet">
            <figcaption class="absolute bottom-4 px-4 text-white">
                <p class="font-bold text-xl">Sekretaris Jenderal</p>
                <p class="text-lg">Rioga Natayuda</p>
            </figcaption>
        </figure>
        <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0" data-modal-target="default-modal" data-modal-toggle="default-modal">
            <img class="rounded-lg" src="{{ asset('assets/risma.svg') }}" alt="Ketua Kabinet">
            <figcaption class="absolute bottom-4 px-4 text-white">
                <p class="font-bold text-xl">Sekretaris</p>
                <p class="text-lg">Risma Saputri</p>
                <p class="text-lg">Charizza Thunjung</p>
            </figcaption>
        </figure>
        <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0" data-modal-target="default-modal" data-modal-toggle="default-modal">
            <img class="rounded-lg" src="{{ asset('assets/luthfi.svg') }}" alt="Ketua Kabinet">
            <figcaption class="absolute bottom-4 px-4 text-white">
                <p class="font-bold text-xl">Bendahara</p>
                <p class="text-lg">Luthfi Lisana</p>
                <p class="text-lg">Marwah Kamila</p>
            </figcaption>
        </figure>
    </div>
    {{-- divisi --}}
    <div class="grid grid-cols-2 mx-8 mb-16 md:grid-cols-5 gap-4">
        <div class="col-span-1 justify-items-center text-center">
            <img src="{{ asset('assets/charizza.svg') }}" class="w-36 h-36 rounded-full" alt="divisi">
            <p class="mt-4 font-bold text-xl uppercase">psdm</p>
        </div>
        <div class="col-span-1 justify-items-center text-center">
            <img src="{{ asset('assets/marwah.svg') }}" class="w-36 h-36 rounded-full" alt="divisi">
            <p class="mt-4 font-bold text-xl uppercase">humpub</p>
        </div>
        <div class="col-span-1 justify-items-center text-center">
            <img src="{{ asset('assets/charizza.svg') }}" class="w-36 h-36 rounded-full" alt="divisi">
            <p class="mt-4 font-bold text-xl uppercase">kastrad</p>
        </div>
        <div class="col-span-1 justify-items-center text-center">
            <img src="{{ asset('assets/marwah.svg') }}" class="w-36 h-36 rounded-full" alt="divisi">
            <p class="mt-4 font-bold text-xl uppercase">medkraf</p>
        </div>
        <div class="col-span-1 justify-items-center text-center">
            <img src="{{ asset('assets/charizza.svg') }}" class="w-36 h-36 rounded-full" alt="divisi">
            <p class="mt-4 font-bold text-xl uppercase">minkat</p>
        </div>
    </div>
    <div class="flex justify-center mb-32">
        <a href="{{ route('kepengurusan') }}" type="button" class="text-white bg-black hover:bg-amara hover:text-black font-medium rounded-full text-sm px-5 py-2.5 text-center">
            Lihat Semua
        </a>
    </div>

    {{-- proker kabinet --}}
    <div class="text-center mx-6 md:mx-auto max-w-2xl lg:max-w-4xl">
        <h2 class="mt-2 text-2xl md:text-4xl font-semibold text-amara uppercase">program kerja kabinet {{ $kabinet->nama_kabinet }}</h2>
        <p class="mt-4 md:mt-6 mb-8 text-base md:text-lg font-normal text-amara">deskripsi program kerja kabinet</p>
    </div>
    <div class="grid grid-cols-1 gap-6 m-16 md:grid-cols-2 lg:grid-cols-3">
        {{-- proker terakhir --}}
        <div class="max-w-sm bg-white hover:bg-bg_aspiration duration-100 rounded-lg shadow-lg">
            <a href="{{ route('proker') }}">
                <!-- Image -->
                <img class="rounded-t-lg w-full" src="{{ asset('assets/series_img1.svg') }}" alt="proker"/>

                <!-- Date and Category Section -->
                <div class="flex grid-cols-2 items-center justify-between px-4 pt-4">
                    <p class="text-judul_aspiration text-sm text-left">31 Agustus 2024</p>
                    <a href="{{ route('kepengurusan') }}">
                        <div class="bg-judul_aspiration text-white rounded-xl px-3 py-1 text-xs text-center w-fit">
                            PSDM
                        </div>
                    </a>
                </div>

                <!-- Title -->
                <h5 class="p-4 text-2xl font-semibold text-font dark:text-white">SERIES 2024</h5>

                <!-- Description -->
                <p class="px-4 pb-4 font-normal text-gray-700 dark:text-gray-400">
                    Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                </p>
            </a>
        </div>

        {{-- proker kedua --}}
        <div class="max-w-sm bg-white hover:bg-bg_aspiration duration-100 rounded-lg shadow-lg">
            <a href="{{ route('proker') }}">
                <!-- Image -->
                <img class="rounded-t-lg w-full" src="{{ asset('assets/liga_minkat.jpg') }}" alt="proker"/>

                <!-- Date and Category Section -->
                <div class="flex grid-cols-2 items-center justify-between px-4 pt-4">
                    <p class="text-judul_aspiration text-sm text-left">19 Oktober 2024</p>
                    <a href="{{ route('kepengurusan') }}">
                        <div class="bg-judul_aspiration text-white rounded-xl px-3 py-1 text-xs text-center w-fit uppercase">
                            minkat
                        </div>
                    </a>
                </div>

                <!-- Title -->
                <h5 class="p-4 text-2xl font-semibold text-font dark:text-white uppercase">LIGA TRPL 2024</h5>

                <!-- Description -->
                <p class="px-4 pb-4 font-normal text-gray-700 dark:text-gray-400">
                    Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                </p>
            </a>
        </div>

        {{-- proker ketiga --}}
        <div class="max-w-sm bg-white hover:bg-bg_aspiration duration-100 rounded-lg shadow-lg">
            <a href="{{ route('proker') }}">
                <!-- Image -->
                <img class="rounded-t-lg w-full" src="{{ asset('assets/belajar_bareng_psdm.jpg') }}" alt="proker"/>

                <!-- Date and Category Section -->
                <div class="flex grid-cols-2 items-center justify-between px-4 pt-4">
                    <p class="text-judul_aspiration text-sm text-left">29 September 2024</p>
                    <a href="{{ route('kepengurusan') }}">
                        <div class="bg-judul_aspiration text-white rounded-xl px-3 py-1 text-xs text-center w-fit uppercase">
                            PSDM
                        </div>
                    </a>
                </div>

                <!-- Title -->
                <h5 class="p-4 text-2xl font-semibold text-font dark:text-white uppercase">belajar bareng</h5>

                <!-- Description -->
                <p class="px-4 pb-4 font-normal text-gray-700 dark:text-gray-400">
                    Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                </p>
            </a>
        </div>

        <div class="max-w-sm bg-white hover:bg-bg_aspiration duration-100 rounded-lg shadow-lg">
            <a href="{{ route('proker') }}">
                <!-- Image -->
                <img class="rounded-t-lg w-full" src="{{ asset('assets/hearing_kastrad.png') }}" alt="proker"/>

                <!-- Date and Category Section -->
                <div class="flex grid-cols-2 items-center justify-between px-4 pt-4">
                    <p class="text-judul_aspiration text-sm text-left">1 November 2024</p>
                    <a href="{{ route('kepengurusan') }}">
                        <div class="bg-judul_aspiration text-white rounded-xl px-3 py-1 text-xs text-center w-fit uppercase">
                            kastrad
                        </div>
                    </a>
                </div>

                <!-- Title -->
                <h5 class="p-4 text-2xl font-semibold text-font dark:text-white uppercase">hearing prodi</h5>

                <!-- Description -->
                <p class="px-4 pb-4 font-normal text-gray-700 dark:text-gray-400">
                    Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                </p>
            </a>
        </div>
    </div>

    <!-- Documentation Section -->
    <div class="bg-black px-8 py-16 text-center">
        <div class="mx-auto max-w-2xl lg:max-w-4xl">
            <h2 class="text-2xl md:text-4xl font-semibold text-amara uppercase">Dokumentasi Terbaru</h2>
            <p class="my-4 md:mt-6 text-base md:text-lg text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima quisquam magni voluptatem quae non eveniet...</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
