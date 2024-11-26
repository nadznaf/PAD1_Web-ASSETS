@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
    <div class="bg-white">
        <div id="gallery" class="relative w-full h-96 overflow-hidden">
            <img src="{{ asset('assets/article1.jpeg') }}" class="block w-full h-full object-cover" alt="Single Image">
            {{-- {{ $article->image }} --}}
        </div>
        <div class="flex flex-col">
            <div class="mt-16 justify-items-center mx-32">
                <p class="text-judul_aspiration mt-2 mb-6">
                    Sabtu, 16 November 2024 | Oleh:
                        {{-- {{ $article->date }} --}}
                    <span class="underline">
                        Rizky Aisyah
                        {{-- {{ $article->author }} --}}
                    </span>
                </p>
                <h2 class="text-3xl font-bold text-dark text-center underline mb-16 md:px-32">
                    Mahasiswa TRPL Raih Juara 1 dalam Bidang Data Science pada ICONIC IT 2024
                    {{-- {{ $article->title }} --}}
                </h2>
                <div class="mt-4 text-gray-700 text-justify">
                    <p>
                        Pada 24 September 2024, tiga mahasiswa Universitas Gadjah Mada dari program studi Teknologi Rekayasa Perangkat Lunak (TRPL) dan Ilmu Komputer berhasil meraih juara 1 (Data Science) dalam kompetisi ICONIC IT 2024 yang diselenggarakan oleh Fakultas Teknik Universitas Siliwangi. Prestasi ini menjadi bukti kemampuan dan kreativitas yang luar biasa dalam bidang teknologi informasi yang ditunjukkan oleh Tim HaloRek, yang terdiri dari Dwi Anggara Najwan Sugama (TRPL 2023), Muhammad Natha Ulinnuha (Ilmu Komputer 2023), dan Naufal Afif Bauw (Ilmu Komputer 2023).
                    </p>
                    <br>
                    <p>
                        Kompetisi ICONIC IT, yang merupakan bagian dari program kerja Innovative Competition and National Informatics Conference (ICONIC) yang diselenggarakan oleh Himpunan Mahasiswa Informatika (HMIF), memberikan kesempatan kepada para peserta untuk memamerkan ide-ide inovatif mereka di bidang teknologi informasi. Selain itu, perlombaan ini juga menjadi ajang untuk menguji dan mengembangkan keterampilan serta kreativitas individu dalam menghadapi tantangan di era digital.
                    </p>
                    <br>
                    <p>
                        Dengan bimbingan dari dosen TRPL, Dr.Eng. Ganjar Alfian, S.T., M.Eng., Tim HaloRek berhasil melewati babak penyisihan dengan menempati peringkat pertama dan akhirnya lolos ke babak final. Pada babak final, hanya lima tim teratas dari berbagai cabang lomba yang berkesempatan untuk memperebutkan gelar juara. Dalam prosesnya, tim ini melalui tahapan yang kompleks, mulai dari pemahaman masalah, eksplorasi data, pembersihan data, hingga pembangunan dan optimalisasi model. Mereka kemudian harus menyusun laporan dan presentasi untuk memaparkan hasil kerja mereka di hadapan para juri.
                    </p>
                    <br>
                    <p>
                        “Alhamdulillah, saat babak penyisihan, tim kami menempati peringkat pertama,” ungkap Dwi Anggara, yang mengungkapkan rasa syukur atas hasil kerja keras mereka. Kompetisi ini membuktikan bahwa teknologi terus berkembang pesat, dan melalui ajang seperti ICONIC IT, para mahasiswa dapat menunjukkan kemampuan terbaik mereka dalam menciptakan solusi inovatif yang relevan dengan perkembangan zaman.
                    </p>
                    {{-- {{ $article->content }} --}}
                </div>
            </div>
            <div class="my-16 mx-32">
                <p class=" text-font">Referensi:</p>
                <p class=" text-font">https://trpl.sv.ugm.ac.id/2024/09/28/mahasiswa-trpl-raih-juara-1-dalam-bidang-data-science-pada-iconic-it-2024/</p>
            </div>
        </div>
    </div>
@endsection
