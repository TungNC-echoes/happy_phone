$(document).on('click', '.category .pagination a', function (e) {
    e.preventDefault();
    var sub_content = $(this).attr('href').split('?')[1];
    var content = sub_content.split('=')[0];
    var category_id = sub_content.split('category_')[1].split('=')[0];
    $.ajax({
        url: 'page/content/excercise/' + category_id + '?' + sub_content
    }).done(function (data) {
        $('#' + content).html(data);
    });

});

$(document).on('click', '#post .pagination a', function (e) {
    e.preventDefault();
    var page = $(this).attr('href').split('?')[1];
    $.ajax({
        url: 'page/content/post?' + page
    }).done(function (data) {
        $('#post').html(data);
    });
});

$(document).on('click', '#music .pagination a', function (e) {
    e.preventDefault();
    var page = $(this).attr('href').split('?')[1];
    $.ajax({
        url: 'page/content/music?' + page
    }).done(function (data) {
        $('#music').html(data);
    });
});
