<x-layout.main-plain title="Verify Email">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="card mt-3 shadow">
                <div class="card-header">
                    <h4 class="m-0">Verify Your Email</h4>
                </div>
                <div class="card-body">
                    <p class="">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </p>
                    <p>Make sure open email on <strong>same browser</strong>, or copy the link and open it in the browser you are using.</p>
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div>
                                <button type="submit" class="btn btn-primary w-100">{{ __('Resend Verification Email') }}</button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="my-4 btn btn-danger text-end">{{ __('Log Out') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout.main-plain>
