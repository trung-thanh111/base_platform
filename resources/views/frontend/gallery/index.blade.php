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
        <section class="homely-floorplans">
            <div class="uk-container uk-container-center">
                <div class="uk-grid uk-grid-large">

                    <div class="uk-width-large-4-10">
                        <div class="homely-section-label" data-reveal="fade">Khám phá</div>
                        <h2 class="homely-section-title" data-reveal="up">Sơ đồ tầng nhà</h2>

                        <ul class="homely-spec-list">
                            <li class="homely-spec-item">
                                <span class="homely-spec-label">Giá tiền</span>
                                <span class="homely-spec-value">
                                    {{ number_format($property->price ?? 0, 0, ',', '.') }}
                                    {{ $property->price_unit ?? 'Tỷ' }}
                                </span>
                            </li>
                            <li class="homely-spec-item">
                                <span class="homely-spec-label">Diện tích</span>
                                <span class="homely-spec-value">{{ $property->area_sqm ?? '—' }} m²</span>
                            </li>
                            <li class="homely-spec-item">
                                <span class="homely-spec-label">Phòng ngủ</span>
                                <span class="homely-spec-value">{{ $property->bedrooms ?? '—' }}</span>
                            </li>
                            <li class="homely-spec-item">
                                <span class="homely-spec-label">Phòng tắm</span>
                                <span class="homely-spec-value">{{ $property->bathrooms ?? '—' }}</span>
                            </li>
                            <li class="homely-spec-item">
                                <span class="homely-spec-label">Chỗ đỗ xe</span>
                                <span class="homely-spec-value">{{ $property->parking_spots ?? '—' }}</span>
                            </li>
                            <li class="homely-spec-item">
                                <span class="homely-spec-label">Số tầng</span>
                                <span class="homely-spec-value">{{ $property->floors ?? '—' }}</span>
                            </li>
                            <li class="homely-spec-item">
                                <span class="homely-spec-label">Năm xây dựng</span>
                                <span class="homely-spec-value">{{ $property->year_built ?? '—' }}</span>
                            </li>
                            <li class="homely-spec-item">
                                <span class="homely-spec-label">Vị trí</span>
                                <span class="homely-spec-value">
                                    {{ $property->district ?? 'Quận 7' }}, {{ $property->city ?? 'TP. HCM' }}
                                </span>
                            </li>
                        </ul>
                    </div>

                    <div class="uk-width-large-6-10" data-reveal="right">
                        <div class="homely-tabs-container">
                            @if ($floorplans->count() > 0)
                                <ul class="homely-floor-tabs uk-subnav" data-uk-switcher="{connect:'#floorplan-switcher'}">
                                    @foreach ($floorplans as $index => $floor)
                                        <li><a
                                                href="#">{{ $floor->floor_label ?? 'Tầng ' . ($floor->floor_number ?? $index + 1) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul id="floorplan-switcher" class="uk-switcher">
                                    @foreach ($floorplans as $floor)
                                        <li>
                                            <div class="floor-image-container">
                                                <img src="{{ strpos($floor->plan_image, 'http') === 0 ? $floor->plan_image : asset($floor->plan_image ?? 'frontend/resources/img/homely/misc/floorplan.webp') }}"
                                                    alt="{{ $floor->floor_label }}">
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <ul class="homely-floor-tabs uk-subnav" data-uk-switcher="{connect:'#floorplan-switcher'}">
                                    <li><a href="#">Tầng 1</a></li>
                                    <li><a href="#">Tầng 2</a></li>
                                </ul>
                                <ul id="floorplan-switcher" class="uk-switcher">
                                    <li>
                                        <div class="floor-image-container">
                                            <img src="{{ asset('frontend/resources/img/homely/misc/floorplan.webp') }}"
                                                alt="Tầng 1">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="floor-image-container">
                                            <img src="{{ asset('frontend/resources/img/homely/misc/floorplan.webp') }}"
                                                alt="Tầng 2">
                                        </div>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="homely-gallery-container">
            <div class="uk-container uk-container-center">
                <div class="homely-gallery-header">
                    <div>
                        <div class="homely-section-label" data-reveal="fade">
                            Bộ Sưu Tập
                        </div>
                        <h2 class="homely-section-title uk-margin-remove" data-reveal="up">
                            Được Thiết Kế Cho Cuộc Sống
                        </h2>
                    </div>
                </div>
                <div class="gallery-card-grid" uk-lightbox="animation: slide">

                    @if ($galleries->count() > 0)
                        @php $labelIndex = 0; @endphp
                        @foreach ($galleries as $gallery)
                            @if (is_array($gallery->album))
                                @foreach ($gallery->album as $img)
                                    <a class="gallery-card-item" href="{{ $img }}"
                                        data-caption="{{ $gallery->name ?? 'Không gian sống' }}" data-reveal="up">
                                        <img src="{{ $img }}" alt="{{ $gallery->name ?? 'Bộ sưu tập' }}"
                                            loading="lazy">
                                        <span class="gc-view-badge">View</span>
                                    </a>
                                @endforeach
                            @endif
                        @endforeach
                    @else
                        @php
                            $roomNames = [
                                'Living Room',
                                'Master Bedroom',
                                'Dinning Room',
                                'Kitchen',
                                'Bathroom',
                                'Terrace',
                            ];
                        @endphp
                        @for ($i = 1; $i <= 6; $i++)
                            <a class="gallery-card-item"
                                href="{{ asset('frontend/resources/img/homely/gallery/' . $i . '.webp') }}"
                                data-caption="{{ $roomNames[$i - 1] }}" data-reveal="up">
                                <img src="{{ asset('frontend/resources/img/homely/gallery/' . $i . '.webp') }}"
                                    alt="{{ $roomNames[$i - 1] }}" loading="{{ $i <= 3 ? 'eager' : 'lazy' }}">
                                <span class="gc-view-badge">View</span>
                                <div class="gc-label">
                                    <span>{{ $roomNames[$i - 1] }}</span>
                                </div>
                            </a>
                        @endfor
                    @endif

                </div>

            </div>
        </section>
    </div>
@endsection
