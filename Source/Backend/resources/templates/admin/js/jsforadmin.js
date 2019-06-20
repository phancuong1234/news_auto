//confirm khi del 1 bản ghi
function submitFormDeleteHard(id) {
    const flag = confirm(Lang.get('validation_admin.confirm_del'));
    if (flag === true) {
        document.getElementById(id).submit();
    }
}

function liveSearch(){
    // var query = $(this).val();
    var query = document.getElementById('search').value;
    if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
    {
        $.ajax({
            url: "/admin/category/search/" + query, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
            method: "GET", // phương thức gửi dữ liệu.
            success: function (data) { //dữ liệu nhận về
                $('#category').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
            }
        });
    }
}
