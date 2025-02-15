<?php
// Start the session
session_start();

// Destroy the session to log out the user
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Company Admin</title>
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
      input::-ms-reveal,
      input::-ms-clear {
        display: none;
      }
  </style>
</head>

<body>
  <div id="tog" class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="images/log.png" alt="logo">
              </div>
              <h4>Welcome back!</h4>
              <h6 class="font-weight-light">Happy to see you again!</h6>
              <div class="alert alert-danger" id="resp1" role="alert" style="display: none;"></div>
              <form class="pt-3" id="loginForm">
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" name="username" placeholder="Username" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group" id="passwordField">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input :type="passwordFieldType" class="form-control form-control-lg border-left-0" 
                    id="exampleInputPassword" v-model="password" placeholder="Password"
                     name="password" required autocomplete="off" 
                     @input="showToggle = password.length > 0"
                     @focus="showToggle = true" @blur="hideToggle">
                    <span v-if="showToggle" class="input-group-text bg-transparent border-left-0" 
                    @click="togglePasswordVisibility">                   
                      <i class="mdi" :class="passwordFieldType === 'password' ? 'mdi-eye-outline' : 'mdi-eye-off-outline'"></i>
                    </span>
                  </div>
                </div>
                <div class="my-3">
                  <button class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" type="submit">LOGIN</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2025 All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script>
    new Vue({
      el: "#tog",
      data: {
        password: "",
        passwordFieldType: "password",
        showToggle: false
      },
      methods: {
        togglePasswordVisibility() {
          this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
        },
        hideToggle() {
          if (this.password.length === 0) {
            this.showToggle = false;
          }
        }
      }
    });

    $(document).ready(function () {
      $("#loginForm").submit(function (e) {
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "login.php",
          data: $(this).serialize(),
          success: function (response) {
            if (response === "success") {
              console.log("Redirecting...");
              //setTimeout(function() {
                window.location.href = "dashboard.php";
             // }, 1000);
            } else {
              document.getElementById("resp1").style.display = "block"; //display response message
              $("#resp1").html(response);
            }
          }
        });
      });
    });
  </script>
</body>

</html>
