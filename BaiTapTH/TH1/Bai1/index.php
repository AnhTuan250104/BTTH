<?php include 'data.php' ?>
<?php include 'header.php'; ?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Danh Sách Hoa</h2>
    <div class="row">
        <?php foreach ($_SESSION['flowers'] as $index => $flower): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= $flower['image'] ?>" class="card-img-top" alt="<?= $flower['name'] ?>" />
                    <div class="card-body">
                        <h5 class="card-title"><?= $flower['name'] ?></h5>
                        <p class="card-text"><?= $flower['description'] ?></p>

                        <!-- Chỉ hiển thị chức năng với admin -->
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                            <button class="btn btn-warning btn-sm edit" data-toggle="modal" data-target="#editModal"
                                data-id="<?= $index ?>"
                                data-name="<?= $flower['name'] ?>"
                                data-description="<?= $flower['description'] ?>">
                                Sửa
                            </button>
                            <button class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#deleteModal"
                                data-id="<?= $index ?>">
                                Xóa
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Form thêm hoa (Chỉ dành cho admin) -->
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Thêm Hoa</button>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>

<!-- Modal Thêm -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Hoa Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="name" class="form-control mb-3" placeholder="Tên hoa" required />
                    <textarea name="description" class="form-control mb-3" placeholder="Mô tả" required></textarea>
                    <input type="file" name="image" class="form-control" required />
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_flower" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Sửa -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa Hoa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id" />
                    <input type="text" id="edit-name" name="name" class="form-control mb-3" placeholder="Tên hoa" required />
                    <textarea id="edit-description" name="description" class="form-control mb-3" placeholder="Mô tả" required></textarea>
                    <input type="file" name="image" class="form-control" />
                </div>
                <div class="modal-footer">
                    <button type="submit" name="edit_flower" class="btn btn-warning">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Xóa -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa Hoa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete-id" name="id" />
                    <p>Bạn có chắc chắn muốn xóa hoa này?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete_flower" class="btn btn-danger">Xóa</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </form>
    </div>
</div>