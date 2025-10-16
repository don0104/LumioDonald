<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root {
      --primary: #3b82f6;
      --primary-light: #dbeafe;
      --text-dark: #1e293b;
      --bg-light: #f1f5f9;
      --white: #ffffff;
      --success: #22c55e;
      --error: #ef4444;
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
      padding: 40px 15px;
    }

    .dashboard-container {
      max-width: 1200px;
      margin: auto;
      background: var(--white);
      border-radius: 16px;
      padding: 35px 30px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .dashboard-header h2 {
      font-size: 1.8em;
      font-weight: 600;
      color: var(--primary);
    }

    .logout-btn {
      background: var(--primary);
      color: var(--white);
      border: none;
      padding: 10px 18px;
      border-radius: 8px;
      font-weight: 600;
      transition: 0.3s;
    }

    .logout-btn:hover {
      background: #2563eb;
      transform: translateY(-1px);
    }

    .user-status {
      background: var(--primary-light);
      border-left: 4px solid var(--primary);
      padding: 12px 18px;
      border-radius: 8px;
      margin-bottom: 25px;
      color: var(--text-dark);
      font-weight: 500;
    }

    .user-status.error {
      background: #fee2e2;
      border-left: 4px solid var(--error);
      color: var(--error);
    }

    .search-bar {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 15px;
      gap: 8px;
    }

    .search-bar input {
      padding: 8px 12px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      transition: 0.3s;
      width: 220px;
    }

    .search-bar input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px var(--primary-light);
      outline: none;
    }

    .search-bar button {
      background: var(--primary);
      color: var(--white);
      border: none;
      padding: 8px 14px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      transition: 0.3s;
    }

    .search-bar button:hover {
      background: #2563eb;
      transform: translateY(-1px);
    }

    .table-card {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th {
      background: var(--primary-light);
      color: var(--primary);
      font-weight: 600;
      text-transform: uppercase;
      padding: 12px;
      border-bottom: 2px solid #bfdbfe;
    }

    td {
      padding: 12px;
      border-bottom: 1px solid #e2e8f0;
      vertical-align: middle;
      color: var(--text-dark);
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
      background: var(--primary);
    }

    a.btn-update:hover {
      background: #2563eb;
    }

    a.btn-delete {
      background: var(--error);
    }

    a.btn-delete:hover {
      background: #dc2626;
    }

    .btn-create {
      display: block;
      width: 100%;
      padding: 14px;
      border: none;
      background: var(--primary);
      color: var(--white);
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
      background: #2563eb;
      transform: translateY(-1px);
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 25px;
    }

    @media (max-width: 768px) {
      .dashboard-header {
        flex-direction: column;
        gap: 12px;
        text-align: center;
      }
      .search-bar {
        flex-direction: column;
        align-items: stretch;
      }
      .search-bar input {
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <div class="dashboard-container">
    <div class="dashboard-header">
      <h2><?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h2>
      <a href="<?= site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
    </div>

    <div class="search-bar">
      <form method="get" action="<?= site_url('users'); ?>" style="display: flex; gap: 8px;">
        <input 
          type="text" 
          name="q" 
          value="<?= isset($q) ? htmlspecialchars($q) : ''; ?>" 
          placeholder="Search user..."
        >
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
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

    <div class="table-card table-responsive">
      <table class="table align-middle">
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
            <td><span class="text-muted">View Only</span></td>
          <?php endif; ?>
        </tr>
        <?php endforeach; ?>
      </table>

      <div class="pagination-container">
        <?= $page; ?>
      </div>
    </div>

    <?php if ($logged_in_user['role'] === 'admin'): ?>
      <a href="<?= site_url('users/create'); ?>" class="btn-create"><i class="fa-solid fa-user-plus"></i> Create New User</a>
    <?php endif; ?>
  </div>

</body>
</html>
