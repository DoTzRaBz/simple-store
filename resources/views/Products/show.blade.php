<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            border: 1px solid #e9ecef;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-body {
            padding: 20px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-warning {
            transition: background-color 0.3s;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        h2 {
            font-weight: bold;
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        h5.card-title {
            font-weight: bold;
            color: #343a40;
        }

        p.card-text {
            color: #495057;
        }
    </style>
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <div class="container mt-5">
            <h2>Product Details</h2>

            <div class="row mt-4">
                <div class="col-md-4">
                    @if ($product->photo)
                        <img src="{{ Storage::url($product->photo) }}" alt="Product Image" class="product-image">
                    @else
                        <img src="/path-to-your-default-image/default.jpg" alt="Default Image" class="product-image">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Product Name: {{ $product->Nama }}</h5>
                            <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                            <p class="card-text"><strong>Retail Price:</strong> Rp {{ number_format($product->retail_price, 0, ',', '.') }}</p>
                            <p class="card-text"><strong>Wholesale Price:</strong> Rp {{ number_format($product->wholesale_price, 0, ',', '.') }}</p>
                            <p class="card-text"><strong>Min Wholesale Quantity:</strong> {{ $product->min_wholesale_qty }}</p>
                            <p class="card-text"><strong>Quantity Available:</strong> {{ $product->quantity }}</p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Product
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
