<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="admin" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>ADMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/User_icon-cp.svg/1200px-User_icon-cp.svg.png" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{Auth::user()->name}}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="admin" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Quản lý người dùng</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="users" class="dropdown-item">Danh sách</a>
                    <a href="getAddUser" class="dropdown-item">Thêm người dùng</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-heart me-2"></i>Quản lý khách hàng</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="customers" class="dropdown-item">Danh sách</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Quản lý hóa đơn</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="bills" class="dropdown-item">Danh sách</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-bookmark me-2"></i>Loại rượu</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="categories" class="dropdown-item">Danh sách</a>
                    <a href="getAddCategory" class="dropdown-item">Thêm loại rượu</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-star me-2"></i>Sản phẩm</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="products" class="dropdown-item">Danh sách</a>
                    <a href="getAddProduct" class="dropdown-item">Thêm sản phẩm</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-pen me-2"></i>Quản lý bài viết</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="blogs" class="dropdown-item">Danh sách</a>
                    <a href="getAddBlog" class="dropdown-item">Thêm bài viết</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-image me-2"></i>Quản lý Hình Ảnh</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="images" class="dropdown-item">Danh sách</a>
                    <a href="getAddImage" class="dropdown-item">Thêm hình ảnh</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-comment me-2"></i>Quản lý bình luận</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="comments" class="dropdown-item">Danh sách</a>
                </div>
            </div>
        </div>
    </nav>
</div>

