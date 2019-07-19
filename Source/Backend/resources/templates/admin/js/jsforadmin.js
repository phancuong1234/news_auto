$(document).ready(function() {
    var btn = document.getElementById("btn-start-crawl");
    var btnCrawlRSS = document.getElementById("btn-start-crawl-by-rss");
    //loader event crawl
    var loader = {
        unload: function(){
            $("#screen-loader").css("display", "none");
            $("#bubblingG").css("display", "none");
            $("#text-wait").css("display", "none");
            $("#icon-success").css("display", "none");
            $("#screen-info").css("display", "none");
        },
        //loading
        load: function() {
            $("#screen-loader").css("display", "block");
            $("#bubblingG").css("display", "block");
            $("#text-wait").css("display", "block");
            $("#icon-success").css("display", "none");
            $("#screen-info").css("display", "none");
        },
        //Startet success Animation
        success: function(){
            $("#bubblingG").css("display", "none");
            $("#icon-success").css("display", "block");
            $("#icon-fail").css("display", "none");
            document.getElementById("text-status").innerHTML = Lang.get('messages.crawl.crawl-success');
            $("#text-status").css("color", "green");
            setTimeout(() => {
                $("#screen-info").css("display", "block");
            }, 1000);
        },
        //Startet error Animation
        error: function() {
            $("#bubblingG").css("display", "none");
            $("#icon-success").css("display", "none");
            $("#icon-fail").css("display", "block");
            document.getElementById("text-status").innerHTML = Lang.get('messages.crawl.crawl-fail');
            $("#text-status").css("color", "red");
            $('#btn-start-crawl').attr("disabled", false);
        }
    }
    // event crawl
    $('#btn-start-crawl').click(function(){
        if($('#btn-start-crawl').text().trim() == Lang.get('messages.button.start')){
            btn.innerHTML = Lang.get('messages.button.cancel');
            setTimeout(() => {
                loader.load();
                $('#btn-start-crawl').attr("disabled", true);
            }, 200);
            setTimeout(() => {
                ignore = $.ajax({
                    url: "/admin/crawl-auto", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                    method: "GET", // phương thức gửi dữ liệu.
                    success: function (data) { //dữ liệu nhận về
                        btn.innerHTML = Lang.get('messages.button.start');
                        $('#info-of-crawl').html(data); //nhận dữ liệu dạng html và gán vào thẻ có id là info-of-crawl
                        loader.success();
                        $('#btn-start-crawl').attr("disabled", false);
                    },
                    error: function () {
                        loader.error();
                        btn.innerHTML = Lang.get('messages.button.start');
                        $('#btn-start-crawl').attr("disabled", false);
                    },
                });
            }, 2000);
        }
        else {
            loader.error();
            btn.innerHTML = Lang.get('messages.button.start');
        }
    });
    //crawl rss
    $("#crawl-xml").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var url = form.attr('action');
        if($('#urlRSS').val().trim() != ''){
            if($('#btn-start-crawl-by-rss').val().trim() == Lang.get('messages.button.start')){
                btnCrawlRSS.value = Lang.get('messages.button.cancel');
                setTimeout(() => {
                    loader.load();
                    $('#btn-start-crawl-by-rss').attr("disabled", true);
                }, 200);
                setTimeout(() => {
                    $.ajax({
                        type: form.attr('method'),
                        url: url,
                        data: form.serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            btnCrawlRSS.value = Lang.get('messages.button.start');
                            $('#screen-info').html(data);  // show response from the php script.
                            loader.success();
                            $('#btn-start-crawl-by-rss').attr("disabled", false);
                        },
                        error: function () {
                            loader.error();
                            btnCrawlRSS.value = Lang.get('messages.button.start');
                            $('#btn-start-crawl-by-rss').attr("disabled", false);
                        },
                    });
                }, 2000);
            }
            else {
                loader.error();
                btnCrawlRSS.value = Lang.get('messages.button.start');
            }
        }
    });
    //event show name file
    $('#image').on('change', function(e) {
        var fileName = e.target.files[0].name;
        document.getElementById('text_image').value = fileName;
        readURLPicTure(this);
    });
    //key up enter paginate
    $('#text-paginate-news').keyup(function(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            var number = $(this).val();
            var total = $('#total_page').val();
            if (number > total){
                window.location.href = "/admin/news?page=" + total;
            }
            else {
                window.location.href = "/admin/news?page=" + number;
            }
        }
    });
    $('#text-paginate-cate').keyup(function(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            var number = $(this).val();
            var total = parseInt($('#total_page').val());
            if (number > 0){
                if (number > total){
                    window.location.href = "/admin/categories?page=" + total;
                }
                else {
                    window.location.href = "/admin/categories?page=" + number;
                }
            }
        }
    });
    $('#text-paginate-comment').keyup(function(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            var number = $(this).val();
            var total = parseInt($('#total_page').val());
            if (number > 0) {
                if (number > total) {
                    window.location.href = "/admin/comments?page=" + total;
                } else {
                    window.location.href = "/admin/comments?page=" + number;
                }
            }
        }
    });
    $('#text-paginate-user').keyup(function(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            var number = $(this).val();
            var total = parseInt($('#total_page').val());
            if (number > 0) {
                if (number > total) {
                    window.location.href = "/admin/ModManager?page=" + total;
                } else {
                    window.location.href = "/admin/ModManager?page=" + number;
                }
            }
        }
    });
    $('#text-paginate-viewer').keyup(function(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            var number = $(this).val();
            var total = parseInt($('#total_page').val());
            if (number > 0) {
                if (number > total) {
                    window.location.href = "/admin/ViewerManager?page=" + total;
                } else {
                    window.location.href = "/admin/ViewerManager?page=" + number;
                }
            }
        }
    });
    $('#text-paginate-rss').keyup(function(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            var number = $(this).val();
            var total = parseInt($('#total_page').val());
            if (number > 0) {
                if (number > total) {
                    window.location.href = "/admin/rss?page=" + total;
                } else {
                    window.location.href = "/admin/rss?page=" + number;
                }
            }
        }
    });
    $('#text-paginate-activity').keyup(function(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            var number = $(this).val();
            var total = parseInt($('#total_page').val());
            if (number > 0) {
                if (number > total) {
                    window.location.href = "/admin/activities?page=" + total;
                } else {
                    window.location.href = "/admin/activities?page=" + number;
                }
            }
        }
    });
    $('#text-paginate-notify').keyup(function(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            var number = $(this).val();
            var total = parseInt($('#total_page').val());
            if (number > 0) {
                if (number > total) {
                    window.location.href = "/admin/all-notify?page=" + total;
                } else {
                    window.location.href = "/admin/all-notify?page=" + number;
                }
            }
        }
    });
    //btn change picture
    $imgSrc = $('#img-preview').attr('src');
    $('#btnChangePicture').on('click', function () {
        if (!$('#btnChangePicture').hasClass('changing')) {
            $('#file').click();
        }
        else {
            $('#changeAva').submit();
        }
    });
    $('#file').on('change', function () {
        readURLPicTure(this);
        $('#btnChangePicture').addClass('changing');
        $('#btnChangePicture').attr('value', Lang.get('button.confirm'));
        $('#btnDiscard').removeClass('d-none');
    });
    $('#btnDiscard').on('click', function () {
        $('#btnChangePicture').removeClass('changing');
        $('#btnChangePicture').attr('value', Lang.get('button.change'));
        $('#btnDiscard').addClass('d-none');
        $('#img-preview').attr('src', $imgSrc);
        $('#file').val('');
    });
    $('#btnChangeInfo').on('click', function () {
        if($('#btnChangeInfo').val().trim() == Lang.get('button.save')){
            $('#changeInfo').submit();
        }
        else {
            $.ajax({
                url: '/ajax/profile',
                method: "GET",
                success: function(data) {
                    $('#basicInfo').html(data);
                    $('.datepicker').datepicker({
                        format: 'dd-mm-yyyy',
                        endDate: '+0d',
                        todayHighlight: true,
                        autoclose: true,
                    });
                    $('#btnChangeInfo').val(Lang.get('button.save'));
                },
                error: function () {
                    alert(Lang.get('messages.user.edit.fail'));
                }
            });
        }
    });
    // date picker
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        endDate: '+0d',
        todayHighlight: true,
        autoclose: true,
    });
    $('.datepicker-end-date').datepicker({
        format: 'dd-mm-yyyy',
        startDate: '+0d',
        todayHighlight: true,
        autoclose: true,
    });
    CKEDITOR.replace('content');
    $('.selectpicker').selectpicker();
});
// preview img
function readURLPicTure(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-preview').attr('src', e.target.result);
            $('#img-preview-tag-a').attr('href', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
//event lock or active
function changeStatusCmt(id){
    const flag = confirm(Lang.get('messages.confirm_change_status'));
    if (flag === true) {
        if ($('#event-lock-active').text().trim() == 'Active'){
            ajaxChangeStatus(id);
        }
        else {
            ajaxChangeStatus(id);
        }
    }
}
//ajax change status
function ajaxChangeStatus(id){
    $.ajaxSetup({
        beforeSend: function(xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        },
    });
    $.ajax({
        url: '/admin/comments/' + id,
        method: "PATCH",
        success: function () {
            alert(Lang.get('messages.update_status_success'));
            $('#event-lock-active').removeClass('badge-gradient-success');
            $('#event-lock-active').addClass('badge-gradient-danger');
            document.getElementById("event-lock-active").innerHTML = "Lock";
        },
        error: function () {
            alert(Lang.get('messages.update_status_fail'));
            $('#event-lock-active').removeClass('badge-gradient-danger');
            $('#event-lock-active').addClass('badge-gradient-success');
            document.getElementById("event-lock-active").innerHTML = "Active";
        }
    });
}
//confirm khi del 1 bản ghi
function submitFormDeleteHard(id) {
    const flag = confirm(Lang.get('validation_admin.confirm_del'));
    if (flag === true) {
        document.getElementById(id).submit();
    }
};
function submitFormAcceptNews(id) {
    const flag = confirm(Lang.get('messages.confirm.confirm'));
    if (flag === true) {
        document.getElementById(id).submit();
    }
}
function thisFileUpload() {
    document.getElementById("image").click();
};
function liveSearch(type){
    var query = document.getElementById('search').value;
    //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
    if(query.trim() != '') {
        if (type == 'category') { // kiểm tra nếu search danh mục thì thực hiện lệnh bên dưới
            $.ajax({
                url: "/admin/categories/search/" + query, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "GET", // phương thức gửi dữ liệu.
                success: function (data) { //dữ liệu nhận về
                    $('#category').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                }
            });
        }
        if (type == 'news'){
            $.ajax({
                url: "/admin/news/search/keyword=" + query+ "/type=active", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "GET", // phương thức gửi dữ liệu.
                success: function (data) { //dữ liệu nhận về
                    $('#news').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                }
            });
        }
        if (type == 'comment'){
            $.ajax({
                url: "/admin/comments/search/" + query, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "GET", // phương thức gửi dữ liệu.
                success: function (data) { //dữ liệu nhận về
                    $('#comment').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                }
            });
        }
        if (type == 'news-pending'){
            $.ajax({
                url: "/admin/news/search/keyword=" + query+ "/type=pending", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "GET", // phương thức gửi dữ liệu.
                success: function (data) { //dữ liệu nhận về
                    $('#news').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                }
            });
        }
        if (type == 'users'){
            $.ajax({
                url: "/admin/users/search/" + query, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "GET", // phương thức gửi dữ liệu.
                success: function (data) { //dữ liệu nhận về
                    $('#users').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là Users
                }
            });
        }
        if (type == 'viewer'){
            $.ajax({
                url: "/admin/viewer/search/" + query, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "GET", // phương thức gửi dữ liệu.
                success: function (data) { //dữ liệu nhận về
                    $('#viewer').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là Users
                }
            });
        }
        if (type == 'rss'){
            $.ajax({
                url: "/admin/rss/search/" + query, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "GET", // phương thức gửi dữ liệu.
                success: function (data) { //dữ liệu nhận về
                    $('#rss').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là Users
                }
            });
        }
        if (type == 'activities'){
            $.ajax({
                url: "/admin/activities/search/" + query, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "GET", // phương thức gửi dữ liệu.
                success: function (data) { //dữ liệu nhận về
                    $('#activities').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là Users
                }
            });
        }
    }
};
$("#show-change-pass").click(function(){
    $("#show-change-pass").hide();
    $('#showpass').show();    
    $('#showrepass').show();
});
$("#close").click(function(){
    $("#show-change-pass").show();
    $('#showpass').hide();
    $('#showrepass').hide();
});
function maskAsRead(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/admin/read-notify/" + id,
        method: "PATCH",
    });
}
