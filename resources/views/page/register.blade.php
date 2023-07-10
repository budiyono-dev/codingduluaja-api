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
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
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
<script>
const checkUsername = () => {
    let url = {!! json_encode(route('checkUsername')) !!} + '/' + document.getElementById('username').value;
    console.log('checkusername', url);
}
document.getElementById('btnCheckUserName').addEventListener('click', checkUsername);

</script>
</x-layout.main>
