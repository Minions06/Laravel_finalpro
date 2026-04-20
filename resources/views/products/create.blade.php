<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h1>Add Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Product Name"><br><br>

    <textarea name="description" placeholder="Description"></textarea><br><br>

    <input type="number" name="price" placeholder="Price"><br><br>

    <input type="number" name="stock" placeholder="Stock"><br><br>

    <input type="file" name="image"><br><br>

    <button type="submit">Save</button>
</form>

</body>
</html>