<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard | Students Info</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root {
      --primary: #3b82f6;
      --primary-light: #e0f2fe;
      --primary-dark: #2563eb;
      --text-dark: #1e293b;
      --white: #ffffff;
      --bg-light: #f8fafc;
      --error: #ef4444;
    }

    * {
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: var(--bg-light);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px 15px;
    }

    .dashboard {
      width: 100%;
      max-width: 1200px;
      background: var(--white);
      border-radius: 16px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Header Section */
    .dashboard-header {
      background: var(--primary);
      color: var(--white);
      padding: 20px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .dashboard-header h2 {
      font-weight: 600;
      font-size: 1.6em;
      margin: 0;
    }

    .logout-btn {
      background: var(--white);
      color: var(--primary);
      border: none;
      font-weight: 600;
      padding: 8px 18px;
      border-radius: 8px;
      transition: 0.3s;
    }

    .logout-btn:hover {
      background: var(--primary-dark);
      color: var(--white);
    }

    /* Content Section */
    .dashboard-content {
      padding: 30px;
    }

    .welcome-card {
      background: var(--primary-light);
      border-left: 4px solid var(--primary);
      padding: 15px 20px;
      border-radius: 8px;
      margin-bottom: 25px;
      color: var(--text-dark);
      font-weight: 500;
    }

    .search-section {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .search-section input {
      padding: 10px 14px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      width: 240px;
      transition: 0.3s;
    }

    .search-section input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px var(--primary-light);
      outline: none;
    }

    .search-section button {
      background: var(--primary);
      color: var(--white);
      border: none;
      padding: 10px 16px;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.3s;
    }

    .search-section button:hover {
      background: var(--primary-dark);
      transform: translateY(-1px);
    }

    /* Table */
    .table-container {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th {
      background: var(--primary-light);
      color: var(--primary-dark);
      padding: 12px;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.9em;
      border-bottom: 2px solid var(--primary);
    }

    td {
      padding: 12px;
      border-bottom: 1px solid #e2e8f0;
      color: var(--text-dark);
      vertical-align: middle;
    }

    tr:hover td {
      background: #f1f5f9;
      transition: 0.3s;
    }

    .btn-action {
      padding: 6px 12px;
      border-radius: 6px;
      color: #fff;
      text-decoration: none;
      font-size: 0.9em;
      margin: 0 3px;
      transition: 0.3s;
      display: inline-block;
    }

    .btn-update {
      background: var(--primary);
    }

    .btn-update:hover {
      background: var(--primary-dark);
    }

    .btn-delete {
      background: var(--error);
    }

    .btn-delete:hover {
      background: #dc2626;
    }

    /* Create Button */
    .btn-create {
      display: inline-block;
      width: 100%;
      text-align: center;
      background: var(--primary);
      color: var(--white);
      padding: 14px;
      font-weight: 600;
      font-size: 1.05em;
      border-radius: 10px;
      text-decoration: none;
      margin-top: 25px;
      transition: 0.3s;
    }

    .btn-create:hover {
      background: var(--primary-dark);
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
        text-align: center;
        gap: 10px;
      }
      .search-section {
        flex-direction: column;
        align-items: stretch;
      }
      .search-section input {
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <div class="dashboard">
    <!-- Header -->
    <div class="dashboard-header">
      <h2><?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h2>
      <a href="<?= site_url('auth/logout'); ?>"><button class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Logout</button></a>
    </div>

    <!-- Content -->
    <div class="dashboard-content">

      <?php if(!empty($logged_in_user)): ?>
        <div class="welcome-card">
          👋 Welcome, <strong><?= html_escape($logged_in_user['username']); ?></strong>
        </div>
      <?php else: ?>
        <div class="welcome-card" style="background:#fee2e2; border-left:4px solid var(--error); color:var(--error);">
          ⚠ Logged in user not found.
        </div>
      <?php endif; ?>

      <div class="search-section">
        <form method="get" action="<?= site_url('users'); ?>" style="display:flex; gap:10px; flex-wrap:wrap;">
          <input 
            type="text" 
            name="q" 
            value="<?= isset($q) ? htmlspecialchars($q) : ''; ?>" 
            placeholder="Search student..."
          >
          <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
        </form>
      </div>

      <!-- Table -->
      <div class="table-container table-responsive">
        <table class="table align-middle">
          <thead>
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
          </thead>
          <tbody>
            <?php foreach ($user as $u): ?>
            <tr>
              <td><?= html_escape($u['id']); ?></td>
              <td><?= html_escape($u['username']); ?></td>
              <td><?= html_escape($u['email']); ?></td>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <td>*******</td>
                <td><?= html_escape($u['role']); ?></td>
                <td>
                  <a href="<?= site_url('/users/update/'.$u['id']); ?>" class="btn-action btn-update"><i class="fa-solid fa-pen"></i> Update</a>
                  <a href="<?= site_url('/users/delete/'.$u['id']); ?>" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa-solid fa-trash"></i> Delete</a>
                </td>
              <?php else: ?>
                <td><span class="text-muted">View Only</span></td>
              <?php endif; ?>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="pagination-container">
        <?= $page; ?>
      </div>

      <?php if ($logged_in_user['role'] === 'admin'): ?>
        <a href="<?= site_url('users/create'); ?>" class="btn-create"><i class="fa-solid fa-user-plus"></i> Create New User</a>
      <?php endif; ?>
    </div>
  </div>

</body>
</html>
