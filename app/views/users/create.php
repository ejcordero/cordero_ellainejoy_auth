<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title></title>
CRUDero Create User
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: radial-gradient(circle at top left, #1a2a6c, #b21f1f, #fdbb2d);
      background-size: 400% 400%;
      animation: gradientShift 12s ease infinite;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .glow {
      box-shadow: 0 0 15px rgba(99, 102, 241, 0.6), 0 0 30px rgba(56, 189, 248, 0.4);
    }
  </style>
</head>

<body class="flex items-center justify-center min-h-screen p-4">

  <div class="relative z-10 w-full max-w-md backdrop-blur-xl bg-white/20 p-8 rounded-3xl border border-white/30 glow">

    <h1 class="text-4xl font-extrabold text-center mb-8 text-white tracking-wide drop-shadow-lg">
    CRUDero Create User
    </h1>

    <!-- Error Message -->
    <?php if (!empty($error)) : ?>
      <div class="bg-red-500/20 border border-red-400 text-red-200 rounded-xl py-2 px-4 text-center mb-6 font-semibold">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('users/create'); ?>" class="space-y-6">
      
      <!-- Username -->
      <div>
        <label for="username" class="block text-white font-semibold mb-2">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required
          value="<?= isset($username) ? html_escape($username) : '' ?>"
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400" />
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-white font-semibold mb-2">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required
          value="<?= isset($email) ? html_escape($email) : '' ?>"
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400" />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-white font-semibold mb-2">Password</label>
        <div class="relative">
          <input type="password" name="password" id="password" placeholder="Enter password" required
            class="w-full px-4 py-3 pr-10 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400" />
          <i id="togglePassword" class="fa-solid fa-eye absolute right-3 top-3.5 text-gray-300 cursor-pointer hover:text-white"></i>
        </div>
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="confirmPassword" class="block text-white font-semibold mb-2">Confirm Password</label>
        <div class="relative">
          <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm password" required
            class="w-full px-4 py-3 pr-10 rounded-xl bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400" />
          <i id="toggleConfirmPassword" class="fa-solid fa-eye absolute right-3 top-3.5 text-gray-300 cursor-pointer hover:text-white"></i>
        </div>
      </div>

      <!-- Role -->
      <div>
        <label for="role" class="block text-white font-semibold mb-2">Role</label>
        <select name="role" id="role" required
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400">
          <option value="" disabled <?= !isset($role) ? 'selected' : '' ?>>-- Select Role --</option>
          <option value="admin" <?= isset($role) && $role == "admin" ? 'selected' : '' ?>>Admin</option>
          <option value="user" <?= isset($role) && $role == "user" ? 'selected' : '' ?>>User</option>
        </select>
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-3 rounded-xl shadow-md transition transform hover:scale-105">
        Create User
      </button>
    </form>

    <!-- Back Button -->
    <div class="pt-4 text-center">
      <a href="<?= site_url('users'); ?>"
        class="inline-block px-6 py-2 border border-white/40 rounded-xl text-white font-semibold hover:bg-white/20 transition hover:scale-105">
        Back
      </a>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', () => {
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;
        toggle.classList.toggle('fa-eye');
        toggle.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>

</body>
</html>
