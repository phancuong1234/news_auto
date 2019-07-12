$("#comment-form").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data) {
            $('#text-comment').val('');
            $('#show-cmt').html(data); // show response from the php script.
        },
        error: function() {
            alert(Lang.get('messages.error.no_login'));
        },
    });
});
$('#modal-change-pass').on("click", function() {
    $('#myModal').modal('toggle');
});
$("#load_more_button").on("click", function() {
    let lastrow = $(".comment").last().find('#content-cmt input').val();
    let id_news = $("#id_news").val();
    $.ajax({
        type: "GET",
        url: '/loadmore/cmt/' + lastrow + '-' + id_news,
        success: function(data) {
            if (data.trim() != '') {
                $("#show-cmt").append(data); // show response from the php script.
                $("#load_more_button").text("Load More");
            } else {
                $("#load_more_button").text("Nothing To Load");
            }

        },
        error: function() {
            alert(Lang.get('messages.error.no_cmt'));
        },
    });
});
$('#link-to-change').on('click', function() {
    $('#image').click();
});
$('#btn-change-profile').on('click', function() {
    let name = $('#btn-change-profile').text();
    if (name == 'Change profile') {
        $('.inp-profile').removeAttr('disabled');
        $('#btn-change-profile').text('save');
    }
    if (name == 'save') {
        $('#change-profile-modal').submit();
    }
});
$('#image').change(function() {
    readURLPicTure(this);
    $('.inp-profile').removeAttr('disabled');
    $('#btn-change-profile').text('save');
});

$("#change-profile-modal").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var url = $(this).attr("action");
    $.ajax({
        url: url,
        type: $(this).attr("method"),
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            alert('Thay đổi thành công');
            $('.inp-profile').attr('disabled', true);
            $('#btn-change-profile').text('Change profile');
        },
        error: function(e) {
            alert('Thay đổi thất bại');

        }
    });
});
$('#btn-change-pass').on('click', function() {
    $('#form-change-pass').submit();
    $('.error').css("color", "red");

});


$('.close').on('click', function() {
    $('.inp-profile').attr('disabled', true);
    $('#btn-change-profile').text('Change profile');
});

function readURLPicTure(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}