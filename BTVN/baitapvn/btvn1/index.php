<?php include 'header.php'; ?>

<body>
    <?php include 'product.php'; ?>
    <h1>Danh Sách Sản Phẩm</h1>
    <table border="1">
        <tr>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
        </tr>

        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= htmlspecialchars($product['price']) ?> VND</td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
<?php include 'footer.php'; ?>

<style>
    table {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>