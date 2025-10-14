<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
      background: #f6f9f7;
    }

    .create-user {
      width: 400px;
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      padding: 40px 35px;
      text-align: center;
      position: relative;
    }

    .create-user h2 {
      font-size: 1.9em;
      font-weight: 600;
      color: #2e7d32;
      margin-bottom: 25px;
    } 
    .inputBox input {
      width: 100%;
      padding: 14px 15px;
      font-size: 1em;
      color: #333;
      background: #f8f9fa;
      border: 1px solid #dce5dd;
      border-radius: 8px;
      outline: none;
      transition: all 0.3s ease;
    }

    .inputBox input:focus {
      border-color: #4caf50;
      box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.15);
      background: #fff;
    } 
    button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(135deg, #43a047, #66bb6a);
      color: white;
      font-size: 1.05em;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
     transition: all 0.3s ease;
    }

    button:hover {
      background: linear-gradient(135deg, #388e3c, #57a856);
      box-shadow: 0 4px 12px rgba(76, 175, 80, 0.25);
      transform: translateY(-1px);
    }

   .link-wrapper {
      margin-top: 20px;
    }

    .link-wrapper a {
      font-size: 0.95em;
      color: #4caf50;
     text-decoration: none;
    }

    .link-wrapper a:hover {
      text-decoration: underline;
      color: #2e7d32;
    }

    /* ✅ Flash alert styling */
    .alert {
      padding: 10px 15px;
      margin-bottom: 20px;
      border-radius: 6px;
      font-family: "Poppins", sans-serif;
      font-size: 0.9em;
      text-align: left;
       display: flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .alert i {
      font-size: 1.1em;
    }

    .alert.success {
      background: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .alert.error {
      background: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>
  <div class="create-user">

    <!-- ✅ Alert now INSIDE container -->
    <?php if (isset($_SESSION['flash'])): ?>
      <div class="alert <?= $_SESSION['flash']['type']; ?>">
        <i class="fa <?= $_SESSION['flash']['type'] === 'error' ? 'fa-triangle-exclamation' : 'fa-circle-check'; ?>"></i>
        <?= $_SESSION['flash']['message']; ?>
      </div>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    <h2>Create User</h2>
    <form method="POST" action="<?= site_url('users/create'); ?>">
      <div class="inputBox">
        <input type="text" name="username" placeholder="Username" required 
               value="<?= isset($username) ? html_escape($username) : '' ?>">
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required 
               value="<?= isset($email) ? html_escape($email) : '' ?>">
    </div>
      <input type="hidden" name="role" value="<?= isset($role) ? html_escape($role) : 'user' ?>">
        <div class="inputBox">
        <input type="password" name="password" placeholder="Password" required>
      </div>

      <button type="submit">Create User</button>
    </form>

    <div class="link-wrapper">
      <a href="<?= site_url('/users'); ?>">← Return to Home</a>
    </div>
  </div>

  <script>
    // auto hide alert after 3 seconds
    setTimeout(() => {
      const alert = document.querySelector('.alert');
      if (alert) alert.style.display = 'none';
    }, 3000);
  </script>
</body>
</html>
