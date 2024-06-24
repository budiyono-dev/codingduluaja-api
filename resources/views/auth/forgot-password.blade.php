<x-layout.main-plain title="Forgot Password">
    <div class="container" style="height: 100vh">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-sm-7 col-md-5 mb-3">
                <div class="card p-5">
                    <h1 class="text-center mb-4 fs-3 fw-bold">Forgot Password</h1>
                    <form action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" id="email"
                                placeholder="Enter your email" required>
                        </div>
                        <p class="text-center fw-light">Pastikan email anda terdaftar!</p>
                        <div class=" my-2">
                            <button type="submit" class="btn btn-primary btn-block w-100">Send Email</button>
                        </div>
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="{{ route('login') }}">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    {{-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-layout.main-plain>
