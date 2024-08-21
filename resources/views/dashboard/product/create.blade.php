@extends('layouts.dashboard')
@section('page_title', 'Create Product')
@section('page_content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Add New Product</h2>
                <p class="dashboard-subtitle">
                    Create your own product
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Product Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    aria-describedby="name" name="productName"
                                                    value="{{ old('productName') }}" />
                                                @error('productName')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" class="form-control" id="price"
                                                    aria-describedby="price" name="price" value="{{ old('price') }}" />
                                                @error('price')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="" cols="30" rows="4" class="form-control">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="thumbnails">Thumbnails</label>
                                                <input type="file" multiple class="form-control pt-1" id="thumbnails"
                                                    aria-describedby="thumbnails" name="thumbnails" />
                                                <small class="text-muted">
                                                    Kamu dapat memilih lebih dari satu file
                                                </small>
                                                @error('thumbnails')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="thumbnails">Category</label>
                                                <select name="category_id" class="form-control">
                                                    @foreach ($categories as $category)
                                                        <option>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button type="submit" class="btn btn-success btn-block px-5">
                                        Save Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
