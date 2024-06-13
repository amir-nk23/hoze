<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta
        content="DayOne - It is one of the Major Dashboard Template which includes - HR, Employee and Job Dashboard. This template has multipurpose HTML template and also deals with Task, Project, Client and Support System Dashboard."
        name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords"
          content="admin dashboard, admin panel template, html admin template, dashboard html template, bootstrap 4 dashboard, template admin bootstrap 4, simple admin panel template, simple dashboard html template,  bootstrap admin panel, task dashboard, job dashboard, bootstrap admin panel, dashboards html, panel in html, bootstrap 4 dashboard"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    <!-- Title -->
    <title>Dayone - Multipurpose Admin & Dashboard Template</title>

    <!--Favicon -->
    <link rel="icon" href="{{asset('assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

    <!-- Bootstrap css -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet"/>

    <!-- Style css -->
    <link href="{{asset('assets/css-rtl/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css-rtl/dark.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet"/>

    <!-- Animate css -->
    <link href="{{asset('assets/css-rtl/animated.css')}}" rel="stylesheet"/>

    <!--Sidemenu css -->
        <link href="{{asset('assets/css-rtl/sidemenu.css')}}" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="{{asset('assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet"/>

    <!---Icons css-->
    <link href="{{asset('assets/css-rtl/icons.css')}}" rel="stylesheet"/>

    <!---Sidebar css-->
    <link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet"/>

    <!-- Select2 css -->
    {{--            <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


    <link href="{{asset('datetimepicker/dist/jquery.md.bootstrap.datetimepicker.style.css')}}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{asset('richtexteditor/rte_theme_default.css')}}"/>

    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet"
          type="text/css"/>

    <style>

        body {
            font-family: Vazirmatn, sans-serif;
        }

        .general,.social {

            transition: transform 0.5s;

        }

        .card-s:hover .general,.card-s:hover  .social{


            transform: scale(1.1);

        }
        .card-s{
            position: relative;
         }
        .card-footer-s  {
            position: absolute;
            opacity:0;
            height: 100%;
            width: 100%;
            transition: 0.5s;
            inset: 0;
            color: #fff3cd;


        }

        .card-footer-s:hover  {

            display: block;
            opacity: 1;


        }

        .card-s:hover img {
            filter: blur(3px);

        }

        .card-body{

            position: relative;


        }

        .card-element{

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);


        }

    </style>

    @include('sweetalert::alert')


</head>

<body class="app sidebar-mini">

<!---Global-loader-->
<div id="global-loader">
    <img src="{{asset('assets/images/svgs/loader.svg')}}" alt="loader">
</div>

<div class="page">
    <div class="page-main">

        @include('admin.layouts.aside')


        <div class="app-content main-content">
            <div class="side-app">

                <!--app header-->
                <div class="app-header header">
                    <div class="container-fluid">
                        <div class="d-flex">
                            <a class="header-brand" href="index.html">
                                <img src="{{asset('assets/images/brand/logo.png')}}"
                                     class="header-brand-img desktop-lgo" alt="Dayonelogo">
                                <img src="{{asset('assets/images/brand/logo-white.png')}}"
                                     class="header-brand-img dark-logo" alt="Dayonelogo">
                                <img src="{{asset('assets/images/brand/favicon.png')}}"
                                     class="header-brand-img mobile-logo" alt="Dayonelogo">
                                <img src="{{asset('assets/images/brand/favicon1.png')}}"
                                     class="header-brand-img darkmobile-logo" alt="Dayonelogo">
                            </a>
                            <div class="app-sidebar__toggle" data-toggle="sidebar">
                                <a class="open-toggle" href="#">
                                    <i class="feather feather-menu"></i>
                                </a>
                                <a class="close-toggle" href="#">
                                    <i class="feather feather-x"></i>
                                </a>
                            </div>
{{--                            <div class="mt-0">--}}
{{--                                <form class="form-inline">--}}
{{--                                    <div class="search-element">--}}
{{--                                        <input type="search" class="form-control header-search" placeholder="Search…"--}}
{{--                                               aria-label="Search" tabindex="1">--}}
{{--                                        <button class="btn btn-primary-color">--}}
{{--                                            <i class="feather feather-search"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div><!-- SEARCH -->--}}
                            <div class="d-flex order-lg-2 my-auto mr-auto">
                                <a class="nav-link my-auto icon p-0 nav-link-lg d-md-none navsearch" href="#"
                                   data-toggle="search">
                                    <i class="feather feather-search search-icon header-icon"></i>
                                </a>
{{--                                <div class="dropdown header-flags">--}}
{{--                                    <a class="nav-link icon" data-toggle="dropdown">--}}
{{--                                        <img src="{{asset('assets/images/flags/flag-png/united-kingdom.png')}}"--}}
{{--                                             class="h-24" alt="img">--}}
{{--                                    </a>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow animated">--}}
{{--                                        <a href="#" class="dropdown-item d-flex "> <span--}}
{{--                                                class="avatar  mr-3 align-self-center bg-transparent"><img--}}
{{--                                                    src="{{asset('assets/images/flags/flag-png/india.png')}}" alt="img"--}}
{{--                                                    class="h-24"></span>--}}
{{--                                            <div class="d-flex"><span class="my-auto">India</span></div>--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="dropdown-item d-flex"> <span--}}
{{--                                                class="avatar  mr-3 align-self-center bg-transparent"><img--}}
{{--                                                    src="../../assets/images/flags/flag-png/united-kingdom.png"--}}
{{--                                                    alt="img" class="h-24"></span>--}}
{{--                                            <div class="d-flex"><span class="my-auto">UK</span></div>--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="dropdown-item d-flex"> <span--}}
{{--                                                class="avatar mr-3 align-self-center bg-transparent"><img--}}
{{--                                                    src="../../assets/images/flags/flag-png/italy.png" alt="img"--}}
{{--                                                    class="h-24"></span>--}}
{{--                                            <div class="d-flex"><span class="my-auto">Italy</span></div>--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="dropdown-item d-flex"> <span--}}
{{--                                                class="avatar mr-3 align-self-center bg-transparent"><img--}}
{{--                                                    src="../../assets/images/flags/flag-png/united-states-of-america.png"--}}
{{--                                                    class="h-24" alt="img"></span>--}}
{{--                                            <div class="d-flex"><span class="my-auto">US</span></div>--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="dropdown-item d-flex"> <span--}}
{{--                                                class="avatar  mr-3 align-self-center bg-transparent"><img--}}
{{--                                                    src="../../assets/images/flags/flag-png/spain.png" alt="img"--}}
{{--                                                    class="h-24"></span>--}}
{{--                                            <div class="d-flex"><span class="my-auto">Spain</span></div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="dropdown header-fullscreen">
                                    <a class="nav-link icon full-screen-link">
                                        <i class="feather feather-maximize fullscreen-button fullscreen header-icons"></i>
                                        <i class="feather feather-minimize fullscreen-button exit-fullscreen header-icons"></i>
                                    </a>
                                </div>
{{--                                <div class="dropdown header-message">--}}
{{--                                    <a class="nav-link icon" data-toggle="dropdown">--}}
{{--                                        <i class="feather feather-mail header-icon"></i>--}}
{{--                                        <span class="badge badge-success side-badge">5</span>--}}
{{--                                    </a>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow  animated">--}}
{{--                                        <div class="header-dropdown-list message-menu" id="message-menu">--}}
{{--                                            <a class="dropdown-item border-bottom" href="#">--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <div class="">--}}
{{--                                                        <span--}}
{{--                                                            class="avatar avatar-md brround align-self-center cover-image"--}}
{{--                                                            data-image-src=""></span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex">--}}
{{--                                                        <div class="pl-3">--}}
{{--                                                            <h6 class="mb-1">Jack Wright</h6>--}}
{{--                                                            <p class="fs-13 mb-1">All the best your template awesome</p>--}}
{{--                                                            <div class="small text-muted">--}}
{{--                                                                3 hours ago--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                            <a class="dropdown-item border-bottom" href="#">--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <div class="">--}}
{{--                                                        <span--}}
{{--                                                            class="avatar avatar-md brround align-self-center cover-image"--}}
{{--                                                            data-image-src="../../assets/images/users/2.jpg"></span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex">--}}
{{--                                                        <div class="pl-3">--}}
{{--                                                            <h6 class="mb-1">Lisa Rutherford</h6>--}}
{{--                                                            <p class="fs-13 mb-1">Hey! there I'm available</p>--}}
{{--                                                            <div class="small text-muted">--}}
{{--                                                                5 hour ago--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                            <a class="dropdown-item border-bottom" href="#">--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <div class="">--}}
{{--                                                        <span--}}
{{--                                                            class="avatar avatar-md brround align-self-center cover-image"--}}
{{--                                                            data-image-src="../../assets/images/users/3.jpg"></span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex">--}}
{{--                                                        <div class="pl-3">--}}
{{--                                                            <h6 class="mb-1">Blake Walker</h6>--}}
{{--                                                            <p class="fs-13 mb-1">Just created a new blog post</p>--}}
{{--                                                            <div class="small text-muted">--}}
{{--                                                                45 mintues ago--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                            <a class="dropdown-item border-bottom" href="#">--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <div class="">--}}
{{--                                                        <span--}}
{{--                                                            class="avatar avatar-md brround align-self-center cover-image"--}}
{{--                                                            data-image-src="../../assets/images/users/4.jpg"></span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex">--}}
{{--                                                        <div class="pl-3">--}}
{{--                                                            <h6 class="mb-1">Fiona Morrison</h6>--}}
{{--                                                            <p class="fs-13 mb-1">Added new comment on your photo</p>--}}
{{--                                                            <div class="small text-muted">--}}
{{--                                                                2 days ago--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                            <a class="dropdown-item border-bottom" href="#">--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <div class="">--}}
{{--                                                        <span--}}
{{--                                                            class="avatar avatar-md brround align-self-center cover-image"--}}
{{--                                                            data-image-src="../../assets/images/users/6.jpg"></span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex">--}}
{{--                                                        <div class="pl-3">--}}
{{--                                                            <h6 class="mb-1">Stewart Bond</h6>--}}
{{--                                                            <p class="fs-13 mb-1">Your payment invoice is generated</p>--}}
{{--                                                            <div class="small text-muted">--}}
{{--                                                                3 days ago--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                        <div class=" text-center p-2">--}}
{{--                                            <a href="#" class="">See All Messages</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="dropdown header-notify">--}}
{{--                                    <a class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">--}}
{{--                                        <i class="feather feather-bell header-icon"></i>--}}
{{--                                        <span class="bg-dot"></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
                                <div class="dropdown profile-dropdown">
                                    <a href="#" class="nav-link pr-1 pl-0 leading-none" data-toggle="dropdown">
												<span>
													<img
                                                        src="{{asset('storage/'.\Illuminate\Support\Facades\Auth::user()->image)}}"
                                                        alt="img" class="avatar avatar-md bradius">
												</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow animated">
                                        <div class="p-3 text-center border-bottom">
                                            <a href="#" class="text-center user pb-0 font-weight-bold">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                        </div>
                                        <a class="dropdown-item d-flex" href="{{route('admin.profile.edit')}}">
                                            <i class="feather feather-user ml-3 fs-16 my-auto"></i>
                                            <div class="mt-1">پروفایل</div>
                                        </a>
                                        {{--												<a class="dropdown-item d-flex" href="#">--}}
                                        {{--													<i class="feather feather-settings ml-3 fs-16 my-auto"></i>--}}
                                        {{--													<div class="mt-1">Settings</div>--}}
                                        {{--												</a>--}}
                                        {{--												<a class="dropdown-item d-flex" href="#">--}}
                                        {{--													<i class="feather feather-mail ml-3 fs-16 my-auto"></i>--}}
                                        {{--													<div class="mt-1">Messages</div>--}}
                                        {{--												</a>--}}
                                        <a class="dropdown-item d-flex" href="#" data-toggle="modal"
                                           data-target="#changepasswordnmodal">
                                            <i class="feather feather-edit-2 ml-3 fs-16 my-auto"></i>
                                            <div class="mt-1">تغییر رمز عبور</div>
                                        </a>
                                        <a class="dropdown-item d-flex" href="{{route('auth.logout')}}">
                                            <i class="feather feather-power ml-3 fs-16 my-auto"></i>
                                            <div class="mt-1">خروج</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/app header-->
                @yield('content')

            </div>
        </div><!-- end app-content-->
    </div>

    @include('admin.layouts.footer')

    <!--Sidebar-right-->
    {{--			<div class="sidebar sidebar-right sidebar-animate">--}}
    {{--				<div class="card-header border-bottom pb-5">--}}
    {{--					<h4 class="card-title">Notifications </h4>--}}
    {{--					<div class="card-options">--}}
    {{--						<a href="#" class="btn btn-sm btn-icon btn-light  text-primary"  data-toggle="sidebar-right" data-target=".sidebar-right"><i class="feather feather-x"></i> </a>--}}
    {{--					</div>--}}
    {{--				</div>--}}
    {{--				<div class="">--}}
    {{--					<div class="list-group-item  align-items-center border-0">--}}
    {{--						<div class="d-flex">--}}
    {{--							<span class="avatar avatar-lg brround mr-3" style="background-image: url(../../assets/images/users/4.jpg)"></span>--}}
    {{--							<div class="mt-1">--}}
    {{--								<a href="#" class="font-weight-semibold fs-16">Liam <span class="text-muted font-weight-normal">Sent Message</span></a>--}}
    {{--								<span class="clearfix"></span>--}}
    {{--								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>30 mins ago</span>--}}
    {{--							</div>--}}
    {{--							<div class="ml-auto">--}}
    {{--								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
    {{--									<span class="feather feather-more-horizontal"></span>--}}
    {{--								</a>--}}
    {{--								<ul class="dropdown-menu dropdown-menu-left" role="menu">--}}
    {{--									<li><a href="#"><i class="feather feather-eye ml-2"></i>View</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-plus-circle ml-2"></i>Add</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-trash-2 ml-2"></i>Remove</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-settings ml-2"></i>More</a></li>--}}
    {{--								</ul>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--					<div class="list-group-item  align-items-center  border-bottom">--}}
    {{--						<div class="d-flex">--}}
    {{--							<span class="avatar avatar-lg brround mr-3" style="background-image: url(../../assets/images/users/10.jpg)"></span>--}}
    {{--							<div class="mt-1">--}}
    {{--								<a href="#" class="font-weight-semibold fs-16">Paul<span class="text-muted font-weight-normal"> commented on you post</span></a>--}}
    {{--								<span class="clearfix"></span>--}}
    {{--								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>1 hour ago</span>--}}
    {{--							</div>--}}
    {{--							<div class="ml-auto">--}}
    {{--								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
    {{--									<span class="feather feather-more-horizontal"></span>--}}
    {{--								</a>--}}
    {{--								<ul class="dropdown-menu dropdown-menu-left" role="menu">--}}
    {{--									<li><a href="#"><i class="feather feather-eye ml-2"></i>View</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-plus-circle ml-2"></i>Add</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-trash-2 ml-2"></i>Remove</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-settings ml-2"></i>More</a></li>--}}
    {{--								</ul>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--					<div class="list-group-item  align-items-center  border-bottom">--}}
    {{--						<div class="d-flex">--}}
    {{--							<span class="avatar avatar-lg brround mr-3 bg-pink-transparent"><span class="feather feather-shopping-cart"></span></span>--}}
    {{--							<div class="mt-1">--}}
    {{--								<a href="#" class="font-weight-semibold fs-16">James<span class="text-muted font-weight-normal"> Order Placed</span></a>--}}
    {{--								<span class="clearfix"></span>--}}
    {{--								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>1 day ago</span>--}}
    {{--							</div>--}}
    {{--							<div class="ml-auto">--}}
    {{--								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
    {{--									<span class="feather feather-more-horizontal"></span>--}}
    {{--								</a>--}}
    {{--								<ul class="dropdown-menu dropdown-menu-left" role="menu">--}}
    {{--									<li><a href="#"><i class="feather feather-eye ml-2"></i>View</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-plus-circle ml-2"></i>Add</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-trash-2 ml-2"></i>Remove</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-settings ml-2"></i>More</a></li>--}}
    {{--								</ul>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--					<div class="list-group-item  align-items-center  border-bottom">--}}
    {{--						<div class="d-flex">--}}
    {{--							<span class="avatar avatar-lg brround mr-3" style="background-image: url(../../assets/images/users/9.jpg)">--}}
    {{--								<span class="avatar-status bg-green"></span>--}}
    {{--							</span>--}}
    {{--							<div class="mt-1">--}}
    {{--								<a href="#" class="font-weight-semibold fs-16">Diane<span class="text-muted font-weight-normal"> New Message Received</span></a>--}}
    {{--								<span class="clearfix"></span>--}}
    {{--								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>1 day ago</span>--}}
    {{--							</div>--}}
    {{--							<div class="ml-auto">--}}
    {{--								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
    {{--									<span class="feather feather-more-horizontal"></span>--}}
    {{--								</a>--}}
    {{--								<ul class="dropdown-menu dropdown-menu-left" role="menu">--}}
    {{--									<li><a href="#"><i class="feather feather-eye ml-2"></i>View</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-plus-circle ml-2"></i>Add</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-trash-2 ml-2"></i>Remove</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-settings ml-2"></i>More</a></li>--}}
    {{--								</ul>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--					<div class="list-group-item  align-items-center  border-bottom">--}}
    {{--						<div class="d-flex">--}}
    {{--							<span class="avatar avatar-lg brround mr-3" style="background-image: url(../../assets/images/users/5.jpg)">--}}
    {{--								<span class="avatar-status bg-muted"></span>--}}
    {{--							</span>--}}
    {{--							<div class="mt-1">--}}
    {{--								<a href="#" class="font-weight-semibold fs-16">Vinny<span class="text-muted font-weight-normal"> shared your post</span></a>--}}
    {{--								<span class="clearfix"></span>--}}
    {{--								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>2 days ago</span>--}}
    {{--							</div>--}}
    {{--							<div class="ml-auto">--}}
    {{--								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
    {{--									<span class="feather feather-more-horizontal"></span>--}}
    {{--								</a>--}}
    {{--								<ul class="dropdown-menu dropdown-menu-left" role="menu">--}}
    {{--									<li><a href="#"><i class="feather feather-eye ml-2"></i>View</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-plus-circle ml-2"></i>Add</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-trash-2 ml-2"></i>Remove</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-settings ml-2"></i>More</a></li>--}}
    {{--								</ul>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--					<div class="list-group-item  align-items-center  border-bottom">--}}
    {{--						<div class="d-flex">--}}
    {{--							<span class="avatar avatar-lg brround mr-3 bg-primary-transparent">M</span>--}}
    {{--							<div class="mt-1">--}}
    {{--								<a href="#" class="font-weight-semibold fs-16">Mack<span class="text-muted font-weight-normal"> your admin lanuched</span></a>--}}
    {{--								<span class="clearfix"></span>--}}
    {{--								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>1 week ago</span>--}}
    {{--							</div>--}}
    {{--							<div class="ml-auto">--}}
    {{--								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
    {{--									<span class="feather feather-more-horizontal"></span>--}}
    {{--								</a>--}}
    {{--								<ul class="dropdown-menu dropdown-menu-left" role="menu">--}}
    {{--									<li><a href="#"><i class="feather feather-eye ml-2"></i>View</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-plus-circle ml-2"></i>Add</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-trash-2 ml-2"></i>Remove</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-settings ml-2"></i>More</a></li>--}}
    {{--								</ul>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--					<div class="list-group-item  align-items-center  border-bottom">--}}
    {{--						<div class="d-flex">--}}
    {{--							<span class="avatar avatar-lg brround mr-3" style="background-image: url(../../assets/images/users/12.jpg)">--}}
    {{--								<span class="avatar-status bg-green"></span>--}}
    {{--							</span>--}}
    {{--							<div class="mt-1">--}}
    {{--								<a href="#" class="font-weight-semibold fs-16">Vinny<span class="text-muted font-weight-normal"> shared your post</span></a>--}}
    {{--								<span class="clearfix"></span>--}}
    {{--								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>04 Jan 2021 1:56 Am</span>--}}
    {{--							</div>--}}
    {{--							<div class="ml-auto">--}}
    {{--								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
    {{--									<span class="feather feather-more-horizontal"></span>--}}
    {{--								</a>--}}
    {{--								<ul class="dropdown-menu dropdown-menu-left" role="menu">--}}
    {{--									<li><a href="#"><i class="feather feather-eye ml-2"></i>View</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-plus-circle ml-2"></i>Add</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-trash-2 ml-2"></i>Remove</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-settings ml-2"></i>More</a></li>--}}
    {{--								</ul>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--					<div class="list-group-item  align-items-center  border-bottom">--}}
    {{--						<div class="d-flex">--}}
    {{--							<span class="avatar avatar-lg brround mr-3" style="background-image: url(../../assets/images/users/8.jpg)">	</span>--}}
    {{--							<div class="mt-1">--}}
    {{--								<a href="#" class="font-weight-semibold fs-16">Anna<span class="text-muted font-weight-normal"> likes your post</span></a>--}}
    {{--								<span class="clearfix"></span>--}}
    {{--								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>25 Dec 2020 11:25 Am</span>--}}
    {{--							</div>--}}
    {{--							<div class="ml-auto">--}}
    {{--								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
    {{--									<span class="feather feather-more-horizontal"></span>--}}
    {{--								</a>--}}
    {{--								<ul class="dropdown-menu dropdown-menu-left" role="menu">--}}
    {{--									<li><a href="#"><i class="feather feather-eye ml-2"></i>View</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-plus-circle ml-2"></i>Add</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-trash-2 ml-2"></i>Remove</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-settings ml-2"></i>More</a></li>--}}
    {{--								</ul>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--					<div class="list-group-item  align-items-center  border-bottom">--}}
    {{--						<div class="d-flex">--}}
    {{--							<span class="avatar avatar-lg brround mr-3" style="background-image: url(../../assets/images/users/14.jpg)">	</span>--}}
    {{--							<div class="mt-1">--}}
    {{--								<a href="#" class="font-weight-semibold fs-16">Kimberly<span class="text-muted font-weight-normal"> Completed one task</span></a>--}}
    {{--								<span class="clearfix"></span>--}}
    {{--								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>24 Dec 2020 9:30 Pm</span>--}}
    {{--							</div>--}}
    {{--							<div class="ml-auto">--}}
    {{--								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
    {{--									<span class="feather feather-more-horizontal"></span>--}}
    {{--								</a>--}}
    {{--								<ul class="dropdown-menu dropdown-menu-left" role="menu">--}}
    {{--									<li><a href="#"><i class="feather feather-eye ml-2"></i>View</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-plus-circle ml-2"></i>Add</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-trash-2 ml-2"></i>Remove</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-settings ml-2"></i>More</a></li>--}}
    {{--								</ul>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--					<div class="list-group-item  align-items-center  border-bottom">--}}
    {{--						<div class="d-flex">--}}
    {{--							<span class="avatar avatar-lg brround mr-3" style="background-image: url(../../assets/images/users/3.jpg)">	</span>--}}
    {{--							<div class="mt-1">--}}
    {{--								<a href="#" class="font-weight-semibold fs-16">Rina<span class="text-muted font-weight-normal"> your account has Updated</span></a>--}}
    {{--								<span class="clearfix"></span>--}}
    {{--								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>28 Nov 2020 7:16 Am</span>--}}
    {{--							</div>--}}
    {{--							<div class="ml-auto">--}}
    {{--								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
    {{--									<span class="feather feather-more-horizontal"></span>--}}
    {{--								</a>--}}
    {{--								<ul class="dropdown-menu dropdown-menu-left" role="menu">--}}
    {{--									<li><a href="#"><i class="feather feather-eye ml-2"></i>View</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-plus-circle ml-2"></i>Add</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-trash-2 ml-2"></i>Remove</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-settings ml-2"></i>More</a></li>--}}
    {{--								</ul>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--					<div class="list-group-item  align-items-center  border-bottom">--}}
    {{--						<div class="d-flex">--}}
    {{--							<span class="avatar avatar-lg brround mr-3 bg-success-transparent">J</span>--}}
    {{--							<div class="mt-1">--}}
    {{--								<a href="#" class="font-weight-semibold fs-16">Julia<span class="text-muted font-weight-normal"> Prepare for Presentation</span></a>--}}
    {{--								<span class="clearfix"></span>--}}
    {{--								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>18 Nov 2020 11:55 Am</span>--}}
    {{--							</div>--}}
    {{--							<div class="ml-auto">--}}
    {{--								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
    {{--									<span class="feather feather-more-horizontal"></span>--}}
    {{--								</a>--}}
    {{--								<ul class="dropdown-menu dropdown-menu-left" role="menu">--}}
    {{--									<li><a href="#"><i class="feather feather-eye ml-2"></i>View</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-plus-circle ml-2"></i>Add</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-trash-2 ml-2"></i>Remove</a></li>--}}
    {{--									<li><a href="#"><i class="feather feather-settings ml-2"></i>More</a></li>--}}
    {{--								</ul>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--				</div>--}}
    {{--			</div>--}}
    {{--			<!--/Sidebar-right-->--}}

    <!--Change password Modal -->
    <div class="modal fade" id="changepasswordnmodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @error('password')

                <p class="text text-danger">{{$message}}</p>

                @enderror
                <form method="post" action="{{route('admin.profile.change_password')}}">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">رمز فعلی</label>
                            <input type="password" class="form-control" name="current_password"
                                   placeholder="current_password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">رمز جدید</label>
                            <input type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">تکرار رمز جدید</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                   placeholder="password_confirmation">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-outline-primary" data-dismiss="modal">بستن</a>
                        <button class="btn btn-primary">ارسال</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- End Change password Modal  -->

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Back to top -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>


<!-- Bootstrap4 js-->
<script src="{{asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!--Othercharts js-->
{{--        <script src="{{asset('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>--}}

<!-- Circle-progress js-->
<script src="{{asset('assets/plugins/circle-progress/circle-progress.min.js')}}"></script>

<!--Sidemenu js-->
{{--        <script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>--}}

<!-- P-scroll js-->
<script src="{{asset('assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
<script src="{{asset('assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>

<!--Sidebar js-->
<script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>


<!-- Select2 js -->
{{--        <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>--}}

<!-- Custom js-->
<script src="{{asset('assets/js/custom.js')}}"></script>

<script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('datetimepicker/dist/jquery.md.bootstrap.datetimepicker.js')}}"></script>

<script type="text/javascript" src="{{asset('richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src='{{asset('richtexteditor/plugins/all_plugins.js')}}'></script>


{{--    sortable js package    --}}
<script type="text/javascript" src='{{asset('Sortable-master/Sortable.js')}}'></script>
<script type="text/javascript" src='{{asset('Sortable-master/modular/sortable.core.esm.js')}}'></script>
<script type="text/javascript" src='{{asset('Sortable-master/modular/sortable.complete.esm.js')}}'></script>
<script src="{{asset('formjs/require.js')}}"></script>





<script>

    var editor1 = new RichTextEditor("#editor_body");


</script>

<script>

    $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })

</script>


<script>


    // const dtp1Instance = new MdsPersianDateTimePicker(document.getElementById('dtp1'), {
    //     Placement: 'bottom', // default is 'bottom'
    //     Trigger: 'focus', // default is 'focus',
    //     EnableTimePicker: true, // default is true,
    //     TargetSelector: '', // default is empty,
    //     GroupId: '', // default is empty,
    //     ToDate: false, // default is false,
    //     FromDate: false, // default is false,
    // });

    $('#published_at').MdPersianDateTimePicker({

        targetDateSelector: '#published_date',
        targetTextSelector: '#published_at',
        englishNumber: false,
        dateFormat: 'yyyy-MM-dd',
        textFormat: 'yyyy-MM-dd',
        groupId: 'rangeSelector1'

    })

</script>

<script>


    $('#start_date').MdPersianDateTimePicker({

        targetDateSelector: '#s_date',
        targetTextSelector: '#start_date',
        englishNumber: false,
        dateFormat: 'yyyy-MM-dd',
        textFormat: 'yyyy-MM-dd',
        groupId: 'rangeSelector1'

    })

</script>


<script>


    $('#end_date').MdPersianDateTimePicker({

        targetDateSelector: '#e_date',
        targetTextSelector: '#end_date',
        englishNumber: false,
        dateFormat: 'yyyy-MM-dd',
        textFormat: 'yyyy-MM-dd',
        groupId: 'rangeSelector1'

    })

</script>


<script>


    var el = document.getElementById('items');
    var sortable = new Sortable(el, {
        animation: 150,
        ghostClass: 'blue-background-class',
        delay: 4, // time in milliseconds to define when the sorting should start
        onEnd: function (evt) {

            saveChanges();

        }

    });

    function saveChanges() {

        let a = sortable.toArray();
        let b = a.map((item) => eval(item));

        $.ajax({

            {{--_token: '{{csrf_token()}}',--}}
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '{{route('admin.menuitem.reorder')}}',
            data: {'menu': b},
            datatype: 'json',
            success: function () {

                console.log('success');
            }
        })

    }

</script>


<script>
    $('#linkable_type').change(function () {
        let val = $(this).val();

        if (val) {


            $('#link').attr('disabled', 'disabled')
            $('#linkable_id').removeAttr('disabled')



        } else {

            $('#linkable_id').attr('disabled', 'disabled')
            $('#link').removeAttr('disabled')

        }


    })


</script>


<script>
    $('#linkable_type_edit').change(function () {
        let val = $(this).val();

        if (val) {

            $('#link_edit').attr('disabled','disabled')
            $('#linkable_id_edit').removeAttr('disabled')


        } else {

            $('#linkable_id_edit').attr('disabled','disabled')
            $('#link_edit').removeAttr('disabled')

        }


    })


</script>

<script>
    $(document).ready(function() {
        $('.ajax-link').click(function(e) {
            e.preventDefault(); // Prevent the default action of the anchor tag

            var valueToSend = $(this).data('value'); // Get the value from 'data-value' attribute
            console.log(valueToSend);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST', // Change it to 'GET' or 'POST' as per your route requirements
                url: '{{ route("admin.setting.destroy") }}',
                data: {
                    value: valueToSend
                },
                success: function() {

                    setTimeout(function() {
                        location.reload();
                    },); // Refresh after 1 second
                },

            });
        });
    });

</script>




</body>
</html>
