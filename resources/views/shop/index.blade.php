<!DOCTYPE html>
<html>
<head>
    <title>Mini Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef2f3, #cfd9df);
        }

        .navbar-modern {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .shop-title {
            font-weight: bold;
            color: #333;
        }

        /* CARD FIX ONLY */
        .product-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            transition: 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }

        .product-img {
            height: 220px;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .price {
            color: #0d6efd;
            font-weight: bold;
            font-size: 18px;
        }

        .buy-tag {
            color: #6c757d;
            font-size: 14px;
            margin-top: auto;
        }

        .see-more {
            cursor: pointer;
            font-size: 14px;
        }

        .team-img {
            width: 100%;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-modern px-3 py-3 sticky-top">

    <a class="navbar-brand shop-title" href="#">🛍 Product Showcase</a>

    <div class="ms-auto d-flex gap-2">

        <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#aboutModal">
            ℹ About Us
        </button>

        <a href="/admin/products" class="btn btn-primary btn-sm">
            👨‍💼 Admin
        </a>

    </div>

</nav>

<div class="container mt-5">

    <h2 class="mb-4 shop-title">🏠 Featured Items</h2>

    <div class="row g-4">

        @foreach($products as $product)
        <div class="col-md-4">

            <div class="card product-card">

                @if(!empty($product->image))
                    <img src="{{ asset('images/'.$product->image) }}" class="product-img">
                @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="product-img">
                @endif

                <div class="card-body">

                    <h5 class="fw-bold">{{ $product->name }}</h5>

                    <p class="text-muted short-text">
                        {{ \Illuminate\Support\Str::limit($product->description, 80) }}
                    </p>

                    <p class="text-muted full-text d-none">
                        {{ $product->description }}
                    </p>

                    <a href="javascript:void(0);" class="see-more text-primary" onclick="toggleText(this)">
                        See more
                    </a>

                    <span class="price mt-2 d-block">₱{{ $product->price }}</span>

                    <p class="buy-tag">
                        📍 Where to Buy: {{ $product->where_to_buy }}
                    </p>

                </div>

            </div>

        </div>
        @endforeach

    </div>

</div>

<!-- ================= ABOUT US (RESTORED EXACTLY) ================= -->
<div class="modal fade" id="aboutModal" tabindex="-1">

  <div class="modal-dialog modal-lg modal-dialog-centered">

    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">📌 About This Website</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <h5 class="fw-bold text-primary">🛍 Product Showcase</h5>

        <p>
            This website is a simple product showcase platform that displays product information such as
            name, description, price, image, and where the product can be purchased.
        </p>

        <p>
            The purpose of this system is to provide users with an easy way to view product details
            without requiring a full e-commerce checkout system.
        </p>

        <hr>

        <h5 class="fw-bold">👨‍💻 People behind This</h5>

        <p class="text-muted">This website was developed by the following members:</p>

        <div class="row g-3">

            <div class="col-md-4 text-center">
                <img src="https://scontent.fceb6-1.fna.fbcdn.net/v/t39.30808-6/484099521_2157590438028746_4150421793785241311_n.jpg?stp=dst-jpg_s417x417_tt6&_nc_cat=105&ccb=1-7&_nc_sid=53a332&_nc_eui2=AeGQ8rRbfSA03ihCKv84riybzGkFeEVKHr3MaQV4RUoevfpXkSHie6YOI9IA-OPVQPMc8tCFMVsjIG2zjoL2A6Yw&_nc_ohc=YooiT5cQWmIQ7kNvwGisfSk&_nc_oc=Adoavp31N_B06QnIfmAvNh0i5E0Qw8mOssX1naWAJYxCQ-VUOGsJNPjg25PvUZoMenA&_nc_zt=23&_nc_ht=scontent.fceb6-1.fna&_nc_gid=3JlHDX3Dl0AimzOPy_oOww&oh=00_Af19ubUzbVmZv8OWk143RWnwGT-jell-NmunoxXaQHdZqA&oe=69F037A9" class="team-img">
                <p class="mt-2 fw-bold">Quellene faith D. Binggoy</p>
                <small>Developer</small>
            </div>

            <div class="col-md-4 text-center">
                <img src="https://scontent.fceb2-2.fna.fbcdn.net/v/t39.30808-6/553359007_1346903263475565_392625274786920410_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=53a332&_nc_eui2=AeEis48YgdJcHnCdIBV4vx0bUGgZcWOThP1QaBlxY5OE_QnldEyiy8ghabEDtHtrB70wCqFwhvXdOsdIkounxW8H&_nc_ohc=NKKer6R4i5oQ7kNvwEvEDIF&_nc_oc=Adph64quL6MG_FSVXaaB4g0MNZTSSitfNoKYKO8k48RvVYWMgC0C-de0wrjm_bW0AOo&_nc_zt=23&_nc_ht=scontent.fceb2-2.fna&_nc_gid=uGo4ZQ5XAFUw5GQukwLnMQ&oh=00_Af1pAlwTaPY6jaWCyUPihvNfQ8tLWwkUefnIMZ1VLwDnJA&oe=69F035E4" class="team-img">
                <p class="mt-2 fw-bold">Kimberly B. Alvarez</p>
                <small>Input Data</small>
            </div>

            <div class="col-md-4 text-center">
                <img src="https://scontent.fceb2-2.fna.fbcdn.net/v/t39.30808-6/673645882_2587031978359724_6226716782232966480_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=1d70fc&_nc_eui2=AeH51-sZRVNqNwC1AReSE2wrKb5uGcCEvHIpvm4ZwIS8cpCTFMNOKrRPo3BaBmdzWbo0a0ugYSYUmNUhnprAD6zO&_nc_ohc=jP9TOH-s1-oQ7kNvwHXPzAy&_nc_oc=AdogAgUi6IWUSqJZgfjuXJJhZXZXLUrsoUWmd1WPcPz5w4-vf1gNIdk1Zbzrc4gmxsc&_nc_zt=23&_nc_ht=scontent.fceb2-2.fna&_nc_gid=JN8uZhAMFZbSQbFXFdpLKQ&oh=00_Af1AEGOoK6G-EYCk5KRgtyPjtwkAKkfuCCLJOUNAzk-vJg&oe=69F00AD5" class="team-img">
                <p class="mt-2 fw-bold">john Daven Sitchon</p>
                <small>Resources</small>
            </div>

            <div class="col-md-4 text-center">
                <img src="https://scontent.fceb6-1.fna.fbcdn.net/v/t39.30808-6/465731485_1919222541905699_7709923496937861190_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=53a332&_nc_eui2=AeGgn1LLc8VQcoF_4gtQQRdKAYKmcEp3t10BgqZwSne3XTF7ReDCeV6nwf6x01CzfPKnQwoojXWIKvecQTJKfZae&_nc_ohc=MPQnGUnFTH4Q7kNvwEW9X8O&_nc_oc=AdrHJHhS1Jyc-3zslX2ijqz36MkWB89wa4rXORdf9aIi7uLfQEsrJ5uAVLH04tGlj68&_nc_zt=23&_nc_ht=scontent.fceb6-1.fna&_nc_gid=TlZ2lVa2GXtV8Vi7fIz6jQ&oh=00_Af1zsBX7JOfX42AAfAoYeaMmUHwvwFDZ1-qzms3X79XkGQ&oe=69F018E0" class="team-img">
                <p class="mt-2 fw-bold">Charles A. Sacanle</p>
                <small>Input Data</small>
            </div>

        </div>

      </div>

    </div>

  </div>

</div>

<script>
function toggleText(el) {
    let card = el.parentElement;
    let shortText = card.querySelector(".short-text");
    let fullText = card.querySelector(".full-text");

    if (fullText.classList.contains("d-none")) {
        fullText.classList.remove("d-none");
        shortText.classList.add("d-none");
        el.innerText = "See less";
    } else {
        fullText.classList.add("d-none");
        shortText.classList.remove("d-none");
        el.innerText = "See more";
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>