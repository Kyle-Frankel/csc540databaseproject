var pword = '';
var cPword = '';
var username = '';
var firstname = '';
var lastname = '';


//set submit button to disabled to start
$('#login_button').prop('disabled', true);

$('input').keyup(function(){
    verifyForm();
});

$('#login_button').click(function(){
    submit();
});

$('input[type="password"]').keyup(function(){
    var passwordMatch = checkPasswords();
    if(passwordMatch){
        var text = "Passwords match";
        updateFeedback(text, 'green');
    }else{
        var text = "Passwords don't match!";
        updateFeedback(text, 'red');
    }
});

function verifyForm(){
    pword = $('input[name="password"]').val();
    cPword = $('input[name="password_confirm"]').val();
    username = $('#login_username').val();
    firstname = $('#registerFirstName').val();
    lastname = $('#registerLastName').val();




    if(pword && cPword && username && firstname && lastname){
        var passwordsMatch = checkPasswords();
        if(passwordsMatch){
            $('#login_button').prop('disabled', false);
        }else{
            $('#login_button').prop('disabled', true);
        }
    }else{
        $('#login_button').prop('disabled', true);
    }
}

function updateFeedback(text,color){
    console.log('updating feedback');
    color = color || 'black';
    $('#feedback_display').html(text);
    $('#feedback_display').css('color', color);
}

function checkPasswords(){
    pword = $('input[name="password"]').val();
    cPword = $('input[name="password_confirm"]').val();
    if(pword && cPword){
        if(pword === cPword){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }


}


