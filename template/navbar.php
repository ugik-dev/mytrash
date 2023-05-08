<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Graduation Registration </div>
    </a>
    <hr class="sidebar-divider my-0" />
    <?php
    include('menu_' . $_SESSION['level'] . '.php')
    ?>
    <li class="nav-item">
        <a class="nav-link" href="logout.php">
            <i class="fas  fa-sign-out-alt fa-fw "></i>
            <span>Logout</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block" />
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>