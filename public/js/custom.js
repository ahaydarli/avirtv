$(document).ready(function () {
    $(".device").change(function(){
        if ($(this).val() === "1") {
            $(".mac_address").show();
        } else if ($(this).val() === "0") {
            $(".mac_address").hide();
        }
    });
});
$(document).ready(function () {
    $(".subscribe-period").change(function(){
        let option = $(this).find('option:selected');
        let month = option.attr('data-month');
        let price = $(".unit_price").val();
        let discount = option.attr('data-discount');
        let new_price = month * price;
        let total_price;
        if (option.attr('data-type') == 'percent'){
             total_price = new_price - ((new_price * discount) / 100);
        } else if (option.attr('data-type') == 'fixed') {
            total_price = new_price - discount;
        }
        $(".total_price").html(total_price + ' ₼');

    });
});
$(document).ready(function () {
    $(".subscribe-package").change(function(){
        let price = $(".unit_price").val();
        $(".total_price").html(total_price + ' ₼');

    });
});
