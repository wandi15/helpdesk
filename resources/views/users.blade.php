<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('User Management') }}
                </h2>
                <p class="text-sm text-gray-600 mt-1">Kelola semua user dalam sistem</p>
            </div>
        </div>
    </x-slot>

    <livewire:user-management />
</x-app-layout>
