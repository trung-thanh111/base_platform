@extends('frontend.homepage.layout')

@section('content')
<div id="scroll-progress"></div>

<div class="homely-page">
    <section class="uk-section uk-flex uk-flex-middle uk-light hero-scroll-effect"
        style="background: linear-gradient(to right, rgba(0,0,0,0.5), rgba(0,0,0,0.2)), url('{{ asset('frontend/resources/img/homely/slider/1.webp') }}') no-repeat center center; background-size: 110%; min-height: 400px; padding-top: 100px;">
        <div class="uk-container uk-container-center uk-width-1-1">
            <div class="uk-flex uk-flex-middle uk-flex-space-between uk-flex-wrap"
                uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 100">
                <h1 class="uk-margin-remove title-breadcrumb">Giới Thiệu</h1>
                <ul class="uk-breadcrumb uk-margin-remove custom-breadcrumb">
                    <li><a href="{{ route('home.index') }}">Trang Chủ</a></li>
                    <li class="uk-active"><span>Giới thiệu</span></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="about-property bg-white">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-large">

                <div class="uk-width-large">
                    <div class="uk-text-center uk-text-large uk-text-muted" data-reveal="up">
                        {!! $property->description ??
                        'Ngôi nhà đặc biệt này mang đến không gian sống tinh tế với những không gian mở rộng rãi, nội thất sáng sủa và thiết kế hiện đại ấm áp. Mỗi căn phòng đều được tạo ra để mang lại bầu không khí chào đón, tạo nên khung cảnh hoàn hảo cho cuộc sống hàng ngày.' !!}
                    </div>

                    <div class="homely-spacer"></div>
                    <div class="uk-grid uk-grid-medium" data-reveal-group>
                        <div class="uk-width-large-1-6 uk-width-medium-1-3" data-reveal="up">
                            <div class="homely-stat">
                                <img src="{{ asset('frontend/resources/img/homely/svg/size.svg') }}" alt="Diện tích">
                                <div class="homely-stat-value" data-counter="{{ $property->area_sqm ?? '1665' }}"
                                    data-suffix=" m²">
                                    {{ $property->area_sqm ?? '1665' }} m²
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-6 uk-width-medium-1-3" data-reveal="up">
                            <div class="homely-stat">
                                <img src="{{ asset('frontend/resources/img/homely/svg/bed.svg') }}" alt="Phòng ngủ">
                                <div class="homely-stat-value" data-counter="{{ $property->bedrooms ?? '5' }}"
                                    data-suffix=" PN">
                                    {{ $property->bedrooms ?? '5' }} PN
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-6 uk-width-medium-1-3" data-reveal="up">
                            <div class="homely-stat">
                                <img src="{{ asset('frontend/resources/img/homely/svg/bath.svg') }}" alt="Phòng tắm">
                                <div class="homely-stat-value" data-counter="{{ $property->bathrooms ?? '5' }}"
                                    data-suffix=" PT">
                                    {{ $property->bathrooms ?? '5' }} PT
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-6 uk-width-medium-1-3" data-reveal="up">
                            <div class="homely-stat">
                                <img src="{{ asset('frontend/resources/img/homely/svg/car.svg') }}" alt="Chỗ đậu xe">
                                <div class="homely-stat-value" data-counter="{{ $property->parking_spots ?? '5' }}"
                                    data-suffix=" Xe">
                                    {{ $property->parking_spots ?? '5' }} Xe
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-6 uk-width-medium-1-3" data-reveal="up">
                            <div class="homely-stat">
                                <img src="{{ asset('frontend/resources/img/homely/svg/price.svg') }}" alt="Giá">
                                <div class="homely-stat-value" data-counter="{{ $property->price ?? '5' }}"
                                    data-suffix=" {{ $property->price_unit ?? 'VNĐ' }}">
                                    {{ $property->price ?? '5' }} {{ $property->price_unit ?? 'VNĐ' }}
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-6 uk-width-medium-1-3" data-reveal="up">
                            <div class="homely-stat">
                                <img src="{{ asset('frontend/resources/img/homely/svg/calendar.svg') }}"
                                    alt="Năm xây dựng">
                                <div class="homely-stat-value" data-counter="{{ $property->year_built ?? '5' }}"
                                    data-suffix="">
                                    {{ $property->year_built ?? '5' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                        <ul class="homely-floor-tabs uk-subnav"
                            data-uk-switcher="{connect:'#floorplan-switcher'}">
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
                        <ul class="homely-floor-tabs uk-subnav"
                            data-uk-switcher="{connect:'#floorplan-switcher'}">
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

    <section class="homely-facilities">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between uk-margin-large-bottom">
                <div>
                    <div class="homely-section-label-light" data-reveal="fade">Tiện nghi</div>
                    <h2 class="homely-section-title uk-margin-remove" data-reveal="up">
                        Tiện nghi cho phong cách sống
                    </h2>
                </div>
                <div data-reveal="right">
                    <a href="{{ url('/gioi-thieu.html') }}" class="btn-homely-light">Xem Thêm</a>
                </div>
            </div>

            <div class="uk-grid uk-grid-large" data-uk-grid-margin data-reveal-group>
                @php
                $defaultFacilities = [
                [
                'image' => 'frontend/resources/img/homely/misc/s1.webp',
                'name' => 'Nhà Thông Minh',
                'desc' =>
                'Trải nghiệm sự tiện nghi hàng ngày với các tính năng thông minh kết nối ngôi nhà một cách dễ dàng.',
                ],
                [
                'image' => 'frontend/resources/img/homely/misc/s2.webp',
                'name' => 'Năng Lượng Mặt Trời',
                'desc' =>
                'Tạo ra năng lượng sạch, tái tạo với hệ thống pin mặt trời hiệu quả, giảm chi phí sinh hoạt.',
                ],
                [
                'image' => 'frontend/resources/img/homely/misc/s3.webp',
                'name' => 'Hồ Bơi',
                'desc' =>
                'Thư giãn trong hồ bơi riêng được thiết kế đẹp mắt, mang lại không gian yên bình tại nhà.',
                ],
                [
                'image' => 'frontend/resources/img/homely/misc/s4.webp',
                'name' => 'An Ninh 24/7',
                'desc' =>
                'Bảo vệ ngôi nhà với hệ thống an ninh thông minh, giám sát liên tục và cảnh báo kịp thời.',
                ],
                ];
                $displayFacilities =
                $facilities->count() > 0
                ? $facilities
                : collect($defaultFacilities)->map(fn($item) => (object) $item);
                @endphp

                @foreach ($displayFacilities as $facility)
                <div class="uk-width-medium-1-2" data-reveal="up">
                    <div class="homely-facility-item uk-margin-large-bottom">
                        <div class="homely-facility-image">
                            <img src="{{ asset($facility->image ?? ($facility->icon ?? 'frontend/resources/img/homely/misc/s1.webp')) }}"
                                alt="{{ $facility->name }}">
                        </div>
                        <div class="homely-facility-content">
                            <div>{{ $facility->name }}</div>
                            <p>{{ $facility->description ?? $facility->desc }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="homely-video-tour"
        style="background-image: url('{{ $property->image ?? asset('frontend/resources/img/homely/slider/1.webp') }}');">
        <div class="play-btn-wrapper">
            <a href="{{ $property->video_tour_url ?? 'https://www.youtube.com' }}" class="play-btn">
                <i class="fa fa-play"></i>
            </a>
        </div>
        <div class="video-watermark">TOUR</div>
    </section>

    <section class="homely-location-highlights">
        <div class="uk-container uk-container-center">
            <div class="homely-location-header">
                <div class="homely-section-label" data-reveal="fade">
                    Xung Quanh
                </div>
                <h2 class="homely-section-title" data-reveal="up">
                    Mọi Thứ Bạn Cần, Tất Cả<br>Ngay Bên Cạnh Bạn
                </h2>

                @if ($locationHighlights->count() > 0)
                @php $grouped = $locationHighlights->groupBy('category'); @endphp
                <ul class="uk-subnav homely-location-tabs" data-reveal="up"
                    data-uk-switcher="{connect:'#location-tabs'}">
                    @foreach ($grouped as $category => $items)
                    <li><a href="#">{{ $category }}</a></li>
                    @endforeach
                </ul>
                @else
                @php
                $defaultLocations = [
                'Cửa Hàng' => [
                [
                'name' => 'Siêu Thị Vinmart',
                'dist' => '15 phút đi bộ',
                'desc' => 'Siêu thị tiện lợi với đa dạng sản phẩm chất lượng cao.',
                'icon' => 'fa-shopping-basket',
                ],
                [
                'name' => 'Bách Hóa Xanh',
                'dist' => '10 phút đi bộ',
                'desc' => 'Chuỗi cửa hàng thực phẩm tươi sống giá tốt cho mọi nhà.',
                'icon' => 'fa-shopping-cart',
                ],
                [
                'name' => 'AEON Mall',
                'dist' => '6 phút lái xe',
                'desc' => 'Trung tâm thương mại lớn với đầy đủ dịch vụ giải trí.',
                'icon' => 'fa-building',
                ],
                ],
                'Ẩm Thực' => [
                [
                'name' => 'Phúc Long Coffee',
                'dist' => '7 phút đi bộ',
                'desc' => 'Quán cà phê nổi tiếng với đồ uống thủ công và bánh ngọt.',
                'icon' => 'fa-coffee',
                ],
                [
                'name' => 'Nhà Hàng Phố Cổ',
                'dist' => '8 phút đi bộ',
                'desc' => 'Nhà hàng ẩm thực Việt Nam đa dạng món ăn truyền thống.',
                'icon' => 'fa-cutlery',
                ],
                [
                'name' => "Pizza 4P's",
                'dist' => '12 phút lái xe',
                'desc' => 'Nhà hàng pizza nổi tiếng với nguyên liệu tươi ngon.',
                'icon' => 'fa-pie-chart',
                ],
                ],
                'Giao Thông' => [
                [
                'name' => 'Trạm Metro Bến Thành',
                'dist' => '5 phút đi bộ',
                'desc' => 'Trạm metro trung tâm kết nối các tuyến đường chính.',
                'icon' => 'fa-train',
                ],
                [
                'name' => 'Bến Xe Buýt Trung Tâm',
                'dist' => '7 phút đi bộ',
                'desc' => 'Kết nối nhanh với tất cả các quận nội thành dễ dàng.',
                'icon' => 'fa-bus',
                ],
                [
                'name' => 'Ga Quốc Tế TSN',
                'dist' => '20 phút lái xe',
                'desc' => 'Sân bay quốc tế với nhiều tuyến bay linh hoạt.',
                'icon' => 'fa-plane',
                ],
                ],
                'Giáo Dục' => [
                [
                'name' => 'Trường QT Việt Úc',
                'dist' => '7 phút đi bộ',
                'desc' => 'Trường quốc tế K-12 nổi tiếng với chất lượng giảng dạy.',
                'icon' => 'fa-graduation-cap',
                ],
                [
                'name' => 'Đại Học Bách Khoa',
                'dist' => '15 phút đi bộ',
                'desc' => 'Trường đại học kỹ thuật hàng đầu với chương trình chuẩn.',
                'icon' => 'fa-university',
                ],
                [
                'name' => 'Thư Viện Thành Phố',
                'dist' => '8 phút đi bộ',
                'desc' => 'Thư viện cộng đồng lớn nhất với không gian học tập hiện đại.',
                'icon' => 'fa-book',
                ],
                ],
                'Bệnh Viện' => [
                [
                'name' => 'Bệnh Viện Chợ Rẫy',
                'dist' => '6 phút lái xe',
                'desc' => 'Bệnh viện đa khoa hàng đầu với khoa cấp cứu khẩn cấp 24/7.',
                'icon' => 'fa-hospital-o',
                ],
                [
                'name' => 'Phòng Khám Đa Khoa',
                'dist' => '8 phút đi bộ',
                'desc' => 'Phòng khám tiện lợi cho nhu cầu y tế khẩn cấp nhẹ.',
                'icon' => 'fa-medkit',
                ],
                [
                'name' => 'Bệnh Viện FV',
                'dist' => '10 phút lái xe',
                'desc' => 'Bệnh viện quốc tế với các dịch vụ y tế khám chữa bệnh cao.',
                'icon' => 'fa-plus-square',
                ],
                ],
                'Công Viên' => [
                [
                'name' => 'Công Viên Ven Sông',
                'dist' => '15 phút đi bộ',
                'desc' => 'Công viên ven sông tuyệt đẹp với khu vui chơi và nhìn ra chân trời.',
                'icon' => 'fa-tree',
                ],
                [
                'name' => 'Quảng Trường Xanh',
                'dist' => '10 phút đi bộ',
                'desc' => 'Không gian xanh mở rộng hoàn hảo cho việc đi bộ và thư giãn.',
                'icon' => 'fa-tree',
                ],
                [
                'name' => 'Công Viên Lịch Sử',
                'dist' => '6 phút lái xe',
                'desc' => 'Công viên lịch sử với những con đường mòn và sự kiện cộng đồng.',
                'icon' => 'fa-image',
                ],
                ],
                ];
                $grouped = collect($defaultLocations);
                @endphp
                <ul class="uk-subnav homely-location-tabs" data-reveal="up"
                    data-uk-switcher="{connect:'#location-tabs'}">
                    @foreach ($grouped as $category => $items)
                    <li><a href="#">{{ $category }}</a></li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="homely-location-content">
                <ul id="location-tabs" class="uk-switcher">
                    @if ($locationHighlights->count() > 0)
                    @foreach ($grouped as $category => $items)
                    <li>
                        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-reveal-group>
                            @foreach ($items as $item)
                            <div class="uk-width-medium-1-3" data-reveal="up">
                                <div class="homely-location-card">
                                    <div class="loc-icon">
                                        <i class="fa {{ $item->icon ?? 'fa-map-marker' }}"></i>
                                    </div>
                                    <div class="loc-info">
                                        <div class="homely-location-label">{{ $item->name }}</div>
                                        <div class="loc-distance">{{ $item->distance_text ?? '' }}</div>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                    @else
                    @foreach ($grouped as $category => $items)
                    <li>
                        <div class="uk-grid uk-grid-medium" data-uk-grid-margin data-reveal-group>
                            @foreach ($items as $item)
                            <div class="uk-width-medium-1-3" data-reveal="up">
                                <div class="homely-location-card">
                                    <div class="loc-icon">
                                        <i class="fa {{ $item['icon'] ?? 'fa-map-marker' }}"></i>
                                    </div>
                                    <div class="loc-info">
                                        <h4>{{ $item['name'] }}</h4>
                                        <div class="loc-distance">{{ $item['dist'] }}</div>
                                        <p>{{ $item['desc'] }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </section>
</div>
@endsection