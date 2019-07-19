$("#form-change-pass").validate({
    onfocusout: false,
    onkeyup: false,
    onclick: false,
    rules: {
        password: {
            required: true,
            minlength: 8,
        },
        repass: {
            required: true,
            equalTo: "#password",
        },
        oldpass: {
            required: true,
        }
    },
    messages: {

        password: {
            required: Lang.get('validate_user.changepass.password.required'),
            minlength: Lang.get('validate_user.changepass.password.minlength'),
        },
        repass: {
            required: Lang.get('validate_user.changepass.repass.required'),
            equalTo: Lang.get('validate_user.changepass.repass.equalTo'),
        },
        oldpass: {
            required: Lang.get('validate_user.changepass.oldpass.required'),
        },

    },

    submitHandler: function(form) {
        var url = $(form).attr("action");
        $.ajax({
            url: url,
            type: $(form).attr("method"),
            data: $(form).serialize(),
            success: function(data) {
                if (data.trim() == 'success') {
                    $('#PassModal').modal('toggle');
                    alert(Lang.get('messages.error.susscess'));
                } else {
                    alert(Lang.get('validate_user.changepass.oldpass.no-have'));
                }
            },
            error: function(e) {
                alert(Lang.get('messages.error.fail'));

            }
        });
    },
});