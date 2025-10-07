<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUDero Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Animated gradient background */
    body {
      background: linear-gradient(-45deg, #141E30, #243B55, #283E51, #485563);
      background-size: 400% 400%;
      animation: gradientShift 12s ease infinite;
    }
    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Glassmorphism style */
    .glass {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.25);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">

  <div class="glass p-10 rounded-3xl w-full max-w-md">
    <h1 class="text-4xl font-extrabold text-center mb-8 text-white tracking-wide drop-shadow-lg">
      Welcome to CRUDero
    </h1>
    <p class="text-center text-gray-200 mb-6">Sign in to continue</p>

    <form action="<?= site_url('users/authenticate'); ?>" method="POST" class="space-y-6">

      <!-- Email -->
      <div>
        <label for="email" class="block text-white font-semibold mb-2">Email Address</label>
        <input 
          type="email" 
          id="email" 
          name="email"
          placeholder="Enter your email"
          required
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300
                 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400"
        >
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-white font-semibold mb-2">Password</label>
        <input 
          type="password" 
          id="password" 
          name="password"
          placeholder="Enter your password"
          required
          class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-gray-300
                 border border-white/30 focus:outline-none focus:ring-2 focus:ring-indigo-400"
        >
      </div>

      <!-- Buttons -->
      <div class="flex flex-col gap-4 pt-4">
        <button type="submit"
          class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-3 rounded-xl
                 shadow-md transition transform hover:scale-105">
          Login
        </button>

        <a href="<?= site_url('register'); ?>"
   class="text-center w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 rounded-xl
          shadow-md transition transform hover:scale-105">
    Sign Up
</a>

      </div>

      <!-- Forgot Password -->
      <div class="text-center mt-6">
        <a href="#" class="text-sm text-gray-300 hover:text-white hover:underline">
          Forgot your password?
        </a>
      </div>

    </form>
  </div>

</body>
</html>
