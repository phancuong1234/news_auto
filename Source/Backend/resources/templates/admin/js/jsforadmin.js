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
    //ajax chart
    $.ajax({
        url : '/admin/ajax/chart/get-number-user-every-month',
        method : 'GET',
        datatype: "json",
        success : function(data){
            setChart(JSON.parse(data), 'line', Lang.get('messages.name_chart.user') , 'user-chart', 0 ,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
        }
    });
    $.ajax({
    url : '/admin/ajax/chart/get-number-view-every-month',
    method : 'GET',
    datatype: "json",
    success : function(data){ 
        setChart(JSON.parse(data), 'bar', Lang.get('messages.name_chart.view'), 'view-chart', 0,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
    }
    });
    $.ajax({
    url : '/admin/ajax/chart/get-number-Comment-every-month',
    method : 'GET',
    datatype: "json",
    success : function(data){ 
        setChart(JSON.parse(data), 'line', Lang.get('messages.name_chart.comment'), 'Comment-chart', 0,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
    }
    });
    $.ajax({
    url : '/admin/ajax/chart/get-count-article-every-month',
    method : 'GET',
    datatype: "json",
    success : function(data){ 
        setChart(JSON.parse(data), 'bar', Lang.get('messages.name_chart.article'), 'Article-chart', 0,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
    }
    });
    //event change chart
    $('#select-cate').change(function(){
        $("canvas#Article-chart").remove();
        $("div#panel-body").append('<canvas id="Article-chart"></canvas>');
        var article = $('#select-cate').val();
            $.ajax({
                url : "/admin/ajax/chart/get-count-article-every-month/" + article,
                method : 'GET',
                datatype: "json",
                success : function(data){ 
                    setChart(JSON.parse(data), 'line', Lang.get('messages.name_chart.articlebycate'), 'Article-chart', 0,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
                }
            });      
    });
    $("#select-month").change(function(){
      $("canvas#Comment-chart").remove();
      $("div#panel-body").append('<canvas id="Comment-chart"></canvas>');
      var month = $("#select-month").val();
        $.ajax({
          url: "/admin/ajax/chart/get-number-comment-by-month/" + month,
          method: "GET",
          datatype: "json",
          success: function(data){
              var data = JSON.parse(data);
              var size = Objectsize(data);
              var dataOfCmt = [];
              var label_rows = [];
              if(size > 0){
                for(var i = 0; i < size; i++){
                  dataOfCmt[i] = data[i].total;
                  label_rows[i] = data[i].id_new;
                }
              }
              else {
                dataOfCmt = ['null','null','null','null','null','null','null','null','null','null'];
                label_rows = ['null','null','null','null','null','null','null','null','null','null'];
              }
  
              setChart(dataOfCmt, 'bar', Lang.get('messages.name_chart.commentmonth'), 'Comment-chart', label_rows,Lang.get('messages.name_chart.col_name'),Lang.get('messages.name_chart.row_name'));
          }
        });
    });
    CKEDITOR.replace('content');
});
function  Objectsize(obj){
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};
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
function setChart(data , type, name_label, id_chart , label_rows, col_name ,row_name){
    Chart.defaults.global.defaultFontColor = '#000000';
    Chart.defaults.global.defaultFontFamily = 'Arial';
    var lineChart = document.getElementById(id_chart);
    var myChart = new Chart(lineChart, {
        type: type,
        data: {
            labels: (label_rows != 0)?label_rows:["Jan", "Feb", "Mar", "Apr", "May", "June" , "July" , "Aug" , "Sept" , "Sept" , "Oct" , "Nov", "Dec"],
            datasets: [
                {
                    label: name_label,
                    data: data,
                    backgroundColor: 'rgba(0, 128, 128, 0.3)',
                    borderColor: 'rgba(0, 128, 128, 0.7)',
                    borderWidth: 1
                },
            ]
        },
        options: { 
            scales: {
              xAxes: [{
                  scaleLabel: {
                    display: true,
                    labelString: row_name
                  }
                }],
              yAxes: [{
                    ticks: {
                        beginAtZero:true,
                    },
                    scaleLabel: {
                      display: true,
                      labelString: col_name
                    },
                }]
            },
        }
    });
};
