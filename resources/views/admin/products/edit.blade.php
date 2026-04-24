<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #141e30, #243b55);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .glass-card {
            width: 100%;
            max-width: 650px;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            padding: 30px;
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.4);
            color: #fff;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .form-control {
            background: rgba(255,255,255,0.15);
            border: none;
            color: #fff;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.25);
            box-shadow: none;
            color: #fff;
        }

        .btn-update {
            width: 100%;
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            border: none;
            padding: 10px;
            font-weight: bold;
            border-radius: 10px;
        }

        .btn-update:hover {
            opacity: 0.9;
        }

        .back-btn {
            color: #fff;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 15px;
        }

        .back-btn:hover {
            text-decoration: underline;
        }

        .preview-img {
            width: 120px;
            border-radius: 10px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="glass-card">

    <a href="{{ route('admin.products.index') }}" class="back-btn">⬅ Back</a>

    <h2>✏ Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

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
                   placeholder="Shopee / Lazada / TikTok Shop / Store Name"
                   required>
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>

            @if($product->image)
                <img src="{{ asset('images/'.$product->image) }}" class="preview-img">
            @else
                <p>No image</p>
            @endif
        </div>

        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-update">Update Product</button>

    </form>

</div>

</body>
</html>