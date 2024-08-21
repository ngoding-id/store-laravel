@extends('layouts.dashboard')
@section('page_title', 'Create Category')
@section('page_content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Edit Category</h2>
                <p class="dashboard-subtitle">
                    Modify existing category.
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row justify-content-center mt-5">
                    <div class="col-8">
                        <form action="{{ route('dashboard.category.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            @if (session()->has('errorMessage'))
                                <div class="card">
                                    <div class="alert alert-danger">{{ session()->get('errorMessage') }}</div>
                                </div>
                            @endif

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Category Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    aria-describedby="name" name="categoryName"
                                                    value="{{ old('categoryName', $category->name) }}" />
                                                @error('categoryName')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="image">Category Icon</label>
                                            <img src="{{ asset($category->image) }}" class="w-25 d-block" />
                                            <input type="file" accept=".svg" class="form-control p-1" name="image" />
                                            @error('image')
                                                <p class="text text-danger">{{ $message }}</p>
                                            @enderror
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
