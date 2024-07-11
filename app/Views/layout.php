<!DOCTYPE html>
<html>
<head>
    <title><?= isset($title) ? $title : 'Default Title' ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            padding: 15px;
            background-color: #f8f9fa;
        }
        .content {
            flex-grow: 1;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Sidebar</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('perjadin/create') ?>">Tambah Perjadin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('perjadin') ?>">Daftar Perjadin</a>
            </li>
        </ul>
    </div>
    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>