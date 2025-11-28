<?php include_once __DIR__ . '/template/header.php'; ?>

<h2 class="text-xl mb-4">
    <?php echo isset($course) ? 'Edit Course' : 'Add Course'; ?>
</h2>

<form action="index.php?entity=course&action=<?php echo isset($course) ? 'update&id=' . $course['course_id'] : 'save'; ?>" method="POST" class="space-y-4">
    <?php if (isset($course)): ?>
        <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
    <?php endif; ?>

    <div>
        <label class="block">Course Name:</label>
        <input type="text" name="course_name"
               value="<?php echo isset($course) ? $course['course_name'] : ''; ?>"
               class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Credits:</label>
        <input type="number" name="credits"
               value="<?php echo isset($course) ? $course['credits'] : ''; ?>"
               class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Lecturer:</label>
        <select name="lecturer_id" class="border p-2 w-full" required>
            <option value="">-- Choose Lecturer --</option>

            <?php foreach ($lecturerList as $l): ?>
                <option value="<?php echo $l['lecturer_id']; ?>"
                    <?php echo (isset($course) && $course['lecturer_id'] == $l['lecturer_id']) ? 'selected' : ''; ?>>
                    <?php echo $l['lecturer_name']; ?>
                </option>
            <?php endforeach; ?>

        </select>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php include_once __DIR__ . '/template/footer.php'; ?>
