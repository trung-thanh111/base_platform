<script src="{{ asset('vendor/backend/js/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('vendor/frontend/uikit/js/uikit.min.js') }}"></script>
<script src="{{ asset('vendor/frontend/uikit/js/components/sticky.min.js') }}"></script>
<script src="{{ asset('vendor/frontend/uikit/js/components/accordion.min.js') }}"></script>
<script src="{{ asset('vendor/frontend/uikit/js/components/lightbox.min.js') }}"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('frontend/resources/plugins/wow/dist/wow.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof Fancybox !== 'undefined') {
            Fancybox.bind('[data-fancybox]', {});
        }
    });
</script>
<script src="{{ asset('frontend/resources/function.js') }}"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0&appId=103609027035330&autoLogAppEvents=1"
    nonce="E1aWx0Pa"></script>
