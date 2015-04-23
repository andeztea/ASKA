<script type="text/javascript">
	
	jQuery(function($) {

        $.validator.setDefaults({
            submitHandler: function () {
                login();

            }

        });

        $().ready(function () {

            // validate the comment form when it is submitted
            $("#loginF").validate({
                errorElement: 'div',
                errorClass: 'help-block',
                focusInvalid: true,
                rules: {


                    username: {
                        required: true
                    },

                    passlogin: {
                        required: true
                    }


                },

                messages: {

                    username: "Mohon isi Username anda",
                    passlogin: "Mohon isi Password anda"


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


        function login() {
            $("#loading").html('<div class="alert alert-block alert-success">Mohon Tunggu....</div>');

            $.post('cek_login.php', $("form").serialize(), function (hasil) {
                $('form input[type="text"],form input[type="password"]').val('');
                $("#loading").html(hasil);
            });
        }

    });


</script>