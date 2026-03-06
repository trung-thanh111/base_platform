<header class="pc-header uk-visible-large homely-header" data-uk-sticky="{top:-100, animation: 'uk-animation-slide-top'}">
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-grid-collapse uk-flex uk-flex-middle">
            {{-- Logo --}}
            <div class="uk-width-large-1-5">
                <div class="logo">
                    <a href="/" title="logo">
                        <img src="{{ asset('frontend/resources/img/homely/logo.webp') }}" alt="logo"
                            style="max-height: 40px;">
                    </a>
                </div>
            </div>

            {{-- Main Menu --}}
            <div class="uk-width-large-3-5">
                <nav class="homely-nav">
                    <ul class="uk-navbar-nav uk-flex uk-flex-center">
                        {!! $menu['main-menu'] ?? '' !!}
                    </ul>
                </nav>
            </div>

            {{-- Action Button --}}
            <div class="uk-width-large-1-5 uk-text-right uk-text-bold">
                <a href="{{ url('/lien-he.html') }}" class="btn-homely-header">
                    Xem dự án
                </a>
            </div>
        </div>
    </div>
</header>

{{-- Mobile Header --}}
<header class="mobile-header uk-hidden-large">
    <div class="uk-container uk-container-center">
        <div class="uk-flex uk-flex-middle uk-flex-space-between" style="padding: 15px 0;">
            <div class="logo">
                <a href="/" title="Logo"><img src="{{ asset('frontend/resources/img/homely/logo.webp') }}"
                        alt="Logo" style="max-height: 30px;" /></a>
            </div>
            <a class="moblie-menu-btn" href="#offcanvas" data-uk-offcanvas="{target:'#offcanvas'}">
                <i class="fa fa-bars" style="font-size: 24px; color: #111;"></i>
            </a>
        </div>
    </div>
</header>

<!-- Mobile Menu Offcanvas -->
<div id="offcanvas" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip mobile-menu-offcanvas">
        <button class="uk-offcanvas-close mobile-menu-close" type="button">
            <i class="fa fa-times"></i>
        </button>

        <div class="mobile-menu-header" style="padding: 20px; border-bottom: 1px solid #eee;">
            <div class="mobile-menu-logo">
                <a href="/" title="Logo">
                    <img src="{{ asset('frontend/resources/img/homely/logo.webp') }}" alt="Logo"
                        style="max-height: 30px;" />
                </a>
            </div>
        </div>

        <nav class="mobile-menu-nav">
            <ul class="uk-nav uk-nav-offcanvas mobile-menu-list">
                {!! $menu['main-menu'] ?? '' !!}
            </ul>
        </nav>

        <div class="mobile-menu-footer" style="padding: 20px;">
            <a href="{{ url('/lien-he.html') }}" class="btn-homely" style="width: 100%; text-align: center;">Schedule
                Visit</a>
        </div>
    </div>
</div>
