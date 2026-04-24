<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

    <h2>👨‍💼 Admin Dashboard</h2>

    <!-- NAVIGATION -->
    <a href="/" class="btn btn-secondary btn-sm">🏠 Home</a>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">➕ Add Product</a>

    <hr>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">

        @foreach($products as $product)
        <div class="col-md-4">

            <div class="card mb-3 shadow-sm">

                {{-- IMAGE --}}
                @if(!empty($product->image))
                    <img src="{{ asset('images/'.$product->image) }}"
                         class="card-img-top"
                         style="height:200px; object-fit:cover;">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image"
                         class="card-img-top"
                         style="height:200px; object-fit:cover;">
                @endif

                <div class="card-body">

                    <h5 class="fw-bold">{{ $product->name }}</h5>

                    <p class="text-muted">{{ $product->description }}</p>

                    <p class="text-primary fw-bold">
                        ₱{{ $product->price }}
                    </p>

                    <!-- 🔥 REPLACED STOCK -->
                    <p class="text-secondary">
                        📍 Where to Buy: {{ $product->where_to_buy }}
                    </p>

                    <div class="d-flex gap-2">

                        <a href="{{ route('admin.products.edit', $product->id) }}"
                           class="btn btn-warning btn-sm w-50">
                            Edit
                        </a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                              method="POST"
                              class="w-50">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm w-100"
                                    onclick="return confirm('Delete this product?')">
                                Delete
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>
        @endforeach

    </div>

</div>

</body>
</html>