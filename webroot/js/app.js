/**
 * Application wide Javascript
 * @author Touhidur Rahman
 */
  $(document).ready(function() {

      // search sidebar available from and to date fields, using bootstrap datepicker
      $('#fromDt').datepicker({
          format: "yyyy-mm-dd"
      });
      $('#toDt').datepicker({
          format: "yyyy-mm-dd"
      });

      // ajax call to toggle favorite
      $('.favTogglers').click(function(e){
            // prevent link to do the default action
            e.preventDefault();

            // send ajax call
            $.ajax({
                method: 'GET',
                url: this.prop('href')
            })
            .done(function(data){
                alert(data.data.message);
            });
      });
  });
