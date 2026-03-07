@extends('frontend.homepage.layout')
@section('content')
<script>
    window.HomelyHeroSettings = <?php echo isset($slides) && isset($slides->setting) && is_array($slides->setting) ? json_encode($slides->setting) : 'null'; ?>;
</script>
<div id="scroll-progress"></div>

<div class="homely-page">

    <section class="homely-hero">
        <div class="homely-hero-content">
            <div class="uk-container uk-container-center">
                <div class="uk-grid uk-grid-large">
                    <div class="uk-width-large-7-10">
                        <h1 class="homely-hero-title">
                            {{ $property->tagline ?? 'Ngôi Nhà Hoàn Hảo Tiếp Theo Cho Cuộc Sống Của Bạn' }}
                        </h1>
                    </div>
                    <div class="uk-width-large-3-10 uk-visible-large">
                        @php $agent = $primaryAgent ?? $agents->first(); @endphp
                        @if ($agent)
                        <div class="homely-hero-agent">
                            @if ($agent->image)
                            <img src="{{ $agent->image }}" alt="{{ $agent->full_name }}">
                            @else
                            <div class="homely-avatar-fallback"><i class="fa fa-user"></i></div>
                            @endif
                            <div>
                                <h5>{{ $agent->full_name }}</h5>
                                <div class="uk-text-white">{{ $agent->phone }}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="uk-container uk-container-center" style="margin-top:auto;">
                <div class="uk-grid uk-grid-medium uk-flex uk-flex-bottom">
                    <div class="uk-width-large-1-2">
                        <h5 class="homely-hero-address">
                            {{ $property->address ?? '742 Evergreen Terrace Brooklyn, NY 11201' }}
                        </h5>
                    </div>
                    <div class="uk-width-large-1-2">
                        <div class="homely-hero-cta">
                            <div class="uk-grid uk-grid-medium uk-flex uk-flex-middle">
                                <div class="uk-width-large-1-2">
                                    <img src="{{ $property->image }}" alt="{{ $property->name ?? '' }}"
                                        style="width:100%; border-radius:8px;">
                                </div>
                                <div class="uk-width-large-1-2">
                                    <h5>Sống Với Ước Mơ</h5>
                                    <p class="uk-text-muted">
                                        {{ $property->description_short ?? 'Những ngôi nhà được thiết kế đẹp mắt, hiệu suất cao và phù hợp hoàn hảo với lối sống mỗi ngày.' }}
                                    </p>
                                    <a class="btn-homely" href="{{ url('/lien-he.html') }}">Đặt Lịch Tham Quan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="homely-watermark">{{ $property->status ?? 'ĐANG BÁN' }}</div>

        <div class="swiper homely-hero-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"
                    style="background-image: url('{{ $property->image ?? asset('frontend/resources/img/homely/slider/1.webp') }}')">
                </div>
                @if ($galleries->count() > 0)
                @foreach ($galleries as $gallery)
                @if (is_array($gallery->album))
                @foreach ($gallery->album as $img)
                <div class="swiper-slide" style="background-image: url('{{ $img }}')"></div>
                @endforeach
                @endif
                @endforeach
                @else
                <div class="swiper-slide"
                    style="background-image: url('{{ asset('frontend/resources/img/homely/slider/2.webp') }}')">
                </div>
                @endif
            </div>
        </div>
    </section>

    <section class="about-property">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-large">

                <div class="uk-width-large-1-4" data-reveal="left">
                    <div class="homely-section-label">Về Bất Động Sản</div>
                </div>

                <div class="uk-width-large-3-4">
                    <div class="homely-about-desc" data-reveal="up">
                        {!! $property->description ??
                        'Ngôi nhà đặc biệt này mang đến không gian sống tinh tế với những không gian mở rộng rãi, nội thất sáng sủa và thiết kế hiện đại ấm áp. Mỗi căn phòng đều được tạo ra để mang lại bầu không khí chào đón, tạo nên khung cảnh hoàn hảo cho cuộc sống hàng ngày.' !!}
                    </div>

                    <div class="homely-spacer"></div>
                    <div class="uk-grid uk-grid-medium" data-reveal-group>
                        <div class="uk-width-large-1-4 uk-width-medium-1-2" data-reveal="up">
                            <div class="homely-stat">
                                <img src="{{ asset('frontend/resources/img/homely/svg/size.svg') }}" alt="Diện tích">
                                <div class="homely-stat-value" data-counter="{{ $property->area ?? '1665' }}"
                                    data-suffix=" m²">
                                    {{ $property->area ?? '1665' }} m²
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-4 uk-width-medium-1-2" data-reveal="up">
                            <div class="homely-stat">
                                <img src="{{ asset('frontend/resources/img/homely/svg/bed.svg') }}" alt="Phòng ngủ">
                                <div class="homely-stat-value" data-counter="{{ $property->bedrooms ?? '5' }}"
                                    data-suffix=" PN">
                                    {{ $property->bedrooms ?? '5' }} PN
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-4 uk-width-medium-1-2" data-reveal="up">
                            <div class="homely-stat">
                                <img src="{{ asset('frontend/resources/img/homely/svg/bath.svg') }}" alt="Phòng tắm">
                                <div class="homely-stat-value" data-counter="{{ $property->bathrooms ?? '5' }}"
                                    data-suffix=" PT">
                                    {{ $property->bathrooms ?? '5' }} PT
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-4 uk-width-medium-1-2" data-reveal="up">
                            <div class="homely-stat">
                                <img src="{{ asset('frontend/resources/img/homely/svg/car.svg') }}" alt="Gara">
                                <div class="homely-stat-value" data-counter="{{ $property->parking ?? '5' }}"
                                    data-suffix=" Xe">
                                    {{ $property->parking ?? '5' }} Xe
                                </div>
                            </div>
                        </div>
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
                <div class="homely-gallery-nav" data-reveal="fade">
                    <button class="nav-btn gallery-prev"><i class="fa fa-chevron-left"></i></button>
                    <button class="nav-btn gallery-next"><i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
        </div>

        <div class="swiper homely-gallery-swiper">
            <div class="swiper-wrapper">
                @if ($galleries->count() > 0)
                @foreach ($galleries as $gallery)
                @if (is_array($gallery->album))
                @foreach ($gallery->album as $img)
                <div class="swiper-slide" style="width:auto;">
                    <div class="homely-gallery-item">
                        <img src="{{ $img }}" alt="{{ $gallery->name ?? 'Bộ sưu tập' }}">
                        <div class="item-overlay">
                            <h4>{{ $gallery->name ?? 'Không gian sống' }}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                @endforeach
                @else
                @for ($i = 1; $i <= 5; $i++)
                    <div class="swiper-slide" style="width:auto;">
                    <div class="homely-gallery-item">
                        <img src="{{ asset('frontend/resources/img/homely/gallery/' . $i . '.webp') }}"
                            alt="Gallery {{ $i }}">
                        <div class="item-overlay">
                            <h4>{{ ['Phòng Khách', 'Phòng Ngủ Chính', 'Phòng Ăn', 'Nhà Bếp', 'Phòng Tắm'][$i - 1] }}
                            </h4>
                        </div>
                    </div>
            </div>
            @endfor
            @endif
        </div>
