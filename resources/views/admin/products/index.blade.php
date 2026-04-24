<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef2f3, #cfd9df);
        }

        /* NAVBAR */
        .navbar-modern {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 15px 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            position: sticky;
            top: 10px;
            z-index: 999;
        }

        .title {
            font-weight: bold;
            color: #333;
        }

        /* CARD */
        .card-modern {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            transition: 0.3s;

            /* FIXED SIZE */
            height: 430px;
            display: flex;
            flex-direction: column;
        }

        .card-modern:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            flex: 1;
            overflow: hidden;
        }

        .btn-modern {
            border-radius: 10px;
        }

        .price {
            color: #0d6efd;
            font-weight: bold;
        }

        .buy-text {
            color: #6c757d;
            font-size: 14px;
        }

        /* DESCRIPTION CONTROL */
        .text-muted {
            font-size: 14px;
        }

        .see-more {
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container mt-4">

    <!-- NAV -->
    <div class="navbar-modern d-flex justify-content-between align-items-center mb-4">

        <h3 class="title">👨‍💼 Admin Dashboard</h3>

        <div>
            <a href="/" class="btn btn-outline-secondary btn-sm btn-modern">🏠 Home</a>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm btn-modern">➕ Add Product</a>
        </div>

    </div>

    <!-- SUCCESS -->
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">

        @foreach($products as $product)
        <div class="col-md-4">

            <div class="card card-modern">

                {{-- IMAGE --}}
                @if(!empty($product->image))
                    <img src="{{ asset('images/'.$product->image) }}" class="product-img">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="product-img">
                @endif

                <div class="card-body">

                    <h5 class="fw-bold">{{ $product->name }}</h5>

                    <!-- DESCRIPTION (SEE MORE) -->
                    <div class="description-box">

                        <p class="text-muted short-text">
                            {{ \Illuminate\Support\Str::limit($product->description, 80) }}
                        </p>

                        <p class="text-muted full-text d-none">
                            {{ $product->description }}
                        </p>

                        <a href="javascript:void(0);" class="text-primary see-more" onclick="toggleDesc(this)">
                            See more
                        </a>

                    </div>

                    <h6 class="price mt-2">₱{{ $product->price }}</h6>

                    <!-- WHERE TO BUY -->
                    <p class="buy-text">
                        📍 Where to Buy: {{ $product->where_to_buy }}
                    </p>

                    <div class="d-flex gap-2">

                        <a href="{{ route('admin.products.edit', $product->id) }}"
                           class="btn btn-warning btn-sm w-50 btn-modern">
                            Edit
                        </a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                              method="POST"
                              class="w-50">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm w-100 btn-modern"
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

<!-- JS TOGGLE -->
<script>
function toggleDesc(el) {
    let card = el.closest(".card-body");

    let shortText = card.querySelector(".short-text");
    let fullText = card.querySelector(".full-text");

    if (fullText.classList.contains("d-none")) {
        shortText.classList.add("d-none");
        fullText.classList.remove("d-none");
        el.innerText = "See less";
    } else {
        shortText.classList.remove("d-none");
        fullText.classList.add("d-none");
        el.innerText = "See more";
    }
}
</script>

</body>
</html>