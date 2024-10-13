<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section h5 {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .file-upload {
            margin-top: 10px;
        }

        .file-upload input {
            padding: 5px;
        }

        .preview-image {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <div class="container mt-5">
            <h2>Edit Product</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card mt-4">
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-section">
                            <h5>Product Information</h5>
                            <div class="form-group">
                                <label for="Nama">Product Name</label>
                                <input type="text" class="form-control @error('Nama') is-invalid @enderror"
                                    id="Nama" name="Nama" value="{{ old('Nama', $product->Nama) }}" required>
                                @error('Nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-section">
                            <h5>Pricing</h5>
                            <div class="form-group">
                                <label for="retail_price">Retail Price</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('retail_price') is-invalid @enderror" id="retail_price"
                                    name="retail_price" value="{{ old('retail_price', $product->retail_price) }}" required>
                                @error('retail_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="wholesale_price">Wholesale Price</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('wholesale_price') is-invalid @enderror" id="wholesale_price"
                                    name="wholesale_price" value="{{ old('wholesale_price', $product->wholesale_price) }} "
                                    required>
                                @error('wholesale_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-section">
                            <h5>Quantity</h5>
                            <div class="form-group">
                                <label for="min_wholesale_qty">Min Wholesale Quantity</label>
                                <input type="number" class="form-control @error('min_wholesale_qty') is-invalid @enderror"
                                    id="min_wholesale_qty" name="min_wholesale_qty"
                                    value="{{ old('min_wholesale_qty', $product->min_wholesale_qty) }}" required>
                                @error('min_wholesale_qty')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                                    required>
                                @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-section">
                            <h5>Product Photo (optional)</h5>
                            <div class="file-upload">
                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo">
                                @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <img id="preview" alt="Product Image" class="preview-image">
                            <p id="fileName" class="mt-2"></p>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Product
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('photo').onchange = function(evt) {
            var [file] = this.files;
            if (file) {
                document.getElementById('preview').src = URL.createObjectURL(file);
                document.getElementById('fileName').textContent = file.name;
            } else {
                document.getElementById('preview').src = "";
                document.getElementById('fileName').textContent = "";
            }
        }
    </script>
</body>

</html>
