$(document).ready(function(){
    function fetch_data()
    {
        $.ajax({
            url:"select_baseball.php",
            method:"POST",
            success:function(data){
                $('#live_data').html(data);
            }
        });
    }
    fetch_data();
    $(document).on('click', '#btn_add', function(){
        var item_name = $('#item_name').text();
        var item_price = $('#item_price').text();
        var item_stock = $('#item_stock').text();
        var cat_id = $('#cat_id').text();
        if(item_name == '')
        {
            alert("Enter Item Name");
            return false;
        }
        if(item_price == '')
        {
            alert("Enter Price");
            return false;
        }
        if(item_stock == '')
        {
            alert("Enter Quantity");
            return false;
        }
        if(cat_id == '')
        {
            alert("Enter Category");
            return false
        }
        $.ajax({
            url:"insert.php",
            method:"POST",
            data:{item_name:item_name, item_price:item_price, item_stock:item_stock, cat_id:cat_id},
            dataType:"text",
            success:function(data)
            {
                alert(data);
                fetch_data();
            }
        })
    });
    function edit_data(item_id, text, column_name)
    {
        $.ajax({
            url:"edit.php",
            method:"POST",
            data:{item_id:item_id, text:text, column_name:column_name},
            dataType:"text",
            success:function(data){
                alert(data);
            }
        });
    }
    $(document).on('blur', '.item_name', function(){
        var id = $(this).data("id1");
        var item_name = $(this).text();
        edit_data(id, item_name, "item_name");
    });
    $(document).on('blur', '.item_price', function(){
        var id = $(this).data("id2");
        var item_price = $(this).text();
        edit_data(id,item_price, "item_price");
    });
    $(document).on('blur', '.item_stock', function(){
        var id = $(this).data("id3");
        var item_stock = $(this).text();
        edit_data(id,item_stock, "item_stock");
    });
    $(document).on('blur', '.cat_id', function(){
        var id = $(this).data("id4");
        var cat_id = $(this).text();
        edit_data(id,cat_id, "cat_id");
    });
    $(document).on('click', '.btn_delete', function(){
        var item_id=$(this).data("id5");
        if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                url:"delete.php",
                method:"POST",
                data:{item_id:item_id},
                dataType:"text",
                success:function(data){
                    alert(data);
                    fetch_data();
                }
            });
        }
    });
});
