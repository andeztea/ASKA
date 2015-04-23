<script type="text/javascript">

    jQuery(function($) {
        $.validator.setDefaults({
            submitHandler: function () {
               forgot();

            }

        });

        $().ready(function () {
            // validate the comment form when it is submitted
            $("#validation-form2").validate({
                errorElement: 'div',
                errorClass: 'help-block',
                focusInvalid: false,
                rules: {
                    email: {
                        required: true,
                        email: true
                    }


                },

                messages: {
                    email: {
                        required: "Mohon isi email anda.",
                        email: "Mohon isi email anda."
                    }

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


        function forgot() {
            $("#loading").html('<div class="alert alert-block alert-success">Mohon Tunggu....</div>');

            $.post('cek_email.php', $("resetemail").serialize(), function (hasil2) {
                $('form input[type="email"]').val('');
                $("#loading").html(hasil2);
            });
        };




    });




</script>