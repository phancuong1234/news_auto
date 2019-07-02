$( document ).ready(function() {
    $('#btn-register').on('click', function () {
        var checkrules = document.getElementById("rule").checked == true;
        if (checkrules == true){
            document.getElementById("rule").value = 'agree';
            $('#register').submit();
        }
        else {
            alert(Lang.get('messages.agree_rule'));
        }
    });
});
