<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2>✏ Edit Product</h2>

    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mb-3">⬅ Back</a>

    <!-- ERRORS -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="card p-4 shadow-sm">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>

        <!-- 🔥 REPLACED STOCK -->
        <div class="mb-3">
            <label>Where to Buy</label>
            <input type="text"
                   name="where_to_buy"
                   value="{{ $product->where_to_buy }}"
                   class="form-control"
                   placeholder="Shopee / Lazada / TikTok Shop"
                   required>
        </div>

        <!-- IMAGE -->
        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        @if($product->image)
            <div class="mb-3">
                <label>Current Image</label><br>
                <img src="{{ asset('images/'.$product->image) }}" width="120" class="rounded shadow-sm">
            </div>
        @endif

        <button type="submit" class="btn btn-success w-100">
            Update Product
        </button>

    </form>

</div>

</body>
</html>