$(document).ready(function () {
    $(".device").change(function(){
        if ($(this).val() === "1") {
            $(".mac_address").show();
        } else if ($(this).val() === "2") {
            $(".mac_address").hide();
        }
    });
});
$(document).ready(function () {
    $(".period").change(function(){
        let month = $(this).val();
        let price = $(".unit_price").val();
        let new_price = month * price;
        $(".total_price").html(new_price+' ₼');
    });
});
