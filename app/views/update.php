<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUDero Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
    html, body { font-family: 'Inter', sans-serif; }

    /* Animated background gradient */
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
      padding: 2rem;
      position: relative;
    }

    /* Glowing orbs background */
    body::before, body::after {
      content: '';
      position: absolute;
      width: 400px;
      height: 400px;
      filter: blur(120px);
      z-index: 0;
    }
    body::before {
      top: 15%;
      left: 10%;
      background: radial-gradient(circle, rgba(0,255,255,0.4), transparent 70%);
    }
    body::after {
      bottom: 15%;
      right: 10%;
      background: radial-gradient(circle, rgba(255,0,255,0.4), transparent 70%);
    }

    /* Glass card container */
    .glass-card {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(25px);
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.2);
      transition: all 0.3s ease-in-out;
      position: relative;
      z-index: 1;
    }
    .glass-card:hover {
      box-shadow: 0 0 35px rgba(0, 255, 255, 0.35);
      transform: translateY(-3px);
    }

    /* Text glow */
    .text-glow {
      text-shadow: 0 0 12px rgba(0,255,255,0.6);
    }

    /* Input fields */
    input, select {
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #fff;
      transition: all 0.3s ease;
    }
    input::placeholder, select {
      color: rgba(255,255,255,0.6);
    }
    input:focus, select:focus {
      outline: none;
      border-color: rgba(0,255,255,0.7);
      background: rgba(255, 255, 255, 0.25);
    }

    /* Glowing buttons */
    .btn-glow {
      background: linear-gradient(90deg, #00ffff, #0077ff);
      color: white;
      box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
      transition: all 0.3s ease;
    }
    .btn-glow:hover {
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.9);
      transform: scale(1.05);
    }
    .btn-secondary {
      background: rgba(255,255,255,0.1);
      color: #e0e0e0;
      border: 1px solid rgba(255,255,255,0.2);
      transition: all 0.3s ease;
    }
    .btn-secondary:hover {
      background: rgba(255,255,255,0.2);
      box-shadow: 0 0 20px rgba(255,255,255,0.15);
    }
  </style>
</head>
<body>
  <div class="glass-card max-w-xl w-full p-10 rounded-3xl text-white">
    <h2 class="text-4xl font-bold text-center mb-8 text-glow tracking-wider">CRUDero UPDATE USER</h2>

    <form action="<?=site_url('update/'.$user['student_id']);?>" method="POST" class="space-y-6">

      <!-- Last Name -->
      <div>
        <label for="lastname" class="block font-medium mb-1">LAST NAME</label>
        <input type="text" name="lastname" id="lastname" value="<?=$user['last_name'];?>"
               class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-cyan-400" />
      </div>

      <!-- First Name -->
      <div>
        <label for="firstname" class="block font-medium mb-1">FIRST NAME</label>
        <input type="text" name="firstname" id="firstname" value="<?=$user['first_name'];?>"
               class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-cyan-400" />
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block font-medium mb-1">EMAIL</label>
        <input type="email" name="email" id="email" value="<?=$user['email'];?>" required
               class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-cyan-400" />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block font-medium mb-1">PASSWORD</label>
        <input type="password" name="password" id="password"
               placeholder="Leave blank to keep current password"
               class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-cyan-400" />
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="confirm_password" class="block font-medium mb-1">CONFIRM PASSWORD</label>
        <input type="password" name="confirm_password" id="confirm_password"
               placeholder="Leave blank to keep current password"
               class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-cyan-400" />
      </div>

      <!-- Role -->
      <div>
        <label for="role" class="block font-medium mb-1">ROLE</label>
        <select name="role" id="role"
                class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-cyan-400">
          <option value="user" <?=($user['user_type'] === 'user') ? 'selected' : '';?>>User</option>
          <option value="admin" <?=($user['user_type'] === 'admin') ? 'selected' : '';?>>Admin</option>
        </select>
      </div>

      <!-- Buttons -->
      <div class="flex gap-4 mt-6">
        <input type="submit" value="SUBMIT"
               class="flex-1 py-3 text-center rounded-xl btn-glow cursor-pointer font-semibold" />
        <a href="<?=site_url('/view');?>"
           class="flex-1 text-center py-3 rounded-xl btn-secondary font-semibold">BACK</a>
      </div>

    </form>
  </div>
</body>
</html>
