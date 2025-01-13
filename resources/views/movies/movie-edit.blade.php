<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="movie-edit"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Movies' subPage='Edit Movie' titleUrl="{{route('movies.index')}}"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-400 border-radius-xl mt-4"
                style="background-image: url('https://occ-0-8407-116.1.nflxso.net/dnm/api/v6/Qs00mKCpRvrkl3HZAN5KwEL1kpE/AAAABY1lgHLARXhiipGC_8D2x1i4TPMy_k0n-TsE7GJBt96mIXfz4hCYkTmiJhBXH0v_xdr_0Z99muRipunQBBdVq3gjShE8I7LOTtav-2kHnAS6PGAGY9wd9hTC6eORizm85Y62SA.webp?r=c68'); object-fit : cover;">
                {{-- <span class="mask  bg-gradient-primary  opacity-6"></span> --}}
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets') }}/img/movie_small.jpg" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Stranger Things
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Mystery/thriller
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="true">
                                        <i class="material-icons text-lg position-relative">home</i>
                                        <span class="ms-1">App</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="false">
                                        <i class="material-icons text-lg position-relative">email</i>
                                        <span class="ms-1">Messages</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="false">
                                        <i class="material-icons text-lg position-relative">settings</i>
                                        <span class="ms-1">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                        <form method='POST' action='{{ route('movies.update', $movie->id) }}' enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control border border-2 p-2"
                                        value="{{old('title', $movie->title)}}">
                                    @error('title')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Released Date</label>
                                    <input type="date" name="release" class="form-control border border-2 p-2"
                                        value="{{old('release', $movie->release)}}">
                                    @error('release')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Director</label>
                                    <select name="director_id" class="form-select px-3 py-2"
                                        aria-label="Default select example">
                                        @foreach ($directors as $director)
                                        <option value="{{$director->id}}" {{$director->id == $movie->director_id ? 'selected' : ''}}>{{$director->name}}</option>
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
                                        <option value="{{$production->id}}" {{$production->id == $movie->production_id ? 'selected' : ''}}>{{$production->company_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('production_id')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Description</label>
                                    <textarea class="form-control border border-2 p-2" placeholder="" id="floatingTextarea2" rows="4"
                                        cols="50" name="description">{{old('description', $movie->description)}}</textarea>
                                    @error('description')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Select Movie Type</label>
                                    <select name="movie_type_id" class="form-select px-3 py-2"
                                        aria-label="Default select example">
                                        @foreach ($types as $type)
                                        <option value="{{$type->id}}" {{$type->id == $movie->type_id ? 'selected' : ''}}>{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('movie_type_id')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>


                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Trailer Link</label>
                                    <input type="text" name="trailer_link" class="form-control border border-2 p-2"
                                        value="{{old('trailer_link', $movie->trailer_link)}}">
                                    @error('trailer_link')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Give Rating</label>
                                    <input type="number" name="rating" class="form-control border border-2 p-2"
                                        value="{{old('rating', $movie->rating)}}">
                                    @error('rating')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Actors and Actresses</label>
                                    <div class="d-flex flex-wrap">
                                        @foreach ($actors as $actor)
                                        <div class="me-3">
                                            <input type="checkbox" {{in_array($actor->id, $movie->actors->pluck('id')->toArray()) ? 'checked' : ''}} name="actors[]" class="border border-2 p-2"
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
                                            <input type="checkbox" {{in_array($genre->id, $movie->genres->pluck('id')->toArray()) ? 'checked' : ''}} name="genres[]" class="border border-2 p-2"
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
                                    <input type="file" name="movie_image" class="form-control" id="customFile" />
                                    @error('movie_image')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Update</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>

</x-layout>
