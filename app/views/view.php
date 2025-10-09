<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CRUDero User Records</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
    html, body {
      font-family: "Poppins", sans-serif;
    }
    body {
      background: linear-gradient(135deg, #f0f4f8, #e6e9f0);
      min-height: 100vh;
      display: flex;
      align-items: flex-start;
      justify-content: center;
      padding: 3rem 1rem;
    }
    .glass-card {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(15px);
      border-radius: 1.5rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .btn-main {
      background: linear-gradient(to right, #ff7e5f, #ff6a6a);
      color: white;
      transition: 0.3s;
    }
    .btn-main:hover {
      opacity: 0.9;
      transform: translateY(-2px);
    }
    .btn-neutral {
      background-color: #f3f4f6;
      transition: 0.3s;
    }
    .btn-neutral:hover {
      background-color: #e5e7eb;
      transform: translateY(-2px);
    }
    .table-header {
      background: linear-gradient(90deg, #fafafa, #f3f3f3);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .table-row:hover {
      background-color: rgba(255, 240, 240, 0.5);
    }
  </style>
</head>
<body>
  <div class="container max-w-6xl w-full space-y-8">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
      <h1 class="text-4xl font-bold text-gray-800 tracking-wide">👥 User Records</h1>
      <div class="flex gap-4">
        <a href="<?=site_url('/create');?>" class="btn-main px-6 py-3 rounded-xl font-semibold shadow-md">+ Add Record</a>
        <a href="<?=site_url('logout');?>" class="btn-neutral px-6 py-3 rounded-xl font-semibold text-gray-700 shadow-sm">Logout</a>
      </div>
    </div>

    <form method="get" action="<?=site_url('/view');?>" class="glass-card px-5 py-4 flex items-center gap-3">
      <input
        type="text"
        name="search"
        value="<?=htmlspecialchars($search_term ?? '');?>"
        placeholder="🔍 Search by name or email..."
        class="flex-grow bg-transparent outline-none text-gray-700 placeholder-gray-400 px-2"
      />
      <button
        type="submit"
        class="btn-neutral px-6 py-2 rounded-lg font-semibold text-gray-700"
      >
        Search
      </button>
    </form>

    <div class="glass-card p-6 overflow-x-auto">
      <table class="w-full border-collapse text-gray-700">
        <thead>
          <tr class="table-header text-sm text-gray-600 border-b border-gray-300">
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
              <tr class="table-row border-b border-gray-200 transition-colors">
                <td class="px-4 py-3"><?=$user['student_id'];?></td>
                <td class="px-4 py-3"><?=$user['last_name'];?></td>
                <td class="px-4 py-3"><?=$user['first_name'];?></td>
                <td class="px-4 py-3"><?=$user['email'];?></td>
                <td class="px-4 py-3 flex justify-center items-center gap-2">
                  <a href="<?=site_url('/update/'.$user['student_id']);?>" class="text-blue-600 hover:underline">Edit</a>
                  <button onclick="showDeleteModal('<?=site_url('/delete/'.$user['student_id']);?>')" class="text-red-500 hover:underline">Delete</button>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <?php if (!empty($users) && $total_pages > 1): ?>
      <div class="flex justify-center mt-6">
        <ul class="flex flex-wrap items-center gap-3">
          <?php if ($page > 1): ?>
            <li>
              <a href="<?=site_url('/view?search='.urlencode($search_term).'&page=1');?>"
                class="btn-neutral px-4 py-2 rounded-lg text-gray-700 font-semibold">
                ⏮ First
              </a>
            </li>
          <?php endif; ?>

          <?php if ($page > 1): ?>
            <li>
              <a href="<?=site_url('/view?search='.urlencode($search_term).'&page='.($page-1));?>"
                class="btn-neutral px-4 py-2 rounded-lg text-gray-700 font-semibold">
                ← Prev
              </a>
            </li>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li>
              <a href="<?=site_url('/view?search='.urlencode($search_term).'&page='.$i);?>"
                class="px-4 py-2 rounded-lg font-semibold shadow-sm
                  <?= $i == $page 
                    ? 'bg-gray-800 text-white' 
                    : 'btn-neutral text-gray-700'; ?>">
                <?=$i;?>
              </a>
            </li>
          <?php endfor; ?>

          <?php if ($page < $total_pages): ?>
            <li>
              <a href="<?=site_url('/view?search='.urlencode($search_term).'&page='.($page+1));?>"
                class="btn-neutral px-4 py-2 rounded-lg text-gray-700 font-semibold">
                Next →
              </a>
            </li>
          <?php endif; ?>

          <?php if ($page < $total_pages): ?>
            <li>
              <a href="<?=site_url('/view?search='.urlencode($search_term).'&page='.$total_pages);?>"
                class="btn-neutral px-4 py-2 rounded-lg text-gray-700 font-semibold">
                Last ⏭
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    <?php endif; ?>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
      <div class="glass-card p-8 max-w-sm w-full">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Confirm Deletion</h3>
        <p class="text-gray-600 mb-6">Are you sure you want to delete this record?</p>
        <div class="flex justify-end gap-4">
          <a id="deleteConfirmBtn" class="btn-main px-6 py-2 rounded-lg font-semibold cursor-pointer">Yes</a>
          <button onclick="hideDeleteModal()" class="btn-neutral px-6 py-2 rounded-lg font-semibold">No</button>
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
