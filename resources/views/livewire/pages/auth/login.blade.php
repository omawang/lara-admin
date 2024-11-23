<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
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
    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        Sign in to your account
    </h1>

    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form class="space-y-4 md:space-y-6" wire:submit="login">
        <div>
            <x-forms.label for="email">Your email</x-forms.label>
            <x-forms.text-input wire:model="form.email" type="email" name="email" id="email"
                placeholder="name@company.com" required />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>
        <div>
            <x-forms.label for="password">Password</x-forms.label>
            <x-forms.text-input wire:model="form.password" type="password" name="password" id="password"
                placeholder="••••••••" required />
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-start">
                <!-- Remember Me -->
                <div class="flex items-center h-5">
                    <input wire:model="form.remember" id="remember" aria-describedby="remember" type="checkbox"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                </div>
                <div class="ml-3 text-sm">
                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                </div>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" :wire:navigate
                    class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                    password?</a>
            @endif
        </div>
        <x-forms.button type="submit" class="w-full">Sign in</x-forms.button>
        @if (Route::has('register'))
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                Don’t have an account yet? <a href="{{ route('register') }}"
                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
            </p>
        @endif
    </form>

    {{-- <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
</div>
