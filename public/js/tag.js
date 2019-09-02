$(document).ready(function () {
    var counter = 0;

    console.log(counter);
    $('#add_tag').click(function () {
        counter++;
        if(counter < 3)
            $('#tag_select').clone().appendTo('#tag_wrapper');
    });
});
