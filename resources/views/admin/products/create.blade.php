<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #1f1c2c, #928dab);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .glass-card {
            width: 100%;
            max-width: 600px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 30px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            color: #fff;
        }

        .glass-card h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .form-control {
            background: rgba(255,255,255,0.2);
            border: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: #ddd;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.3);
            box-shadow: none;
            color: #fff;
        }

        .btn-custom {
            width: 100%;
            background: linear-gradient(90deg, #ff6a00, #ee0979);
            border: none;
            padding: 10px;
            font-weight: bold;
            border-radius: 10px;
        }

        .btn-custom:hover {
            opacity: 0.9;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 15px;
            color: #fff;
            text-decoration: none;
        }

        .back-btn:hover {
            text-decoration: underline;
        }

        input, textarea {
            color: #fff !important;
        }
    </style>
</head>

<body>

<div class="glass-card">

    <a href="{{ route('admin.products.index') }}" class="back-btn">⬅ Back</a>

    <h2>➕ Add Product</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <!-- PRODUCT NAME -->
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
        </div>

        <!-- DESCRIPTION -->
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" placeholder="Enter description" required></textarea>
        </div>

        <!-- PRICE -->
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" placeholder="₱0.00" required>
        </div>

        <!-- WHERE TO BUY (REPLACES STOCK) -->
        <div class="mb-3">
            <label>Where to Buy</label>
            <input type="text"
                   name="where_to_buy"
                   class="form-control"
                   placeholder="Shopee / Lazada / TikTok Shop / Store Name"
                   required>
        </div>

        <!-- IMAGE -->
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-custom">Save Product</button>

    </form>

</div>

</body>
</html>