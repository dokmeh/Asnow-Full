@if (session()->has('flash_message'))
    <!--suppress ALL -->
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

        swal({
                title             : "Are you sure?",
                text              : "You will not be able to recover this.",
                type              : "warning",
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText : "Yes, delete it!",
                closeOnConfirm    : false
            },
            function () {
                $("#delete").attr('data-href')
            });

    </script>

@endif


{{--<script>--}}

{{--swal({   //removed the brackets from session because laracasts doesn't show them--}}
{{--title             : "{{ session('flash_message_overlay.title') }}",--}}
{{--text              : "{{ session('flash_message_overlay.message') }}",--}}
{{--type              : "{{ session('flash_message_overlay.type') }}",--}}
{{--showCancelButton  : true,--}}
{{--confirmButtonColor: "#DD6B55",--}}
{{--confirmButtonText : "Yes, delete it!",--}}
{{--cancelButtonText  : "No, cancel please!",--}}
{{--closeOnConfirm    : false,--}}

{{--},--}}

{{--function () {--}}
{{--$("#myform").submit();--}}
{{--});--}}


{{--</script>--}}




