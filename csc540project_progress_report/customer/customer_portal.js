$('#login_button').click(function(){
    submit();
});

function updateFeedback(text,color='black'){
    $('#feedback_display').text(text);
    $('#feedback_display').css('color', color);
}



function submit(){
    password = $('input[name="password"]').val();
    username = $('input[name="username"]').val();

    $.ajax({
        type: "POST",
        url: "customer_login_validation.php",
        data: {
            username: username,
            password: password
        },
        success: [function(data){
            response = JSON.parse(data);
            console.log(response);
            if(response['isValid'] == false){
                updateFeedback(response['feedback'], 'red');
            }else{
                window.location = 'customer_home.php';
            }
        }],
        error: function(response){
            updateFeedback('Something went wrong', 'black');
        }
    });
}