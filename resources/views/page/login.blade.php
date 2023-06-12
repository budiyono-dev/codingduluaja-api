<x-layout.main title="Login">
	<div class="container">
  <div class="card m-5 p-5">
    <div class="col-lg-4">
      <h2 class="text-center mb-4">Login</h2>
      <form>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter your password">
        </div>
        <div class="d-grid gap-2">
        	<button type="submit" class="btn btn-primary btn-block">Login</button>	
        </div>
      </form>
    </div>
  </div>
</div>
</x-layout.main>