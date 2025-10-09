<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CRUDero Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    /* Animated gradient background */
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

    /* Shake animation */
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20% { transform: translateX(-10px); }
      40% { transform: translateX(10px); }
      60% { transform: translateX(-10px); }
      80% { transform: translateX(10px); }
    }

    .shake {
      animation: shake 0.5s;
    }
  </style>
</head>

<body class="flex items-center justify-center min-h-screen">

  <!-- Glassy Login Card -->
  <div id="loginContainer"
       class="relative z-10 w-full max-w-md backdrop-blur-xl bg-white/20 p-8 rounded-3xl border border-white/30 shadow-lg">
    
    <!-- Title -->
    <h2 class="text-4xl font-extrabold text-center mb-8 text-white tracking-wide drop-shadow-lg">
      CRUDero Login
    </h2>

    <!-- Form -->
    <form method="post" action="<?= site_url('auth/login') ?>" id="loginForm" class="space-y-6">

      <!-- Username -->
      <div>
        <label for="username" class="block text-white font-semibold mb-2">Username</label>
        <input 
          type="text" 
          id="username"
          name="username"
          placeholder="Enter your username"
          required
          value="<?= isset($_POST['username']) ? html_escape($_POST['username']) : ''; ?>"
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400 <?= !empty($error) ? 'border-red-500 bg-red-500/10' : ''; ?>"
        >
      </div>

      <!-- Password -->
      <div class="relative">
        <label for="password" class="block text-white font-semibold mb-2">Password</label>
        <input 
          type="password" 
          id="password" 
          name="password"
          placeholder="Enter your password"
          required
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400 <?= !empty($error) ? 'border-red-500 bg-red-500/10' : ''; ?>"
        >
        <i id="togglePassword"
           class="fa-solid fa-eye absolute right-4 top-11 text-gray-300 cursor-pointer hover:text-white transition"></i>
      </div>

      <!-- Button -->
      <button type="submit"
        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-3 rounded-xl shadow-md transition transform hover:scale-105">
        Login
      </button>

    </form>

    <!-- Register Link -->
    <div class="text-center mt-6">
      <p class="text-white">
        Don’t have an account?
        <a href="<?= site_url('auth/register'); ?>" class="text-yellow-300 font-semibold hover:underline hover:text-yellow-400">
          Register here
        </a>
      </p>
    </div>
  </div>

  <script>
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const container = document.getElementById('loginContainer');

    togglePassword.addEventListener('click', function () {
      const type = password.type === 'password' ? 'text' : 'password';
      password.type = type;
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });

    // Shake animation when there's an error
    <?php if(!empty($error)): ?>
      container.classList.add('shake');
      container.addEventListener('animationend', function() {
        container.classList.remove('shake');
      });
    <?php endif; ?>
  </script>
</body>
</html>
