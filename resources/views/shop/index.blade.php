<!DOCTYPE html>
<html>
<head>
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="#">🛍 Mini Shop</a>
    <a href="/admin/products" class="btn btn-warning">👨‍💼 Admin</a>
</nav>

<div class="container mt-5">

    <h1 class="mb-4">🏠 Home Shop</h1>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- EMPTY STATE -->
    @if($products->isEmpty())
        <div class="alert alert-info">
            No products available.
        </div>
    @endif

    <!-- PRODUCTS -->
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4">
            <div class="card mb-3 shadow-sm">

                @if($product->image)
                    <img src="{{ asset('images/'.$product->image) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>

                    <p class="text-primary fw-bold">
                        ₱{{ $product->price }}
                    </p>

                    <p class="text-muted">
                        Stock: {{ $product->stock }}
                    </p>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>

</body>
</html>