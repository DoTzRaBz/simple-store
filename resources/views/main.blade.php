<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .img-thumbnail {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .table {
            margin-bottom: 30px;
        }

        .pagination {
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Product List</h1>

        @if ($products->count() > 0)
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ $product->photo ? Storage::url($product->photo) : 'https://placehold.co/200' }}" class="card-img-top img-thumbnail" alt="Product Image">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->Nama }}</h5>
                                <p class="card-text">Rp {{ number_format($product->retail_price, 0, ',', '.') }}</p>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View Product</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Menampilkan pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        @else
            <p class="text-center">No products available.</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
