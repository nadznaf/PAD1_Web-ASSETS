<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden fade overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-1000 max-w-4xl max-h-full">
        <div class="grid grid-cols-1 md:grid-cols-2 bg-white rounded-lg shadow">
            {{-- modal image --}}
            {{-- @if (@isset($mahasiswa)) --}}
            <div class="p-8 h-60 md:h-full md:grid-cols-1 justify-center rounded-lg">
                <img class="object-none object-center w-full h-60 md:h-fit md:w-fit rounded-lg mx-auto" src="{{ asset('storage/' . $mahasiswa->foto_profil_mhs) }}" alt="Detail mahasiswa">

            </div>
            {{-- content modal --}}
            <div class="relative p-8 md:ps-4 grid-cols-1 justify-center rounded-lg">
                <p class="text-end uppercase text-sm text-description mt-4">TRPL {{ substr($mahasiswa->nim_mhs, 0, 2) }}</p>

                <h3 class="py-4 text-2xl lg:text-4xl font-bold text-assets">
                    {{ $mahasiswa->nama_mhs }}
                </h3>
                <!-- Modal body -->
                <div class="py-4">
                    <p class="text-base font-light text-font">
                        Jabatan:
                    </p>
                    <p class="text-base font-semibold text-font">
                        {{ $mahasiswa->staff->nama_jabatan }}
                    </p>
                    <p class="text-base font-light text-font mt-6">
                        Jabatan dalam proker:
                    </p>
                    {{-- foreach --}}
                    <p class="text-base font-semibold text-font">
                        {{-- {{ $mahasiswa->pelaksana->jabatan_pelaksana }} --}}pelaksana
                    </p>
                    {{-- endforeach --}}
                </div>
                <!-- Tombol tutup -->
                <div class="flex justify-end">
                    <button data-modal-hide="default-modal" type="button" class="py-2 px-6 text-sm font-medium text-white focus:outline-none bg-assets rounded-lg hover:bg-black">
                        Tutup
                    </button>
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </div>
</div>
