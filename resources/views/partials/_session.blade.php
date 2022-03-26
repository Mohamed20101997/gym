@if (session('success'))
    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{ session('success') }}",
            timeout: 2000,
            progressbar:true,
            killer: true
        }).show();


    </script>
@endif
