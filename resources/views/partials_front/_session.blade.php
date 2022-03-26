@if (session('success'))
    <script>
        Swal.fire({
            title: 'success',
            text: "{{ session('success') }}",
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        })

    </script>
@endif
