<?php include_once __DIR__ . '/template/header.php'; ?>

<h2 class="text-xl mb-4">
    <?php echo isset($lecturer) ? 'Edit Lecturer' : 'Add Lecturer'; ?>
</h2>

<form action="index.php?entity=lecturer&action=<?php echo isset($lecturer) ? 'update&id=' . $lecturer['lecturer_id'] : 'save'; ?>" method="POST" class="space-y-4">
    <?php if (isset($lecturer)): ?>
        <input type="hidden" name="lecturer_id" value="<?php echo $lecturer['lecturer_id']; ?>">
    <?php endif; ?>

    <div>
        <label class="block">Lecturer Name:</label>
        <input type="text" name="lecturer_name"
               value="<?php echo isset($lecturer) ? $lecturer['lecturer_name'] : ''; ?>"
               class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Phone:</label>
        <input type="text" name="phone"
               value="<?php echo isset($lecturer) ? $lecturer['phone'] : ''; ?>"
               class="border p-2 w-full">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php include_once __DIR__ . '/template/footer.php'; ?>
