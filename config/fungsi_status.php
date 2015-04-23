<script type="text/javascript">
	
	jQuery(function($) {

        $.validator.setDefaults({
            submitHandler: function () {
                statusv();

            }

        });

        $().ready(function () {

            // validate the comment form when it is submitted
            $("#statusF").validate({
                errorElement: 'div',
                errorClass: 'help-block',
                focusInvalid: true,
                rules: {


                    status: {
                        required: true
                    }


                },

                messages: {

                    status: "Status Tidak Boleh Kosong"


                },


                highlight: function (e) {
                    $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                },

                success: function (e) {
                    $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                    $(e).remove();
                }

            })
        });


        function statusv() {

            $.post('kirim.php', $("form").serialize(), function (hasil) {
                $('form input[type="text"],form input[type="text"]').val('');
                $("#loading").html(hasil);
				$("#data-sts").load(main);
            });
        }

		
		
		
    });


</script>