@extends('layouts.dashboard')
@section('page_title', 'Category')
@section('page_content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">My Categories</h2>
                <p class="dashboard-subtitle">
                    Manage category
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('dashboard.category.create') }}" class="btn btn-success">Add New Category</a>
                    </div>
                </div>

                @if (session()->has('successMessage'))
                    <div class="class row mt-4">
                        <div class="col-6">
                            <div class="alert alert-success">
                                {{ session()->get('successMessage') }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row mt-4">
                    @foreach ($listCategory as $category)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a class="card card-dashboard-product d-block"
                                href="{{ route('dashboard.category.edit', $category->id) }}">
                                <div class="card-body">
                                    <img src="{{ asset($category->image) }}" alt="" class="w-100 mb-2" />
                                    <div class="product-title">{{ $category->name }}</div>
                                </div>
                                <div class="card-footer">
                                    <form action="{{ route('dashboard.category.delete', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-block btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
