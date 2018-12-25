/*
** nopCommerce ajax cart implementation
*/


var AjaxCart = {
    loadWaiting: false,
    usepopupnotifications: false,
    topcartselector: '',
    topwishlistselector: '',
    flyoutcartselector: '',

    init: function (usepopupnotifications, topcartselector, topwishlistselector, flyoutcartselector) {
        this.loadWaiting = false;
        this.usepopupnotifications = usepopupnotifications;
        this.topcartselector = topcartselector;
        this.topwishlistselector = topwishlistselector;
        this.flyoutcartselector = flyoutcartselector;
    },

    setLoadWaiting: function (display) {
        displayAjaxLoading(display);
        this.loadWaiting = display;
    },

    addproducttocart: function (urladd) {
        if (this.loadWaiting != false) {
            return;
        }
        this.setLoadWaiting(true);

        $.ajax({
            cache: false,
            url: urladd,
            type: 'post',
            dataType: "json",
            success: this.successprocess,
            complete: this.resetLoadWaiting,
            error: this.ajaxFailure
        });
    },
    addproductvariantdatatocart: function (urladd, data) {
        if (this.loadWaiting != false) {
            return;
        }
        this.setLoadWaiting(true);

        $.ajax({
            cache: false,
            url: urladd,
            dataType: "json",
            type: 'post',
            data: data,
            success: this.successprocess,
            complete: this.resetLoadWaiting,
            error: this.ajaxFailure
        });
    },
    addproductvarianttocart: function (urladd, formselector) {
        if (this.loadWaiting != false) {
            return;
        }
        this.setLoadWaiting(true);

        $.ajax({
            cache: false,
            url: urladd,
            data: $(formselector).serialize(),
            dataType: "json",
            type: 'post',
            success: this.successprocess,
            complete: this.resetLoadWaiting,
            error: this.ajaxFailure
        });
    },

    successprocess: function (response) {
        if (typeof ReCaculateCountOfCart != "undefined")//重新计算购物车的商品数量, 定义在ProductStyle3.mobile.cshtml中
            ReCaculateCountOfCart();
        if (response.updatetopcartsectionhtml) {
            $(AjaxCart.topcartselector).html(response.updatetopcartsectionhtml);
        }
        if (response.updatetopwishlistsectionhtml) {
            $(AjaxCart.topwishlistselector).html(response.updatetopwishlistsectionhtml);
        }
        if (response.updateflyoutcartsectionhtml) {
            $(AjaxCart.flyoutcartselector).replaceWith(response.updateflyoutcartsectionhtml);
        }
        if (response.message) {
            //display notification
            if (response.success == true) {
                //success
                if (AjaxCart.usepopupnotifications == true) {
                    displayPopupNotification(response.message, 'success', true);
                }
                else {
                    //specify timeout for success messages
                    //displayBarNotification(response.message, 'success', 3500);
                    easyDialog.open({
                        container: {
                            header: response.title,
                            content: "<div class='shoppingcart_infobox'>" + response.message + "</div>"
                        },
                        fixed: true
                    });
                    if (typeof callbackfn == 'function' && response.message == '<p>该产品已添加到收藏夹</p>')
                        callbackfn();
                }
            }
            else {
                if (response.isflipcloudcheck == true) {
                    var rebuyTitle = response.rebuy;
                    var ajaxData = this.data;
                    var ajaxUrl = this.url;
                    easyDialog.open({
                        container: {
                            header: response.title,
                            content:  "<div class='shoppingcart_infobox'><p>" + response.message + "</p></div>",
                            yesFn: function ()
                            {
                                $.ajax({
                                    cache: false,
                                    url: "/ClearShoppingCart",
                                    dataType:"json",
                                    type: 'post',
                                    success: function (msg) {
                                        if (msg.result == true) {
                                            AjaxCart.addproductvariantdatatocart(ajaxUrl, ajaxData);
                                        }
                                    }
                                });
                            },
                            noFn: true
                        }
                    });
                    $("#easyDialogYesBtn").html(rebuyTitle);
                    return false;
                }
                //error
                if (AjaxCart.usepopupnotifications == true) {
                    displayPopupNotification(response.message, 'error', true);
                }
                else {
                    if (response.message == "unlogin") {
                        location.href = response.redirect;
                    } else {
                        //no timeout for errors
                        //displayBarNotification(response.message, 'error', 0);
                        easyDialog.open({
                            container: {
                                header: response.title,
                                content: "<div class='shoppingcart_infobox'><p>" + response.message + "</p></div>"
                            },
                            fixed: true
                        });
                        window.setTimeout(function () {
                            document.getElementById('overlay').style.display = "none";
                            document.getElementById('easyDialogBox').style.display = "none";
                        }, 12000)
                    }
                }

            }
            return false;
        }
        if (response.redirect) {
            location.href = response.redirect;
            return true;
        }
        return false;
    },

    resetLoadWaiting: function () {
        AjaxCart.setLoadWaiting(false);
        $("#overlay").css("z-Index", 999999);
        $("#easyDialogBox").css("z-Index", 999999);
    },

    ajaxFailure: function () {
        alert('Failed to add the product to the cart. Please refresh the page and try one more time.');
    }
};