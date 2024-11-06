@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="bg-white">
        {{-- description --}}
        <div class="bg-assets mx-0 py-24 px-32 text-center" data-aos="fade-up">
            <h2 class="mt-2 text-4xl font-bold text-white sm:text-5xl">About Us</h2>
            <p class="mt-6 text-l font-normal text-white sm:text-m">
                ASSETS atau Assosciation of Software Engineering Technology Students adalah sebuah himpunan mahasiswa program studi Teknologi Rekayasa Perangkat Lunak, Sekolah Vokasi, Universitas Gadjah Mada.
                ASSETS berdiri pada tahun 2020 dengan nama kabinet IRIS.
            </p>
        </div>

        {{-- specific description --}}
        <div class="text-center my-32 mx-32 w-434">
            <img src="assets/assets_logo.svg" class="w-full h-full" alt="Assets Logo">
        </div>
        <div class="grid grid-cols-12 max-w-screen-xl px-16 py-8 mx-auto">
            <div class="col-span-12 text-center my-8 me-16 md:col-span-5">
                <img src="assets/assets_logo.svg" class="w-full h-full" alt="Assets Logo">
            </div>
            <div class="col-span-12 my-8 md:col-span-7">
                <h1 class="max-w-xl mb-4 mt-4 text-xl font-semibold text-assets">Makna</h1>
                <p class="max-w-l mb-6 font-light text-assets lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
                <h1 class="max-w-xl mb-4 mt-4 text-xl font-semibold text-assets">Visi</h1>
                <p class="max-w-l mb-6 font-light text-assets lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
                <h1 class="max-w-xl mb-4 mt-4 text-xl font-semibold text-assets">Misi</h1>
                <p class="max-w-l mb-6 font-light text-assets lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
            </div>
        </div>

        {{-- form aspirasi --}}
        <div class="container bg-assets rounded-2xl shadow-lg sm:mx-auto my-16 px-16 py-4">
            <h2 class="m-4 text-4xl font-bold text-white text-center sm:text-5xl">Aspirasi</h2>
            <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium iusto, quod tenetur sunt cupiditate ut porro nulla esse ex. Cum pariatur similique beatae totam iure voluptatem natus iste. Blanditiis, architecto.</p>
            <div class="container bg-white rounded-2xl shadow-lg mx-auto my-16 p-8">
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-semibold text-base text-assets">Dari</label>
                    <input type="text" id="dari" class="block w-full p-2.5 shadow-sm text-base bg-white border border-second_a text-assets rounded-lg focus:ring-assets focus:border-assets " placeholder="Isikan Nama Anda"/>
                </div>
                <div class="mb-5">
                    <label for="subject" class="block mb-2 font-semibold text-base text-assets">Subyek</label>
                    <input type="text" id="dari" class="block w-full p-2.5 shadow-sm text-base bg-white border border-second_a text-assets rounded-lg focus:ring-assets focus:border-assets " placeholder="Isikan Subject Pesan Anda"/>
                </div>
                <form class="mb-5">
                    <label for="message" class="block mb-2 text-base font-medium text-assets">Pesan Anda</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full shadow-sm text-base text-assets bg-white border border-second_a rounded-lg focus:ring-assets focus:border-assets" placeholder="Tuliskan Pesan Anda..."></textarea>
                </form>
                <button type="submit" class="text-white bg-second_a hover:bg-assets font-medium rounded-lg text-sm px-5 py-2.5 text-center">Kirim</button>
            </div>
        </div>
        <div class="container grid bg-assets rounded-2xl shadow-lg sm:mx-auto my-16 px-16 py-4">
            <div class="container bg-white rounded-2xl shadow-lg mx-auto my-16 p-8">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Saya</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Semoga yang disemogakan tersemogakan</p>

        </div>
    </div>
@endsection
