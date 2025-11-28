<?php
include_once __DIR__ . '/template/header.php';
?>

<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>Daftar Matkul</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="index.php?entity=course&action=add" class="btn btn-primary">
                + Tambah Matkul
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
                <th>Nama Course</th>
                <th>Credits</th>
                <th>Lecturer</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if (!empty($courseList)) {
                foreach ($courseList as $course) {
            ?>
                    <tr>
                        <td><?= htmlspecialchars($course['course_id']) ?></td>
                        <td><?= htmlspecialchars($course['course_name']) ?></td>
                        <td><?= htmlspecialchars($course['credits']) ?></td>
                        <td><?= htmlspecialchars($course['lecturer_name']) ?></td>
                        <td>
                            <a href="index.php?entity=course&action=edit&id=<?= $course['course_id'] ?>"
                                class="btn btn-sm btn-warning">Edit</a>

                            <a href="index.php?entity=course&action=delete&id=<?= $course['course_id'] ?>"
                                onclick="return confirm('Yakin ingin menghapus data <?= $course['course_name'] ?>?');"
                                class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data matkul.</td>
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