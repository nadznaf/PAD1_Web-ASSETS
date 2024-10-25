{{-- Footer start --}}
<footer class="bg-assets">
    <div class="container px-6 py-8 mx-auto w-full">
        <div class="flex flex-col items-center text-center">
            <a href="#">
                <img class="w-auto h-8 mb-4" src="assets/assets_logo_white.svg" alt="Assets Logo">
            </a>
            <div class="flex flex-wrap justify-center mt-6 -mx-4">
                <a href="{{ route('home') }}" class="mx-4 text-sm text-white transition-colors duration-300 hover:text-second_a" aria-label="Reddit"> Home </a>
                <a href="{{ route('artikel') }}" class="mx-4 text-sm text-white transition-colors duration-300 hover:text-second_a" aria-label="Reddit"> Artikel </a>
                <a href="{{ route('about') }}" class="mx-4 text-sm text-white transition-colors duration-300 hover:text-second_a " aria-label="Reddit"> About </a>
            </div>

        </div>

        <hr class="my-6 border-white md:my-10 " />

        <div class="flex flex-col items-center sm:flex-row sm:justify-between">
            <p class="text-sm font-light text-white mb-4">© 2024 Copyright ANDZ. All Rights Reserved.</p>

            <div class="flex -mx-2">
                <a href="https://mail.google.com/mail/u/0/?hl=en&tf=cm&fs=1&to=assets.ugm@gmail.com" class="mx-2 text-gray-600 transition-colors duration-300 " aria-label="Email">
                    <img src="assets/mail_logo.svg" class="w-15 h-15 fill-current" alt="Email">
                </a>

                <a href="https://www.instagram.com/assets_ugm" class="mx-2 text-gray-600 transition-colors duration-300 " aria-label="Instagram">
                    <img src="assets/instagram_logo.svg" class="w-15 h-15 fill-current" alt="Instagram">
                </a>

                <a href="https://x.com/assets_ugm?t=fFWtYWLD0COBezXXCTH3vw&s=09" class="mx-2 text-gray-600 transition-colors duration-300 " aria-label="Twitter">
                    <img src="assets/twitter_logo.svg" class="w-15 h-15 fill-current" alt="Twitter">
                </a>

                <a href="https://www.facebook.com/share/Q8ocoXcgkDKVXDTc/" class="mx-2 text-gray-600 transition-colors duration-300 " aria-label="Facebook">
                    <img src="assets/facebook_logo.svg" class="w-15 h-15 fill-current" alt="Facebook">
                </a>
            </div>
        </div>
    </div>
</footer>

