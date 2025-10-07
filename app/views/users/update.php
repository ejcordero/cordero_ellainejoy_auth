<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUDero Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Animated gradient background */
    body {
      background: linear-gradient(-45deg, #11998e, #38ef7d, #2c5364, #203a43);
      background-size: 400% 400%;
      animation: gradientShift 12s ease infinite;
    }
    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Glass effect */
    .glass {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border: 1px solid rgba(255, 255, 255, 0.25);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen px-4">

  <!-- Card -->
  <div class="glass p-10 rounded-3xl shadow-2xl w-full max-w-md border border-white/30">
    
    <!-- Title -->
    <h1 class="text-4xl font-extrabold text-center mb-8 text-white tracking-wider drop-shadow-lg">
      CRUDero Update User
    </h1>

    <!-- Form -->
    <form action="<?= site_url('users/update/'.segment(4)); ?>" method="POST" class="space-y-6">
      
      <!-- Last Name -->
<div>
  <label for="lastname" class="block text-white font-semibold mb-2">Last Name</label>
  <input 
    type="text" 
    id="lastname" 
    name="lastname"
    value="<?= html_escape($user['lastname']); ?>"
    required
    class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-emerald-400"
  >
</div>

<!-- First Name -->
<div>
  <label for="firstname" class="block text-white font-semibold mb-2">First Name</label>
  <input 
    type="text" 
    id="firstname" 
    name="firstname"
    value="<?= html_escape($user['firstname']); ?>"
    required
    class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-emerald-400"
  >
</div>


      <!-- Email -->
      <div>
        <label for="email" class="block text-white font-semibold mb-2">Email Address</label>
        <input 
          type="email" 
          id="email" 
          name="email"         
          value="<?= html_escape($user['email']); ?>"
          required
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-emerald-400"
        >
      </div>

      <!-- Buttons -->
      <div class="flex gap-4 pt-2">
        <!-- Save -->
        <button type="submit"
          class="flex-1 bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 px-4 rounded-xl shadow-md transition transform hover:scale-105">
           Save
        </button>

        <!-- Cancel -->
        <a href="<?= site_url('/'); ?>" 
           class="flex-1 text-center bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-4 rounded-xl shadow-md transition transform hover:scale-105">
           Cancel
        </a>
      </div>
    </form>
  </div>

</body>
</html>
