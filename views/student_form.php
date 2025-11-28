<?php include_once __DIR__ . '/template/header.php'; ?>

<h2 class="text-xl mb-4">
    <?php echo isset($student) ? 'Edit Student' : 'Add Student'; ?>
</h2>

<form action="index.php?entity=student&action=<?php echo isset($student) ? 'update&id=' . $student['student_id'] : 'save'; ?>" method="POST" class="space-y-4">

    <?php if (isset($student)): ?>
        <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
    <?php endif; ?>

    <div>
        <label class="block">Full Name:</label>
        <input type="text" name="full_name"
               value="<?php echo isset($student) ? $student['full_name'] : ''; ?>"
               class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Major:</label>
        <input type="major" name="major"
               value="<?php echo isset($student) ? $student['major'] : ''; ?>"
               class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Entry Year:</label>
        <input type="number" name="entry_year"
               value="<?php echo isset($student) ? $student['entry_year'] : ''; ?>"
               class="border p-2 w-full">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php include_once __DIR__ . '/template/footer.php'; ?>
