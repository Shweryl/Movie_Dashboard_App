<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="movie-create"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Movies' subPage='Create Movie'
            titleUrl="{{ route('movies.index') }}"></x-navbars.navs.auth>
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
                        <form method='POST' action='{{ route('movies.store') }}' enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control border border-2 p-2"
                                        value='' required>
                                    @error('title')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Released Date</label>
                                    <input type="date" name="release" class="form-control border border-2 p-2"
                                        value='' required>
                                    @error('release')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Director</label>
                                    <select name="director" class="director-select form-select px-3 py-2"
                                        aria-label="Default select example">
                                        @foreach ($directors as $director)
                                            <option value="{{ $director->name }}">{{ $director->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('director')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Production</label>
                                    <select name="production" class="form-select production-select px-3 py-2"
                                        aria-label="Default select example">

                                        @foreach ($productions as $production)
                                            <option value="{{ $production->company_name }}">{{ $production->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('production')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="floatingTextarea2">Description</label>
                                    <textarea class="form-control border border-2 p-2" placeholder="" id="floatingTextarea2" rows="4" cols="50"
                                        name="description" required></textarea>
                                    @error('description')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Select Movie Type</label>
                                    <select name="movie_type_id" class="form-select px-3 py-2"
                                        aria-label="Default select example">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('movie_type_id')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>


                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Trailer Link</label>
                                    <input type="text" name="trailer_link" class="form-control border border-2 p-2"
                                        value='' required>
                                    @error('trailer_link')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Give Rating</label>
                                    <input type="number" name="rating" class="form-control border border-2 p-2"
                                        value='' required>
                                    @error('rating')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="">Actors</label>
                                    <select class="males form-select px-3 py-2" name="males[]" multiple="multiple" id="males">
                                        @foreach ($males as $male)
                                            <option value="{{ $male->name }}">{{ $male->name }}</option>
                                        @endforeach

                                    </select>


                                    @error('males')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="">Actresses</label>
                                    <select class="females form-select px-3 py-2" name="females[]" multiple="multiple" id="females">
                                        @foreach ($females as $female)
                                            <option value="{{ $female->name }}">{{ $female->name }}</option>
                                        @endforeach

                                    </select>


                                    @error('females')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="">Genres</label>
                                    <select class="genres form-select px-3 py-2" name="genres[]" multiple="multiple" id="genres">
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->name }}">{{ $genre->name }}</option>
                                        @endforeach

                                    </select>

                                    @error('genres')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="customFile">Upload Image Banner</label>
                                    <input type="file" name="movie_image" class="form-control" id="inputImg"
                                        required />
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
            $(document).ready(function() {
                $('.genres').select2({
                    tags : true
                });
            });
            $(document).ready(function() {
                $('.director-select').select2({
                    tags : true
                });
            });
            $(document).ready(function() {
                $('.production-select').select2({
                    tags : true
                });
            });
            $(document).ready(function() {
                $('.males').select2({
                    tags : true
                });
            });
            $(document).ready(function() {
                $('.females').select2({
                    tags : true
                });
            });
        </script>
        <script>
            let preview = document.getElementById('previewImg');
            let change = document.getElementById('inputImg');
            change.addEventListener('change', function(event) {
                console.log(event);
                let imageFile = URL.createObjectURL(event.target.files[0]);
                if (imageFile) {
                    preview.style.backgroundImage = `url("${imageFile}")`;

                    preview.onload = () => URL.revokeObjectURL(imageFile);
                }

            });
        </script>
    @endpush

</x-layout>
