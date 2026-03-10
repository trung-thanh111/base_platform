<footer class="homely-footer">
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-grid-large" data-uk-grid-margin>
            <div class="uk-width-medium-1-3">
                <div class="homely-footer-col">
                    <a href="/" class="homely-footer-logo">
                        <img src="{{ $system['homepage_logo'] ?? asset('frontend/resources/img/homely/logo.webp') }}"
                            alt="Logo">
                    </a>
                    <div class="homely-footer-desc">
                        {{ $system['homepage_short_description'] ?? 'Chúng tôi tự hào cung cấp những không gian sống đẳng cấp, mang lại trải nghiệm sống tiện nghi, hiện đại và trọn vẹn nhất cho bạn và gia đình. Khám phá ngôi nhà mơ ước của bạn cùng chúng tôi.' }}
                    </div>
                </div>
            </div>

            <div class="uk-width-medium-1-3">
                <div class="homely-footer-col">
                    <h4 class="homely-footer-heading">Thông Tin Liên Hệ</h4>
                    <div class="homely-footer-info">
                        <div class="homely-footer-info-row">
                            <i class="fa fa-map-marker homely-footer-icon"></i>
                            <span
                                class="homely-footer-text">{{ $system['contact_address'] ?? '742 Evergreen Terrace, Quận 7, TP. HCM' }}</span>
                        </div>
                        <div class="homely-footer-info-row align-center">
                            <i class="fa fa-phone homely-footer-icon"></i>
                            <a href="tel:{{ $system['contact_phone'] ?? '0901234567' }}"
                                class="homely-footer-link">{{ $system['contact_phone'] ?? '090 123 4567' }}</a>
                        </div>
                        <div class="homely-footer-info-row align-center">
                            <i class="fa fa-envelope homely-footer-icon"></i>
                            <a href="mailto:{{ $system['contact_email'] ?? 'contact@domain.com' }}"
                                class="homely-footer-link">{{ $system['contact_email'] ?? 'contact@domain.com' }}</a>
                        </div>
                        <div class="homely-footer-info-row align-center">
                            <i class="fa fa-globe homely-footer-icon"></i>
                            <a href="{{ $system['contact_website'] ?? url('/') }}"
                                class="homely-footer-link">{{ $system['contact_website'] ?? 'www.domain.com' }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Col 3: Social -->
            <div class="uk-width-medium-1-3">
                <div class="homely-footer-col">
                    <h4 class="homely-footer-heading">Kết Nối Với Chúng Tôi</h4>
                    <div class="homely-footer-socials">
                        @if (!empty($system['social_facebook']))
                            <a href="{{ $system['social_facebook'] }}" target="_blank"
                                class="homely-footer-social-link">
                                <i class="fa fa-facebook"></i>
                            </a>
                        @endif
                        @if (!empty($system['social_instagram']))
                            <a href="{{ $system['social_instagram'] }}" target="_blank"
                                class="homely-footer-social-link">
                                <i class="fa fa-instagram"></i>
                            </a>
                        @endif
                        @if (!empty($system['social_twitter']))
                            <a href="{{ $system['social_twitter'] }}" target="_blank"
                                class="homely-footer-social-link">
                                <i class="fa fa-twitter"></i>
                            </a>
                        @endif
                        @if (!empty($system['social_youtube']))
                            <a href="{{ $system['social_youtube'] }}" target="_blank"
                                class="homely-footer-social-link">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                        @endif
                        @if (empty($system['social_facebook']) &&
                                empty($system['social_instagram']) &&
                                empty($system['social_twitter']) &&
                                empty($system['social_youtube']))
                            <!-- Fallback Demo Socials -->
                            <a href="#" class="homely-footer-social-link"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="homely-footer-social-link"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="homely-footer-social-link"><i class="fa fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="homely-footer-copyright">
            <div>
                {!! $system['homepage_copyright'] ?? '© ' . date('Y') . ' Linden Theme. Đã đăng ký bản quyền.' !!}
            </div>
        </div>
    </div>
</footer>

<a href="#" id="back-to-top" class="homely-back-to-top" title="Lên đầu trang">
    <i class="fa fa-chevron-up"></i>
</a>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=103609027035330&autoLogAppEvents=1">
</script>
