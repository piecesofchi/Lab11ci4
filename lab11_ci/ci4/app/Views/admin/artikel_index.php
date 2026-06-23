<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="content-admin">
    <h2 style="border-bottom: 3px dashed var(--bunny-pink); padding-bottom: 12px; margin-bottom: 25px; color: var(--text-dark); font-weight: 700; font-size: 22px;">
        ✨ Daftar Artikel <span style="font-size: 12px; color: var(--gaming-red); background: var(--bunny-purple); padding: 3px 8px; border-radius: 8px; font-weight: 600; vertical-align: middle; margin-left: 5px;">Debug Mode 🛠️</span>
    </h2>
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; gap: 15px; flex-wrap: wrap;">
        <form id="search-form" style="display: flex; gap: 10px; align-items: center;">
            <input type="text" name="q" id="search-box" value="<?= $q; ?>" placeholder="Cari judul artikel..." 
                   style="padding: 10px 16px; border: 2px solid var(--bunny-pink); border-radius: 15px; width: 220px; font-family: 'Quicksand', sans-serif; font-size: 13px; color: var(--text-dark); background-color: var(--bg-soft); outline: none; transition: border-color 0.2s;"
                   onfocus="this.style.borderColor='var(--gaming-red)'" onblur="this.style.borderColor='var(--bunny-pink)'">
            
            <select name="kategori_id" id="category-filter" 
                    style="padding: 10px 16px; border: 2px solid var(--bunny-pink); border-radius: 15px; background: var(--bg-soft); font-family: 'Quicksand', sans-serif; font-size: 13px; color: var(--text-dark); outline: none; cursor: pointer; transition: border-color 0.2s;"
                    onfocus="this.style.borderColor='var(--gaming-red)'" onblur="this.style.borderColor='var(--bunny-pink)'">
                <option value="">Semua Kategori</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn-pink" style="border-radius: 15px; padding: 0 18px; font-size: 13px; height: 39px;">
                <i class="fas fa-search" style="font-size: 11px;"></i> Cari
            </button>
        </form>

        <a href="<?= base_url('/admin/artikel/add'); ?>" class="btn-pink"
           style="border-radius: 15px; padding: 11px 22px; font-size: 13px; font-weight: 700; background-color: var(--bunny-pink); text-decoration: none; box-shadow: 0 4px 0px #E5B2B2;"
           onmouseover="this.style.backgroundColor='var(--gaming-red)'; this.style.color='white'; this.style.boxShadow='0 4px 0px #D43F3F'; this.style.transform='translateY(-1px)';"
           onmouseout="this.style.backgroundColor='var(--bunny-pink)'; this.style.color='var(--text-dark)'; this.style.boxShadow='0 4px 0px #E5B2B2'; this.style.transform='translateY(0)';"
           onclick="this.style.transform='translateY(2px)'; this.style.boxShadow='0 0px 0px transparent';">
            + Tambah Artikel
        </a>
    </div>

    <?php if(session()->getFlashdata('pesan')): ?>
        <div id="flash-message" style="background: #FFF2F2; color: var(--text-dark); padding: 12px 18px; margin-bottom: 20px; border-radius: 12px; border: 1px solid var(--bunny-pink); font-size: 13px; font-weight: 500;">
            🌸 <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div id="article-container" style="background-color: var(--card-white); border-radius: 20px; overflow: hidden; box-shadow: 0 4px 12px rgba(90, 75, 83, 0.02); border: 2px solid #FFF1F1; transition: opacity 0.2s;">
        <div style="text-align: center; padding: 60px 20px;">
            <i class="fas fa-spinner fa-spin fa-3x" style="color: var(--gaming-red); margin-bottom: 15px;"></i>
            <p style="color: var(--text-muted); font-weight: 600; font-size: 14px;">Menghubungkan ke server portal...</p>
        </div>
    </div>

    <div id="pagination-container" style="margin-top: 35px; display: flex; justify-content: center;"></div>
</div>

