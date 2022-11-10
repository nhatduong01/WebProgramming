<div class="register-form shadow">
  <form action="register.php">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Enter password again</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <p class="alertMessage" id="wrongConfirmPassword">Your confirm password is wrong</p>
    <button type="submit" class="btn btn-primary ">Register</button>
  </form>
</div>
