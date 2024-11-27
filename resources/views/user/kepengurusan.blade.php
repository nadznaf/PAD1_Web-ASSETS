@extends('layouts.app')

@section('title', 'Kepengurusan')

@section('content')
<div class="bg-white">
    {{-- top judul --}}
    <div class="mb-24 mx-4 md:mx-32 p-4 md:p-16 text-center">
        <h2 class="mt-2 text-2xl md:text-4xl font-bold text-black uppercase">Kepengurusan amara 2024</h2>
        {{-- {{ $kabinet->nama_kabinet }} {{ $kabinet->tahun_awal_kabinet }} --}}
        <p class="mt-4 md:mt-6 text-base md:text-lg font-light text-description">Struktur kepengurusan Kabinet Amara terdiri dari berbagai divisi yang berfokus pada bidang-bidang penting seperti pengembangan sumber daya anggota, pengembangan bakat, program kerja kreatif, serta manajemen organisasi.</p>
        {{-- {{ $kabinet->deskripsi_kabinet }} --}}
    </div>

    {{-- spesifik kabinet --}}
    <div class="bg-amara grid xs:grid-rows-3 p-16 justify-items-center lg:px-32 lg:grid-cols-3 lg:gap-8 ">
        <div class="grid-rows-1 mb-4 lg:grid-cols-1 justify-items-center">
            <h3 class="text-white font-bold text-3xl" data-aos="">2023-2024</h3>
            <p class="text-white font-light">Tahun kepengurusan</p>
        </div>
        <div class="grid-rows-1 mb-4 lg:grid-cols-1 justify-items-center">
            <h3 class="text-white font-bold text-3xl">7</h3>
            <p class="text-white font-light">Jumlah Proker</p>
        </div>
        <div class="grid-rows-1 mb-4 lg:grid-cols-1 justify-items-center">
            <h3 class="text-white font-bold text-3xl">30</h3>
            <p class="text-white font-light">Member</p>
        </div>
    </div>

    {{-- logo kabinet --}}
    <div class="flex justify-center my-32 px-8 md:my-40">
        <img src="{{ asset('assets/amara_logo.svg') }}" class="w-434 h-103" alt="Assets Logo">
        {{-- {{ asset('storage/datakabinet/' . $kabinet->logo_kabinet) }} --}}
    </div>

    {{-- ketua --}}
    <div class="grid grid-cols-3 justify-between">
        <div class="grid grid-cols-1 bg-gradient-to-r from-amara to-white px-0 md:px-32 py-8 gap-8"></div>
        <h2 class="text-2xl grid grid-col-1 font-extralight text-amara md:text-5xl lg:text-7xl text-center items-center">Ketua</h2>
        <div class="grid grid-col-1 bg-gradient-to-l from-amara to-white px-0 md:px-32 py-8 gap-8"></div>
    </div>
    <div class="flex flex-col items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row" data-modal-target="default-modal" data-modal-toggle="default-modal">
        <img class="object-cover w-full h-96 rounded-lg md:mr-8 md:w-1/2" src="{{ asset('assets/yodhim.svg') }}" alt="Ketua">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl md:text-4xl font-semibold text-amara hover:text-dark">Yodhimas Geffananda</h5>
            <p class="mb-8 font-normal italic text-font">Ketua ASSETS Kabinet AMARA</p>
            <h5 class="mb-2 text-xl md:text-2xl font-semibold text-amara">Tugas dan Tanggung Jawab</h5>
            <p class="mb-3 font-normal text-black">Deskripsi proker. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
        </div>
    </div>
    <div class="flex flex-col-reverse items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row" data-modal-target="default-modal" data-modal-toggle="default-modal">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl md:text-4xl font-semibold text-amara hover:text-dark">Rioga Natayudha</h5>
            <p class="mb-8 font-normal italic text-font">Sekretaris Jendral</p>
            <h5 class="mb-2 text-xl md:text-2xl font-semibold text-amara">Tugas dan Tanggung Jawab</h5>
            <p class="mb-3 font-normal text-black">Deskripsi proker. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
        </div>
        <img class="object-cover w-full h-96 rounded-lg md:ml-16 md:w-1/2" src="{{ asset('assets/rioga.svg') }}" alt="Sekjen">
    </div>

    {{-- Sekretaris --}}
    <div class="grid grid-cols-3 justify-between mt-4">
        <div class="grid grid-cols-1 bg-gradient-to-r from-amara to-white px-0 md:px-32 py-8 gap-8"></div>
        <h2 class="text-2xl grid grid-col-1 font-extralight text-amara md:text-5xl lg:text-7xl text-center items-center">Sekretaris</h2>
        <div class="grid grid-col-1 bg-gradient-to-l from-amara to-white px-0 md:px-32 py-8 gap-8"></div>
    </div>
    <div class="flex flex-col items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row" data-modal-target="default-modal" data-modal-toggle="default-modal">
        <img class="object-cover w-full h-96 rounded-lg md:mr-8 md:w-1/2" src="{{ asset('assets/risma.svg') }}" alt="Ketua">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl md:text-4xl font-semibold text-amara hover:text-dark">Risma Saputri</h5>
            <p class="mb-8 font-normal italic text-font">Sekretaris 1 Kabinet AMARA</p>
            <h5 class="mb-2 text-xl md:text-2xl font-semibold text-amara">Tugas dan Tanggung Jawab</h5>
            <p class="mb-3 font-normal text-black">Deskripsi proker. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
        </div>
    </div>
    <div class="flex flex-col-reverse items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row" data-modal-target="default-modal" data-modal-toggle="default-modal">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl md:text-4xl font-semibold text-amara hover:text-dark">Charizza Thunjung</h5>
            <p class="mb-8 font-normal italic text-font">Sekretaris 2 Kabinet AMARA</p>
            <h5 class="mb-2 text-xl md:text-2xl font-semibold text-amara">Tugas dan Tanggung Jawab</h5>
            <p class="mb-3 font-normal text-black">Deskripsi proker. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
        </div>
        <img class="object-cover w-full h-96 rounded-lg md:ml-16 md:w-1/2" src="{{ asset('assets/charizza.svg') }}" alt="Sekjen">
    </div>

    {{-- bendahara --}}
    <div class="grid grid-cols-3 justify-between mt-4">
        <div class="grid grid-cols-1 bg-gradient-to-r from-amara to-white md:px-32 py-8 gap-8"></div>
        <h2 class="text-2xl grid grid-col-1 font-extralight text-amara md:text-5xl lg:text-7xl text-center items-center">Bendahara</h2>
        <div class="grid grid-col-1 bg-gradient-to-l from-amara to-white md:px-32 py-8 gap-8"></div>
    </div>
    <div class="flex flex-col items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row" data-modal-target="default-modal" data-modal-toggle="default-modal">
        <img class="object-cover w-full h-96 rounded-lg md:mr-8 md:w-1/2" src="{{ asset('assets/luthfi.svg') }}" alt="Ketua">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl md:text-4xl font-semibold text-amara hover:text-dark">Luthfi Lisana S</h5>
            <p class="mb-8 font-normal italic text-font">Bendahara 1 Kabinet AMARA</p>
            <h5 class="mb-2 text-xl md:text-2xl font-semibold text-amara">Tugas dan Tanggung Jawab</h5>
            <p class="mb-3 font-normal text-black">Deskripsi proker. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
        </div>
    </div>
    <div class="flex flex-col-reverse items-center mx-8 md:mx-16 my-16 bg-white rounded-lg md:flex-row" data-modal-target="default-modal" data-modal-toggle="default-modal">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl md:text-4xl font-semibold text-amara hover:text-dark">Marwah Kamila A</h5>
            <p class="mb-8 font-normal italic text-font">Bendahara 2 Kabinet AMARA</p>
            <h5 class="mb-2 text-xl md:text-2xl font-semibold text-amara">Tugas dan Tanggung Jawab</h5>
            <p class="mb-3 font-normal text-black">Deskripsi proker. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed ante porta ligula condimentum condimentum. Pellentesque sollicitudin et nulla id laoreet. Pellentesque.</p>
        </div>
        <img class="object-cover w-full h-96 rounded-lg md:ml-16 md:w-1/2" src="{{ asset('assets/marwah.svg') }}" alt="Sekjen">
    </div>

    {{-- divisi --}}
    <div class="grid grid-cols-3 justify-between mt-4">
        <div class="grid grid-cols-1 bg-gradient-to-r from-amara to-white md:px-32 py-8 gap-8"></div>
        <h2 class="text-2xl grid grid-col-1 font-extralight text-amara md:text-5xl lg:text-7xl text-center items-center">Divisi</h2>
        <div class="grid grid-col-1 bg-gradient-to-l from-amara to-white md:px-32 py-8 gap-8"></div>
    </div>

    {{-- divisi psdm --}}
    <div class="text-center mt-16 mx-6 md:mx-auto max-w-2xl lg:max-w-4xl">
        <h2 class="mt-2 text-2xl md:text-4xl font-semibold text-black uppercase">psdm</h2>
        <p class="mt-4 md:mt-6 mb-8 text-base md:text-lg font-normal text-amara">Pengembangan Sumber Daya Manusia</p>
    </div>
    <div class="flex min-h-full items-center justify-center overflow-x-hidden px-4 py-8 bg-black">
        <div class="group flex justify-center gap-1 px-4">
            <div class="peer order-last flex w-max items-center justify-center gap-1">
                <div class="group relative w-16 lg:w-20 overflow-hidden transition-all duration-500 hover:w-80"
                    data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <div class="h-80 md:h-96">
                        <img class="h-full w-full rounded-lg object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="" />
                    </div>
                    <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                        <div class="relative">
                            <span class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Wakadiv</span>
                            <h2 class="leading-0 font-medium text-gray-700 opacity-0 transition duration-300 group-hover:opacity-100">Yodhimas Geffananda</h2>
                        </div>
                        <span class="text-sm tracking-wide text-gray-600">Wakadiv</span>
                    </div>
                </div>
                <div class="group relative w-16 lg:w-20 overflow-hidden transition-all duration-500 hover:w-80"
                    data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <div class="h-80 md:h-96">
                        <img class="h-full w-full rounded-lg object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="" />
                    </div>
                    <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                        <div class="relative">
                            <span class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Staf</span>
                            <h2 class="leading-0 font-medium text-gray-700 opacity-0 transition duration-300 group-hover:opacity-100">Yodhimas Geffananda</h2>
                        </div>
                        <span class="text-sm tracking-wide text-gray-600">Staf</span>
                    </div>
                </div>
                <div class="group relative w-16 lg:w-20 overflow-hidden transition-all duration-500 hover:w-80"
                    data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <div class="h-80 md:h-96">
                        <img class="h-full w-full rounded-lg object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="" />
                    </div>
                    <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                        <div class="relative">
                            <span class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Staf</span>
                            <h2 class="leading-0 font-medium text-gray-700 opacity-0 transition duration-300 group-hover:opacity-100">Yodhimas Geffananda</h2>
                        </div>
                        <span class="text-sm tracking-wide text-gray-600">Staf</span>
                    </div>
                </div>
                <div class="group relative w-16 lg:w-20 overflow-hidden transition-all duration-500 hover:w-80"
                    data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <div class="h-80 md:h-96">
                        <img class="h-full w-full rounded-lg object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="" />
                    </div>
                    <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                        <div class="relative">
                            <span class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Staf</span>
                            <h2 class="leading-0 font-medium text-gray-700 opacity-0 transition duration-300 group-hover:opacity-100">Yodhimas Geffananda</h2>
                        </div>
                        <span class="text-sm tracking-wide text-gray-600">Staf</span>
                    </div>
                </div>
                <div class="group relative w-16 lg:w-20 overflow-hidden transition-all duration-500 hover:w-80"
                    data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <div class="h-80 md:h-96">
                        <img class="h-full w-full rounded-lg object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="" />
                    </div>
                    <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                        <div class="relative">
                            <span class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Staf</span>
                            <h2 class="leading-0 font-medium text-gray-700 opacity-0 transition duration-300 group-hover:opacity-100">Yodhimas Geffananda</h2>
                        </div>
                        <span class="text-sm tracking-wide text-gray-600">Staf</span>
                    </div>
                </div>
                <div class="group relative w-16 lg:w-20 overflow-hidden transition-all duration-500 hover:w-80"
                    data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <div class="h-80 md:h-96">
                        <img class="h-full w-full rounded-lg object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="" />
                    </div>
                    <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                        <div class="relative">
                            <span class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Staf</span>
                            <h2 class="leading-0 font-medium text-gray-700 opacity-0 transition duration-300 group-hover:opacity-100">Yodhimas Geffananda</h2>
                        </div>
                        <span class="text-sm tracking-wide text-gray-600">Staf</span>
                    </div>
                </div>
                <div class="group relative w-16 lg:w-20 overflow-hidden transition-all duration-500 hover:w-80"
                    data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <div class="h-80 md:h-96">
                        <img class="h-full w-full rounded-lg object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="" />
                    </div>
                    <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                        <div class="relative">
                            <span class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Staf</span>
                            <h2 class="leading-0 font-medium text-gray-700 opacity-0 transition duration-300 group-hover:opacity-100">Yodhimas Geffananda</h2>
                        </div>
                        <span class="text-sm tracking-wide text-gray-600">Staf</span>
                    </div>
                </div>
                <div class="group relative w-16 lg:w-20 overflow-hidden transition-all duration-500 hover:w-80"
                    data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <div class="h-80 md:h-96">
                        <img class="h-full w-full rounded-lg object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="" />
                    </div>
                    <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                        <div class="relative">
                            <span class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Staf</span>
                            <h2 class="leading-0 font-medium text-gray-700 opacity-0 transition duration-300 group-hover:opacity-100">Yodhimas Geffananda</h2>
                        </div>
                        <span class="text-sm tracking-wide text-gray-600">Staf</span>
                    </div>
                </div>
                <div class="group relative w-16 lg:w-20 overflow-hidden transition-all duration-500 hover:w-80"
                    data-modal-target="default-modal" data-modal-toggle="default-modal">
                    <div class="h-80 md:h-96">
                        <img class="h-full w-full rounded-lg object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="" />
                    </div>
                    <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                        <div class="relative">
                            <span class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition duration-300 group-hover:invisible group-hover:opacity-0">Staf</span>
                            <h2 class="leading-0 font-medium text-gray-700 opacity-0 transition duration-300 group-hover:opacity-100">Yodhimas Geffananda</h2>
                        </div>
                        <span class="text-sm tracking-wide text-gray-600">Staf</span>
                    </div>
                </div>

                <!-- Elemen lainnya diatur sama -->
            </div>
            <div class="group relative order-first w-16 lg:w-80 overflow-hidden transition-all duration-500 hover:w-80 peer-hover:w-20"
                data-modal-target="default-modal" data-modal-toggle="default-modal">
                <div class="h-80 md:h-96">
                    <img class="h-full w-full rounded-lg object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="" />
                </div>
                <div class="flex w-full md:w-80 xl:w-96 justify-between px-2 pt-2">
                    <div class="relative">
                        <span class="absolute -left-2 m-auto block text-sm tracking-wide text-gray-600 transition-opacity duration-300 group-hover:invisible group-hover:opacity-0 lg:opacity-0 lg:group-hover:opacity-0 lg:group-hover/list:opacity-100">Kadiv</span>
                        <h2 class="leading-0 lg:group-hover/list:opacity-0 opacity-0 font-medium text-gray-700 transition duration-300 group-hover:opacity-100">Yodhimas Geffananda</h2>
                    </div>
                <span class="text-sm tracking-wide text-gray-600">Kadiv</span>
                </div>
            </div>
        </div>
      </div>

    {{-- foto psdm done --}}
    {{-- proker psdm start --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 m-6 md:m-8">
        <div class="m-8">
            <h5 class="text-amara text-base font-semibold mb-4">Task</h5>
            <p class="font-light text-justify">
                Mengembangkan kualitas sumber daya manusia yang ada.
            </p>
        </div>
        <div class="m-8">
            <h5 class="text-red-500 text-base font-semibold mb-4">Proker</h5>
            <div class="grid grid-rows-4 gap-2">
                <!-- Item 1 -->
                <a href="{{ route('proker') }}">
                    <div class="flex justify-between items-center">
                        <p class="text-black hover:underline">SERIES 2024</p>
                        <div class="bg-yellow-200 text-yellow-700 rounded-xl w-20 text-center py-1 text-xs">
                            Get Ready
                        </div>
                    </div>
                </a>
                <!-- Item 2 -->
                <div class="flex justify-between items-center">
                    <p>Kastrad Update</p>
                    <div class="bg-red-200 text-red-700 rounded-xl w-20 text-center py-1 text-xs">
                        Cancel
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="flex justify-between items-center">
                    <p>Kastrad Update</p>
                    <div class="bg-blue-200 text-blue-700 rounded-xl w-20 text-center py-1 text-xs">
                        On Progress
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="flex justify-between items-center">
                    <p>Kastrad Update</p>
                    <div class="bg-green-200 text-green-700 rounded-xl w-20 text-center py-1 text-xs">
                        Done
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- proker psdm done --}}


</div>


@endsection
