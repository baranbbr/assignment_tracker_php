<?php include "view/header.php"; ?>
<section class="mb-6">
    <header class="flex flex-col md:flex-row py-8 text-lg">
        <h1 class="md:mr-8 font-bold text-[36px] mb-3">Assignments</h1>
        <form action="." method="get" class="">
            <input type="hidden" name="action" value="list_assignments">
            <select name="course_id" required class="p-2 bg-gray-200 rounded w-full md:w-auto mb-4">
                <option value="0">View All</option>
                <?php foreach ($courses as $course): ?>
                <?php if ($course_id == $course["course_id"]) { ?>
                <option value="<?= $course["course_id"] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $course["course_id"] ?>">
                    <?php } ?>
                    <?= $course["course_name"] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <button class="bg-slate-700 text-white rounded py-2 md:py-1 px-5 w-full md:w-auto">Go</button>
        </form>
    </header>
    <?php if ($assignments) { ?>
        <?php foreach ($assignments as $assign): ?>
            <div>
                <div>
                    <p class="font-bold"><?= $assign["course_name"] ?></p>
                    <p><?= $assign["description"] ?></p>
                </div>
                <div>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_assignment">
                        <input type="hidden" name="assignment_id" value="<?= $assignment[
                            "id"
                        ] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
            <?php } else {if ($course_id) { ?>
                <p class="text-center">No assignments exist for this course yet.</p>
                <?php } else { ?>
                <p class="text-center">No assignments exist yet.</p>
                <?php }} ?>

</section>
<section class="md:w-full py-8 text-lg">
    <h2 class="text-[36px] font-bold mb-2">Add Assignment</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_assignment">
        <div class="flex flex-col">
        <label>Course:</label>
            <select name="course_id" class="p-2 bg-gray-200 rounded mb-4" required>
                <option value="">Please select:</option>
                <?php foreach ($courses as $course): ?>
                <option value="<?= $course["course_id"] ?>">
                <?= $course["course_name"] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <label>Description:</label>
            <input type="text" class="bg-gray-200 rounded p-2 mb-4" name="description" maxlength="120" placeholder="Description... (max length 120 characters)" required>
        </div>
            <button class="bg-slate-700 text-white rounded py-2 w-full md:w-auto md:py-1 px-5">
                Add
            </button>
    </form>
</section>
<p class="underline text-center"><a href=".?action=list_courses">View & Edit Courses</a></p>
<?php include "view/footer.php"; ?>
