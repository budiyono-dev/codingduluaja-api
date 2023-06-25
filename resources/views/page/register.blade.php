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
            {{ __('validation.required', ['field' => 'first name', 's' => 'skdjbfksjd']) }}
        <form method="POST" action="/register">
          @csrf
          <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter your first name">
          </div>
          <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter your last name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
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
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <div class="input-group">
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
</x-layout.main>
