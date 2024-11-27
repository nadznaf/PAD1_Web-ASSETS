@extends('layouts.app')

@section('title', 'Home')

@section('content')
<style>

</style>

<div class="bg-white">
    {{-- Banner start --}}
    <section class="relative isolate bg-white pt-8 pb-40">
        {{-- background gradient --}}
        <div class="absolute inset-x-0 -top-3 -z-10 transform-gpu overflow-hidden blur-3xl" aria-hidden="true">
            <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-assets to-second_a opacity-30"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>

        {{-- assets banner --}}
        <div class="grid lg:gap-8 lg:grid-cols-12">
            <div class="mx-auto place-self-center pl-8 lg:col-span-7" data-aos="fade-right">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-assets">ASSETS UGM</h1>
                <p class="max-w-2xl mb-6 font-semibold text-assets lg:mb-8 md:text-lg lg:text-xl">Associaton of Software Engineering Technology Students</p>
                <p class="max-w-2xl mb-6 font-light text-assets lg:mb-8 md:text-lg lg:text-xl">Association Student of Teknologi Rekayasa Perangkat Lunak <br> Sekolah Vokasi Universitas Gadjah Mada.<br>Small Organization BIG Impact.</p>
                <a href="{{ route('about') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-assets hover:bg-second_a focus:ring-4 focus:ring-primary-300">
                    Selengkapnya
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('assets/home_assets.svg') }}" class="rounded-l-xxl shadow-lg" alt="mockup" data-aos="fade-left">
            </div>
        </div>
    </section>
    {{-- Banner end --}}

    {{-- Pilih kabinet start --}}
    <div class="relative isolate bg-white px-0 py-32">
        {{-- background gradient --}}
        <div class="absolute inset-x-0 -top-3 -z-10 transform-gpu overflow-hidden px-36 blur-3xl" aria-hidden="true">
            <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-assets to-second_a opacity-30"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto px-6 mb-8 max-w-2xl text-center lg:max-w-4xl" data-aos="fade-up" data-aos-duration="300">
            <h2 class="mt-2 text-4xl font-bold text-assets sm:text-5xl">Kabinet</h2>
            <p class="mt-6 text-l font-bold tracking-tight text-assets sm:text-xl">
                Choose a Cabinet to learn more about ASSETS
            </p>
            <p class="mx-auto mt-2 max-w-2xl text-center text-lg leading-8 text-gray-400">
                Each year, ASSETS organizes a Cabinet dedicated to making TRPL a better place for students and the surrounding community.
            </p>
        </div>

        <!-- Slider carousel kabinet -->
        <div data-hs-carousel='{
            "loadingClasses": "opacity-0",
            "dotsItemClasses": "hs-carousel-active:bg-second_a hs-carousel-active:border-second_a size-4 border border-second_a rounded-full cursor-pointer",
            "isCentered": true,
            "slidesQty": {
            "xs": 1,
            "lg": 2
            }
        }' class="relative">
            <div class="hs-carousel h-full overflow-hidden">
                <div class="relative min-h-72 -mx-1">
                    <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                        <div class="hs-carousel-slide px-1 justify-center flex">
                            <a href="/kabinet/3">
                                <img src="{{ asset('assets/pilihan_iris.svg') }}" alt="Kabinet" class="w-fit h-full object-cover filter grayscale hover:grayscale-0">
                            </a>
                        </div>
                        <div class="hs-carousel-slide px-1 justify-center flex">
                            <a href="/kabinet/2">
                                <img src="{{ asset('assets/pilihan_orion.svg') }}" alt="Kabinet" class="w-fit h-full object-cover filter grayscale hover:grayscale-0">
                            </a>
                        </div>
                        <div class="hs-carousel-slide px-1 justify-center flex">
                            <a href="/kabinet/1">
                                <img src="{{ asset('assets/pilihan_amara.svg') }}" alt="Kabinet" class="w-fit h-full object-cover filter grayscale hover:grayscale-0">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 flex items-center justify-center w-[46px] h-full rounded-r-xl text-dark backdrop-blur-sm bg-white/30">
            <span class="text-2xl" aria-hidden="true">
                <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"></path>
                </svg>
            </span>
            <span class="sr-only">Previous</span>
            </button>
            <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 flex items-center justify-center w-[46px] h-full rounded-l-xl text-dark backdrop-blur-sm bg-white/30">
            <span class="sr-only">Next</span>
            <span class="text-2xl" aria-hidden="true">
                <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
                </svg>
            </span>
            </button>

            <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2"></div>
        </div>
        <!-- End Slider -->

            {{-- @foreach($dataKabinet as $index => $kabinet)
            <figure class="basis-1/3 max-w-sm transition-all duration-300 cursor-pointer filter grayscale bg-gradient-to-b from-black to-amara hover:grayscale-0">
                <div class="bg-gradient-to-b from-black to-amara "></div>
                <a href="{{ route('kabinet') }}">
                    <img class="rounded-xl" src="{{ asset('storage/datakabinet/' . $kabinet->foto_sampul_kabinet) }}" alt="Kabinet">
                </a>
                <figcaption class="absolute px-4 text-lg text-white bottom-6">
                    <p>Kabinet Amara</p>
                </figcaption>
            </figure>
            @endforeach --}}
    </div>


    {{-- Pilih kabinet end --}}

    {{-- Newest Proker Start --}}
    <div class="p-8 md:p-16">
        <div class="mx-auto mt-16 py-8 px-6 max-w-2xl text-center lg:max-w-4xl" data-aos="fade-up" data-aos-duration="300">
            <h2 class="mt-2 text-4xl font-extrabold text-assets">Program Kerja Terbaru</h2>
        </div>
        <a href="{{ route('proker') }}" class="flex flex-col items-center mb-8 bg-white rounded-lg md:flex-row md:max-w-full md:m-8" data-aos="fade-left" data-aos-duration="3000">
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('assets/series_img1.svg') }}" alt="Proker's pict">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <p class="mb-8 font-normal text-second_a">Bulan</p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-assets hover:text-dark hover:underline">Nama Proker</h5>
                <p class="mb-3 font-normal text-second_a">Deskripsi proker. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
            </div>
        </a>
        <a href="{{ route('proker') }}" class="flex flex-col-reverse items-center mb-8 bg-white rounded-lg md:flex-row md:max-w-full md:m-8" data-aos="fade-right" data-aos-duration="3000">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <p class="mb-8 font-normal text-second_a">Bulan</p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-assets hover:text-dark hover:underline">Nama Proker</h5>
                <p class="mb-3 font-normal text-second_a">Deskripsi proker. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
            </div>
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('assets/series_img1.svg') }}" alt="Proker's pict">
        </a>
    </div>
    {{-- Newest Proker End --}}

    {{-- Newest Article Start --}}
    <div class="p-8 md:p-16">
        <div class="mx-auto py-8 px-6 max-w-2xl text-center lg:max-w-4xl" data-aos="fade-up" data-aos-duration="300">
            <h2 class="mt-2 text-4xl font-extrabold text-assets">Artikel Terbaru</h2>
        </div>
        <a href="{{ route('detailArtikel') }}" class="flex flex-col items-center mb-8 bg-white rounded-lg md:flex-row md:max-w-full md:m-8" data-aos="fade-left" data-aos-duration="3000">
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('assets/article1.jpeg') }}" alt="Artikel's pict">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <p class="mb-8 font-normal text-second_a">Tanggal publish</p>
                <h5 class="mb-2 text-2xl font-bold text-assets hover:text-dark hover:underline">Judul Artikel</h5>
                <p class="mb-3 font-normal text-second_a">Deskripsi artikel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
            </div>
        </a>
        <a href="{{ route('detailArtikel') }}" class="flex flex-col-reverse items-center mb-8 bg-white rounded-lg md:flex-row md:max-w-full md:m-8" data-aos="fade-right" data-aos-duration="3000">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <p class="mb-8 font-normal text-second_a">Tanggal publish</p>
                <h5 class="mb-2 text-2xl font-bold text-assets hover:text-dark hover:underline">Judul Artikel</h5>
                <p class="mb-3 font-normal text-second_a">Deskripsi artikel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
            </div>
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('assets/article1.jpeg') }}" alt="Artikel's pict">
        </a>
    </div>
    {{-- Newest Article End --}}

    {{-- Aspiration Cards Start --}}
    <div class="mx-auto py-8 px-6 max-w-2xl text-center lg:max-w-4xl" data-aos="fade-up" data-aos-duration="300">
        <h2 class="mt-2 text-4xl font-extrabold text-assets">Aspirasi</h2>
    </div>
    <div class="p-16">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-4">
            {{-- foreach --}}
            <div class="group flex flex-col bg-bg_aspiration border-2 border-border_aspiration hover:bg-second_a shadow-md rounded-xl" data-aos="fade-up" data-aos-duration="3000">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                            </svg>
                            <div class="ms-3">
                                <h3 class="font-semibold text-black group-hover:text-white text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration group-hover:text-dark uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black group-hover:text-white text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="group flex flex-col bg-bg_aspiration border-2 border-border_aspiration hover:bg-second_a shadow-md rounded-xl" data-aos="fade-up" data-aos-duration="3000">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                            </svg>
                            <div class="ms-3">
                                <h3 class="font-semibold text-black group-hover:text-white text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration group-hover:text-dark uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black group-hover:text-white text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="group flex flex-col bg-bg_aspiration border-2 border-border_aspiration hover:bg-second_a shadow-md rounded-xl" data-aos="fade-up" data-aos-duration="3000">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                            </svg>
                            <div class="ms-3">
                                <h3 class="font-semibold text-black group-hover:text-white text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration group-hover:text-dark uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black group-hover:text-white text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="group flex flex-col bg-bg_aspiration border-2 border-border_aspiration hover:bg-second_a shadow-md rounded-xl" data-aos="fade-up" data-aos-duration="3000">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                            </svg>
                            <div class="ms-3">
                                <h3 class="font-semibold text-black group-hover:text-white text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration group-hover:text-dark uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black group-hover:text-white text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="group flex flex-col bg-bg_aspiration border-2 border-border_aspiration hover:bg-second_a shadow-md rounded-xl" data-aos="fade-up" data-aos-duration="3000">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <svg class="w-10 h-10 text-dark group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                            </svg>
                            <div class="ms-3">
                                <h3 class="font-semibold text-black group-hover:text-white text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration group-hover:text-dark uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black group-hover:text-white text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

        </div>
        <div class="flex justify-center mt-16">
            <a href="{{ route('about') }}" type="button" class="text-white bg-second_a hover:bg-assets font-medium rounded-full text-sm px-5 py-2.5 text-center">
                Kirim Aspirasi
            </a>
        </div>
    </div>
    {{-- Aspiration Cards End --}}


</div>
@endsection
