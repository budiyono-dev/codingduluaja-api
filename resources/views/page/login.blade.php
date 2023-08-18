<x-layout.main title="Login">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-sm-8 col-md-6 mb-3">
                <div class="card p-5">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="{{ route('do.login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control form-control-sm" id="email"
                                placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control form-control-sm" id="password"
                                placeholder="Enter your password">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block btn-sm">Login</button>
                        </div>
                        <div class="mt-2 text-end">
                            <h6><a href="{{ route('page.register') }}">Register</a></h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.main>
