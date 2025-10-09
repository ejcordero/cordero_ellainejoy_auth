<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUDero Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
    html, body { font-family: 'Inter', sans-serif; }

    /* Animated gradient background (same as CRUDero) */
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
      overflow: hidden;
      position: relative;
      padding: 2rem;
    }

    /* Glowing ambient effects */
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
      max-width: 520px;
      padding: 2.5rem;
    }

    .glass-card:hover {
      box-shadow: 0 0 35px rgba(0, 255, 255, 0.35);
      transform: translateY(-3px);
    }

    /* Form fields */
    .glow-input {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255,255,255,0.25);
      border-radius: 0.75rem;
      padding: 0.75rem 1rem;
      color: #e0e0e0;
      width: 100%;
      transition: all 0.3s ease;
    }

    .glow-input:focus {
      outline: none;
      border-color: #00ffff;
      box-shadow: 0 0 12px rgba(0,255,255,0.5);
      background: rgba(255,255,255,0.12);
    }

    label {
      color: #cfcfcf;
      font-weight: 500;
      letter-spacing: 0.5px;
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
      background: rgba(255, 255, 255, 0.12);
      color: #e0e0e0;
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: 0.75rem;
      transition: all 0.3s ease;
    }

    .btn-secondary:hover {
      background: rgba(255,255,255,0.25);
      box-shadow: 0 0 20px rgba(255,255,255,0.15);
      transform: scale(1.03);
    }

    /* Title glow */
    .text-glow {
      color: white;
      text-shadow: 0 0 15px rgba(0,255,255,0.6);
      letter-spacing: 1px;
    }

    select option {
      color: #000;
    }
  </style>
</head>
<body>
  <div class="glass-card">
    <h2 class="text-4xl font-bold text-center mb-8 text-glow">CRUDero Add Users</h2>

    <form action="<?=site_url('create');?>" method="POST" class="space-y-6">
      <!-- Last Name -->
      <div>
        <label for="lastname" class="block mb-2">LAST NAME</label>
        <input type="text" name="lastname" id="lastname" required class="glow-input" />
      </div>

      <!-- First Name -->
      <div>
        <label for="firstname" class="block mb-2">FIRST NAME</label>
        <input type="text" name="firstname" id="firstname" required class="glow-input" />
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block mb-2">EMAIL</label>
        <input type="email" name="email" id="email" required class="glow-input" />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block mb-2">PASSWORD</label>
        <input type="password" name="password" id="password" required class="glow-input" />
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="confirm_password" class="block mb-2">CONFIRM PASSWORD</label>
        <input type="password" name="confirm_password" id="confirm_password" required class="glow-input" />
      </div>

      <!-- Role -->
      <div>
        <label for="role" class="block mb-2">ROLE</label>
        <select name="role" id="role" class="glow-input">
          <option value="user" class="text-gray-900">User</option>
          <option value="admin" class="text-gray-900">Admin</option>
        </select>
      </div>

      <!-- Buttons -->
      <div class="flex gap-4 pt-4">
        <input type="submit" value="SUBMIT" class="w-1/2 py-3 font-semibold text-lg btn-glow cursor-pointer" />

        <a href="<?=site_url('view');?>" 
           class="w-1/2 text-center py-3 font-semibold text-lg btn-secondary flex items-center justify-center">
          BACK
        </a>
      </div>
    </form>
  </div>
</body>
</html>
