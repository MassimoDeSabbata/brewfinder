<x-app-layout>
    <div class="row mb-4">
        <div class="col-12">
            <form method="GET">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="by_name">Name</label>
                            <input type="text" class="form-control" id="by_name" name="by_name" placeholder="Brewery name" value="{{request()->get('by_name')}}">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="by_city">City</label>
                            <input type="text" class="form-control" id="by_city" name="by_city" placeholder="Brewery city" value="{{request()->get('by_city')}}">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="by_country">Country</label>
                            <input type="text" class="form-control" id="by_country" name="by_country" placeholder="Brewery country" value="{{request()->get('by_country')}}">
                        </div>
                    </div>
                </div>
                <diw class="row">
                    <div class="col-12 text-right">
                        <input type="hidden" name="page" value="1">
                        <input type="hidden" name="per_page" value="{{$breweries->per_page}}">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>  Filter</button>
                    </div>
                </diw>

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Country</th>
                        <th scope="col">City</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($breweries->breweries as $brewery)
                    <tr>
                        <th scope="row">{{$brewery->name}}</th>
                        <td>{{$brewery->country}}</td>
                        <td>{{$brewery->city}}</td>
                        <td class="text-right" style="width: 40px;"><a class="dropdown-item" href="{{route('detail', $brewery->id)}}"><i class="fa-solid fa-eye"></i></a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <diw class="row">

                <!-- ITEMS PER PAGE -->
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                            <span>Items per page</span>
                        </div>
                        <div class="col-9">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$breweries->per_page}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{url()->current().'?'.http_build_query(array_merge(request()->except('per_page'), ['per_page' => 10]))}}">10</a>
                                    <a class="dropdown-item" href="{{url()->current().'?'.http_build_query(array_merge(request()->except('per_page'), ['per_page' => 20]))}}">20</a>
                                    <a class="dropdown-item" href="{{url()->current().'?'.http_build_query(array_merge(request()->except('per_page'), ['per_page' => 50]))}}">50</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- NAVIGATION -->
                <div class="col-6">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">

                            <!-- PREVIOUS -->
                            @if($breweries->page != 1)
                            <li class="page-item ">
                                <a class="page-link" href="{{url()->current().'?'.http_build_query(array_merge(request()->except('page'), ['page' => $breweries->page - 1]))}}" tabindex="-1">Previous</a>
                            </li>
                            @else
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            @endif

                            <!-- FIRST -->
                            <li class="page-item {{$breweries->page == 1 ? 'active' : ''}}"><a class="page-link" href="{{url()->current().'?'.http_build_query(array_merge(request()->except('page'), ['page' => 1]))}}">1</a></li>

                            <!-- SECOND -->
                            @if($breweries->totalPages > 1)
                            <li class="page-item {{$breweries->page == 2 ? 'active' : ''}}"><a class="page-link" href="{{url()->current().'?'.http_build_query(array_merge(request()->except('page'), ['page' => 2]))}}">2</a></li>
                            @endif

                            @if($breweries->totalPages > 2)
                            <li class="page-item disabled">
                                <span class="page-link">
                                    ...
                                </span>
                            </li>

                            <!-- IN BETWEEN -->
                            @if($breweries->page != 1 && $breweries->page != 2 && $breweries->page != $breweries->totalPages && $breweries->page != $breweries->totalPages - 1)
                            <li class="page-item "><a class="page-link" href="{{url()->current().'?'.http_build_query(array_merge(request()->except('page'), ['page' => $breweries->page - 1]))}}">{{$breweries->page - 1}}</a></li>
                            <li class="page-item active">
                                <span class="page-link">
                                    {{ $breweries->page }}
                                </span>
                            </li>
                            <li class="page-item "><a class="page-link" href="{{url()->current().'?'.http_build_query(array_merge(request()->except('page'), ['page' => $breweries->page + 1]))}}">{{$breweries->page + 1}}</a></li>
                            <li class="page-item disabled">
                                <span class="page-link">
                                    ...
                                </span>
                            </li>
                            @endif

                            <!-- SECONDLAST -->
                            @if($breweries->totalPages > 3)
                            <li class="page-item {{$breweries->page == $breweries->totalPages - 1 ? 'active' : ''}}"><a class="page-link" href="{{url()->current().'?'.http_build_query(array_merge(request()->except('page'), ['page' => $breweries->totalPages - 1]))}}">{{$breweries->totalPages - 1}}</a></li>
                            @endif

                            <!-- LAST -->
                            <li class="page-item {{$breweries->page == $breweries->totalPages ? 'active' : ''}}"><a class="page-link" href="{{url()->current().'?'.http_build_query(array_merge(request()->except('page'), ['page' => $breweries->totalPages]))}}">{{$breweries->totalPages}}</a></li>

                            @endif
                            <!-- NEXT -->
                            @if($breweries->page != $breweries->totalPages)
                            <li class="page-item">
                                <a class="page-link" href="{{url()->current().'?'.http_build_query(array_merge(request()->except('page'), ['page' => $breweries->page + 1]))}}">Next</a>
                            </li>
                            @else
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Next</a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </diw>

        </div>
    </div>


</x-app-layout>