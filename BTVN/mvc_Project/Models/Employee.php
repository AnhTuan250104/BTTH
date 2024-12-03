<?php
// models/Employee.php
class Employee
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', '', 'php_employee_management');
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Lấy tất cả nhân viên
    public function getAllEmployees()
    {
        $sql = "SELECT * FROM employee";
        return $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Thêm nhân viên mới
    public function addEmployee($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];

        $sql = "INSERT INTO employee (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
        return $this->connection->query($sql);
    }

    // Lấy thông tin nhân viên theo id
    public function getEmployeeById($id)
    {
        $sql = "SELECT * FROM employee WHERE id = $id";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }

    // Cập nhật nhân viên
    public function updateEmployee($id, $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];

        $sql = "UPDATE employee SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = $id";
        return $this->connection->query($sql);
    }

    // Xóa nhân viên
    public function deleteEmployee($id)
    {
        $sql = "DELETE FROM employee WHERE id = $id";
        return $this->connection->query($sql);
    }
}
