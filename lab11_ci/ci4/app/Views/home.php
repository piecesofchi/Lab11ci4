<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div style="background: linear-gradient(135deg, rgb(247, 87, 87), rgb(250, 156, 156)), url('https://lh3.googleusercontent.com/d/1ZtC14j'); 
            background-size: cover; background-position: center; padding: 60px 40px; color: white; border-radius: 24px; margin-bottom: 35px; border: 2px solid var(--bunny-pink); box-shadow: 0 10px 30px rgba(255, 85, 85, 0.15);">
    
    <div style="display: grid; grid-template-columns: 1fr auto; gap: 30px; align-items: center; flex-wrap: wrap;">
        <div style="text-align: left;">
            <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(255, 255, 255, 0.15); padding: 6px 14px; border-radius: 20px; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.2);">
                <span style="font-size: 12px; font-family: 'Quicksand', sans-serif; font-weight: 700; letter-spacing: 0.5px; color: #FFF;">𐔌՞. .՞𐦯🥕 ༘⋆ PORTAL LIVE UPDATE</span>
            </div>
            <h1 style="font-family: 'Quicksand', sans-serif; font-size: 38px; font-weight: 900; margin: 0 0 12px 0; text-shadow: 2px 3px 6px rgba(0, 0, 0, 0.5); color: #FFFFFF; line-height: 1.2;">
                <span style="color: var(--bunny-pink); text-shadow: 2px 3px 6px rgba(255,85,85,0.3);">ArChi݁ ˖Ი︵𐑼⋆<br>Cozy Gaming Portal!</span>
            </h1>
            <p style="font-family: 'Quicksand', sans-serif; font-size: 15px; font-weight: 600; max-width: 650px; margin: 0 0 25px 0; line-height: 1.7; color: #FFF0F2; text-shadow: 1px 1px 4px rgba(0,0,0,0.4);">
                Ruang santai paling seru buat nyari tahu update game terhangat, review tersembunyi, tips petualangan rahasia, sampai gosip skena esports lokal favorit kamu! Let's level up together! 🕹️🌸
            </p>
            <a href="<?= base_url('/artikel'); ?>" 
               style="display: inline-block; background-color: var(--bunny-pink); color: var(--text-dark); padding: 14px 32px; text-decoration: none; border-radius: 16px; font-family: 'Quicksand', sans-serif; font-weight: 800; font-size: 14px; transition: all 0.2s; box-shadow: 0 5px 0px #D43F3F;"
               onmouseover="this.style.backgroundColor='var(--gaming-red)'; this.style.color='white'; this.style.boxShadow='0 5px 0px #A32A2A'; this.style.transform='translateY(-1px)';"
               onmouseout="this.style.backgroundColor='var(--bunny-pink)'; this.style.color='var(--text-dark)'; this.style.boxShadow='0 5px 0px #D43F3F'; this.style.transform='translateY(0)';"
               onclick="this.style.transform='translateY(3px)'; this.style.boxShadow='0 0px 0px transparent';">
                Mulai Menjelajah &rarr;
            </a>
        </div>

        <div style="background: rgba(255, 255, 255, 0.1); border: 2px dashed rgba(255, 255, 255, 0.2); padding: 30px; border-radius: 20px; text-align: center; backdrop-filter: blur(4px);" class="hero-badge-hide">
            <span style="font-size: 60px; display: block; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));">🐇</span>
            <div style="margin-top: 10px; background: var(--gaming-red); color: white; padding: 4px 12px; border-radius: 10px; font-family: 'Quicksand', sans-serif; font-weight: 700; font-size: 11px; letter-spacing: 1px;">
                <i class="fa-solid fa-gamepad"></i> LVL. 99
            </div>
        </div>
    </div>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 25px; margin-bottom: 35px;">
    <div style="background: var(--card-white); padding: 28px 25px; border-top: 5px solid var(--gaming-red); box-shadow: 0 4px 15px rgba(255, 85, 85, 0.02); border-radius: 20px; border-left: 2px solid #FFF1F1; border-right: 2px solid #FFF1F1; border-bottom: 2px solid #FFF1F1; transition: all 0.2s ease;"
         onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 20px rgba(255, 85, 85, 0.06)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(255, 85, 85, 0.02)';">
        <h3 style="margin: 0 0 12px 0; font-family: 'Quicksand', sans-serif; font-weight: 800; color: var(--text-dark); font-size: 18px; display: flex; align-items: center; gap: 8px;">
            📰 Jurnal Update Game
        </h3>
        <p style="color: var(--text-muted); font-size: 13px; line-height: 1.6; font-family: 'Quicksand', sans-serif; font-weight: 500; margin: 0;">
            Jangan sampai ketinggalan patch notes terbaru, perilisan konsol, hingga info update game cozy dan kasual kesayanganmu setiap hari!
        </p>
    </div>
    
    <div style="background: var(--card-white); padding: 28px 25px; border-top: 5px solid var(--bunny-purple); box-shadow: 0 4px 15px rgba(255, 85, 85, 0.02); border-radius: 20px; border-left: 2px solid #FFF1F1; border-right: 2px solid #FFF1F1; border-bottom: 2px solid #FFF1F1; transition: all 0.2s ease;"
         onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 20px rgba(255, 85, 85, 0.06)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(255, 85, 85, 0.02)';">
        <h3 style="margin: 0 0 12px 0; font-family: 'Quicksand', sans-serif; font-weight: 800; color: var(--text-dark); font-size: 18px; display: flex; align-items: center; gap: 8px;">
            💡 Panduan & Tips Rahasia
        </h3>
        <p style="color: var(--text-muted); font-size: 13px; line-height: 1.6; font-family: 'Quicksand', sans-serif; font-weight: 500; margin: 0;">
            Kumpulan panduan leveling, teka-teki dungeon, kombinasi build item, hingga trik dekorasi sandbox map biar permainanmu makin epik dan mulus.
        </p>
    </div>
    
    <div style="background: var(--card-white); padding: 28px 25px; border-top: 5px solid #FF9595; box-shadow: 0 4px 15px rgba(255, 85, 85, 0.02); border-radius: 20px; border-left: 2px solid #FFF1F1; border-right: 2px solid #FFF1F1; border-bottom: 2px solid #FFF1F1; transition: all 0.2s ease;"
         onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 20px rgba(255, 85, 85, 0.06)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(255, 85, 85, 0.02)';">
        <h3 style="margin: 0 0 12px 0; font-family: 'Quicksand', sans-serif; font-weight: 800; color: var(--text-dark); font-size: 18px; display: flex; align-items: center; gap: 8px;">
            🎮 Rekomendasi Mabar
        </h3>
        <p style="color: var(--text-muted); font-size: 13px; line-height: 1.6; font-family: 'Quicksand', sans-serif; font-weight: 500; margin: 0;">
            Bingung mau main apa pas akhir pekan? Intip kurasi game multiplayer seru dari kami buat dimainkan bareng teman kelompok atau komunitasmu!
        </p>
    </div>
