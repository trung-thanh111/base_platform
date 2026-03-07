@extends('frontend.homepage.layout')

@section('content')

    @php
        $postLang = $post->languages->first()?->pivot;
        $postTitle = $postLang?->name ?? ($post->name ?? '');
        $postDesc = $postLang?->description ?? '';
        $postImage = $post->image ?? null;
        $postDate = $post->released_at
            ? \Carbon\Carbon::parse($post->released_at)
            : \Carbon\Carbon::parse($post->created_at);
        $catLang = $postCatalogue->languages->first()?->pivot ?? null;
        $catName = $catLang?->name ?? ($postCatalogue->name ?? 'Tin tức');
        $catUrl = $catLang?->canonical ?? ($postCatalogue->canonical ?? '#');
    @endphp


    <section class="uk-section uk-flex uk-flex-middle uk-light hero-scroll-effect"
        style="background: linear-gradient(to right, rgba(0,0,0,0.5), rgba(0,0,0,0.2)),
           url('{{ asset('frontend/resources/img/homely/slider/1.webp') }}') no-repeat center center;
           background-size: 110%; min-height: 400px; padding-top: 100px;">
        <div class="uk-container uk-container-center uk-width-1-1">
            <div class="uk-flex uk-flex-middle uk-flex-space-between uk-flex-wrap"
                uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 100">
                <h1 class="uk-margin-bottom title-breadcrumb">{{ $postTitle }}</h1>
                <ul class="uk-breadcrumb uk-margin-remove custom-breadcrumb">
                    <li><a href="{{ url('tin-tuc.html') }}">Tin tức</a></li>
                    <li><span>{{ \Str::limit($postTitle, 50) }}</span></li>
                </ul>
            </div>
        </div>
    </section>


    <section class="psd-body-section">
        <div class="uk-container uk-container-center">
            <div class="psd-layout">

                <div class="psd-main">

                    <div class="psd-meta">
                        <span class="psd-meta__badge">
                            {{ $postDate->format('d') }} {{ $postDate->translatedFormat('M Y') }}
                        </span>
                        <a href="{{ write_url($catUrl) }}" class="psd-meta__cat">{{ $catName }}</a>
                    </div>
                    @if ($postImage)
                        <figure class="psd-thumb-wrap">
                            <img src="{{ asset($postImage) }}" alt="{{ $postTitle }}" class="psd-thumb"
                                loading="eager" />
                        </figure>
                    @endif


                    @if ($postDesc)
                        <div class="psd-excerpt">{!! $postDesc !!}</div>
                    @endif


                    <div class="psd-content">
                        {!! $contentWithToc ?? $postLang?->content !!}
                    </div>

                </div>
                <aside class="psd-sidebar">


                    @if (isset($postCatalogue->posts) && $postCatalogue->posts->isNotEmpty())
                        <div class="psd-widget">
                            <h4 class="psd-widget__title">Bài viết liên quan</h4>

                            <div class="sidebar-related-list">
                                @foreach ($postCatalogue->posts->where('id', '!=', $post->id)->take(4) as $related)
@php
    $rLang = $related->languages->first()?->pivot;
    $rTitle = $rLang?->name ?? '';
    $rUrl = write_url($rLang?->canonical ?? '#');
    $rImg = $related->image ?? null;
    $rDate = $related->released_at
        ? \Carbon\Carbon::parse($related->released_at)
        : \Carbon\Carbon::parse($related->created_at);
@endphp

                                
                                <a href="{{ $rUrl }}" class="src-card" title="{{ $rTitle }}">

                                    
                                    <div class="src-card__img">
                                        <img src="{{ $rImg ? asset($rImg) : asset('frontend/images/no-image.jpg') }}"
                                             alt="{{ $rTitle }}" loading="lazy">
                                    </div>

                                    
                                    <div class="src-card__overlay"></div>

                                    
                                    <div class="src-card__date">
                                        <span class="src-date-day">{{ $rDate->format('d') }}</span>
                                        <span class="src-date-month">{{ $rDate->translatedFormat('M') }}</span>
                                    </div>

                                    
                                    <div class="src-card__content">
                                        <h5 class="src-card__title">{{ \Str::limit($rTitle, 80) }}</h5>
                                    </div>

                                </a>
@endforeach
                        </div>
                    </div>
@endif

                
                @if (isset($post->tags) && $post->tags->isNotEmpty())
<div class="psd-widget">
                        <h4 class="psd-widget__title">Popular Tags</h4>
                        <div class="psd-tags">
                            @foreach ($post->tags as $tag)
<a href="#" class="psd-tag">{{ $tag->name }}</a>
@endforeach
                        </div>
                    </div>
