<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | ArChi</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            /* Warna pastel kalem khas ArChi */
            --bg-soft:          #FFF5F8; /* Pink putih sangat lembut */
            --bunny-pink:       #FCD1E1; /* Muted pink pastel */
            --bunny-purple:     #E8DFFF; /* Muted lavender */
            --card-white:       #FFFFFF;
            --text-dark:        #5A4B53; /* Abu cokelat kalem untuk teks utama */
            --text-muted:       #96858F; /* Teks sekunder */
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Quicksand', sans-serif;
            background-color: var(--bg-soft);
            margin: 0;
            color: var(--text-dark);
            padding-bottom: 40px;
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

        /* Kotak avatar logo luar */
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
        }

        /* Badge Console Bulat di Pojok Kanan Bawah */
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
            color: #E29BB7;
        }

        .user-status {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* ===== NAVBAR (Bentuk Pita Minimalis) ===== */
        nav {
            background-color: var(--bunny-pink);
            max-width: 1100px;
            margin: 0 auto;
            height: 48px;
            display: flex;
            align-items: center;
            padding: 0 20px;
            border-radius: 0 0 16px 16px;
            box-shadow: 0 4px 0px #E5B7C9;
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
            opacity: 0.7;
            transform: translateY(-1px);
        }

        .nav-auth {
            margin-left: auto;
            display: flex;
            gap: 15px;
        }

        .nav-auth a {
            padding: 0;
            font-size: 12px;
        }

        /* ===== CONTAINER UTAMA ===== */
        .container {
            display: flex;
            gap: 20px;
            max-width: 1100px;
            margin: 25px auto;
            background: transparent;
            min-height: 70vh;
        }

        main {
            flex: 3;
            padding: 25px;
            background: var(--card-white);
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(90, 75, 83, 0.03);
        }

        /* ===== SIDEBAR ===== */
        aside {
            flex: 1;
            background: var(--card-white);
            padding: 25px 20px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(90, 75, 83, 0.03);
            align-self: start;
        }

        aside h3 {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
            border-bottom: 2px dashed var(--bunny-pink);
            padding-bottom: 6px;
            margin-top: 0;
            margin-bottom: 15px;
        }

        /* ===== FOOTER ===== */
        footer {
            margin-top: 40px;
            text-align: center;
            font-size: 13px;
            color: var(--text-muted);
            padding: 20px;
            border-top: 1px solid var(--bunny-pink);
        }

        /* Responsive Desain */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                padding: 0 15px;
            }
            nav {
                height: auto;
                flex-direction: column;
                padding: 10px;
                border-radius: 12px;
                margin: 0 15px;
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
                    🐰
                    <div class="badge-console">
                        <i class="fa-solid fa-gamepad"></i>
                    </div>
                </div>
                <div class="logo-text">Ar<span>Chi</span></div>
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
        <a href="<?= base_url('artikel'); ?>">Stories</a>
        <a href="<?= base_url('about'); ?>">About</a>
        <a href="<?= base_url('contact'); ?>">Kontak</a>

        <div class="nav-auth">
            <?php if (session()->get('logged_in')): ?>
                <a href="<?= base_url('/admin/artikel'); ?>"><i class="fas fa-grid-2"></i> Dashboard</a>
                <a href="<?= base_url('/user/logout'); ?>">Logout</a>
            <?php else: ?>
                <a href="<?= base_url('/user/login'); ?>">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container">
        <main>
            <?= $this->renderSection('content'); ?>
        </main>

        <aside>
            <h3>✨ Artikel Terkini</h3>
            <?= view_cell('App\Cells\ArtikelTerkini::render') ?>
        </aside>
    </div>

    <footer>
        <p>&copy; 2026 ArChi. All rights reserved.</p>
        <p style="font-size: 11px; opacity: 0.7; margin: 4px 0;">Made with 🌸 and 🥕</p>
    </footer>

</body>
</html>