
<!-- BEGIN: Vendor JS-->
<script src="{{asset('public/assets/vendor/js/dropdown-hover.js')}}"></script>
<script src="{{asset('public/assets/vendor/js/mega-dropdown.js')}}"></script>
<script src="{{ asset(('public/assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(('public/assets/vendor/js/bootstrap.js')) }}"></script>

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(('public/assets/js/front-main.js')) }}"></script>
<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
