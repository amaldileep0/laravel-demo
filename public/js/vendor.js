$(function () {
    "use strict";

    $('#country').on('change',function() {
    	$('#state option:gt(0)').remove();
    	$('#district option:gt(0)').remove();
    	var id = this.value;

    	if(!id)
    	return false;
    	
    	$.get( '/dropdownlist/get_states/' + id, function( data ) {
		  	var obj = JSON.parse(data)
		  	$.each(obj,function(key,value){
		  		$('#state').append($("<option></option>")
     			.attr("value", key).text(value));
		  	})
		});
    });

    $('#state').on('change',function() {
        $('#district option:gt(0)').remove();
        var id = this.value;

        if(!id)
        return false;
        
        $.get( '/dropdownlist/get_districts/' + id, function( data ) {
            var obj = JSON.parse(data)
            $.each(obj,function(key,value){
                $('#district').append($("<option></option>")
                .attr("value", key).text(value));
            })
        });
    });

    $( document ).ready(function() {
        var country =  $('#country').val();
    });
});