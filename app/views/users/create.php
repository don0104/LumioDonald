<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      transition: 0.3s ease;
    }

    .create-user:hover {
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
      transform: translateY(-2px);
    }

    .create-user h2 {
      font-size: 1.9em;
      font-weight: 600;
      color: #2e7d32;
      margin-bottom: 25px;
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

    .inputBox input::placeholder {
      color: #999;
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
      letter-spacing: 0.5px;
    }

    button:hover {
      background: linear-gradient(135deg, #388e3c, #57a856);
      box-shadow: 0 4px 12px rgba(76, 175, 80, 0.25);
      transform: translateY(-1px);
    }

    .link-wrapper {
      text-align: center;
      margin-top: 20px;
    }

    .link-wrapper a {
      font-size: 0.95em;
      color: #4caf50;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .link-wrapper a:hover {
      text-decoration: underline;
      color: #2e7d32;
    }
  </style>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7faf7;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .create-user {
      background: white;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      text-align: center;
      width: 360px;
    }

    h2 {
      color: #2e7d32;
      margin-bottom: 24px;
    }

    .inputBox {
      margin-bottom: 16px;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    button {
      background-color: #43a047;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background-color: #388e3c;
    }

    .link-wrapper {
      margin-top: 20px;
    }

    .link-wrapper a {
      text-decoration: none;
      color: #2e7d32;
      font-size: 14px;
    }

    .link-wrapper a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="create-user">
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

      <!-- Default role hidden -->
      <input type="hidden" name="role" value="<?= isset($role) ? html_escape($role) : 'user' ?>">

      <!-- Optional password input -->
      <div class="inputBox">
        <input type="password" name="password" placeholder="Password" required>
      </div>

      <button type="submit">Create User</button>
    </form>

    <div class="link-wrapper">
      <a href="<?= site_url('/users'); ?>">← Return to Home</a>
    </div>
  </div>
</body>
</html>

</html>
