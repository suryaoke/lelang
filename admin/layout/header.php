<!DOCTYPE html>
<!--
Template Name: Lelang Online - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="assets/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lelang Online admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Lelang Online Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Lelang Online</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="assets/dist/css/app.css" />
    <!-- END: CSS Assets-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<!-- END: Head -->

<body class="main">
    <!-- BEGIN: Mobile Menu -->
    <!-- <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone - HTML Admin Template" class="w-6" src="assets/dist/images/logo.svg">
            </a>
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <div class="scrollable">
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            <ul class="scrollable__content py-2">
                <li>
                    <a href="javascript:;.html" class="menu menu--active">
                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="menu__title"> Dashboard <i data-lucide="chevron-down" class="menu__sub-icon transform rotate-180"></i> </div>
                    </a>
                    <ul class="menu__sub-open">
                        <li>
                            <a href="side-menu-light-dashboard-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 1 </div>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="side-menu-light-inbox.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="menu__title"> Inbox </div>
                    </a>
                </li>


            </ul>
        </div>
    </div> -->
    <!-- END: Mobile Menu -->
    <!-- BEGIN: Top Bar -->
    <div class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] mt-12 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
        <div class="h-full flex items-center">
            <!-- BEGIN: Logo -->
            <a href="" class="-intro-x hidden md:flex">
                <img alt="Midone - HTML Admin Template" class="w-6" src="assets/dist/images/logo.svg">
                <span class="text-white text-lg ml-3"> Lelang Online </span>
            </a>
            <!-- END: Logo -->
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                <ol class="breadcrumb breadcrumb-light">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lelang Online</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->


            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="Midone - HTML Admin Template" src="assets/dist/images/profile-4.jpg">
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                        <li class="p-2">
                            <div class="font-medium"><?= $_SESSION['nama_lengkap'] ?></div>
                            <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500"><?= $_SESSION['role'] ?></div>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="login/logout.php" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
    </div>
    <!-- END: Top Bar -->
    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <ul>
                    <?php
                    // Mendapatkan parameter 'page' dari URL, default adalah 'home'
                    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                    ?>
                    <li>
                        <a href="index.php" class="side-menu <?php echo ($page == 'home') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-inbox.html" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title"> Data Masyarakat </div>
                        </a>
                    </li>
                    <li>
                        <a href="?page=kategori/index" class="side-menu <?php echo ($page == 'kategori/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                            <div class="side-menu__title"> Kategori </div>
                        </a>
                    </li>
                    <li>
                        <a href="?page=barang/index" class="side-menu <?php echo ($page == 'barang/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="package"></i> </div>
                            <div class="side-menu__title"> Barang </div>
                        </a>
                    </li>
                    <li>
                        <a href="?page=lelang/index" class="side-menu <?php echo ($page == 'lelang/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="side-menu__title"> Data Lelang </div>
                        </a>
                    </li>
                    <li>
                        <a href="?page=penawaran/index" class="side-menu <?php echo ($page == 'penawaran/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="side-menu__title"> Data Penawaran Lelang </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-inbox.html" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="printer"></i> </div>
                            <div class="side-menu__title"> Laporan </div>
                        </a>
                    </li>
                    <li>
                        <a href="?page=about/index" class="side-menu <?php echo ($page == 'about/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="info"></i> </div>
                            <div class="side-menu__title"> About </div>
                        </a>
                    </li>
                    <li>
                        <a href="?page=kontak/index" class="side-menu <?php echo ($page == 'kontak/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact">
                                    <path d="M16 2v2" />
                                    <path d="M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2" />
                                    <path d="M8 2v2" />
                                    <circle cx="12" cy="11" r="3" />
                                    <rect x="3" y="4" width="18" height="18" rx="2" />
                                </svg> </div>
                            <div class="side-menu__title"> Kontak </div>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->