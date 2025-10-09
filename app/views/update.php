<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUDero Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    html, body { font-family: 'Poppins', sans-serif; }
    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #667eea, #764ba2);
      overflow: hidden;
      padding: 1.5rem;
    }

    .glass {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      border-radius: 1.5rem;
      box-shadow: 0 8px 32px rgba(0,0,0,0.2);
      border: 1px solid rgba(255,255,255,0.2);
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    label {
      letter-spacing: 0.5px;
    }

    input, select {
      background: rgba(255, 255, 255, 0.25);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: #1a1a1a;
      transition: all 0.3s ease;
    }

    input:focus, select:focus {
      outline: none;
      background: rgba(255, 255, 255, 0.5);
      border-color: #667eea;
    }

    .btn-primary {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #5a67d8, #6b46c1);
      transform: translateY(-2px);
    }

    .btn-secondary {
      background: rgba(255,255,255,0.3);
      color: #1a1a1a;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-secondary:hover {
      background: rgba(255,255,255,0.5);
      transform: translateY(-2px);
    }

    .title {
      background: linear-gradient(90deg, #fff, #d4d4d4);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>
<body>
  <div class="glass w-full max-w-lg p-10">
    <h2 class="text-3xl font-bold text-center mb-8 title tracking-widest">UPDATE USER</h2>

    <form action="<?=site_url('update/'.$user['student_id']);?>" method="POST" class="space-y-6">

      <!-- Last Name -->
      <div>
        <label for="lastname" class="block text-gray-100 font-medium mb-1">LAST NAME</label>
        <input type="text" name="lastname" id="lastname" value="<?=$user['last_name'];?>"
               class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-400" />
      </div>

      <!-- First Name -->
      <div>
        <label for="firstname" class="block text-gray-100 font-medium mb-1">FIRST NAME</label>
        <input type="text" name="firstname" id="firstname" value="<?=$user['first_name'];?>"
               class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-400" />
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-gray-100 font-medium mb-1">EMAIL</label>
        <input type="email" name="email" id="email" value="<?=$user['email'];?>" required
               class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-400" />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-gray-100 font-medium mb-1">PASSWORD</label>
        <input type="password" name="password" id="password"
               placeholder="Leave blank to keep current password"
               class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-400" />
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="confirm_password" class="block text-gray-100 font-medium mb-1">CONFIRM PASSWORD</label>
        <input type="password" name="confirm_password" id="confirm_password"
               placeholder="Leave blank to keep current password"
               class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-400" />
      </div>

      <!-- Role -->
      <div>
        <label for="role" class="block text-gray-100 font-medium mb-1">ROLE</label>
        <select name="role" id="role"
                class="w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-400">
          <option value="user" <?=($user['user_type'] === 'user') ? 'selected' : '';?>>User</option>
          <option value="admin" <?=($user['user_type'] === 'admin') ? 'selected' : '';?>>Admin</option>
        </select>
      </div>

      <!-- Buttons -->
      <div class="flex gap-4">
        <input type="submit" value="SUBMIT"
               class="flex-1 py-3 text-center rounded-lg btn-primary cursor-pointer" />
        <a href="<?=site_url('/view');?>"
           class="flex-1 text-center py-3 rounded-lg btn-secondary">BACK</a>
      </div>

    </form>
  </div>
</body>
</html>
