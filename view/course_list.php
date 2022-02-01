<?php include "view/header.php"; ?>

<?php if ($courses) { ?>
    <section class="mb-6">
        <header class="flex items-center py-8 text-lg">
            <h1 class="text-center font-bold text-[36px]">Course List</h1>
        </header>
        <?php foreach ($courses as $course): ?>
            <div class="max-w-[140ch] flex justify-between leading-loose">
                <div class="">
                    <p><?= $course["course_name"] ?></p>
                </div>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_course">
                        <input type="hidden" name="course_id" value="<?= $course[
                            "course_id"
                        ] ?>">
                        <button class="pl-6"><span aria-label="red cross emoji">❌</span></button>
                    </form>
            </div>
            <?php endforeach; ?>
    </section>
    <?php } else { ?>
    <p class="mt-10 mb-6 text-center font-bold text-lg">No courses exist yet.</p>
    <?php } ?>

    <section class="md:w-full py-8 text-lg">
        <h2 class="text-[36px] font-bold mb-2">Add Course</h2>
        <form action="." method="post" class="">
            <input type="hidden" name="action" value="add_course">
            <div class="flex flex-col">
                <label>Name:</label>
                <input type="text" class="bg-gray-200 rounded p-2 mb-4" placeholder="Course name" 
                name="course_name" maxlength="60" autofocus required>
            </div>
                <button class="bg-slate-700 text-white rounded py-2 md:py-1 px-5 w-full md:w-auto">Add</button>
        </form>
    </section>
    <p class="underline text-center"><a href=".">View &amp; Add Assignments</a></p>
<?php include "view/footer.php"; ?>
