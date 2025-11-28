<?php include_once __DIR__ . '/template/header.php'; ?>

<h2 class="text-xl mb-4">
    <?php echo isset($enrollment) ? 'Edit Enrollment' : 'Add Enrollment'; ?>
</h2>

<form action="index.php?entity=enrollment&action=<?php echo isset($enrollment) ? 'update&id=' . $enrollment['enrollment_id'] : 'save'; ?>" method="POST" class="space-y-4">
    <?php if (isset($enrollment)): ?>
        <input type="hidden" name="enrollment_id" value="<?php echo $enrollment['enrollment_id']; ?>">
    <?php endif; ?>

    <div>
        <label class="block">Student:</label>
        <select name="student_id" class="border p-2 w-full" required>
            <option value="">-- Choose Student --</option>

            <?php foreach ($studentList as $s): ?>
                <option value="<?php echo $s['student_id']; ?>"
                    <?php echo (isset($enrollment) && $enrollment['student_id'] == $s['student_id']) ? 'selected' : ''; ?>>
                    <?php echo $s['full_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label class="block">Course:</label>
        <select name="course_id" class="border p-2 w-full" required>
            <option value="">-- Choose Course --</option>

            <?php foreach ($courseList as $c): ?>
                <option value="<?php echo $c['course_id']; ?>"
                    <?php echo (isset($enrollment) && $enrollment['course_id'] == $c['course_id']) ? 'selected' : ''; ?>>
                    <?php echo $c['course_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label class="block">Grade:</label>
        <input type="text" name="grade"
               value="<?php echo isset($enrollment) ? $enrollment['grade'] : ''; ?>"
               class="border p-2 w-full">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php include_once __DIR__ . '/template/footer.php'; ?>
