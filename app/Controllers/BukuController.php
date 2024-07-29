<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BukuModel;

class BukuController extends BaseController
{
    public function index()
    {
        $bukuModel = new BukuModel();
        $data['buku'] = $bukuModel->findAll();
        return view('buku/index', $data);
    }

    public function create()
    {
        return view('buku/create');
    }

    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'judul_buku' => 'required',
            'pengarang_buku' => 'required|alpha_space',
            'penerbit_buku' => 'required',
        ])) {
            // Jika validasi gagal, kembali ke form create dengan pesan error
            return redirect()->to('/buku/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $bukuModel = new BukuModel();
        $data = [
            'judul_buku' => $this->request->getVar('judul_buku'),
            'pengarang_buku' => $this->request->getVar('pengarang_buku'),
            'penerbit_buku' => $this->request->getVar('penerbit_buku'),
        ];
        $bukuModel->save($data);

        // Set flashdata success
        session()->setFlashdata('success', 'Data buku berhasil ditambahkan.');
        return redirect()->to('/buku');
    }

    public function edit($id)
    {
        $bukuModel = new BukuModel();
        $data['buku'] = $bukuModel->find($id);
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'judul_buku' => 'required',
            'pengarang_buku' => 'required|alpha_space',
            'penerbit_buku' => 'required',
        ])) {
            // Jika validasi gagal, kembali ke form edit dengan pesan error
            return redirect()->to('/buku/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $bukuModel = new BukuModel();
        $data = [
            'judul_buku' => $this->request->getVar('judul_buku'),
            'pengarang_buku' => $this->request->getVar('pengarang_buku'),
            'penerbit_buku' => $this->request->getVar('penerbit_buku'),
        ];
        $bukuModel->update($id, $data);

        // Set flashdata success
        session()->setFlashdata('success', 'Data buku berhasil diupdate.');
        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        $bukuModel = new BukuModel();
        $bukuModel->delete($id);
        return redirect()->to('/buku');
    }
}
