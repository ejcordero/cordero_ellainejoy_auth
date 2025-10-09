<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUDero Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    html, body { font-family: 'Inter', sans-serif; }

    /* Animated glowing gradient background */
    @keyframes gradientGlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    body {
      background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #1e3c72, #2a5298);
      background-size: 400% 400%;
      animation: gradientGlow 15s ease infinite;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 2rem;
      overflow: hidden;
      position: relative;
    }

    /* Glowing effects behind the form */
    body::before {
      content: '';
      position: absolute;
      top: 20%;
      left: 10%;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(0,255,255,0.4), transparent 70%);
      filter: blur(100px);
      z-index: 0;
    }

    body::after {
      content: '';
      position: absolute;
      bottom: 10%;
      right: 10%;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(255,0,255,0.4), transparent 70%);
      filter: blur(100px);
      z-index: 0;
    }

    /* Card styling */
    .glass-card {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(20px);
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.15);
      transition: all 0.3s ease-in-out;
      position: relative;
      z-index: 1;
    }

    .glass-card:hover {
      box-shadow: 0 0 35px rgba(0, 255, 255, 0.25);
      transform: translateY(-3px);
    }

    /* Inputs glow effect */
    .glow-input {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.25);
      color: #e0e0e0;
      transition: all 0.2s;
    }

    .glow-input:focus {
      border-color: #00ffff;
      box-shadow: 0 0 10px #00ffff;
      outline: none;
      background: rgba(255, 255, 255, 0.15);
    }

    /* Button glow */
    .glow-btn {
      background: linear-gradient(90deg, #00ffff, #0077ff);
      color: #fff;
      box-shadow: 0 0 15px rgba(0, 255, 255, 0.6);
      transition: all 0.3s ease;
    }

    .glow-btn:hover {
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.9);
      transform: scale(1.03);
    }

    /* Text */
    .text-glow {
      text-shadow: 0 0 10px rgba(0,255,255,0.4);
    }
  </style>
</head>
<body>
  <div class="glass-card rounded-2xl max-w-lg w-full p-10">
    <h2 class="text-4xl font-bold text-center mb-8 text-white tracking-wide text-glow">
      CREATE USER ACCOUNT
    </h2>

    <form action="<?=site_url('create');?>" method="POST" class="space-y-6">
      <!-- Last Name -->
      <div>
        <label for="lastname" class="block text-gray-300 font-medium mb-2">LAST NAME</label>
        <input type="text" name="lastname" id="lastname" required
               class="w-full px-4 py-3 rounded-lg glow-input" />
      </div>

      <!-- First Name -->
      <div>
        <label for="firstname" class="block text-gray-300 font-medium mb-2">FIRST NAME</label>
        <input type="text" name="firstname" id="firstname" required
               class="w-full px-4 py-3 rounded-lg glow-input" />
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-gray-300 font-medium mb-2">EMAIL</label>
        <input type="email" name="email" id="email" required
               class="w-full px-4 py-3 rounded-lg glow-input" />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-gray-300 font-medium mb-2">PASSWORD</label>
        <input type="password" name="password" id="password" required
               class="w-full px-4 py-3 rounded-lg glow-input" />
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="confirm_password" class="block text-gray-300 font-medium mb-2">CONFIRM PASSWORD</label>
        <input type="password" name="confirm_password" id="confirm_password" required
               class="w-full px-4 py-3 rounded-lg glow-input" />
      </div>

      <!-- Role Selection -->
      <div>
        <label for="role" class="block text-gray-300 font-medium mb-2">ROLE</label>
        <select name="role" id="role" class="w-full px-4 py-3 rounded-lg glow-input">
          <option value="user" class="text-gray-900">User</option>
          <option value="admin" class="text-gray-900">Admin</option>
        </select>
      </div>

      <!-- Buttons -->
      <div class="flex gap-4 pt-2">
        <input type="submit" value="SUBMIT"
          class="w-1/2 text-center rounded-lg py-3 font-semibold text-lg glow-btn cursor-pointer" />

        <a href="<?=site_url('view');?>" 
           class="w-1/2 text-center rounded-lg py-3 font-semibold text-lg text-gray-200 bg-gray-700/40 border border-gray-500/40 hover:bg-gray-600/50 transition duration-200 flex items-center justify-center">
          BACK
        </a>
      </div>
    </form>
  </div>
</body>
</html>
