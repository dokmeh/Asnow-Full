@if (session()->has('flash_message'))
    <script>
        swal({
            title            : "{{ session('flash_message.title') }}",
            text             : "{{ session('flash_message.message') }}",
            type             : "{{ session('flash_message.type') }}",
            timer            : 2000,
            showConfirmButton: false
        });
    </script>
@endif

@if (session()->has('flash_message_overlay'))
    <script>
        swal({
            title            : "{{ session('flash_message_overlay.title') }}",
            text             : "{{ session('flash_message_overlay.message') }}",
            type             : "{{ session('flash_message_overlay.type') }}",
            confirmButtonText: 'Okay',
        });
    </script>
@endif

@if (session()->has('flash_message_delete'))

    <script>

        swal({   //removed the brackets from session because laracasts doesn't show them
                title             : "{{ session('flash_message_overlay.title') }}",
                text              : "{{ session('flash_message_overlay.message') }}",
                type              : "{{ session('flash_message_overlay.type') }}",
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText : "Yes, delete it!",
                cancelButtonText  : "No, cancel please!",
                closeOnConfirm    : false,
                closeOnCancel     : false
            },

            function (isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Your file has been deleted.", "success");
                }

                else {
                    swal("Cancelled", "Your file is safe", "error");
                }
            });

    </script>

@endif


