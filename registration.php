<!DOCTYPE html>
<html>

<head>
  <title>Registration Form</title>
  <link rel="stylesheet" href="styles2.css" />
</head>

<body>
  <div class="register-box">
    <div class="register-form">
      <div class="register-header">
        <h1>Registration Form</h1>
      </div>
      <form action="reg.php" method="POST" id="form-register">
        <div class="form-register">

          <div class="register-inputs">
            <label for="Name">Student ID:</label>
            <div class="input-box">
              <input name="student_id" type="text" id="Name" placeholder="Enter your Student ID" required />
            </div>
          </div>

          <div class="register-inputs">
            <label for="Name">Firstname:</label>
            <div class="input-box">
              <input name="firstname" type="firstname" id="Name" placeholder="Enter your Firstname" required />
            </div>
          </div>

          <div class="register-inputs">
            <label for="Name">Lastname:</label>
            <div class="input-box">
              <input name="lastname" type="lastname" id="Name" placeholder="Enter your Lastname" required />
            </div>
          </div>

          <div class="register-inputs">
            <label for="Name">Middlename:</label>
            <div class="input-box">
              <input name="middlename" type="middlename" id="Name" placeholder="Enter your Middlename" required />
            </div>
          </div>

          <div class="register-inputs">
            <label for="Address">Address:</label>
            <div class="input-box">
              <input name="Address" type="Address" id="Address" placeholder="Enter your Address" required />
            </div>
          </div>

          <div class="register-inputs">
            <label for="Email">Email:</label>
            <div class="input-box">
              <input name="Email" type="Email" id="Email" placeholder="Enter your Email" required />
            </div>
          </div>

          <div class="register-inputs">
            <label for="Birthday">Birthday:</label>
            <div class="input-box">
              <input name="Birthday" type="date" id="Birthday" required />
            </div>
          </div>

          <div class="register-inputs">
            <label for="Username"> Username:</label>
            <div class="input-box">
              <input name="Username" type="Username" id="Username" placeholder="Enter your Username" required />
            </div>
          </div>

          <div class="register-inputs">
            <label for="Password">Password:</label>
            <div class="input-box">
              <input name="Password" type="password" id="Password" placeholder="Enter your Password" required />
            </div>
          </div>

          <div>
            <button>REGISTER</button>
          </div>
          <?php include 'conn.php' ?>
        </div>
      </form>
      <div class="register-footer">
        <div>
          <small>
            <center>
              Already have an account? <a href="index.php">Log-in</a>
            </center>
          </small>
        </div>
      </div>
    </div>
  </div>
</body>

</html>