<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CRUDero Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
    html, body { font-family: 'Inter', sans-serif; }

    /* Animated gradient background */
    @keyframes gradientFlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    body {
      background: linear-gradient(-45deg, #1a1a2e, #16213e, #0f3460, #533483);
      background-size: 400% 400%;
      animation: gradientFlow 15s ease infinite;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      overflow: hidden;
      position: relative;
    }

    /* Glowing blobs */
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

    /* Glassmorphic card */
    .glass-card {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(25px);
      border-radius: 1.5rem;
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.2);
      transition: all 0.3s ease-in-out;
      z-index: 1;
      width: 100%;
      max-width: 480px;
      position: relative;
    }

    .glass-card:hover {
      box-shadow: 0 0 35px rgba(0, 255, 255, 0.35);
      transform: translateY(-3px);
    }

    /* Input fields */
    .form-input {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255,255,255,0.25);
      border-radius: 0.75rem;
      padding: 0.75rem 1rem;
      color: #e0e0e0;
      width: 100%;
      transition: all 0.3s ease;
    }

    .form-input:focus {
      outline: none;
      border-color: #00ffff;
      box-shadow: 0 0 15px rgba(0,255,255,0.5);
      background: rgba(255,255,255,0.15);
    }

    label {
      color: #cfcfcf;
      font-weight: 500;
    }

    /* Buttons */
    .btn-glow {
      background: linear-gradient(90deg, #00ffff, #0077ff);
      color: white;
      border-radius: 0.75rem;
      box-shadow: 0 0 15px rgba(0,255,255,0.5);
      transition: all 0.3s ease;
    }

    .btn-glow:hover {
      box-shadow: 0 0 25px rgba(0,255,255,0.9);
      transform: scale(1.05);
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.1);
      color: #e0e0e0;
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: 0.75rem;
      transition: all 0.3s ease;
    }

    .btn-secondary:hover {
      background: rgba(255,255,255,0.2);
      box-shadow: 0 0 20px rgba(255,255,255,0.15);
      transform: scale(1.05);
    }

    /* Title glow */
    .text-glow {
      color: white;
      text-shadow: 0 0 15px rgba(0,255,255,0.6);
    }

    select option {
      color: #000;
    }

    /* Neon divider */
    .divider {
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(0,255,255,0.6), transparent);
      margin: 1.5rem 0;
    }
  </style>
</head>
<body>
  <div class="glass-card p-10">
    <h1 class="text-4xl font-bold text-center mb-6 text-glow">CRUDero Create Account</h1>
    <div class="divider"></div>

    <form action="<?= site_url('signup'); ?>" method="POST" class="space-y-6">
      <div>
        <label for="first-name" class="block text-sm mb-2">First Name</label>
        <input type="text" id="first-name" name="first-name" placeholder="John" class="form-input" />
      </div>

      <div>
        <label for="last-name" class="block text-sm mb-2">Last Name</label>
        <input type="text" id="last-name" name="last-name" placeholder="Doe" class="form-input" />
      </div>

      <div>
        <label for="email" class="block text-sm mb-2">Email Address</label>
        <input type="email" id="email" name="email" placeholder="you@example.com" class="form-input" />
      </div>

      <div>
        <label for="user-type" class="block text-sm mb-2">User Type</label>
        <select id="user-type" name="user-type" class="form-input">
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <div>
        <label for="password" class="block text-sm mb-2">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••" class="form-input" />
      </div>

      <div class="flex gap-4 mt-6">
        <button type="submit" name="submit" class="flex-1 py-3 text-lg font-semibold btn-glow">
          Sign Up
        </button>
        <a href="<?= site_url('landing-page'); ?>" class="flex-1 text-center py-3 text-lg font-semibold btn-secondary">
          Back
        </a>
      </div>
    </form>

    <div class="mt-8 text-center">
      <p class="text-sm text-gray-300">
        Already have an account?
        <a href="<?= site_url('login'); ?>" class="text-cyan-400 font-semibold hover:underline">
          Log In
        </a>
      </p>
    </div>
  </div>
</body>
</html>
