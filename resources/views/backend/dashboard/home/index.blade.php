@extends('frontend.homely.layout')

@section('content')
{{-- Section 1: Hero Banner --}}
@include('frontend.homely.sections.hero')

{{-- Section 2: Property Info --}}
@include('frontend.homely.sections.property-info')

{{-- Section 3: Facilities --}}
@include('frontend.homely.sections.facilities')

{{-- Section 4: Floorplan --}}
@include('frontend.homely.sections.floorplan')

{{-- Section 5: Gallery Preview --}}
@include('frontend.homely.sections.gallery-preview')

{{-- Section 6: Location Highlights --}}
@include('frontend.homely.sections.location')

{{-- Section 7: Schedule Form --}}
@include('frontend.homely.sections.schedule-form')

{{-- Section 8: Marquee --}}
@include('frontend.homely.sections.marquee')

{{-- Lightbox Modal --}}
<div class="hm-lightbox" id="hm-lightbox">
    <span class="hm-lightbox__close" id="hm-lightbox-close"><i class="bi bi-x-lg"></i></span>
    <img class="hm-lightbox__img" id="hm-lightbox-img" src="" alt="">
</div>
@endsection