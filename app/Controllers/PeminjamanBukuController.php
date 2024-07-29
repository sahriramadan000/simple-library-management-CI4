<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PeminjamanBukuModel;
use App\Models\AnggotaModel;
use App\Models\BukuModel;

class PeminjamanBukuController extends BaseController
{
    public function index()
    {
        $peminjamanBukuModel = new PeminjamanBukuModel();
        $data['peminjaman'] = $peminjamanBukuModel->select('peminjaman_buku.*, anggota.nama_anggota, buku.judul_buku')
                                                  ->join('anggota', 'peminjaman_buku.id_anggota = anggota.id_anggota')
                                                  ->join('buku', 'peminjaman_buku.id_buku = buku.id_buku')
                                                  ->findAll();
        return view('peminjaman-buku/index', $data);
    }

    public function create()
    {
        $anggotaModel = new AnggotaModel();
        $bukuModel = new BukuModel();
        $data['anggota'] = $anggotaModel->findAll();
        $data['buku'] = $bukuModel->findAll();
        return view('peminjaman-buku/create', $data);
    }

    public function store()
    {
        $rules = [
            'id_anggota' => 'required|numeric',
            'id_buku' => 'required|numeric',
            'tgl_pinjam' => 'required|valid_date',
            'tgl_kembali' => 'required|valid_date|check_date[tgl_pinjam]',
            'jml_pinjam' => 'required|numeric|greater_than_equal_to[1]',
        ];

        $errors = [
            'tgl_kembali' => [
                'check_date' => 'Tanggal kembali tidak boleh kurang dari atau sama dengan tanggal pinjam.'
            ]
        ];

        // Validasi input
        if (!$this->validate($rules, $errors)) {
            // Jika validasi gagal, kembali ke form create dengan pesan error
            return redirect()->to('/peminjaman-buku/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $tgl_pinjam = new \DateTime($this->request->getVar('tgl_pinjam'));
        $tgl_kembali = new \DateTime($this->request->getVar('tgl_kembali'));
        $lama_pinjam = $tgl_kembali->diff($tgl_pinjam)->days;
        $denda = ($lama_pinjam > 2) ? ($lama_pinjam - 2) * 5000 : 0;

        $peminjamanBukuModel = new PeminjamanBukuModel();
        $peminjamanBukuModel->save([
            'id_anggota' => $this->request->getVar('id_anggota'),
            'id_buku' => $this->request->getVar('id_buku'),
            'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
            'tgl_kembali' => $this->request->getVar('tgl_kembali'),
            'jml_pinjam' => $this->request->getVar('jml_pinjam'),
            'lama_pinjam' => $lama_pinjam,
            'denda' => $denda,
        ]);

        // Set flashdata success
        session()->setFlashdata('success', 'Data peminjaman berhasil ditambahkan.');
        return redirect()->to('/peminjaman-buku');
    }

    public function delete($id)
    {
        $peminjamanBukuModel = new PeminjamanBukuModel();
        $peminjamanBukuModel->delete($id);
        return redirect()->to('/peminjaman-buku');
    }
}
