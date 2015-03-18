var ShoppingCart = function() {
    "use strict";

    var size = 0;
    var cart = [];

    this.isEmpty = function() {
        return size === 0;
    };

    this.add = function(bil){
        var nybil;
        if(getItem(bil.regnr)){
            cart[]
        }
        bil.ammount = 1;
        cart.push(bil);
        size=size+1;
};

    this.remove = function (regnr){
        size = 0;
    }
    this.size = function() {
       return size;
    };

    this.getItem = function(regnr) {
        var index = 0;
        for(index = 0; index < cart.length; index++){
            if (cart[index].regnr === regnr){
                return cart[index];
            }
        }
    };

}