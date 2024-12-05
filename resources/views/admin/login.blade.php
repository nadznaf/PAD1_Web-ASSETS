<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="{{ asset('css/styleAuthAdmin.css') }}">
    @vite('resources/css/stylesAdmin.css')
    <style>
      @import url(https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200);

      @import url(https://fonts.googleapis.com/css2?family=Lato&display=swap);

      @import url(https://fonts.googleapis.com/css2?family=Open+Sans&display=swap);

      @import url(https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200);

      body{
        background-color: #95b1af!important;
      }
    </style>
  </head>
  <body>
    <div id="webcrumbs">
      <div class="container gx-0">
        <div class="left-section">
          <div class="flex flex-col items-left">
            <img src="{{ asset('imagesAdmin/logoAssets.svg') }}" alt="logo" class="object-contain w-[150px] h-[80px] mb-6"/>
          </div>
          <div class="text-left">
            <p class="text-2xl font-title">Welcome!</p>
            <p class="text-sm">Admin Software Engineer</p>
          </div>
        </div>

        <div class="right-section">
          <h2 class="text-3xl font-title mb-2">Log In</h2>
            <p class="text-sm">Please enter your email and password</p>
          @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        <li><strong>Reload this page!</strong></li>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @endforeach
                </ul>
            </div>
          @endif
          <form action="{{ route('authenticate') }}" method="post">
          @csrf
          <div class="space-y-4 mb-6">
            <div class="relative">
              <span class="material-symbols-outlined absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                mail
              </span>
              <input type="email" name="email_admin" placeholder="Enter your email address" class="pl-12 w-full py-3 rounded-md border border-gray-300 focus:outline-none shadow-sm @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
              @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>

            <div class="relative">
              <span class="material-symbols-outlined absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                lock
              </span>
              <input type="password" name="password" placeholder="Password" class="pl-12 w-full py-3 rounded-md border border-gray-300 focus:outline-none shadow-sm  @error('password') is-invalid @enderror"/>
            </div>
            </div>
            <button class="w-full bg-teal-900 text-white py-3 rounded-md" value="Login">
              Sign In
            </button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
