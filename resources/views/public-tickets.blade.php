<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} - All Tickets</title>

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
        <div class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 animate-gradient relative overflow-hidden">
            <!-- Decorative circles -->
            <div class="absolute top-0 left-0 w-72 h-72 bg-white rounded-full mix-blend-overlay filter blur-xl opacity-20 animate-float"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full mix-blend-overlay filter blur-xl opacity-20 animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-white rounded-full mix-blend-overlay filter blur-xl opacity-20 animate-float" style="animation-delay: 4s;"></div>
            
            <!-- Header -->
            <header class="relative z-10 px-6 py-6">
                <div class="max-w-7xl mx-auto flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <a href="{{ url('/') }}" class="flex items-center gap-3 hover:opacity-80 transition-opacity">
                            <div class="w-12 h-12 bg-white rounded-lg shadow-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-white">{{ config('app.name') }}</h1>
                                <p class="text-sm text-indigo-100">Support Ticket System</p>
                            </div>
                        </a>
                    </div>
                    @if (Route::has('login'))
                        <div class="flex items-center gap-4">
                            <a href="{{ url('/') }}" class="px-4 py-2 text-white hover:text-white/80 transition-all font-medium flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                New Ticket
                            </a>
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-white/20 backdrop-blur-sm text-white rounded-lg hover:bg-white/30 transition-all font-medium">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 text-white hover:text-white/80 transition-all font-medium">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-4 py-2 bg-white text-indigo-600 rounded-lg hover:bg-white/90 transition-all font-medium shadow-lg">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </header>

            <!-- Main Content -->
            <main class="relative z-10 px-6 py-8">
                <div class="max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full mb-4">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                            <span class="text-white font-medium">Public Ticket Tracking</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-3 drop-shadow-lg">
                            Monitor All Tickets
                        </h2>
                        <p class="text-lg text-indigo-100 max-w-2xl mx-auto">
                            Track the progress of all support tickets in real-time
                        </p>
                    </div>

                    <!-- Tickets List Card -->
                    <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden">
                        <div class="p-6">
                            <livewire:form-ticket.list-ticket />
                        </div>
                    </div>

                    <!-- Info Section -->
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center">
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </div>
                            <h3 class="text-white font-semibold mb-2">Real-Time Tracking</h3>
                            <p class="text-indigo-100 text-sm">Monitor ticket status and progress updates</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center">
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                </svg>
                            </div>
                            <h3 class="text-white font-semibold mb-2">Advanced Filters</h3>
                            <p class="text-indigo-100 text-sm">Search and filter by status or priority</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center">
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                </svg>
                            </div>
                            <h3 class="text-white font-semibold mb-2">Transparent System</h3>
                            <p class="text-indigo-100 text-sm">Open visibility for all users</p>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="text-center mt-8 text-white/80 text-sm">
                        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
        @livewireScripts
    </body>
</html>
