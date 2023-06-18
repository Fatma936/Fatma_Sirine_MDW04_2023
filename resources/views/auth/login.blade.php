
<x-guest-layout>
<div class="col mx-auto" >
    <div class="card">
        <div class="card-body" >
            <div class="border p-4 rounded">
                <div class="text-center">
                    <h2 >Sign in</h2>
                    <p>Please sign in to access your account</p>
                </div>
            <div class="d-grid" style="text-align: center;">
            <img src="assets/images/logi-icon.png" class="logo-icon" alt="logo icon" style="width: 200px; display: block; margin: 0 auto;">
        </div>
        <div class="login-separater text-center mb-4">
            <hr/>
        </div>
        <div class="form-body">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
           
        </form>
    </div>
</div>    

</x-guest-layout>
