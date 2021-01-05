function fetch_select(val)
{
    console.log(val);
    if (val == '0') {
        $('#selectThana').html('<option>--- Select Thana ---</option>');
    }
    $.ajax({
        type: 'post',
        url: 'fetch_data.php',
        data: {
            get_option: val
        },
        success: function (response) {
            document.getElementById("selectDistrict").innerHTML = response;
            $('#selectThana').html('<option>--- Select Thana ---</option>');
        }
    });
}
function fetch_select_thana(val)
{
    $.ajax({
        type: 'post',
        url: 'thana_data.php',
        data: {
            get_option: val
        },
        success: function (response) {
            document.getElementById("selectThana").innerHTML = response;
        }
    });
}
