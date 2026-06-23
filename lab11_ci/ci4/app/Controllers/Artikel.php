<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Artikel extends BaseController
{
    protected $artikelModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->kategoriModel = new KategoriModel();
    }

    // ==========================================
    // BAGIAN USER (HALAMAN DEPAN)
    // ==========================================

    public function index()
    {
        $q = $this->request->getVar('q') ?? '';

        $data = [
            'title'   => 'Daftar Artikel',
            'q'       => $q,
            'artikel' => $this->artikelModel->select('artikel.*, kategori.nama_kategori')
                            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
                            ->like('artikel.judul', $q)
                            ->paginate(6, 'artikel'), 
            'pager'   => $this->artikelModel->pager,
        ];

        return view('artikel/index', $data);
    }

    public function view($slug)
    {
        $artikel = $this->artikelModel->select('artikel.*, kategori.nama_kategori')
                                      ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
                                      ->where('slug', $slug)->first();

        if (!$artikel) {
            throw PageNotFoundException::forPageNotFound("Artikel tidak ditemukan.");
        }

        $data = [
            'title'   => $artikel['judul'],
            'artikel' => $artikel
        ];

        return view('artikel/view', $data);
    }

    // ==========================================
    // BAGIAN ADMIN - MODIFIKASI AJAX (MANUAL CHECK 🌟)
    // ==========================================

    public function admin_index()
    {
        $title = 'Halaman Admin - Artikel';
        
        $q = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
        $page = $this->request->getVar('page') ?? 1;

        // Ditampung ke variabel $builder agar query-nya stabil dan terikat dengan benar
        $builder = $this->artikelModel->select('artikel.*, kategori.nama_kategori')
                                      ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');

        if ($q != '') {
            $builder->like('artikel.judul', $q);
        }

        if ($kategori_id != '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        // Ambil data dengan pagination teratur
        $artikel = $builder->orderBy('artikel.id', 'DESC')->paginate(10, 'artikel', $page);
        
        // 🌟 JIKA REQUEST BERUBA AJAX (Menggunakan getHeaderLine yang jauh lebih reliable)
        if ($this->request->getHeaderLine('X-Requested-With') === 'XMLHttpRequest') {
            return $this->response->setJSON([
                'artikel' => $artikel,
                'pager'   => $this->artikelModel->pager->links('artikel', 'default_full')
            ]);
        } 

        // JIKA BUKAN AJAX (Pertama kali halaman admin dibuka lewat browser)
        $data = [
            'title'       => $title,
            'q'           => $q,
            'kategori_id' => $kategori_id,
            'kategori'    => $this->kategoriModel->findAll()
        ];

        return view('admin/artikel_index', $data);
    }

    // ==========================================
    // FUNGSI CRUD LAINNYA
    // ==========================================

    public function add()
    {
        if ($this->request->is('post')) {
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = null;

            if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
                $namaGambar = $fileGambar->getRandomName();
                $fileGambar->move('uploads', $namaGambar);
            }

            $this->artikelModel->save([
                'judul'       => $this->request->getPost('judul'),
                'id_kategori' => $this->request->getPost('id_kategori'), 
                'isi'         => $this->request->getPost('isi'),
                'status'      => $this->request->getPost('status') ?? 1,
                'gambar'      => $namaGambar,
                'slug'        => url_title($this->request->getPost('judul'), '-', true)
            ]);

            session()->setFlashdata('pesan', 'Artikel berhasil diterbitkan!');
            return redirect()->to('/admin/artikel');
        }

        return view('admin/artikel_add', [
            'title'    => 'Tambah Artikel',
            'kategori' => $this->kategoriModel->findAll() 
        ]);
    }

    public function edit($id)
    {
        $artikelLama = $this->artikelModel->find($id);

        if (!$artikelLama) {
            throw PageNotFoundException::forPageNotFound("Data tidak ditemukan.");
        }

        if ($this->request->is('post')) {
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = $artikelLama['gambar'];

            if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
                $namaGambar = $fileGambar->getRandomName();
                $fileGambar->move('uploads', $namaGambar);

                if ($artikelLama['gambar'] && file_exists('uploads/' . $artikelLama['gambar'])) {
                    unlink('uploads/' . $artikelLama['gambar']);
                }
            }

            $this->artikelModel->update($id, [
                'judul'       => $this->request->getPost('judul'),
                'id_kategori' => $this->request->getPost('id_kategori'), 
                'isi'         => $this->request->getPost('isi'),
                'status'      => $this->request->getPost('status'),
                'gambar'      => $namaGambar,
                'slug'        => url_title($this->request->getPost('judul'), '-', true)
            ]);

            session()->setFlashdata('pesan', 'Artikel berhasil diperbarui!');
            return redirect()->to('/admin/artikel');
        }

        return view('admin/artikel_edit', [
            'title'    => 'Edit Artikel',
            'artikel'  => $artikelLama,
            'kategori' => $this->kategoriModel->findAll() 
        ]);
    }

    public function delete($id)
    {
        $artikel = $this->artikelModel->find($id);
        if ($artikel) {
            if ($artikel['gambar'] && file_exists('uploads/' . $artikel['gambar'])) {
                unlink('uploads/' . $artikel['gambar']);
            }
            $this->artikelModel->delete($id);
            session()->setFlashdata('pesan', 'Artikel telah dihapus.');
        }
        return redirect()->to('/admin/artikel');
    }
}