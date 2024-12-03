<?php
// Bắt đầu session để sử dụng $_SESSION
session_start();

// Kiểm tra xem session đã có mảng employees chưa, nếu chưa tạo mới
if (!isset($_SESSION['employees'])) {
    $_SESSION['employees'] = [
        ['id' => 1, 'name' => 'Thomas Hardy', 'email' => 'thomashardy@mail.com', 'address' => '89 Chiaroscuro Rd, Portland, USA', 'phone' => '(171) 555-2222'],
        ['id' => 2, 'name' => 'Dominique Perrier', 'email' => 'dominiqueperrier@mail.com', 'address' => 'Obere Str. 57, Berlin, Germany', 'phone' => '(313) 555-5735'],
        ['id' => 3, 'name' => 'Maria Anders', 'email' => 'mariaanders@mail.com', 'address' => '25, rue Lauriston, Paris, France', 'phone' => '(503) 555-9931'],
        ['id' => 4, 'name' => 'Fran Wilson', 'email' => 'franwilson@mail.com', 'address' => 'C/ Araquil, 67, Madrid, Spain', 'phone' => '(204) 619-5731'],
        ['id' => 5, 'name' => 'Martin Blank', 'email' => 'martinblank@mail.com', 'address' => 'Via Monte Bianco 34, Turin, Italy', 'phone' => '(480) 631-2097'],
    ];
}


// Xử lý thêm nhân viên
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addEmployee'])) {
    $newEmployee = [
        'id' => count($_SESSION['employees']) + 1, // Auto increment id
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'phone' => $_POST['phone'],
    ];
    $_SESSION['employees'][] = $newEmployee;
}

// Xử lý sửa thông tin nhân viên
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editEmployee'])) {
    $id = (int) $_POST['id']; // Chuyển id thành kiểu số nguyên để so sánh chính xác.

    foreach ($_SESSION['employees'] as &$employee) { // Dùng tham chiếu
        if ((int)$employee['id'] === $id) { // Kiểm tra ID khớp
            // Cập nhật thông tin nhân viên
            $employee['name'] = $_POST['name'];
            $employee['email'] = $_POST['email'];
            $employee['address'] = $_POST['address'];
            $employee['phone'] = $_POST['phone'];
            break; // Dừng sau khi tìm thấy và sửa
        }
    }

    unset($employee); // Hủy tham chiếu để tránh lỗi ngoài ý muốn
}



// Xử lý xóa nhân viên
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteEmployee'])) {
    $id = $_POST['id'];
    foreach ($_SESSION['employees'] as $key => $employee) {
        if ($employee['id'] == $id) {
            unset($_SESSION['employees'][$key]);
        }
    }
}
