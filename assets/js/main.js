$(document).ready(function () {
    $('#example').DataTable({
        order: [[0, 'asc']]
    });

var selval ;
    $('.selectpicker').selectpicker();

    function reload_booktags() {
        selval = $("#book_id > option").first()[0].value;

        $("#book_tag > option").each(function(){
            if($(this).attr('data-id') != selval)
            {
                $(this).hide()
            }
            else
            {
                $(this).show();
            }
        });
        $('#book_tag').selectpicker('refresh');
    }

    reload_booktags();


    $("#book_id").on("changed.bs.select",
        function(e, clickedIndex, newValue, oldValue) {
            selval = this.value;
            $("#book_tag > option").each(function(){
               if($(this).attr('data-id') != selval)
               {
                   $(this).hide()
               }
               else
               {
                   $(this).show();
               }
            });
            $('#book_tag').selectpicker('refresh');

        });

});

