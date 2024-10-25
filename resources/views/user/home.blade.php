@extends('layouts.app')
@section('title', 'Home')
@section('content')
{{-- Banner start --}}
<section class="relative isolate bg-white py-16 sm:py-20">
    <div class="absolute inset-x-0 -top-3 -z-10 transform-gpu overflow-hidden px-36 blur-3xl" aria-hidden="true">
        <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-assets to-second_a opacity-30"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>

    <div class="grid max-w-screen-2xl py-8 lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mx-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-assets">ASSETS UGM</h1>
            <p class="max-w-2xl mb-6 font-semibold text-assets lg:mb-8 md:text-lg lg:text-xl">Associaton of Software Engineering Technology Students</p>
            <p class="max-w-2xl mb-6 font-light text-assets lg:mb-8 md:text-lg lg:text-xl">Assocation Student of Teknologi Rekayasa Perangkat Lunak <br> Sekolah Vokasi Universitas Gadjah Mada.<br>Small Organization BIG Impact.</p>
            <a href="{{ route('about') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-assets hover:bg-primary-800 focus:ring-4 focus:ring-primary-300">
                See more
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="assets/home_assets.svg" class="rounded-l-xxl shadow-lg" alt="mockup">
        </div>
    </div>
</section>
{{-- Banner end --}}

{{-- Carousel start --}}
<div class="relative isolate bg-white px-0 py-24 sm:py-32">
    <div class="absolute inset-x-0 -top-3 -z-10 transform-gpu overflow-hidden px-36 blur-3xl" aria-hidden="true">
        <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-assets to-second_a opacity-30"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>
    <div class="mx-auto px-6 max-w-2xl text-center lg:max-w-4xl">
        <h2 class="mt-2 text-4xl font-bold tracking-tight text-assets sm:text-5xl">Kabinet</h2>
        <p class="mt-6 text-l font-bold tracking-tight text-assets sm:text-xl">
            Choose a Cabinet to learn more about ASSETS
        </p>
    </div>
    <p class="mx-auto mt-2 max-w-2xl text-center text-lg leading-8 text-gray-400">
        Each year, ASSETS organizes a Cabinet dedicated to making TRPL a better place for students and the surrounding community.
    </p>
    <div class="flex flex-row flex-nowrap max-w-screen-2xl mx-0 mt-16 justify-between">
        <figure class="basis-1/3 max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
            <a href="{{ route('kabinet') }}">
                <img class="rounded-xl" src="assets/catalog_amara.svg" alt="Kabinet Amara">
            </a>
            <figcaption class="absolute px-4 text-lg text-white bottom-6">
                <p>Kabinet Amara</p>
            </figcaption>
        </figure>
        <figure class="basis-1/3 max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
            <a href="#">
                <img class="rounded-xl" src="assets/catalog_amara.svg" alt="Kabinet Amara">
            </a>
            <figcaption class="absolute px-4 text-lg text-white bottom-6">
                <p>Kabinet Amara</p>
            </figcaption>
        </figure>
        <figure class="basis-1/3 max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
            <a href="#">
                <img class="rounded-xl" src="assets/catalog_amara.svg" alt="Kabinet Amara">
            </a>
            <figcaption class="absolute px-4 text-lg text-white bottom-6">
                <p>Kabinet Amara</p>
            </figcaption>
        </figure>
    </div>
</div>



<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden rounded-xl duration-700 ease-in-out" data-carousel-item>
            <img src="assets/catalog_amara.svg" class="absolute block rounded-2xl transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="assets/catalog_amara.svg" class="absolute block rounded-2xl transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="assets/catalog_amara.svg" class="absolute block rounded-2xl transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="assets/catalog_amara.svg" class="absolute block rounded-2xl transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="assets/catalog_amara.svg" class="absolute block rounded-2xl transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute bg-assets top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute bg-assets top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

{{-- Carousel end --}}

