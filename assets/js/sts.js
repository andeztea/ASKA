(function($) {
	
	$(document).ready(function(e) {


		var id = 0;
		var main = "ref/data_status.php";

	
		$("#data-sts").load(main);

		
	
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
			
					$("#data-sts").html(data).show();
				});
			} else {
		
				$("#data-sts").load(main);
			}
		});

	
		$('.ubah,.tambah').live("click", function(){

			var url = "ref/jab.form.php";
			
			id_jab = this.id;

			if(id_jab != 0) {
				
				$("#myModalLabel").html("Ubah Data Jabatan");
			} else {
			
				$("#myModalLabel").html("Tambah Data Jabatan");
			}

			$.post(url, {id: id_jab} ,function(data) {
				
				$(".modal-body").html(data).show();
			});
		});

	
		$('.hapus').live("click", function(){
			var url = "/kirim.php";
			
			id = this.id;

			
			var answer = confirm("Apakah anda ingin menghapus data ini?");

			
			if (answer) {
				
				$.post(url, {hapus: id} ,function() {
				
					$("#data-sts").load(main);
				});
			}
		});

		
		


    });


}) (jQuery);
