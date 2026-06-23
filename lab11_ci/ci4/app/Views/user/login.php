<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div style="max-width: 420px; margin: 60px auto; padding: 35px; background: var(--card-white); border-radius: 24px; box-shadow: 0 10px 30px rgba(255, 85, 85, 0.05); border: 2px solid #FFF1F1;">
    
    <div style="text-align: center; margin-bottom: 30px;">
        <span style="font-size: 45px; display: block; margin-bottom: 10px; filter: drop-shadow(0 2px 4px rgb(244, 102, 102));">݁ ˖Ი𐑼⋆</span>
        <h2 style="color: var(--text-dark); margin: 0 0 8px 0; font-family: 'Quicksand', sans-serif; font-weight: 800; font-size: 24px;">Sign In Portal Admin</h2>
        <p style="color: var(--text-muted); font-size: 13px; font-family: 'Quicksand', sans-serif; font-weight: 500; margin: 0; line-height: 1.5;">Gunakan akun terdaftar untuk masuk ke ruang kontrol kontrol.</p>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="background-color: #FFF2F2; color: var(--gaming-red); padding: 12px 18px; border-radius: 14px; margin-bottom: 25px; font-size: 13px; font-family: 'Quicksand', sans-serif; font-weight: 600; border: 1px solid var(--bunny-pink); text-align: center; box-shadow: 0 4px 10px rgba(255, 85, 85, 0.02);">
            🌸 <strong>Aww!</strong> <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/user/login'); ?>" method="post">
        <?= csrf_field(); ?>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 700; color: var(--text-dark); font-size: 13px; font-family: 'Quicksand', sans-serif;">Alamat Email</label>
            <input type="email" name="email" placeholder="contoh@email.com" 
                   style="width: 100%; padding: 12px 16px; border: 2px solid var(--bunny-pink); border-radius: 14px; outline: none; font-size: 14px; font-family: 'Quicksand', sans-serif; color: var(--text-dark); background-color: var(--bg-soft); transition: all 0.2s;" 
                   onfocus="this.style.borderColor='var(--gaming-red)';" onblur="this.style.borderColor='var(--bunny-pink)';"
                   required autofocus>
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 700; color: var(--text-dark); font-size: 13px; font-family: 'Quicksand', sans-serif;">Kata Sandi (Password)</label>
            <input type="password" name="password" placeholder="Masukkan password rahasiamu..." 
                   style="width: 100%; padding: 12px 16px; border: 2px solid var(--bunny-pink); border-radius: 14px; outline: none; font-size: 14px; font-family: 'Quicksand', sans-serif; color: var(--text-dark); background-color: var(--bg-soft); transition: all 0.2s;" 
                   onfocus="this.style.borderColor='var(--gaming-red)';" onblur="this.style.borderColor='var(--bunny-pink)';"
                   required>
        </div>

        <button type="submit" 
                style="width: 100%; padding: 14px; background-color: var(--bunny-pink); color: var(--text-dark); border: none; border-radius: 16px; font-size: 15px; font-family: 'Quicksand', sans-serif; font-weight: 800; cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 0px #E5B2B2;"
                onmouseover="this.style.backgroundColor='var(--gaming-red)'; this.style.color='white'; this.style.boxShadow='0 4px 0px #D43F3F'; this.style.transform='translateY(-1px)';"
                onmouseout="this.style.backgroundColor='var(--bunny-pink)'; this.style.color='var(--text-dark)'; this.style.boxShadow='0 4px 0px #E5B2B2'; this.style.transform='translateY(0)';"
                onclick="this.style.transform='translateY(2px)'; this.style.boxShadow='0 0px 0px transparent';">
            🚀 Masuk ke Dashboard Admin
        </button>
    </form>

    <div style="text-align: center; margin-top: 30px; padding-top: 20px; border-top: 2px dashed var(--bunny-pink);">
        <a href="<?= base_url('/'); ?>" style="color: var(--text-muted); text-decoration: none; font-size: 13px; font-family: 'Quicksand', sans-serif; font-weight: 700; transition: color 0.2s;"
           onmouseover="this.style.color='var(--gaming-red)';" onmouseout="this.style.color='var(--text-muted)';">
            ✨ Kembali ke Beranda Utama
        </a>
    </div>
</div>
<?= $this->endSection(); ?>