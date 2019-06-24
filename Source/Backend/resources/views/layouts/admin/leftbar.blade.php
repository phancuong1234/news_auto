<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="/" class="nav-link">
                    <div class="nav-profile-image">
                        <img src="{{ asset('/templates/admin/images/faces/face1.jpg') }}" alt="profile">
                        <span class="login-status online"></span> <!--change to offline or busy as needed-->
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">David Grey. H</span>
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
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartUser')}}">Total User</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartView')}}">Total View</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartComment')}}">Total Comment</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartArticle')}}">Total Article</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('ChartArticleRate')}}">Article Rate By Category</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <span class="menu-title">Quản Lý Người Dùng</span>
                    <i class="mdi mdi-contacts menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <span class="menu-title">Quản Lý Danh Mục</span>
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news.index') }}">
                    <span class="menu-title">Quản Lý Bài Viết</span>
                    <i class="mdi mdi mdi-newspaper menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('comments.index') }}">
                    <span class="menu-title">Quản Lý Bình Luận</span>
                    <i class="mdi mdi-comment-text-outline menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('crawler.index') }}">
                    <span class="menu-title">Cập Nhật Từ Website</span>
                    <i class="mdi mdi-auto-upload menu-icon"></i>
                </a>
            </li>
        </ul>
    </nav>
    <div class="main-panel">
        <div class="content-wrapper">
