<x-layout.main title="Registration">
    <div class="container">
        <div class="card m-2 py-3 px-5">
            <div class="row justify-content-center mt-2">
                <div class="col-lg-6">
                    <h2 class="text-center mb-4">Registration</h2>
                    <form method="POST" action="/register">
                        @csrf
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control form-control-sm" id="firstName" name="first_name"
                                placeholder="Enter your first name">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control form-control-sm" id="lastName" name="last_name"
                                placeholder="Enter your last name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <div class="spinner-grow spinner-grow-sm text-primary d-none" role="status"
                                id="loading-check-username">
                            </div>
                            <input type="text" class="form-control form-control-sm" id="username" name="username"
                                placeholder="Enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email"
                                placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-sm mb-3">
                                <input type="password" class="form-control form-control-sm" id="password" name="password"
                                placeholder="Enter your Password"  aria-describedby="inputGroup-sizing-sm">
                                <span class="input-group-text" id="inputGroup-sizing-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill"
                                    viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                                </span>
                            </div>

                            
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" class="form-control form-control-sm" id="password_confirmation"
                                name="password_confirmation" placeholder="Re-type your Password">
                        </div>
                        <div class="mb-3">
                            <label for="sex" class="form-label">Sex</label>
                            <select class="form-select" id="sex" name="sex">
                                <option value="">Select sex</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <div class="input-group">
                                <input type="tel" class="form-control form-control-sm" id="phone" name="phone"
                                    placeholder="Enter your phone number">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            const txtUsername = document.getElementById('username');

            let typingTimer;
            const checkUsernameOnKeyup = () => {
                if (txtUsername.value.length < 3) {
                    return;
                }

                clearTimeout(typingTimer);

                let loading = document.getElementById("loading-check-username");
                loading.classList.remove("d-none");

                typingTimer = setTimeout(
                    async () => {
                        try {
                            let url = {!! json_encode(route('checkUsername', ['username' => ':username'])) !!};
                            url = url.replace(':username', txtUsername.value);
                            const res = await fetch(url);
                            if (res.ok) {
                                const data = await res.json();
                                if (data.is_exist) showSimpleToast('username is not available');
                            }
                        } catch (err) {
                            console.error(err);
                        } finally {
                            loading.classList.add("d-none")
                        }
                    }, 3000);
            }
        </script>
    @endpush
    @push('addEventListener')
        <script>
            txtUsername.addEventListener('keyup', checkUsernameOnKeyup);
        </script>
    @endpush
</x-layout.main>
