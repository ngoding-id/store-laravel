@extends('layouts.auth')
@section('page_title', 'Register')

@section('content')
    <!-- Page Content -->
    <div class="page-content page-auth mt-5" id="register">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <h2>
                            Memulai untuk jual beli <br />
                            dengan cara terbaru
                        </h2>
                        <form class="mt-3" method="POST" action="{{ route('storeUser') }}">
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="full_name"
                                    class="form-control @error('full_name') is-invalid @enderror"
                                    aria-describedby="nameHelp" v-model="name" value="{{ old('full_name') }}" autofocus />
                                @error('full_name')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp"
                                    v-model="email" value="{{ old('email') }}" />
                                @error('email')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" />
                                @error('password')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Store</label>
                                <p class="text-muted">
                                    Apakah anda juga ingin membuka toko?
                                </p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input @error('is_store_open') is-invalid @enderror"
                                        type="radio" name="is_store_open" id="openStoreTrue" v-model="is_store_open"
                                        value="true" @if (old('is_store_open') == 'true') checked @endif />
                                    <label class="custom-control-label" for="openStoreTrue">Iya, boleh</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input @error('is_store_open') is-invalid @enderror"
                                        type="radio" name="is_store_open" id="openStoreFalse" v-model="is_store_open"
                                        value="false" @if (old('is_store_open') == 'false') checked @endif />
                                    <label makasih class="custom-control-label" for="openStoreFalse">Enggak, makasih</label>
                                </div>

                                @error('is_store_open')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group" v-if="is_store_open">
                                <label>Nama Toko</label>
                                <input type="text" class="form-control @error('store_name') is-invalid @enderror"
                                    value="{{ old('store_name') }}" name="store_name" aria-describedby="storeHelp" />
                                @error('store_name')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group" v-if="is_store_open">
                                <label>Kategori</label>
                                <select name="category" class="form-control">
                                    <option value="" disabled>Select Category</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success btn-block mt-4">
                                Sign Up Now
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                                Back to Sign In
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- @if ($errors->any())
        <script>
            Toastify({
                text: "{{ $errors()->getBag('default')->first() }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "center",
                onClick: function() {}
            }).showToast();
        </script>
    @endif --}}
@endsection
