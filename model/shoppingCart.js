var ShoppingCart = function () {
    "use strict";


    var cart = [];

    this.isEmpty = function () {
        if (cart.length === 0){
            return true;
        }

    };

    this.add = function (bil) {
        for (var index = 0; index < cart.length; index++) {
            if (cart[index].regnr === bil.regnr) {
                increment(index);
                return;
            }
        }
        addToCart(bil);
    };

    function increment(index) {
        cart[index].ammount++;

    }

    function addToCart(bil) {
        bil.ammount = 1;
        cart.push(bil);
    }

    this.remove = function (regnr) {
        for (var index = 0; index < cart.length; index++) {
            if (cart[index].regnr === regnr) {
                cart.splice(index, 1);
            }

        }
    };
    this.size = function () {
        return cart.length;
    };

    this.getItem = function (regnr) {
        for (var index = 0; index < cart.length; index++) {
            if (cart[index].regnr === regnr) {
                return cart[index];
            }
        }
    };

    this.getSum = function () {
        var sum = 0;
        for (var index = 0; index < cart.length; index++) {
            sum = sum + (cart[index].pris * cart[index].ammount);

        }
        return sum;
    };

    this.decrease = function (regnr) {
        for (var i = 0; i < cart.length; i++) {
            if (cart[i].regnr === regnr){
                cart[i].ammount--;
            }
        }

    };

    this.setCookie = function () {
        document.cookie="shoppingCart";
        return document.cookie;
    };
};