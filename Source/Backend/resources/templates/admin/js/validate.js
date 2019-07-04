$(document).ready(function() {
    //validate các trường trong form add category
    $("#add-category").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            name_category: {
                required: true,
                minlength: 5,
                maxlength: 100,
                validateSpecial: true
            }
        },
        messages: {
            name_category: {
                required: Lang.get('validation_admin.category.required'),
                minlength: Lang.get('validation_admin.category.minlenght'),
                maxlength: Lang.get('validation_admin.category.maxlenght'),
            }
        },

        submitHandler: function(form) {
            form.submit();
        },
    });
    //validate các trường trong form edit category
    $("#edit-category").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            name_category: {
                required: true,
                minlength: 5,
                maxlength: 100,
                validateSpecial: true
            }
        },
        messages: {
            name_category: {
                required: Lang.get('validation_admin.category.required'),
                minlength: Lang.get('validation_admin.category.minlenght'),
                maxlength: Lang.get('validation_admin.category.maxlenght'),
            }
        },

        submitHandler: function(form) {
            form.submit();
        },
    });
    //validate các trường trong form add user
    $("#add-user").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            username: {
                required: true,
                minlength: 5,
                maxlength: 100,
                validateUsername:true,
            },
            fullname: {
                required: true,
                minlength: 8,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 8,
            },
            repass: {
                required: true,
                equalTo : "#password",
            },
        },
        messages: {
            username: {
                required: Lang.get('validation_admin.user.required.username'),
                minlength: Lang.get('validation_admin.user.minlenght.username'),
                maxlength: Lang.get('validation_admin.user.maxlenght.username'),
            },
            fullname: {
                required: Lang.get('validation_admin.user.required.fullname'),
                minlength: Lang.get('validation_admin.user.minlenght.fullname'),
            },
            email: {
                required: Lang.get('validation_admin.user.required.email'),
                email: Lang.get('validation_admin.user.email.email'),
            },
            password: {
                required: Lang.get('validation_admin.user.required.password'),
                minlength: Lang.get('validation_admin.user.email.password'),
            },
            repass: {
                required: Lang.get('validation_admin.user.required.repass'),
                equalTo: Lang.get('validation_admin.user.repass.same'),
            },
        },

        submitHandler: function(form) {
            form.submit();
        },
    });

    //validate các trường trong form edit user
    $("#edit-user").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            username: {
                required: true,
                minlength: 5,
                maxlength: 100,
                validateUsername:true,
            },
            fullname: {
                required: true,
                minlength: 8,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 8,
            },
            repass: {
                required: true,
                equalTo : "#password",
            },
            phone: {
                number :true,
            },
            address: {
                minlength: 10,
            }
            // image: {
            //     extension: "jpeg"
            // }
        },
        messages: {
            username: {
                required: Lang.get('validation_admin.user.required.username'),
                minlength: Lang.get('validation_admin.user.minlenght.username'),
                maxlength: Lang.get('validation_admin.user.maxlenght.username')
            },
            fullname: {
                required: Lang.get('validation_admin.user.required.fullname'),
                minlength: Lang.get('validation_admin.user.minlenght.fullname'),
            },
            email: {
                required: Lang.get('validation_admin.user.required.email'),
                email: Lang.get('validation_admin.user.email.email'),
            },
            password: {
                required: Lang.get('validation_admin.user.required.password'),
                minlength: Lang.get('validation_admin.user.minlength.password'),
            },
            repass: {
                required: Lang.get('validation_admin.user.required.repass'),
                equalTo: Lang.get('validation_admin.user.repass.same'),
            },
            phone: {
                number: Lang.get('validation_admin.user.phone.numberic'),
            },
            address: {
                minlength: Lang.get('validation_admin.user.minlength.address'),
            }
            // image: {
            //     extension: Lang.get('validation_admin.user.image.mines'),
            // }

        },

        submitHandler: function(form) {
            form.submit();
        },
    });
    //validate all field in form add news
    $("#add-news").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            title: {
                required: true,
                minlength: 10,
                maxlength: 180,
            },
            short_description : {
                required: true,
                minlength: 10,
                maxlength: 180,
            },
            content : {
                required: true,
                minlength: 10
            },
            text_image : {
                required: true,
            }
        },
        messages: {
            title: {
                required: Lang.get('validation_admin.new.title.required'),
                minlength: Lang.get('validation_admin.new.title.minlenght'),
                maxlength: Lang.get('validation_admin.new.title.maxlenght')
            },
            short_description : {
                required: Lang.get('validation_admin.new.short_description.required'),
                minlength: Lang.get('validation_admin.new.short_description.required'),
                maxlength: Lang.get('validation_admin.new.short_description.required')
            },
            content : {
                required: Lang.get('validation_admin.new.content.required'),
            },
            image : {
                required: Lang.get('validation_admin.new.image.required')
            }
        },
        submitHandler: function(form) {
            form.submit();
        },
    });
    //validate form edit news
    $("#edit-news").validate({
        rules: {
            title: {
                required: true,
                minlength: 10,
                maxlength: 180,
            },
            short_description : {
                required: true,
                minlength: 10,
                maxlength: 180
            },
            content : {
                required: true,
            },
            url_news : {
                maxlength: 180,
            }
        },
        messages: {
            title: {
                required: Lang.get('validation_admin.new.title.required'),
                minlength: Lang.get('validation_admin.new.title.minlenght'),
                maxlength: Lang.get('validation_admin.new.title.maxlenght')
            },
            short_description : {
                required: Lang.get('validation_admin.new.short_description.required'),
                minlength: Lang.get('validation_admin.new.short_description.required'),
                maxlength: Lang.get('validation_admin.new.short_description.required')
            },
            content : {
                required: Lang.get('validation_admin.new.content.required')
            },
            url_news : {
                maxlength: Lang.get('validation_admin.new.url.required'),
            }
        },
        submitHandler: function(form) {
            form.submit();
        },
    });
    //validate form change ava
    $("#changeInfo").validate({
        rules: {
            fullname: {
                minlength: 8,
                maxlenght: 50
            },
            phone: {
                number: true,
            },
            address: {
                minlength: 10,
                maxlenght: 200,
            }
        },
        messages: {
            fullname: {
                minlength: Lang.get('validation_admin.user.minlenght.fullname'),
                maxlength: Lang.get('validation_admin.user.maxlenght.fullname')
            },
            phone: {
                number: Lang.get('validation_admin.user.numeric'),
            },
            address: {
                minlength: Lang.get('validation_admin.user.minlenght.address'),
                maxlength: Lang.get('validation_admin.user.maxlenght.address')
            },
        },
        submitHandler: function(form) {
            form.submit();
        },
    });
    //validate form changinfo
    $("#changeAva").validate({
        rules: {
            file: {
                extension: "jpeg|png|bmp|gif|svg|jpg"
            }
        },
        messages: {
            file: {
                extension: Lang.get('validation_admin.user.image.mimes'),
            },
        },
        submitHandler: function(form) {
            form.submit();
        },
    });
    $("#form-top-view").validate({
        rules: {
            selectyear: {
                required: true,
                number: true
            },
        },
        messages: {
            selectyear: {
                required: Lang.get('validation_admin.chart.year.required'),
                number: Lang.get('validation_admin.chart.year.number'),
            },
        },
        submitHandler: function(form) {
            $("canvas#Article-top-view-chart").remove();
            $("div#panel-body").append('<canvas id="Article-top-view-chart"></canvas>');
            var year = $('#select-year-top-view').val();
            var month = $('#select-month-top-view').val();
            $.ajax({
                   type: "GET",
                   url: "/admin/ajax/chart/get-top-view-in-choose-time/" + year +"-"+ month,
                   datatype: "json", // serializes the form's elements.
                   success: function(data)
                   {
                    var viewchoosetime = JSON.parse(data);
                    var size = Objectsize(viewchoosetime);
                    var dataOfview = [];
                    var label_rows = [];
                    if(size > 0){
                      for(var i = 0; i < size; i++){
                        dataOfview[i] = viewchoosetime[i].view;
                        label_rows[i] = viewchoosetime[i].id;
                      }
                    }
                    else {
                      dataOfview = ['null','null','null','null','null','null','null','null','null','null'];
                      label_rows = ['null','null','null','null','null','null','null','null','null','null'];
                    }

                    setChart(dataOfview, 'bar', Lang.get('messages.name_chart.topviewchoose'), 'Article-top-view-chart', label_rows ,Lang.get('messages.name_chart.col_name'),Lang.get('messages.name_chart.row_name'));
                   }
                 });
        },
    });
    $("#form-top-mod").validate({
        rules: {
            selectyear: {
                required: true,
                number: true
            },
        },
        messages: {
            selectyear: {
                required: Lang.get('validation_admin.chart.year.required'),
                number: Lang.get('validation_admin.chart.year.number'),
            },
        },
        submitHandler: function(form) {
            $("canvas#top-btv-chart").remove();
            $("div#panel-body").append('<canvas id="top-btv-chart"></canvas>');
            var year = $('#select-year-top-btv').val();
            var month = $('#select-month-top-btv').val();
            $.ajax({
            url: "/admin/ajax/chart/get-top-mod-in-choose-time/" + year +"-"+ month,
            method: "GET",
            datatype: "json",
            success: function(data){
                var modchoosetime = JSON.parse(data);
                var size = Objectsize(modchoosetime);
                var dataOfmod = [];
                var label_rows = [];
                if(size > 0){
                    for(var i = 0; i < size; i++){
                    dataOfmod[i] = modchoosetime[i].total;
                    label_rows[i] = modchoosetime[i].username;
                    }
                }
                else {
                    dataOfview = ['null','null','null','null','null','null','null','null','null','null'];
                    label_rows = ['null','null','null','null','null','null','null','null','null','null'];
                }

                setChart(dataOfmod, 'line', Lang.get('messages.name_chart.topviewchoose'), 'top-btv-chart', label_rows ,Lang.get('messages.name_chart.col_name'),Lang.get('messages.name_chart.row_name'));
            }
            });
        },
    });
    $("#form-user").validate({
        rules: {
            selectyear: {
                required: true,
                number: true
            },
        },
        messages: {
            selectyear: {
                required: Lang.get('validation_admin.chart.year.required'),
                number: Lang.get('validation_admin.chart.year.number'),
            },
        },
        submitHandler: function(form) {
            var year = $('#select-year-user').val();
            $("canvas#user-chart").remove();
            $("div#panel-body").append('<canvas id="user-chart"></canvas>');
                $.ajax({
                    url : "/admin/ajax/chart/get-number-user-by-year/" + year,
                    method : 'GET',
                    datatype: "json",
                    success : function(data){
                        var userByYear = JSON.parse(data) ;
                        var userByYearArr = [];
                            for(let i = 1; i <= 12; i++){
                                if(userByYear[i]==null){
                                    userByYearArr.push(0);
                                }else{
                                    userByYearArr.push(userByYear[i]);
                                }
                            }
                        setChart(userByYearArr, 'line', Lang.get('messages.name_chart.useryearago'),'user-chart', 0,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
                    }
                });
        },
    });
    $("#form-view").validate({
        rules: {
            selectyear: {
                required: true,
                number: true
            },
        },
        messages: {
            selectyear: {
                required: Lang.get('validation_admin.chart.year.required'),
                number: Lang.get('validation_admin.chart.year.number'),
            },
        },
        submitHandler: function(form) {
            $("canvas#view-chart").remove();
            $("div#panel-body").append('<canvas id="view-chart"></canvas>');
            var year = $('#select-year-view').val();
            $.ajax({
                url : "/admin/ajax/chart/get-number-view-by-year/" + year,
                method : 'GET',
                datatype: "json",
                success : function(data){
                    var viewByYear = JSON.parse(data) ;
                    var viewByYearArr = [];
                        for(let i = 1; i <= 12; i++){
                            if(viewByYear[i]==null){
                                viewByYearArr.push(0);
                            }else{
                                viewByYearArr.push(viewByYear[i]);
                            }
                        }
                    setChart(viewByYearArr, 'line', Lang.get('messages.name_chart.view'),'view-chart', 0,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
                }
            });
        }
    });
    $("#form-art").validate({
        rules: {
            selectyear: {
                required: true,
                number: true
            },
        },
        messages: {
            selectyear: {
                required: Lang.get('validation_admin.chart.year.required'),
                number: Lang.get('validation_admin.chart.year.number'),
            },
        },
        submitHandler: function(form) {
            $("canvas#Article-chart").remove();
            $("div#panel-body").append('<canvas id="Article-chart"></canvas>');
            var year = $('#select-year-art').val();
            $.ajax({
                url : "/admin/ajax/chart/get-count-article-by-year/" + year,
                method : 'GET',
                datatype: "json",
                success : function(data){
                    var articleByYear = JSON.parse(data) ;
                    var articleByYearArr = [];
                        for(let i = 1; i <= 12; i++){
                            if(articleByYear[i]==null){
                                articleByYearArr.push(0);
                            }else{
                                articleByYearArr.push(articleByYear[i]);
                            }
                        }
                    setChart(articleByYearArr, 'bar', Lang.get('messages.name_chart.article'),'Article-chart',0,Lang.get('messages.name_chart.default_col_name'),Lang.get('messages.name_chart.default_row_name'));
                }
            });
        }
    });
    //reject special char
    $.validator.addMethod("validateSpecial", function(value, element) {
        return this.optional( element ) || /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/.test( value );
    }, Lang.get('validation_admin.no_special_char'));
    jQuery.validator.addMethod("validateUsername", function(value, element) {
        return this.optional( element ) || /^[a-zA-Z][a-zA-Z0-9]{4,50}$/.test( value );
    }, Lang.get('validation_admin.user.valid_user'));
});
