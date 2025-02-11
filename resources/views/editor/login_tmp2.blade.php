<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md px-6 py-6 bg-white shadow-md rounded-lg">
            <h2 class="text-2xl font-bold text-center mb-6">
                {{ __('管理者ログイン画面') }}
            </h2>

            <!-- エラーメッセージ -->
            @if(session('error'))
                <div class="mb-4 text-red-600">
                    {{ session('error') }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- 管理者ID -->
                <div>
                    <x-input-label for="username" :value="__('管理者ID')" />
                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- パスワード -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex justify-center mt-4">
                    <x-primary-button class="ml-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
