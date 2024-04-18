<x-app-layout>
    <div class="row mb-4">
        <div class="col-10">
            <h3>{{$brewery->name}} ({{$brewery->city}} - {{$brewery->country}})</h3>
        </div>
        <div class="col-2 text-right ">
            <a href="{{url()->previous()}}">
                <button type="button" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</button>
            </a>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-8">


            <div class="row p-2 bg-light">
                <div class="col-3">
                    <b>Name</b>
                </div>
                <div class="col-9">
                    <span>{{$brewery->name ?? "-"}} </span>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-3">
                    <b>Size</b>
                </div>
                <div class="col-9">
                    <span>{{$brewery->brewery_type ?? "-"}} </span>
                </div>
            </div>

            <div class="row p-2 bg-light">
                <div class="col-3">
                    <b>Country</b>
                </div>
                <div class="col-9">
                    <span>{{$brewery->country ?? "-"}} </span>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-3">
                    <b>State</b>
                </div>
                <div class="col-9">
                    <span>{{$brewery->state ?? "-"}} </span>
                </div>
            </div>

            <div class="row p-2 bg-light">
                <div class="col-3">
                    <b>Province</b>
                </div>
                <div class="col-9">
                    <span>{{$brewery->state_province ?? "-"}} </span>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-3">
                    <b>City</b>
                </div>
                <div class="col-9">
                    <span>{{$brewery->city ?? "-"}} </span>
                </div>
            </div>

            <div class="row p-2 bg-light">
                <div class="col-3">
                    <b>Address</b>
                </div>
                <div class="col-9">
                    <span>{{$brewery->address_1 ?? "-"}} </span>
                    @if($brewery->address_2)
                    <span>{{$brewery->address_2}} </span>
                    @endif
                    @if($brewery->address_3)
                    <span>{{$brewery->address_3}} </span>
                    @endif
                </div>
            </div>

            <div class="row p-2">
                <div class="col-3">
                    <b>Street</b>
                </div>
                <div class="col-9">
                    <span>{{$brewery->street ?? "-"}} </span>
                </div>
            </div>

            <div class="row p-2 bg-light">
                <div class="col-3">
                    <b>Postal code</b>
                </div>
                <div class="col-9">
                    <span>{{$brewery->postal_code ?? "-"}} </span>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-3">
                    <b>Phone</b>
                </div>
                <div class="col-9">
                    <span>{{$brewery->phone ?? "-"}} </span>
                </div>
            </div>

            <div class="row p-2  bg-light">
                <div class="col-3">
                    <b>Website</b>
                </div>
                <div class="col-9">
                    @if($brewery->website_url)
                    <span> <a href="{{$brewery->website_url}}" style="color: black;">{{$brewery->website_url}} <i class="fa-solid fa-arrow-up-right-from-square"></i></a> </span>
                    @else
                    <span>-</span>
                    @endif
                </div>
            </div>
        </div>
        @if($brewery->longitude && $brewery->latitude)
        <div class="col-4 text-right">

            <iframe width="425" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox={{$brewery->longitude}}%2C{{$brewery->latitude}}%2C{{$brewery->longitude}}%2C{{$brewery->latitude}}&amp;layer=mapnik&amp;marker={{$brewery->latitude}}%2C{{$brewery->longitude}}" style="border: 1px solid black"></iframe><br /><small><a href="https://www.openstreetmap.org/?mlat={{$brewery->latitude}}&amp;mlon={{$brewery->longitude}}#map=19/{{$brewery->latitude}}/{{$brewery->longitude}}">Visualizza mappa ingrandita</a></small>

        </div>
        @else

        <div class="col-4 text-center" >
            <div style="width: 30vw; height: 30vw;  border-style: solid; padding-top: 12vw;">
                <span>No map data available</span>
            </div>

        </div>

        @endif
    </div>




</x-app-layout>