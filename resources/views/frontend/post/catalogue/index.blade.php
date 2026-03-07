@extends('frontend.homepage.layout')

@section('content')
    <section class="uk-section uk-flex uk-flex-middle uk-light hero-scroll-effect"
        style="background: linear-gradient(to right, rgba(0,0,0,0.5), rgba(0,0,0,0.2)), url('{{ asset('frontend/resources/img/homely/slider/1.webp') }}') no-repeat center center; background-size: 110%; min-height: 400px; padding-top: 100px;">
        <div class="uk-container uk-container-center uk-width-1-1">
            <div class="uk-flex uk-flex-middle uk-flex-space-between uk-flex-wrap"
                uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 100">
                <h1 class="uk-margin-remove title-breadcrumb">Tin tức</h1>
                <ul class="uk-breadcrumb uk-margin-remove custom-breadcrumb">
                    <li><a href="{{ route('home.index') }}">Trang Chủ</a></li>
                    <li class="uk-active"><span>Tin tức</span></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="pc-news-section">
        <div class="uk-container uk-container-center container ">

            @if (!empty($posts) && $posts->count() > 0)
                <div class="pc-news-grid ">
                    @foreach ($posts as $index => $post)
                        @php
                            $postImage = !empty($post->image)
                                ? asset($post->image)
                                : asset('images/placeholder-news.jpg');

                            $postUrl = !empty($post->canonical)
                                ? url(
                                    rtrim($post->canonical, '/') .
                                        (str_ends_with($post->canonical, '.html') ? '' : '.html'),
                                )
                                : '#';

                            $postName = !empty($post->name)
                                ? $post->name
                                : (!empty($post->post_language_detail->name)
                                    ? $post->post_language_detail->name
                                    : 'Untitled');

                            $publishedAt = !empty($post->released_at)
                                ? \Carbon\Carbon::parse($post->released_at)
                                : (!empty($post->created_at)
                                    ? \Carbon\Carbon::parse($post->created_at)
                                    : now());

                            $dayNum = $publishedAt->format('d'); // VD: 17
                            $monthAbbr = $publishedAt->locale('en')->isoFormat('MMM'); // VD: Dec
                        @endphp

                        <article class="pc-news-card">
                            <a href="{{ $postUrl }}" class="pc-news-card__link" aria-label="{{ $postName }}">

                                <div class="pc-news-card__image-wrapper">
                                    <img src="{{ $postImage }}" alt="{{ $postName }}" class="pc-news-card__image"
                                        loading="{{ $index < 3 ? 'eager' : 'lazy' }}"
                                        onerror="this.src='{{ asset('images/placeholder-news.jpg') }}'">
                                    <div class="pc-news-card__overlay"></div>
                                </div>
                                <div class="pc-news-card__date-badge"
                                    aria-label="Ngày đăng: {{ $dayNum }} {{ $monthAbbr }}">
                                    <span class="pc-news-card__date-day">{{ $dayNum }}</span>
                                    <span class="pc-news-card__date-month">{{ $monthAbbr }}</span>
                                </div>
                                <div class="pc-news-card__content">
                                    <h2 class="pc-news-card__title">{{ $postName }}</h2>
                                </div>

                            </a>
                        </article>
                    @endforeach
                </div>

                @if ($posts->hasPages())
                    <div class="pc-pagination">
                        {{ $posts->links() }}
                    </div>
                @endif
            @else
                <div class="pc-empty-state">
                    <svg class="pc-empty-state__icon" viewBox="0 0 64 64" fill="none" stroke="currentColor">
                        <rect x="8" y="12" width="48" height="40" rx="4" stroke-width="2" />
                        <line x1="16" y1="24" x2="48" y2="24" stroke-width="2" />
                        <line x1="16" y1="32" x2="40" y2="32" stroke-width="2" />
                        <line x1="16" y1="40" x2="32" y2="40" stroke-width="2" />
                    </svg>
                    <p class="pc-empty-state__text">Chưa có bài viết nào.</p>
                </div>
            @endif

        </div>
    </section>
    <style>
        :root {
            --pc-accent: #2d6a4f;
            --pc-accent-light: #40916c;
            --pc-text-dark: #1a1a2e;
            --pc-text-muted: #6b7280;
            --pc-bg-page: #f8f9fa;
            --pc-white: #ffffff;
            --pc-badge-bg: rgba(255, 255, 255, 0.88);
            --pc-badge-text: #374151;
            --pc-radius-card: 14px;
            --pc-shadow-card: 0 4px 24px rgba(0, 0, 0, 0.10);
            --pc-shadow-hover: 0 12px 40px rgba(0, 0, 0, 0.18);
        }

        /* ── Breadcrumb ── */
        .pc-breadcrumb-section {
            padding: 18px 0 10px;
            background: var(--pc-bg-page);
            border-bottom: 1px solid #e5e7eb;
        }

        .pc-breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
            list-style: none;
            margin: 0;
            padding: 0;
            font-size: 13.5px;
        }

        .pc-breadcrumb__item {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--pc-text-muted);
        }

        /* Dấu phân cách tự động bằng ::before */
        .pc-breadcrumb__item+.pc-breadcrumb__item::before {
            content: "/";
            color: #d1d5db;
            font-weight: 300;
        }

        .pc-breadcrumb__link {
            display: flex;
            align-items: center;
            gap: 4px;
            color: var(--pc-text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .pc-breadcrumb__link:hover {
            color: var(--pc-accent);
        }

        .pc-breadcrumb__link svg {
            flex-shrink: 0;
        }

        .pc-breadcrumb__current {
            color: var(--pc-text-dark);
            font-weight: 500;
        }

        /* ── Tiêu đề trang ── */
        .pc-page-header {
            padding: 40px 0 24px;
            background: var(--pc-bg-page);
        }

        .pc-page-header__title {
            font-size: clamp(26px, 3vw, 36px);
            font-weight: 700;
            color: var(--pc-text-dark);
            margin: 0 0 6px;
            letter-spacing: -0.5px;
        }

        .pc-page-header__subtitle {
            font-size: 15px;
            color: var(--pc-text-muted);
            margin: 0;
        }

        /* ── Section chứa lưới card ── */
        .pc-news-section {
            padding: 16px 0 64px;
            background: var(--pc-bg-page);
        }

        /* ── Grid 3 cột ── */
        .pc-news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        /* Responsive: 2 cột trên tablet */
        @media (max-width: 1024px) {
            .pc-news-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        /* Responsive: 1 cột trên mobile */
        @media (max-width: 640px) {
            .pc-news-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .pc-page-header {
                padding: 24px 0 16px;
            }
        }

        /* ── Card ── */
        .pc-news-card {
            border-radius: var(--pc-radius-card);
            overflow: hidden;
            box-shadow: var(--pc-shadow-card);
            background: #1a1a2e;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .pc-news-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--pc-shadow-hover);
        }

        .pc-news-card__link {
            display: block;
            position: relative;
            text-decoration: none;
            height: 100%;
        }

        /* ── Ảnh nền card ── */
        .pc-news-card__image-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 4 / 3;
            overflow: hidden;
        }

        .pc-news-card__image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .pc-news-card:hover .pc-news-card__image {
            transform: scale(1.06);
        }

        /* ── Overlay gradient tối từ dưới lên ── */
        .pc-news-card__overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top,
                    rgba(10, 20, 30, 0.88) 0%,
                    rgba(10, 20, 30, 0.45) 40%,
                    rgba(10, 20, 30, 0.00) 70%);
            pointer-events: none;
        }

        /* ── Badge ngày tháng - góc trên phải ── */
        .pc-news-card__date-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            background: var(--pc-badge-bg);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            border-radius: 8px;
            padding: 8px 12px;
            text-align: center;
            min-width: 48px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.12);
            line-height: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
            z-index: 2;
        }

        .pc-news-card__date-day {
            font-size: 22px;
            font-weight: 700;
            color: var(--pc-badge-text);
            display: block;
        }

        .pc-news-card__date-month {
            font-size: 11px;
            font-weight: 500;
            color: var(--pc-text-muted);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            display: block;
        }

        /* ── Nội dung (tiêu đề) phía dưới card ── */
        .pc-news-card__content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px 20px 22px;
            z-index: 2;
        }

        .pc-news-card__title {
            font-size: clamp(14px, 1.4vw, 17px);
            font-weight: 600;
            color: var(--pc-white);
            line-height: 1.45;
            margin: 0;
            /* Giới hạn 3 dòng rồi ellipsis */
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
            transition: color 0.2s;
        }

        .pc-news-card:hover .pc-news-card__title {
            color: #a8d8b9;
        }

        /* ── Phân trang ── */
        .pc-pagination {
            display: flex;
            justify-content: center;
            margin-top: 48px;
        }

        /* ── Trạng thái rỗng ── */
        .pc-empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 80px 20px;
            color: var(--pc-text-muted);
            text-align: center;
        }

        .pc-empty-state__icon {
            width: 64px;
            height: 64px;
            margin-bottom: 16px;
            opacity: 0.4;
        }

        .pc-empty-state__text {
            font-size: 16px;
            margin: 0;
        }
    </style>
@endsection
