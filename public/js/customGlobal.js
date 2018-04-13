$(document).ready(function(){
    input_mask();
})
function input_mask() {
    $("input.input_mask_date").each(function(){
        $(this).inputmask("mm/dd/yyyy", {
            autoUnmask: true
        });
    });

    $("input.input_mask_integer").each(function(){
        $(this).inputmask({
            "mask": "9",
            "repeat": 30,
            "greedy": false
        });
    });
    $("input.input_mask_time").each(function(){
        $(this).inputmask({
            "mask": "9",
            "repeat": 2,
            "greedy": false
        });
    });
}
