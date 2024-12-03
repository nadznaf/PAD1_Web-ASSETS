@extends('layouts.app')

@section('title', 'Program Kerja')

@section('content')
<style>
    .borderKabinet {
        border-color: {{ $proker->divisi->kabinet->color_pallete->primary_color ?? '#000' }};
    }
    .teksWarnaKabinet {
        color: {{ $proker->divisi->kabinet->color_pallete->primary_color ?? '#000' }};
    }
    #footer {
        background-color: {{ $proker->divisi->kabinet->color_pallete->primary_color ?? 'bg-assets' }};
    }
</style>

<div class="bg-white">
    {{-- carousel galeri --}}
    <div id="gallery" class="relative w-full h-56 overflow-hidden md:h-500" data-carousel="slide">
        <!-- Carousel Items -->
        <div class="absolute inset-0 flex transition-transform duration-700 ease-in-out" style="width: 100%;" data-carousel-wrapper>

            <!-- Item 1 -->
            <div class="w-full h-full flex-shrink-0" data-carousel-item>
                <img src="{{ asset('assets/series_img1.svg') }}" class="block w-full h-full object-cover" alt="Image 1">
            </div>
            <!-- Item 2 -->
            <div class="w-full h-full flex-shrink-0" data-carousel-item>
                <img src="{{ asset('assets/series_img1.svg') }}" class="block w-full h-full object-cover" alt="Image 2">
            </div>
            <!-- Item 3 -->
            <div class="w-full h-full flex-shrink-0" data-carousel-item>
                <img src="{{ asset('assets/series_img1.svg') }}" class="block w-full h-full object-cover" alt="Image 3">
            </div>
        </div>
    </div>


    {{-- card nama proker --}}
    <div class="borderKabinet mx-4 my-16 md:mx-16 p-16 grid grid-cols-4 border-2 rounded-lg justify-self-center bg-opacity-5">
        <div class="col-span-4 items-center text-center p-auto md:col-span-2 my-auto">
            <h2 class="teksWarnaKabinet text-4xl font-bold uppercase sm:text-5xl">{{ $proker->judul_proker }}</h2>
            {{-- {{ $proker->judul_proker}} --}}
            <p class="text-dark text-base font-semibold mt-4">Kabinet {{ $proker->divisi->kabinet->nama_kabinet ?? 'Kabinet tidak ditemukan' }}</p>
        </div>
        <div class="col-span-4 place-items-center p-auto md:col-span-2 md:ms-4 mt-8">
            <div class="grid-rows-4">
                <div class="row-span-1 mb-4">
                    <p class="teksWarnaKabinet text-base">Proker Divisi</p>
                    <p class="text-dark text-base font-semibold">{{ $proker->divisi->nama_divisi ?? 'Divisi tidak ditemukan' }}</p>
                    {{-- {{ $proker->divisi->nama_divisi }} --}}
                </div>
                <div class="row-span-1 mb-4">
                    <p class="teksWarnaKabinet text-base">Dosen Pembina</p>
                    <p class="text-dark text-base font-semibold">{{ $proker->divisi->kabinet->dosen->nama_dosen ?? 'Dosen tidak ditemukan' }}</p>
                </div>
                <div class="row-span-1 mb-4">
                    <p class="teksWarnaKabinet text-base">Ketua Pelaksana</p>
                    <p class="text-dark text-base font-semibold">{{ $ketuaPelaksana->mahasiswa->nama_mhs ?? 'Ketua Pelaksana tidak ditemukan' }}</p>
                </div>
                <div class="row-span-1 mb-4">
                    <p class="teksWarnaKabinet text-base">Tanggal Pelaksanaan</p>
                    @foreach ($proker->waktu_proker as $tanggal)
                    <p class="text-dark text-base font-semibold">{{ \Carbon\Carbon::parse($tanggal->tanggal_kegiatan)->isoFormat('dddd, DD-MM-YYYY') }}<hr><br></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- seputar proker --}}
    <div class="mx-8 mb-16 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-96 h-px my-8 bg-black">
            <span class="teksWarnaKabinet px-3 font-bold text-3xl md:text-4xl text-center uppercase">seputar series</span>
            <hr class="w-96 h-px my-8 bg-black">
        </div>
        <div class="m-4 lg:mx-32 text-font text-justify">
            <p>{{ $proker->deskripsi_proker }}</p>
        </div>
    </div>

    {{-- detail proker --}}
    <div class="mx-8 mb-16 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-80 h-px my-8 bg-black">
            <span class="teksWarnaKabinet px-3 font-bold text-3xl md:text-4xl text-center uppercase">acara dalam series</span>
            <hr class="w-80 h-px my-8 bg-black">
        </div>
        <div class="m-4 lg:mx-32 text-font text-justify">
            <p>
                {{ $proker->deskripsi_kegiatan_proker }}
            </p>
        </div>
    </div>

    {{-- panitia pelaksana --}}
    <div class="mx-8 mb-16 md:mx-16">
        <div class="inline-flex items-center justify-center w-full p-16">
            <hr class="w-80 h-px my-8 bg-black">
            <span class="px-3 font-bold text-3xl md:text-4xl text-center text-amara bg-white uppercase">panitia pelaksana</span>
            <hr class="w-80 h-px my-8 bg-black">
        </div>

        <div class="grid grid-cols-2 mx-8 md:grid-cols-6 gap-4">
            <div class="group col-span-1 justify-items-center text-center" data-modal-target="default-modal" data-modal-toggle="default-modal">
                <img src="{{ asset('storage/datastaff/' . $ketuaPelaksana->mahasiswa->foto_profil_mhs) }}" class="w-28 h-28 object-cover rounded-full" alt="ketua pelaksana">
                <p class="mt-4 font-bold text-xl group-hover:underline">{{ $ketuaPelaksana->mahasiswa->nama_mhs ?? 'Ketua Pelaksana tidak ditemukan' }}</p>
                <p class="text-lg">Ketua Pelaksana</p>
            </div>
            <div class="group col-span-1 justify-items-center text-center" data-modal-target="default-modal" data-modal-toggle="default-modal">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl group-hover:underline">Risma</p>
                <p class="text-lg">Sekretaris</p>
            </div>
            <div class="group col-span-1 justify-items-center text-center" data-modal-target="default-modal" data-modal-toggle="default-modal">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl group-hover:underline">Luthfi Lisana</p>
                <p class="text-lg">Bendahara</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-lg">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
            <div class="col-span-1 justify-items-center text-center">
                <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                <p class="text-xl">Ketua Pelaksana</p>
            </div>
        </div>

        <!-- Additional Articles (Hidden by Default) -->
        <div id="extra-proker" class="hidden mt-6">
            <div class="grid grid-cols-2 mx-8 md:grid-cols-6 gap-4">
                <div class="group col-span-1 justify-items-center text-center" data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl group-hover:underline">Ahmad Luthfi Abdillah</p>
                    <p class="text-lg">Ketua Pelaksana</p>
                </div>
                <div class="group col-span-1 justify-items-center text-center" data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl group-hover:underline">Risma</p>
                    <p class="text-lg">Sekretaris</p>
                </div>
                <div class="group col-span-1 justify-items-center text-center" data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl group-hover:underline">Luthfi Lisana</p>
                    <p class="text-lg">Bendahara</p>
                </div>
                <div class="col-span-1 justify-items-center text-center">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                    <p class="text-lg">Ketua Pelaksana</p>
                </div>
                <div class="col-span-1 justify-items-center text-center">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                    <p class="text-xl">Ketua Pelaksana</p>
                </div>
                <div class="col-span-1 justify-items-center text-center">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                    <p class="text-xl">Ketua Pelaksana</p>
                </div>
                <div class="col-span-1 justify-items-center text-center">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                    <p class="text-xl">Ketua Pelaksana</p>
                </div>
                <div class="col-span-1 justify-items-center text-center">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                    <p class="text-xl">Ketua Pelaksana</p>
                </div>
                <div class="col-span-1 justify-items-center text-center">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                    <p class="text-xl">Ketua Pelaksana</p>
                </div>
                <div class="col-span-1 justify-items-center text-center">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                    <p class="text-xl">Ketua Pelaksana</p>
                </div>
                <div class="col-span-1 justify-items-center text-center">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                    <p class="text-xl">Ketua Pelaksana</p>
                </div>
                <div class="col-span-1 justify-items-center text-center">
                    <img src="assets/panit_series1.svg" class="w-28 h-28 rounded-full" alt="panit_series1">
                    <p class="mt-4 font-bold text-xl">Ahmad Luthfi Abdillah</p>
                    <p class="text-xl">Ketua Pelaksana</p>
                </div>
            </div>
        </div>

        <!-- "Lihat lainnya..." Button -->
        <div class="mt-8 mx-4 md:mx-16 flex justify-center">
            <button id="toggle-button" class="textWarnaKabinet mt-4 hover:text-font" onclick="toggleProker()">Lihat panitia lainnya...</button>
        </div>
    </div>

    {{-- dokumentasi proker --}}
    <div class="bg-black px-8 md:px-16 pt-8 pb-32 md:pt-24 text-center">
        <div class="mx-auto mt-8 mb-16 md:mb-24 max-w-2xl lg:max-w-4xl">
            <h2 class="teksWarnaKabinet text-2xl md:text-4xl font-semibold text-amara uppercase">Dokumentasi</h2>
        </div>
        {{-- 9 images --}}
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($proker->dokumentasi as $index => $dokumentasi)
                @if ($index < 9)
                    <div>
                        <img class="h-32 md:h-48 lg:h-64 xl:h-80 w-full max-w-full rounded-lg object-cover" src="{{ asset('storage/datadokumentasi/' . $dokumentasi->isi_dokumentasi) }}"
                        alt="Dokumentasi">
                    </div>
                @endif
            @endforeach
        </div>
    </div>


    <script>
        function toggleProker() {
            var extraProker = document.getElementById("extra-proker");
            var toggleButton = document.getElementById("toggle-button");
            if (extraProker.classList.contains("hidden")) {
                extraProker.classList.remove("hidden");
                toggleButton.innerText = "Tampilkan lebih sedikit...";
            } else {
                extraProker.classList.add("hidden");
                toggleButton.innerText = "Lihat lainnya...";
            }
        }
    </script>
</div>
@endsection
