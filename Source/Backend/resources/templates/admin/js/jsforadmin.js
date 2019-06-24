$( document ).ready(function() {
    var btn = document.getElementById("btn-start-crawl");
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
            // $('#btn-start-crawl').attr("disabled", true);
        },
        //Startet success Animation
        success: function(){
            btn.innerHTML = Lang.get('messages.button.start');
            $("#bubblingG").css("display", "none");
            $("#icon-success").css("display", "block");
            $("#icon-fail").css("display", "none");
            document.getElementById("text-status").innerHTML = Lang.get('messages.crawl.crawl-success');
            $("#text-status").css("color", "green");
            setTimeout(() => {
                $("#screen-info").css("display", "block");
            }, 1000);
            $('#btn-start-crawl').attr("disabled", false);

        },
        //Startet error Animation
        error: function() {
            $("#bubblingG").css("display", "none");
            $("#icon-success").css("display", "none");
            $("#icon-fail").css("display", "block");
            document.getElementById("text-status").innerHTML = Lang.get('messages.crawl.crawl-fail');
            $("#text-status").css("color", "red");
            $('#btn-start-crawl').attr("disabled", false);
            btn.innerHTML = Lang.get('messages.button.start');
        }
    }
    // event crawl
    $('#btn-start-crawl').click(function(){
        if($('#btn-start-crawl').text().trim() == Lang.get('messages.button.start')){
            btn.innerHTML = Lang.get('messages.button.cancel');
            setTimeout(() => {
                loader.load();
            }, 200);
            setTimeout(() => {
                ignore = $.ajax({
                    url: "/admin/crawl-auto", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                    method: "GET", // phương thức gửi dữ liệu.
                    success: function (data) { //dữ liệu nhận về
                        $('#info-of-crawl').html(data); //nhận dữ liệu dạng html và gán vào thẻ có id là info-of-crawl
                        loader.success();
                    },
                    error: function () {
                        loader.error();
                    },
                });
            }, 2000);
        }
        else {
            loader.error();
            btn.innerHTML = Lang.get('messages.button.start');
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
            var number = $('#text-paginate-news').val();
            window.location.href = "/admin/news?page=" + number;
        }
    });
    $('#text-paginate-cate').keyup(function(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            var number = $('#text-paginate-cate').val();
            window.location.href = "/admin/categories?page=" + number;
        }
    });
    $('#text-paginate-comment').keyup(function(e) {
        var enterKey = 13;
        if (e.which == enterKey){
            var number = $('#text-paginate-comment').val();
            window.location.href = "/admin/comments?page=" + number;
        }
    });

    CKEDITOR.replace('content');
});

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
};
//ajax change status
function ajaxChangeStatus(id){
    $.ajaxSetup({
        beforeSend: function(xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        }
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
};
//readURLPicTure
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
//confirm khi del 1 bản ghi
function submitFormDeleteHard(id) {
    const flag = confirm(Lang.get('validation_admin.confirm_del'));
    if (flag === true) {
        document.getElementById(id).submit();
    }
};
function thisFileUpload() {
    document.getElementById("image").click();
};
function liveSearch(type){
    var query = document.getElementById('search').value;
    //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
    if(query != '') {
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
                url: "/admin/news/search/" + query, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
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
    }
}
