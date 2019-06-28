$( document ).ready(function() {
    //ajax chart
    $.ajax({
        url : '/admin/ajax/chart/get-number-user-every-month',
        method : 'GET',
        datatype: "json",
        success : function(data){
            var userByMonth = JSON.parse(data) ;
            var userByMonthArr = [];
                for(let i = 1; i <= 12; i++){
                    if(userByMonth[i]==null){
                        userByMonthArr.push(0);      
                    }else{
                        userByMonthArr.push(userByMonth[i]);
                    }
                }
            setChart(userByMonthArr, 'line', Lang.get('messages.name_chart.user') , 'user-chart', 0 ,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
        }
    });
    $.ajax({
        url : '/admin/ajax/chart/get-number-view-every-month',
        method : 'GET',
        datatype: "json",
        success : function(data){
            var viewByMonth = JSON.parse(data) ;
            var viewByMonthArr = [];
                for(let i = 1; i <= 12; i++){
                    if(viewByMonth[i]==null){
                        viewByMonthArr.push(0);      
                    }else{
                        viewByMonthArr.push(viewByMonth[i]);
                    }
                }
            setChart(viewByMonthArr, 'bar', Lang.get('messages.name_chart.view'), 'view-chart', 0,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
        }
    });
    $.ajax({
        url : '/admin/ajax/chart/get-number-Comment-every-month',
        method : 'GET',
        datatype: "json",
        success : function(data){
            var cmtByMonth = JSON.parse(data) ;
            var cmtByMonthArr = [];
                for(let i = 1; i <= 12; i++){
                    if(cmtByMonth[i]==null){
                        cmtByMonthArr.push(0);      
                    }else{
                        cmtByMonthArr.push(cmtByMonth[i]);
                    }
                }
            setChart(cmtByMonthArr, 'line', Lang.get('messages.name_chart.comment'), 'Comment-chart', 0,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
        }
    });
    $.ajax({
        url : '/admin/ajax/chart/get-count-article-every-month',
        method : 'GET',
        datatype: "json",
        success : function(data){
            var artByMonth = JSON.parse(data) ;
            var artByMonthArr = [];
                for(let i = 1; i <= 12; i++){
                    if(artByMonth[i]==null){
                        artByMonthArr.push(0);      
                    }else{
                        artByMonthArr.push(artByMonth[i]);
                    }
                } 
            setChart(artByMonthArr, 'bar', Lang.get('messages.name_chart.article'), 'Article-chart', 0,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
        }
    });
    $.ajax({
        url : '/admin/ajax/chart/get-article-rate',
        method : 'GET',
        datatype: "json",
        success : function(data){
            var dataFormat = JSON.parse(data);
            var arr = [];
            var name = [];
            for(var i = 0; i < Objectsize(dataFormat); i++){
                var sumAll = dataFormat[i].countall;
                var cate = dataFormat[i].total;
                arr[i] = (cate/sumAll)*100;
                name[i] = dataFormat[i].name;
            }  
            setChart(arr, 'pie', Lang.get('messages.name_chart.articlerate'), 'Article-rate-chart', name, Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
        }
    });
    $.ajax({
        url : '/admin/ajax/chart/get-top-view-in-year',
        method : 'GET',
        datatype: "json",
        success : function(data){
            var dataFormat = JSON.parse(data);
            var line = [];
            var id = [];
            for(var i = 0; i < Objectsize(dataFormat); i++){
                line[i] = dataFormat[i].view;
                id[i] = dataFormat[i].id;
            }  
            setChart(line, 'bar', Lang.get('messages.name_chart.topview'), 'Article-top-view-chart', id ,Lang.get('messages.name_chart.col_name'),Lang.get('messages.name_chart.row_name'));
        }
    });
    $.ajax({
        url : '/admin/ajax/chart/get-top-btv-in-this-year',
        method : 'GET',
        datatype: "json",
        success : function(data){
            var dataFormat = JSON.parse(data);
            var line = [];
            var name = [];
            for(var i = 0; i < Objectsize(dataFormat); i++){
                line[i] = dataFormat[i].total;
                name[i] = dataFormat[i].name;
            }  
            setChart(line, 'bar', Lang.get('messages.name_chart.topMod'), 'top-btv-chart', name ,Lang.get('messages.name_chart.col_name'),Lang.get('messages.name_chart.row_name_Top_Mod'));
        }
    });
    $('#select-cate').change(function(){
        $("canvas#Article-chart").remove();
        $("div#panel-body").append('<canvas id="Article-chart"></canvas>');
        var article = $('#select-cate').val();
            $.ajax({
                url : "/admin/ajax/chart/get-count-article-by-category/" + article,
                method : 'GET',
                datatype: "json",
                success : function(data){
                    var artByCate = JSON.parse(data) ;
                    var artByCateArr = [];
                        for(let i = 1; i <= 12; i++){
                            if(artByCate[i]==null){
                                artByCateArr.push(0);      
                            }else{
                                artByCateArr.push(artByCate[i]);
                            }
                        }
                    setChart(artByCateArr, 'line', Lang.get('messages.name_chart.articlebycate'),'Article-chart', 0,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
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
  
              setChart(dataOfCmt, 'bar', Lang.get('messages.name_chart.commentmonth'), 'Comment-chart', label_rows ,Lang.get('messages.name_chart.col_name'),Lang.get('messages.name_chart.row_name'));
          }
        });
    });
});
function  Objectsize(obj){
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

function setChart(data , type, name_label, id_chart , label_rows, col_name ,row_name){
    if(type == 'pie'){
        Chart.defaults.global.defaultFontColor = '#000000';
        Chart.defaults.global.defaultFontFamily = 'Arial';
        var lineChart = document.getElementById(id_chart);
        var myChart = new Chart(lineChart, {
            type: type,
            data: {
                labels: label_rows,
                datasets: [{
                    label: name_label,
                    data: data,
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.5)',
                      'rgba(54, 162, 235, 0.5)',
                      'rgba(255, 206, 86, 0.5)',
                      'rgba(75, 192, 192, 0.5)',
                      'rgba(153, 102, 255, 0.5)',
                      'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                    ],
                }],
            },
            options: {
                responsive: true,
                animation: {
                  animateScale: true,
                  animateRotate: true
                }
            },
        });
    }
    else {
        Chart.defaults.global.defaultFontColor = '#000000';
        Chart.defaults.global.defaultFontFamily = 'Arial';
        var lineChart = document.getElementById(id_chart);
        var myChart = new Chart(lineChart, {
            type: type,
            data: {
                labels: (label_rows != 0)?label_rows:["Jan", "Feb", "Mar", "Apr", "May", "June" , "July" , "Aug" , "Sept" , "Oct" , "Nov", "Dec"],
                datasets: [
                    {
                        label: name_label,
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                          ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                          ],
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
    }
}