{{-- Activities start --}}
<section class="bg-white">
    <div class="mx-auto mt-20 py-16 px-6 max-w-2xl text-center lg:max-w-4xl">
        <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-assets sm:text-5xl">New Activities</h2>
    </div>
    <div class="container mx-auto border-assets border-2 rounded-2xl shadow-lg">
        <div class="grid max-w-screen-xl px-4 py-8 mx-8 lg:gap-8 xl:gap-0 lg:grid-cols-12">
            <div class="bg-local me-8 lg:mt-0 lg:col-span-5 lg:flex">
                <img src="assets/article1.jpeg" alt="mockup">
            </div>
            <div class="block place-self-center lg:col-span-7">

                <h1 class="max-w-xl mb-4 mt-4 text-xl font-semibold text-assets">Mahasiswa TRPL Raih Juara 1 dalam Bidang Data Science pada ICONIC IT 2024</h1>
                <p class="max-w-l mb-6 font-light text-assets lg:mb-8 md:text-m lg:text-l">Pada 24 September 2024, tiga mahasiswa Universitas Gadjah Mada dari program studi Teknologi Rekayasa Perangkat Lunak (TRPL) dan Ilmu Komputer berhasil meraih juara 1 (Data Science) dalam kompetisi ICONIC IT 2024 yang diselenggarakan oleh Fakultas Teknik Universitas Siliwangi. Prestasi ini menjadi bukti kemampuan dan kreativitas yang luar biasa dalam bidang teknologi informasi yang ditunjukkan oleh Tim HaloRek, yang terdiri dari Dwi Anggara Najwan Sugama (TRPL 2023), Muhammad Natha Ulinnuha (Ilmu Komputer 2023), dan Naufal Afif Bauw (Ilmu Komputer 2023).</p>

                <a href="{{ route('detailArtikel') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-second_a hover:bg-assets focus:ring-4 focus:ring-primary-300">
                    Artikel
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
    </div>
    <div class="container mx-auto my-16 border-assets border-2 rounded-2xl shadow-lg">
        <div class="grid max-w-screen-xl px-4 py-8 mx-8 lg:gap-8 xl:gap-0 lg:grid-cols-12">
            <div class="block me-8 place-self-center lg:col-span-7">

                <h1 class="max-w-xl mb-4 mt-4 text-xl font-semibold text-assets">Mahasiswa TRPL Raih Juara 1 dalam Bidang Data Science pada ICONIC IT 2024</h1>
                <p class="max-w-l mb-6 font-light text-assets lg:mb-8 md:text-m lg:text-l">Pada 24 September 2024, tiga mahasiswa Universitas Gadjah Mada dari program studi Teknologi Rekayasa Perangkat Lunak (TRPL) dan Ilmu Komputer berhasil meraih juara 1 (Data Science) dalam kompetisi ICONIC IT 2024 yang diselenggarakan oleh Fakultas Teknik Universitas Siliwangi. Prestasi ini menjadi bukti kemampuan dan kreativitas yang luar biasa dalam bidang teknologi informasi yang ditunjukkan oleh Tim HaloRek, yang terdiri dari Dwi Anggara Najwan Sugama (TRPL 2023), Muhammad Natha Ulinnuha (Ilmu Komputer 2023), dan Naufal Afif Bauw (Ilmu Komputer 2023).</p>

                <a href="{{ route('detailArtikel') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-second_a hover:bg-assets focus:ring-4 focus:ring-primary-300">
                    Artikel
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="bg-local lg:mt-0 lg:col-span-5 lg:flex">
                <img src="assets/article1.jpeg" alt="mockup">
            </div>
        </div>
    </div>
    <div class="flex flex-row justify-center my-16">
        <a href="{{ route('artikel') }}" class="flex justify-center w-36 px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-second_a hover:bg-assets focus:ring-4 focus:ring-primary-300">
            More
            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>

</section>



{{-- Activities end --}}




@endsection
