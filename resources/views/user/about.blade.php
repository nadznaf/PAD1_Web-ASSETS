@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="bg-white p-6 shadow-lg">
        <div class="mx-auto px-6 max-w-2xl text-center lg:max-w-4xl">
            <h2 class="mt-2 text-4xl font-bold tracking-tight text-assets sm:text-5xl">About Us</h2>
            <p class="mt-6 text-l font-normal tracking-tight text-assets sm:text-m">
                ASSETS atau Assosciation of Software Engineering Technology Students adalah sebuah himpunan mahasiswa program studi Teknologi Rekayasa Perangkat Lunak, Sekolah Vokasi, Universitas Gadjah Mada.
                ASSETS berdiri pada tahun 2020 dengan nama kabinet IRIS.
            </p>
        </div>
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
            <div class="hidden me-16 lg:mt-0 lg:col-span-5 lg:flex">
                <img src="assets/assets_logo.svg" class="w-full h-200" alt="Assets Logo">
            </div>
            <div class="place-self-center lg:col-span-7">
                <h1 class="max-w-xl mb-4 mt-4 text-xl font-semibold text-assets">Makna</h1>
                <p class="max-w-l mb-6 font-light text-assets lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
                <h1 class="max-w-xl mb-4 mt-4 text-xl font-semibold text-assets">visi</h1>
                <p class="max-w-l mb-6 font-light text-assets lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
                <h1 class="max-w-xl mb-4 mt-4 text-xl font-semibold text-assets">Misi</h1>
                <p class="max-w-l mb-6 font-light text-assets lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
            </div>
        </div>
    </div>
@endsection
