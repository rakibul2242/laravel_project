<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Field -->
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Email Field -->
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Password Field with Show/Hide -->
            <div x-data="{ show: false }" class="mt-4 relative">
                <x-label for="password" value="{{ __('Password') }}" />
                <input :type="show ? 'text' : 'password'" id="password" name="password"
                    class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    required autocomplete="new-password" />

                <!-- Password Visibility Toggle Icon -->
                <div class="absolute inset-y-0 right-3 top-9 flex items-center">
                    <svg x-show="!show" @click="show = !show" xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-gray-500 cursor-pointer" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.233.762-.538 1.487-.902 2.166" />
                    </svg>
                    <svg x-show="show" @click="show = !show" xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-gray-500 cursor-pointer" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.973 9.973 0 012.509-4.114m1.637-1.474A9.99 9.99 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.959 9.959 0 01-1.62 2.918" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3l18 18" />
                    </svg>
                </div>
            </div>

            <!-- Confirm Password Field with Show/Hide -->
            <div x-data="{ show: false }" class="mt-4 relative">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation"
                    class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    required autocomplete="new-password" />

                <!-- Password Confirmation Visibility Toggle Icon -->
                <div class="absolute inset-y-0 right-3 top-9 flex items-center">
                    <svg x-show="!show" @click="show = !show" xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-gray-500 cursor-pointer" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.233.762-.538 1.487-.902 2.166" />
                    </svg>
                    <svg x-show="show" @click="show = !show" xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-gray-500 cursor-pointer" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.973 9.973 0 012.509-4.114m1.637-1.474A9.99 9.99 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.959 9.959 0 01-1.62 2.918" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3l18 18" />
                    </svg>
                </div>
            </div>

            <!-- Terms and Conditions -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Register Button -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
