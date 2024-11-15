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
            <div class="mx-auto place-self-center pl-8 lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-assets">ASSETS UGM</h1>
                <p class="max-w-2xl mb-6 font-semibold text-assets lg:mb-8 md:text-lg lg:text-xl">Associaton of Software Engineering Technology Students</p>
                <p class="max-w-2xl mb-6 font-light text-assets lg:mb-8 md:text-lg lg:text-xl">Association Student of Teknologi Rekayasa Perangkat Lunak <br> Sekolah Vokasi Universitas Gadjah Mada.<br>Small Organization BIG Impact.</p>
                <a href="{{ route('about') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-assets hover:bg-primary-800 focus:ring-4 focus:ring-primary-300">
                    Selengkapnya
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('assets/home_assets.svg') }}" class="rounded-l-xxl shadow-lg" alt="mockup">
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
        <div class="mx-auto px-6 max-w-2xl text-center lg:max-w-4xl">
            <h2 class="mt-2 text-4xl font-bold text-assets sm:text-5xl">Kabinet</h2>
            <p class="mt-6 text-l font-bold tracking-tight text-assets sm:text-xl">
                Choose a Cabinet to learn more about ASSETS
            </p>
        </div>
        <p class="mx-auto mt-2 max-w-2xl text-center text-lg leading-8 text-gray-400">
            Each year, ASSETS organizes a Cabinet dedicated to making TRPL a better place for students and the surrounding community.
        </p>
        <div class="grid grid-cols-1 mx-8 mb-16 md:grid-cols-3 md:gap-6 max-w-screen-2xl md:mx-16 mt-16">
            <figure class="max-w-sm mb-16 transition-all rounded-xl duration-300 cursor-pointer filter grayscale bg-gradient-to-b from-black to-amara hover:grayscale-0">
                <a href="/kabinet/2">
                    <img src="{{ asset('assets/pilihan_orion.svg') }}" alt="Kabinet ">
                </a>
            </figure>
            <figure class="max-w-sm mb-16 transition-all rounded-xl duration-300 cursor-pointer filter grayscale bg-gradient-to-b from-black to-amara hover:grayscale-0">
                <a href="/kabinet/1">
                    <img src="{{ asset('assets/pilihan_amara.svg') }}" alt="Kabinet ">
                </a>
            </figure>
            <figure class="max-w-sm mb-16 transition-all rounded-xl duration-300 cursor-pointer filter grayscale bg-gradient-to-b from-black to-amara hover:grayscale-0">
                <a href="/kabinet/3">
                    <img src="{{ asset('assets/pilihan_iris.svg') }}" alt="Kabinet ">
                </a>
            </figure>
        </div>

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
        <div class="mx-auto mt-16 py-8 px-6 max-w-2xl text-center lg:max-w-4xl">
            <h2 class="mt-2 text-4xl font-extrabold text-assets">Program Kerja Terbaru</h2>
        </div>
        <a href="{{ route('proker') }}" class="flex flex-col items-center mb-8 bg-white rounded-lg md:flex-row md:max-w-full md:m-8 hover:bg-gray-100">
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('assets/series_img1.svg') }}" alt="Proker's pict">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <p class="mb-8 font-normal text-second_a">Bulan</p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-assets">Nama Proker</h5>
                <p class="mb-3 font-normal text-second_a">Deskripsi proker. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
            </div>
        </a>
        <a href="{{ route('proker') }}" class="flex flex-col-reverse items-center mb-8 bg-white rounded-lg md:flex-row md:max-w-full md:m-8 hover:bg-gray-100">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <p class="mb-8 font-normal text-second_a">Bulan</p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-assets">Nama Proker</h5>
                <p class="mb-3 font-normal text-second_a">Deskripsi proker. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
            </div>
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('assets/series_img1.svg') }}" alt="Proker's pict">
        </a>
    </div>
    {{-- Newest Proker End --}}

    {{-- Newest Article Start --}}
    <div class="p-8 md:p-16">
        <div class="mx-auto py-8 px-6 max-w-2xl text-center lg:max-w-4xl">
            <h2 class="mt-2 text-4xl font-extrabold text-assets">Artikel Terbaru</h2>
        </div>
        <a href="{{ route('proker') }}" class="flex flex-col items-center mb-8 bg-white rounded-lg md:flex-row md:max-w-full md:m-8 hover:bg-gray-100">
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('assets/article1.jpeg') }}" alt="Artikel's pict">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <p class="mb-8 font-normal text-second_a">Tanggal publish</p>
                <h5 class="mb-2 text-2xl font-bold text-assets">Judul Artikel</h5>
                <p class="mb-3 font-normal text-second_a">Deskripsi artikel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
            </div>
        </a>
        <a href="{{ route('proker') }}" class="flex flex-col-reverse items-center mb-8 bg-white rounded-lg md:flex-row md:max-w-full md:m-8 hover:bg-gray-100">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <p class="mb-8 font-normal text-second_a">Tanggal publish</p>
                <h5 class="mb-2 text-2xl font-bold text-assets">Judul Artikel</h5>
                <p class="mb-3 font-normal text-second_a">Deskripsi artikel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
            </div>
            <img class="object-cover w-full h-80 rounded-lg md:w-1/2" src="{{ asset('assets/article1.jpeg') }}" alt="Artikel's pict">
        </a>
    </div>
    {{-- Newest Article End --}}

    {{-- Aspiration Cards Start --}}
    <div class="mx-auto py-8 px-6 max-w-2xl text-center lg:max-w-4xl">
        <h2 class="mt-2 text-4xl font-extrabold text-assets">Aspirasi</h2>
    </div>
    <div class="p-16">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-4">
            {{-- foreach --}}
            <div class="flex flex-col bg-bg_aspiration border border-second_a shadow-md rounded-xl">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block shrink-0 size-[40px] rounded-full" src="{{ asset('assets/profile.svg') }}" alt="Avatar" aria-placeholder="black">
                            <div class="ms-3">
                                <h3 class="font-semibold text-black text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="flex flex-col bg-bg_aspiration border border-second_a shadow-md rounded-xl">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block shrink-0 size-[40px] rounded-full" src="{{ asset('assets/profile.svg') }}" alt="Avatar" aria-placeholder="black">
                            <div class="ms-3">
                                <h3 class="font-semibold text-black text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="flex flex-col bg-bg_aspiration border border-second_a shadow-md rounded-xl">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block shrink-0 size-[40px] rounded-full" src="{{ asset('assets/profile.svg') }}" alt="Avatar" aria-placeholder="black">
                            <div class="ms-3">
                                <h3 class="font-semibold text-black text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="flex flex-col bg-bg_aspiration border border-second_a shadow-md rounded-xl">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block shrink-0 size-[40px] rounded-full" src="{{ asset('assets/profile.svg') }}" alt="Avatar" aria-placeholder="black">
                            <div class="ms-3">
                                <h3 class="font-semibold text-black text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="flex flex-col bg-bg_aspiration border border-second_a shadow-md rounded-xl">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block shrink-0 size-[40px] rounded-full" src="{{ asset('assets/profile.svg') }}" alt="Avatar" aria-placeholder="black">
                            <div class="ms-3">
                                <h3 class="font-semibold text-black text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black text-center font-light">
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
