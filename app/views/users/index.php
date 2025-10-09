<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CRUDero Users Info</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
    }
    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    .glass {
      backdrop-filter: blur(16px);
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 25px rgba(180, 170, 50, 0.25);
    }
    .glow-green {
      text-shadow: 0 0 8px #1e5631, 0 0 15px #d4af37;
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6">

  <div class="glass rounded-3xl w-full max-w-6xl p-8 animate-fade-in">

    <!-- Dashboard Title -->
    <h2 class="text-3xl md:text-4xl font-extrabold text-center text-white mb-8 uppercase tracking-wider glow-green">
      <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
    </h2>

    <!-- Welcome -->
    <?php if(!empty($logged_in_user)): ?>
      <div class="flex items-center justify-center bg-white/20 border border-yellow-500/40 text-white rounded-xl py-3 px-5 mb-8 shadow-md">
        <i class="fa-solid fa-user-circle text-2xl mr-2 text-yellow-400"></i>
        <span class="font-semibold text-lg">Welcome back, <?= html_escape($logged_in_user['username']); ?>!</span>
      </div>
    <?php else: ?>
      <div class="bg-red-500/20 text-red-200 text-center py-3 px-4 rounded-xl mb-6">
        Logged in user not found.
      </div>
    <?php endif; ?>

    <!-- Top Controls -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">

      <?php if ($logged_in_user['role'] === 'admin'): ?>
        <a href="<?= site_url('users/create'); ?>" 
           class="bg-gradient-to-r from-green-800 to-yellow-500 text-white font-semibold px-5 py-3 rounded-xl shadow-md hover:scale-105 transition transform">
          <i class="fa-solid fa-user-plus mr-2"></i>Create New User
        </a>
      <?php endif; ?>

      <!-- Search Bar -->
      <form action="<?= site_url('users'); ?>" method="get" class="flex w-full md:w-1/2 items-center">
        <div class="relative flex-grow">
          <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
          <input id="searchInput" name="q" type="text" placeholder="Search users..." 
                 value="<?= html_escape($q); ?>"
                 class="w-full px-4 py-2 pr-10 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:ring-2 focus:ring-yellow-400 outline-none" />
          <button type="button" id="clearSearch" 
                  class="absolute right-3 top-2.5 text-yellow-400 hidden hover:scale-110 transition">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <button type="submit" 
                class="ml-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-xl transition transform hover:scale-105">
          <i class="fa-solid fa-search mr-1"></i>Search
        </button>
      </form>

      <a href="<?= site_url('auth/logout'); ?>" 
         class="bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-3 rounded-xl shadow-md transition transform hover:scale-105">
        <i class="fa-solid fa-right-from-bracket mr-2"></i>Logout
      </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <?php if(!empty($users)): ?>
        <table class="min-w-full text-sm text-center text-white border-separate border-spacing-y-2">
          <thead>
            <tr class="bg-green-800 text-yellow-300 uppercase text-xs md:text-sm">
              <th class="py-3 px-2 rounded-l-lg">ID</th>
              <th class="py-3 px-2">Username</th>
              <th class="py-3 px-2">Email</th>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <th class="py-3 px-2">Password</th>
                <th class="py-3 px-2">Role</th>
              <?php endif; ?>
              <th class="py-3 px-2 rounded-r-lg">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
              <tr class="bg-white/10 hover:bg-yellow-400/10 transition transform hover:scale-[1.01] rounded-xl">
                <td class="py-3 px-2"><?= html_escape($user['id']); ?></td>
                <td><?= html_escape($user['username']); ?></td>
                <td><?= html_escape($user['email']); ?></td>
                <?php if ($logged_in_user['role'] === 'admin'): ?>
                  <td>*******</td>
                  <td><?= html_escape($user['role']); ?></td>
                <?php endif; ?>
                <td class="py-3">
                  <?php if ($logged_in_user['role'] === 'admin'): ?>
                    <a href="<?= site_url('/users/update/'.$user['id']);?>" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-xl mr-2 inline-block transition transform hover:scale-105">
                      <i class="fa-solid fa-pen-to-square mr-1"></i>Update
                    </a>
                    <a href="<?= site_url('/users/delete/'.$user['id']);?>"
                       class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-xl inline-block transition transform hover:scale-105"
                       onclick="confirmDelete(event, '<?= html_escape($user['username'], ENT_QUOTES) ?>', this.href)">
                      <i class="fa-solid fa-trash-can mr-1"></i>Delete
                    </a>
                  <?php else: ?>
                    <span class="text-gray-300 italic">View Only</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <div class="bg-yellow-500/20 text-yellow-200 text-center py-3 rounded-xl mt-4">
          No users found.
        </div>
      <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
      <?= $page; ?>
    </div>

  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const searchInput = document.getElementById("searchInput");
      const clearBtn = document.getElementById("clearSearch");

      const toggleClearButton = () => {
        clearBtn.style.display = searchInput.value.trim() ? "block" : "none";
      };

      toggleClearButton();
      searchInput.addEventListener("input", toggleClearButton);

      clearBtn.addEventListener("click", () => {
        searchInput.value = "";
        toggleClearButton();
        window.location.href = "<?= site_url('users'); ?>";
      });
    });

    // SweetAlert2 Delete Confirmation
    function confirmDelete(event, username, url) {
      event.preventDefault();
      Swal.fire({
        title: 'Are you sure?',
        text: `You are about to delete user "${username}". This action cannot be undone!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
        }
      });
    }
  </script>
</body>
</html>
