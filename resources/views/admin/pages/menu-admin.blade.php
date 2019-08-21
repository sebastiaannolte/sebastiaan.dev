<div class="sidebar">
    <div class="container sidebar-sticky">
        <div class="sidebar-about">
            <p class="site-title-sidebar">Welcome {{getUser()->name}}</p>
        </div>
        <input type="checkbox" id="menu-icon">
        <label class="menu-label" for="menu-icon"></label>
        <div class="trigger">
            <ul class="sidebar-nav">
                <p class="menu-title-item">>Posts</p>
                <li class="sidebar-nav-item {{ request()->is('posts') ? 'active' : '' }}">
                    <a href="/posts">Posts</a>
                </li>
                <li class="sidebar-nav-item {{ request()->is('post/new') ? 'active' : '' }}">
                    <a href="/post/new">New Post</a>
                </li>
                <p class="menu-title-item">>Projects</p>
                <li class="sidebar-nav-item {{ request()->is('project/projects') ? 'active' : '' }}">
                    <a href="/project/projects">Projects</a>
                </li>
                <li class="sidebar-nav-item {{ request()->is('project/new') ? 'active' : '' }}">
                    <a href="/project/new">New Project</a>
                </li>
                <p class="menu-title-item">>Pages</p>
                <li class="sidebar-nav-item {{ request()->is('pages') ? 'active' : '' }}">
                    <a href="/pages">Pages</a>
                </li>
                <hr class="menu-line">
                <li class="sidebar-nav-item">
                    <a href="/logout">Logout</a>
                </li>
            </ul>
        </div>
        <div class="copyright">© {{date('Y')}}. All rights reserved.</div>
    </div>
</div>
