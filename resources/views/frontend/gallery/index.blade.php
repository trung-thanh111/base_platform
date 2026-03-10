@extends('frontend.homepage.layout')

@section('content')
    <div id="scroll-progress"></div>

    <div class="homely-page">
        <section class="uk-section uk-flex uk-flex-middle uk-light hero-scroll-effect"
            style="background: linear-gradient(to right, rgba(0,0,0,0.5), rgba(0,0,0,0.2)), url('{{ asset('frontend/resources/img/homely/slider/1.webp') }}') no-repeat center center; background-size: 110%; min-height: 400px; padding-top: 100px;">
            <div class="uk-container uk-container-center uk-width-1-1">
                <div class="uk-flex uk-flex-middle uk-flex-space-between uk-flex-wrap"
                    uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 100">
                    <h1 class="uk-margin-remove title-breadcrumb">Thư viện ảnh</h1>
                    <ul class="uk-breadcrumb uk-margin-remove custom-breadcrumb">
                        <li><a href="{{ route('home.index') }}">Trang Chủ</a></li>
                        <li class="uk-active"><span>Thư viện ảnh</span></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="homely-gallery-container" uk-filter="target: .js-filter">
            <div class="uk-container uk-container-center">
                @if ($galleryCatalogues->count() > 0)
                    <ul class="uk-subnav uk-subnav-pill uk-flex-center uk-margin-large-bottom" uk-margin
                        uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 200">
                        <li uk-filter-control class="uk-active"><a href="#">Tất cả</a></li>
                        @foreach ($galleryCatalogues as $cat)
                            <li uk-filter-control="filter: .tag-{{ $cat->id }}"><a
                                    href="#">{{ $cat->name }}</a></li>
                        @endforeach
                    </ul>
                @endif

                <div class="gallery-card-grid js-filter">

                    @if ($galleries->count() > 0)
                        @php $labelIndex = 1; @endphp
                        @foreach ($galleries as $gallery)
                            @php
                                $catClass = $gallery->gallery_catalogue_id
                                    ? 'tag-' . $gallery->gallery_catalogue_id
                                    : '';
                            @endphp
                            @if (is_array($gallery->album))
                                @foreach ($gallery->album as $img)
                                    <div class="gallery-item-wrapper {{ $catClass }}" data-reveal="up">
                                        <a class="gallery-card-item" href="{{ $img }}" data-fancybox="gallery"
                                            data-caption="{{ $gallery->name ?? 'Bộ sưu tập ' . $labelIndex }}">
                                            <img src="{{ $img }}"
                                                alt="{{ $gallery->name ?? 'Bộ sưu tập ' . $labelIndex }}" loading="lazy">
                                            <div class="gc-label">
                                                <span>{{ $gallery->gallery_catalogues?->name ?? 'Bộ sưu tập ' . $labelIndex }}</span>
                                            </div>
                                        </a>
                                    </div>
                                    @php $labelIndex++; @endphp
                                @endforeach
                            @endif
                        @endforeach
                    @else
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="gallery-item-wrapper" data-reveal="up">
                                <a class="gallery-card-item"
                                    href="{{ asset('frontend/resources/img/homely/gallery/' . $i . '.webp') }}"
                                    data-fancybox="gallery" data-caption="Bộ sưu tập {{ $i }}">
                                    <img src="{{ asset('frontend/resources/img/homely/gallery/' . $i . '.webp') }}"
                                        alt="Bộ sưu tập {{ $i }}" loading="{{ $i <= 3 ? 'eager' : 'lazy' }}">
                                    <div class="gc-label">
                                        <span>Bộ sưu tập {{ $i }}</span>
                                    </div>
                                </a>
                            </div>
                        @endfor
                    @endif

                </div>

            </div>
        </section>
    </div>
@endsection
