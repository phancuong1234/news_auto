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
                url: "/admin/category/search/" + query, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
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
    }

};
$( document ).ready(function() {
    //event show name file
    $('#image').on('change', function(e) {
        var fileName = e.target.files[0].name;
        document.getElementById('text_image').value = fileName;
        readURLPicTure(this);
    });

    //CKeditor
    // ClassicEditor
    //     .create( document.querySelector( '#editor' ) )
    //     .then( editor => {
    //         editor.getData(); // -> '<p>Foo!</p>'
    //     } )
    //     .catch( error => {
    //         console.error( error );
    //     } );
    CKEDITOR.replace( 'content' );
    // preview img
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
});

