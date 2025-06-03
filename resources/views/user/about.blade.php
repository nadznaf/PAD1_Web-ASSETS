@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <div class="bg-white">
        {{-- deskripsi umum assets --}}
        <div class="bg-assets mx-0 py-24 px-8 text-center md:px-32">
            <h2 class="mt-2 text-4xl font-bold text-white sm:text-5xl" data-aos="fade-up" data-aos-duration="800">Tentang Kami
            </h2>
            <p class="mt-6 text-l font-normal text-white sm:text-m" data-aos="fade-up" data-aos-duration="800">
                ASSETS atau Association of Software Engineering Technology Students merupakan sebuah himpunan mahasiswa
                program studi Teknologi Rekayasa Perangkat Lunak, Sekolah Vokasi, Universitas Gadjah Mada.
                ASSETS berdiri pada tahun 2020 dengan nama kabinet IRIS. Sebagai humpunan yang membantu prodi dalam
                menyejahterakan mahasiswanya.
            </p>
        </div>

        {{-- deskripsi makna visi misi assets --}}
        <div class="flex justify-center mt-32 px-8">
            <img src="{{ asset('assets/assets_logo.svg') }}" class="w-434 h-103" alt="Assets Logo" data-aos="zoom-in-up"
                data-aos-duration="3000">
        </div>
        <div class="grid grid-cols-2 gap-8 mt-16 mx-8 md:mx-32">
            <div class="col-span-2">
                <h1 class="my-4 text-xl font-semibold text-assets">Makna</h1>
                <p class="mb-6 text-assets text-justify">ASSETS adalah organisasi yang berkomitmen untuk mengembangkan
                    potensi dan keterampilan mahasiswa dalam bidang teknologi rekayasa perangkat lunak melalui kegiatan
                    akademik dan non-akademik.</p>
            </div>
            <div class="col-span-2 md:col-span-1">
                <h1 class="my-4 text-xl font-semibold text-assets">Visi</h1>
                <p class="mb-6 text-assets text-justify">Menjadi wadah unggul bagi mahasiswa untuk berkolaborasi, belajar,
                    dan berinovasi dalam menciptakan solusi teknologi yang bermanfaat bagi masyarakat.</p>
            </div>
            <div class="col-span-2 md:col-span-1">
                <h1 class="my-4 text-xl font-semibold text-assets">Misi</h1>
                <p class="mb-6 text-assets text-justify">Penyelenggaraan kegiatan yang mendukung pengembangan keterampilan
                    teknis dan non-teknis, meningkatkan kesadaran akan pentingnya teknologi dalam kehidupan sehari-hari,
                    serta membangun jaringan yang kuat antara anggota, alumni, dan industri.</p>
            </div>
        </div>

        {{-- form aspirasi --}}
        <div class="bg-assets py-16 px-8 md:px-32 mt-16">
            <h2 class="m-4 text-4xl font-bold text-white text-center" data-aos="fade-up" data-aos-duration="800">Aspirasi
            </h2>
            <p class="text-white text-center font-semibold text-lg" data-aos="fade-up" data-aos-duration="800">Suarakan
                Aspirasimu</p>
            <p class="text-white text-center text-base" data-aos="fade-up" data-aos-duration="800">Tuliskan pesan yang
                membangun dan dapat bermanfaat bagi perkembangan ASSETS. Pastikan pesan tidak mengandung SARA.</p>
            <div class=" bg-white rounded-2xl shadow-lg mx-auto my-16 p-8" data-aos="fade-up" data-aos-duration="800">
                <p class="text-dark font-bold text-2xl mb-4">Pesan</p>
                <form action="{{ route('aspirasi.store') }}" id="uploadForm" method="POST" enctype="multipart/form-data"
                    class="space-y-5">
                    @csrf
                    <div>
                        <label for="nama_pengirim" class="block text-base font-semibold text-assets mb-2">Nama
                            Pengirim</label>
                        <input type="text" name="nama_pengirim" id="nama_pengirim"
                            class="block w-full p-2.5 shadow-sm text-base bg-white border border-gray-300 text-assets rounded-lg focus:ring-assets focus:border-assets"
                            placeholder="Tuliskan Nama Pengirim" required />
                        <p class="text-red-500 text-sm hidden invalid-feedback">Input nama pengirim secara valid!</p>
                        <p class="text-green-500 text-sm hidden valid-feedback">Input valid.</p>
                    </div>

                    <div>
                        <label for="judul_aspirasi" class="block text-base font-semibold text-assets mb-2">Judul
                            Aspirasi</label>
                        <input type="text" name="judul_aspirasi" id="judul_aspirasi"
                            class="block w-full p-2.5 shadow-sm text-base bg-white border border-gray-300 text-assets rounded-lg focus:ring-assets focus:border-assets"
                            placeholder="Tuliskan Judul Aspirasi" required />
                        <p class="text-red-500 text-sm hidden invalid-feedback">Input judul aspirasi secara valid!</p>
                        <p class="text-green-500 text-sm hidden valid-feedback">Input valid.</p>
                    </div>

                    <div>
                        <label for="isi_aspirasi" class="block text-base font-semibold text-assets mb-2">Isi
                            Aspirasi</label>
                        <textarea name="isi_aspirasi" id="isi_aspirasi" rows="5"
                            class="block w-full p-2.5 shadow-sm text-base bg-white border border-gray-300 text-assets rounded-lg focus:ring-assets focus:border-assets resize-none"
                            placeholder="Tuliskan Isi Aspirasi di sini" required></textarea>
                        <p class="text-red-500 text-sm hidden invalid-feedback">Input isi aspirasi secara valid!</p>
                        <p class="text-green-500 text-sm hidden valid-feedback">Input valid.</p>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="submit"
                            class="text-white bg-assets hover:bg-second_a font-medium rounded-lg text-sm px-5 py-2.5">Kirim
                            Aspirasi</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- card aspirasi --}}
        <div class="grid grid-cols-1 gap-6 mt-24 mb-8 mx-8 md:grid-cols-3 md:gap-6 lg:mx-32" data-aos="fade-up"
            data-aos-duration="800">
            {{-- foreach --}}
            @foreach ($dataAspirasi as $index => $aspirasi)
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

            <!-- Additional Aspiration (Hidden by Default) -->
            <div id="extra-aspirasi" class="hidden">
                @foreach ($dataAspirasi as $index => $aspirasi)
                    @if ($index >= 6)
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
                                <p
                                    class="mt-4 text-black group-hover:text-white text-center font-light align-middle items-center">
                                    "{{ $aspirasi->isi_aspirasi }}"
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
        <!-- "Lihat aspirasi lainnya" Button -->
        <div class="mb-24 mx-4 md:mx-16 flex justify-center" data-aos="fade-up" data-aos-duration="1000">
            <button id="toggle-button" class="text-white mt-4 bg-assets rounded-full hover:bg-second_a py-1.5 px-3"
                onclick="toggleAspirasi()">Aspirasi Lainnya</button>
        </div>

        <script>
            function toggleAspirasi() {
                var extraAspirasi = document.getElementById("extra-aspirasi");
                var toggleButton = document.getElementById("toggle-button");
                if (extraAspirasi.classList.contains("hidden")) {
                    extraAspirasi.classList.remove("hidden");
                    toggleButton.innerText = "Tampilkan Lebih Sedikit";
                } else {
                    extraAspirasi.classList.add("hidden");
                    toggleButton.innerText = "Aspirasi Lainnya";
                }
            }
        </script>
    </div>
@endsection
