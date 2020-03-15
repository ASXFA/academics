<div id="layoutSidenav_nav" style="font-size:15px">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">MAINMENU</div>
                <a class="nav-link" href="index.php"
                    ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Konten
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="konten.php">List Konten</a>
                        <a class="nav-link" href="tambahKonten.php">Tambah Konten</a>
                    </nav>
                </div>
                
                <a class="nav-link" href="kritikSaran.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Kritik & Saran
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo $_SESSION['username'] ?>
        </div>
    </nav>
</div>