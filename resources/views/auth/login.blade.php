<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- Display validation errors -->
        <x-validation-errors class="mb-4" />

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Field -->
            <div>
                <x-label for="email" value="{{ __('Email') }}" class="text-base font-medium text-gray-700" />
                <x-input
                    id="email"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Enter your email address" />
            </div>

            <!-- Password Field -->
            <div x-data="{ show: false }" class="mt-3 relative">
                <x-label for="password" value="{{ __('Password') }}" class="text-base font-medium text-gray-700" />
                <div>
                    <input
                        :type="show ? 'text' : 'password'"
                        id="password"
                        name="password"
                        class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-base"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password" />

                    <!-- Toggle password visibility -->
                    <div class="absolute right-3 top-9 flex items-center cursor-pointer">
                        <svg x-show="!show" @click="show = !show" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.233.762-.538 1.487-.902 2.166" />
                        </svg>
                        <svg x-show="show" @click="show = !show" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.973 9.973 0 012.509-4.114m1.637-1.474A9.99 9.99 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.959 9.959 0 01-1.62 2.918" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3l18 18" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Remember Me Checkbox -->
            <div class="flex justify-between mt-4">
                <label for="remember_me" class="flex items-center text-base font-medium text-gray-700">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                <a class="underline text-sm text-blue-600 font-medium hover:text-indigo-600 focus:outline-none focus:text-indigo-600" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div>

            <!-- Log In Button -->
            <div class="flex items-center justify-center">
                <x-button class="bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 text-white text-base px-6 py-2 rounded-md transition ease-in-out duration-200">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        <!-- Sign Up Redirect Link -->
        <div class="mt-2 text-center">
            <span class="text-sm text-gray-600">
                {{ __('Don\'t have an account?') }}
                <a href="{{ route('register') }}" class="text-blue-600 underline font-medium hover:text-indigo-800">{{ __('Sign Up') }}</a>
            </span>
        </div>
    </x-authentication-card>
</x-guest-layout>