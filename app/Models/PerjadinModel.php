<?php

namespace App\Models;

use CodeIgniter\Model;

class PerjadinModel extends Model
{
    protected $table = 'perjadin';
    protected $primaryKey = 'id_perjadin';
    protected $allowedFields = ['nomor_surat_tugas', 'dipa', 'lokasi', 'dasar_hukum', 'tanggal_mulai', 'tanggal_selesai', 'temuan', 'rekomendasi', 'tindaklanjut', 'dampak', 'foto'];
}