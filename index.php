<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Form</title>
  <link rel="stylesheet" href="styles2.css" />
</head>

<body>
  <div class="login-box">
    <div class="login-form">
      <div class="login-header">
        <h1>Log in</h1>
      </div>
      <form action="login.php" method="post" id="form-login">
        <div class="form-inputs">
          <label for="username">Username</label>
          <div class="input-box">
            <input name="username" type="text" id="username" class="input-field" placeholder="Username" required /><svg
              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="20px" width="20px">
              <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
              <path
                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
            </svg>
          </div>

          <label for="password">Password</label>
          <div class="input-box">
            <input name="password" type="password" id="password" class="input-field" placeholder="Password"
              required /><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="20px" width="20px">
              <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
              <path
                d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
            </svg>
          </div>
          <button type="submit" form="form-login" id="login-btn">
            Login
          </button>
        </div>
      </form>

      <div class="login-footer">
        <small>
          <a href="forgot.html">Forgot Password?</a>
        </small>

        <div>
          <small>
            Don't have an account? <a href="registration.php">Sign-up</a>
          </small>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="script2.js"></script> -->
</body>

</html>