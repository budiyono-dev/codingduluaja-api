<x-layout.main title="Reset Password">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-sm-7 col-md-5 mb-3">
                <div class="card p-5">
                    <h1 class="text-center mb-4 fs-3 fw-bold">Reset Password</h1>
                    <form action="{{ route('do.resetPassword') }}" method="post" id="formResetPassword">
                        @csrf
                        <input name="email" id="email" class="d-none" value="{{ session('email') ?? '' }}" >
                        <input name="token" token="token" class="d-none" value="{{ session('token') ?? '' }}" >
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter new password"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Re-type your Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block w-100 my-3">Change Password</button>
                        <div class="mt-2 d-flex justify-content-between">
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
                showSimpleToast('password berhasil direset, silahkan login kembali', 'info');
            }
        </script>
    @endpush
</x-layout.main>
