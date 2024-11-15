<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden fade overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-1000 max-w-4xl max-h-full">
        <div class="grid grid-cols-2 bg-white rounded-lg shadow">
            {{-- modal image --}}
            <div class="p-8 grid-cols-1 justify-center rounded-lg">
                <img class="w-fit h-fit rounded-lg mx-auto" src="{{ asset('assets/yodhim.svg') }}" alt="Detail mahasiswa">
            </div>
            {{-- content modal --}}
            <div class="pr-8 py-8 grid-cols-1 justify-center rounded-lg">
                <p class="text-end uppercase text-sm text-description">TRPL 22</p>
                <h3 class="py-4 text-4xl font-bold text-amara">
                    Yodhimas Geffananda
                </h3>
                <!-- Modal body -->
                <div class="py-4">
                    <p class="text-base font-light text-font">
                        Jabatan:
                    </p>
                    <p class="text-base font-semibold text-font">
                        Ketua ASSETS Kabinet AMARA
                    </p>
                    <p class="text-base font-light text-font">
                        Jabatan dalam proker:
                    </p>
                    <p class="text-base font-semibold text-font">
                        Ketua SERIES 2023
                    </p>
                    <p class="text-base font-semibold text-font">
                        Staff DDD LIGA TRPL 2023
                    </p>
                </div>
                <div class="flex justify-end sticky-bottom">
                    <button data-modal-hide="default-modal" type="button" class="py-1 px-6 text-sm font-medium text-white focus:outline-none bg-amara rounded-lg hover:bg-black">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
