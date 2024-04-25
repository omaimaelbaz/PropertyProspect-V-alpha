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

            <div class="site-section site-section-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div>
                                <div class="slide-one-item home-slider owl-carousel">
                                    <div><img src="{{ asset('images/' . $img->url) }}" alt="Image" class="img-fluid">
                                    </div>

                                </div>
                            </div>
                            <div class="bg-white property-body border-bottom border-left border-right">
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <strong class="text-success h1 mb-3">${{ $props->price }}</strong>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                            <li>
                                                <span class="property-specs">Beds</span>
                                                <span class="property-specs-number">{{ $props->num_bedrooms }}</span>

                                            </li>
                                            <li>
                                                <span class="property-specs">Baths</span>
                                                <span class="property-specs-number">{{ $props->num_bathrooms }}</span>

                                            </li>
                                            <li>
                                                <span class="property-specs">Area</span>
                                                <span class="property-specs-number">{{ $props->size_area }}</span>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-5">

                                    <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                        <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                                        <strong class="d-block">{{ $props->PropertyTypes->name }}</strong>

                                    </div>
                                    <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                        <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                                        <strong class="d-block">{{ $props->year_built }}</strong>
                                    </div>
                                    <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                        <span class="d-inline-block text-black mb-0 caption-text">listed date</span>
                                        <strong class="d-block">{{ $props->listed_date }}</strong>
                                    </div>
                                </div>
                                <h2 class="h4 text-black">More Info</h2>
                                <p>{{ $props->description }}</p>

                                <div class="row no-gutters mt-5">
                                    <div class="col-12">
                                        <h2 class="h4 text-black mb-3">Gallery</h2>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="images/img_1.jpg" class="image-popup gal-item"><img src="images/img_1.jpg"
                                                alt="Image" class="img-fluid"></a>
                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">


                            @if ($props->status == 'sale')

                                <!-- Displaying a form for sending a message to agent -->

                                <form action="/createrequest" method="POST" class="form-contact-agent">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                    </div>
                                        @if(Auth::check())
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        @endif

                                    <input type="hidden" name="agent_id" value="{{$props->user_id}}">

                                    <input type="hidden" name="property_id" value="{{$props->id }}">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">

                                        @if (Auth::check())
                                            @if ($countRequest > 0)
                                                <div>
                                                    <p>You have already sent a request.</p>
                                                </div>
                                            @else
                                                <input type="submit" class="btn btn-primary" value="Send Message">
                                            @endif
                                        @else
                                            <a href="/login" class="btn btn-primary">Send Message</a>
                                        @endif
                                    </div>
                                </form>
                            @else
                                <!-- Displaying a section for reserving the property  -->
                                <div class="form-group" id="reserver">
                                    <div class="reservation-container">
                                        <h3>Interested in Renting?</h3>
                                        <p>Reserve the property now by clicking the button below:</p>
                                        <form action="/" method="POST">
                                            @csrf
                                            <input type="hidden" name="property_id" value="{{ $props->id }}">
                                            <a href="/reserver" type="submit" class="btn btn-primary btn-reserve">Reserve Now</a>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            <style>
                                #reserver {
                                    margin-top: 120px
                                }
                            </style>






                            <div class="bg-white widget border rounded">
                                <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                                <div class="px-3" style="margin-left: -15px;">
                                    @foreach ($props->images as $image)
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&quote=Check out this property: {{ $props->name }} - {{ $props->price }}&picture={{ urlencode(asset('images/' . $image->url)) }}"
                                            class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text=Check out this property: {{ $props->name }} - {{ $props->price }}&media={{ urlencode(asset('images/' . $image->url)) }}"
                                            class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}&title=Check out this property: {{ $props->name }} - {{ $props->price }}&source={{ urlencode(asset('images/' . $image->url)) }}"
                                            class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                                    @endforeach
                                </div>
                            </div>


                        </div>


                    </div>
                </div>

            </div>
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div class="site-section-title mb-5">
                            <h2>Related Properties</h2>
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    @foreach ($relatedCategory as $category)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="property-entry h-100">
                                <a href="property-details.html" class="property-thumbnail">
                                    <div class="offer-type-wrap">
                                        <span class="offer-type bg-info">Lease</span>
                                    </div>
                                    <img src="{{ asset('images/' . $category->images->first()->url) }}" alt="Image"
                                        class="img-fluid">
                                </a>
                                <div class="p-4 property-body">
                                    <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                    <h2 class="property-title"><a href="property-details.html">{{ $category->name }}</a>
                                    </h2>
                                    <span class="property-location d-block mb-3"><span
                                            class="property-icon icon-room"></span> {{ $category->address }}, <br>
                                        {{ $category->city }}</span>
                                    <strong
                                        class="property-price text-primary mb-3 d-block text-success">${{ $category->price }}</strong>
                                    <ul class="property-specs-wrap mb-3 mb-lg-0">
                                        <li>
                                            <span class="property-specs">Beds</span>
                                            <span class="property-specs-number">{{ $category->num_bedrooms }}</span>

                                        </li>
                                        <li>
                                            <span class="property-specs">Baths</span>
                                            <span class="property-specs-number">{{ $category->num_bathrooms }}</span>

                                        </li>
                                        <li>
                                            <span class="property-specs">Area</span>
                                            <span class="property-specs-number">{{ $category->size_area }}</span>

                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        @endforeach
    </div>
@endsection
