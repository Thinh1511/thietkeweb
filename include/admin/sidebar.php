<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'ADMIN') {
            echo '
                    <!-- Start Dashboard Nav -->
                    <li class="nav-item">
                        <a class="nav-link " href="/admin/dashboard.php">
                            <i class="bi bi-grid"></i>
                            <span>Trang quản trị</span>
                        </a>
                    </li>
                    <!-- End Dashboard Nav -->
            
                    <!-- Start Products Nav -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-menu-button-wide"></i><span>Bài giảng</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="/admin/courses/list.php">
                                    <i class="bi bi-circle"></i><span>Danh sách bài giảng</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/courses/create.php">
                                    <i class="bi bi-circle"></i><span>Thêm mới bài giảng</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- End Products Nav -->
                    
                    <!-- Start Users Nav -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-list"></i><span>Tài khoản</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="/admin/users/list.php">
                                    <i class="bi bi-circle"></i><span>Danh sách tài khoản</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/users/create.php">
                                    <i class="bi bi-circle"></i><span>Thêm mới tài khoản</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- End Users Nav -->';
        }
        ?>

        <!-- Start Profile Page Nav -->
        <li class="nav-heading">Trang</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="../../clients/profile.php">
                <i class="bi bi-person"></i>
                <span>Trang cá nhân</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="../../clients/my-course.php">
                <i class="bi bi-clock-history"></i>
                <span>Bài học trước đó</span>
            </a>
        </li>
        <!-- End Profile Page Nav -->
    </ul>

</aside>
<!-- End Sidebar-->