<style>
    #pagination-container ul { display: flex; list-style: none; padding: 0; gap: 6px; }
    #pagination-container li a, #pagination-container li span { 
        padding: 8px 16px; border: 2px solid var(--bunny-pink); color: var(--text-dark); text-decoration: none; border-radius: 12px; cursor: pointer; font-family: 'Quicksand', sans-serif; font-size: 13px; font-weight: 600; background-color: var(--card-white); transition: all 0.2s ease;
    }
    #pagination-container li.active span { background-color: var(--gaming-red) !important; color: white !important; border-color: var(--gaming-red) !important; box-shadow: 0 3px 10px rgba(255, 85, 85, 0.2); }
    #pagination-container li a:hover { background-color: var(--bunny-pink); color: var(--text-dark); transform: translateY(-1px); }
</style>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
$(document).ready(function() {
    const articleContainer = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const searchForm = $('#search-form');

    const fetchData = (url) => {
        articleContainer.css('opacity', '0.4');
        
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text', // Paksa text agar bisa dibaca manual jika broken
            headers: {'X-Requested-With': 'XMLHttpRequest'}, 
            success: function(raw) {
                articleContainer.css('opacity', '1');
                console.log("====== RAW RESPONSE FROM SERVER ======");
                console.log(raw);
                console.log("======================================");
                
                try {
                    // Coba bersihkan string jika ada whitespace liar di awal/akhir
                    const cleanRaw = raw.trim();
                    const data = JSON.parse(cleanRaw);
                    
                    let finalArticles = [];
                    let finalPager = '';

                    if (data && typeof data === 'object') {
                        if (data.artikel !== undefined) {
                            finalArticles = data.artikel;
                            finalPager = data.pager || '';
                        } else if (Array.isArray(data)) {
                            finalArticles = data;
                        }
                    }

                    renderArticles(finalArticles);
                    renderPagination(finalPager);

                } catch (e) {
                    console.error("Gagal melakukan JSON parsing:", e);
                    
                    // Fallback UI: Cetak potongan response langsung ke layar biar kelihatan error-nya
                    let safeRaw = raw.replace(/</g, "&lt;").replace(/>/g, "&gt;");
                    articleContainer.html(`
                        <div style="padding: 30px; color: var(--gaming-red); font-family: monospace; font-size: 13px;">
                            <b style="font-size: 16px; display:block; margin-bottom: 10px;">⚠️ Respon Server Bukan JSON Valid</b>
                            <p style="color: var(--text-dark)">Server tidak mengembalikan JSON. Berikut adalah data mentah yang diterima:</p>
                            <pre style="background: #FFF5F5; padding: 15px; border-radius: 10px; border: 1px dashed var(--bunny-pink); overflow-x: auto; max-height: 300px;">${safeRaw || '[Respons Kosong / Empty String]'}</pre>
                        </div>
                    `);
                    paginationContainer.html('');
                }
            },
            error: function(xhr, status, error) {
                articleContainer.css('opacity', '1');
                console.error("Detail HTTP Error:", xhr.status, error);
                articleContainer.html('<div style="padding:50px; text-align:center; color:var(--gaming-red); font-weight:700;"><span style="font-size:30px; display:block; margin-bottom:10px;">(✖╭╮✖)</span> Gagal terhubung ke rute portal. Status: ' + xhr.status + '</div>');
            }
        });
    };

    const renderArticles = (articles) => {
        let html = `<table style="width: 100%; border-collapse: collapse; font-family: 'Quicksand', sans-serif;">
            <thead>
                <tr style="background-color: #FFF8F9; color: var(--text-dark); text-align: left; border-bottom: 2px solid var(--bunny-pink);">
                    <th width="60" style="text-align: center; padding: 16px; font-weight: 700;">ID</th>
                    <th style="padding: 16px; font-weight: 700;">Judul Artikel</th>
                    <th width="120" style="text-align: center; padding: 16px; font-weight: 700;">Status</th>
                    <th width="150" style="text-align: center; padding: 16px; font-weight: 700;">Aksi</th>
                </tr>
            </thead>
            <tbody>`;

        if (articles && articles.length > 0) {
            articles.forEach(row => {
                let statusColor = row.status == 1 ? '#D34848' : '#D37E48';
                let statusBg = row.status == 1 ? '#FFEAEA' : '#FFF1EA';
                
                let stringIsi = row.isi ? row.isi.replace(/(<([^>]+)>)/gi, "") : "";
                let isiSingkat = stringIsi.substring(0, 75);

                html += `<tr style="border-bottom: 1px solid #FFF2F4; background-color: var(--card-white); transition: background 0.2s;" onmouseover="this.style.backgroundColor='#FFFDFD'" onmouseout="this.style.backgroundColor='var(--card-white)'">
                    <td style="text-align: center; color: var(--text-muted); padding: 14px; font-weight: 600; font-size: 13px;">#${row.id}</td>
                    <td style="padding: 14px;">
                        <div style="font-weight: 700; color: var(--text-dark); margin-bottom: 4px; font-size: 14px;">${row.judul}</div>
                        <div style="font-size: 11px; color: var(--text-muted); font-weight: 500;">
                            <span style="color: var(--gaming-red); font-weight: 600;">📁 ${row.nama_kategori || 'Umum'}</span> | ${isiSingkat}...
                        </div>
                    </td>
                    <td style="text-align: center; padding: 14px;">
                        <span style="padding: 4px 12px; border-radius: 12px; font-size: 10px; font-weight: 700; 
                                     background-color: ${statusBg}; color: ${statusColor}; border: 1px solid ${statusColor}; letter-spacing: 0.3px;">
                            ${row.status == 1 ? 'PUBLISHED' : 'DRAFT'}
                        </span>
                    </td>
                    <td style="text-align: center; padding: 14px;">
                        <div style="display: flex; justify-content: center; gap: 8px; align-items: center;">
                            <a href="<?= base_url('admin/artikel/edit'); ?>/${row.id}" 
                               style="color: var(--text-dark); background: var(--bunny-purple); padding: 4px 10px; border-radius: 8px; text-decoration: none; font-size: 12px; font-weight: 700; transition: all 0.2s;"
                               onmouseover="this.style.backgroundColor='var(--gaming-red)'; this.style.color='white';"
                               onmouseout="this.style.backgroundColor='var(--bunny-purple)'; this.style.color='var(--text-dark)';">Ubah</a>
                            <a onclick="return confirm('Yakin ingin menghapus cerita ini? 📝')" href="<?= base_url('admin/artikel/delete'); ?>/${row.id}" 
                               style="color: var(--text-muted); background: #FFF0F0; padding: 4px 10px; border-radius: 8px; text-decoration: none; font-size: 12px; font-weight: 700; border: 1px solid #FFE0E0; transition: all 0.2s;"
                               onmouseover="this.style.backgroundColor='#FF5555'; this.style.color='white'; this.style.borderColor='#FF5555';"
                               onmouseout="this.style.backgroundColor='#FFF0F0'; this.style.color='var(--text-muted)'; this.style.borderColor='#FFE0E0';">Hapus</a>
                        </div>
                    </td>
                </tr>`;
            });
        } else {
            html += '<tr><td colspan="4" style="text-align:center; padding:60px; color:var(--text-muted); font-weight:600;"><span style="font-size:40px; display:block; margin-bottom:10px;">分_分</span>Tidak ada data artikel yang ditemukan.</td></tr>';
        }
        html += '</tbody></table>';
        articleContainer.html(html);
    };

    const renderPagination = (pagerHtml) => {
        paginationContainer.html(pagerHtml || '');
        
        $('#pagination-container a').on('click', function(e) {
            e.preventDefault();
            fetchData($(this).attr('href'));
        });
    };

    searchForm.on('submit', function(e) {
        e.preventDefault();
        const q = $('#search-box').val();
        const kategori_id = $('#category-filter').val();
        fetchData(`${window.location.pathname}?q=${q}&kategori_id=${kategori_id}`);
    });

    // Jalankan boot awal mengarah ke rute admin langsung
    fetchData('/admin/artikel');
});
</script>
<?= $this->endSection(); ?>