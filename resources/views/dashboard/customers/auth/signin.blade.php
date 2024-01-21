<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form | CoderGirl</title>
  <link rel="stylesheet" href="{{url('/')}}/site/assets/css/login/style.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form method="post" action="{{ route('customer.signin') }}">
          @csrf
          <input type="text" name="email" placeholder="Enter your email" required>
          <input type="password" name="password" placeholder="Enter your password" required>
          <a href="#">Forgot password?</a>
          <input type="submit" class="button" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
      <form method="post" action="{{ route('customer.signup') }}">
          @csrf

          <label for="name">Enter your name:</label>
          <input name="name" type="text" placeholder="Enter your name" required>
          @error('name')
              <span class="error">{{ $message }}</span>
          @enderror

          <label for="email">Enter your email:</label>
          <input name="email" type="email" placeholder="Enter your email" required>
          @error('email')
              <span class="error">{{ $message }}</span>
          @enderror

          <label for="password">Create a password:</label>
          <input name="password" type="password" placeholder="Create a password" required>
          @error('password')
              <span class="error">{{ $message }}</span>
          @enderror

          <button class="button primary" type="submit" title="SIGN UP">SIGN UP</button>
      </form>

      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>
