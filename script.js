document.addEventListener('keypress', function (event) {
    if (document.activeElement.id == 'fname' || document.activeElement.id == 'lname') {
        if (document.activeElement.id == 'fname') {
            err_id = 'fname_err';
        } else if (document.activeElement.id == 'lname') {
            err_id = 'lname_err';
        }
        if (event.keyCode >= 96 && event.keyCode <= 123) {
            document.getElementById(err_id).innerHTML = '';
            document.getElementById("Submit").disabled = false;
        }
        else if (event.keyCode >= 64 && event.keyCode <= 91) {
            document.getElementById(err_id).innerHTML = '';
            document.getElementById("Submit").disabled = false;
        }
        else {
            output = 'Please use alphabets only in ' + document.activeElement.id;
            document.getElementById(err_id).innerHTML = output;
            document.getElementById("Submit").disabled = true;
        }

    }

    else if (document.activeElement.id == 'age' || document.activeElement.id == 'phn_no') {
        if (document.activeElement.id == 'age') {
            err_id = 'age_err';
        } else if (document.activeElement.id == 'phn_no') {
            err_id = 'phn_err';
        }
        if (event.keyCode >= 47 && event.keyCode <= 58) {
            document.getElementById(err_id).innerHTML = '';
            document.getElementById("Submit").disabled = false;
        }
        else {
            output = 'Please use numerics only in ' + document.activeElement.id;
            document.getElementById(err_id).innerHTML = output;
            document.getElementById("Submit").disabled = true;
        }
    }

});

function focusChange(inputType, inputLen, id, err_id) {
    // checks if a box contains only specific charecters of specific length
    var input = document.getElementById(id).value;

    if (inputType == "text") {
        if (input.length == 0) {
            output = id + " can't be blank";
            document.getElementById(err_id).innerHTML = output;
            document.getElementById("Submit").disabled = true;
        }
        else {
            if (!/[^a-zA-Z]/.test(input)) {
                document.getElementById(err_id).innerHTML = '';
                document.getElementById("Submit").disabled = false;
            } else {
                output = 'Please use alphabets only in ' + id;
                document.getElementById(err_id).innerHTML = output;
                document.getElementById("Submit").disabled = true;
            }
        }
    } else if (inputType == "number") {
        if (input.length == 0) {
            output = id + " can't be blank";
            document.getElementById(err_id).innerHTML = output;
            document.getElementById("Submit").disabled = true;
        }
        else if (input.length == inputLen) {
            if (/^\d+$/.test(val)) {
                document.getElementById(err_id).innerHTML = '';
                document.getElementById("Submit").disabled = false;
            } else {
                output = 'Please use numerics only in ' + id;
                document.getElementById(err_id).innerHTML = output;
                document.getElementById("Submit").disabled = true;
            }
        } else {
            output = 'Please use' + inputLen + ' charechters in ' + document.activeElement.id;
            document.getElementById(err_id).innerHTML = output;
        }
        
    }
    document.getElementById('para').innerHTML = input;
}

function fName() {
    if (input.length == 0) {
        output = id + " can't be blank";
        document.getElementById(err_id).innerHTML = output;
        document.getElementById("Submit").disabled = true;
    }
    else {
        if (inputtxt.value.match(/^[A-Za-z]+$/)) {
            document.getElementById(err_id).innerHTML = '';
            document.getElementById("Submit").disabled = false;
        } else {
            output = 'Please use alphabets only in ' + id;
            document.getElementById(err_id).innerHTML = output;
            document.getElementById("Submit").disabled = true;
        }
    }
}

function lName() {
    focusChange(inputType = 'text', inputLen = 15, id = 'lname', err_id = 'lname_err');
}

function age() {
    focusChange(inputType = 'number', inputLen = 2, id = 'age', err_id = 'age_err');
}

function phn() {
    focusChange(inputType = 'text', inputLen = 10, id = 'phn_no', err_id = 'phn_err');
}