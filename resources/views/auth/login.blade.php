<x-guest-layout>
    {{-- <div class="items-center justify-center"> --}}
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        
            <!-- Logo Side -->
            <div class=" items-center justify-center">
                <div class="text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-44 mx-auto mb-4">
                </div>
            </div>

            <!-- Form Side -->
            <div class="p-10">
                <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">Login to Your Account</h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email"
                                      class="block mt-1 w-full"
                                      type="email"
                                      name="email"
                                      :value="old('email')"
                                      required
                                      autofocus
                                      autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password"
                                      class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required
                                      autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-4 flex items-center">
                        <input id="remember_me"
                               type="checkbox"
                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                               name="remember">
                        <label for="remember_me" class="ml-2 text-sm text-gray-600">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <div class="flex items-center justify-between">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:underline"
                               href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                         <!-- Submit Button -->
                  <!-- Submit Button -->
<div>
    <button type="submit"
            style="background-color: #007BFF; color: white; font-weight: bold; border-radius: 4px; padding: 10px; width: 100%; border: none;"
            class="hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
        {{ __('Log in') }}
    </button>
</div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
