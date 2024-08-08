<x-layout.main-plain title="Forgot Password">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card mt-3 shadow">
                    <div class="card-header">
                        <h1 class="text-center m-0">Forgot Password</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <p>Make sure your email already registered!</p>
                            <p>Make sure open email on <strong>same browser</strong>, or copy the link and open it in the browser you are using.</p>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="email"
                                       placeholder="Enter your email" required>
                            </div>
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
    </div>
</x-layout.main-plain>
