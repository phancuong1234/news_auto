$(document).ready(function($) {
    var engine1 = new Bloodhound({
        remote: {
            url: '/search/news?value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });
    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 3,
        maxLength: 100,
        order: "asc"
    }, [
        {
            source: engine1.ttAdapter(),
            name: 'name-news',
            display: function(data) {
                return data.title;
            },
            templates: {
                empty: [
                    '<div class="list-group search-results-dropdown"><div class="list-group-item" style="color: red">Không có bài viết nào.</div></div>'
                ],
                pending: [
                    '<div class="list-group search-results-dropdown"><div class="list-group-item" style="color: #d9dc05">Đang tìm kiếm...</div></div>'
                ],
                header: [
                    '<div class="list-group search-results-dropdown"></div>'
                ],
                suggestion: function (data) {
                    var image = data.image;
                    var strOfImage = data.image;
                    var index = strOfImage.indexOf("images-");
                    if ( index != -1){
                        image = 'images/news/' + data.image;
                    }
                    return '<li class="list-group-item d-flex justify-content-between align-items-center">'
                        + '<a style="color: initial" href="/danh-muc/' + data.slug_cate + '/'+ data.slug +'">' + data.title + '</a>'
                        + '<div class="image-parent">'
                        + '<img src="'+ image +'" class="img-fluid img-search" alt="quixote">'
                        + '</div>'
                        + '</li>'
                }
            }
        }]).bind('typeahead:asyncrequest', function (ev, query, ds) {
            showHideSearchSpinner(true);
        }).bind('typeahead:asyncreceive', function (ev, query, ds) {
            showHideSearchSpinner(false);
        });
    // $('.search-input').bind('typeahead:cursorchange', function(ev, suggestion) {
    //     console.log(ev);
    // });
    function showHideSearchSpinner(isShow)
    {
        setTimeout(function () {

            if (isShow) {
                $("#search-box-icon").removeClass("fa-search");
                $("#search-box-icon").addClass("fa-lg");
                $("#search-box-icon").addClass("fa-spinner");
                $("#search-box-icon").addClass("fa-spin");

            }
            else {
                $("#search-box-icon").addClass("fa-search");
                $("#search-box-icon").removeClass("fa-lg");
                $("#search-box-icon").removeClass("fa-spinner");
                $("#search-box-icon").removeClass("fa-spin");


            }
        }, 100);

    }
});
