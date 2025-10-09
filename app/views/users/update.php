<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CRUDero Update User</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome & Poppins -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      font-family: "Poppins", sans-serif;
    }
  </style>
</head>
<body class="min-h-screen flex justify-center items-center bg-cover bg-center p-6" 
  style="background-image: url('<?= base_url() . "public/image/BG5.jpg"; ?>');">

  <div class="w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/30 shadow-xl rounded-2xl p-10 animate-fade-in">
    <h1 class="text-3xl font-semibold text-[#1e5631] text-center mb-8">CRUDero Update User</h1>

    <form action="<?= site_url('users/update/'.$user['id']) ?>" method="POST" class="space-y-5">
      <div>
        <input type="text" name="username" value="<?= html_escape($user['username']); ?>" 
          placeholder="Username" required
          class="w-full px-4 py-3 border border-yellow-600 rounded-xl bg-white/80 text-[#144423] shadow-inner focus:ring-2 focus:ring-[#1e5631] focus:outline-none transition">
      </div>

      <div>
        <input type="email" name="email" value="<?= html_escape($user['email']); ?>" 
          placeholder="Email" required
          class="w-full px-4 py-3 border border-yellow-600 rounded-xl bg-white/80 text-[#144423] shadow-inner focus:ring-2 focus:ring-[#1e5631] focus:outline-none transition">
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div>
          <select name="role" required
            class="w-full px-4 py-3 border border-yellow-600 rounded-xl bg-white/80 text-[#144423] shadow-inner focus:ring-2 focus:ring-[#1e5631] focus:outline-none transition">
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <div class="relative">
          <input type="password" name="password" id="password" 
            placeholder="New Password (leave blank if unchanged)"
            class="w-full px-4 py-3 border border-yellow-600 rounded-xl bg-white/80 text-[#144423] shadow-inner focus:ring-2 focus:ring-[#1e5631] focus:outline-none transition">
          <i id="togglePassword" class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-[#1e5631] cursor-pointer"></i>
        </div>
      <?php endif; ?>

      <button type="submit"
        class="w-full py-3 rounded-xl font-medium text-white bg-gradient-to-r from-[#1e5631] to-[#a38b00] hover:shadow-lg hover:-translate-y-0.5 transition-transform">
        Update User
      </button>
    </form>

    <a href="<?= site_url('/users'); ?>" 
      class="block text-center mt-5 bg-[#1e5631] text-white py-3 rounded-xl hover:bg-[#144423] transition-transform hover:-translate-y-0.5 shadow-md">
      Cancel
    </a>
  </div>

  <script>
    // Fade-in animation using Tailwind utilities
    tailwind.config = {
      theme: {
        extend: {
          animation: {
            'fade-in': 'fadeIn 0.6s ease-in-out',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0', transform: 'translateY(20px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            }
          }
        }
      }
    }

    // Toggle Password Visibility
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    if (togglePassword) {
      togglePassword.addEventListener('click', () => {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        togglePassword.classList.toggle('fa-eye');
        togglePassword.classList.toggle('fa-eye-slash');
      });
    }

    // SweetAlert2: No changes detected
    <?php if(isset($no_changes) && $no_changes === true): ?>
      Swal.fire({
        icon: 'info',
        title: 'No Changes Detected',
        text: 'You did not modify any fields.',
        confirmButtonColor: '#1e5631'
      }).then(() => {
        window.history.back();
      });
    <?php endif; ?>
  </script>
</body>
</html>
