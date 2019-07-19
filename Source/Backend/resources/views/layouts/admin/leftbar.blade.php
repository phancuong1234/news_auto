<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="{{ route('dashboard.index') }}" class="nav-link">
                    <div class="nav-profile-image">
                        <img src="{{ (Auth::user()->image != 'no-image.png')? asset('images/avatars/'.Auth::user()->image):asset('templates/images/no-image.png') }}" alt="profile">
                        <span class="login-status online"></span> <!--change to offline or busy as needed-->
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">{{ Auth::user()->username }}</span>
                        <span class="text-secondary text-small">Admin</span>
                    </div>
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">BIểu Đồ</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-chart-bar menu-icon"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartUser')}}">Biếủ đồ người dùng</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartView')}}">Biểu đồ lượt xem</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartComment')}}">Biểu đồ bình luận</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartArticle')}}">Biểu đồ bài viết</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartArticleRate')}}">Tỉ lệ bài viết (danh mục)</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartArticleTopView')}}">TOP 10 bài viết (lượt xem)</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartTopMod')}}">TOP 10 mod </a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">Quản Lý Người Dùng</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-contacts menu-icon"></i>
                </a>
                <div class="collapse" id="ui-user">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('AdminManager')}}">Admin</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ModManager')}}">Mod</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ViewerManager')}}">Người đọc</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('users.create')}}">Thêm người dùng</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <span class="menu-title">Quản Lý Danh Mục</span>
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-news-basic" aria-expanded="false" aria-controls="ui-news-basic">
                    <span class="menu-title">Quản Lý Bài Viết</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-newspapermenu-icon"></i>
                </a>
                <div class="collapse" id="ui-news-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('news.index') }}">Danh Sách Bài Viết</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('pending.news') }}">Bài Viết Đang Chờ Duyệt</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('rss.index') }}">Quản Lý RSS</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('comments.index') }}">
                    <span class="menu-title">Quản Lý Bình Luận</span>
                    <i class="mdi mdi-comment-text-outline menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-crawl-basic" aria-expanded="false" aria-controls="ui-crawl-basic">
                    <span class="menu-title">Cập Nhật Từ Website</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-auto-upload menu-icon"></i>
                </a>
                <div class="collapse" id="ui-crawl-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('crawler.index') }}">Cập nhật tất cả data</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('index.crawl.xml') }}">Thu thập dữ liệu RSS</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    <div class="main-panel">
        <div class="content-wrapper">
