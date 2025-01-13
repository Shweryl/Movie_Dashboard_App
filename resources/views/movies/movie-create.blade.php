<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="movie-create"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Movies' subPage='Create Movie' titleUrl="{{route('movies.index')}}"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div id="previewImg" class="page-header min-height-400 border-radius-xl mt-4"
                style="background-image: url('https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg'); object-fit : contain;">
                {{-- <span class="mask  bg-gradient-primary  opacity-6"></span> --}}
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Movie Information</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        {{-- @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif --}}
                        <form method='POST' action='{{ route('movies.store') }}' enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control border border-2 p-2"
                                        value=''>
                                    @error('title')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Released Date</label>
                                    <input type="date" name="release" class="form-control border border-2 p-2"
                                        value=''>
                                    @error('release')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Director</label>
                                    <select name="director_id" class="form-select px-3 py-2"
                                        aria-label="Default select example">
                                        @foreach ($directors as $director)
                                        <option value="{{$director->id}}">{{$director->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('director_id')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Production</label>
                                    <select name="production_id" class="form-select px-3 py-2"
                                        aria-label="Default select example">

                                        @foreach ($productions as $production)
                                        <option value="{{$production->id}}">{{$production->company_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('production_id')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Description</label>
                                    <textarea class="form-control border border-2 p-2" placeholder="" id="floatingTextarea2" rows="4"
                                        cols="50" name="description"></textarea>
                                    @error('description')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Select Movie Type</label>
                                    <select name="movie_type_id" class="form-select px-3 py-2"
                                        aria-label="Default select example">
                                        @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('movie_type_id')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>


                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Trailer Link</label>
                                    <input type="text" name="trailer_link" class="form-control border border-2 p-2"
                                        value=''>
                                    @error('trailer_link')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Give Rating</label>
                                    <input type="number" name="rating" class="form-control border border-2 p-2"
                                        value=''>
                                    @error('rating')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Actors and Actresses</label>
                                    <div class="d-flex flex-wrap">
                                        @foreach ($actors as $actor)
                                        <div class="me-3">
                                            <input type="checkbox" name="actors[]" class="border border-2 p-2"
                                            value="{{$actor->id}}">
                                            <span>{{$actor->name}}</span>
                                        </div>
                                        @endforeach
                                    </div>


                                    @error('actors')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Genres</label>
                                    <div class="d-flex flex-wrap">
                                        @foreach ($genres as $genre)
                                        <div class="me-3">
                                            <input type="checkbox" name="genres[]" class="border border-2 p-2"
                                            value="{{$genre->id}}">
                                            <span>{{$genre->name}}</span>
                                        </div>
                                        @endforeach
                                    </div>


                                    @error('genres')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="customFile">Upload Image Banner</label>
                                    <input type="file" name="movie_image" class="form-control" id="inputImg" />
                                    @error('movie_image')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Submit</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    @push('js')
    <script>
        let preview = document.getElementById('previewImg');
        let change = document.getElementById('inputImg');
        change.addEventListener('change', function(event){
            console.log(event);
            let imageFile = URL.createObjectURL(event.target.files[0]);
            if(imageFile){
                preview.style.backgroundImage = `url("${imageFile}")`;

                preview.onload = () => URL.revokeObjectURL(imageFile);
            }

        })
    </script>
@endpush
</x-layout>

