<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- Information about the password reset process -->
        <div class="mb-6 text-sm text-gray-600">
            {{ __('Don\'t worry! Just provide your email address, and we will send you a password reset link so you can choose a new one.') }}
        </div>

        <!-- Display session status message -->
        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <!-- Display validation errors -->
        <x-validation-errors class="mb-4" />

        <!-- Password reset form -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Field -->
            <div class="block mb-6">
                <x-label for="email" value="{{ __('Enter your Email') }}" class="text-base font-medium text-gray-700" />
                <x-input 
                    id="email" 
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base px-4 py-2" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username" 
                    placeholder="example@example.com" 
                />
            </div>

            <!-- Submit Button (centered) -->
            <div class="flex items-center justify-center mt-6">
                <x-button class="bg-blue-600 hover:bg-indigo-700 text-white text-base px-6 py-2 rounded-md transition ease-in-out duration-200">
                    {{ __('Send Reset Link') }}
                </x-button>
            </div>
        </form>

        <!-- Redirect to Login page -->
        <div class="mt-4 text-center">
            <span class="text-sm text-gray-600">
                {{ __('Remembered your password?') }}
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 text-medium underline">{{ __('Log In') }}</a>
            </span>
        </div>
    </x-authentication-card>
</x-guest-layout>
