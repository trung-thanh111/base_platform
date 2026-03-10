<header class="pc-header uk-visible-large homely-header" data-uk-sticky="{top:-100, animation: 'uk-animation-slide-top'}">
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-grid-collapse uk-flex uk-flex-middle">
            <div class="uk-width-large-1-5">
                <div class="logo">
                    <a href="/" title="logo">
                        <img src="{{ $system['homepage_logo'] ?? asset('frontend/resources/img/homely/logo.webp') }}"
                            alt="logo" style="max-height: 40px;">
                    </a>
                </div>
            </div>

            <div class="uk-width-large-3-5">
                <nav class="homely-nav">
                    <ul class="uk-navbar-nav uk-flex uk-flex-center">
                        {!! $menu['main-menu'] ?? '' !!}
                    </ul>
                </nav>
            </div>

            <div class="uk-width-large-1-5 uk-text-right uk-text-bold">
                <a href="{{ $system['header_button_link'] ?? '/lien-he.html' }}" class="homely-btn-submit">
                    {{ $system['header_button_text'] ?? 'Xem dự án' }}
                </a>
            </div>
        </div>
    </div>
</header>

<header class="mobile-header uk-hidden-large">
    <div class="uk-container uk-container-center">
        <div class="uk-position-relative" style="padding: 15px 0; min-height: 70px;">
            <div class="logo uk-position-center">
                <a href="/" title="Logo"><img
                        src="{{ $system['homepage_logo'] ?? asset('frontend/resources/img/homely/logo.webp') }}"
                        alt="Logo" style="max-height: 42px;" /></a>
            </div>
            <div style="position: absolute; right: 0; top: 50%; transform: translateY(-50%); padding-right: 25px;">
                <a class="moblie-menu-btn" href="#offcanvas" data-uk-offcanvas="{target:'#offcanvas'}">
                    <i class="fa fa-bars" style="font-size: 26px; color: #111;"></i>
                </a>
            </div>
        </div>
    </div>
</header>

<div id="offcanvas" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip mobile-menu-offcanvas" style="background-color: #fff;">
        <button class="uk-offcanvas-close mobile-menu-close" type="button"
            style="color: var(--main-color, #111); top: 15px; right: 15px;">
            <i class="fa fa-times"></i>
        </button>

        <div class="mobile-menu-header" style="padding: 20px; border-bottom: 1px solid #eee;">
            <div class="mobile-menu-logo">
                <a href="/" title="Logo">
                    <img src="{{ $system['homepage_logo'] ?? asset('frontend/resources/img/homely/logo.webp') }}"
                        alt="Logo" style="max-height: 40px;" />
                </a>
            </div>
        </div>

        <nav class="mobile-menu-nav">
            <style>
                .mobile-menu-offcanvas {
                    background: #fff !important;
                }

                .mobile-menu-list>li>a {
                    color: var(--main-color, #111) !important;
                    font-weight: 500;
                    border-bottom: 1px dashed #eee;
                    text-transform: uppercase;
                }
            </style>
            <ul class="uk-nav uk-nav-offcanvas mobile-menu-list">
                {!! $menu['main-menu'] ?? '' !!}
            </ul>
        </nav>

        <div class="mobile-menu-footer" style="padding: 20px;">
            <a href="{{ $system['header_button_link'] ?? '/lien-he.html' }}" class="btn-homely"
                style="width: 100%; text-align: center; display: block; background: var(--main-color, #111); color: #fff;">{{ mb_strtoupper($system['header_button_text'] ?? 'Xem dự án') }}</a>
        </div>
    </div>
</div>
