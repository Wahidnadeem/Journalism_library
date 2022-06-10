$(document).ready(function() {
    "use strict";
    // notification tost
    function getUrlParams(parameter, defaultvalue) {
        var urlparameter = defaultvalue;
        if (window.location.href.indexOf(parameter) > -1) {
            urlparameter = "";
        }
        return urlparameter;
    }

    function notifi_notEnoughBook() {
        return $.toast({
            heading: "عملیه اجرا شد !",
            text: " <span class='bfont' style='font-size:16px' > این کتاب موجود نمیاشد  </span> ",
            showHideTransition: "slide",
            position: "top-right",
            icon: "error",
            loader: !1
        })
    }

    function notifi_save() {
        return $.toast({
            heading: "عملیه اجرا شد !",
            text: "اطلاعات شما موفقانه ذخیره شد!",
            showHideTransition: "slide",
            position: "top-right",
            icon: "success",
            loader: !1
        })
    }

    function notifi_error() {
        return $.toast({
            heading: "عملیه اجرا نشد !",
            text: 'عملیه موفقانه اجرا نشد، لطفا دوباره امتحان کنید !',
            showHideTransition: "plain",
            position: "top-right",
            icon: "error",
            loader: !1
        })

    }

    function notifi_update() {
        return $.toast({
            heading: "عملیه اجرا شد !",
            text: "اطلاعات مورد نظر موفقانه ویرایش شد !",
            showHideTransition: "slide",
            position: "top-right",
            icon: "info",
            loader: !1
        })
    }

    function notifi_delete() {
        return $.toast({
            heading: "توجه !",
            text: "اطلاعات مورد نظر موفقانه حذف گردید !",
            showHideTransition: "plain",
            position: "top-right",
            icon: "error",
            loader: !1
        })
    }

    function notifi_Use_info() {
        return $.toast({
            heading: "توجه !",
            text: "از این مورد در اطلاعات استفاده شده است !",
            showHideTransition: "plain",
            position: "top-right",
            icon: "warning",
            loader: !1
        })
    }

    var notEnoughBook = getUrlParams('notEnoughBook', 'empty');
    if (notEnoughBook != "empty") {
        notifi_notEnoughBook();
    }

    var saved = getUrlParams('saved', 'empty');
    if (saved != "empty") {
        notifi_save();
    }

    var error = getUrlParams('error', 'empty');
    if (error != "empty") {
        notifi_error();
    }

    var deleted = getUrlParams('deleted', 'empty');
    if (deleted != "empty") {
        notifi_delete();
    }

    var update = getUrlParams('update', 'empty');
    if (update != "empty") {
        notifi_update();
    }

    var Use_info = getUrlParams('Use_info', 'empty');
    if (Use_info != "empty") {
        notifi_Use_info();
    }

});