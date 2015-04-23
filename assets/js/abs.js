(function($) {

	$(document).ready(function(e) {

		
		var id_abs = 0;
		var main = "ref/abs.data.php";

		
		$("#data-abs").load(main);

		
		
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
				
					$("#data-abs").html(data).show();
				});
			} else {
				
				$("#data-abs").load(main);
			}
		});

		
		$('.ubah3,.tambah3').live("click", function(){

			var url = "ref/abs.form.php";
			
			id_abs = this.id;

			if(id_abs != 0) {
				
				$("#myModalLabel3").html("Ubah Data Absen");
			} else {
		
			}

			$.post(url, {id: id_abs} ,function(data) {
			
				$(".modal-body").html(data).show();
			});
		});

		
		$('.hapus').live("click", function(){
			var url = "ref/abs.input.php";
		
			id_abs = this.id;

			
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			
			if (answer) {
			
				$.post(url, {hapus: id_abs} ,function() {
					
					$("#data-abs").load(main);
				});
			}
		});

	
		$('.halaman').live("click", function(event){
		
			kd_hal = this.id;

			$.post(main, {halaman: kd_hal} ,function(data) {
			
				$("#data-abs").html(data).show();
			});
		});
		
		
		$("#simpan-abs").bind("click", function(event) {
			var url = "ref/abs.input.php";

			
			var vid_abs = $('input:text[name=id_abs]').val();
			var v_shift= $('input:text[name=shift]').val();
			var vjam_masuk = $('input:text[name=jam_masuk]').val();
			var vjam_pulang = $('input:text[name=jam_pulang]').val();
			var vtransport = $('input:text[name=transport]').val();
			var vuang_shift = $('input:text[name=uang_shift]').val();
			

			
			$.post(url, {id_abs: vid_abs, shift: v_shift, jam_masuk: vjam_masuk, jam_pulang: vjam_pulang, transport: vtransport, uang_shift: vuang_shift, id: id_abs} ,function() {
			
				
				$("#data-abs").load(main);

			
				$('#dialog-abs').modal('hide');

				
				$("#myModalLabel3").html("Tambah Data Absen");
			});
		});
	});
}) (jQuery);
