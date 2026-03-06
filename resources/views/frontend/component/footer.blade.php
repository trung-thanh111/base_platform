<footer class="homely-footer">
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-grid-large uk-flex-middle">
            <!-- Left: Address (Dynamic from footer-menu item 0) -->
            <div class="uk-width-medium-1-3 uk-text-center">
                @if(isset($menu['footer-menu'][0]))
                @php
                $addressMenu = $menu['footer-menu'][0];
                $addressTitle = $addressMenu['item']->languages->first()->pivot->name;
                @endphp
                <h4 class="homely-footer-heading">{{ $addressTitle }}</h4>
                <div class="homely-footer-info">
                    @foreach($addressMenu['children'] as $child)
                    {!! $child['item']->languages->first()->pivot->name !!}{!! !$loop->last ? '<br>' : '' !!}
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Center: Logo & Socials (Dynamic from system) -->
            <div class="uk-width-medium-1-3">
                <div class="homely-footer-logo-wrap">
                    <a href="/" class="homely-footer-logo">
                        <img src="{{ $system['homepage_logo'] ?? asset('frontend/resources/img/homely/logo.webp') }}" alt="Homely" style="filter: brightness(0) invert(1);">
                    </a>
                    <div class="homely-footer-socials">
                        @if(!empty($system['social_facebook']))
                        <a href="{{ $system['social_facebook'] }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if(!empty($system['social_instagram']))
                        <a href="{{ $system['social_instagram'] }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if(!empty($system['social_twitter']))
                        <a href="{{ $system['social_twitter'] }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if(!empty($system['social_youtube']))
                        <a href="{{ $system['social_youtube'] }}" target="_blank"><i class="fa fa-youtube-play"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right: Contact Us (Dynamic from footer-menu item 1) -->
            <div class="uk-width-medium-1-3 uk-text-center">
                @if(isset($menu['footer-menu'][1]))
                @php
                $contactMenu = $menu['footer-menu'][1];
                $contactTitle = $contactMenu['item']->languages->first()->pivot->name;
                @endphp
                <h4 class="homely-footer-heading">{{ $contactTitle }}</h4>
                <div class="homely-footer-info">
                    @foreach($contactMenu['children'] as $child)
                    {!! $child['item']->languages->first()->pivot->name !!}{!! !$loop->last ? '<br>' : '' !!}
                    @endforeach
                </div>
                @endif
            </div>
        </div>

        <div class="homely-footer-copyright">
            {!! $system['homepage_copyright'] ?? 'Copyright ' . date('Y') . ' - Homely by Designesia' !!}
        </div>
    </div>
</footer>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=103609027035330&autoLogAppEvents=1">
</script>