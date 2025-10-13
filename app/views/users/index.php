<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
      background: #f6f9f7;
      color: #333;
      overflow-x: hidden;
    }

    .dashboard-container {
      position: relative;
      max-width: 1200px;
      margin: 60px auto;
      padding: 40px;
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      transition: 0.3s ease;
    }

    .dashboard-container:hover {
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
      transform: translateY(-2px);
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .dashboard-header h2 {
      font-size: 1.9em;
      font-weight: 600;
      color: #2e7d32;
    }

    .logout-btn {
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(135deg, #43a047, #66bb6a);
      color: white;
      font-weight: 600;
      transition: 0.3s;
    }

    .logout-btn:hover {
      background: linear-gradient(135deg, #388e3c, #57a856);
      box-shadow: 0 4px 12px rgba(76, 175, 80, 0.25);
      transform: translateY(-1px);
    }

    .user-status {
      background: #e8f5e9;
      border-left: 4px solid #4caf50;
      padding: 12px 18px;
      border-radius: 8px;
      margin-bottom: 25px;
      color: #2e7d32;
      font-weight: 500;
    }

    .user-status.error {
      background: #ffebee;
      border-left: 4px solid #f44336;
      color: #c62828;
    }

    .table-card {
      background: #ffffff;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    th {
      background: #e8f5e9;
      color: #2e7d32;
      text-transform: uppercase;
      font-weight: 600;
      padding: 12px;
      border-bottom: 2px solid #c8e6c9;
    }

    td {
      padding: 10px;
      border-bottom: 1px solid #e0e0e0;
      vertical-align: middle;
    }

    a.btn-action {
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
      margin: 0 2px;
      display: inline-block;
    }

    a.btn-update {
      background: linear-gradient(135deg, #43a047, #66bb6a);
    }

    a.btn-update:hover {
      background: linear-gradient(135deg, #388e3c, #57a856);
      box-shadow: 0 4px 12px rgba(76, 175, 80, 0.25);
    }

    a.btn-delete {
      background: linear-gradient(135deg, #e53935, #f44336);
    }

    a.btn-delete:hover {
      background: linear-gradient(135deg, #c62828, #d32f2f);
      box-shadow: 0 4px 12px rgba(244, 67, 54, 0.25);
    }

    .btn-create {
      display: block;
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(135deg, #43a047, #66bb6a);
      color: white;
      font-size: 1.05em;
      border-radius: 10px;
      font-weight: 600;
      transition: 0.3s;
      text-align: center;
      margin-top: 25px;
      text-transform: uppercase;
      text-decoration: none;
    }

    .btn-create:hover {
      background: linear-gradient(135deg, #388e3c, #57a856);
      box-shadow: 0 4px 12px rgba(76, 175, 80, 0.25);
      transform: translateY(-1px);
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 25px;
    }
  </style>
</head>
<body>

  <div class="dashboard-container">
    <div class="dashboard-header">
      <h2><?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h2>
      <a href="<?= site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
    </div>
      <div style="display: flex; justify-content: flex-end; margin-bottom: 15px;">
    <form method="get" action="<?= site_url('users'); ?>" style="display: flex; gap: 8px;">
        <input 
            type="text" 
            name="q" 
            value="<?= isset($q) ? htmlspecialchars($q) : ''; ?>" 
            placeholder="Search user..." 
            style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 8px; outline: none; transition: 0.3s;"
            onfocus="this.style.borderColor='#4CAF50'" 
            onblur="this.style.borderColor='#ccc'"
        >
        <button 
            type="submit" 
            style="background-color: #4CAF50; color: white; border: none; padding: 8px 14px; border-radius: 8px; cursor: pointer; transition: 0.3s;"
            onmouseover="this.style.backgroundColor='#45a049'" 
            onmouseout="this.style.backgroundColor='#4CAF50'"
        >
            🔍 Search
        </button>
    </form>
</div>
    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status">
        <strong>Welcome:</strong> <?= html_escape($logged_in_user['username']); ?>
      </div>
    <?php else: ?>
      <div class="user-status error">
        Logged in user not found
      </div>
    <?php endif; ?>

    <div class="table-card">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th>Password</th>
              <th>Role</th>
              <th>Action</th>
            <?php else: ?>
              <th>Action</th>
            <?php endif; ?>
          </tr>

          <?php foreach ($user as $u): ?>
          <tr>
            <td><?= html_escape($u['id']); ?></td>
            <td><?= html_escape($u['username']); ?></td>
            <td><?= html_escape($u['email']); ?></td>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <td>*******</td>
              <td><?= html_escape($u['role']); ?></td>
              <td>
                <a href="<?= site_url('/users/update/'.$u['id']); ?>" class="btn-action btn-update">Update</a>
                <a href="<?= site_url('/users/delete/'.$u['id']); ?>" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
              </td>
            <?php else: ?>
              <td>
                <span class="text-muted">View Only</span>
              </td>
            <?php endif; ?>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="pagination-container">
        <?= $page; ?>
      </div>
    </div>

    <?php if ($logged_in_user['role'] === 'admin'): ?>
      <a href="<?= site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
    <?php endif; ?>
  </div>
</body>
</html>
