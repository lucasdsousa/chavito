<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('admin') }}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin-novo') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-5">
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full"
                                type="text"
                                name="name"
                                required autocomplete="current-name" />
            </div>

            <div class="mt-5">
                <x-label for="email" :value="__('E-mail')" />

                <x-input id="email" class="block mt-1 w-full"
                                type="email"
                                name="email"
                                required autocomplete="current-email" />
            </div>

            <div class="mt-5">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3" style="background: #ff4d94; font-weight:bold">
                    {{ __('Cadastrar') }}</a>
                </x-button>
            </div>
        </form>
        
        <form method="GET" action="{{ route('admin.administradores') }}">

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3" style="background: #00ffff; font-weight:bold">
                    {{ __('Cancelar') }}
                </x-button>
            </div>
        </form>
        <br><br>

    </x-auth-card>
</x-guest-layout>