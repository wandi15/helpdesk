<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
            @keyframes gradient {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            .animate-gradient {
                background-size: 200% 200%;
                animation: gradient 15s ease infinite;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Background with gradient animation -->
        {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 animate-gradient relative overflow-hidden"> --}}
        <div class="min-h-screen flex flex-col  bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 animate-gradient relative overflow-hidden">
            <!-- Decorative circles -->
            <div class="absolute top-0 left-0 w-72 h-72 bg-white rounded-full mix-blend-overlay filter blur-xl opacity-20 animate-float"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full mix-blend-overlay filter blur-xl opacity-20 animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-white rounded-full mix-blend-overlay filter blur-xl opacity-20 animate-float" style="animation-delay: 4s;"></div>
            
            <!-- Content -->
            <div class="relative z-10 w-full max-md px-8">
                <!-- Logo/Header -->
                <div class="text-center mb-8 pt-8 sm:pt-12">
                    <a href="/" wire:navigate class="inline-block">
                        <div class="w-20 h-20 bg-white rounded-full shadow-lg flex items-center justify-center mx-auto mb-4 transform hover:scale-110 transition-transform duration-300">
                            <x-application-logo class="w-12 h-12 fill-current text-indigo-600" />
                        </div>
                    </a>
                    <h2 class="text-3xl font-bold text-white drop-shadow-lg">{{ config('app.name', 'Helpdesk') }}</h2>
                    {{-- <p class="text-indigo-100 mt-2">Welcome back! Please login to continue</p> --}}
                </div>

                <!-- Card -->
                <div class="bg-white/95 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
                    <div class="px-8 py-10">
                        {{ $slot }}
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="text-center mt-6 text-white text-sm">
                    <p class="opacity-80">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                </div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>
