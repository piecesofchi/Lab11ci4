<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | ArChi</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link rel="stylesheet" href="<?= base_url('style.css');?>">
    
    <style>
        :root {
            --bg-soft:          #FFF6F6; /* Diubah jadi putih semburat merah super soft */
            --bunny-pink:       #FFD2D2; /* Diubah jadi merah pastel lembut */
            --bunny-purple:     #FFE3E3; /* Sub-badge disesuaikan ke tone kemerahan */
            --card-white:       #FFFFFF;
            --text-dark:        #5A4646; /* Diubah ke cokelat tua kemerahan hangat */
            --text-muted:       #968080; /* Menyesuaikan tone text-dark */
            --gaming-red:       #FF5555; /* Warna utama kustom pilihan Chi! */
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Quicksand', sans-serif;
            background-color: var(--bg-soft);
            margin: 0;
            color: var(--text-dark);
            padding-bottom: 40px;
        }

        /* ===== ANIMASI KELINCI LOMPAT ===== */
        @keyframes bunnyBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }

        /* ===== HEADER SIMPLE ===== */
        header {
            background-color: var(--card-white);
            padding: 20px 5%;
            border-bottom: 2px solid var(--bunny-pink);
        }

        .header-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1100px;
            margin: auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 14px; 
            text-decoration: none;
        }

        .logo-avatar {
            position: relative;
            width: 54px;
            height: 54px;
            background-color: var(--card-white);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--bunny-pink);
            font-size: 30px; 
            line-height: 1;
            animation: bunnyBounce 2s infinite ease-in-out;
            transform-origin: bottom;
        }

        .logo-avatar .badge-console {
            position: absolute;
            bottom: -2px;
            right: -4px;
            width: 22px;
            height: 22px;
            background-color: var(--bunny-pink);
            border: 2px solid var(--card-white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .logo-avatar .badge-console i {
            font-size: 11px;
            color: var(--card-white);
        }

        .logo-text {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            letter-spacing: -0.5px;
        }

        .logo-text span {
            color: var(--gaming-red); /* Menggunakan warna merah pilihanmu */
        }

        .user-status {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* ===== NAVBAR ===== */
        nav {
            background-color: var(--bunny-pink);
            max-width: 1100px;
            margin: 0 auto;
            height: 48px;
            display: flex;
            align-items: center;
            padding: 0 20px;
            border-radius: 0 0 16px 16px;
            box-shadow: 0 4px 0px #E5B2B2; /* Disesuaikan dengan bayangan merah soft */
        }

        nav a {
            color: var(--text-dark);
            text-decoration: none;
            padding: 0 14px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s ease;
            line-height: 48px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        nav a:hover {
            color: var(--gaming-red);
            transform: translateY(-1px);
        }

        .nav-auth {
            margin-left: auto;
            display: flex;
            gap: 10px;
        }

        .nav-auth a {
            padding: 0;
            font-size: 12px;
        }

        /* ===== CONTAINER UTAMA ===== */
        #container {
            max-width: 1100px;
            margin: 25px auto;
            background: transparent;
        }

        #wrapper {
            display: flex;
            gap: 20px;
        }

        #main {
            flex: 3;
            min-height: 500px;
            padding: 25px;
            background: var(--card-white);
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(90, 75, 83, 0.03);
        }

        /* ===== SIDEBAR ===== */
        #sidebar {
            flex: 1;
            background: var(--card-white);
            padding: 25px 20px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(90, 75, 83, 0.03);
            align-self: start;
        }

        .sidebar-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
            border-bottom: 2px dashed var(--bunny-pink);
            padding-bottom: 6px;
            margin-bottom: 15px;
        }

        /* ===== FOOTER ===== */
        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 13px;
            color: var(--text-muted);
            padding: 20px;
            border-top: 1px solid var(--bunny-pink);
        }

        footer p {
            margin: 4px 0;
        }

        /* ===== BUTTONS & BADGES ===== */
        .btn-pink {
            background-color: var(--bunny-pink);
            color: var(--text-dark);
            padding: 8px 18px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: background-color 0.2s, color 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-pink:hover {
            background-color: var(--gaming-red);
            color: white;
        }

        .badge-game {
            background-color: var(--bunny-purple);
            color: var(--text-dark);
            font-size: 11px;
            font-weight: 600;
            padding: 2px 10px;
            border-radius: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            #wrapper {
                flex-direction: column;
            }
            nav {
                height: auto;
                flex-direction: column;
                padding: 10px;
                border-radius: 12px;
            }
            nav a {
                line-height: 30px;
            }
            .nav-auth {
                margin-left: 0;
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="header-inner">
            <a href="<?= base_url('/'); ?>" class="logo">
                <div class="logo-avatar">
                    <span style="color: #363636;display: block; margin-bottom: 10px; filter: drop-shadow(0 2px 4px rgb(255, 53, 53));">₍ᐢᐢ₎</span>
                    <div class="badge-console">
                        <i class="fa-solid fa-gamepad"></i>
                    </div>
                </div>
                
                <div style="display: flex; flex-direction: column; justify-content: center; line-height: 1.2;">
                    <div class="logo-text" style="font-size: 26px; font-weight: 700; color: var(--text-dark); letter-spacing: -0.5px; margin: 0;">
                        Ar<span>Chi</span>₍⑅ᐢ..ᐢ₎ᡕᠵデᡁ᠊╾━°❀⋆.ೃ࿔*:･
                    </div>
                    <div style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 1px; letter-spacing: 0.2px;">
                        Your cozy gaming portal
                    </div>
                </div>
            </a>

            <div class="user-status">
                <?php if (session()->get('logged_in')): ?>
                    <span>🌸 Hello, <strong>Admin</strong> 🥕</span>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <nav>
        <a href="<?= base_url('/'); ?>">Home</a>
        <a href="<?= base_url('/artikel'); ?>">Stories</a>
        <a href="<?= base_url('/review'); ?>">Reviews</a>
        <a href="<?= base_url('/tips'); ?>">Tips</a>
        <a href="<?= base_url('/about'); ?>">About</a>

        <div class="nav-auth">
            <?php if (session()->get('logged_in')): ?>
                <a href="<?= base_url('/admin/artikel'); ?>"><i class="fas fa-grid-2"></i> Dashboard</a>
                <a href="<?= base_url('/user/logout'); ?>">Logout</a>
            <?php else: ?>
                <a href="<?= base_url('/user/login'); ?>">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <div id="container">
        <section id="wrapper">
            <main id="main">
                <?= $this->renderSection('content'); ?>
            </main>

            <aside id="sidebar">
                <div class="sidebar-title">
                    ✨ Terbaru
                </div>
                <?= view_cell('App\Cells\ArtikelTerkini::render'); ?>
            </aside>
        </section>

        <footer>
            <p>&copy; 2026 ArChi. All rights reserved.</p>
            <p style="font-size: 11px; opacity: 0.7;">Made with 🌸 and 🥕</p>
        </footer>
    </div>

</body>
</html>