<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUDero User Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    html, body { font-family: 'Inter', sans-serif; }

    /* Animated glowing gradient background */
    @keyframes gradientFlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    body {
      background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #3a0ca3);
      background-size: 400% 400%;
      animation: gradientFlow 15s ease infinite;
      color: #e2e8f0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      position: relative;
      overflow: hidden;
    }

    /* Glowing lights */
    body::before {
      content: '';
      position: absolute;
      top: 15%;
      left: 10%;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(0,255,255,0.4), transparent 70%);
      filter: blur(120px);
      z-index: 0;
    }
    body::after {
      content: '';
      position: absolute;
      bottom: 15%;
      right: 10%;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(255,0,255,0.4), transparent 70%);
      filter: blur(120px);
      z-index: 0;
    }

    /* Glassmorphism container */
    .glass-card {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(25px);
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.15);
      transition: all 0.3s ease-in-out;
      position: relative;
      z-index: 1;
    }

    .glass-card:hover {
      box-shadow: 0 0 35px rgba(0, 255, 255, 0.35);
      transform: translateY(-3px);
    }

    /* Input glow effect */
    .input-glow {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #e2e8f0;
      transition: all 0.3s ease;
    }

    .input-glow:focus {
      outline: none;
      border-color: rgba(0, 255, 255, 0.7);
      box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
    }

    /* Button styles */
    .btn-glow {
      background: linear-gradient(90deg, #00ffff, #0077ff);
      color: white;
      box-shadow: 0 0 15px rgba(0, 255, 255, 0.4);
      transition: all 0.3s ease;
    }
    .btn-glow:hover {
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.8);
      transform: scale(1.03);
    }

    .btn-secondary {
      background: rgba(255,255,255,0.15);
      border: 1px solid rgba(255,255,255,0.2);
      color: #e2e8f0;
      transition: all 0.3s ease;
    }
    .btn-secondary:hover {
      background: rgba(255,255,255,0.25);
      box-shadow: 0 0 20px rgba(255,255,255,0.15);
    }

    .text-glow {
      text-shadow: 0 0 12px rgba(0,255,255,0.5);
    }
  </style>
</head>
<body>
  <div class="glass-card max-w-md w-full p-10 rounded-3xl text-center">
    <h1 class="text-4xl font-bold text-white mb-8 text-glow">CRUDero User Login</h1>

    <!-- ✅ Error handling -->
    <?php if (isset($error)): ?>
      <div class="mb-6 w-full p-4 rounded-xl bg-red-500/20 text-red-300 font-semibold shadow">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="POST" class="w-full text-left space-y-6">
      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-semibold text-gray-200 mb-2">Email Address</label>
        <input type="email" id="email" name="email" placeholder="you@example.com"
               class="w-full rounded-xl px-4 py-3 input-glow" required>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-semibold text-gray-200 mb-2">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••"
               class="w-full rounded-xl px-4 py-3 input-glow" required>
      </div>

      <!-- Buttons -->
      <div class="flex gap-4 mt-6">
        <button type="submit" 
                class="flex-1 btn-glow font-semibold text-lg py-3 rounded-xl">
          Log In
        </button>
        <a href="<?=site_url('landing-page');?>"
           class="flex-1 btn-secondary text-center font-semibold text-lg py-3 rounded-xl">
          Back
        </a>
      </div>
    </form>

    <!-- Signup link -->
    <div class="mt-8">
      <p class="text-gray-300 text-sm">
        Don't have an account? 
        <a href="<?= site_url('signup'); ?>" class="text-cyan-400 font-semibold hover:underline">Sign Up</a>
      </p>
    </div>
  </div>
</body>
</html>
