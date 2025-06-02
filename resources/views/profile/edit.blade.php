<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div
                class="p-4 sm:p-8 bg-white dark:bg-white/[0.03] border border-gray-200 dark:border-cyan-400/30 sm:rounded-lg shadow-none dark:shadow-xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div
                class="p-4 sm:p-8 bg-white dark:bg-white/[0.03] border border-gray-200 dark:border-cyan-400/30 sm:rounded-lg shadow-none dark:shadow-xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div
                class="p-4 sm:p-8 bg-white dark:bg-white/[0.03] border border-gray-200 dark:border-cyan-400/30 sm:rounded-lg shadow-none dark:shadow-xl">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>