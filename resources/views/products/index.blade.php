<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h2>👨‍💼 Admin Dashboard</h2>

<!-- NAVIGATION -->
<a href="/">🏠 Home</a> |
<a href="{{ route('admin.products.create') }}">➕ Add Product</a>

<hr>

<!-- SUCCESS MESSAGE -->
@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<!-- PRODUCT LIST -->
@foreach($products as $product)
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">

        <h3>{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p><strong>₱{{ $product->price }}</strong></p>
        <p>Stock: {{ $product->stock }}</p>

        @if($product->image)
            <img src="{{ asset('images/'.$product->image) }}" width="100">
        @endif

        <br><br>

        <!-- EDIT -->
        <a href="{{ route('admin.products.edit', $product->id) }}">
            ✏ Edit
        </a>

        <!-- DELETE -->
        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Delete this product?')">
                🗑 Delete
            </button>
        </form>

    </div>
@endforeach

</body>
</html>