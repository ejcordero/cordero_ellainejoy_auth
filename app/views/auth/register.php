<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CRUDero Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

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

    /* Shake animation */
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-6px); }
      50% { transform: translateX(6px); }
      75% { transform: translateX(-4px); }
    }
    .shake { animation: shake 0.5s; }
  </style>
</head>

<body class="flex items-center justify-center min-h-screen font-sans text-white">

  <!-- Glassy Register Card -->
  <div id="registerContainer" class="relative z-10 w-full max-w-md backdrop-blur-xl bg-white/20 p-8 rounded-3xl border border-white/30 shadow-lg">

    <!-- Title -->
    <h2 class="text-4xl font-extrabold text-center mb-8 tracking-wide drop-shadow-lg">
      CRUDero Register
    </h2>

    <!-- Error message -->
    <?php if (!empty($error)): ?>
      <div class="bg-red-500/20 border border-red-400/50 text-red-200 rounded-xl py-3 px-4 mb-6 text-center font-semibold">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <!-- Form -->
    <form method="POST" action="<?= site_url('auth/register'); ?>" class="space-y-5">

      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-semibold mb-2">Username</label>
        <input 
          type="text" 
          name="username" 
          id="username"
          placeholder="Enter your username"
          required
          value="<?= isset($_POST['username']) ? html_escape($_POST['username']) : ''; ?>"
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400 <?= !empty($error) ? 'border-red-500 bg-red-500/10' : ''; ?>"
        >
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-semibold mb-2">Email</label>
        <input 
          type="email" 
          name="email" 
          id="email"
          placeholder="Enter your email"
          required
          value="<?= isset($_POST['email']) ? html_escape($_POST['email']) : ''; ?>"
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400 <?= !empty($error) ? 'border-red-500 bg-red-500/10' : ''; ?>"
        >
      </div>

      <!-- Password -->
      <div class="relative">
        <label for="password" class="block text-sm font-semibold mb-2">Password</label>
        <input 
          type="password" 
          name="password" 
          id="password"
          placeholder="Enter your password"
          required
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400 <?= !empty($error) ? 'border-red-500 bg-red-500/10' : ''; ?>"
        >
        <i id="togglePassword" class="fa-solid fa-eye absolute right-4 top-11 text-gray-300 cursor-pointer hover:text-white transition"></i>
      </div>

      <!-- Confirm Password -->
      <div class="relative">
        <label for="confirmPassword" class="block text-sm font-semibold mb-2">Confirm Password</label>
        <input 
          type="password" 
          name="confirm_password" 
          id="confirmPassword"
          placeholder="Re-enter your password"
          required
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400 <?= !empty($error) ? 'border-red-500 bg-red-500/10' : ''; ?>"
        >
        <i id="toggleConfirmPassword" class="fa-solid fa-eye absolute right-4 top-11 text-gray-300 cursor-pointer hover:text-white transition"></i>
      </div>

      <!-- Role -->
      <div>
        <label for="role" class="block text-sm font-semibold mb-2">Role</label>
        <select 
          name="role" 
          id="role"
          required
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400 appearance-none"
        >
          <option value="user" <?= isset($_POST['role']) && $_POST['role']=='user' ? 'selected' : 'selected'; ?>>User</option>
          <option value="admin" <?= isset($_POST['role']) && $_POST['role']=='admin' ? 'selected' : ''; ?>>Admin</option>
        </select>
      </div>

      <!-- Register Button -->
      <button type="submit"
        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-3 rounded-xl shadow-md transition transform hover:scale-105">
        Register
      </button>

    </form>

    <!-- Login Link -->
    <div class="text-center mt-6">
      <p class="text-white">
        Already have an account?
        <a href="<?= site_url('auth/login'); ?>" class="text-yellow-300 font-semibold hover:underline hover:text-yellow-400">
          Login here
        </a>
      </p>
    </div>

  </div>

  <script>
    // Password toggle visibility
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);
      toggle.addEventListener('click', function () {
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');

    // Shake animation on error
    <?php if(!empty($error)): ?>
      const container = document.getElementById('registerContainer');
      container.classList.add('shake');
      container.addEventListener('animationend', function() {
        container.classList.remove('shake');
      });
    <?php endif; ?>
  </script>
</body>
</html>
