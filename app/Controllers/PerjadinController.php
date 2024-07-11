<?php

namespace App\Controllers;

use App\Models\PerjadinModel;
use CodeIgniter\Controller;

class PerjadinController extends Controller
{
    protected $helpers = ['form', 'url'];

public function index()
{
    $model = new PerjadinModel();
    $data = [
        'title' => 'Daftar Perjadin',
        'perjadin' => $model->findAll()
    ];

    return view('perjadin/index', $data);
}

public function create()
{
    $data = ['title' => 'Tambah Perjadin'];
    return view('perjadin/create', $data);
}

public function store()
    {
        $model = new PerjadinModel();
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            // Move the file to the public/uploads directory
            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);

            $data = [
                'nomor_surat_tugas' => $this->request->getPost('nomor_surat_tugas'),
                'dipa' => $this->request->getPost('dipa'),
                'lokasi' => $this->request->getPost('lokasi'),
                'dasar_hukum' => $this->request->getPost('dasar_hukum'),
                'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
                'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
                'temuan' => $this->request->getPost('temuan'),
                'rekomendasi' => $this->request->getPost('rekomendasi'),
                'tindaklanjut' => $this->request->getPost('tindaklanjut'),
                'dampak' => $this->request->getPost('dampak'),
                'foto' => $fileName, // Save the file name in the database
            ];

            if ($model->insert($data)) {
                log_message('info', 'Data successfully saved.');
                return redirect()->to('/perjadin/create')->with('message', 'Data successfully saved.');
            } else {
                log_message('error', 'Failed to save data: ' . json_encode($model->errors()));
                return redirect()->to('/perjadin/create')->with('error', 'Failed to save data: ' . json_encode($model->errors()));
            }
            } else {
                log_message('error', 'Failed to upload file: ' . $file->getErrorString());
                return redirect()->to('/perjadin/create')->with('error', 'Failed to upload file: ' . $file->getErrorString());
            }
    }

    Public function edit($id)
    {
        $model = new PerjadinModel();
        $data['perjadin'] = $model->find($id);
        
        if (!$data['perjadin']) {
            return redirect()->to('/perjadin')->with('error', 'Data tidak ditemukan');
        }

        $data['title'] = 'Edit Perjadin'; // Tambahkan ini
        return view('perjadin/edit', $data);
    }

    public function update($id)
    {
        $model = new PerjadinModel();
        $perjadin = $model->find($id);

        if (!$perjadin) {
            return redirect()->to('/perjadin')->with('error', 'Data tidak ditemukan');
        }

        $data = [
            'nomor_surat_tugas' => $this->request->getPost('nomor_surat_tugas'),
            'dipa' => $this->request->getPost('dipa'),
            'lokasi' => $this->request->getPost('lokasi'),
            'dasar_hukum' => $this->request->getPost('dasar_hukum'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'temuan' => $this->request->getPost('temuan'),
            'rekomendasi' => $this->request->getPost('rekomendasi'),
            'tindaklanjut' => $this->request->getPost('tindaklanjut'),
            'dampak' => $this->request->getPost('dampak'),
        ];

        // Cek apakah ada file foto yang diunggah
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(WRITEPATH . 'uploads', $newName);
            $data['foto'] = $newName;

            // Hapus foto lama jika ada
            if ($perjadin['foto']) {
                unlink(WRITEPATH . 'uploads/' . $perjadin['foto']);
            }
        } else {
            $data['foto'] = $perjadin['foto']; // Gunakan foto yang sudah ada
        }

        // Debugging
        if ($model->update($id, $data)) {
            log_message('info', 'Data berhasil diperbarui.');
            return redirect()->to('/perjadin')->with('message', 'Data berhasil diperbarui.');
        } else {
            log_message('error', 'Gagal memperbarui data: ' . json_encode($model->errors()));
            return redirect()->to('/perjadin/edit/' . $id)->with('error', 'Gagal memperbarui data: ' . json_encode($model->errors()));
        }
    }

    public function delete($id)
    {
        $model = new PerjadinModel();

        if ($model->delete($id)) {
            log_message('info', 'Data berhasil dihapus.');
            return redirect()->to('/perjadin')->with('message', 'Data berhasil dihapus.');
        } else {
            log_message('error', 'Gagal menghapus data.');
            return redirect()->to('/perjadin')->with('error', 'Gagal menghapus data.');
        }
    }
}