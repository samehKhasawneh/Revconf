/**
 * Created by Izwayyed on 2/28/2015.
 */


/* CHECKS THE REGISTRATION FORM */

function validateFirstName(){
    var d = document.getElementById("firstn");
    var re = /^[A-Za-z- ]+$/;
    if(re.test(document.getElementById("fname").value))
    {

        d.className = d.className + " has-success";
    }
    else
    {

        d.className = d.className + " has-error";

    }
}


function validateLastName(){
    var re = /^[A-Za-z]+$/;
    if(re.test(document.getElementById("fname").value))
    {
        var d = document.getElementById("firstn");
        d.className = d.className + " has-success";
    }
    else
    {
        var d = document.getElementById("firstn");
        d.className = d.className + " has-error";

    }
}

            function generateNoty(type,text) {

    var n = noty({
        text        : text,
        type        : type,
        dismissQueue: true,
        closeWith   : ['click'],
        layout      : 'centerRight',
        timeout     : 50000,
        theme       : 'relax',
        maxVisible  : 10
    });
    console.log('html: ' + n.options.id);
}




//function that checks if the two emails are the same
$(document).ready(function(){

    $("#alert_placeholder").hide();
    var firstEmail = $("#mail");
    var checkEmail = $("#mail2");

    checkEmail.change(function(){
        if(firstEmail.val() != checkEmail.val())
        {
           generateNoty("error","Please Enter The Same Email");

        }
        else
        {
            generateNoty("success","Great");
        }
    });
});

//function that checks if the two passwords are the same

$(document).ready(function(){

    $("#alert_placeholder").hide();
    var pwd1 = $("#pwd1");
    var pwd2 = $("#pwd2");

    pwd2.change(function(){
        if(pwd1.val() != pwd2.val())
        {
            generateNoty("error","Please Enter The Same Pssword");
        }
        else
        {
            generateNoty("success","Great");
        }
    });
});