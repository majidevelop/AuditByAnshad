
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Dashboard | Minia - Minimal Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- plugin css -->
        <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- preloader css -->
        <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/assets.css" id="app-style-assets" rel="stylesheet" type="text/css" />


   <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

        <!-- jQuery (MUST come first) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

        <script src="assets/js/audit/audit.js"></script>   

    </head>

    <body onload="load_func();get_session_data();">

    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.svg" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Minia</span>
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.svg" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Minia</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="search" class="icon-lg"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">

                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-img" src="assets/images/flags/us.jpg" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                                    <img src="assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                                    <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                                    <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                                    <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                                    <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item" id="mode-setting-btn">
                                <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                                <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                            </button>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="grid" class="icon-lg"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                <div class="p-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/github.png" alt="Github">
                                                <span>GitHub</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                                <span>Dribbble</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                                <span>Dropbox</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                                <span>Mail Chimp</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="assets/images/brands/slack.png" alt="slack">
                                                <span>Slack</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="bell" class="icon-lg"></i>
                                <span class="badge bg-danger rounded-pill">5</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="#!" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">James Lemire</h6>
                                                <div class="font-size-13 text-muted">
                                                    <p class="mb-1">It will seem like simplified English.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-sm me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-cart"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Your order is placed</h6>
                                                <div class="font-size-13 text-muted">
                                                    <p class="mb-1">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-sm me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Your item is shipped</h6>
                                                <div class="font-size-13 text-muted">
                                                    <p class="mb-1">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#!" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Salena Layfield</h6>
                                                <div class="font-size-13 text-muted">
                                                    <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span> 
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item right-bar-toggle me-2">
                                <i data-feather="settings" class="icon-lg"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium"><span id="set_username"></span></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->

                                <a class="dropdown-item" href="apps-contacts-profile.html"><i class="mdi mdi mdi-face-man font-size-16 align-middle me-1"></i> Profile</a>
                                 <!--<a class="dropdown-item" href="auth-lock-screen.html"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock Screen</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" data-key="t-menu">Menu</li>

                            <li>
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="grid"></i>
                                    <span data-key="t-apps">Apps</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="apps-calendar.html">
                                            <span data-key="t-calendar">Calendar</span>
                                        </a>
                                    </li>
        
                                    <li>
                                        <a href="apps-chat.html">
                                            <span data-key="t-chat">Chat</span>
                                        </a>
                                    </li>
        
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-email">Email</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li><a href="apps-email-inbox.html" data-key="t-inbox">Inbox</a></li>
                                            <li><a href="apps-email-read.html" data-key="t-read-email">Read Email</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-invoices">Invoices</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li><a href="apps-invoices-list.html" data-key="t-invoice-list">Invoice List</a></li>
                                            <li><a href="apps-invoices-detail.html" data-key="t-invoice-detail">Invoice Detail</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-contacts">Contacts</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li><a href="apps-contacts-grid.html" data-key="t-user-grid">User Grid</a></li>
                                            <li><a href="apps-contacts-list.html" data-key="t-user-list">User List</a></li>
                                            <li><a href="apps-contacts-profile.html" data-key="t-profile">Profile</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="">
                                            <span data-key="t-blog">Blog</span>
                                            <span class="badge rounded-pill badge-soft-danger float-end" key="t-new">New</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li><a href="apps-blog-grid.html" data-key="t-blog-grid">Blog Grid</a></li>
                                            <li><a href="apps-blog-list.html" data-key="t-blog-list">Blog List</a></li>
                                            <li><a href="apps-blog-detail.html" data-key="t-blog-details">Blog Details</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="users"></i>
                                    <span data-key="t-authentication">Authentication</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="auth-login.html" data-key="t-login">Login</a></li>
                                    <li><a href="auth-register.html" data-key="t-register">Register</a></li>
                                    <li><a href="auth-recoverpw.html" data-key="t-recover-password">Recover Password</a></li>
                                    <li><a href="auth-lock-screen.html" data-key="t-lock-screen">Lock Screen</a></li>
                                    <li><a href="auth-logout.html" data-key="t-logout">Log Out</a></li>
                                    <li><a href="auth-confirm-mail.html" data-key="t-confirm-mail">Confirm Mail</a></li>
                                    <li><a href="auth-email-verification.html" data-key="t-email-verification">Email Verification</a></li>
                                    <li><a href="auth-two-step-verification.html" data-key="t-two-step-verification">Two Step Verification</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="file-text"></i>
                                    <span data-key="t-pages">Pages</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-starter.html" data-key="t-starter-page">Starter Page</a></li>
                                    <li><a href="pages-maintenance.html" data-key="t-maintenance">Maintenance</a></li>
                                    <li><a href="pages-comingsoon.html" data-key="t-coming-soon">Coming Soon</a></li>
                                    <li><a href="pages-timeline.html" data-key="t-timeline">Timeline</a></li>
                                    <li><a href="pages-faqs.html" data-key="t-faqs">FAQs</a></li>
                                    <li><a href="pages-pricing.html" data-key="t-pricing">Pricing</a></li>
                                    <li><a href="pages-404.html" data-key="t-error-404">Error 404</a></li>
                                    <li><a href="pages-500.html" data-key="t-error-500">Error 500</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="layouts-horizontal.html">
                                    <i data-feather="layout"></i>
                                    <span data-key="t-horizontal">Horizontal</span>
                                </a>
                            </li>

                            <li class="menu-title mt-2" data-key="t-components">Elements</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="briefcase"></i>
                                    <span data-key="t-components">Components</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="ui-alerts.html" data-key="t-alerts">Alerts</a></li>
                                    <li><a href="ui-buttons.html" data-key="t-buttons">Buttons</a></li>
                                    <li><a href="ui-cards.html" data-key="t-cards">Cards</a></li>
                                    <li><a href="ui-carousel.html" data-key="t-carousel">Carousel</a></li>
                                    <li><a href="ui-dropdowns.html" data-key="t-dropdowns">Dropdowns</a></li>
                                    <li><a href="ui-grid.html" data-key="t-grid">Grid</a></li>
                                    <li><a href="ui-images.html" data-key="t-images">Images</a></li>
                                    <li><a href="ui-modals.html" data-key="t-modals">Modals</a></li>
                                    <li><a href="ui-offcanvas.html" data-key="t-offcanvas">Offcanvas</a></li>
                                    <li><a href="ui-progressbars.html" data-key="t-progress-bars">Progress Bars</a></li>
                                    <li><a href="ui-placeholders.html" data-key="t-progress-bars">Placeholders</a></li>
                                    <li><a href="ui-tabs-accordions.html" data-key="t-tabs-accordions">Tabs & Accordions</a></li>
                                    <li><a href="ui-typography.html" data-key="t-typography">Typography</a></li>
                                    <li><a href="ui-toasts.html" data-key="t-typography">Toasts</a></li>
                                    <li><a href="ui-video.html" data-key="t-video">Video</a></li>
                                    <li><a href="ui-general.html" data-key="t-general">General</a></li>
                                    <li><a href="ui-colors.html" data-key="t-colors">Colors</a></li>
                                    <li><a href="ui-utilities.html" data-key="t-colors">Utilities</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="gift"></i>
                                    <span data-key="t-ui-elements">Extended</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="extended-lightbox.html" data-key="t-lightbox">Lightbox</a></li>
                                    <li><a href="extended-rangeslider.html" data-key="t-range-slider">Range Slider</a></li>
                                    <li><a href="extended-sweet-alert.html" data-key="t-sweet-alert">SweetAlert 2</a></li>
                                    <li><a href="extended-session-timeout.html" data-key="t-session-timeout">Session Timeout</a></li>
                                    <li><a href="extended-rating.html" data-key="t-rating">Rating</a></li>
                                    <li><a href="extended-notifications.html" data-key="t-notifications">Notifications</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="box"></i>
                                    <span class="badge rounded-pill badge-soft-danger  text-danger float-end">7</span>
                                    <span data-key="t-members">Members</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="view_master_members" data-key="t-form-elements">Members</a></li>
                                    <li><a href="view_master_roles" data-key="t-form-elements">Roles</a></li>
                                    <li><a href="view_master_companies" data-key="t-form-elements">Companies</a></li>
                                    <li><a href="view_master_departments" data-key="t-form-elements">Departments</a></li>
                                    <li><a href="view_master_process" data-key="t-form-elements">Process</a></li>

                                    <li><a href="view_master_audit_types" data-key="t-form-elements">Audit Types</a></li>


                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="box"></i>
                                    <span class="badge rounded-pill badge-soft-danger  text-danger float-end">7</span>
                                    <span data-key="t-forms">Forms</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="forms_master_layout" data-key="t-form-elements">Master</a></li>
                                    <li><a href="list_master_layouts" data-key="t-form-elements">Master Layouts</a></li>

                                    
                                    <!-- <li><a href="view_create_master_header" data-key="t-form-elements">Master - Header</a></li> -->

                                    <!-- <li><a href="view_create_master_footer" data-key="t-form-elements">Master - Footer</a></li> -->


                                    <li><a href="form_design_audit_plan" data-key="t-form-elements">Create Audit Plan</a></li>
                                    <li><a href="view_audit_plans" data-key="t-form-elements">View Audit Plans</a></li>



                                    <li><a href="list_audit_schedules" data-key="t-form-elements">View Scheduled Audits</a></li>
                                    <li><a href="list_schedule_inspection_calendar" data-key="t-form-elements">View Scheduled Inspection Calendar</a></li>
                                    <li><a href="view_compliance_reports_list" data-key="t-form-elements">View Compliance Reports</a></li>


                                    <!-- <li><a href="list_schedule_inspection" data-key="t-form-elements">Inspections</a></li> -->

                                    <li><a href="form_template_list" data-key="t-form-elements">Form Templates</a></li>
                                    <li><a href="form_template_list_view_cards" data-key="t-form-elements">View Templates</a></li>


                                    <li><a href="forms_home" data-key="t-form-elements">Create Form Templates</a></li>
                                    <!-- <li><a href="view_lead_auditor_approval_page" data-key="t-form-elements">Lead Auditor Approval Page</a></li> -->

                                    <li><a href="form-validation.html" data-key="t-form-validation">Validation</a></li>
                                    <li><a href="form-advanced.html" data-key="t-form-advanced">Advanced Plugins</a></li>
                                    <li><a href="form-editors.html" data-key="t-form-editors">Editors</a></li>
                                    <li><a href="form-uploads.html" data-key="t-form-upload">File Upload</a></li>
                                    <li><a href="form-wizard.html" data-key="t-form-wizard">Wizard</a></li>
                                    <li><a href="form-mask.html" data-key="t-form-mask">Mask</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="sliders"></i>
                                    <span data-key="t-tables">Tables</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="tables-basic.html" data-key="t-basic-tables">Bootstrap Basic</a></li>
                                    <li><a href="tables-datatable.html" data-key="t-data-tables">DataTables</a></li>
                                    <li><a href="tables-responsive.html" data-key="t-responsive-table">Responsive</a></li>
                                    <li><a href="tables-editable.html" data-key="t-editable-table">Editable</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="pie-chart"></i>
                                    <span data-key="t-charts">Charts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="charts-apex.html" data-key="t-apex-charts">Apexcharts</a></li>
                                    <li><a href="charts-echart.html" data-key="t-e-charts">Echarts</a></li>
                                    <li><a href="charts-chartjs.html" data-key="t-chartjs-charts">Chartjs</a></li>
                                    <li><a href="charts-knob.html" data-key="t-knob-charts">Jquery Knob</a></li>
                                    <li><a href="charts-sparkline.html" data-key="t-sparkline-charts">Sparkline</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="cpu"></i>
                                    <span data-key="t-icons">Icons</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="icons-boxicons.html" data-key="t-boxicons">Boxicons</a></li>
                                    <li><a href="icons-materialdesign.html" data-key="t-material-design">Material Design</a></li>
                                    <li><a href="icons-dripicons.html" data-key="t-dripicons">Dripicons</a></li>
                                    <li><a href="icons-fontawesome.html" data-key="t-font-awesome">Font Awesome 5</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="map"></i>
                                    <span data-key="t-maps">Maps</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="maps-google.html" data-key="t-g-maps">Google</a></li>
                                    <li><a href="maps-vector.html" data-key="t-v-maps">Vector</a></li>
                                    <li><a href="maps-leaflet.html" data-key="t-l-maps">Leaflet</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="share-2"></i>
                                    <span data-key="t-multi-level">Multi Level</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="javascript: void(0);" data-key="t-level-1-1">Level 1.1</a></li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Level 1.2</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="javascript: void(0);" data-key="t-level-2-1">Level 2.1</a></li>
                                            <li><a href="javascript: void(0);" data-key="t-level-2-2">Level 2.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                        <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                            <div class="card-body">
                                <img src="assets/images/giftbox.png" alt="">
                                <div class="mt-4">
                                    <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                                    <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                                    <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

           <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">