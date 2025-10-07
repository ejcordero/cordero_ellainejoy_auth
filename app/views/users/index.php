<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CRUDero Pagination</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Animated gradient background */
    body {
      background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #1b2735);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
    }
    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    /* Frosted glass effect */
    .glass {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
  </style>
</head>

<body class="min-h-screen font-sans text-gray-200">

  <div class="max-w-7xl mx-auto px-4 py-10">

    <!-- Header -->
    <header class="glass rounded-2xl shadow-lg p-6 mb-10 flex flex-col md:flex-row md:items-center md:justify-between">
      <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-wide drop-shadow-md">
        Welcome to CRUDero
      </h1>

      <!-- Search Form -->
      <form action="<?=site_url('users');?>" method="get" class="relative flex items-center mt-4 md:mt-0">
        <?php
          $q = '';
          if (isset($_GET['q'])) {
              $q = $_GET['q'];
          }
        ?>
        <div class="relative">
          <input id="searchInput"
                 class="w-72 md:w-96 pl-4 pr-10 py-3 rounded-xl glass text-white placeholder-gray-300
                        focus:ring-2 focus:ring-emerald-400 focus:outline-none text-base"
                 name="q" type="text" placeholder="Search students..." value="<?=html_escape($q);?>">
          <button type="button"
                  class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-300 hover:text-white"
                  aria-label="Clear search"
                  onclick="
                    document.getElementById('searchInput').value='';
                    window.location.href='<?=site_url('users');?>';
                  ">
            ✕
          </button>
        </div>
        <button type="submit"
                class="ml-3 bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-6 py-3
                       rounded-xl shadow-md transition">
          Search
        </button>
      </form>
    </header>

   <!-- Data Table -->
<div class="glass rounded-2xl shadow-xl overflow-hidden">
  <table class="min-w-full border-collapse">
    <thead class="bg-emerald-600/90">
      <tr>
        <th class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">ID</th>
        <th class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">Last Name</th>
        <th class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">First Name</th>
        <th class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">Email</th>
        <th class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">Action</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-white/20">
      <?php foreach (html_escape($user) as $users): ?>
      <tr class="hover:bg-emerald-500/30 transition">
        <td class="px-6 py-4"><?=$users['id']; ?></td>
        <td class="px-6 py-4 font-medium"><?=$users['lastname']; ?></td>
        <td class="px-6 py-4"><?=$users['firstname']; ?></td>
        <td class="px-6 py-4"><?=$users['email']; ?></td>
        <td class="px-6 py-4 space-x-2">
          <a href="<?=site_url('/users/update/'.$users['id']);?>"
             class="inline-block bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2
                    rounded-lg text-sm font-semibold shadow transition">
             Update
          </a>
          <a href="<?=site_url('/users/delete/'.$users['id']);?>"
             class="inline-block bg-red-500 hover:bg-red-600 text-white px-4 py-2
                    rounded-lg text-sm font-semibold shadow transition">
             Delete
          </a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


    <!-- Pagination + Create Button Row -->
    <div class="mt-8 flex items-center justify-between">
      <!-- Pagination output -->
      <div class="text-gray-300">
        <?php echo $page;?>
      </div>

      <!-- Create New User button -->
      <a href="<?=site_url('users/create'); ?>"
         class="inline-block px-6 py-3 rounded-xl font-semibold text-white bg-emerald-500
                hover:bg-emerald-600 shadow-md transition transform hover:scale-105">
         + Create New User
      </a>
    </div>

  </div>
</body>
</html>
