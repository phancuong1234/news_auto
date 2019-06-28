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
    //reject special char
    $.validator.addMethod("validateSpecial", function(value, element) {
        return this.optional( element ) || /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/.test( value );
    }, Lang.get('validation_admin.no_special_char'));
    jQuery.validator.addMethod("validateUsername", function(value, element) {
        return this.optional( element ) || /^[a-zA-Z][a-zA-Z0-9]{4,50}$/.test( value );
    }, Lang.get('validation_admin.user.valid_user'));
});
