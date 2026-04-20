<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $product->name }}"><br><br>

    <textarea name="description">{{ $product->description }}</textarea><br><br>

    <input type="number" name="price" value="{{ $product->price }}"><br><br>

    <input type="number" name="stock" value="{{ $product->stock }}"><br><br>

    <!-- IMAGE -->
    <input type="file" name="image"><br><br>

    @if($product->image)
        <img src="{{ asset('images/'.$product->image) }}" width="100"><br><br>
    @endif

    <button type="submit">Update</button>
</form>

</body>
</html>