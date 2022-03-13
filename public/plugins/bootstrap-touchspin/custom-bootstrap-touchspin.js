// Value attribute is not set (applying settings.initval)
$("input[name='product_height']").TouchSpin({
    initval: 100,
    max: 100000,
    buttondown_class: "btn btn-classic btn-primary",
    buttonup_class: "btn btn-classic btn-success"
});
$("input[name='product_width']").TouchSpin({
    initval: 100,
    max: 100000,
    buttondown_class: "btn btn-classic btn-primary",
    buttonup_class: "btn btn-classic btn-success"
});
$("input[name='product_amount']").TouchSpin({
    initval: 10,
    max: 100,
    buttondown_class: "btn btn-classic btn-primary",
    buttonup_class: "btn btn-classic btn-success"
});
$("input[name='amount']").TouchSpin({
    initval: 1,
    max: 100,
    buttondown_class: "btn btn-classic btn-primary",
    buttonup_class: "btn btn-classic btn-success"
});
