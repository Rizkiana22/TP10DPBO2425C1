<?php
// 1. Load Semua ViewModel yang dibutuhkan
require_once __DIR__ . '/viewmodels/StudentViewModel.php';
require_once __DIR__ . '/viewmodels/LecturerViewModel.php';
require_once __DIR__ . '/viewmodels/CourseViewModel.php';
require_once __DIR__ . '/viewmodels/EnrollmentViewModel.php';

// 2. Ambil Entity dan Action dari URL
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'student'; // Default ke student
$action = isset($_GET['action']) ? $_GET['action'] : 'list';    // Default ke list

// 3. Logika Routing
if ($entity === 'student') {
    $studentVM = new StudentViewModel();

    switch ($action) {
        case 'list':
            $studentList = $studentVM->getstudentList();
            require_once 'views/student_list.php';
            break;
        case 'add':
            require_once 'views/student_form.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            $student = $studentVM->getstudentById($id);
            require_once 'views/student_form.php';
            break;
        case 'save':
            $full_name = $_POST['full_name'];
            $major = $_POST['major'];
            $entry_year = $_POST['entry_year'];
            $studentVM->addstudent($full_name, $major, $entry_year);
            header('Location: index.php?entity=student&action=list');
            break;
        case 'update':
            $id = $_POST['student_id']; // Ambil ID dari hidden input
            $full_name = $_POST['full_name'];
            $major = $_POST['major'];
            $entry_year = $_POST['entry_year'];
            $studentVM->updatestudent($id, $full_name, $major, $entry_year);
            header('Location: index.php?entity=student&action=list');
            break;
        case 'delete':
            $id = $_GET['id'];
            try {
                $studentVM->deletestudent($id);
                header('Location: index.php?entity=student&action=list');
            } catch (Exception $e) {
                header('Location: index.php?entity=student&action=list&error=dependency');
            }
            break;
        default:
            echo "Invalid action for student.";
            break;
    }

} else if ($entity === 'lecturer') {
    $lecturerVM = new LecturerViewModel();

    switch ($action) {
        case 'list':
            $lecturerList = $lecturerVM->getLecturerList();
            require_once 'views/lecturer_list.php';
            break;
        case 'add':
            require_once 'views/lecturer_form.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            $lecturer = $lecturerVM->getLecturerById($id);
            require_once 'views/lecturer_form.php';
            break;
        case 'save':
            $lecturer_name = $_POST['lecturer_name'];
            $phone = $_POST['phone'];
            $lecturerVM->addLecturer($lecturer_name, $phone);
            header('Location: index.php?entity=lecturer&action=list');
            break;
        case 'update':
            $id = $_POST['lecturer_id'];
            $lecturer_name = $_POST['lecturer_name'];
            $phone = $_POST['phone'];
            $lecturerVM->updateLecturer($id, $lecturer_name, $phone);
            header('Location: index.php?entity=lecturer&action=list');
            break;
        case 'delete':
            $id = $_GET['id'];
            try {
                $lecturerVM->deleteLecturer($id);
                header('Location: index.php?entity=lecturer&action=list');
            } catch(Exception $e) {
                header('Location: index.php?entity=lecturer&action=list&error=dependency');
            }
            break;
        default:
            echo "Invalid action for lecturer.";
            break;
    }

} elseif ($entity === 'course') {
    $courseVM = new CourseViewModel();
    // Kita butuh LecturerVM untuk mengisi dropdown dosen saat tambah course
    $lecturerVM = new LecturerViewModel(); 

    switch ($action) {
        case 'list':
            // Disarankan method ini ada JOIN dengan tabel lecturer
            $courseList = $courseVM->getCourseList(); 
            require_once 'views/course_list.php';
            break;
        case 'add':
            // Ambil data dosen untuk dropdown
            $lecturerList = $lecturerVM->getLecturerList();
            require_once 'views/course_form.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            $course = $courseVM->getCourseById($id);
            $lecturerList = $lecturerVM->getLecturerList(); // Dropdown dosen tetap butuh data
            require_once 'views/course_form.php';
            break;
        case 'save':
            $lecturer_id = $_POST['lecturer_id'];
            $course_name = $_POST['course_name'];
            $credits = $_POST['credits'];
            $courseVM->addCourse($lecturer_id, $course_name, $credits);
            header('Location: index.php?entity=course&action=list');
            break;
        case 'update':
            $id = $_POST['course_id'];
            $lecturer_id = $_POST['lecturer_id'];
            $course_name = $_POST['course_name'];
            $credits = $_POST['credits'];
            $courseVM->updateCourse($id, $lecturer_id, $course_name, $credits);
            header('Location: index.php?entity=course&action=list');
            break;
        case 'delete':
            $id = $_GET['id'];
            try {
                $courseVM->deleteCourse($id);
                header('Location: index.php?entity=course&action=list');
            } catch (Exception $e) {
                header('Location: index.php?entity=course&action=list&error=dependency');
            }
            break;
        default:
            echo "Invalid action for course.";
            break;
    }

} elseif ($entity === 'enrollment') {
    $enrollmentVM = new EnrollmentViewModel();
    // Enrollment butuh data Student dan Course untuk dropdown
    $studentVM = new StudentViewModel();
    $courseVM = new CourseViewModel();

    switch ($action) {
        case 'list':
            // Pastikan method ini melakukan JOIN (Student & Course)
            $enrollmentList = $enrollmentVM->getEnrollmentList(); 
            require_once 'views/enrollment_list.php';
            break;
        case 'add':
            // Siapkan data untuk dropdown di form
            $studentList = $studentVM->getstudentList();
            $courseList = $courseVM->getCourseList();
            require_once 'views/enrollment_form.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            $enrollment = $enrollmentVM->getEnrollmentById($id);
            // Dropdown tetap harus diisi
            $studentList = $studentVM->getstudentList();
            $courseList = $courseVM->getCourseList();
            require_once 'views/enrollment_form.php';
            break;
        case 'save':
            $student_id = $_POST['student_id'];
            $course_id = $_POST['course_id'];
            $grade = $_POST['grade'];
            $enrollmentVM->addEnrollment($student_id, $course_id, $grade);
            header('Location: index.php?entity=enrollment&action=list');
            break;
        case 'update':
            $id = $_POST['enrollment_id'];
            $student_id = $_POST['student_id'];
            $course_id = $_POST['course_id'];
            $grade = $_POST['grade'];
            $enrollmentVM->updateEnrollment($id, $student_id, $course_id, $grade);
            header('Location: index.php?entity=enrollment&action=list');
            break;
        case 'delete':
            $id = $_GET['id'];
            try {
                $enrollmentVM->deleteEnrollment($id);
                header('Location: index.php?entity=enrollment&action=list');
            } catch (Exception $e) {
                header('Location: index.php?entity=enrollment&action=list&error=dependency');
            }
            break;
        default:
            echo "Invalid action for enrollment.";
            break;
    }

} else {
    echo "Entity not found. Please check your URL.";
}
?>