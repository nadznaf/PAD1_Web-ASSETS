@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <div class="bg-white">
        {{-- deskripsi umum assets --}}
        <div class="bg-assets mx-0 py-24 px-8 text-center md:px-32">
            <h2 class="mt-2 text-4xl font-bold text-white sm:text-5xl">Tentang Kami</h2>
            <p class="mt-6 text-l font-normal text-white sm:text-m">
                ASSETS atau Assosciation of Software Engineering Technology Students merupakan sebuah himpunan mahasiswa program studi Teknologi Rekayasa Perangkat Lunak, Sekolah Vokasi, Universitas Gadjah Mada.
                ASSETS berdiri pada tahun 2020 dengan nama kabinet IRIS. Sebagai humpunan yang membantu prodi dalam menyejahterakan mahasiswanya.
            </p>
        </div>

        {{-- deskripsi makna visi misi assets --}}
        <div class="flex justify-center mt-32 px-8">
            <img src="{{ asset('assets/assets_logo.svg') }}" class="w-434 h-103" alt="Assets Logo">
        </div>
        <div class="grid grid-cols-2 gap-8 mt-16 mx-8 md:mx-32">
            <div class="col-span-2">
                <h1 class="my-4 text-xl font-semibold text-assets">Makna</h1>
                <p class="mb-6 text-assets text-justify">Setiap tahun, ASSETS membentuk sebuah Kabinet yang didedikasikan untuk menjadikan TRPL sebagai tempat yang lebih baik bagi para siswa dan sekitarnya</p>
            </div>
            <div class="col-span-2 md:col-span-1">
                <h1 class="my-4 text-xl font-semibold text-assets">Visi</h1>
                <p class="mb-6 text-assets text-justify">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
            </div>
            <div class="col-span-2 md:col-span-1">
                <h1 class="my-4 text-xl font-semibold text-assets">Misi</h1>
                <p class="mb-6 text-assets text-justify">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
            </div>
        </div>

        {{-- form aspirasi --}}
        <div class="bg-assets py-16 px-8 md:px-32 mt-16">
            <h2 class="m-4 text-4xl font-bold text-white text-center">Aspirasi</h2>
            <p class="text-white text-center font-semibold text-lg">Suarakan Aspirasimu</p>
            <p class="text-white text-center text-base">Tuliskan pesan yang membangun dan dapat bermanfaat bagi perkembangan ASSETS. Pastikan pesan tidak mengandung SARA.</p>
            <div class=" bg-white rounded-2xl shadow-lg mx-auto my-16 p-8">
                <p class="text-dark font-bold text-2xl mb-4">Pesan</p>
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-semibold text-base text-assets">Pengirim</label>
                    <input type="text" id="dari" class="block w-full p-2.5 shadow-sm text-base bg-white border border-second_a text-assets rounded-lg focus:ring-assets focus:border-assets " placeholder="Isikan Nama Anda"/>
                </div>
                <div class="mb-5">
                    <label for="subject" class="block mb-2 font-semibold text-base text-assets">Judul</label>
                    <input type="text" id="dari" class="block w-full p-2.5 shadow-sm text-base bg-white border border-second_a text-assets rounded-lg focus:ring-assets focus:border-assets " placeholder="Isikan Judul Pesan Anda"/>
                </div>
                <form class="mb-5">
                    <label for="message" class="block mb-2 text-base font-medium text-assets">Pesan Anda</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full shadow-sm text-base text-assets bg-white border border-second_a rounded-lg focus:ring-assets focus:border-assets" placeholder="Tuliskan Pesan Anda..."></textarea>
                </form>
                <div class="flex justify-center">
                    <button type="submit" class="text-white bg-second_a hover:bg-assets font-medium rounded-full text-sm px-5 py-2.5 text-center">Kirim Aspirasi</button>
                </div>
            </div>
        </div>

        {{-- card aspirasi --}}
        <div class="grid grid-cols-1 gap-6 my-24 mx-4 md:grid-cols-3 md:gap-6 lg:mx-32">
            {{-- foreach --}}
            <div class="group flex flex-col bg-bg_aspiration border-2 hover:border-4 border-border_aspiration hover:bg-assets shadow-md rounded-xl">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block shrink-0 size-[40px] rounded-full" src="{{ asset('assets/profile.svg') }}" alt="Avatar">
                            <div class="ms-3">
                                <h3 class="font-semibold text-black group-hover:text-white text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black group-hover:text-white text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="group flex flex-col bg-bg_aspiration border-2 hover:border-4 border-border_aspiration hover:bg-assets shadow-md rounded-xl">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block shrink-0 size-[40px] rounded-full" src="{{ asset('assets/profile.svg') }}" alt="Avatar">
                            <div class="ms-3">
                                <h3 class="font-semibold text-black group-hover:text-white text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black group-hover:text-white text-center font-light">
                        "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quod eveniet dolore provident at consequuntur maxime adipisci. Ipsa ad consectetur quis, quibusdam nam harum laborum atque qui neque adipisci molestiae?."
                    </p>
                </div>
            </div>

            <div class="group flex flex-col bg-bg_aspiration border-2 hover:border-4 border-border_aspiration hover:bg-assets shadow-md rounded-xl">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block shrink-0 size-[40px] rounded-full" src="{{ asset('assets/profile.svg') }}" alt="Avatar">
                            <div class="ms-3">
                                <h3 class="font-semibold text-black group-hover:text-white text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black group-hover:text-white text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="group flex flex-col bg-bg_aspiration border-2 hover:border-4 border-border_aspiration hover:bg-assets shadow-md rounded-xl">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block shrink-0 size-[40px] rounded-full" src="{{ asset('assets/profile.svg') }}" alt="Avatar">
                            <div class="ms-3">
                                <h3 class="font-semibold text-black group-hover:text-white text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black group-hover:text-white text-center font-light">
                            "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="group flex flex-col bg-bg_aspiration border-2 hover:border-4 border-border_aspiration hover:bg-assets shadow-md rounded-xl">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block shrink-0 size-[40px] rounded-full" src="{{ asset('assets/profile.svg') }}" alt="Avatar">
                            <div class="ms-3">
                                <h3 class="font-semibold text-black group-hover:text-white text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black group-hover:text-white text-center font-light">
                        "With supporting text below as a natural lead-in to additional content."
                    </p>
                </div>
            </div>

            <div class="group flex flex-col bg-bg_aspiration border-2 hover:border-4 border-border_aspiration hover:bg-assets shadow-md rounded-xl">
                <div class="p-4 md:p-7">
                    <div class="shrink-0 group block">
                        <div class="flex items-center">
                            <img class="inline-block shrink-0 size-[40px] rounded-full" src="{{ asset('assets/profile.svg') }}" alt="Avatar">
                            <div class="ms-3">
                                <h3 class="font-semibold text-black group-hover:text-white text-base">Nama</h3>
                                <p class="text-xs font-medium text-judul_aspiration uppercase">judul</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-black group-hover:text-white text-center font-light">
                        "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quod eveniet dolore provident at consequuntur maxime adipisci. Ipsa ad consectetur quis, quibusdam nam harum laborum atque qui neque adipisci molestiae?."
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
