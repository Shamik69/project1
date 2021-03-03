$(document).ready(function () {
    $('.error').hide();
    $("#confirm").hide();
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
    $('#positive').on('click', function () {
        $('#confirm').hide();
        $('#negaDiv').hide();
        $.ajax({
            method: 'post',
            data: $('#form').serialize(),
            url:'ajax/positive.php',
            success:function (response) {
                $('#posiDiv').show();
                $('#posiDiv').html('thanks');
                console.log(response);
            }
        });

        return true;
    });

    $('#negative').on('click', function () {
        $('#confirm').hide();
        $('#posiDiv').hide();
        $.ajax({
            method: 'post',
            data: $('#form').serialize(),
            url:'ajax/negative.php',
            success:function (response) {
                $('#negaDiv').show();
                $('#negaDiv').html('Could you please resubmit the form?');
                console.log(response);
            }
        });

        return true;
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
    /*
    error code
        0: no error
        1: no input
        2: non-text in text only field
        3: non-number in number only field
        4: unaccepted length of charechters in age
        5: unaccepted length of charechters in phn
    */

    $.ajax({
        url: 'ajax/validation.php',
        method: 'post',
        data: {'col': elementId, 'data': $(elementId).val()},
        success: function (response) {
            if(response== 0){
                $('#fname_err').hide();
            }else if (response==1) {
                $(elementId+'_err').show();
                $(elementId+'_err').html('Enter Some Value');
                document.getElementById('Submit').disabled= true;
            }else if (response==2) {
                $(elementId+'_err').show();
                $(elementId+'_err').html('Use Alphabets Only');
                document.getElementById('Submit').disabled= true;
            }else if (response==3) {
                $(elementId+'_err').show();
                $(elementId+'_err').html('Use Digits Only');
                document.getElementById('Submit').disabled= true;
            }else if (response==4) {
                $(elementId+'_err').show();
                $(elementId+'_err').html('Use 2 Digits only');
                document.getElementById('Submit').disabled= true;
            }else if (response==5) {
                $(elementId+'_err').show();
                $(elementId+'_err').html('Use 10 Digits only');
                document.getElementById('Submit').disabled= true;
            }else{
                alert('code is fucked, what the fuck is '+response+' this???')
            }
        }
    });
}


function eleName(eleId) {
   // for form inputs only
   let data= {'f_name':'First name',
            'l_name':'Last name',
            'age':'Age',
            'gender':'Gender',
            'edu':'Education',
            'edu_status':'Currently Doing',
            'mail':'Email Address',
            'phn_no':'Phone Number'
            }
    return data[eleId];
}


function onSubmit() {
        /*
    error code
    0: empty input
    1: SQL error in creating/finding db

    */
    $("#p").show();
    $('#posiDiv').hide();
    $('#negaDiv').hide();
    $.ajax({
        method: 'post',
        data: $('#form').serialize(),
        url: 'ajax/confirm.php',
        success: function (response) {
            returnHtml= '';
            let result = JSON.parse(response);
            for (const key in result) {
                returnHtml+=
                `<tr class= 'table'>
                    <th class= 'table'>`+eleName(key)+`</th>
                    <td class= 'table'>`+result[key]+`</td>
                </tr>`
            }
            $("#confirm").show();
            $('#table').html(returnHtml);
            // console.log('\n'+result);
        }
    })

    return true;
}

