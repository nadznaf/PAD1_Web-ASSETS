@extends('layouts.app')

@section('title', 'Kepengurusan')

@section('content')
    <style>
        #warnaKabinet {
            background-color: {{ $kabinet->color_pallete->primary_color }} !important;
        }

        :root {
            --primary-color: {{ $kabinet->color_pallete->primary_color }};
        }

        #teksWarnaKabinet {
            color: {{ $kabinet->color_pallete->primary_color }} !important;
        }

        #footer {
            background-color: {{ $kabinet->color_pallete->primary_color }} !important;
        }
    </style>
    <div class="bg-white">
        {{-- top judul --}}
        <div class="mb-24 mx-4 md:mx-32 p-4 md:p-16 text-center">
            <h2 class="mt-2 text-2xl md:text-4xl font-bold text-black uppercase" data-aos="fade-down" data-aos-duration="1000">
                Kepengurusan kabinet {{ $kabinet->nama_kabinet }}</h2>
            <p class="mt-4 md:mt-6 text-base md:text-lg font-light text-description" data-aos="fade-down"
                data-aos-duration="1000">{{ $kabinet->deskripsi_kabinet }}</p>
            </p>
        </div>

        {{-- spesifik kabinet --}}
        <div id="warnaKabinet" class="grid xs:grid-rows-3 p-16 justify-items-center lg:px-32 lg:grid-cols-3 lg:gap-8 ">
            <div class="grid-rows-1 mb-4 lg:grid-cols-1 justify-items-center">
                <h3 class="text-white font-bold text-3xl" data-aos="zoom-out" data-aos-duration="1000">
                    {{ $kabinet->tahun_awal_kabinet }} - {{ $kabinet->tahun_akhir_kabinet }}</h3>
                <p class="text-white font-light" data-aos="zoom-out" data-aos-duration="1000">Tahun kepengurusan</p>
            </div>
            <div class="grid-rows-1 mb-4 lg:grid-cols-1 justify-items-center">
                <h3 class="text-white font-bold text-3xl" data-aos="zoom-out" data-aos-duration="1000">{{ $jumlahProker }}
                </h3>
                <p class="text-white font-light" data-aos="zoom-out" data-aos-duration="1000">Jumlah Proker</p>
            </div>
            <div class="grid-rows-1 mb-4 lg:grid-cols-1 justify-items-center">
                <h3 class="text-white font-bold text-3xl" data-aos="zoom-out" data-aos-duration="1000">{{ $jumlahAnggota }}
                </h3>
                <p class="text-white font-light" data-aos="zoom-out" data-aos-duration="1000">Member</p>
            </div>
        </div>

        {{-- logo kabinet --}}
        <div class="flex justify-center my-32 px-8 md:my-40">
            <img src="{{ asset('storage/datakabinet/' . $kabinet->logo_kabinet) }}" class="w-434 h-103 object-fit"
                alt="Kabinet Logo" data-aos="zoom-in" data-aos-duration="1000">
        </div>

        {{-- ketua --}}
        <div class="grid grid-cols-3 justify-between">
            <div class="grid grid-cols-1 bg-gradient-to-r from-[var(--primary-color)] to-white px-0 md:px-32 py-8 gap-8">
            </div>
            <h2 id="teksWarnaKabinet"
                class="text-2xl grid grid-col-1 font-extralight md:text-5xl lg:text-7xl text-center items-center"
                data-aos="fade-down" data-aos-duration="800">Ketua</h2>
            <div class="grid grid-col-1 bg-gradient-to-l from-[var(--primary-color)] to-white px-0 md:px-32 py-8 gap-8">
            </div>
        </div>
        @if (isset($pengurusHarian['Ketua']))
            <a href="">
                <div class="group flex flex-col items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row"
                    data-aos="fade-right" data-aos-duration="1000">
                    <img class="object-cover w-full h-96 rounded-lg md:mr-8 md:w-1/3"
                        src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Ketua']->foto_pose_staff) }}"
                        alt="Ketua">
                    <div class="group flex flex-col justify-between p-4 leading-normal md:w-2/3">
                        <h5 id="teksWarnaKabinet" class="mb-2 text-2xl md:text-4xl font-semibold group-hover:text-dark">
                            {{ $pengurusHarian['Ketua']->mahasiswa->nama_mhs }}</h5>
                        <p class="mb-8 font-normal italic text-font">Ketua Kabinet {{ $kabinet->nama_kabinet }}</p>
                        <h5 id="teksWarnaKabinet" class="mb-2 text-xl md:text-2xl font-semibold">Tugas dan Tanggung Jawab
                        </h5>
                        <p class="mb-3 font-normal text-black">{{ $pengurusHarian['Ketua']['tugas_staff'] }}</p>
                    </div>
                </div>
            </a>
        @else
            <div class="text-center mx-8 my-16">
                <p id="teksWarnaKabinet" class="text-lg font-semibold">Data Ketua tidak tersedia.</p>
            </div>
        @endif

        @if (isset($pengurusHarian['Sekretaris Jenderal']))
            <a href="">
                <div class="flex flex-col-reverse items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row"
                    data-aos="fade-left" data-aos-duration="1000">
                    <div class="flex flex-col justify-between p-4 leading-normal md:w-2/3">
                        <h5 id="teksWarnaKabinet" class="mb-2 text-2xl md:text-4xl font-semibold hover:text-dark">
                            {{ $pengurusHarian['Sekretaris Jenderal']->mahasiswa->nama_mhs }}</h5>
                        <p class="mb-8 font-normal italic text-font">Sekretaris Jenderal Kabinet
                            {{ $kabinet->nama_kabinet }}</p>
                        <h5 id="teksWarnaKabinet" class="mb-2 text-xl md:text-2xl font-semibold">Tugas dan Tanggung Jawab
                        </h5>
                        <p class="mb-3 font-normal text-black">{{ $pengurusHarian['Sekretaris Jenderal']['tugas_staff'] }}
                        </p>
                    </div>
                    <img class="object-cover w-full h-96 rounded-lg md:ml-16 md:w-1/3"
                        src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Sekretaris Jenderal']->foto_pose_staff) }}"
                        alt="Sekjen">
                </div>
            </a>
        @else
            <div class="text-center mx-8 my-16">
                <p id="teksWarnaKabinet" class="text-lg font-semibold">Data Sekretaris Jenderal tidak tersedia.</p>
            </div>
        @endif

        {{-- Sekretaris --}}
        <div class="grid grid-cols-3 justify-between pt-16">
            <div class="grid grid-cols-1 bg-gradient-to-r from-[var(--primary-color)] to-white px-0 md:px-32 py-8 gap-8">
            </div>
            <h2 id="teksWarnaKabinet"
                class="text-2xl grid grid-col-1 font-extralight md:text-5xl lg:text-7xl text-center items-center"
                data-aos="fade-down" data-aos-duration="800">Sekretaris</h2>
            <div class="grid grid-col-1 bg-gradient-to-l from-[var(--primary-color)] to-white px-0 md:px-32 py-8 gap-8">
            </div>
        </div>
        @if (isset($pengurusHarian['Sekretaris I']))
            <a href="">
                <div class="flex flex-col items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row"
                    data-aos="fade-right" data-aos-duration="1000">
                    <img class="object-cover w-full h-96 rounded-lg md:mr-8 md:w-1/3"
                        src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Sekretaris I']->foto_pose_staff) }}"
                        alt="Ketua">
                    <div class="flex flex-col justify-between p-4 leading-normal md:w-2/3">
                        <h5 id="teksWarnaKabinet" class="mb-2 text-2xl md:text-4xl font-semibold hover:text-dark">
                            {{ $pengurusHarian['Sekretaris I']->mahasiswa->nama_mhs }}</h5>
                        <p class="mb-8 font-normal italic text-font">Sekretaris 1 Kabinet {{ $kabinet->nama_kabinet }}</p>
                        <h5 id="teksWarnaKabinet" class="mb-2 text-xl md:text-2xl font-semibold">Tugas dan Tanggung Jawab
                        </h5>
                        <p class="mb-3 font-normal text-black">{{ $pengurusHarian['Sekretaris I']['tugas_staff'] }}</p>
                    </div>
                </div>
            </a>
        @else
            <div class="text-center mx-8 my-16">
                <p id="teksWarnaKabinet" class="text-lg font-semibold">Data Sekretaris 1 tidak tersedia.</p>
            </div>
        @endif
        @if (isset($pengurusHarian['Sekretaris II']))
            <a href="">
                <div class="flex flex-col-reverse items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row"
                    data-aos="fade-left" data-aos-duration="1000">
                    <div class="flex flex-col justify-between p-4 leading-normal md:w-2/3">
                        <h5 id="teksWarnaKabinet" class="mb-2 text-2xl md:text-4xl font-semibold hover:text-dark">
                            {{ $pengurusHarian['Sekretaris II']->mahasiswa->nama_mhs }}</h5>
                        <p class="mb-8 font-normal italic text-font">Sekretaris 2 Kabinet {{ $kabinet->nama_kabinet }}</p>
                        <h5 id="teksWarnaKabinet" class="mb-2 text-xl md:text-2xl font-semibold">Tugas dan Tanggung Jawab
                        </h5>
                        <p class="mb-3 font-normal text-black">{{ $pengurusHarian['Sekretaris II']['tugas_staff'] }}</p>
                    </div>
                    <img class="object-cover w-full h-96 rounded-lg md:ml-16 md:w-1/3"
                        src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Sekretaris II']->foto_pose_staff) }}"
                        alt="Sekjen">
                </div>
            </a>
        @else
            <div class="text-center mx-8 my-16">
                <p id="teksWarnaKabinet" class="text-lg font-semibold">Data Sekretaris 2 tidak tersedia.</p>
            </div>
        @endif

        {{-- bendahara --}}
        <div class="grid grid-cols-3 justify-between pt-16">
            <div class="grid grid-cols-1 bg-gradient-to-r from-[var(--primary-color)] to-white px-0 md:px-32 py-8 gap-8">
            </div>
            <h2 id="teksWarnaKabinet"
                class="text-2xl grid grid-col-1 font-extralight md:text-5xl lg:text-7xl text-center items-center"
                data-aos="fade-down" data-aos-duration="800">Bendahara</h2>
            <div class="grid grid-col-1 bg-gradient-to-l from-[var(--primary-color)] to-white px-0 md:px-32 py-8 gap-8">
            </div>
        </div>
        @if (isset($pengurusHarian['Bendahara I']))
            <a href="">
                <div class="flex flex-col items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row"
                    data-aos="fade-right" data-aos-duration="1000">
                    <img class="object-cover w-full h-96 rounded-lg md:mr-8 md:w-1/3"
                        src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Bendahara I']->foto_pose_staff) }}"
                        alt="Ketua">
                    <div class="flex flex-col justify-between p-4 leading-normal md:w-2/3">
                        <h5 id="teksWarnaKabinet" class="mb-2 text-2xl md:text-4xl font-semibold hover:text-dark">
                            {{ $pengurusHarian['Bendahara I']->mahasiswa->nama_mhs }}</h5>
                        <p class="mb-8 font-normal italic text-font">Bendahara 1 Kabinet {{ $kabinet->nama_kabinet }}</p>
                        <h5 id="teksWarnaKabinet" class="mb-2 text-xl md:text-2xl font-semibold">Tugas dan Tanggung Jawab
                        </h5>
                        <p class="mb-3 font-normal text-black">{{ $pengurusHarian['Bendahara I']['tugas_staff'] }}</p>
                    </div>
                </div>
            </a>
        @else
            <div class="text-center mx-8 my-16">
                <p id="teksWarnaKabinet" class="text-lg font-semibold">Data Bendahara 1 tidak tersedia.</p>
            </div>
        @endif
        @if (isset($pengurusHarian['Bendahara II']))
            <a href="">
                <div class="flex flex-col-reverse items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row"
                    data-aos="fade-left" data-aos-duration="1000">
                    <div class="flex flex-col justify-between p-4 leading-normal md:w-2/3">
                        <h5 id="teksWarnaKabinet" class="mb-2 text-2xl md:text-4xl font-semibold hover:text-dark">
                            {{ $pengurusHarian['Bendahara II']->mahasiswa->nama_mhs }}</h5>
                        <p class="mb-8 font-normal italic text-font">Bendahara 2 Kabinet {{ $kabinet->nama_kabinet }}</p>
                        <h5 id="teksWarnaKabinet" class="mb-2 text-xl md:text-2xl font-semibold">Tugas dan Tanggung Jawab
                        </h5>
                        <p class="mb-3 font-normal text-black">{{ $pengurusHarian['Bendahara II']['tugas_staff'] }}</p>
                    </div>
                    <img class="object-cover w-full h-96 rounded-lg md:ml-16 md:w-1/3"
                        src="{{ asset('storage/datamahasiswa/' . $pengurusHarian['Bendahara II']->foto_pose_staff) }}"
                        alt="Sekjen">
                </div>
            </a>
        @else
            <div class="text-center mx-8 my-16">
                <p id="teksWarnaKabinet" class="text-lg font-semibold">Data Bendahara 2 tidak tersedia.</p>
            </div>
        @endif

        {{-- divisi --}}
        <div class="grid grid-cols-3 justify-between pt-16">
            <div class="grid grid-cols-1 bg-gradient-to-r from-[var(--primary-color)] to-white px-0 md:px-32 py-8 gap-8">
            </div>
            <h2 id="teksWarnaKabinet"
                class="text-2xl grid grid-col-1 font-extralight md:text-5xl lg:text-7xl text-center items-center"
                data-aos="fade-down" data-aos-duration="800">Divisi</h2>
            <div class="grid grid-col-1 bg-gradient-to-l from-[var(--primary-color)] to-white px-0 md:px-32 py-8 gap-8">
            </div>
        </div>

        {{-- divisi --}}
        @foreach ($kabinet->divisi as $divisi)
            @if ($divisi->nama_divisi == 'Pengurus Harian')
                {{-- Jangan tampilkan pengurus harian --}}
                @continue
            @endif
            <div class="text-center mt-32 mx-6 md:mx-auto max-w-2xl lg:max-w-4xl" data-aos="fade-up"
                data-aos-duration="1000">
                <h2 class="mt-2 text-2xl md:text-4xl font-semibold text-black uppercase">{{ $divisi->nama_divisi }}</h2>
                <p id="teksWarnaKabinet" class="mt-4 md:mt-6 mb-8 text-base md:text-lg font-normal">
                    {{ $divisi->deskripsi_divisi }}</p>
            </div>
            <div class="flex min-h-full items-center justify-center overflow-x-hidden px-4 py-8 bg-black">
                <div class="flex justify-center gap-1 px-4 overflow-y-hidden">
                    <div class="order-last flex w-max items-center justify-center gap-1" data-aos="fade-up"
                        data-aos-duration="1000">
                        @foreach ($divisi->staff as $staff)
                            @if ($staff->nama_jabatan == 'Kepala Divisi')
                                <a href="">
                                    <div
                                        class="group relative order-first w-16 lg:w-80 overflow-hidden transition-all duration-500 peer-hover:w-20 hover:w-80">
                                        <div class="h-80 md:h-96">
                                            <img class="h-full w-full rounded-lg object-cover transition-transform duration-500 peer-hover:scale-75"
                                                src="{{ asset('storage/datamahasiswa/' . $staff->foto_pose_staff) }}"
                                                alt="" />
                                        </div>
                                        <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                                            <div class="relative">
                                                <span
                                                    class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Kadiv</span>
                                                <h2
                                                    class="leading-0 opacity-0 font-medium text-gray-700 transition duration-300 group-hover:opacity-100">
                                                    {{ $staff->mahasiswa->nama_mhs }}</h2>
                                            </div>
                                            <span class="text-sm tracking-wide text-gray-600">Kadiv</span>
                                        </div>
                                    </div>
                                </a>
                            @elseif ($staff->nama_jabatan == 'Wakil Kepala Divisi')
                                <a href="">
                                    <div
                                        class="peer group relative w-16 lg:w-20 overflow-hidden transition-all duration-500 hover:w-80">
                                        <div class="h-80 md:h-96">
                                            <img class="h-full w-full rounded-lg object-cover"
                                                src="{{ asset('storage/datamahasiswa/' . $staff->foto_pose_staff) }}"
                                                alt="" />
                                        </div>
                                        <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                                            <div class="relative">
                                                <span
                                                    class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Wakadiv</span>
                                                <h2
                                                    class="leading-0 font-medium text-gray-700 opacity-0 transition duration-300 group-hover:opacity-100">
                                                    {{ $staff->mahasiswa->nama_mhs }}</h2>
                                            </div>
                                            <span class="text-sm tracking-wide text-gray-600">Wakadiv</span>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <a href="">
                                    <div
                                        class="peer group relative w-16 lg:w-20 overflow-hidden transition-all duration-500 hover:w-80">
                                        <div class="h-80 md:h-96">
                                            <img class="h-full w-full rounded-lg object-cover"
                                                src="{{ asset('storage/datamahasiswa/' . $staff->foto_pose_staff) }}"
                                                alt="" />
                                        </div>
                                        <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                                            <div class="relative">
                                                <span
                                                    class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Staf</span>
                                                <h2
                                                    class="leading-0 font-medium text-gray-700 opacity-0 transition duration-300 group-hover:opacity-100">
                                                    {{ $staff->mahasiswa->nama_mhs }}</h2>
                                            </div>
                                            <span class="text-sm tracking-wide text-gray-600">Staf</span>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- tugas dan proker divisi --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 m-6 md:m-8" data-aos="fade-up" data-aos-duration="1000">
                <div class="m-8">
                    <h5 id="teksWarnaKabinet" class="text-base font-semibold mb-4">Tugas dan Tanggung Jawab</h5>
                    <p class="font-light text-justify">
                        {{ $divisi->tugas_dan_tanggung_jawab }}
                    </p>
                </div>
                <div class="m-8">
                    <h5 id="teksWarnaKabinet" class="text-base font-semibold mb-4">Program kerja</h5>
                    <div class="grid grid-rows-4 gap-2">
                        @if ($divisi->proker->isEmpty())
                            <p class="text-gray-500">Belum ada program kerja</p>
                        @else
                            @foreach ($divisi->proker as $proker)
                                <a href="{{ route('proker.show', $divisi->id_divisi) }}">
                                    <div class="group flex justify-between items-center">
                                        <p class="text-black uppercase group-hover:text-font">{{ $proker->judul_proker }}
                                        </p>
                                        <div
                                            class="rounded-xl w-20 text-center py-1 text-xs
                                    {{ $proker->status_proker === 'Selesai' ? 'bg-green-200 text-green-700' : '' }}
                                    {{ $proker->status_proker === 'Bersiap' ? 'bg-blue-200 text-blue-700' : '' }}
                                    {{ $proker->status_proker === 'Sedang Berjalan' ? 'bg-yellow-200 text-yellow-700' : '' }}
                                    {{ !in_array($proker->status_proker, ['Selesai', 'Bersiap', 'Sedang Berjalan']) ? 'bg-gray-200 text-gray-700' : '' }}">
                                            {{ $proker->status_proker }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            {{-- proker divisi done --}}
        @endforeach
    </div>


@endsection
