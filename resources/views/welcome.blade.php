<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} - Submit Support Ticket</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
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
    <body class="antialiased font-sans">
        <!-- Background with gradient animation -->
        {{-- <div class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 animate-gradient relative overflow-hidden"> --}}
        <div class="min-h-screen bg-gradient-to-br from-indigo-500 via-yellow-500 to-blue-500 animate-gradient relative overflow-hidden">    
            <!-- Decorative circles -->
            <div class="absolute top-0 left-0 w-72 h-72 bg-white rounded-full mix-blend-overlay filter blur-xl opacity-20 animate-float"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full mix-blend-overlay filter blur-xl opacity-20 animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-white rounded-full mix-blend-overlay filter blur-xl opacity-20 animate-float" style="animation-delay: 4s;"></div>
            
            <!-- Header -->
            <header class="relative z-10 px-6 py-6">
                <div class="max-w-7xl mx-auto flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-white rounded-lg shadow-lg flex items-center justify-center p-2">
                            <img src="{{ asset('images/support-ticket.png') }}" alt="Support Ticket Icon" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-white">{{ config('app.name') }}</h1>
                            <p class="text-sm text-indigo-100">Support Ticket System PT Jamkrida Kalsel (Perseroda)</p>
                        </div>
                    </div>
                    @if (Route::has('login'))
                        <div class="flex items-center gap-4">
                            <a href="{{ route('public.tickets') }}" class="px-4 py-2 text-white hover:text-white/80 transition-all font-medium flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                </svg>
                                View Tickets
                            </a>
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-white/20 backdrop-blur-sm text-white rounded-lg hover:bg-white/30 transition-all font-medium">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 text-white hover:text-white/80 transition-all font-medium">
                                    Log in
                                </a>
                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-4 py-2 bg-white text-indigo-600 rounded-lg hover:bg-white/90 transition-all font-medium shadow-lg">
                                        Register
                                    </a>
                                @endif --}}
                            @endauth
                        </div>
                    @endif
                </div>
            </header>

            <!-- Main Content -->
            <main class="relative z-10 px-6 py-12">
                <div class="max-w-4xl mx-auto">
                    <!-- Hero Section -->
                    <div class="text-center mb-12">
                        <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            <span class="text-white font-medium">Fast Response Time</span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 drop-shadow-lg">
                            Butuh Bantuan Teknis? Kirim Laporan Anda
                        </h2>
                        <p class="text-xl text-indigo-100 max-w-2xl mx-auto">
                            Tim IT kami siap membantu menyelesaikan kendala Anda. Silakan isi formulir di bawah ini, dan kami akan segera menghubungi Anda untuk memberikan solusi terbaik.
                        </p>
                    </div>

                    <!-- Ticket Form Card -->
                    <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden">
                        <div class="px-8 py-10">
                            <livewire:form-ticket.create-ticket />
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center">
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-white font-semibold mb-2">Quick Response</h3>
                            <p class="text-indigo-100 text-sm">We aim to respond within 24 hours</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center">
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <h3 class="text-white font-semibold mb-2">Secure & Private</h3>
                            <p class="text-indigo-100 text-sm">Your data is protected and encrypted</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center">
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-white font-semibold mb-2">Expert Support</h3>
                            <p class="text-indigo-100 text-sm">Professional team ready to help</p>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="text-center mt-12 text-white/80 text-sm">
                        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
        {{-- @livewireScripts --}}
    </body>
</html>
