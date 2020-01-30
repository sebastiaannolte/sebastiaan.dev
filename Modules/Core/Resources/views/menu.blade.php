<style>

</style>
<div class="sidebar">
    <div class="container sidebar-sticky">
        <div class="sidebar-about">
            <p class="site-title-sidebar">Sebastiaan Nolte</p>
        </div>
        <input type="checkbox" id="menu-icon">
        <label class="menu-label" for="menu-icon"></label>
        <div class="trigger">
            <ul class="sidebar-nav">
                <li class="sidebar-nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a href="/">Home</a>
                </li>
                <li class="sidebar-nav-item {{ request()->is('about') ? 'active' : '' }}">
                    <a href="/about/">About</a>
                </li>
                <li class="sidebar-nav-item {{ request()->is('archive') ? 'active' : '' }}">
                    <a href="/archive/">Archive</a>
                </li>
                <li class="sidebar-nav-item {{ request()->is('projects') ? 'active' : '' }}">
                    <a href="/projects/">Projects</a>
                </li>
                @auth
                <hr class="menu-line">
                <li class="sidebar-nav-item">
                    <a href="/admin">Admin</a>
                </li>
                @endauth
            </ul>
        </div>
        <div class="copyright">© {{date('Y')}}. All rights reserved.</div>
    </div>
</div>
