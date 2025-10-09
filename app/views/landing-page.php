<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUDero</title>
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
      overflow: hidden;
      position: relative;
      padding: 2rem;
    }

    /* Glowing background effects */
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

    /* Glassmorphic container */
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

    /* Button glow styles */
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
      background: rgba(255, 255, 255, 0.1);
      color: #e0e0e0;
      border: 1px solid rgba(255,255,255,0.2);
      transition: all 0.3s ease;
    }

    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.2);
      box-shadow: 0 0 20px rgba(255,255,255,0.15);
    }

    .text-glow {
      text-shadow: 0 0 12px rgba(0,255,255,0.5);
    }
  </style>
</head>
<body>
  <div class="glass-card max-w-2xl w-full p-12 text-center rounded-3xl">
    <h1 class="text-5xl font-bold text-white mb-6 text-glow">Welcome to CRUDero</h1>
    <div class="flex justify-center gap-6">
      <a href="<?=site_url('login');?>"
         class="btn-secondary px-10 py-3 rounded-xl font-semibold text-lg">
        LOGIN
      </a>
      <a href="<?=site_url('signup');?>"
         class="btn-glow px-10 py-3 rounded-xl font-semibold text-lg">
        REGISTER
      </a>
    </div>
  </div>
</body>
</html>
