<?php
// Memanggil Header
include_once __DIR__ . '/template/header.php';
?>

<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Daftar Mahasiswa</h3>
        </div>
        
        <div class="col-md-6 text-end">
            <a href="index.php?entity=student&action=add" class="btn btn-primary">
                + Tambah Mahasiswa
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
                <th>Nama Lengkap</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($studentList)) {
                foreach ($studentList as $student) {
            ?>
                    <tr>
                        <td><?= htmlspecialchars($student['student_id']) ?></td>
                        <td><?= htmlspecialchars($student['full_name']) ?></td>
                        <td><?= htmlspecialchars($student['major']) ?></td>
                        <td><?= htmlspecialchars($student['entry_year']) ?></td>
                        <td>
                            <a href="index.php?entity=student&action=edit&id=<?= $student['student_id'] ?>"
                                class="btn btn-sm btn-warning">Edit</a>

                            <a href="index.php?entity=student&action=delete&id=<?= $student['student_id'] ?>"
                                onclick="return confirm('Yakin ingin menghapus data <?= $student['full_name'] ?>?');"
                                class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data mahasiswa.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// Memanggil Footer
include_once __DIR__ . '/template/footer.php';
?>