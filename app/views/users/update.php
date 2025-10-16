<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #e6f0ff, #ffffff);
      padding: 20px;
    }

    .form-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 100, 200, 0.15);
      padding: 40px 35px;
      width: 100%;
      max-width: 400px;
      text-align: center;
      border-top: 5px solid #3498db;
      transition: all 0.3s ease;
    }

    .form-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 25px rgba(0, 100, 200, 0.25);
    }

    .form-card h1 {
      font-size: 1.8em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #3498db;
    }

    .form-group {
      margin-bottom: 18px;
      position: relative;
      text-align: left;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 15px;
      border-radius: 8px;
      border: 1px solid #b0c4de;
      background: #f8fbff;
      color: #333;
      font-size: 1em;
      transition: 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
      outline: none;
      border-color: #3498db;
      box-shadow: 0 0 6px rgba(52, 152, 219, 0.3);
      background: #fff;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #3498db;
      cursor: pointer;
    }

    .btn-submit {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      font-size: 1em;
      cursor: pointer;
      background: #3498db;
      color: #fff;
      transition: 0.3s;
    }

    .btn-submit:hover {
      background: #2e86de;
    }

    .btn-return {
      display: inline-block;
      margin-top: 20px;
      color: #3498db;
      text-decoration: none;
      font-size: 0.9em;
      transition: 0.3s;
    }

    .btn-return:hover {
      text-decoration: underline;
    }

    /* Responsive adjustments */
    @media (max-width: 480px) {
      .form-card {
        padding: 25px 20px;
      }
      .form-card h1 {
        font-size: 1.5em;
      }
    }
  </style>
</head>
<body>
  <div class="form-card">
    <h1>Update User</h1>
    <form action="<?= site_url('users/update/'.$user['id']) ?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" value="<?= html_escape($user['username']); ?>" placeholder="Username" required>
      </div>

      <div class="form-group">
        <input type="email" name="email" value="<?= html_escape($user['email']); ?>" placeholder="Email" required>
      </div>

      <?php if (!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
      <div class="form-group">
        <select name="role" required>
          <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
          <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
        </select>
      </div>

      <div class="form-group">
        <input type="password" placeholder="Password" name="password" id="password">
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>
      <?php endif; ?>

      <button type="submit" class="btn-submit">Update User</button>
    </form>

    <a href="<?= site_url('/users'); ?>" class="btn-return">← Return to Home</a>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    if (togglePassword && password) {
      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>
