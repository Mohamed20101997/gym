@if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                new Noty({
                    type: 'error',
                    layout: 'topRight',
                    text: "{{ $error }}",
                    theme:'sunset',
                    timeout: 3000,
                    progressbar:true,
                }).show();
            </script>
        @endforeach
@endif