(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var id_jab = 0;
		var main = "ref/bag.data.php";

		// tampilkan data mahasiswa dari berkas mahasiswa.data.php
		// ke dalam <div id="data-mahasiswa"></div>
		$("#data-bag2").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
					$("#data-bag2").html(data).show();
				});
			} else {
				// tampilkan data mahasiswa dari berkas mahasiswa.data.php
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-bag2").load(main);
			}
		});

		// ketika tombol ubah/tambah ditekan
		$('.ubah2,.tambah2').live("click", function(){

			var url = "ref/bag.form.php";
			// ambil nilai id dari tombol ubah
			id_bag = this.id;

			if(id_bag != 0) {
				// ubah judul modal dialog
				$("#myModalLabel2").html("Ubah Data Bagian");
			} else {
				// saran dari mas hangs
				$("#myModalLabel2").html("Tambah Data Bagian");
			}

			$.post(url, {id: id_bag} ,function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body2").html(data).show();
			});
		});

		// ketika tombol hapus ditekan
		$('.hapus2').live("click", function(){
			var url = "ref/bag.input.php";
			// ambil nilai id dari tombol hapus
			id_bag = this.id;

			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");

			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus2: id_bag} ,function() {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
					$("#data-bag2").load(main);
				});
			}
		});

		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			kd_hal = this.id;

			$.post(main, {halaman: kd_hal} ,function(data) {
				// tampilkan data mahasiswa yang sudah di perbaharui
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-bag2").html(data).show();
			});
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-bag2").bind("click", function(event) {
			var url = "ref/bag.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var vid_bag = $('input:text[name=id_bag]').val();
			var vn_bag= $('input:text[name=n_bag]').val();
			var vkd_bag = $('input:text[name=kd_bag]').val();
			
			

			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {id_bag: vid_bag, n_bag: vn_bag, kd_bag: vkd_bag, id: id_bag} ,function() {
			
				// tampilkan data mahasiswa yang sudah di perbaharui
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-bag2").load(main);

				// sembunyikan modal dialog
				$('#dialog-bag2').modal('hide');

				// kembalikan judul modal dialog
				$("#myModalLabel2").html("Tambah Data Bagian");
			});
		});
	});
}) (jQuery);
