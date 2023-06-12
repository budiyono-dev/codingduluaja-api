<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-lg-6">
      <h2 class="text-center mb-4">Registration</h2>
      <form>
        <div class="mb-3">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstName" placeholder="Enter your first name">
        </div>
        <div class="mb-3">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastName" placeholder="Enter your last name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <label for="sex" class="form-label">Sex</label>
          <select class="form-select" id="sex">
            <option value="">Select sex</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">Photo</label>
          <input type="file" class="form-control" id="photo">
        </div>
        <div class="mb-3">
          <label for="phoneNumber" class="form-label">Phone Number</label>
          <div class="input-group">
            <span class="input-group-text">+</span>
            <input type="text" class="form-control" id="phoneNumber" placeholder="Enter your phone number">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
      </form>
    </div>
  </div>
</div>