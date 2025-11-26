<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - BookHaven Admin</title>
    <script>
        // Redirect to the proper kategori index page
        window.location.href = "{{ route('admin.kategori.index') }}";
    </script>
</head>
<body>
    <div style="text-align: center; padding: 50px; font-family: Arial, sans-serif;">
        <h2>Mengalihkan ke halaman kategori...</h2>
        <p>Jika halaman tidak otomatis dialihkan, <a href="{{ route('admin.kategori.index') }}">klik di sini</a>.</p>
    </div>
</body>
</html>