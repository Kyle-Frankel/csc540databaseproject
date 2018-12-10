$('.dropdown-item').click(function(e){
    category_name = $(e.target).text();
    console.log("Dropdown selection: "+category_name);

    $.ajax({
        url: "customer_category_selection.php",
        type: 'POST',
        data: {category_name: category_name},
        dataType: "text",
        success: function(){
            console.log("Success: "+category_name+" was sent to the server.");
            window.location = 'customer_category_selection.php';
        }
    });

})