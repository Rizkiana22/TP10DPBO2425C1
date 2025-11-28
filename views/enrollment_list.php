<?php
include_once __DIR__ . '/template/header.php';
?>

<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Daftar Enrollment</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="index.php?entity=enrollment&action=add" class="btn btn-primary">
                + Tambah Enrollment
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
                <th>Nama Matkul</th>
                <th>Nama Mahasiswa</th>
                <th>Nilai</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($enrollmentList)) {
                foreach ($enrollmentList as $enrollment) {
            ?>
                    <tr>
                        <td><?= htmlspecialchars($enrollment['enrollment_id']) ?></td>
                        <td><?= htmlspecialchars($enrollment['course_name']) ?></td>
                        <td><?= htmlspecialchars($enrollment['full_name']) ?></td>
                        <td><?= htmlspecialchars($enrollment['grade']) ?></td>
                        <td>
                            <a href="index.php?entity=enrollment&action=edit&id=<?= $enrollment['enrollment_id'] ?>"
                                class="btn btn-sm btn-warning">Edit</a>

                            <a href="index.php?entity=enrollment&action=delete&id=<?= $enrollment['enrollment_id'] ?>"
                                onclick="return confirm('Yakin ingin menghapus data enrollment <?= $enrollment['course_name'] ?> dengan id <?=  $enrollment['enrollment_id']?>?');"
                                class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data enrollment.</td>
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
