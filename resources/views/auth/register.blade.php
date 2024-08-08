<x-layout.main-plain title="Registration">
    <div class="container" style="height: 100vh">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-sm-8">
                <div class="card m-2 py-3 px-5">
                    <div class="col">
                        <h2 class="text-center mb-4">Registration</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name"
                                    placeholder="Enter your name" value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <div class="spinner-grow spinner-grow-sm text-primary d-none" role="status"
                                    id="loading-check-username">
                                </div>
                                <input type="text" class="form-control form-control-sm" id="username"
                                    name="username" placeholder="Enter your username" value="{{ old('username') }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="password" class="form-control form-control-sm" id="password"
                                        name="password" placeholder="Enter your Password">
                                    <span class="input-group-text" id="btnShowPassword">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye-slash-fill d-none" viewBox="0 0 16 16">
                                            <path
                                                d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                                            <path
                                                d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                <input type="password" class="form-control form-control-sm" id="passwordConfirmation"
                                    name="password_confirmation" placeholder="Re-type your Password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100 btn-sm">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    <script>
        function showPassword(){
            const txtPassword = document.getElementById('password');
            const eyeShow = document.querySelector('.bi-eye-fill');

            eyeShow.classList.toggle('d-none');
            document.querySelector('.bi-eye-slash-fill').classList.toggle('d-none');

            const arrClass = [...eyeShow.classList];
            if (arrClass.includes('d-none')) {
                txtPassword.type = 'text';
            } else {
                txtPassword.type = 'password';
            }
        }
        document.getElementById('btnShowPassword').addEventListener('click', showPassword)
    </script>
    @endpush
</x-layout.main-plain>
