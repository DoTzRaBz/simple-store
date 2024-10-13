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
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            margin: 0 auto;
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .btn-sm {
            margin-right: 5px;
        }

        .img-thumbnail {
            width: 100px;
            height: auto;
        }

        table.table {
            table-layout: fixed;
            word-wrap: break-word;
        }

        th,
        td {
            vertical-align: middle !important;
        }

        .col-photo {
            width: 120px;
        }

        .col-actions {
            width: 180px;
        }

        .btn-group-sm {
            display: flex;
            justify-content: center;
        }

        form {
            display: inline;
        }

        .table-scroll {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <div class="container mt-5">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>Product List</h2>
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Product
                    </a>
                </div>
                <div class="card-body table-scroll">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <table class="table table-hover table-bordered">
                        <thead class="table-primary">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Retail Price</th>
                                <th>Wholesale Price</th>
                                <th>Min Wholesale Qty</th>
                                <th>Quantity</th>
                                <th class="col-photo">Photo</th>
                                <th class="col-actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $product->Nama }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td class="text-center">Rp {{ number_format($product->retail_price, 0, ',', '.') }}</td>
                                    <td class="text-center">Rp {{ number_format($product->wholesale_price, 0, ',', '.') }}</td>
                                    <td class="text-center">{{ $product->min_wholesale_qty }}</td>
                                    <td class="text-center">{{ $product->quantity }}</td>
                                    <td class="text-center">
                                        @if ($product->photo)
                                            <img src="{{ Storage::url($product->photo) }}" class="img-thumbnail" alt="Product Image">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i><br>Edit
                                            </a>
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info" title="Show">
                                                <i class="fas fa-eye"></i><br>View
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Delete">
                                                    <i class="fas fa-trash-alt"></i><br>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
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
