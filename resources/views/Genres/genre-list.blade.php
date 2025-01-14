<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="genres"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Genres"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid pt-2 pb-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Genres Table</h6>
                            </div>
                        </div>
                        <div class=" me-3 mt-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{route('genres.create')}}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                Genre</a>
                        </div>
                        <div class="card-body pt-1 px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Actions</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($genres as $genre )
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{$genre->id}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $genre->name }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle d-flex">
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('genres.edit', $genre->id) }}"
                                                    data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>


                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                <div>
                                    {{$genres->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>

</x-layout>
