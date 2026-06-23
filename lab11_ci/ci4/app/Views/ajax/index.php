<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div style="padding: 10px;">
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px dashed var(--bunny-pink); padding-bottom: 12px; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
        <h2 style="margin: 0; color: var(--text-dark); font-weight: 700; font-size: 22px;">
            📝 Dashboard Stories 
            <span style="font-size: 11px; font-weight: 700; color: #E29BB7; background: var(--bg-soft); padding: 4px 12px; border-radius: 20px; margin-left: 8px; border: 1px solid var(--bunny-pink); text-transform: uppercase; letter-spacing: 0.5px;">
                AJAX Mode
            </span>
        </h2>
        
        <button onclick="location.reload()" class="btn-pink" style="border-radius: 20px; padding: 0 16px; font-size: 13px; height: 35px; border: none; cursor: pointer;">
            <i class="fas fa-sync-alt" style="font-size: 11px;"></i> Refresh
        </button>
    </div>

    <div style="background: var(--card-white); border-radius: 18px; overflow: hidden; border: 2px solid #FFF1F5; box-shadow: 0 4px 12px rgba(90, 75, 83, 0.02);">
        <table class="table-data" id="artikelTable" style="width: 100%; border-collapse: collapse; background: transparent; font-size: 14px;">
            <thead>
                <tr style="background: #FFF9FB; text-align: left; border-bottom: 2px solid var(--bg-soft);">
                    <th style="padding: 16px 20px; color: var(--text-dark); font-weight: 700; width: 80px;">ID</th>
                    <th style="padding: 16px 20px; color: var(--text-dark); font-weight: 700;">Judul Cerita</th>
                    <th style="padding: 16px 20px; color: var(--text-dark); font-weight: 700; width: 130px;">Status</th>
                    <th style="padding: 16px 20px; color: var(--text-dark); font-weight: 700; text-align: center; width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody style="color: var(--text-dark);">
                <tr>
                    <td colspan="4" style="text-align: center; padding: 60px 20px; color: var(--text-muted);">
                        <i class="fas fa-spinner fa-spin" style="font-size: 24px; color: #E29BB7; margin-bottom: 12px;"></i><br>
                        <span style="font-size: 13px; font-weight: 500;">Menghubungkan ke server rahasia...</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        // Panggil fungsi muat data saat halaman pertama kali dibuka
        loadData();

        function loadData() {
            $.ajax({
                url: "<?= base_url('ajax/getData') ?>",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    var tableBody = "";
                    
                    if (data.length === 0) {
                        tableBody = '<tr><td colspan="4" style="text-align: center; padding: 50px; color: var(--text-muted); font-size: 13px;">🐇 Belum ada cerita yang tersedia di database.</td></tr>';
                    } else {
                        $.each(data, function(index, row) {
                            tableBody += '<tr style="border-bottom: 1px solid #FFF1F5; transition: all 0.2s ease;" onmouseover="this.style.background=\'var(--bg-soft)\'" onmouseout="this.style.background=\'transparent\'">';
                            tableBody += '<td style="padding: 16px 20px; font-weight: 600; color: var(--text-muted);">' + row.id + '</td>';
                            tableBody += '<td style="padding: 16px 20px; font-weight: 600; color: var(--text-dark);">' + row.judul + '</td>';
                            
                            // Badge status disamakan dengan tema lavender soft
                            tableBody += '<td style="padding: 16px 20px;"><span class="badge-game" style="font-size: 11px; padding: 4px 12px; border-radius: 12px; font-weight: 700; text-transform: uppercase;">Published</span></td>';
                            
                            // Tombol Aksi Estetik kustom tanpa warna default norak
                            tableBody += '<td style="padding: 16px 20px; text-align: center; display: flex; justify-content: center; gap: 8px;">';
                            tableBody += '<a href="<?= base_url('admin/artikel/edit/') ?>' + row.id + '" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 10px; background: var(--bunny-purple); color: var(--text-dark); text-decoration: none; font-size: 12px; transition: opacity 0.2s;" onmouseover="this.style.opacity=\'0.8\'" onmouseout="this.style.opacity=\'1\'"><i class="fas fa-edit"></i></a>';
                            tableBody += '<button class="btn-delete" data-id="' + row.id + '" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 10px; background: #FFF0F2; border: 1px solid #FCD1E1; color: #E29BB7; cursor: pointer; font-size: 12px; transition: all 0.2s;" onmouseover="this.style.background=\'#E29BB7\'; this.style.color=\'#fff\'" onmouseout="this.style.background=\'#FFF0F2\'; this.style.color=\'#E29BB7\'"><i class="fas fa-trash-alt"></i></button>';
                            tableBody += '</td>';
                            tableBody += '</tr>';
                        });
                    }
                    // Masukkan baris ke dalam tabel
                    $('#artikelTable tbody').html(tableBody);
                },
                error: function() {
                    $('#artikelTable tbody').html('<tr><td colspan="4" style="text-align: center; padding: 40px; color: #E29BB7; font-weight: 600; font-size: 13px;">🌸 Gagal mengambil data cerita dari server.</td></tr>');
                }
            });
        }

        // Handle Klik Tombol Delete via AJAX
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            
            if (confirm('Apakah kamu yakin ingin menghapus cerita dengan ID ' + id + ' ini?')) {
                $.ajax({
                    url: "<?= base_url('ajax/delete/') ?>" + id,
                    method: "DELETE",
                    success: function(response) {
                        if (response.status === 'OK') {
                            // Refresh data tabel tanpa refresh satu halaman penuh
                            loadData(); 
                        } else {
                            alert('Gagal menghapus cerita: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('Aduh, terjadi kendala saat mencoba menghapus data di server.');
                    }
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>