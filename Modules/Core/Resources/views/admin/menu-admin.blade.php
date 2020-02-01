<div class="sidebar">
    <div class="container sidebar-sticky">
        <div class="sidebar-about">
            <p class="site-title-sidebar">Welcome {{getUser()->name}}</p>
        </div>
        <input type="checkbox" id="menu-icon">
        <label class="menu-label" for="menu-icon"></label>
        <div class="trigger">
            <ul class="sidebar-nav">
                <li class="sidebar-nav-item {{ request()->is('admin') ? 'active' : '' }}">
                    <a href="/admin">Home</a>
                </li>
                <li class="sidebar-nav-item {{ request()->is('admin/posts') ? 'active' : '' }}">
                    <a href="/admin/posts">Posts</a>
                </li>
                <li class="sidebar-nav-item {{ request()->is('admin/projects') ? 'active' : '' }}">
                    <a href="/admin/projects">Projects</a>
                </li>
                <li class="sidebar-nav-item {{ request()->is('admin/pages') ? 'active' : '' }}">
                    <a href="/admin/pages">Pages</a>
                </li>
                <hr class="menu-line">
                <li class="sidebar-nav-item {{ request()->is('admin/profile') ? 'active' : '' }}">
                    <a href="/admin/profile">Profile</a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="/admin/logout">Logout</a>
                </li>
            </ul>
        </div>
        <div class="copyright">© {{date('Y')}}. All rights reserved.</div>
    </div>
</div>
