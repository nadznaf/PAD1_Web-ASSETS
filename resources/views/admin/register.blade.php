<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <link rel="stylesheet" href="{{ asset('css/styleAuthAdmin.css') }}">
    <style>
      @import url(https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200);
      
      @import url(https://fonts.googleapis.com/css2?family=Lato&display=swap);
      
      @import url(https://fonts.googleapis.com/css2?family=Open+Sans&display=swap);
      
      @import url(https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200);
    </style>
  </head>
  <body>
    <div id="webcrumbs"> 
      <div class="container">
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
          <h2 class="text-3xl font-title mb-2">Register</h2>
          <p class="text-sm mb-6">
            Already have an Account?
            <a href="{{ route('login') }}" class="text-blue-600">
              Login
            </a>
          </p>
          <form action="{{ route('store') }}" method="post">
              @csrf
                <div class="space-y-4 mb-6">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                            mail
                        </span>
                        <input type="email" name="email_admin" placeholder="Enter your email address" 
                               class="pl-12 w-full py-3 rounded-md border border-gray-300 focus:outline-none shadow-sm @error('email_admin') is-invalid @enderror" 
                               value="{{ old('email_admin') }}"/>
                        @if ($errors->has('email_admin'))
                            <span class="text-danger">{{ $errors->first('email_admin') }}</span>
                        @endif
                    </div>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                            lock
                        </span>
                        <input type="password" name="password" placeholder="Password" 
                               class="pl-12 w-full py-3 rounded-md border border-gray-300 focus:outline-none shadow-sm @error('password') is-invalid @enderror"/>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                            lock
                        </span>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" 
                               class="pl-12 w-full py-3 rounded-md border border-gray-300 focus:outline-none shadow-sm @error('password') is-invalid @enderror"/>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <button class="w-full bg-teal-900 text-white py-3 rounded-md" value="Register">
                    Sign Up
                </button>
          </form>
        </div>
      </div> 
    </div>
  </body>
</html>