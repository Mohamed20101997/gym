@if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: "{{ $error }}",
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            </script>
        @endforeach
@endif
