<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="artikel-container">
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px dashed var(--bunny-pink); padding-bottom: 12px; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
        <h2 style="margin: 0; color: var(--text-dark); font-weight: 700; font-size: 22px;">✨ Jelajahi Stories Terbaru</h2>

        <form action="" method="get" style="display: flex; gap: 8px;">
            <input type="text" name="q" value="<?= esc($q ?? ''); ?>" placeholder="Cari cerita menarik..." 
                   style="padding: 8px 16px; border: 2px solid var(--bunny-pink); border-radius: 20px; font-size: 13px; width: 200px; outline: none; font-family: 'Quicksand', sans-serif; color: var(--text-dark); background-color: var(--bg-soft);">
            <button type="submit" class="btn-pink" style="border-radius: 20px; padding: 0 16px; font-size: 13px; height: 35px;">
                <i class="fa-solid fa-magnifying-glass" style="font-size: 11px;"></i> Cari
            </button>
        </form>
    </div>

    <?php if(!empty($q)): ?>
        <p style="margin-bottom: 20px; color: var(--text-muted); font-size: 13px; font-weight: 500;">
            Menampilkan hasil untuk: <strong style="color: var(--text-dark);">"<?= esc($q); ?>"</strong> 
            <a href="<?= base_url('/artikel'); ?>" style="color: #E29BB7; text-decoration: none; margin-left: 10px; font-weight: 600;">&times; Reset Pencarian</a>
        </p>
    <?php endif; ?>

    <?php if(session()->getFlashdata('pesan')): ?>
        <div style="background: #FFF0F5; color: var(--text-dark); padding: 12px 18px; margin-bottom: 20px; border-radius: 12px; border: 1px solid var(--bunny-pink); font-size: 13px; font-weight: 500;">
            🌸 <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <?php if($artikel): ?>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px;">
            <?php foreach($artikel as $row): ?>
                <article style="background: var(--card-white); border-radius: 18px; overflow: hidden; box-shadow: 0 4px 12px rgba(90, 75, 83, 0.03); border: 2px solid #FFF1F5; display: flex; flex-direction: column; transition: all 0.3s ease;">
                    
                    <div style="width: 100%; height: 160px; background: var(--bg-soft); display: flex; align-items: center; justify-content: center; color: var(--text-muted); overflow: hidden; position: relative;">
                        <?php if(!empty($row['gambar'])): ?>
                            <img src="<?= base_url('uploads/' . $row['gambar']); ?>" alt="<?= $row['judul']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <span style="font-size: 40px; filter: grayscale(0.2);">📑</span>
                        <?php endif; ?>
                    </div>

                    <div style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                        <div style="margin-bottom: 12px;">
                            <span class="badge-game" style="text-transform: uppercase; letter-spacing: 0.3px;">
                                📁 <?= $row['nama_kategori'] ?? 'Umum'; ?>
                            </span>
                        </div>

                        <h3 style="margin: 0 0 10px 0; font-size: 16px; font-weight: 700; line-height: 1.4; height: 44px; overflow: hidden;">
                            <a href="<?= base_url('/artikel/' . $row['slug']); ?>" style="text-decoration: none; color: var(--text-dark); transition: color 0.2s;">
                                <?= $row['judul']; ?>
                            </a>
                        </h3>
                        
                        <p style="color: var(--text-muted); font-size: 13px; line-height: 1.6; margin-bottom: 0; flex-grow: 1; height: 60px; overflow: hidden;">
                            <?= substr(strip_tags($row['isi']), 0, 90); ?>...
                        </p>
                    </div>

                    <div style="padding: 14px 20px; background: #FFF9FB; border-top: 1px solid var(--bg-soft); display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 11px; color: var(--text-muted); font-weight: 500;">👤 Admin</span>
                        <a href="<?= base_url('/artikel/' . $row['slug']); ?>" style="color: #E29BB7; font-weight: 700; text-decoration: none; font-size: 12px; display: inline-flex; align-items: center; gap: 4px;">
                            Read Story <i class="fa-solid fa-arrow-right" style="font-size: 10px;"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div style="text-align: center; padding: 60px 20px; background: var(--card-white); border-radius: 20px; border: 2px dashed var(--bunny-pink);">
            <span style="font-size: 50px; display: block; margin-bottom: 15px;">分_分</span>
            <h3 style="color: var(--text-dark); margin: 0 0 8px 0; font-size: 16px; font-weight: 700;">Daftar cerita masih kosong</h3>
            <p style="color: var(--text-muted); font-size: 13px; margin: 0;">Coba cari dengan kata kunci lain atau kembali nanti ya.</p>
        </div>
    <?php endif; ?>
</div>

<?php if (isset($pager)): ?>
    <div style="margin-top: 40px; text-align: center;" class="pagination-container">
        <?= $pager->only(['q'])->links('artikel', 'default_full'); ?>
    </div>
<?php endif; ?>

<?= $this->endSection(); ?>