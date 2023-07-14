<x-layout.main title="Registration">
    <div class="container">
        <div class="card m-2 py-3 px-5">
            <div class="row justify-content-center mt-2">
                <div class="col-lg-6">
                    <h2 class="text-center mb-4">Registration</h2>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            {{ $error }} <br/>
                        @endforeach
                    @endif
                    <form method="POST" action="/register">
                        @csrf
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name"
                                   placeholder="Enter your first name">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name"
                                   placeholder="Enter your last name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <div class="spinner-grow spinner-grow-sm text-primary d-none" role="status" id="loading-check-username">
{{--                                <span class="sr-only">Loading...</span>--}}
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="Enter your username">
                                <span class="input-group-text" id="btnCheckUserName">check</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Enter your Password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation"
                                   placeholder="Re-type your Password">
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
                                <input type="tel" class="form-control" id="phone" name="phone"
                                       placeholder="Enter your phone number">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Bootstrap</strong>
          <small>11 mins ago</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Hello, world! This is a toast message.
        </div>
      </div>
    </div>
    @push('script')
    <script>
        const checkUsername = () => {
            {{--    let url = {!! json_encode(route('checkUsername')) !!} + '/' + document.getElementById('username').value;--}}
            console.log('checkusername', "url");
        }
        let typingTimer;
        const checkUsernameOnKeyup = () => {
            clearTimeout(typingTimer);
                    let loading = document.getElementById("loading-check-username");
                    loading.classList.toggle("d-none");
            typingTimer = setTimeout(
                () => {
                    let url = {!! json_encode(route('checkUsername', ['username'=>':username'], false)) !!};
                    let url2 = {!! json_encode(route('checkUsername', ['username'=>':username'])) !!};
                    console.log('checkusername', url);
                    console.log('checkusername', url2);
                    console.log(url2.replace(':username', document.getElementById('username').value))
                    loading.classList.toggle("d-none");

                }, 3000);
        }
        document.getElementById('btnCheckUserName').addEventListener('click', checkUsername);
        document.getElementById('email').addEventListener('keyup', checkUsernameOnKeyup);

        const toastElList = document.querySelectorAll('.toast')
        const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl))
        console.log(toastList);

        const toastLiveExample = document.getElementById('liveToast')

        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            toastBootstrap.show()
    </script>
    @endpush
</x-layout.main>
