@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
<section class="bg-white">
    <div class="mx-auto mt-20 py-16 px-6 max-w-2xl text-center lg:max-w-4xl">
        <h2 class="mt-2 text-4xl font-extrabold text-assets sm:text-5xl">Artikel</h2>
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
    <div class="container mx-auto my-16 border-assets border-2 rounded-2xl shadow-lg">
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
</section>
@endsection

