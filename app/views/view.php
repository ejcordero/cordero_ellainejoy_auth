<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CRUDero User Records</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
    html, body { font-family: 'Inter', sans-serif; }

    /* Animated gradient background */
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
      align-items: flex-start;
      justify-content: center;
      padding: 3rem 1rem;
      position: relative;
      overflow-x: hidden;
    }

    /* Neon glow background */
    body::before, body::after {
      content: '';
      position: absolute;
      width: 500px;
      height: 500px;
      filter: blur(150px);
      z-index: 0;
      opacity: 0.6;
    }
    body::before {
      top: 10%;
      left: -5%;
      background: radial-gradient(circle, rgba(0,255,255,0.5), transparent 70%);
    }
    body::after {
      bottom: 10%;
      right: -5%;
      background: radial-gradient(circle, rgba(255,0,255,0.5), transparent 70%);
    }

    /* Glass container */
    .glass-card {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(20px);
      border-radius: 1.25rem;
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.2);
      transition: all 0.3s ease-in-out;
      position: relative;
      z-index: 1;
    }

    .glass-card:hover {
      box-shadow: 0 0 35px rgba(0, 255, 255, 0.3);
      transform: translateY(-3px);
    }

    /* Neon title */
    .title-glow {
      color: white;
      text-shadow: 0 0 15px rgba(0,255,255,0.7);
      letter-spacing: 1px;
    }

    /* Buttons */
    .btn-main {
      background: linear-gradient(90deg, #00ffff, #0077ff);
      color: white;
      border-radius: 0.75rem;
      box-shadow: 0 0 20px rgba(0,255,255,0.5);
      transition: all 0.3s ease;
    }
    .btn-main:hover {
      transform: scale(1.05);
      box-shadow: 0 0 35px rgba(0,255,255,0.8);
    }

    .btn-neutral {
      background: rgba(255,255,255,0.1);
      color: #e0e0e0;
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: 0.75rem;
      transition: all 0.3s ease;
    }
    .btn-neutral:hover {
      background: rgba(255,255,255,0.2);
      transform: scale(1.05);
      box-shadow: 0 0 20px rgba(255,255,255,0.15);
    }

    /* Table */
    table {
      color: #e0e0e0;
    }
    th {
      background: rgba(255,255,255,0.15);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      font-weight: 600;
      color: #00ffff;
      border-bottom: 1px solid rgba(255,255,255,0.2);
    }
    td {
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    tr:hover {
      background: rgba(0,255,255,0.05);
      transition: background 0.3s ease;
    }

    /* Pagination */
    .pagination a {
      background: rgba(255,255,255,0.1);
      color: #e0e0e0;
      border-radius: 0.5rem;
      padding: 0.5rem 1rem;
      transition: all 0.3s ease;
    }
    .pagination a:hover {
      background: rgba(0,255,255,0.2);
      color: #fff;
      transform: scale(1.05);
    }
    .pagination .active {
      background: linear-gradient(90deg, #00ffff, #0077ff);
      color: white !important;
      box-shadow: 0 0 15px rgba(0,255,255,0.5);
    }

    /* Modal */
    #deleteModal {
      backdrop-filter: blur(10px);
    }

  </style>
</head>
<body>
  <div class="container max-w-6xl w-full space-y-8 z-10 relative">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
      <h1 class="text-4xl font-bold title-glow">👥 User Records</h1>
      <div class="flex gap-4">
        <a href="<?=site_url('/create');?>" class="btn-main px-6 py-3 font-semibold shadow-md">+ Add Record</a>
        <a href="<?=site_url('logout');?>" class="btn-neutral px-6 py-3 font-semibold">Logout</a>
      </div>
    </div>

    <form method="get" action="<?=site_url('/view');?>" class="glass-card px-5 py-4 flex items-center gap-3">
      <input
        type="text"
        name="search"
        value="<?=htmlspecialchars($search_term ?? '');?>"
        placeholder="🔍 Search by name or email..."
        class="flex-grow bg-transparent outline-none text-gray-200 placeholder-gray-400 px-2"
      />
      <button
        type="submit"
        class="btn-neutral px-6 py-2 font-semibold"
      >
        Search
      </button>
    </form>

    <div class="glass-card p-6 overflow-x-auto">
      <table class="w-full border-collapse text-sm">
        <thead>
          <tr>
            <th class="px-4 py-3 text-left">ID</th>
            <th class="px-4 py-3 text-left">Last Name</th>
            <th class="px-4 py-3 text-left">First Name</th>
            <th class="px-4 py-3 text-left">Email</th>
            <th class="px-4 py-3 text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($users)): ?>
            <tr>
              <td colspan="5" class="py-10 text-center text-gray-400 font-medium">No records found.</td>
            </tr>
          <?php else: ?>
            <?php foreach($users as $user): ?>
              <tr>
                <td class="px-4 py-3"><?=$user['student_id'];?></td>
                <td class="px-4 py-3"><?=$user['last_name'];?></td>
                <td class="px-4 py-3"><?=$user['first_name'];?></td>
                <td class="px-4 py-3"><?=$user['email'];?></td>
                <td class="px-4 py-3 flex justify-center items-center gap-3">
                  <a href="<?=site_url('/update/'.$user['student_id']);?>" class="text-cyan-400 hover:text-cyan-300 font-semibold">Edit</a>
                  <button onclick="showDeleteModal('<?=site_url('/delete/'.$user['student_id']);?>')" class="text-pink-400 hover:text-pink-300 font-semibold">Delete</button>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <?php if (!empty($users) && $total_pages > 1): ?>
      <div class="flex justify-center mt-6 pagination">
        <ul class="flex flex-wrap items-center gap-3">
          <?php if ($page > 1): ?>
            <li>
              <a href="<?=site_url('/view?search='.urlencode($search_term).'&page=1');?>">⏮ First</a>
            </li>
          <?php endif; ?>

          <?php if ($page > 1): ?>
            <li>
              <a href="<?=site_url('/view?search='.urlencode($search_term).'&page='.($page-1));?>">← Prev</a>
            </li>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li>
              <a href="<?=site_url('/view?search='.urlencode($search_term).'&page='.$i);?>" class="<?= $i == $page ? 'active' : ''; ?>"><?=$i;?></a>
            </li>
          <?php endfor; ?>

          <?php if ($page < $total_pages): ?>
            <li>
              <a href="<?=site_url('/view?search='.urlencode($search_term).'&page='.($page+1));?>">Next →</a>
            </li>
          <?php endif; ?>

          <?php if ($page < $total_pages): ?>
            <li>
              <a href="<?=site_url('/view?search='.urlencode($search_term).'&page='.$total_pages);?>">Last ⏭</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    <?php endif; ?>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
      <div class="glass-card p-8 max-w-sm w-full">
        <h3 class="text-2xl font-semibold text-white mb-4 text-glow">Confirm Deletion</h3>
        <p class="text-gray-300 mb-6">Are you sure you want to delete this record?</p>
        <div class="flex justify-end gap-4">
          <a id="deleteConfirmBtn" class="btn-main px-6 py-2 font-semibold cursor-pointer">Yes</a>
          <button onclick="hideDeleteModal()" class="btn-neutral px-6 py-2 font-semibold">No</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function showDeleteModal(deleteUrl) {
      document.getElementById("deleteModal").classList.remove("hidden");
      document.getElementById("deleteConfirmBtn").href = deleteUrl;
    }
    function hideDeleteModal() {
      document.getElementById("deleteModal").classList.add("hidden");
    }
  </script>
</body>
</html>
