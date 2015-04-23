//This is similar to the file-upload.html example
//Replace the code inside profile page where it says ***UPDATE AVATAR HERE*** with the code below


//please modify submit_url accordingly
var submit_url = 'examples/file-upload.php';
var deferred;


//if value is empty, means no valid files were selected
//but it may still be submitted by the plugin, because "" (empty string) is different from previous non-empty value whatever it was
//so we return just here to prevent problems
var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
if(!value || value.length == 0) {
	deferred = new $.Deferred
	deferred.resolve();
	return deferred.promise();
}

var $form = $('#avatar').next().find('.editableform:eq(0)')
var file_input = $form.find('input[type=file]:eq(0)');

//user iframe for older browsers that don't support file upload via FormData & Ajax
if( !("FormData" in window) ) {
	deferred = new $.Deferred

	var iframe_id = 'temporary-iframe-'+(new Date()).getTime()+'-'+(parseInt(Math.random()*1000));
	$form.after('<iframe id="'+iframe_id+'" name="'+iframe_id+'" frameborder="0" width="0" height="0" src="about:blank" style="position:absolute;z-index:-1;"></iframe>');
	$form.append('<input type="hidden" name="temporary-iframe-id" value="'+iframe_id+'" />');
	$form.next().data('deferrer' , deferred);//save the deferred object to the iframe
	$form.attr({'method' : 'POST', 'enctype' : 'multipart/form-data',
				'target':iframe_id, 'action':submit_url});

	$form.get(0).submit();

	//if we don't receive the response after 60 seconds, declare it as failed!
	setTimeout(function(){
		var iframe = document.getElementById(iframe_id);
		if(iframe != null) {
			iframe.src = "about:blank";
			$(iframe).remove();
			
			deferred.reject({'status':'fail','message':'Timeout!'});
		}
	} , 60000);
}
else {
	var fd = null;
	try {
		fd = new FormData($form.get(0));
	} catch(e) {
		//IE10 throws "SCRIPT5: Access is denied" exception,
		//so we need to add the key/value pairs one by one
		fd = new FormData();
		$.each($form.serializeArray(), function(index, item) {
			fd.append(item.name, item.value);
		});
		//and then add files because files are not included in serializeArray()'s result
		$form.find('input[type=file]').each(function(){
			if(this.files.length > 0) fd.append(this.getAttribute('name'), this.files[0]);
		});
	}
	
	//if file has been drag&dropped , append it to FormData
	if(file_input.data('ace_input_method') == 'drop') {
		var files = file_input.data('ace_input_files');
		if(files && files.length > 0) {
			fd.append(file_input.attr('name'), files[0]);
		}
	}

	deferred = $.ajax({
		url: submit_url,
		type: 'POST',
		processData: false,
		contentType: false,
		dataType: 'json',
		data: fd,
		xhr: function() {
			var req = $.ajaxSettings.xhr();
			/*if (req && req.upload) {
				req.upload.addEventListener('progress', function(e) {
					if(e.lengthComputable) {	
						var done = e.loaded || e.position, total = e.total || e.totalSize;
						var percent = parseInt((done/total)*100) + '%';
						//bar.css('width', percent).parent().attr('data-percent', percent);
					}
				}, false);
			}*/
			return req;
		},
		beforeSend : function() {
			//bar.css('width', '0%').parent().attr('data-percent', '0%');
		},
		success : function() {
			//bar.css('width', '100%').parent().attr('data-percent', '100%');
		}
	})
}



deferred.done(function(res){
	if(res.status == 'OK') $('#avatar').get(0).src = res.url;
	else alert(res.message);
}).fail(function(res){
	alert("Failure");
});


return deferred.promise();