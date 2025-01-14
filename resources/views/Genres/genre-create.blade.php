<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="genre-create"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Genres' subPage='Create Genre'
            titleUrl="{{ route('genres.index') }}"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid vh-100 px-2 px-md-4">
            <div class="row justify-content-center align-items-center h-75">
                <div class="col-12 col-md-4 pe-0 h-100">
                    <img src="{{ asset('assets/img/genre.jpg') }}" class="w-100 h-100" alt="">
                </div>
                <div class="col-12 col-md-4 ps-0 h-100">
                    <div class="card h-100 rounded-0">
                        <div class="card-body d-flex align-items-center">
                            <div class="">
                                <form action="{{ route('genres.store') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" value="{{old('name')}}" class="d-block border-primary rounded-2 p-2 " name="name" id="">
                                        @error('name')
                                            <div class="text-danger inputerror">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <button class="btn btn-primary">Create Genre</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>


</x-layout>
