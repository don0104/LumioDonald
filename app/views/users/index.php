<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard | Students Info</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    :root {
      --primary: #3b82f6;
      --primary-dark: #1d4ed8;
      --accent: #60a5fa;
      --bg: #f1f5f9;
      --white: #ffffff;
      --text-dark: #0f172a;
      --error: #ef4444;
    }

    * {
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: linear-gradient(180deg, #e0f2fe, #ffffff);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px 20px;
    }

    /* Dashboard Container */
    .dashboard {
      width: 100%;
      max-width: 1250px;
      background: var(--white);
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Header */
    .dashboard-header {
      background: linear-gradient(90deg, var(--primary), var(--primary-dark));
      color: var(--white);
      padding: 25px 35px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
    }

    .dashboard-header h2 {
      font-size: 1.8em;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .logout-btn {
      background: var(--white);
      color: var(--primary-dark);
      border: none;
      padding: 10px 18px;
      border-radius: 10px;
      font-weight: 600;
      box-shadow: 0 2px 10px rgba(255, 255, 255, 0.2);
      transition: 0.3s;
    }

    .logout-btn:hover {
      background: var(--accent);
      color: var(--white);
      transform: translateY(-2px);
    }

    /* Content */
    .dashboard-content {
      padding: 30px;
    }

    .welcome-card {
      background: rgba(59, 130, 246, 0.07);
      border-left: 5px solid var(--primary);
      padding: 16px 20px;
      border-radius: 12px;
      margin-bottom: 25px;
      color: var(--text-dark);
      font-weight: 500;
      backdrop-filter: blur(8px);
    }

    /* Search + Create Section */
    .top-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      flex-wrap: wrap;
      gap: 12px;
    }

    .search-bar {
      display: flex;
      gap: 10px;
    }

    .search-bar input {
      padding: 10px 14px;
      border-radius: 10px;
      border: 1px solid #cbd5e1;
      transition: 0.3s;
    }

    .search-bar input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px #bfdbfe;
      outline: none;
    }

    .search-bar button {
      background: var(--primary);
      color: var(--white);
      border: none;
      padding: 10px 16px;
      border-radius: 10px;
      font-weight: 500;
      transition: 0.3s;
    }

    .search-bar button:hover {
      background: var(--primary-dark);
      transform: translateY(-1px);
    }

    .btn-create {
      background: linear-gradient(90deg, var(--primary), var(--accent));
      color: var(--white);
      border: none;
      padding: 10px 16px;
      border-radius: 10px;
      font-weight: 600;
      transition: 0.3s;
      text-decoration: none;
      display: inline-block;
    }

    .btn-create:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
    }

    /* Table Card */
    .table-card {
      border-radius: 16px;
      overflow: hidden;
      background: var(--white);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      transition: 0.3s;
    }

    .table-card:hover {
      box-shadow: 0 8px 24px rgba(59, 130, 246, 0.15);
    }

    th {
      background: var(--primary);
      color: var(--white);
      font-weight: 600;
      padding: 12px;
      text-transform: uppercase;
      font-size: 0.9em;
    }

    td {
      padding: 12px;
      color: var(--text-dark);
      border-bottom: 1px solid #e2e8f0;
    }

    tr:hover td {
      background: #f1f5f9;
      transition: 0.3s;
    }

    /* Action Buttons */
    .btn-action {
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 0.85em;
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      margin: 0 3px;
      transition: 0.3s;
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

      .top-section {
        flex-direction: column;
        align-items: stretch;
      }

      .search-bar {
        width: 100%;
        justify-content: center;
      }

      .search-bar input {
        flex: 1;
      }

      .btn-create {
        width: 100%;
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <div class="dashboard">
    <div class="dashboard-header">
      <h2><i class="fa-solid fa-graduation-cap"></i> <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h2>
      <a href="<?= site_url('auth/logout'); ?>"><button class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Logout</button></a>
    </div>

    <div class="dashboard-content">

      <?php if(!empty($logged_in_user)): ?>
        <div class="welcome-card">
          👋 Welcome back, <strong><?= html_escape($logged_in_user['username']); ?></strong>!
        </div>
      <?php else: ?>
        <div class="welcome-card" style="background:#fee2e2; border-left:5px solid var(--error); color:var(--error);">
          ⚠ Logged in user not found.
        </div>
      <?php endif; ?>

      <div class="top-section">
        <form method="get" action="<?= site_url('users'); ?>" class="search-bar">
          <input type="text" name="q" value="<?= isset($q) ? htmlspecialchars($q) : ''; ?>" placeholder="Search student..." />
          <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
        </form>

        <?php if ($logged_in_user['role'] === 'admin'): ?>
          <a href="<?= site_url('users/create'); ?>" class="btn-create"><i class="fa-solid fa-user-plus"></i> Add Student</a>
        <?php endif; ?>
      </div>

      <div class="table-card table-responsive">
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
                  <a href="<?= site_url('/users/update/'.$u['id']); ?>" class="btn-action btn-update"><i class="fa-solid fa-pen"></i> Edit</a>
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

    </div>
  </div>

</body>
</html>
