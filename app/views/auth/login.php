<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | POS Inventory</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #dbe9ff; /* light blue plain background */
    }

    .login {
      width: 380px;
      padding: 40px 35px;
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      animation: fadeIn 0.8s ease;
      border-top: 5px solid #4a90e2;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(25px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login h2 {
      text-align: center;
      font-size: 1.9em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #4a90e2;
      letter-spacing: 0.5px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 25px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      color: #333;
      background: #f5f8ff;
      border: 1px solid #cdd9f0;
      outline: none;
      border-radius: 10px;
      transition: 0.3s ease;
    }

    .inputBox input:focus {
      border-color: #4a90e2;
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.15);
    }

    .inputBox input::placeholder {
      color: #999;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #777;
      transition: 0.3s;
    }

    .toggle-password:hover {
      color: #4a90e2;
    }

    .login button {
      width: 100%;
      padding: 14px;
      border: none;
      background: #4a90e2;
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s ease;
      text-transform: uppercase;
    }

    .login button:hover {
      background: #4179c6;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
    }

    .error-box {
      background: rgba(255, 99, 71, 0.08);
      color: #b71c1c;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.9em;
      border: 1px solid rgba(244, 67, 54, 0.15);
    }

    .group {
      text-align: center;
      margin-top: 20px;
    }

    .group a {
      font-size: 0.95em;
      color: #4a90e2;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .group a:hover {
      text-decoration: underline;
      color: #4179c6;
    }
  </style>
</head>
<body>

  <div class="login">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="inputBox">
        <input type="text" placeholder="Username" name="username" required />
      </div>

      <div class="inputBox">
        <input type="password" placeholder="Password" name="password" id="password" required />
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit">Login</button>
    </form>

    <div class="group">
      <p style="font-size: 0.9em;">
        Don't have an account?
        <a href="<?= site_url('auth/register'); ?>">Register here</a>
      </p>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>

</body>
</html>
