@extends('layouts.app')

@section('title', 'KABINET')

@section('content')
    <style>
        #warnaKabinet {
            background-color: {{ $kabinet->color_pallete->primary_color ?? '#000' }} !important;
        }

        .teksWarnaKabinet {
            color: {{ $kabinet->color_pallete->primary_color ?? '#000' }} !important;
        }

        #footer {
            background-color: {{ $kabinet->color_pallete->primary_color ?? '#000' }} !important;
        }
    </style>
    <div class="bg-white">
        @if (isset($kabinet))
            <!-- Header Section -->
            <div id="warnaKabinet" class=" p-8 md:p-16 text-center">
                <h2 class="mt-2 text-3xl md:text-4xl font-bold text-white uppercase" data-aos="fade-down"
                    data-aos-duration="1000">Kabinet {{ $kabinet->nama_kabinet ?? 'Nama Kabinet Tidak Diketahui' }}</h2>
                <p class="mt-4 md:mt-6 text-base md:text-lg font-normal text-white" data-aos="fade-down"
                    data-aos-duration="1000">{{ $kabinet->deskripsi_kabinet ?? 'Deskripsi Kabinet Tidak Tersedia' }}</p>
            </div>

            <!-- Main Content Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mx-8 lg:mx-24 my-16">
                <div class="text-center flex align-middle m-8 md:m-0" data-aos="zoom-out" data-aos-duration="1000">
                    @if (isset($kabinet->logo_kabinet))
                        <img src="{{ asset('storage/datakabinet/' . $kabinet->logo_kabinet) }}" class="w-full h-auto"
                            alt="Kabinet Logo">
                    @else
                        <p class="text-black italic">Logo kabinet tidak tersedia.</p>
                    @endif
                </div>
                <div class="flex flex-col justify-center space-y-6 mx-0 my-8 lg:m-4" data-aos="fade-left"
                    data-aos-duration="1000">
                    <div class="flex items-start">
                        <div id="warnaKabinet" class="w-6 h-6 rounded-full mr-4"></div>
                        <div>
                            <h3 class="text-xl font-semibold text-dark">Makna Kabinet</h3>
                            <p class="font-light text-dark mt-4">
                                {{ $kabinet->makna_kabinet ?? 'Makna Kabinet Tidak Tersedia' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div id="warnaKabinet" class="w-6 h-6 rounded-full mr-4"></div>
                        <div>
                            <h3 class="text-xl font-semibold text-dark">Visi Kabinet</h3>
                            <p class="font-light text-dark mt-4">
                                {{ $kabinet->visi_kabinet ?? 'Visi Kabinet Tidak Tersedia' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div id="warnaKabinet" class="w-6 h-6 rounded-full mr-4"></div>
                        <div>
                            <h3 class="text-xl font-semibold text-dark">Misi Kabinet</h3>
                            <p class="font-light text-dark mt-4">
                                {{ $kabinet->misi_kabinet ?? 'Misi Kabinet Tidak Tersedia' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Divisi Kepengurusan Section -->
            <div class="text-center mt-32 mb-8 mx-6 md:mx-auto" data-aos="fade-down" data-aos-duration="1000">
                <h2 class="teksWarnaKabinet mt-2 text-2xl md:text-4xl font-semibold uppercase">Divisi Kepengurusan
                    {{ $kabinet->nama_kabinet }}</h2>
                <p class="mt-4 md:mt-6 text-base md:text-lg font-normal text-description">
                    {{ $kabinet->deskripsi_kabinet ?? 'Deskripsi Divisi Tidak Tersedia' }}</p>
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
    }'
                class="relative">
                @if (isset($pengurusHarian) && count($pengurusHarian) > 0)
                    <div class="hs-carousel w-full h-full overflow-hidden rounded-lg p-0">
                        <div class="hs-carousel-body relative top-0 bottom-0 start-0 flex justify-center flex-nowrap opacity-0 cursor-grab transition-transform duration-700 hs-carousel-dragging:transition-none hs-carousel-dragging:cursor-grabbing"
                            data-aos="fade-up" data-aos-duration="1000">
                            @if (isset($pengurusHarian['Ketua']))
                                <a href="">
                                    <div class="hs-carousel-slide flex justify-center px-1 object-cover"
                                        data-modal-target="default-modal" data-modal-toggle="default-modal">
                                        <figure
                                            class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                                            <img src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Ketua']->foto_pose_staff) }}"
                                                class="h-525 w-full rounded-lg object-cover">
                                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                                <p class="font-semibold text-4xl">Ketua Kabinet</p>
                                                <p class="text-2xl">{{ $pengurusHarian['Ketua']->mahasiswa->nama_mhs }}</p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </a>
                            @endif

                            @if (isset($pengurusHarian['Sekretaris Jenderal']))
                                <a href="">
                                    <div class="hs-carousel-slide flex justify-center px-1 object-cover">
                                        <figure
                                            class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0"
                                            data-modal-target="default-modal" data-modal-toggle="default-modal"
                                            data-id="{{ $pengurusHarian['Ketua']->mahasiswa->id_mhs }}">
                                            {{-- Tampilkan gambar Ketua --}}
                                            <img src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Sekretaris Jenderal']->foto_pose_staff) }}"
                                                class="h-525 w-full rounded-lg object-cover">
                                            {{-- Tampilkan nama dan jabatan Ketua --}}
                                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                                <p class="font-semibold text-4xl">Sekretaris Jenderal</p>
                                                <p class="text-2xl">
                                                    {{ $pengurusHarian['Sekretaris Jenderal']->mahasiswa->nama_mhs }}</p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </a>
                            @endif
                            @if (isset($pengurusHarian['Sekretaris I']))
                                <a href="">
                                    <div class="hs-carousel-slide flex justify-center px-1 object-cover">
                                        <figure
                                            class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0"
                                            data-modal-target="default-modal" data-modal-toggle="default-modal">
                                            {{-- Tampilkan gambar Ketua --}}
                                            <img src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Sekretaris I']->foto_pose_staff) }}"
                                                class="h-525 w-full rounded-lg object-cover">
                                            {{-- Tampilkan nama dan jabatan Ketua --}}
                                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                                <p class="font-semibold text-4xl">Sekretaris 1</p>
                                                <p class="text-2xl">
                                                    {{ $pengurusHarian['Sekretaris I']->mahasiswa->nama_mhs }}</p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </a>
                            @endif
                            @if (isset($pengurusHarian['Sekretaris II']))
                                <a href="">
                                    <div class="hs-carousel-slide flex justify-center px-1 object-cover">
                                        <figure
                                            class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0"
                                            data-modal-target="default-modal" data-modal-toggle="default-modal">
                                            {{-- Tampilkan gambar Ketua --}}
                                            <img src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Sekretaris II']->foto_pose_staff) }}"
                                                class="h-525 w-full rounded-lg object-cover">
                                            {{-- Tampilkan nama dan jabatan Ketua --}}
                                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                                <p class="font-semibold text-4xl">Sekretaris 2</p>
                                                <p class="text-2xl">
                                                    {{ $pengurusHarian['Sekretaris II']->mahasiswa->nama_mhs }}</p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </a>
                            @endif
                            @if (isset($pengurusHarian['Bendahara I']))
                                <a href="">
                                    <div class="hs-carousel-slide flex justify-center px-1 object-cover">
                                        <figure
                                            class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0"
                                            data-modal-target="default-modal" data-modal-toggle="default-modal">
                                            {{-- Tampilkan gambar Ketua --}}
                                            <img src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Bendahara I']->foto_pose_staff) }}"
                                                class="h-525 w-full rounded-lg object-cover">
                                            {{-- Tampilkan nama dan jabatan Ketua --}}
                                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                                <p class="font-semibold text-4xl">Bendahara 1</p>
                                                <p class="text-2xl">
                                                    {{ $pengurusHarian['Bendahara I']->mahasiswa->nama_mhs }}</p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </a>
                            @endif
                            @if (isset($pengurusHarian['Bendahara II']))
                                <a href="">
                                    <div class="hs-carousel-slide flex justify-center px-1 object-cover">
                                        <figure
                                            class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0"
                                            data-modal-target="default-modal" data-modal-toggle="default-modal">
                                            {{-- Tampilkan gambar Ketua --}}
                                            <img src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Bendahara II']->foto_pose_staff) }}"
                                                class="h-525 w-full rounded-lg object-cover">
                                            {{-- Tampilkan nama dan jabatan Ketua --}}
                                            <figcaption class="absolute bottom-4 px-4 pb-4 text-white">
                                                <p class="font-semibold text-4xl">Bendahara 2</p>
                                                <p class="text-2xl">
                                                    {{ $pengurusHarian['Bendahara II']->mahasiswa->nama_mhs }}</p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>

                    <button type="button"
                        class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full rounded-l-xl text-dark backdrop-blur-sm bg-white/30">
                        <span class="text-2xl" aria-hidden="true">
                            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>
                        </span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button type="button"
                        class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full rounded-r-xl text-dark backdrop-blur-sm bg-white/30">
                        <span class="sr-only">Next</span>
                        <span class="text-2xl" aria-hidden="true">
                            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </span>
                    </button>
                @else
                    <p class="text-gray-500 italic text-center">Data pengurus harian tidak tersedia.</p>
                @endif
            </div>
            <!-- End Slider -->

            {{-- divisi --}}
            <div class="grid md:grid-cols-3 mx-8 my-16 lg:grid-cols-subgrid lg:grid-flow-col gap-4 items-center">
                @foreach ($dataDivisi as $index => $divisi)
                    @if ($divisi->nama_divisi == 'Pengurus Harian')
                        {{-- Jangan tampilkan apa-apa --}}
                        @continue
                    @endif
                    <a href="{{ route('kabinet.struktur', $kabinet->id_kabinet) }}">
                        <div class="justify-items-center text-center" data-aos="fade-up" data-aos-duration="1000">
                            <img src="{{ asset('storage/datadivisi/' . $divisi->foto_sampul_divisi) }}"
                                class="w-36 h-36 rounded-full" alt="divisi">
                            <p class="mt-4 font-bold text-xl uppercase">{{ $divisi->nama_divisi }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="flex justify-center mb-32" data-aos="fade-up" data-aos-duration="1000">
                <a href="{{ route('kabinet.struktur', $kabinet->id_kabinet) }}" type="button"
                    class="text-white bg-black hover:bg-font font-medium rounded-full text-sm px-5 py-2.5 text-center">
                    Selengkapnya
                </a>
            </div>

            {{-- proker kabinet --}}
            <div class="text-center mt-40 mx-6 md:mx-auto max-w-2xl lg:max-w-4xl" data-aos="fade-down"
                data-aos-duration="1000">
                <h2 class="teksWarnaKabinet mt-2 text-2xl md:text-4xl font-semibold uppercase">program kerja kabinet
                    {{ $kabinet->nama_kabinet }}</h2>
            </div>
            <div class="grid grid-cols-1 justify-items-center gap-6 mx-8 mt-16 mb-40 md:grid-cols-2 lg:grid-cols-3">
                {{-- proker terbaru --}}
                @foreach ($dataProker as $index => $proker)
                    <div class="max-w-sm justify-center hover:bg-bg_aspiration duration-100 rounded-lg shadow-lg"
                        data-aos="fade-up" data-aos-duration="1000">
                        <a href="{{ route('proker.show', $proker->id_proker) }}">
                            <!-- Image -->
                            <img class="h-32 md:h-48 lg:h-64 xl:h-80 w-96 md:w-full max-w-full object-cover rounded-t-lg"
                                src="{{ asset('storage/dataproker/' . $proker->foto_sampul_proker) }}" alt="proker" />

                            <!-- Date and Category Section -->
                            <div class="flex grid-cols-2 items-center justify-between px-4 pt-4">
                                <p class="text-judul_aspiration text-sm text-left">
                                    @foreach ($proker->waktu_proker as $tanggal)
                                        {{ \Carbon\Carbon::parse($tanggal->tanggal_kegiatan)->isoFormat('dddd, DD-MM-YYYY') }}
                                        <hr><br>
                                    @endforeach
                                </p>
                                <a href="{{ route('kabinet.struktur', $kabinet->id_kabinet) }}">
                                    <div
                                        class="bg-judul_aspiration text-white rounded-xl px-3 py-1 text-xs text-center w-fit uppercase">
                                        {{ $proker->divisi->nama_divisi }}
                                    </div>
                                </a>
                            </div>

                            <!-- Title -->
                            <h5 class="p-4 text-2xl font-semibold text-font uppercase">{{ $proker->judul_proker }}</h5>

                            <!-- Description -->
                            <p class="deskripsiSingkat px-4 pb-4 font-normal text-font">
                                {{ $proker->deskripsi_proker ?? 'Deskripsi tidak tersedia' }}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Documentation Section -->
            <div class="bg-black px-8 md:px-16 pt-8 pb-32 md:pt-24 text-center">
                <div class="mx-auto mt-8 mb-16 md:mb-24 max-w-2xl lg:max-w-4xl" data-aos="fade-down"
                    data-aos-duration="1000">
                    <h2 class="teksWarnaKabinet text-2xl md:text-4xl font-semibold text-amara uppercase">Dokumentasi
                        Terbaru</h2>
                </div>
                {{-- 12 images --}}
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4" data-aos="fade-up" data-aos-duration="1000">
                    @foreach ($dataDokumentasi as $index => $dokumentasi)
                        @if ($index < 12)
                            <div>
                                <img class="h-32 md:h-48 lg:h-64 xl:h-80 w-full max-w-full rounded-lg object-cover"
                                    src="{{ asset('storage/datadokumentasi/' . $dokumentasi->isi_dokumentasi) }}"
                                    alt="Dokumentasi">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center my-16">
                <h2 class="text-3xl font-bold text-gray-700">Data Kabinet Tidak Ditemukan</h2>
                <p class="text-gray-500 mt-4">Silakan periksa kembali data atau hubungi administrator jika masalah
                    berlanjut.</p>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const figures = document.querySelectorAll('[data-modal-toggle="default-modal"]');
            const modal = document.getElementById('default-modal');
            const modalLink = document.getElementById('modal-link');
            const closeModalButton = document.getElementById('close-modal');
            // Ambil semua elemen dengan kelas 'deskripsiSingkat'
            const deskripsiElements = document.querySelectorAll('.deskripsiSingkat');
            const maxLength = ; // Batas jumlah karakter

            closeModalButton.addEventListener('click', () => {
                // Hide the modal
                modal.classList.add('hidden');
            });

            deskripsiElements.forEach(function(deskripsiElement) {
                const fullText = deskripsiElement.textContent;

                if (fullText.length > maxLength) {
                    deskripsiElement.textContent = fullText.substring(0, maxLength) + ' ...';
                }
            });
        });
        document.addEventListener('DOMContentLoaded', () => {
            const deskripsiSingkatElements = document.querySelectorAll('.deskripsiSingkat');

            deskripsiSingkatElements.forEach((element) => {
                const maxLength = 50; // Panjang maksimal deskripsi
                const originalText = element.textContent.trim();

                if (originalText.length > maxLength) {
                    const truncatedText = originalText.substring(0, maxLength) + '...';
                    element.textContent = truncatedText;

                    // Untuk menunjukkan teks lengkap saat hover
                    element.setAttribute('title', originalText);
                }
            });
        });
    </script>
@endsection
