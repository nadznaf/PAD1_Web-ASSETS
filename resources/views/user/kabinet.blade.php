@extends('layouts.app')

@section('title', 'KABINET' )
{{-- . $kabinet->nama --}}

@section('content')
<style>
    #footer {
        background-color: {{ $kabinet->color_pallete->primary_color }}!important;
    }
</style>
{{-- panggil warna kabinet  --}}
<div class="bg-white">
    <div class="mx-auto px-6 max-w-2xl text-center lg:max-w-4xl">
        {{-- panggil nama kabinet --}}
        <h2 class="mt-2 text-4xl font-bold text-amara sm:text-5xl uppercase">kabinet amara</h2>
        {{-- panggil desc kabinet --}}
        <p class="mt-6 text-l font-normal text-amara sm:text-m">
            Amara merupakan Kabinet 2024 dari  Assets wbwwwwjajaiiwaiw wjjawj
        </p>
    </div>
    <div class="grid grid-cols-12 max-w-screen-xl px-16 py-8 mb-32 mx-auto">
        <div class="col-span-12 text-center my-8 me-16 md:col-span-5">
            <img src="{{ asset('storage/datakabinet/' . $kabinet->logo_kabinet) }}" class="w-full h-full" alt="Amara Logo">
        </div>
        <div class="col-span-12 my-8 md:col-span-7">
            <div class="grid grid-cols-7">
                <div class="col-span-1 w-6 h-6 ms-10 mt-1 bg-amara rounded-full"></div>
                <div class="col-span-6">
                    <h1 class="max-w-xl mb-2 text-xl font-semibold text-dark">Makna</h1>
                    <p class="max-w-l mb-6 font-light text-dark lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
                </div>
            </div>
            <div class="grid grid-cols-7">
                <div class="col-span-1 w-6 h-6 ms-10 mt-1 bg-amara rounded-full"></div>
                <div class="col-span-6">
                    <h1 class="max-w-xl mb-2 text-xl font-semibold text-dark">Visi</h1>
                    <p class="max-w-l mb-6 font-light text-dark lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
                </div>
            </div>
            <div class="grid grid-cols-7">
                <div class="col-span-1 w-6 h-6 ms-10 mt-1 bg-amara rounded-full"></div>
                <div class="col-span-6">
                    <h1 class="max-w-xl mb-2 text-xl font-semibold text-dark">Misi</h1>
                    <p class="max-w-l mb-6 font-light text-dark lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>

                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto px-6 max-w-2xl text-center lg:max-w-4xl">
        {{-- panggil nama kabinet --}}
        <h2 class="mt-2 text-4xl font-bold text-amara sm:text-2xl uppercase">divisi kepengurusan amara</h2>
        {{-- panggil desc kabinet --}}
        <p class="mt-6 mb-8 text-l font-normal text-amara sm:text-m">
            Amara merupakan Kabinet 2024 dari  Assets wbwwwwjajaiiwaiw wjjawj
        </p>
    </div>
    <div class="grid grid-cols-4 gap-2 mb-32 px-6 justify-items-center">
        <figure class="basis-1/4 max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
            <a href="{{ route('kabinet') }}">
                <img class="rounded-large" src="{{ asset('assets/yodhim.svg') }}" alt="Kabinet Amara">
            </a>
            <figcaption class="absolute px-4 text-white bottom-6">
                <p class="font-bold text-xl">Ketua Kabinet</p>
                <p class="text-bold text-xl">Yodhimas Geffananda</p>
            </figcaption>
        </figure>
        <figure class="basis-1/4 max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
            <a href="{{ route('kabinet') }}">
                <img class="rounded-large" src="{{ asset('assets/rioga.svg') }}" alt="Kabinet Amara">
            </a>
            <figcaption class="absolute px-4 text-white bottom-6">
                <p class="font-bold text-xl">Sekretaris Jenderal</p>
                <p class="text-bold text-xl">Rioga Natayudha</p>
            </figcaption>
        </figure>
        <figure class="basis-1/4 max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
            <a href="{{ route('kabinet') }}">
                <img class="rounded-large" src="{{ asset('assets/risma.svg') }}" alt="Kabinet Amara">
            </a>
            <figcaption class="absolute px-4 text-white bottom-6">
                <p class="font-bold text-xl">Sekretaris 1</p>
                <p class="text-bold text-xl">Risma Saputri</p>
            </figcaption>
        </figure>
        {{-- <figure class="basis-1/3 max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
            <a href="{{ route('kabinet') }}">
                <img class="rounded-large" src="assets/charizza.svg" alt="Kabinet Amara">
            </a>
            <figcaption class="absolute px-4 text-white bottom-6">
                <p class="font-bold text-xl">Sekretaris 2</p>
                <p class="text-bold text-xl">Charizza Thunjung</p>
            </figcaption>
        </figure> --}}
        <figure class="basis-1/4 max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
            <a href="{{ route('kabinet') }}">
                <img class="rounded-large" src="{{ asset('assets/luthfi.svg') }}" alt="Kabinet Amara">
            </a>
            <figcaption class="absolute px-4 text-white bottom-6">
                <p class="font-bold text-xl">Bendahara 1</p>
                <p class="text-bold text-xl">Luthfi Lisana S</p>
            </figcaption>
        </figure>
        {{-- <figure class="basis-1/3 max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
            <a href="{{ route('kabinet') }}">
                <img class="rounded-large" src="assets/marwah.svg" alt="Kabinet Amara">
            </a>
            <figcaption class="absolute px-4 text-white bottom-6">
                <p class="font-bold text-xl">Bendahara 2</p>
                <p class="text-bold text-xl">Marwah Kamila A</p>
            </figcaption>
        </figure> --}}
    </div>
    <div class="grid grid-cols-5 justify-items-center gap-4 mb-32 lg:grid-cols-5 lg:gap-4 lg:mb-32">
        <img class="rounded-full w-60 h-60 object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="image description">
        <img class="rounded-full w-60 h-60 object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="image description">
        <img class="rounded-full w-60 h-60 object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="image description">
        <img class="rounded-full w-60 h-60 object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="image description">
        <img class="rounded-full w-60 h-60 object-cover" src="{{ asset('assets/yodhim.svg') }}" alt="image description">
    </div>

    <div class="bg-black p-8 m-0">
        <div class="mx-auto px-6 max-w-2xl text-center lg:max-w-4xl">
            {{-- panggil nama kabinet --}}
            <h2 class="mt-2 text-5xl font-bold text-amara sm:text-2xl uppercase">Dokumentasi Terbaru</h2>
            {{-- panggil desc kabinet --}}
            <p class="mt-6 mb-8 text-l font-normal text-white sm:text-m">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima quisquam magni voluptatem quae non eveniet, repudiandae nam ullam adipisci quia officiis, provident reiciendis maxime ducimus aliquid velit ea tempore consectetur.
            </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg" alt="">
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
