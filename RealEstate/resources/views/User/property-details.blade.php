@extends('layouts.navbar')
@section('content')

<div class="site-wrap">
    @foreach ($props->images as $img)
        <div class="site-blocks-cover inner-page-cover overlay"
            style="background-image: url({{ asset('images/' . $img->url) }});" data-aos="fade"
            data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-10">
                        <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details
                            of</span>
                        <h1 class="mb-2">{{ $props->name }}</h1>
                        <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{ $props->price }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>


    @endforeach
</div>
@endsection











