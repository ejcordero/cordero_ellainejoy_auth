<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CRUDero Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap");

    html, body {
      font-family: "Inter", sans-serif;
    }

    /* Background gradient animation */
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    body {
      background: linear-gradient(135deg, #f3e7e9, #e3eeff, #fdfbfb);
      background-size: 400% 400%;
      animation: gradientMove 12s ease infinite;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1.5rem;
    }

    /* Frosted glass effect */
    .glass-card {
      background: rgba(255, 255, 255, 0.45);
      border-radius: 1.5rem;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .glass-card:hover {
      transform: scale(1.02);
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }

    .form-input {
      background: rgba(255, 255, 255, 0.6);
      border: 1px solid rgba(0, 0, 0, 0.05);
      border-radius: 0.75rem;
      padding: 0.75rem 1rem;
      transition: all 0.2s ease;
    }

    .form-input:focus {
      outline: none;
      border-color: #6366f1;
      box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
      background: rgba(255, 255, 255, 0.9);
    }

    .btn-primary {
      background: linear-gradient(90deg, #6366f1, #8b5cf6);
      color: white;
      border-radius: 0.75rem;
      font-weight: 600;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(99, 102, 241, 0.4);
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.7);
      border-radius: 0.75rem;
      color: #4b5563;
      font-weight: 600;
      transition: all 0.2s ease;
    }

    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.9);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      transform: translateY(-2px);
    }

    .title-gradient {
      background: linear-gradient(90deg, #6366f1, #8b5cf6);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>
<body>
  <div class="w-full max-w-md glass-card p-10">
    <h1 class="text-4xl font-bold text-center mb-8 title-gradient">Create Account</h1>

    <form action="<?= site_url('signup'); ?>" method="POST" class="space-y-6">
      <div>
        <label for="first-name" class="block text-gray-600 text-sm font-medium mb-2">First Name</label>
        <input type="text" id="first-name" name="first-name" placeholder="John"
          class="w-full form-input text-gray-700 placeholder-gray-400" />
      </div>

      <div>
        <label for="last-name" class="block text-gray-600 text-sm font-medium mb-2">Last Name</label>
        <input type="text" id="last-name" name="last-name" placeholder="Doe"
          class="w-full form-input text-gray-700 placeholder-gray-400" />
      </div>

      <div>
        <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email Address</label>
        <input type="email" id="email" name="email" placeholder="you@example.com"
          class="w-full form-input text-gray-700 placeholder-gray-400" />
      </div>

      <div>
        <label for="user-type" class="block text-gray-600 text-sm font-medium mb-2">User Type</label>
        <select id="user-type" name="user-type" class="w-full form-input text-gray-700">
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <div>
        <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••"
          class="w-full form-input text-gray-700 placeholder-gray-400" />
      </div>

      <div class="flex gap-4">
        <button type="submit" name="submit"
          class="flex-1 btn-primary py-3 text-lg shadow-md">Sign Up</button>

        <a href="<?= site_url('landing-page'); ?>"
          class="flex-1 text-center py-3 text-lg btn-secondary shadow-sm">Back</a>
      </div>
    </form>

    <div class="mt-8 text-center">
      <p class="text-sm text-gray-600">
        Already have an account?
        <a href="<?= site_url('login'); ?>" class="text-indigo-600 font-semibold hover:underline">
          Log In
        </a>
      </p>
    </div>
  </div>
</body>
</html>
