<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AnggotaModel;

class AnggotaController extends BaseController
{
    public function index()
    {
        $anggotaModel = new AnggotaModel();
        $data['anggota'] = $anggotaModel->findAll();
        return view('anggota/index', $data);
    }

    public function create()
    {
        return view('anggota/create');
    }

    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'nama_anggota' => 'required|alpha_space',
            'prodi_anggota' => 'required|alpha_space',
            'hp_anggota' => 'required|numeric',
        ])) {
            // Jika validasi gagal, kembali ke form create dengan pesan error
            return redirect()->to('/anggota/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $anggotaModel = new AnggotaModel();
        $data = [
            'nama_anggota' => $this->request->getVar('nama_anggota'),
            'prodi_anggota' => $this->request->getVar('prodi_anggota'),
            'hp_anggota' => $this->request->getVar('hp_anggota'),
        ];
        $anggotaModel->save($data);

        // Set flashdata success
        session()->setFlashdata('success', 'Data anggota berhasil ditambahkan.');
        return redirect()->to('/anggota');
    }

    public function edit($id)
    {
        $anggotaModel = new AnggotaModel();
        $data['anggota'] = $anggotaModel->find($id);
        return view('anggota/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'nama_anggota' => 'required|alpha_space',
            'prodi_anggota' => 'required|alpha_space',
            'hp_anggota' => 'required|numeric',
        ])) {
            // Jika validasi gagal, kembali ke form edit dengan pesan error
            return redirect()->to('/anggota/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $anggotaModel = new AnggotaModel();
        $data = [
            'nama_anggota' => $this->request->getVar('nama_anggota'),
            'prodi_anggota' => $this->request->getVar('prodi_anggota'),
            'hp_anggota' => $this->request->getVar('hp_anggota'),
        ];
        $anggotaModel->update($id, $data);
        
        // Set flashdata success
        session()->setFlashdata('success', 'Data anggota berhasil diupdate.');
        return redirect()->to('/anggota');
    }

    public function delete($id)
    {
        $anggotaModel = new AnggotaModel();
        $anggotaModel->delete($id);
        return redirect()->to('/anggota');
    }
}
