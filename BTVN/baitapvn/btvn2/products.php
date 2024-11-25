<?php
// Initialize the employees array (you can replace this with a database in real-world use)
$employees = [
    ['id' => 1, 'name' => 'Thomas Hardy', 'email' => 'thomashardy@mail.com', 'address' => '89 Chiaroscuro Rd, Portland, USA', 'phone' => '(171) 555-2222'],
    ['id' => 2, 'name' => 'Dominique Perrier', 'email' => 'dominiqueperrier@mail.com', 'address' => 'Obere Str. 57, Berlin, Germany', 'phone' => '(313) 555-5735'],
    ['id' => 3, 'name' => 'Maria Anders', 'email' => 'mariaanders@mail.com', 'address' => '25, rue Lauriston, Paris, France', 'phone' => '(503) 555-9931'],
    ['id' => 4, 'name' => 'Fran Wilson', 'email' => 'franwilson@mail.com', 'address' => 'C/ Araquil, 67, Madrid, Spain', 'phone' => '(204) 619-5731'],
    ['id' => 5, 'name' => 'Martin Blank', 'email' => 'martinblank@mail.com', 'address' => 'Via Monte Bianco 34, Turin, Italy', 'phone' => '(480) 631-2097'],
];

// Add employee
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addEmployee'])) {
    $newEmployee = [
        'id' => count($employees) + 1, // Auto increment id
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'phone' => $_POST['phone'],
    ];
    $employees[] = $newEmployee;
}

// Edit employee
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editEmployee'])) {
    $id = $_POST['id'];
    foreach ($employees as &$employee) {
        if ($employee['id'] == $id) {
            $employee['name'] = $_POST['name'];
            $employee['email'] = $_POST['email'];
            $employee['address'] = $_POST['address'];
            $employee['phone'] = $_POST['phone'];
        }
    }
}

// Delete employee
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteEmployee'])) {
    $id = $_POST['id'];
    foreach ($employees as $key => $employee) {
        if ($employee['id'] == $id) {
            unset($employees[$key]);
        }
    }
}
