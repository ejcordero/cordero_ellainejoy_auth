<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUDero User Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
    html, body { font-family: 'Inter', sans-serif; }

    /* Animated glowing background */
    @keyframes gradientFlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    body {
      background: linear-gradient(-45deg, #1a1a2e, #16213e, #0f3460, #533483);
      background-size: 400% 400%;
      animation: gradientFlow 15s ease infinite;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 3rem 1rem;
      overflow-x: hidden;
      position: relative;
      color: #e0e0e0;
    }

    body::before {
      content: '';
      position: absolute;
      top: 15%;
      left: 10%;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(0,255,255,0.4), transparent 70%);
      filter: blur(120px);
      z-index: 0;
    }

    body::after {
      content: '';
      position: absolute;
      bottom: 15%;
      right: 10%;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(255,0,255,0.4), transparent 70%);
      filter: blur(120px);
      z-index: 0;
    }

    /* Glass container */
    .glass-card {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(25px);
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.2);
      transition: all 0.3s ease-in-out;
      position: relative;
      z-index: 1;
    }

    .glass-card:hover {
      box-shadow: 0 0 35px rgba(0, 255, 255, 0.35);
      transform: translateY(-3px);
    }

    /* Buttons */
    .btn-glow {
      background: linear-gradient(90deg, #00ffff, #0077ff);
      color: white;
      box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
      transition: all 0.3s ease;
    }
    .btn-glow:hover {
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.9);
      transform: scale(1.05);
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.1);
      color: #e0e0e0;
      border: 1px solid rgba(255,255,255,0.2);
      transition: all 0.3s ease;
    }
    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.2);
      box-shadow: 0 0 20px rgba(255,255,255,0.15);
    }

    /* Table styling */
    table {
      border-collapse: collapse;
      width: 100%;
    }

    thead tr {
      background: rgba(255, 255, 255, 0.1);
    }

    th, td {
      padding: 1rem 1.5rem;
      text-align: left;
    }

    tbody tr {
      transition: background 0.3s ease;
    }

    tbody tr:hover {
      background: rgba(255, 255, 255, 0.1);
    }

    .text-glow {
      text-shadow: 0 0 10px rgba(0,255,255,0.5);
    }
  </style>
</head>
<body>
  <div class="container mx-auto max-w-6xl glass-card rounded-3xl p-10">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-10 gap-4">
      <h1 class="text-4xl font-bold text-white text-glow">CRUDero User Dashboard</h1>
      <a href="<?= site_url('logout'); ?>" class="btn-secondary px-8 py-3 rounded-xl font-semibold text-lg">Logout</a>
    </div>

    <!-- Search Bar -->
    <form method="get" action="<?= site_url('user/dashboard'); ?>" class="mb-8">
      <div class="flex items-center gap-3 bg-white/10 rounded-xl p-4">
        <input 
          type="text" 
          name="search" 
          value="<?= htmlspecialchars($search_term ?? ''); ?>"
          placeholder="Search by name or email..."
          class="flex-grow bg-transparent text-white placeholder-gray-300 outline-none"
        >
        <button type="submit" class="btn-glow px-6 py-2 rounded-lg font-semibold">Search</button>
      </div>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table>
        <thead>
          <tr>
            <th class="text-cyan-300 font-semibold">ID</th>
            <th class="text-cyan-300 font-semibold">Last Name</th>
            <th class="text-cyan-300 font-semibold">First Name</th>
            <th class="text-cyan-300 font-semibold">Email</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($users)): ?>
            <tr>
              <td colspan="4" class="py-10 text-center text-gray-300 font-medium">No records found.</td>
            </tr>
          <?php else: ?>
            <?php foreach($users as $user): ?>
              <tr>
                <td class="text-gray-200"><?=$user['student_id'];?></td>
                <td class="text-gray-200"><?=$user['last_name'];?></td>
                <td class="text-gray-200"><?=$user['first_name'];?></td>
                <td class="text-gray-200"><?=$user['email'];?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <?php if (!empty($users) && $total_pages > 1): ?>
      <div class="mt-10 flex justify-center">
        <ul class="flex flex-wrap items-center gap-3">
          <?php if ($page > 1): ?>
            <li><a href="<?=site_url('user/dashboard?search='.urlencode($search_term).'&page=1');?>" class="btn-secondary px-4 py-2 rounded-lg font-semibold">⏮ First</a></li>
            <li><a href="<?=site_url('user/dashboard?search='.urlencode($search_term).'&page='.($page-1));?>" class="btn-secondary px-4 py-2 rounded-lg font-semibold">← Prev</a></li>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li>
              <a href="<?=site_url('user/dashboard?search='.urlencode($search_term).'&page='.$i);?>"
                 class="px-4 py-2 rounded-lg font-semibold <?= $i == $page ? 'btn-glow' : 'btn-secondary'; ?>">
                <?=$i;?>
              </a>
            </li>
          <?php endfor; ?>

          <?php if ($page < $total_pages): ?>
            <li><a href="<?=site_url('user/dashboard?search='.urlencode($search_term).'&page='.($page+1));?>" class="btn-secondary px-4 py-2 rounded-lg font-semibold">Next →</a></li>
            <li><a href="<?=site_url('user/dashboard?search='.urlencode($search_term).'&page='.$total_pages);?>" class="btn-secondary px-4 py-2 rounded-lg font-semibold">Last ⏭</a></li>
          <?php endif; ?>
        </ul>
      </div>
    <?php endif; ?>

  </div>
</body>
</html>
