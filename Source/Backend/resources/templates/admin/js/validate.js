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
    jQuery.validator.addMethod("validateSpecial", function(value, element) {
        return this.optional( element ) || /^[0-9a-zA-Z]+$/.test( value );
    }, Lang.get('validation_admin.category.no_special_char'));
});

