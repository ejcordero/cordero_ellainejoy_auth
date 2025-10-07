<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUDero Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Background animation */
    body {
      background: radial-gradient(circle at top left, #1a2a6c, #b21f1f, #fdbb2d);
      background-size: 400% 400%;
      animation: gradientShift 12s ease infinite;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Floating glow effect */
    .glow {
      box-shadow: 0 0 15px rgba(99, 102, 241, 0.6), 0 0 30px rgba(56, 189, 248, 0.4);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">

  <!-- Card -->
  <div class="relative z-10 w-full max-w-md backdrop-blur-xl bg-white/20 p-8 rounded-3xl border border-white/30 glow">
    
    <!-- Title -->
    <h1 class="text-4xl font-extrabold text-center mb-8 text-white tracking-wide drop-shadow-lg">
      CRUDero Create User
    </h1>

    <!-- Form -->
    <form action="<?= site_url('users/create'); ?>" method="POST" class="space-y-6">
      
      <!-- Last Name -->
<div>
  <label for="lastname" class="block text-white font-semibold mb-2">Last Name</label>
  <input 
    type="text" 
    id="lastname" 
    name="lastname" 
    placeholder="Enter last name"
    required
    class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400"
  >
</div>

<!-- First Name -->
<div>
  <label for="firstname" class="block text-white font-semibold mb-2">First Name</label>
  <input 
    type="text" 
    id="firstname" 
    name="firstname" 
    placeholder="Enter first name"
    required
    class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400"
  >
</div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-white font-semibold mb-2">Email Address</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          placeholder="Enter email"
          required
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400"
        >
      </div>

      <!-- Buttons -->
      <div class="flex gap-4 pt-2">
        <!-- Sign Up -->
        <button type="submit"
          class="flex-1 bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-3 rounded-xl shadow-md transition transform hover:scale-105">
           Submit
        </button>

        <a href="<?= site_url('/'); ?>" 
           class="flex-1 text-center bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 rounded-xl shadow-md transition transform hover:scale-105">
           Cancel
        </a>
      </div>
    </form>
  </div>

</body>
</html>
