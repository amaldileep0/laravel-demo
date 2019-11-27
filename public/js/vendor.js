$(function () {
    "use strict";

    $('#country').on('change',function() {
    	$('#state option:gt(0)').remove();
    	$('#district option:gt(0)').remove();
    	var id = this.value;

    	if (!id)
    	return false;

        setStates(id);
    });

    $('#state').on('change',function() {
        $('#district option:gt(0)').remove();
        var id = this.value;

        if (!id)
        return false;

        setDistricts(id);
    });
     
    var setStates = function(countryId) {
        getStates(countryId).then(function (response) {
            var obj = JSON.parse(response)
            $.each(obj, function(key,value) {
                $('#state').append($("<option></option>")
                .attr("value", key).text(value));
            })
        }).fail(function (err) {
            console.log(err)                               
        })
    };

    var setDistricts = function(stateId) {
        getDistricts(stateId).then(function (response) {
            var obj = JSON.parse(response)
            $.each(obj, function(key,value) {
                $('#district').append($("<option></option>")
                .attr("value", key).text(value));
            })
        }).fail(function (err) {
            console.log(err)                               
        })
    };
    
    var getStates = function(countryId) {
        return window.App.Ajax.request({ url:'/dropdownlist/get_states/' + countryId, 
        method: 'get'})
    };

    var getDistricts = function(stateId) {
        return window.App.Ajax.request({ url:'/dropdownlist/get_districts/' + stateId,
            method: 'get'})
    };
});