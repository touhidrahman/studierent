/**
* Application wide Javascript
*/
$(document).ready(function() {

    /**
    * search sidebar available from and to date fields, using bootstrap datepicker
    * @author Touhidur Rahman
    */
    $('#fromDt').datepicker({
        format: "yyyy-mm-dd"
    });
    $('#toDt').datepicker({
        format: "yyyy-mm-dd"
    });

    /**
    * ajax call to toggle favorite
    * @author Touhidur Rahman
    */
    $('.favTogglers').click(function(e){
        // prevent link to do the default action
        e.preventDefault();
        var elem = $(this);
        //send ajax call
        $.ajax({
            method: 'GET',
            url: $(this).attr('href')
        })
        .done(function(data){
            if (data.data.message == "Added") {
                elem.removeClass('text-danger').addClass('btn-danger');
                alert("The property was " + data.data.message + " in your Favorites list");
            } else {
                elem.removeClass('btn-danger').addClass('text-danger');
                alert("The property was " + data.data.message + " from your Favorites list");
            }
        });
    });

    /**
     * Password mismatch indicator
     * @author Ramanpreet Kaur
     */
     function myFunction() {
         //Store the password field objects into variables ...
     var pass1 = document.getElementById('pass1');
     var pass2 = document.getElementById('pass2');
     //Store the Confimation Message Object ...
     var message = document.getElementById('confirmMessage');
     //Set the colors we will be using ...
     var goodColor = "#66cc66";
     var badColor = "#ff6666";
     //Compare the values in the password field
     //and the confirmation field
     if(pass1.value == pass2.value){
         //The passwords match.
         //Set the color to the good color and inform
         //the user that they have entered the correct password
         pass2.style.borderColor = goodColor;
         message.style.color = goodColor;
         message.innerHTML = "Passwords Match!"
     }else{
         //The passwords do not match.
         //Set the color to the bad color and
         //notify the user.
         pass2.style.borderColor = badColor;
         message.style.color = badColor;
         message.innerHTML = "Passwords Do Not Match!"
     }
     }
});
