<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VIETSOZ</title>
    {{ Html::style(asset('/templates/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css')) }}
    {{ Html::style(asset('/templates/admin/vendors/css/vendor.bundle.base.css')) }}
    {{ Html::style(asset('/templates/admin/css/style.css')) }}
    {{ Html::style(asset('/templates/admin/images/favicon.png')) }}
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
            <div class="row flex-grow">
                <div class="col-lg-7 mx-auto text-white">
                    <div class="row align-items-center d-flex flex-row">
                        <div class="col-lg-6 text-lg-right pr-lg-4">
                            <h1 class="display-1 mb-0">500</h1>
                        </div>
                        <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                            <h2>Xin Lỗi!</h2>
                            <h3 class="font-weight-light">Trang bạn tìm kiếm không tìm thấy.</h3>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center mt-xl-2">
                            <a class="text-white font-weight-medium" href="javascript:history.back()">Trở về trang trước</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 mt-xl-2">
                            <p class="text-white font-weight-medium text-center">Copyright &copy; 2018  All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
{{ Html::script(asset('/templates/admin/vendors/js/vendor.bundle.base.js')) }}
{{ Html::script(asset('/templates/admin/vendors/js/vendor.bundle.addons.js')) }}
{{ Html::script(asset('/templates/admin/js/off-canvas.js')) }}
{{ Html::script(asset('/templates/admin/js/misc.js')) }}
<!-- endinject -->
</body>

</html>