</div>
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

<section class="homely-schedule-section">
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-flex-middle">
            <div class="uk-width-medium-4-10" data-reveal="left">
                <div style="padding-right:20px;">
                    <div class="homely-section-label">
                        Liên Hệ
                    </div>
                    <div class="homely-section-title">
                        Lên Lịch Tham<br>Quan Nhà
                    </div>
                    <span class="homely-section-desc">
                        Bạn quan tâm đến bất động sản này hoặc sẵn sàng đến xem trực tiếp? Gửi yêu cầu và chúng tôi
                        sẽ sắp xếp buổi tham quan thuận tiện cho bạn.
                    </span>

                    @if (isset($primaryAgent) && $primaryAgent)
                    <div class="homely-agent-info uk-flex uk-flex-middle" style="gap:15px;">
                        @if ($primaryAgent->avatar)
                        <img src="{{ $primaryAgent->avatar }}"
                            style="width:70px;height:70px;border-radius:50%;object-fit:cover;"
                            alt="{{ $primaryAgent->full_name }}">
                        @else
                        <div class="homely-avatar-fallback"><i class="fa fa-user"></i></div>
                        @endif
                        <div style="text-align: left;">
                            <div class="agent-label">
                                {{ $primaryAgent->full_name }}
                            </div>
                            <div class="homely-label-green" style="font-size:14px; font-weight:500;">
                                {{ $primaryAgent->phone }}
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="homely-agent-info uk-flex uk-flex-middle" style="gap:15px;">
                        <div class="homely-avatar-fallback"><i class="fa fa-user"></i></div>
                        <div style="text-align: left;">
                            <h5 style="margin:0 0 5px 0; font-weight:600;">Emily Rodriguez</h5>
                            <div class="homely-label-green" style="font-size:14px; font-weight:500;">(+1)
                                234-5678</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-width-medium-6-10" data-reveal="right">
                <form id="visit-request-form" class="homely-schedule-form" method="post"
                    style="padding-left:20px;">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id ?? '' }}">

                    <div class="uk-grid" uk-grid style="--uk-grid-gutter:20px; --uk-grid-gutter-vertical:20px;">
                        <div class="uk-width-1-1 uk-width-medium-1-3 uk-margin-bottom">
                            <input type="text" name="full_name" placeholder="Họ và tên" required
                                class="homely-input">
                        </div>
                        <div class="uk-width-1-1 uk-width-medium-1-3 uk-margin-bottom">
                            <input type="email" name="email" placeholder="Email" class="homely-input">
                        </div>
                        <div class="uk-width-1-1 uk-width-medium-1-3 uk-margin-bottom">
                            <input type="text" name="phone" placeholder="Số điện thoại" required
                                class="homely-input">
                        </div>
                        <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-bottom">
                            <div class="uk-position-relative">
                                <input type="text" name="preferred_date" placeholder="DD-MM-YYYY"
                                    class="homely-input" style="padding-right:40px;" onfocus="this.type='date'"
                                    onblur="if(!this.value){this.type='text'}">
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-width-medium-1-2">
                            <div class="uk-position-relative">
                                <select name="time" class="homely-input homely-select"
                                    style="padding-right:40px;">
                                    <option value="" disabled selected>10:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                </select>
                                <i class="fa fa-angle-down uk-position-absolute"
                                    style="right:15px;top:16px;color:#aebf9e;pointer-events:none;"></i>
                            </div>
                        </div>
                        <div class="uk-width-1-1">
                            <textarea name="message" class="homely-input homely-textarea"
                                placeholder="Cho chúng tôi biết ngày mong muốn, thời gian, hoặc bất kỳ câu hỏi nào"></textarea>
                        </div>
                        <div class="uk-width-1-1 uk-text-left">
                            <button type="submit" class="homely-btn-submit">
                                Gửi yêu cầu
                            </button>
                        </div>
                    </div>

                    <div id="visit-form-success"
                        style="display:none;margin-top:20px;padding:20px;background:#f4f7f4;border-radius:8px;text-align:center;">
                        <h4 style="margin-bottom:5px;">Yêu Cầu Tham Quan Đã Được Ghi Nhận!</h4>
                        <p style="color:#6d7b63;margin-bottom:0;">Cảm ơn bạn đã gửi yêu cầu. Đội ngũ của chúng tôi
                            sẽ liên hệ với bạn sớm nhất.</p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<div class="homely-marquee">
    <div class="marquee-track">
        @for ($i = 0; $i < 12; $i++)
            <div class="marquee-item">
            <span>Tiện nghi sang trọng</span>
            <img src="{{ asset('frontend/resources/img/homely/svg/star.svg') }}" alt="">
    </div>
    @endfor
</div>
</div>
</div>

@endsection