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
// validate form profile
$("#change-profile-modal").validate({
    onfocusout: false,
    onkeyup: false,
    onclick: false,
    rules: {
        fullname: {
            validateFullName: true,
            required: true,
            minlength: 8,
        },
        phone: {
            validatePhone: true,
            required: true,
        },
        address: {
            required: true,
            minlength: 8,
        },
        birth_date: {
            required: true,
            validateBirthDay: true,
        }
    },
    messages: {
        fullname: {
            required: Lang.get('validate_user.changeprofile.fullname.required'),
            minlength: Lang.get('validate_user.changeprofile.fullname.minlength'),
        },
        phone: {
            required: Lang.get('validate_user.changeprofile.phone.required'),
        },
        address: {
            required: Lang.get('validate_user.changeprofile.address.required'),
            minlength: Lang.get('validate_user.changeprofile.address.minlength'),
        },
        birth_date: {
            required: Lang.get('validate_user.changeprofile.birth_date.required'),
        }
    },

    submitHandler: function(form) {
        var url = $(form).attr("action");
        $.ajax({
            url: url,
            type: $(form).attr("method"),
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                alert(Lang.get('validate_user.changeprofile.susscess'));
                $('.inp-profile').attr('disabled', true);
                $('#btn-change-profile').text('Sửa thông tin');
            },
            error: function(e) {
                alert(Lang.get('validate_user.changeprofile.error'));

            }
        });
    },
});
$.validator.addMethod("validateFullName", function(value, element) {
    return this.optional(element) || /^[a-zA-Z ][a-zA-Z ]{8,50}$/.test(value);
}, Lang.get('validate_user.changeprofile.fullname.validateFullName'));
$.validator.addMethod("validatePhone", function(value, element) {
    return this.optional(element) || /^[0][1-9][0-9]{8}$/.test(value);
}, Lang.get('validate_user.changeprofile.phone.validatePhone'));
$.validator.addMethod("validateBirthDay", function(value, element) {
    return this.optional(element) || /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/.test(value);
}, Lang.get('validate_user.changeprofile.birth_date.validateBirthDay'));