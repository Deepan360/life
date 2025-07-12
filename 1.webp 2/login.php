<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Rh+yoNkPw9a9XJdVOi+2jSDf83n+H+dY47Ij9/kyuF8d+gu4TMZ4cZpcaLeC83uwUo+QFrxegmY/kZrrroXK7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" type="text/html" href="assets/vendors/fontawesome/all.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>
        html, body { height: 100%; }
        body { background-color: white; color: rgb(8, 8, 8); display: flex; align-items: center; justify-content: center; padding-top: 40px; padding-bottom: 40px; }
        .form-signin { width: 100%; max-width: 500px; padding: 30px; border-radius: 15px;    --bs-bg-opacity: 1;
            background-color: rgb(147 181 165 / 71%) !important; border: 1px solid rgb(226, 226, 226); position: relative; }
        .form-signin .form-floating { margin-bottom: 20px; }
        .form-signin input[type="email"], .form-signin input[type="password"] { padding: 15px; border-radius: 10px; }
        .form-signin .password-toggle { position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer; background: none; border: none; }
        .form-signin .checkbox { font-weight: 400; }
        .form-signin .form-floating:focus-within { z-index: 2; }
        .form-signin button[type="submit"] { margin-top: 10px; }
        .form-signin h1 { margin-bottom: 30px; }
        /* Adjusted the icon styles */
        .password-toggle {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    cursor: pointer;
    background: none;
    border: none;
    padding: 0;
}

.password-toggle i {
    font-size: 1;
    color: #000;
    background: none;
}
    </style>
</head>
<body class="text-center">
    <div class="form-signin">
        <form action="loginProcess.php" method="post" onsubmit="handleRememberMe()">
            <img class="mb-4" src="./Ana (15).png" alt="" width="72">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="form-floating position-relative">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating position-relative">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                <button type="button" class="password-toggle" id="togglePassword" onclick="togglePasswordVisibility()">
                    <i class="fa fa-eye-slash  text-dark" aria-hidden="true"></i>
                </button>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" id="rememberMe" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-success w-100" type="submit" value="Login">Sign in</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Check if cookies exist and pre-fill the form if they do
            const email = getCookie('email');
            if (email) {
                document.getElementById('floatingInput').value = email;
                document.getElementById('rememberMe').checked = true;
            }
        });
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("floatingPassword");
            var icon = document.querySelector(".password-toggle i");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
        function handleRememberMe() {
            const rememberMe = document.getElementById('rememberMe').checked;
            const email = document.getElementById('floatingInput').value;

            if (rememberMe) {
                setCookie('email', email, 7); // Save for 7 days
            } else {
                deleteCookie('email');
            }
        }
        function setCookie(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            const expires = "expires=" + date.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }
        function getCookie(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for(let i=0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }
        function deleteCookie(name) {
            document.cookie = name + '=; Max-Age=-99999999;';
        }
    </script>
</body>
</html>
