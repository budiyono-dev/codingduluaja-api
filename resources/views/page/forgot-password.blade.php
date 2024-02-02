<x-layout.main title="Forgot Password">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-sm-7 col-md-5 mb-3">
                <div class="card p-5">
                    <h1 class="text-center mb-4 fs-3 fw-bold">Forgot Password</h1>
                    <h1 class="text-center mb-4 fs-3 fw-bold"></h1>
                    <form action="{{ route('do.forgotPassword') }}" method="post">
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
                            <a href="{{ route('page.login') }}">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            const is_send = {!! json_encode(session('send')) !!};
            if (is_send) {
                showSimpleToast('email berhasil dikirmkan, silahkan cek email', 'info');
            }
        </script>
    @endpush
</x-layout.main>
