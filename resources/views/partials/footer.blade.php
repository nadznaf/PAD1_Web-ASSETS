{{-- Footer start --}}
<footer id="footer" class="bg-assets">
    <div class="container px-8 py-8 mx-auto w-full">
        <div class="flex flex-col items-center text-center">
            <a href="#">
                <img class="w-auto h-8 mb-4" src="{{ asset('assets/assets_logo_white.svg') }}" alt="Assets Logo">
            </a>
            <div class="flex flex-wrap justify-center mt-6 -mx-4">
                <a href="{{ route('home') }}"
                    class="mx-4 text-sm text-white transition-colors duration-300 hover:text-second_a"
                    aria-label="Reddit"> Beranda </a>
                <a href="{{ route('artikel') }}"
                    class="mx-4 text-sm text-white transition-colors duration-300 hover:text-second_a"
                    aria-label="Reddit"> Artikel </a>
                <a href="{{ route('about') }}"
                    class="mx-4 text-sm text-white transition-colors duration-300 hover:text-second_a "
                    aria-label="Reddit"> Tentang Kami </a>
            </div>

        </div>

        <hr class="my-6 border-white md:my-10 " />

        <div class="flex flex-col items-center sm:flex-row sm:justify-between">
            <p class="text-sm font-light text-white mb-4">Made by IPTEK
                ASSETS © {{ \Carbon\Carbon::now()->isoFormat('Y') }}</p>

            <div class="flex">
                <a href="https://mail.google.com/mail/u/0/?hl=en&tf=cm&fs=1&to=assets.ugm@gmail.com" class="mx-4"
                    aria-label="Email" target="_blank">
                    <div class="group rounded-full p-2 bg-white hover:bg-dark hover:duration-75">
                        <svg class="w-15 h-15 text-dark group-hover:text-white hover:duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                        </svg>
                    </div>
                </a>
                <a href="https://www.instagram.com/assets_ugm" class="mx-4" aria-label="Instagram" target="_blank">
                    <div class="group rounded-full p-2 bg-white hover:bg-dark hover:duration-75">
                        <svg class="w-15 h-15 text-dark group-hover:text-white hover:duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </a>
                <a href="https://x.com/assets_ugm?t=fFWtYWLD0COBezXXCTH3vw&s=09" class="mx-4" aria-label="X"
                    target="_blank">
                    <div class="group rounded-full p-2 bg-white hover:bg-dark hover:duration-75">
                        <svg class="w-15 h-15 text-dark group-hover:text-white hover:duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z" />
                        </svg>
                    </div>
                </a>

                <a href="https://www.facebook.com/share/Q8ocoXcgkDKVXDTc/" class="mx-4" aria-label="Facebook"
                    target="_blank">
                    <div class="group rounded-full p-2 bg-white hover:bg-dark hover:duration-75">
                        <svg class="w-15 h-15 text-dark group-hover:text-white hover:duration-75" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</footer>
