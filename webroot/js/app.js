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

        //send ajax call
        $.ajax({
            method: 'GET',
            url: $(this).attr('href')
        })
        .done(function(data){
            if (data.data.message == "Added") {
                alert("The property was " + data.data.message + " in your Favorites list");
            } else {
                alert("The property was " + data.data.message + " from your Favorites list");
            }
        });
    });
});
