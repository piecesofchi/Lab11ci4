<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="artikel-container">

    <?php 
    // === MECHANIC AUTO-DETECTION BY LEO ===
    // Cek apakah data kosong atau tidak
    $has_data = !empty($artikel);
    $is_single_view = false;

    if ($has_data) {
        // Jika data dikirim berupa string atau array satu baris (detail artikel)
        if (isset($artikel['judul']) || (is_array($artikel) && !isset($artikel[0]))) {
            $is_single_view = true;
            $detail_row = isset($artikel['judul']) ? $artikel : array_values($artikel)[0];
        } else {
            // Jika data berupa list kumpulan banyak artikel
            $list_artikel = $artikel;
        }
    }
    ?>

    <?php if ($is_single_view): ?>
        <div style="background: var(--card-white); border-radius: 24px; padding: 30px; border: 2px solid #FFF1F5; box-shadow: 0 4px 12px rgba(90, 75, 83, 0.02); max-width: 800px; margin: 0 auto;">
            <a href="<?= base_url('/artikel'); ?>" style="color: #E29BB7; text-decoration: none; font-size: 13px; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; margin-bottom: 20px; transition: gap 0.2s;" onmouseover="this.style.gap='3px'" onmouseout="this.style.gap='6px'">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Stories
            </a>

            <div style="margin-bottom: 15px;">
                <span class="badge-game" style="text-transform: uppercase; letter-spacing: 0.5px; font-size: 11px; padding: 4px 12px; background: var(--bunny-pink); border-radius: 12px;">
                    📁 <?= $detail_row['nama_kategori'] ?? 'Umum'; ?>
                </span>
            </div>

            <h1 style="margin: 0 0 15px 0; font-size: 26px; font-weight: 800; color: var(--text-dark); line-height: 1.4;">
                <?= $detail_row['judul']; ?>
            </h1>

            <div style="font-size: 12px; color: var(--text-muted); font-weight: 500; display: flex; gap: 15px; margin-bottom: 25px; border-bottom: 2px dashed var(--bg-soft); padding-bottom: 15px;">
                <span><i class="fa-solid fa-user"></i> Admin Portal</span>
                <span><i class="fa-solid fa-calendar"></i> Verified Story</span>
            </div>

            <?php if(!empty($detail_row['gambar'])): ?>
                <div style="width: 100%; max-height: 380px; background: var(--bg-soft); border-radius: 16px; overflow: hidden; margin-bottom: 25px; border: 2px solid #FFF1F5;">
                    <img src="<?= base_url('uploads/' . $detail_row['gambar']); ?>" alt="<?= $detail_row['judul']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            <?php endif; ?>

            <div style="color: var(--text-dark); font-size: 15px; line-height: 1.8; font-family: 'Quicksand', sans-serif; white-space: pre-line;">
                <?= $detail_row['isi']; ?>
            </div>
        </div>

    <?php else: ?>
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px dashed var(--bunny-pink); padding-bottom: 12px; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
            <h2 style="margin: 0; color: var(--text-dark); font-weight: 700; font-size: 22px;">✨ Jelajahi Stories Terbaru</h2>

            <form action="" method="get" style="display: flex; gap: 8px;">
                <input type="text" name="q" value="<?= esc($q ?? ''); ?>" placeholder="Cari cerita menarik..." 
                       style="padding: 8px 16px; border: 2px solid var(--bunny-pink); border-radius: 20px; font-size: 13px; width: 200px; outline: none; font-family: 'Quicksand', sans-serif; color: var(--text-dark); background-color: var(--bg-soft); transition: border-color 0.2s;">
                <button type="submit" class="btn-pink" style="border-radius: 20px; padding: 0 16px; font-size: 13px; height: 35px;">
                    <i class="fa-solid fa-magnifying-glass" style="font-size: 11px;"></i> Cari
                </button>
            </form>
        </div>

        <?php if(!empty($q)): ?>
            <p style="margin-bottom: 20px; color: var(--text-muted); font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 6px;">
                🌸 Menampilkan hasil untuk: <strong style="color: var(--text-dark);">"<?= esc($q); ?>"</strong> 
                <a href="<?= base_url('/artikel'); ?>" style="color: #96858F; text-decoration: none; margin-left: 10px; font-weight: 600; padding: 2px 8px; background: var(--bunny-pink); border-radius: 10px; font-size: 11px; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
                    &times; Clear
                </a>
            </p>
        <?php endif; ?>

        <?php if(session()->getFlashdata('pesan')): ?>
            <div style="background: #FFF0F5; color: var(--text-dark); padding: 12px 18px; margin-bottom: 20px; border-radius: 12px; border: 1px solid var(--bunny-pink); font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 8px;">
                <span>🌸</span> <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <?php if($has_data): ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px;">
                <?php foreach($list_artikel as $row): ?>
                    <article style="background: var(--card-white); border-radius: 18px; overflow: hidden; box-shadow: 0 4px 12px rgba(90, 75, 83, 0.02); border: 2px solid #FFF1F5; display: flex; flex-direction: column; transition: all 0.25s ease;"
                             onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 20px rgba(226, 155, 183, 0.15)'" 
                             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(90, 75, 83, 0.02)'">
                        
                        <div style="width: 100%; height: 160px; background: var(--bg-soft); display: flex; align-items: center; justify-content: center; color: var(--text-muted); overflow: hidden; position: relative;">
                            <?php if(!empty($row['gambar'])): ?>
                                <img src="<?= base_url('uploads/' . $row['gambar']); ?>" alt="<?= $row['judul']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            <?php else: ?>
                                <span style="font-size: 44px; opacity: 0.7;">📑</span>
                            <?php endif; ?>
                        </div>

                        <div style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column;">
                            <div style="margin-bottom: 12px;">
                                <span class="badge-game" style="text-transform: uppercase; letter-spacing: 0.5px; font-size: 10px; padding: 3px 10px;">
                                    📁 <?= $row['nama_kategori'] ?? 'Umum'; ?>
                                </span>
                            </div>

                            <h3 style="margin: 0 0 10px 0; font-size: 16px; font-weight: 700; line-height: 1.4; height: 44px; overflow: hidden;">
                                <a href="<?= base_url('/artikel/' . $row['slug']); ?>" style="text-decoration: none; color: var(--text-dark); transition: color 0.2s;"
                                   onmouseover="this.style.color='#E29BB7'" onmouseout="this.style.color='var(--text-dark)'">
                                    <?= $row['judul']; ?>
                                </a>
                            </h3>
                            
                            <p style="color: var(--text-muted); font-size: 13px; line-height: 1.6; margin-bottom: 0; flex-grow: 1; height: 60px; overflow: hidden;">
                                <?= substr(strip_tags($row['isi']), 0, 90); ?>...
                            </p>
                        </div>

                        <div style="padding: 14px 20px; background: #FFF9FB; border-top: 1px solid var(--bg-soft); display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 11px; color: var(--text-muted); font-weight: 500; display: inline-flex; align-items: center; gap: 4px;">
                                <i class="fa-solid fa-user" style="font-size: 10px; opacity: 0.7;"></i> Admin
                            </span>
                            <a href="<?= base_url('/artikel/' . $row['slug']); ?>" style="color: #E29BB7; font-weight: 700; text-decoration: none; font-size: 12px; display: inline-flex; align-items: center; gap: 5px; transition: gap 0.2s;"
                               onmouseover="this.style.gap='8px'" onmouseout="this.style.gap='5px'">
                                Read Story <i class="fa-solid fa-arrow-right" style="font-size: 10px;"></i>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div style="text-align: center; padding: 60px 20px; background: var(--card-white); border-radius: 20px; border: 2px dashed var(--bunny-pink);">
                <span style="font-size: 50px; display: block; margin-bottom: 15px; filter: grayscale(0.2);">🐰</span>
                <h3 style="color: var(--text-dark); margin: 0 0 8px 0; font-size: 16px; font-weight: 700;">Belum ada cerita di sini...</h3>
                <p style="color: var(--text-muted); font-size: 13px; margin: 0;">Coba cari dengan kata kunci lain atau kembali nanti ya.</p>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php if (isset($pager) && !$is_single_view): ?>
    <div style="margin-top: 40px; text-align: center;" class="pagination-container">
        <?= $pager->only(['q'])->links('artikel', 'default_full'); ?>
    </div>
<?php endif; ?>

<?= $this->endSection(); ?>