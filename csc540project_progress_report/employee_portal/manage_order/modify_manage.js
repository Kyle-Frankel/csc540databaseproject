$(document).ready(function(){
    function fetch_data()
    {
        $.ajax({
            url:"select_order_management.php",
            method:"POST",
            success:function(data){
                $('#live_data').html(data);
            }
        });
    }
    fetch_data();
});

