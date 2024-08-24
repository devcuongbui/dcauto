<?php $menu_status = getMenuStatus(); ?>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?=$menu_status['main1']['collapsed']?>" href="<?php echo route_to('home.admin'); ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$menu_status['main2']['collapsed']?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse <?=$menu_status['main2']['menu_show']?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= route_to('admin.products.list') ?>" class="<?= $menu_status['main2']['sub1_status'] ?>">
                        <i class="bi bi-circle"></i><span>Danh sách sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="<?= route_to('admin.products.create') ?>" class="<?= $menu_status['main2']['sub2_status'] ?>">
                        <i class="bi bi-circle"></i><span>Thêm mới sản phẩm</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$menu_status['main3']['collapsed']?>" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Danh mục</span><i
                        class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="category-nav" class="nav-content collapse <?=$menu_status['main3']['menu_show']?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?=route_to('admin.category.list')?>" class="<?= $menu_status['main3']['sub1_status'] ?>">
                        <i class="bi bi-circle"></i><span>Danh sách danh mục</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$menu_status['main4']['collapsed']?>" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tin tức</span><i
                        class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse <?=$menu_status['main4']['menu_show']?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= route_to('admin.news.list') ?>" class="<?= $menu_status['main4']['sub1_status'] ?>">
                        <i class="bi bi-circle"></i><span>Danh sách tin tức</span>
                    </a>
                </li>
                <li>
                    <a href="<?= route_to('admin.news.create') ?>" class="<?= $menu_status['main4']['sub2_status'] ?>">
                        <i class="bi bi-circle"></i><span>Thêm mới tin tức</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$menu_status['main5']['collapsed']?>" data-bs-target="#tables-orders-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Đơn hàng</span><i
                        class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-orders-nav" class="nav-content collapse <?=$menu_status['main5']['menu_show']?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= route_to('admin.orders.list') ?>" class="<?= $menu_status['main5']['sub1_status'] ?>">
                        <i class="bi bi-circle"></i><span>Danh sách đơn hàng</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=$menu_status['main6']['collapsed']?>" data-bs-target="#contact-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-envelope"></i><span>Liên Hệ</span><i
                        class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="contact-nav" class="nav-content collapse <?=$menu_status['main6']['menu_show']?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= route_to('admin.contact.list') ?>" class="<?= $menu_status['main6']['sub1_status'] ?>">
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
