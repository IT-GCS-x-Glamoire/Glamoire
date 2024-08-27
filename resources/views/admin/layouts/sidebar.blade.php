<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('product-admin') ? 'active' : '' }}">
                    <a href="/product-admin" class='sidebar-link'>
                        <i class="bi bi-bag-fill"></i>
                        <span>Product</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('order-list') ? 'active' : '' }}">
                    <a href="/order-list" class='sidebar-link'>
                        <i class="bi bi-cart-check-fill"></i>
                        <span>Order</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('brand-admin') ? 'active' : '' }}">
                    <a href="/brand-admin" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Brand</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('category-product') ? 'active' : '' }}">
                    <a href="/category-product" class='sidebar-link'>
                        <i class="bi bi-bookmark-star-fill"></i>
                        <span>Category</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('article-admin') ? 'active' : '' }}">
                    <a href="/article-admin" class='sidebar-link'>
                        <i class="bi bi-file-earmark-post"></i>
                        <span>Article</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('user') ? 'active' : '' }}">
                    <a href="/user" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>User</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('shipping-fee') ? 'active' : '' }}">
                    <a href="/shipping-fee" class='sidebar-link'>
                        <i class="bi bi-mailbox2"></i>
                        <span>Shipping Fee</span>
                    </a>
                </li>
               
                <li class="sidebar-item {{ Request::is('promo') ? 'active' : '' }}">
                    <a href="/promo" class='sidebar-link'>
                        <i class="bi bi-receipt"></i>
                        <span>Promo</span>
                    </a>
                </li>
                
                <li class="sidebar-item {{ Request::is('affiliate-admin') ? 'active' : '' }}">
                    <a href="/affiliate-admin" class='sidebar-link'>
                        <i class="bi bi-briefcase-fill"></i>
                        <span>Affiliate</span>
                    </a>
                </li>            

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
