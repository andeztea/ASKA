(function($) {

	$(document).ready(function(e) {


		var id_user = 0;
		var main = "listuser.php";


		$("#data-lu").load(main);

		

		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {

					$("#data-lu").html(data).show();
				});
			} else {

				$("#data-lu").load(main);
			}
		});

		$('.edit,.new').live("click", function(){

			var url = "lu.form.php";

			id_user = this.id;

			if(id_user != 0) {
		
				$("#myModallu").html("Ubah User");
			} else {
	
				$("#myModallu").html("Tambah Data User");
			}

			$.post(url, {id: id_user} ,function(data) {
				
				$(".modal-body").html(data).show();
			});
		});

		$('.bloked').live("click", function(){
			var url = "lu.input.php";
	
			id_user = this.id;

		
			var answer = confirm("Apakah anda yakin untuk blokir user?");

	
			if (answer) {
	
				$.post(url, {bloked: id_user} ,function() {
				
					$("#data-lu").load(main);
				});
			}
		});
		
		
		$('.appro').live("click", function(){
			var url = "lu.input.php";
	
			id_user = this.id;

		
			var answer = confirm("Apakah anda yakin untuk appove user?");

	
			if (answer) {
	
				$.post(url, {appro: id_user} ,function() {
				
					$("#data-lu").load(main);
				});
			}
		});
	
		$('.hapus2').live("click", function(){
			var url = "lu.input.php";
	
			id_user = this.id;

		
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

	
			if (answer) {
	
				$.post(url, {hapus2: id_user} ,function() {
				
					$("#data-lu").load(main);
				});
			}
		});


		$('.halaman').live("click", function(event){

			kd_hal = this.id;

			$.post(main, {halaman: kd_hal} ,function(data) {

				$("#data-lu").html(data).show();
			});
		});
		

		$("#simpan-lu").bind("click", function(event) {
			var url = "lu.input.php";

	
			var vid_user = $('input:text[name=id_user]').val();
			var vusername= $('input:text[name=username]').val();
			var vpassword = $('input:text[name=password]').val();
			var vlevel_user = $('select[name=level_user]').val();
			var vemail = $('input:text[name=email]').val();
			var vnip = $('input:text[name=nip]').val();
			var vphoto = $('input:text[name=photo]').val();
			
			
			
			

			
			$.post(url, {id_user: vid_user, username: vusername, password: vpassword, email: vemail, photo: vphoto, nip: vnip, level_user: vlevel_user, id: id_user} ,function() {
			
			
				$("#data-lu").load(main);

				
				$('#dialog-lu').modal('hide');

				$("#myModallu").html("Tambah Data User");
			});
		});
	});
}) (jQuery);
