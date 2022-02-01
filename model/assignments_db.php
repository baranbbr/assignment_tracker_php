<?php
function get_assignments_by_course($course_id) {
    global $db;
    if ($course_id) {
        $query = 'SELECT A.id, A.description, C.course_name 
            FROM assignments A
            LEFT JOIN courses C ON A.course_id = C.course_id
            WHERE A.course_id = :course_id
            ORDER BY id';
    } else {
        $query = 'SELECT A.id, A.description, C.course_name 
            FROM assignments A
            LEFT JOIN courses C ON A.course_id = C.course_id
            ORDER BY C.course_id';
    }
    $stmt = $db->prepare($query);
    if ($course_id) {
        $stmt->bindValue(":course_id", $course_id);
    }
    $stmt->execute();
    $assignments = $stmt->fetchAll();
    $stmt->closeCursor();
    return $assignments;
}

function delete_assignment($assignment_id) {
    global $db;
    $query = 'DELETE FROM assignments
              WHERE id = :assignment_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(":assignment_id", $assignment_id);
    $stmt->execute();
    $stmt->closeCursor();
}

function add_assignment($course_id, $description) {
    global $db;
    $query =
        "INSERT INTO assignments (description, course_id) VALUES (:description, :course_id)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":description", $description);
    $stmt->bindValue(":course_id", $course_id);
    $stmt->execute();
    $stmt->closeCursor();
}
