<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2>➕ Add Product</h2>

    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mb-3">⬅ Back</a>

    <!-- 🔥 SHOW VALIDATION ERRORS -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <!-- 🔥 REPLACED STOCK WITH WHERE TO BUY -->
        <div class="mb-3">
            <label>Where to Buy</label>
            <input type="text" name="where_to_buy" class="form-control" placeholder="Shopee / Lazada / TikTok Shop" required>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Save Product
        </button>

    </form>

</div>

</body>
</html>