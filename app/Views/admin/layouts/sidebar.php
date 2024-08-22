<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="<?php echo route_to('home'); ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= route_to('admin.products.list') ?>">
                        <i class="bi bi-circle"></i><span>Danh sách sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="<?= route_to('admin.products.create') ?>">
                        <i class="bi bi-circle"></i><span>Thêm mới sản phẩm</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Danh mục</span><i
                        class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?=route_to('admin.category.list')?>">
                        <i class="bi bi-circle"></i><span>Danh sách danh mục</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tin tức</span><i
                        class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= route_to('admin.news.list') ?>">
                        <i class="bi bi-circle"></i><span>Danh sách tin tức</span>
                    </a>
                </li>
                <li>
                    <a href="<?= route_to('admin.news.create') ?>">
                        <i class="bi bi-circle"></i><span>Thêm mới tin tức</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-orders-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Đơn hàng</span><i
                        class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= route_to('admin.orders.list') ?>">
                        <i class="bi bi-circle"></i><span>Danh sách đơn hàng</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#contact-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-envelope"></i><span>Liên Hệ</span><i
                        class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="contact-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= route_to('admin.contact.list') ?>">
                        <i class="bi bi-circle"></i><span>Danh sách liên hệ</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li> -->
    </ul>

</aside>
