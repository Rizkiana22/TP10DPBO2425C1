<?php
include_once __DIR__ . '/template/header.php';
?>

<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Daftar Dosen</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="index.php?entity=lecturer&action=add" class="btn btn-primary">
                + Tambah Dosen
            </a>
        </div>

        <?php if (isset($_GET['error']) && $_GET['error'] == 'dependency'): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal Menghapus!</strong>
            </div>
        <?php endif; ?>
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th width="50">Id</th>
                <th>Nama Dosen</th>
                <th>No Telepon</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($lecturerList)) {
                foreach ($lecturerList as $lecturer) {
            ?>
                    <tr>
                        <td><?= htmlspecialchars($lecturer['lecturer_id']) ?></td>
                        <td><?= htmlspecialchars($lecturer['lecturer_name']) ?></td>
                        <td><?= htmlspecialchars($lecturer['phone']) ?></td>
                        <td>
                            <a href="index.php?entity=lecturer&action=edit&id=<?= $lecturer['lecturer_id'] ?>"
                                class="btn btn-sm btn-warning">Edit</a>

                            <a href="index.php?entity=lecturer&action=delete&id=<?= $lecturer['lecturer_id'] ?>"
                                onclick="return confirm('Yakin ingin menghapus data <?= $lecturer['lecturer_name'] ?>?');"
                                class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data dosen.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include_once __DIR__ . '/template/footer.php';
?>