</div>

<div style="padding: 30px; border-left: 5px solid var(--gaming-red); background-color: #FFF5F6; border-radius: 0 24px 24px 0; margin-bottom: 20px; box-shadow: inset 0 0 20px rgba(255,85,85,0.01);">
    <h2 style="margin: 0 0 12px 0; color: var(--text-dark); font-family: 'Quicksand', sans-serif; font-weight: 800; font-size: 20px; display: flex; align-items: center; gap: 8px;">
        🎮 <?= esc($title) ?> <span style="font-size: 11px; background: var(--bunny-purple); color: var(--text-dark); padding: 3px 10px; border-radius: 20px; font-weight: 700;">STATION OPERATOR</span>
    </h2>
    <p style="line-height: 1.8; color: var(--text-dark); font-size: 14px; font-family: 'Quicksand', sans-serif; font-weight: 500; margin: 0 0 12px 0;">
        Halo para *gamers* dan petualang dunia virtual! ArChi Cozy Gaming Portal didesain khusus sebagai wadah santai buat mengulas cerita, berita, dan sisi seru industri game dengan penyajian yang ringan dan memanjakan mata.
    </p>
    <p style="line-height: 1.8; color: var(--text-dark); font-size: 14px; font-family: 'Quicksand', sans-serif; font-weight: 500; margin: 0;">
        Yuk langsung meluncur ke daftar artikel cerita kami untuk menemukan topik seru, atau manfaatkan fitur pencarian pintar di navigasi atas. Selamat bersenang-senang dan *happy gaming*! ✨
    </p>
</div>

<style>
    @media (max-width: 768px) {
        .hero-badge-hide { display: none !important; }
    }
</style>
<?= $this->endSection() ?>