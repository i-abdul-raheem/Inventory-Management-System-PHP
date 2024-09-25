<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a id="logo-lg" class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <img src="img/logo.png" alt="FSC-SA" width="200px">
    </a>
    <a id="logo-sm" class="sidebar-brand d-none align-items-center justify-content-center" href="index.php">
        <img src="img/logo-small.png" alt="FSC-SA" width="50px">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo $active == "dashboard" ? "active" : ""; ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item <?php echo $active == "inventory" ? "active" : ""; ?>">
        <a class="nav-link" href="inventory.php">
            <i class="fas fa-fw fa-sitemap"></i>
            <span>Inventory</span></a>
    </li>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Setup
    </div>

    <li class="nav-item <?php echo $active == "categories" ? "active" : ""; ?>">
        <a class="nav-link" href="categories.php">
            <i class="fas fa-fw fa-list"></i>
            <span>Categories</span></a>
    </li>
    <li class="nav-item <?php echo $active == "customers" ? "active" : ""; ?>">
        <a class="nav-link" href="customers.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span></a>
    </li>
    <li class="nav-item <?php echo $active == "material" ? "active" : ""; ?>">
        <a class="nav-link" href="material.php">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>Material</span></a>
    </li>
    <li class="nav-item <?php echo $active == "vendors" ? "active" : ""; ?>">
        <a class="nav-link" href="vendors.php">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Vendors</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Functions
    </div>

    <li class="nav-item <?php echo $active == "orders" ? "active" : ""; ?>">
        <a class="nav-link" href="orders.php">
            <i class="fas fa-fw fa-truck"></i>
            <span>Orders</span></a>
    </li>
    <li class="nav-item <?php echo $active == "reports" ? "active" : ""; ?>">
        <a class="nav-link" href="reports.php">
            <i class="fas fa-fw fa-file-pdf"></i>
            <span>Reports</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" onclick="toggleLogo()"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<script>
    function toggleLogo() {
        // Helper function to toggle visibility
        const toggleVisibility = (elementToShow, elementToHide) => {
            elementToShow.classList.remove("d-none");
            elementToShow.classList.add("d-flex");
            elementToHide.classList.remove("d-flex");
            elementToHide.classList.add("d-none");
        };

        // Get both logo elements
        const logoSm = document.getElementById("logo-sm");
        const logoLg = document.getElementById("logo-lg");

        // Check which logo is visible and toggle accordingly
        if (logoSm.classList.contains("d-flex")) {
            toggleVisibility(logoLg, logoSm);
        } else {
            toggleVisibility(logoSm, logoLg);
        }
    }
</script>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">

        <!-- Topbar -->
        <?php require("./components/navbar.php"); ?>
        <!-- End of Topbar -->