@else
<div class="psd-widget">
                        <h4 class="psd-widget__title">Popular Tags</h4>
                        <div class="psd-tags">
                            @foreach (['Home Care', 'Daily Cleaning', 'Organization Tips', 'Decluttering', 'Minimalist Living', 'Home Maintenance', 'Routine Cleaning', 'Space Management', 'Smart Storage', 'Tidy Home', 'Healthy Living', 'Lifestyle Tips'] as $tag)
    <a href="#" class="psd-tag">{{ $tag }}</a>
     @endforeach
                                    </div>
                                    </div>
                                @endif

                                </aside>


                                </div>
                                </div>
                                </section>


                                <style>
                                /* ── Biến màu ─────────────────────────── */
                                :root {
                                --psd-accent: #2d6a4f;
                                --psd-accent-light: #e8f3ee;
                                --psd-dark: #1a1a1a;
                                --psd-muted: #6b7280;
                                --psd-radius: 14px;
                                }

                                /* ── BODY SECTION ─────────────────────── */
                                .psd-body-section {
                                background: #fff;
                                padding: 56px 0 80px;
                                }

                                /* ── LAYOUT: Grid 2 cột ──────────────── */
                                .psd-layout {
                                display: grid;
                                /* Cột trái ~63%, cột phải ~35% như ảnh mẫu */
                                grid-template-columns: 1fr 360px;
                                gap: 48px;
                                align-items: start;
                                }

                                @media (max-width: 959px) {
                                .psd-layout {
                                grid-template-columns: 1fr;
                                gap: 40px;
                                }
                                }

                                /* ── META ─────────────────────────────── */
                                .psd-meta {
                                display: flex;
                                align-items: center;
                                gap: 12px;
                                margin-bottom: 20px;
                                flex-wrap: wrap;
                                }

                                .psd-meta__badge {
                                display: inline-block;
                                padding: 5px 14px;
                                border-radius: 20px;
                                background: var(--psd-accent-light);
                                color: var(--psd-accent);
                                font-size: 13px;
                                font-weight: 600;
                                }

                                .psd-meta__cat {
                                font-size: 13px;
                                color: var(--psd-muted);
                                text-decoration: none;
                                transition: color .2s;
                                }

                                .psd-meta__cat:hover { color: var(--psd-accent); }

                                /* ── THUMBNAIL ────────────────────────── */
                                .psd-thumb-wrap {
                                margin: 0 0 28px;
                                border-radius: var(--psd-radius);
                                overflow: hidden;
                                }

                                .psd-thumb {
                                width: 100%;
                                max-height: 420px;
                                object-fit: cover;
                                display: block;
                                border-radius: var(--psd-radius);
                                }

                                /* ── EXCERPT ──────────────────────────── */
                                .psd-excerpt {
                                font-size: 16px;
                                line-height: 1.8;
                                color: var(--psd-dark);
                                font-weight: 500;
                                border-left: 4px solid var(--psd-accent);
                                padding-left: 18px;
                                margin-bottom: 28px;
                                }

                                /* ── NỘI DUNG BÀI VIẾT ───────────────── */
                                .psd-content {
                                font-size: 15px;
                                line-height: 1.9;
                                color: #333;
                                }

                                .psd-content h2,
                                .psd-content h3 {
                                color: var(--psd-dark);
                                font-weight: 700;
                                margin-top: 32px;
                                }

                                .psd-content img {
                                border-radius: 10px;
                                max-width: 100%;
                                }

                                .psd-content p { margin-bottom: 16px; }

                                /* Style số thứ tự như ảnh mẫu (ol tự động) */
                                .psd-content ol {
                                counter-reset: psd-ol;
                                list-style: none;
                                padding: 0;
                                }

                                .psd-content ol li {
                                counter-increment: psd-ol;
                                display: flex;
                                gap: 16px;
                                margin-bottom: 24px;
                                align-items: flex-start;
                                }

                                .psd-content ol li::before {
                                content: counter(psd-ol);
                                flex-shrink: 0;
                                width: 30px;
                                height: 30px;
                                border-radius: 50%;
                                background: var(--psd-accent-light);
                                color: var(--psd-accent);
                                font-size: 13px;
                                font-weight: 700;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-top: 2px;
                                }

                                /* ── CHIA SẺ ──────────────────────────── */
                                .psd-share {
                                display: flex;
                                align-items: center;
                                gap: 10px;
                                margin-top: 32px;
                                padding-top: 20px;
                                border-top: 1px solid #eee;
                                }

                                .psd-share__label {
                                font-size: 14px;
                                font-weight: 600;
                                color: var(--psd-dark);
                                }

                                .psd-share__btn {
                                width: 36px;
                                height: 36px;
                                border-radius: 50%;
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                color: #fff;
                                text-decoration: none;
                                transition: opacity .2s, transform .2s;
                                }

                                .psd-share__btn:hover { opacity: .85; transform: scale(1.1); }
                                .psd-share__btn--fb { background: #1877f2; }

                                /* ══════════════════════════════════════
                                SIDEBAR
                                ══════════════════════════════════════ */
                                .psd-sidebar {
                                display: flex;
                                flex-direction: column;
                                gap: 32px;
                                /* Sidebar dính khi scroll */
                                position: sticky;
                                top: 100px;
                                }

                                /* ── Widget wrapper ──────────────────── */
                                .psd-widget { /* không có background để sidebar trông thoáng như mẫu */ }

                                .psd-widget__title {
                                font-size: 18px;
                                font-weight: 800;
                                color: var(--psd-dark);
                                margin: 0 0 20px;
                                padding-bottom: 12px;
                                border-bottom: 2px solid var(--psd-accent);
                                }

                                /* ── SIDEBAR RELATED CARDS ───────────── */
                                .sidebar-related-list {
                                display: flex;
                                flex-direction: column;
                                gap: 16px;
                                }

                                /* Card full-image như ảnh mẫu */
                                .src-card {
                                position: relative;
                                display: block;
                                border-radius: 16px;
                                overflow: hidden;
                                /* Tỉ lệ 3:2 như ảnh mẫu */
                                aspect-ratio: 3 / 2;
                                background: #dde;
                                text-decoration: none !important;
                                box-shadow: 0 4px 18px rgba(0,0,0,0.09);
                                transition: transform 0.35s cubic-bezier(0.25,0.46,0.45,0.94),
                                box-shadow 0.35s ease;
                                }

                                .src-card:hover {
                                transform: translateY(-4px);
                                box-shadow: 0 12px 36px rgba(0,0,0,0.16);
                                }

                                /* Ảnh fill toàn card */
                                .src-card__img {
                                position: absolute;
                                inset: 0;
                                z-index: 0;
                                }

                                .src-card__img img {
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                display: block;
                                transition: transform 0.55s cubic-bezier(0.25,0.46,0.45,0.94);
                                }

                                .src-card:hover .src-card__img img {
                                transform: scale(1.06);
                                }

                                /* Overlay gradient từ trong suốt → xanh đậm dưới */
                                .src-card__overlay {
                                position: absolute;
                                inset: 0;
                                z-index: 1;
                                background: linear-gradient(
                                to top,
                                rgba(0, 40, 25, 0.88) 0%,
                                rgba(0, 40, 25, 0.45) 40%,
                                transparent 70%
                                );
                                pointer-events: none;
                                }

                                /* Date badge góc trên phải — frosted glass */
                                .src-card__date {
                                position: absolute;
                                top: 14px;
                                right: 14px;
                                z-index: 3;
                                width: 54px;
                                height: 70px;
                                border-radius: 10px;
                                background: rgba(200, 210, 200, 0.55);
                                backdrop-filter: blur(8px);
                                -webkit-backdrop-filter: blur(8px);
                                border: 1px solid rgba(255,255,255,0.30);
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                gap: 2px;
                                pointer-events: none;
                                }

                                .src-date-day {
                                font-size: 20px;
                                font-weight: 700;
                                color: #fff;
                                line-height: 1;
                                display: block;
                                }

                                .src-date-month {
                                font-size: 12px;
                                font-weight: 600;
                                color: rgba(255,255,255,0.9);
                                line-height: 1;
                                display: block;
                                text-transform: none;
                                }

                                /* Tiêu đề dưới overlay */
                                .src-card__content {
                                position: absolute;
                                left: 18px;
                                right: 18px;
                                bottom: 18px;
                                z-index: 3;
                                pointer-events: none;
                                transition: transform 0.3s ease;
                                }

                                .src-card:hover .src-card__content {
                                transform: translateY(-3px);
                                }

                                .src-card__title {
                                margin: 0;
                                font-size: 15px;
                                font-weight: 700;
                                color: #fff !important;
                                line-height: 1.45;
                                display: -webkit-box;
                                -webkit-line-clamp: 3;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                }

                                /* ── TAGS ─────────────────────────────── */
                                .psd-tags {
                                display: flex;
                                flex-wrap: wrap;
                                gap: 8px;
                                }

                                .psd-tag {
                                display: inline-block;
                                padding: 6px 14px;
                                border-radius: 20px;
                                border: 1.5px solid #dde8d8;
                                background: #f4f8f2;
                                color: #4a6741;
                                font-size: 12px;
                                font-weight: 600;
                                text-decoration: none;
                                transition: background .2s, color .2s, border-color .2s, transform .2s;
                                }

                                .psd-tag:hover {
                                background: var(--psd-accent);
                                border-color: var(--psd-accent);
                                color: #fff;
                                transform: translateY(-2px);
                                }

                                /* ── RESPONSIVE ───────────────────────── */
                                @media (max-width: 959px) {
                                .psd-sidebar {
                                position: static; /* Bỏ sticky trên mobile */
                                }

                                .psd-body-section { padding: 40px 0 60px; }
                                }

                                .psd-body-section {
                                position: relative;
                                z-index: 2;
                                background: #fff;
                                }

                                /* Fix sidebar tràn */
                                .psd-layout { align-items: start; }
                                .psd-sidebar { max-height: calc(100vh - 120px); overflow-y: auto; }

                                /* Fix footer bị che */
                                .homely-footer { position: relative; z-index: 5; }
                                </style>

                            @endsection)
