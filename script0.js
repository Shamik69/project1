$(document).ready(function () {
    $('.error').hide();
    $('#fname').keydown(function (event) {
        if ((event.keyCode>=65&&event.keyCode<=90)||event.keyCode==8){
            $('#fname_err').hide();
            $('#Submit').show();
        } else {
            $('#fname_err').show();
            $('#fname_err').html('use letters only');
            $('#Submit').hide();
        }
    });
    

    $('#lname').keydown(function (event) {
        if ((event.keyCode>=65&&event.keyCode<=90)||event.keyCode==8){
            $('#lname_err').hide();
            $('#Submit').show();
        } else {
            $('#lname_err').show();
            $('#lname_err').html('use letters only');
            $('#Submit').hide();
            
        }
    });

    $('#age').keypress(function (event) {
        if ((event.keyCode>=48&&event.keyCode<=57)||event.keyCode==8){
            $('#age_err').hide();
            $('#Submit').show();
        } else {
            $('#age_err').show();
            $('#age_err').html('use numbers only');
            $('#Submit').hide();
        }
    });

    $('#phn_no').keydown(function (event) {
        if ((event.keyCode>=48&&event.keyCode<=90)||event.keyCode==8){
            $('#phn_err').hide();
            $('#Submit').show();
        } else {
            $('#phn_err').show();
            $('#phn_err').html('use numbers only');
            $('#Submit').hide();
        }
    });

    function fName() {
        if(/^[a-zA-Z ]*$/.test($('#fname').val())){
            $('#fname_err').hide();
            $('#Submit').show();
        } else {
            $('#fname_err').show();
            $('#fname_err').html('use letters only');
            $('#Submit').hide();
        }
    }

    function lName() {
        if(/^[a-zA-Z ]*$/.test($('#lName').val())){
            $('#lName_err').hide();
            $('#Submit').show();
        } else {
            $('#lName_err').show();
            $('#lName_err').html('use letters only');
            $('#Submit').hide();
        }
    }

    function Age() {
        if ($('#age').val().length==2){
            if(/^%d*$/.test($('#Age').val())){
                $('#age_err').hide();
                $('#Submit').show();
            } else {
                $('#age_err').show();
                $('#age_err').html('use numbers only');
                $('#Submit').hide();
            }
        } else{
            $('#age_err').show();
            $('#age_err').html('check your age again');
            $('#Submit').hide();
        }
    }

    function Phn() {
        if ($('#phn').val().length==10) {
            if(/^%d*$/.test($('#Phn').val())){
                $('#phn_err').hide();
                $('#Submit').show();
            } else {
                $('#phn_err').show();
                $('#phn_err').html('use numbers only');
                $('#Submit').hide();
            }
        }else{
            $('#phn_err').show();
            $('#phn_err').html('check your phone number again');
            $('#Submit').hide();
        }
    }

    function form_validation() {
        formElements= document.forms['test'].element;
        submitDisabled= false;
        for (let i = 0; i < formElements.length; i++) {
            if (formElements[i].length==0) submitDisabled= true;
            }

        document.getElementById('Submit').disabled()= submitDisabled;
        }
});

