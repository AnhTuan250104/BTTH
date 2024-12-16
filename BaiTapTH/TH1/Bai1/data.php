<?php
session_start();



if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = [
        [
            'name' => 'Hoa Sen',
            'description' => 'Hoa sen tượng trưng cho vẻ đẹp trắng trong, tao nhã của tâm hồn',
            'image' => 'images/hoa-sen.jpg'
        ],
        [
            'name' => 'Hoa Huỳnh Anh',
            'description' => 'Hoa có màu vàng rực, hình dạng như chiếc kèn be bé inh xinh, lại dễ trồng, mọc nhanh, vươn cao…',
            'image' => 'images/hoa-huynh-anh.jpg'
        ],
        [
            'name' => 'Hoa Cẩm Chướng',
            'description' => 'Hoa có phần thân mảnh, các đốt ngắn mang lá kép cùng nhiều màu sắc như hồng, vàng, đỏ, tím,…',
            'image' => 'images/hoa-cam-chuong.jpg'
        ],
        [
            'name' => 'Hoa Đèn Lồng',
            'description' => 'Hoa đèn lồng còn có tên là hồng đăng hoa, trồng trong chậu treo, bồn, phên dậu,… gieo hạt vào mùa xuân và cho hoa quanh năm.',
            'image' => 'images/hoa-den-long.jpg'
        ],
        [
            'name' => 'Hoa Giấy',
            'description' => ' Hoa giấy mỏng manh nhưng rất lâu tàn, với nhiều màu như trắng, xanh, đỏ, hồng, tím, vàng…',
            'image' => 'images/hoa-giay.jpg'
        ],
        [
            'name' => 'Hoa Thanh Tú',
            'description' => 'Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm.',
            'image' => 'images/hoa-thanh-tu.jpg'
        ],
        
    ];
}

// Xử lý thêm hoa mới
if (isset($_POST['add_flower'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $imagePath = 'images/' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    $_SESSION['flowers'][] = [
        'name' => $name,
        'description' => $description,
        'image' => $imagePath,
    ];
}

// Xử lý chỉnh sửa hoa
if (isset($_POST['edit_flower'])) {
    $id = $_POST['id'];
    $_SESSION['flowers'][$id]['name'] = $_POST['name'];
    $_SESSION['flowers'][$id]['description'] = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {
        $imagePath = 'images/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        $_SESSION['flowers'][$id]['image'] = $imagePath;
    }
}

// Xử lý xóa hoa
if (isset($_POST['delete_flower'])) {
    $id = $_POST['id'];
    unset($_SESSION['flowers'][$id]);
    $_SESSION['flowers'] = array_values($_SESSION['flowers']); // Đánh lại chỉ số
}
