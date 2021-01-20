<x-guest-layout>
<a href="/"><img src="{{ asset('storage/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="main-image" style="opacity: .8">
  </a>
    <div class="login-box">

        <x-jet-authentication-card>
       
            <div class="card">
            <div class="card-body login-card-body">

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="block">
              
                        <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" placeholder="Correo"  required autofocus />
                    </div>

                    <div class="mt-4">

                        <x-jet-input id="password" class="form-control" type="password" name="password" placeholder="Nueva Contraseña" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-jet-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required autocomplete="new-password" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="btn btn-block" style="background-color:rgba(109,223,182,1);color: white;">
                            {{ __('Reset Password') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
            </div>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>