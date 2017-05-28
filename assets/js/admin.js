$(document).ready(function(){
	
	function fill_association_details(jsonData){
		console.log(jsonData);
		$("#association-name").html(jsonData.association_name);
		$("#association-iban").html(jsonData.association_iban);
		$("#association-apartments-nr").html(jsonData.association_apartments_nr);
		$("#association-address").html('Str. ' + jsonData.association_street + ', Nr. ' + jsonData.association_street_nr+ ', Bloc ' + jsonData.association_building + ', Sc. ' + jsonData.association_entrance);
		$("#association-cui").html(jsonData.association_cui);
	}
	
	//Check if is the Dashboard page in order to fill the association content
	if($('#select-association').length>0 && $('#association-content').length>0){
		
		var default_association_id = $("#select-association").val();
		$.getJSON(location.protocol+'//'+location.host+'/ajax/get_association/'+default_association_id+'?ts='+$.now()).done(function(jsonData){
				fill_association_details(jsonData);
			})
			.fail(function(){
				console.log("EROARE: Ajax request failed! Please try again.");
			});
		
		$('#select-association').change(function(e){
			var dataID=$(this).val();
			$.getJSON(location.protocol+'//'+location.host+'/ajax/get_association/'+dataID+'?ts='+$.now()).done(function(jsonData){
				fill_association_details(jsonData);
			})
			.fail(function(){
				console.log("ERROR: Ajax request failed! Please try again.");
			});
			return false;
		});
	}
	
	//Check if is the Users page in order to fill the users list
	if($('#select-association').length>0 && $('#users-list').length>0){

		var default_association_id = $("#select-association").val();
		$.ajax(location.protocol+'//'+location.host+'/ajax/users_list/'+default_association_id+'?ts='+$.now()).done(function(jsonData){
				$("#users-list").html(jsonData);
			})
			.fail(function(){
				console.log("EROARE: Ajax request failed! Please try again.");
			});
		
		$('#select-association').change(function(e){
			var dataID=$(this).val();
			$.ajax(location.protocol+'//'+location.host+'/ajax/users_list/'+dataID+'?ts='+$.now()).done(function(jsonData){
				$("#users-list").html(jsonData);
			})
			.fail(function(){
				console.log("ERROR: Ajax request failed! Please try again.");
			});
			return false;
		});
	}
	
});