<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <!-- Header -->
    <div class="text-center mb-8">
        <h3 class="text-2xl font-bold text-gray-800">Sign In</h3>
        <p class="text-gray-500 text-sm mt-2">Enter your credentials to access your account</p>
    </div>

    <form wire:submit="login" class="space-y-6">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 font-semibold" />
            <div class="relative mt-2">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
                <x-text-input 
                    wire:model="form.email" 
                    id="email" 
                    class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" 
                    type="email" 
                    name="email" 
                    placeholder="admin@admin.com"
                    required 
                    autofocus 
                    autocomplete="username" 
                />
            </div>
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
            <div class="relative mt-2">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <x-text-input 
                    wire:model="form.password" 
                    id="password" 
                    class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required 
                    autocomplete="current-password" 
                />
            </div>
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember" class="inline-flex items-center cursor-pointer group">
                <input 
                    wire:model="form.remember" 
                    id="remember" 
                    type="checkbox" 
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-2 transition duration-200 cursor-pointer" 
                    name="remember"
                >
                <span class="ms-2 text-sm text-gray-600 group-hover:text-gray-800 transition duration-200">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:text-indigo-800 font-medium transition duration-200" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-[1.02] transition-all duration-200">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                {{ __('Sign in to your account') }}
            </button>
        </div>

        <!-- Register Link -->
        @if (Route::has('register'))
            <div class="text-center mt-6 pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" wire:navigate class="font-medium text-indigo-600 hover:text-indigo-800 transition duration-200">
                        Create one now
                    </a>
                </p>
            </div>
        @endif
    </form>
</div>
