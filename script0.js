$(document).ready(function () {
    $('.error').hide();
    $('#fname').keydown(function (event) {
        // $('#fname_err').show();
        // $('#fname_err').html(event.keyCode);
        if ((event.keyCode>=65&&event.keyCode<=90)||event.keyCode==8||event.keyCode==9){
            $('#fname_err').hide();
            document.getElementById('Submit').disabled= false;
        } else {
            $('#fname_err').show();
            $('#fname_err').html(event.keyCode);
            document.getElementById('Submit').disabled= true;
        }

    });
    

    $('#lname').keydown(function (event) {
        if ((event.keyCode>=65&&event.keyCode<=90)||event.keyCode==8||event.keyCode==9){
            $('#lname_err').hide();
            document.getElementById('Submit').disabled= false;
        } else {
            $('#lname_err').show();
            $('#lname_err').html('use letters only');
            document.getElementById('Submit').disabled= true;      
        }
    });

    $('#age').keypress(function (event) {
        if ((event.keyCode>=48&&event.keyCode<=57)||event.keyCode==8||event.keyCode==9){
            $('#age_err').hide();
            document.getElementById('Submit').disabled= false;
        } else {
            $('#age_err').show();
            $('#age_err').html('use numbers only');
            document.getElementById('Submit').disabled= true;
        }
    });

    $('#phn').keydown(function (event) {
        if ((event.keyCode>=48&&event.keyCode<=90)||event.keyCode==8||event.keyCode==9){
            $('#phn_err').hide();
            document.getElementById('Submit').disabled= false;
        } else {
            $('#phn_err').show();
            $('#phn_err').html('use numbers only');
            document.getElementById('Submit').disabled= true;
        }
    });
});

function fName() {
    validation('#fname');
    
}

function lName() {
    validation('#lname');
}

function Age() {
    validation('#age');
}

function Phn() {
    validation('#phn');
        
}

function form_validation() {
    formElements= document.forms['test'].element;
    submitDisabled= false;
    for (let i = 0; i < formElements.length; i++) {
        if (formElements[i].length==0) submitDisabled= true;
        }

    document.getElementById('Submit').disabled()= submitDisabled;
    }

function validation(elementId) {
    $.ajax({
        url: 'ajax/validation.php',
        method: 'post',
        data: {'col': elementId, 'data': $(elementId).val()},
        success: function (response) {
            if(response== '"OK"'){
                $('#fname_err').hide();
            }else if (response=='"not OK"') {
                $(elementId+'_err').show();
                $(elementId+'_err').html(response);
                document.getElementById('Submit').disabled= true;
            }else{
                alert('code is fucked, what the fuck is '+response+' this???')
            }
        }
    });
}

$('form').submit(function () {
    let form_data= $('form').serializeArray();

});

