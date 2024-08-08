<x-layout.main-plain title="Reset Password">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card mt-3 shadow">
                    <div class="card-header">
                        <h1 class="text-center m-0">Forgot Password</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control form-control-sm" name="email" required autofocus autocomplete="username"
                                       placeholder="Enter your Email" value="{{ old('email') }}">
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control form-control-sm" 
                                       name="password" required autofocus autocomplete="new-password"
                                       placeholder="Enter your New Password">
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                <input type="password" class="form-control form-control-sm" id="passwordConfirmation"
                                       name="password_confirmation" placeholder="Re-type your Password">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">Reset Password</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.main-plain>
