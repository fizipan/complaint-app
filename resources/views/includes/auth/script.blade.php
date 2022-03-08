<!-- JS Global Compulsory  -->
<script src="{{ asset('front-design/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- JS Implementing Plugins -->
<script src="{{ asset('front-design/assets/vendor/hs-header/dist/hs-header.min.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/hs-go-to/dist/hs-go-to.min.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/hs-unfold/dist/hs-unfold.min.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/hs-toggle-switch/dist/hs-toggle-switch.min.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/aos/dist/aos.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/typed.js/lib/typed.min.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/hs-file-attach/dist/hs-file-attach.min.js') }}"></script>
<script src="{{ asset('front-design/assets/vendor/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>

<!-- JS Datetime Picker -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/back-design/third-party/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- JS Front -->
<script src="{{ asset('front-design/assets/js/theme.min.js') }}"></script>

<!-- JS Plugins Init. -->
<script>
$(document).on('ready', function () {
    // INITIALIZATION OF HEADER
    // =======================================================
    var header = new HSHeader($('#header')).init();


    // INITIALIZATION OF MEGA MENU
    // =======================================================
    var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
    desktop: {
        position: 'left'
    }
    }).init();


    // INITIALIZATION OF UNFOLD
    // =======================================================
    var unfold = new HSUnfold('.js-hs-unfold-invoker').init();


    // INITIALIZATION OF TOGGLE SWITCH
    // =======================================================
    $('.js-toggle-switch').each(function () {
        var toggleSwitch = new HSToggleSwitch($(this)).init();
    });


    // INITIALIZATION OF TEXT ANIMATION (TYPING)
    // =======================================================
    var typed = $.HSCore.components.HSTyped.init(".js-text-animation");


    // INITIALIZATION OF AOS
    // =======================================================
    AOS.init({
        duration: 650,
        once: true
    });

    // INITIALIZATION OF FORM VALIDATION
    // =======================================================
    $('.js-validate').each(function () {
      $.HSCore.components.HSValidation.init($(this), {
          rules: {
          password_confirmation: {
            equalTo: '#password'
          }
        }
      });
    });


    // INITIALIZATION OF GO TO
    // =======================================================
    $('.js-go-to').each(function () {
        var goTo = new HSGoTo($(this)).init();
    });


    // INITIALIZATION OF SELECT PICKER
    // =======================================================
    $('.js-custom-select').each(function () {
      var select2 = $.HSCore.components.HSSelect2.init($(this));
    });


     // INITIALIZATION OF CUSTOM FILE
    // =======================================================
    $('.js-file-attach').each(function () {
      var customFile = new HSFileAttach($(this)).init();
    });


     // INITIALIZATION OF MASKED INPUT
    // =======================================================
    $('.js-masked-input').each(function () {
      var mask = $.HSCore.components.HSMask.init($(this));
    });


    // INITIALIZATION OF DATETIME PICKER
    // =======================================================
    $('#date_of_birth').datetimepicker({
        format: 'DD/MM/YYYY'
    });
});
</script>

<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
</script>


{{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}

{{-- @livewireScripts --}}