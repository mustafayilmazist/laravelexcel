<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <meta name="theme-color" content="#7952b3">
</head>
<body class="bg-light">
    
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Excel import</h2>
                <p class="lead">Dosyayı seçin ve kaydet basın</p>
            </div>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <form class="card p-2" action="{{ route('excel.import.store') }}" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            @csrf
                            <input type="file" name="file">
                            <button type="submit" class="btn btn-secondary">Kaydet</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </main>
    </div>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>