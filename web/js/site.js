/**
 * Created by Administrator on 15-12-28.
 */
jQuery(function($) {
    //add by ruzuojun
    $(document).on("click", "#goTop", function () {
        $('html,body').animate({scrollTop: '0px'}, 800);
    }).on("click", "#goBottom", function () {
        $('html,body').animate({scrollTop: $('.footer').offset().top}, 800);
    }).on("click", "#refresh", function () {
        location.reload();
    });

    // 防止重复提交
    $('form').on('beforeValidate', function (e) {
        $(':submit').attr('disabled', true).addClass('disabled');
    });
    $('form').on('afterValidate', function (e) {
        if (cheched = $(this).data('yiiActiveForm').validated == false) {
            $(':submit').removeAttr('disabled').removeClass('disabled');
        }
    });
    $('form').on('beforeSubmit', function (e) {
        $(':submit').attr('disabled', true).addClass('disabled');
    });
});
