<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a class="active" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-dashboard"></i> <span> Collections</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('collections.index') }}">Collections</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-dashboard"></i> <span> Products</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('products.index') }}">Products</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-dashboard"></i> <span> Blogs</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-dashboard"></i> <span> Contacts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('contacts.index') }}">Contacts</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-users"></i> <span> Users</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('users.index') }}">Users</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
