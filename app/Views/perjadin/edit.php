<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2><?= isset($title) ? esc($title) : 'Edit Perjadin' ?></h2>

    <form id="perjadinForm" action="<?= isset($perjadin['id']) ? '/perjadin/update/' . $perjadin['id_perjadin'] : '/perjadin/store' ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="form-group">
            <label>Nomor Surat Tugas</label>
            <input type="text" name="nomor_surat_tugas" class="form-control" value="<?= isset($perjadin['nomor_surat_tugas']) ? esc($perjadin['nomor_surat_tugas']) : '' ?>">
        </div>
        
        <div class="form-group">
            <label>DIPA</label>
            <input type="text" name="dipa" class="form-control" value="<?= isset($perjadin['dipa']) ? esc($perjadin['dipa']) : '' ?>">
        </div>
        
        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="<?= isset($perjadin['lokasi']) ? esc($perjadin['lokasi']) : '' ?>">
        </div>
        
        <div class="form-group">
            <label>Dasar Hukum</label>
            <textarea name="dasar_hukum" class="form-control"><?= isset($perjadin['dasar_hukum']) ? esc($perjadin['dasar_hukum']) : '' ?></textarea>
        </div>
        
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="<?= isset($perjadin['tanggal_mulai']) ? esc($perjadin['tanggal_mulai']) : '' ?>">
        </div>
        
        <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="<?= isset($perjadin['tanggal_selesai']) ? esc($perjadin['tanggal_selesai']) : '' ?>">
        </div>
        
        <div class="form-group">
            <label>Temuan</label>
            <textarea name="temuan" class="form-control"><?= isset($perjadin['temuan']) ? esc($perjadin['temuan']) : '' ?></textarea>
        </div>
        
        <div class="form-group">
            <label>Rekomendasi</label>
            <textarea name="rekomendasi" class="form-control"><?= isset($perjadin['rekomendasi']) ? esc($perjadin['rekomendasi']) : '' ?></textarea>
        </div>
        
        <div class="form-group">
            <label>Tindaklanjut</label>
            <textarea name="tindaklanjut" class="form-control"><?= isset($perjadin['tindaklanjut']) ? esc($perjadin['tindaklanjut']) : '' ?></textarea>
        </div>
        
        <div class="form-group">
            <label>Dampak</label>
            <textarea name="dampak" class="form-control"><?= isset($perjadin['dampak']) ? esc($perjadin['dampak']) : '' ?></textarea>
        </div>
        
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
            <?php if ($perjadin['foto']): ?>
                <img src="/uploads/<?= $perjadin['foto'] ?>" width="100">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-success"><?= isset($perjadin['id_perjadin']) ? 'Update' : 'Save' ?></button>
    </form>

    <!-- Success Modal -->
    <div id="successModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal('successModal')">&times;</span>
            <p>Your data has been successfully saved!</p>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal('errorModal')">&times;</span>
            <p>An error occurred while saving your data.</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (session()->getFlashdata('message')): ?>
            showModal('successModal');
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            showModal('errorModal');
        <?php endif; ?>
    });

    function showModal(modalId) {
        document.getElementById(modalId).style.display = 'block';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
        // Redirect to the perjadin page after the modal is closed
        window.location.href = '/perjadin';
    }
</script>

<style>
    .modal {
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<?= $this->endSection() ?>