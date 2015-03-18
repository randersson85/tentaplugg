describe("shopping cart", function() {

    var cart;
    var bilar = [];

    beforeEach(function() {
       cart = new ShoppingCart();
        bilar.push(new Bil("ABC123","Volvo","142", 12000));
        bilar.push(new Bil("DEF456","Volvo","142", 12000));
        bilar.push(new Bil("GHI789","Volvo","142", 12000));
    });

    it("should be empty when created", function() {
        expect(cart.isEmpty()).toBeTruthy();
    });

    it("is not empty when product is added", function() {
         //Act
        cart.add(bilar[0])

        //Assert
        expect(cart.isEmpty()).toBeFalsy();
    });

    it("Should remove a product when prompted to", function(){
        cart.add(bilar[0])
        cart.remove("ABC123");
        expect(cart.isEmpty()).toBeTruthy();
    });

    it("should allow for multiple products to be added",function(){
        cart.add(bilar[0]);
        cart.add(bilar[1]);
        cart.add(bilar[2]);
        expect(cart.size()).toBe(3);
    });

    it("Should increase the ammount of a product when added multiple times", function(){
        cart.add(bilar[0]);
        cart.add(bilar[0]);
        expect(cart.getItem("ABC123").ammount).toBe(2);
    });

});