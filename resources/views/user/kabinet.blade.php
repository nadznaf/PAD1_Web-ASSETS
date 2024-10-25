@extends('layouts.app')

@section('title', 'KABINET' )
{{-- . $kabinet->nama --}}

@section('content')
{{-- panggil warna kabinet  --}}
<div class="bg-white p-6 shadow-lg">
    <div class="mx-auto px-6 max-w-2xl text-center lg:max-w-4xl">
        {{-- panggil nama kabinet --}}
        <h2 class="mt-2 text-4xl font-bold text-assets sm:text-5xl">KABINET AMARA</h2>
        {{-- panggil desc kabinet --}}
        <p class="mt-6 text-l font-normal text-assets sm:text-m">
            Amara merupakan Kabinet 2024 dari  Assets wbwwwwjajaiiwaiw wjjawj
        </p>
    </div>
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
        <div class="hidden me-16 lg:mt-0 lg:col-span-5 lg:flex">
            <img src="assets/amara_logo.svg" class="w-full h-200" alt="Assets Logo">
        </div>
        <div class="place-self-center lg:col-span-7">
            <h1 class="max-w-xl mb-4 mt-4 text-xl font-semibold leading-none text-assets">Makna</h1>
            <p class="max-w-l mb-6 font-light text-assets lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
            <h1 class="max-w-xl mb-4 mt-4 text-xl font-semibold leading-none text-assets">visi</h1>
            <p class="max-w-l mb-6 font-light text-assets lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
            <h1 class="max-w-xl mb-4 mt-4 text-xl font-semibold leading-none text-assets">Misi</h1>
            <p class="max-w-l mb-6 font-light text-assets lg:mb-8 md:text-m lg:text-l">The welcoming event for new TRPL students 2024 includes activities that foster togetherness, enrich knowledge, and inspire young software engineers to pursue their dreams.</p>
        </div>
    </div>
</div>
@endsection
