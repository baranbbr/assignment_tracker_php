<?php
function get_courses() {
    global $db;
    $query = "SELECT * FROM courses ORDER BY course_id";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $courses = $stmt->fetchAll();
    $stmt->closeCursor();
    return $courses;
}

function get_course_name($course_id) {
    if (!$course_id) {
        return "All courses";
    }
    global $db;
    $query = "SELECT * FROM courses WHERE course_id = :course_id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":course_id", $course_id);
    $stmt->execute();
    $course = $stmt->fetch();
    $stmt->closeCursor();
    $course_name = $course["course_name"];
    return $course_name;
}

function delete_course($course_id) {
    global $db;
    $query = "DELETE FROM courses WHERE course_id = :course_id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":course_id", $course_id);
    $stmt->execute();
    $stmt->closeCursor();
}

function add_course($course_name) {
    global $db;
    $query = "INSERT INTO courses (course_name) VALUES (:course_name)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":course_name", $course_name);
    $stmt->execute();
    $stmt->closeCursor();
}
