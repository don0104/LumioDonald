<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root {
      --primary-color: #43a047;
      --primary-hover: #388e3c;
      --success-bg: #d4edda;
      --success-text: #155724;
      --error-bg: #f8d7da;
      --error-text: #721c24;
      --neutral-bg: #f6f9f7;
      --card-bg: #ffffff;
      --border: #e0e0e0;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: var(--neutral-bg);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .create-user {
      background: var(--card-bg);
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      padding: 40px 35px;
      width: 100%;
      max-width: 420px;
      text-align: center;
      transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    .create-user:hover {
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
      transform: translateY(-2px);
    }

    h2 {
      font-size: 1.8em;
      color: var(--primary-hover);
      margin-bottom: 25px;
    }

    .alert {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      gap: 10px;
      padding: 12px 15px;
      margin-bottom: 20px;
      border-radius: 8px;
      font-size: 0.95em;
      text-align: left;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
      animation: fadeIn 0.3s ease-in;
    }

    .alert.success {
      background: var(--success-bg);
      color: var(--success-text);
      border: 1px solid #c3e6cb;
    }

    .alert.error {
      background: var(--error-bg);
      color: var(--error-text);
      border: 1px solid #f5c6cb;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 15px;
      font-size: 1em;
      border: 1px solid var(--border);
      border-radius: 8px;
      background: #f8f9fa;
      color: #333;
      outline: none;
      transition: all 0.3s ease;
    }

    .inputBox input:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(67, 160, 71, 0.15);
      background: #fff;
    }

    button {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, var(--primary-color), #66bb6a);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1em;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    button:hover {
      background: linear-gradient(135deg, var(--primary-hover), #57a856);
      transform: translateY(-1px);
      box-shadow: 0 4px 10px rgba(76, 175, 80, 0.25);
    }

    .link-wrapper {
      margin-top: 20px;
    }

    .link-wrapper a {
      text-decoration: none;
      color: var(--primary-color);
      font-size: 0.95em;
      transition: color 0.3s ease;
    }

    .link-wrapper a:hover {
      text-decoration: underline;
      color: var(--primary-hover);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ✅ Responsive adjustments */
    @media (max-width: 480px) {
      .create-user {
        padding: 30px 25px;
        border-radius: 12px;
      }

      h2 {
        font-size: 1.5em;
      }

      button {
        font-size: 0.95em;
        padding: 12px;
      }

      .alert {
        font-size: 0.85em;
      }
    }
  </style>
</head>
<body>
  <div class="create-user">
    <!-- ✅ Flash Message -->
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

      <button type="submit"><i class="fa fa-user-plus"></i> Create User</button>
    </form>

    <div class="link-wrapper">
      <a href="<?= site_url('/users'); ?>">← Return to Home</a>
    </div>
  </div>

  <script>
    // Auto-hide flash message after 3 seconds
    setTimeout(() => {
      const alert = document.querySelector('.alert');
      if (alert) alert.style.opacity = '0';
      setTimeout(() => alert && alert.remove(), 500);
    }, 3000);
  </script>
</body>
</html>
