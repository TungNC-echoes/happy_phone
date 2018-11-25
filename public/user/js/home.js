$(document).on('click', '#man .pagination a', function (e) {
    e.preventDefault();
    var cate_tab_id = $('#man').find('.category_id').val() ? $('#man').find('.category_id').val() : 1;
    var page = $(this).attr('href').split('man=')[1] ? $(this).attr('href').split('man=')[1] : $(this).attr('href').split('page=')[1];
    getExcercisePage('man', cate_tab_id, page);
});

$(document).on('click', '#woman .pagination a', function (e) {
    e.preventDefault();
    var cate_tab_id = $('#man').find('.category_id').val() ? $('#woman').find('.category_id').val() : 2;
    var page = $(this).attr('href').split('woman=')[1] ? $(this).attr('href').split('woman=')[1] : $(this).attr('href').split('page=')[1];
    getExcercisePage('woman', cate_tab_id, page);
});

$(document).on('click', '#yoga .pagination a', function (e) {
    e.preventDefault();
    var cate_tab_id = $('#man').find('.category_id').val() ? $('#yoga').find('.category_id').val() : 3;
    var page = $(this).attr('href').split('yoga=')[1] ? $(this).attr('href').split('yoga=')[1] : $(this).attr('href').split('page=')[1];
    getExcercisePage('yoga', cate_tab_id, page);
});

$(document).on('click', '#man .sub-content-list a', function (e) {
    e.preventDefault();
    var cate_tab_id = $(this).find('.cate_tab_id').val();
    getExcercisePage('man', cate_tab_id, 1);
});

$(document).on('click', '#woman .sub-content-list a', function (e) {
    e.preventDefault();
    var cate_tab_id = $(this).find('.cate_tab_id').val();
    getExcercisePage('woman', cate_tab_id, 1);
});

$(document).on('click', '#yoga .sub-content-list a', function (e) {
    e.preventDefault();
    var cate_tab_id = $(this).find('.cate_tab_id').val();
    getExcercisePage('yoga', cate_tab_id, 1);
});

function getExcercisePage(parent_category, cate_tab_id, page) {
    $.ajax({
        url: 'category/' + parent_category + '/' + cate_tab_id + '?page=' + page
    }).done(function (data) {
        $('#' + parent_category).html(data);
    });
}

$(document).on('click', '#music .pagination a', function (e) {
    e.preventDefault();
    var page = $(this).attr('href').split('music=')[1] ? $(this).attr('href').split('music=')[1] : $(this).attr('href').split('page=')[1];
    $.ajax({
        url: 'music?music=' + page
    }).done(function (data) {
        $('#music').html(data);
    });
});

$(document).on('click', '#post .pagination a', function (e) {
    e.preventDefault();
    var page = $(this).attr('href').split('post=')[1] ? $(this).attr('href').split('post=')[1] : $(this).attr('href').split('page=')[1];
    $.ajax({
        url: 'post?post=' + page
    }).done(function (data) {
        $('#post').html(data);
    });
});