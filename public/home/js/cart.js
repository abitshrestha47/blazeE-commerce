$(document).ready(function() {
    function updateTotal(){
        var getAllPrice=[];
        $('.pricing').each(function(){
            getAllPrice.push(parseFloat($(this).text().replace('$','')));
        });
        var total = getAllPrice.reduce(function(acc, current) {
            return acc + current;
        }, 0);
        $("#subtotal").text("Total: $" + total);
    }
    var observer = new MutationObserver(function(mutations) {
        updateTotal();
    });

    $('.pricing').each(function(){
        observer.observe(this, {
            characterData: true,
            childList: true,
            subtree: true
        });
    });
    updateTotal();
});