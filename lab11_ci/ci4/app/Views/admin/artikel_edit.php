<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="content-admin">
    <h2 style="border-bottom: 3px dashed var(--bunny-pink); padding-bottom: 12px; margin-bottom: 25px; color: var(--text-dark); font-weight: 700; font-size: 22px;">
        ✨ Ubah Artikel
    </h2>
    
    <div style="background: var(--card-white); padding: 30px; border-radius: 20px; box-shadow: 0 4px 12px rgba(90, 75, 83, 0.02); border: 2px solid #FFF1F1;">
        <form action="" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--text-dark); font-size: 14px;">Judul Artikel</label>
                <input type="text" name="judul" value="<?= $artikel['judul']; ?>" 
                       style="width: 100%; padding: 12px 16px; border: 2px solid var(--bunny-pink); border-radius: 12px; font-size: 14px; font-family: 'Quicksand', sans-serif; color: var(--text-dark); background-color: var(--bg-soft); outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='var(--gaming-red)'" onblur="this.style.borderColor='var(--bunny-pink)'" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--text-dark); font-size: 14px;">Kategori Artikel</label>
                <select name="id_kategori" style="width: 100%; padding: 12px 16px; border: 2px solid var(--bunny-pink); border-radius: 12px; background: var(--bg-soft); font-size: 14px; font-family: 'Quicksand', sans-serif; color: var(--text-dark); outline: none; cursor: pointer; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='var(--gaming-red)'" onblur="this.style.borderColor='var(--bunny-pink)'" required>
                    <?php foreach($kategori as $k): ?>
                        <option value="<?= $k['id_kategori']; ?>" <?= ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>
                            <?= $k['nama_kategori']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--text-dark); font-size: 14px;">Isi Artikel</label>
                <textarea name="isi" rows="12" 
                          style="width: 100%; padding: 16px; border: 2px solid var(--bunny-pink); border-radius: 16px; font-size: 14px; font-family: 'Quicksand', sans-serif; color: var(--text-dark); background-color: var(--bg-soft); line-height: 1.6; outline: none; transition: border-color 0.2s;"
                          onfocus="this.style.borderColor='var(--gaming-red)'" onblur="this.style.borderColor='var(--bunny-pink)'" required><?= $artikel['isi']; ?></textarea>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--text-dark); font-size: 14px;">Status Penerbitan</label>
                <select name="status" style="width: 100%; padding: 12px 16px; border: 2px solid var(--bunny-pink); border-radius: 12px; background: var(--bg-soft); font-size: 14px; font-family: 'Quicksand', sans-serif; color: var(--text-dark); outline: none; cursor: pointer; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='var(--gaming-red)'" onblur="this.style.borderColor='var(--bunny-pink)'">
                    <option value="1" <?= $artikel['status'] == 1 ? 'selected' : ''; ?>>🚀 Published (Terbitkan)</option>
                    <option value="0" <?= $artikel['status'] == 0 ? 'selected' : ''; ?>>📁 Draft (Simpan Sementara)</option>
                </select>
            </div>

            <div style="display: flex; align-items: center; gap: 20px; border-top: 2px dashed var(--bunny-pink); padding-top: 20px;">
                <button type="submit" class="btn-submit" 
                        style="border-radius: 15px; padding: 12px 28px; font-size: 14px; font-weight: 700; background-color: var(--bunny-pink); color: var(--text-dark); border: none; cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 0px #E5B2B2;"
                        onmouseover="this.style.backgroundColor='var(--gaming-red)'; this.style.color='white'; this.style.boxShadow='0 4px 0px #D43F3F'; this.style.transform='translateY(-1px)';"
                        onmouseout="this.style.backgroundColor='var(--bunny-pink)'; this.style.color='var(--text-dark)'; this.style.boxShadow='0 4px 0px #E5B2B2'; this.style.transform='translateY(0)';">
                    💾 Simpan Perubahan
                </button>
                <a href="<?= base_url('/admin/artikel'); ?>" 
                   style="text-decoration: none; color: var(--text-muted); font-size: 14px; font-weight: 600; transition: color 0.2s;"
                   onmouseover="this.style.color='var(--gaming-red)'" onmouseout="this.style.color='var(--text-muted)'">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>