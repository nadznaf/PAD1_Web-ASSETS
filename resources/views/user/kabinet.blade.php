@extends('layouts.app')

@section('title', 'KABINET')

@section('content')
<style>
    #warnaKabinet {
        background-color: {{ $kabinet->color_pallete->primary_color }} !important;
    }
    .teksWarnaKabinet {
        color: {{ $kabinet->color_pallete->primary_color }} !important;
    }
    #footer {
        background-color: {{ $kabinet->color_pallete->primary_color }} !important;
    }
</style>
<div class="bg-white">
    <!-- Header Section -->
    <div id="warnaKabinet" class=" p-8 md:p-16 text-center">
        <h2 class="mt-2 text-3xl md:text-4xl font-bold text-white uppercase">Kabinet {{ $kabinet->nama_kabinet }}</h2>
        <p class="mt-4 md:mt-6 text-base md:text-lg font-normal text-white">{{ $kabinet->deskripsi_kabinet }}</p>
    </div>

    <!-- Main Content Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mx-8 lg:mx-24 my-16">
        <div class="text-center flex align-middle m-8 md:m-0">
            <img src="{{ asset('storage/datakabinet/' . $kabinet->logo_kabinet) }}" class="w-full h-auto" alt="Kabinet Logo">
        </div>
        <div class="flex flex-col justify-center space-y-6 mx-0 my-8 lg:m-4">
            <div class="flex items-start">
                <div id="warnaKabinet" class="w-6 h-6 rounded-full mr-4"></div>
                <div>
                    <h3 class="text-xl font-semibold text-dark">Makna Kabinet</h3>
                    <p class="font-light text-dark mt-4">{{ $kabinet->makna_kabinet }}</p>
                </div>
            </div>
            <div class="flex items-start">
                <div id="warnaKabinet" class="w-6 h-6 rounded-full mr-4"></div>
                <div>
                    <h3 class="text-xl font-semibold text-dark">Visi Kabinet</h3>
                    <p class="font-light text-dark mt-4">{{ $kabinet->visi_kabinet }}</p>
                </div>
            </div>
            <div class="flex items-start">
                <div id="warnaKabinet" class="w-6 h-6 rounded-full mr-4"></div>
                <div>
                    <h3 class="text-xl font-semibold text-dark">Misi Kabinet</h3>
                    <p class="font-light text-dark mt-4">{{ $kabinet->misi_kabinet }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Divisi Kepengurusan Section -->
    <div class="text-center mt-32 mb-8 mx-6 md:mx-auto">
        <h2 class="teksWarnaKabinet mt-2 text-2xl md:text-4xl font-semibold uppercase">Divisi Kepengurusan {{ $kabinet->nama_kabinet }}</h2>
        <p class="mt-4 md:mt-6 text-base md:text-lg font-normal text-description">{{ $kabinet->deskripsi_kabinet }}</p>
    </div>

    {{-- slider ph --}}
    <!-- Slider -->
    <div data-hs-carousel='{
        "loadingClasses": "opacity-0",
        "slidesQty": {
        "xs": 1,
        "md": 2,
        "lg": 4
        },
        "isDraggable": true
    }' class="relative">
        <div class="hs-carousel w-full h-full overflow-hidden bg-white rounded-lg p-0">
                <div class="hs-carousel-body relative top-0 bottom-0 start-0 flex justify-center flex-nowrap opacity-0 cursor-grab transition-transform duration-700 hs-carousel-dragging:transition-none hs-carousel-dragging:cursor-grabbing">
                    <div class="hs-carousel-slide flex justify-center px-1">
                        <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0" data-modal-target="default-modal" data-modal-toggle="default-modal">
                            <img src="{{ asset('assets/yodhim.svg') }}" class="rounded-lg object-bottom" alt="Ketua Kabinet">
                            {{-- {{ asset('storage/datakabinet/' . $kabinet->ketua_kabinet) }} --}}
                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                <p class="font-semibold text-4xl">Ketua Kabinet</p>
                                <p class="text-2xl">Yodhimas Geffananda</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="hs-carousel-slide flex justify-center px-1">
                        <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0" data-modal-target="default-modal" data-modal-toggle="default-modal">
                            <img class="rounded-lg" src="{{ asset('assets/rioga.svg') }}" alt="Sekretaris Jenderal Kabinet">
                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                <p class="font-semibold text-4xl">Sekretaris Jenderal</p>
                                <p class="text-2xl">Rioga Natayuda</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="hs-carousel-slide flex justify-center px-1">
                        <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0" data-modal-target="default-modal" data-modal-toggle="default-modal">
                            <img class="rounded-lg" src="{{ asset('assets/risma.svg') }}" alt="Sekretaris 1 Kabinet">
                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                <p class="font-semibold text-4xl">Sekretaris 1</p>
                                <p class="text-2xl">Risma Saputri</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="hs-carousel-slide flex justify-center px-1">
                        <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0" data-modal-target="default-modal" data-modal-toggle="default-modal">
                            <img class="rounded-lg" src="{{ asset('assets/charizza.svg') }}" alt="Sekretaris 2 Kabinet">
                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                <p class="font-semibold text-4xl">Sekretaris 2</p>
                                <p class="text-2xl">Charizza Thunjung</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="hs-carousel-slide flex justify-center px-1">
                        <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0" data-modal-target="default-modal" data-modal-toggle="default-modal">
                            <img class="rounded-lg" src="{{ asset('assets/luthfi.svg') }}" alt="Bendahara 1 Kabinet">
                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                <p class="font-semibold text-4xl">Bendahara 1</p>
                                <p class="text-2xl">Luthfi Lisana</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="hs-carousel-slide flex justify-center px-1">
                        <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0" data-modal-target="default-modal" data-modal-toggle="default-modal">
                            <img class="rounded-lg" src="{{ asset('assets/marwah.svg') }}" alt="Bendahara 2 Kabinet">
                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                <p class="font-semibold text-4xl">Bendahara 2</p>
                                <p class="text-2xl">Marwah Kamila</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>

        </div>

        <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full rounded-l-xl text-dark backdrop-blur-sm bg-white/30">
        <span class="text-2xl" aria-hidden="true">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m15 18-6-6 6-6"></path>
            </svg>
        </span>
        <span class="sr-only">Previous</span>
        </button>
        <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full rounded-r-xl text-dark backdrop-blur-sm bg-white/30">
        <span class="sr-only">Next</span>
        <span class="text-2xl" aria-hidden="true">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
            </svg>
        </span>
        </button>
    </div>
    <!-- End Slider -->

    {{-- divisi --}}
    <div class="grid md:grid-cols-3 mx-8 my-16 lg:grid-cols-subgrid lg:grid-flow-col gap-4 items-center">
        @foreach ($dataDivisi as $index => $divisi)
            <div class="justify-items-center text-center">
                <img src="{{ asset('storage/datadivisi/' . $divisi->foto_sampul_divisi) }}" class="w-36 h-36 rounded-full" alt="divisi">
                <p class="mt-4 font-bold text-xl uppercase">{{ $divisi->nama_divisi }}</p>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center mb-32">
        <a href="{{ route('kabinet.struktur', $kabinet->id_kabinet) }}" type="button" class="text-white bg-black hover:bg-amara hover:text-black font-medium rounded-full text-sm px-5 py-2.5 text-center">
            Selengkapnya
        </a>
    </div>

    {{-- proker kabinet --}}
    <div class="text-center mt-40 mx-6 md:mx-auto max-w-2xl lg:max-w-4xl">
        <h2 class="teksWarnaKabinet mt-2 text-2xl md:text-4xl font-semibold uppercase">program kerja kabinet {{ $kabinet->nama_kabinet }}</h2>
    </div>
    <div class="grid grid-cols-1 justify-items-center gap-6 mx-8 mt-16 mb-40 md:grid-cols-2 lg:grid-cols-3">
        {{-- proker terakhir --}}
        @foreach($dataProker as $index => $proker)
        <div class="max-w-sm justify-center hover:bg-bg_aspiration duration-100 rounded-lg shadow-lg">
            <a href="{{ route('proker.show', $kabinet->id_kabinet) }}">
                <!-- Image -->
                <img class="rounded-t-lg w-full" src="{{ asset('assets/series_img1.svg') }}" alt="proker"/>

                <!-- Date and Category Section -->
                <div class="flex grid-cols-2 items-center justify-between px-4 pt-4">
                    <p class="text-judul_aspiration text-sm text-left">31 Agustus 2024</p>
                    <a href="{{ route('kabinet.struktur', $kabinet->id_kabinet) }}">
                        <div class="bg-judul_aspiration text-white rounded-xl px-3 py-1 text-xs text-center w-fit uppercase">
                            {{ $proker->divisi->nama_divisi }}
                        </div>
                    </a>
                </div>

                <!-- Title -->
                <h5 class="p-4 text-2xl font-semibold text-font uppercase">{{ $proker->judul_proker}}</h5>

                <!-- Description -->
                <p class="px-4 pb-4 font-normal text-font">
                    {{ $proker->deskripsi_proker }}
                </p>
            </a>
        </div>
        @endforeach
    </div>

    <!-- Documentation Section -->
    <div class="bg-black px-8 md:px-16 pt-8 pb-32 md:pt-32 text-center">
        <div class="mx-auto mt-8 mb-16 md:mb-24 max-w-2xl lg:max-w-4xl">
            <h2 class="teksWarnaKabinet text-2xl md:text-4xl font-semibold text-amara uppercase">Dokumentasi Terbaru</h2>
        </div>
        {{-- 12 images --}}
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div>
                <img class="h-32 md:h-48 lg:h-64 xl:h-80 w-full max-w-full rounded-lg object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="">
            </div>
            <div>
                <img class="h-32 md:h-48 lg:h-64 xl:h-80 w-full max-w-full rounded-lg object-cover" src="{{ asset('assets/pilihan_amara.svg') }}" alt="">
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
