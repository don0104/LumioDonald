<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root {
      --primary: #3b82f6;
      --primary-light: #dbeafe;
      --text-dark: #1e293b;
      --bg-light: #f8fafc;
      --white: #ffffff;
      --success-bg: #d1fae5;
      --success-text: #065f46;
      --error-bg: #fee2e2;
      --error-text: #b91c1c;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: var(--bg-light);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 420px;
      background: var(--white);
      border-radius: 16px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      padding: 35px 30px;
      text-align: center;
    }

    h2 {
      font-size: 1.8em;
      color: var(--primary);
      margin-bottom: 25px;
    }

    .alert {
      padding: 12px 16px;
      border-radius: 8px;
      margin-bottom: 20px;
      text-align: left;
      font-size: 0.95em;
      display: flex;
      align-items: center;
      gap: 10px;
      animation: fadeIn 0.4s ease;
    }

    .alert.success {
      background: var(--success-bg);
      color: var(--success-text);
    }

    .alert.error {
      background: var(--error-bg);
      color: var(--error-text);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .inputBox {
      margin-bottom: 15px;
      text-align: left;
    }

    .inputBox input {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      background: #f9fafb;
      font-size: 1em;
      transition: 0.3s;
    }

    .inputBox input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px var(--primary-light);
      background: var(--white);
    }

    button {
      width: 100%;
      padding: 12px;
      background: var(--primary);
      border: none;
      border-radius: 8px;
      color: var(--white);
      font-size: 1.05em;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s;
    }

    button:hover {
      background: #2563eb;
      transform: translateY(-1px);
    }

    .link-wrapper {
      margin-top: 20px;
    }

    .link-wrapper a {
      color: var(--primary);
      text-decoration: none;
      font-size: 0.95em;
    }

    .link-wrapper a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .container {
        padding: 25px 20px;
      }
      h2 {
        font-size: 1.5em;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    
    <!-- ✅ Flash Alert -->
    <?php if (isset($_SESSION['flash'])): ?>
      <div class="alert <?= $_SESSION['flash']['type']; ?>">
        <i class="fa-solid <?= $_SESSION['flash']['type'] == 'error' ? 'fa-triangle-exclamation' : 'fa-circle-check'; ?>"></i>
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
    // Auto hide alert after 3 seconds
    setTimeout(() => {
      const alert = document.querySelector('.alert');
      if (alert) alert.style.display = 'none';
    }, 3000);
  </script>
</body>
</html>
