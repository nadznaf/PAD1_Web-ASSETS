@extends('layouts.app')

@section('title', 'Home')

@section('content')

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
            <div class="grid lg:gap-8 lg:grid-cols-12 px-8 md:px-0">
                <div class="mx-auto place-self-center lg:pl-8 lg:col-span-7" data-aos="fade-right">
                    <h1
                        class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-assets">
                        ASSETS UGM</h1>
                    <p class="max-w-2xl mb-6 font-semibold text-assets lg:mb-8 md:text-lg lg:text-xl">Associaton of Software
                        Engineering Technology Students</p>
                    <p class="max-w-2xl mb-6 font-light text-assets lg:mb-8 md:text-lg lg:text-xl">Himpunan Mahasiswa
                        Program Studi Teknologi Rekayasa Perangkat Lunak, Sekolah Vokasi, Universitas Gadjah Mada<br>"Small
                        Organization BIG Impact"</p>
                    <a href="{{ route('about') }}"
                        class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-assets hover:bg-second_a focus:ring-4 focus:ring-primary-300">
                        Selengkapnya
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="{{ asset('assets/home_assets.png') }}" class="rounded-l-xxl shadow-lg" alt="mockup"
                        data-aos="fade-left">
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
            <div class="mx-auto px-6 mb-24 max-w-2xl text-center lg:max-w-4xl" data-aos="fade-down"
                data-aos-duration="1000">
                <h2 class="mt-2 text-4xl font-bold text-font sm:text-5xl">Kabinet</h2>
                <p class="mt-6 text-l font-bold tracking-tight text-assets sm:text-xl">
                    Pilih Kabinet untuk mengetahui ASSETS lebih lanjut
                </p>
                <p class="mx-auto mt-2 max-w-2xl text-center text-lg leading-8 text-gray-400">
                    Setiap tahun, ASSETS membentuk Kabinet yang didedikasikan untuk membuat TRPL menjadi tempat yang lebih
                    baik bagi para mahasiswa dan lingkungan sekitar.
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
        }'
                class="relative">
                <div class="hs-carousel h-full overflow-hidden">
                    <div class="relative min-h-72 -mx-1">
                        <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0"
                            data-aos="fade-up" data-aos-duration="1000">
                            @isset($dataKabinet)
                                @foreach ($dataKabinet as $index => $kabinet)
                                    <div class="hs-carousel-slide cursor-zoom-in px-1 justify-center flex">
                                        <a href="{{ route('kabinet.show', $kabinet->id_kabinet) }}">
                                            <img src="{{ isset($kabinet->foto_sampul_kabinet) ? asset('storage/datakabinet/' . $kabinet->foto_sampul_kabinet) : asset('assets/pilihan_amara.svg') }}"
                                                alt="Kabinet"
                                                class="w-fit h-full object-cover filter grayscale hover:grayscale-0">
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center text-amara">Data kabinet belum tersedia.</p>
                            @endisset

                        </div>
                    </div>
                </div>

                <button type="button"
                    class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 flex items-center justify-center w-[46px] h-full rounded-r-xl text-dark backdrop-blur-sm bg-white/30">
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button"
                    class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 flex items-center justify-center w-[46px] h-full rounded-l-xl text-dark backdrop-blur-sm bg-white/30">
                    <span class="sr-only">Next</span>
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </span>
                </button>

                <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2"></div>
            </div>
            <!-- End Slider -->
        </div>


        {{-- Pilih kabinet end --}}

        {{-- Newest Proker Start --}}
        <div class="p-8 md:mx-24">
            <div class="mx-auto mt-16 py-8 px-6 max-w-2xl text-center lg:max-w-4xl" data-aos="fade-down"
                data-aos-duration="1000">
                <h2 class="mt-2 text-4xl font-bold text-font">Program Kerja Terbaru</h2>
            </div>
            @if (isset($prokerTerbaru) && count($prokerTerbaru) > 0)
                <a href="{{ route('proker.show', $prokerTerbaru[0]->id_proker) }}"
                    class="group flex flex-col md:items-center mt-16 mb-8 rounded-lg md:flex-row md:max-w-full"
                    data-aos="fade-left" data-aos-duration="3000">
                    <img class="object-cover w-full h-80 rounded-2xl md:w-2/5"
                        src="{{ $prokerTerbaru[0]->foto_sampul_proker ? asset('storage/dataproker/' . $prokerTerbaru[0]->foto_sampul_proker) : asset('assets/home_assets.png') }}"
                        alt="Proker">
                    <div class="flex flex-col justify-between p-4 md:ps-8 leading-normal md:w-3/5">
                        <p class="mb-8 font-semibold text-font">{{ $prokerTerbaru[0]->rentang_bulan }}</p>
                        <h5 class="mb-2 text-2xl font-bold text-assets group-hover:text-second_a uppercase">
                            {{ $prokerTerbaru[0]->judul_proker }}</h5>
                        <p class="deskripsiSingkat mb-3 font-normal text-description">
                            {{ $prokerTerbaru[0]->deskripsi_proker }}</p>
                    </div>
                </a>
                <a href="{{ route('proker.show', $prokerTerbaru[1]->id_proker) }}"
                    class="group flex flex-col-reverse md:items-center mt-16 mb-8 rounded-lg md:flex-row md:max-w-full"
                    data-aos="fade-right" data-aos-duration="3000">
                    <div class="flex flex-col justify-between p-4 md:pe-8 leading-normal md:w-3/5">
                        <p class="mb-8 font-semmibold text-font">{{ $prokerTerbaru[1]->rentang_bulan }}</p>
                        <h5 class="mb-2 text-2xl font-bold text-assets group-hover:text-second_a uppercase">
                            {{ $prokerTerbaru[1]->judul_proker }}</h5>
                        <p class="deskripsiSingkat mb-3 font-normal text-description">
                            {{ $prokerTerbaru[1]->deskripsi_proker }}</p>
                    </div>
                    <img class="object-cover w-full h-80 rounded-2xl md:w-2/5"
                        src="{{ $prokerTerbaru[1]->foto_sampul_proker ? asset('storage/dataproker/' . $prokerTerbaru[1]->foto_sampul_proker) : asset('assets/home_assets.png') }}"
                        alt="Proker">
                </a>
            @else
                <p class="text-center text-amara">Data program kerja belum tersedia.</p>
            @endif
        </div>
        {{-- Newest Proker End --}}

        {{-- Newest Article Start --}}
        <div class="p-8 md:mx-24">
            <div class="mx-auto mt-16 py-8 px-6 max-w-2xl text-center lg:max-w-4xl" data-aos="fade-down"
                data-aos-duration="1000">
                <h2 class="mt-2 text-4xl font-bold text-font">Artikel Terbaru</h2>
            </div>
            @if (isset($artikelTerbaru) && count($artikelTerbaru) > 0)
                <a href="{{ $artikelTerbaru[0]['link'] }}"
                    class="group flex flex-col md:items-center mt-16 mb-8 rounded-lg md:flex-row md:max-w-full"
                    data-aos="fade-left" data-aos-duration="3000">
                    <img class="object-cover w-full h-80 rounded-2xl md:w-2/5" src="{{ $artikelTerbaru[0]['img'] }}"
                        alt="Artikel's pict">
                    <div class="flex flex-col justify-between p-4 md:ps-8 leading-normal md:w-3/5">
                        <p class="mb-8 font-semibold text-font">
                            {{ \Carbon\Carbon::parse($artikelTerbaru[0]['pubDate'])->isoFormat('dddd, DD-MM-YYYY') }}
                        </p>
                        <h5 class="mb-2 text-2xl font-bold text-assets group-hover:text-second_a">
                            {{ $artikelTerbaru[0]['title'] }}</h5>
                        <p class="deskripsiSingkat mb-3 font-normal text-description">
                            {{ $artikelTerbaru[0]['description'] }}</p>
                    </div>
                </a>
                <a href="{{ $artikelTerbaru[1]['link'] }}"
                    class="group flex flex-col-reverse md:items-center mt-16 mb-8 bg-white rounded-lg md:flex-row md:max-w-full"
                    data-aos="fade-right" data-aos-duration="3000">
                    <div class="flex flex-col justify-between p-4 md:pe-8 leading-normal md:w-3/5">
                        <p class="mb-8 font-semibold text-font">
                            {{ \Carbon\Carbon::parse($artikelTerbaru[1]['pubDate'])->isoFormat('dddd, DD-MM-YYYY') }}
                        </p>
                        <h5 class="mb-2 text-2xl font-bold text-assets group-hover:text-second_a">
                            {{ $artikelTerbaru[1]['title'] }}</h5>
                        <p class="deskripsiSingkat mb-3 font-normal text-description">
                            {{ $artikelTerbaru[1]['description'] }}</p>
                    </div>
                    <img class="object-cover w-full h-80 rounded-2xl md:w-1/2" src="{{ $artikelTerbaru[1]['img'] }}"
                        alt="Artikel's pict">
                </a>
            @else
                <p class="text-center text-amara">Data artikel belum tersedia.</p>
            @endif
        </div>
        {{-- Newest Article End --}}

        {{-- Aspiration Cards Start --}}
        <div class="mx-auto py-8 px-6 max-w-2xl text-center lg:max-w-4xl" data-aos="fade-down" data-aos-duration="1000">
            <h2 class="mt-2 text-4xl font-bold text-font">Aspirasi</h2>
        </div>
        <div class="py-16 px-8 md:p-16">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-4" data-aos="fade-up" data-aos-duration="1000">
                {{-- foreach --}}
                @foreach ($aspirasiTerbaru as $index => $aspirasi)
                    @if ($index < 6)
                        <div
                            class="group flex flex-col bg-bg_aspiration border-2 border-border_aspiration hover:bg-second_a shadow-md rounded-xl">
                            <div class="p-4 md:p-7">
                                <div class="shrink-0 group block">
                                    <div class="flex items-center">
                                        <img class="inline-block shrink-0 size-[40px] rounded-full"
                                            src="{{ asset('assets/profile.svg') }}" alt="Avatar">
                                        <div class="ms-3">
                                            <h3 class="font-semibold text-black group-hover:text-white text-base">
                                                {{ $aspirasi->nama_pengirim }}</h3>
                                            <p
                                                class="text-xs font-medium text-judul_aspiration group-hover:text-black uppercase">
                                                {{ $aspirasi->judul_aspirasi }}</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4 text-black group-hover:text-white text-center font-light">
                                    "{{ $aspirasi->isi_aspirasi }}"
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="flex justify-center mt-16" data-aos="fade-up" data-aos-duration="1000">
                <a href="{{ route('about') }}" type="button"
                    class="text-white bg-second_a hover:bg-assets font-medium rounded-full text-sm px-5 py-2.5 text-center">
                    Kirim Aspirasi
                </a>
            </div>
        </div>
        {{-- Aspiration Cards End --}}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Ambil semua elemen dengan kelas 'deskripsiSingkat'
                const deskripsiElements = document.querySelectorAll('.deskripsiSingkat');
                const maxLength = 200; // Batas jumlah karakter

                // Iterasi setiap elemen
                deskripsiElements.forEach(function(deskripsiElement) {
                    const fullText = deskripsiElement.textContent;

                    if (fullText.length > maxLength) {
                        deskripsiElement.textContent = fullText.substring(0, maxLength) + ' ...';
                    }
                });
            });
        </script>
    </div>
@endsection
