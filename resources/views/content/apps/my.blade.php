<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="jbfRu7qwRHsXBaWY7lNzPlwXKDmUfpuj3EirX74A">
    <meta name="author" content="emart">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Media Manager Admin Dashboard</title>
    <!-- Fevicon -->
    <link rel="icon" href="https://emart.mediacity.co.in/demo/public/images/genral/favicon-1.png" type="image/gif"
        sizes="16x16">
    <!-- Fonts  -->
    <link rel="stylesheet"
        href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="//fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">

    <link
        href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/colorpicker/bootstrap-colorpicker.css"
        rel="stylesheet" type="text/css">
    <!-- theme css -->
    <link type="text/css" rel="stylesheet"
        href="https://emart.mediacity.co.in/demo/public/admin_new/assets/css/bootstrap-iconpicker.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="https://emart.mediacity.co.in/demo/public/css/font-awesome.min.css">


    <!-- Sidebar css -->
    <link rel="stylesheet" href="https://emart.mediacity.co.in/demo/public/admin_new/assets/css/style_sidebar.css"
        type="text/css">

    <style type="text/css">
        :root {
            --bg_grey_color: #f2f3f7;
            --bg_white_color: #ffffff;
            --text-grey-color: #9a9a9a;
            --text_dark_color: #141d46;
            --text_white_color: #ffffff;
            --text_blue_color: #157ed2;
        }
    </style>

    <!-- /Sidebar css -->

    <!-- Switchery css -->

    <!-- Datepicker css -->
    <link href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datepicker/datepicker.min.css"
        rel="stylesheet" type="text/css">

    <link
        href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css"
        rel="stylesheet">
    <!-- Touchspin css -->
    <link
        href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css"
        rel="stylesheet" type="text/css">

    <link href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/switchery/switchery.min.css"
        rel="stylesheet">
    <!-- Select2 css -->
    <link href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/select2/select2.min.css"
        rel="stylesheet" type="text/css">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Slick css -->
    <link href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/slick/slick.css" rel="stylesheet">
    <link href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/slick/slick-theme.css"
        rel="stylesheet">
    <link href="https://emart.mediacity.co.in/demo/public/admin_new/assets/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css"
        rel="stylesheet" type="text/css">
    <link
        href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css"
        rel="stylesheet" type="text/css">
    <link href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/pnotify/css/pnotify.custom.min.css"
        rel="stylesheet" type="text/css">
    <link href="https://emart.mediacity.co.in/demo/public/admin_new/assets/css/icons.css" rel="stylesheet"
        type="text/css">
    <link href="https://emart.mediacity.co.in/demo/public/admin_new/assets/css/flag-icon.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/dataTables.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Responsive Datatable css -->
    <link
        href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="https://emart.mediacity.co.in/demo/public/admin_new/assets/css/style.css" rel="stylesheet"
        type="text/css">
    <!-- Preloadrer Pace -->
    <link rel="stylesheet" type="text/css" href="https://emart.mediacity.co.in/demo/public/css/vendor/pace.min.css">
    <!-- jQuery ui css -->
    <link href="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/jquery-ui/jquery-ui.min.css"
        rel="stylesheet" type="text/css">
    <!-- End css -->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <link rel="stylesheet" href="https://emart.mediacity.co.in/demo/public/vendor/midia/midia.css">
    <link rel="stylesheet" href="https://emart.mediacity.co.in/demo/public/vendor/midia/dropzone.css">
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/jquery.min.js"></script>
</head>

<body class="vertical-layout">
    <div id="containerbar">

        <div class="leftbar sidebar-two" style="background-image: url('images/navbar.png')">

            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Navigationbar -->
                <div class="navigationbar">



                    <div class="vertical-menu-detail">

                        <div class="logobar">
                            <a href="https://emart.mediacity.co.in/demo/public" class="logo logo-large">
                                <img src="https://emart.mediacity.co.in/demo/public/images/genral/mainlogo.png"
                                    class="img-fluid" alt="logo" />
                            </a>
                        </div>


                        <div>

                            <ul class="vertical-menu">

                                <li class="">
                                    <a href="https://emart.mediacity.co.in/demo/public/myadmin">
                                        <i class="feather icon-airplay" aria-hidden="true"></i> <span>Dashboard</span>
                                    </a>
                                </li>

                                <li class="header">Users</li>
                                <li class=" ">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-users" aria-hidden="true"></i> <span>Users</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>

                                    <ul class="vertical-submenu">

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/users ">
                                                All users </a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/users/create">
                                                Add users </a></li>


                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/roles">
                                                Roles and Permissions</a></li>

                                    </ul>
                                </li>

                                <li class="header">Stores &amp; Products</li>

                                <li class=" ">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-database" aria-hidden="true"></i> <span>Store</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>

                                    <ul class="vertical-submenu">


                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/stores ">
                                                Stores
                                            </a>
                                        </li>




                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/appliedform">
                                                Stores Request
                                            </a>
                                        </li>


                                    </ul>
                                </li>

                                <li class="                        ? 'show' : ''">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-shopping-bag" aria-hidden="true"></i> <span>Products
                                            Management</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/brand ">Brands</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/requested-brands ">Requested
                                                Brands



                                            </a>
                                        </li>
                                        <li class="
                    ">
                                            <a href="javaScript:void();">Categories
                                                <i class="feather icon-chevron-right"></i>
                                            </a>
                                            <ul class="vertical-submenu">
                                                <li class="  ">
                                                    <a
                                                        href="https://emart.mediacity.co.in/demo/public/admin/category">Categories</a>
                                                </li>
                                                <li class=""><a
                                                        href="https://emart.mediacity.co.in/demo/public/admin/subcategory">Subcategories</a>
                                                </li>
                                                <li class=""><a
                                                        href="https://emart.mediacity.co.in/demo/public/admin/grandcategory">Childcategories</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="    ">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/products ">Variant
                                                Products </a>
                                        </li>
                                        <li class="">
                                            <a
                                                href="https://emart.mediacity.co.in/demo/public/manage/simple-products ">Simple
                                                Products</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/importproducts">Import
                                                Products</a></li>

                                        <li class="  ">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/product/attr ">Product
                                                Attributes</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/coupan ">Coupons</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/return-policy ">Return
                                                Policy Settings</a></li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/unit">Units</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/special">Special
                                                Offers</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/review">All
                                                Reviews</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/review_approval">Reviews
                                                For Approval</a></li>



                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/commission_setting ">Commission
                                                Setting</a>
                                        </li>



                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/manage/sizechart">Size
                                                chart
                                            </a>
                                        </li>


                                    </ul>
                                </li>

                                <li id="reppro" class="">
                                    <a href="https://emart.mediacity.co.in/demo/public/admin/all/pro/reported">
                                        <i class="feather icon-alert-circle" aria-hidden="true"></i><span>Reported
                                            Products</span></a>
                                </li>

                                <li class="header">Financial</li>

                                <li id="ordersm" class="        ">

                                    <a href="javaScript:void();">
                                        <i class="feather icon-shopping-cart" aria-hidden="true"></i> <span>Orders
                                            &amp; Invoices</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>

                                    <ul class="vertical-submenu">

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/order ">All
                                                Orders</a></li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/pre-orders"></i>Pre
                                                Orders </a></li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/pending/order"></i>Pending
                                                Orders </a></li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/ord/canceled"></i>Canceled
                                                Orders </a></li>

                                        <li class="  ">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/returnOrders ">Returned
                                                Orders</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/invoice">Invoice
                                                Setting</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/invoice/design">Invoice
                                                Design</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/rma ">Return
                                                Reasons</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class=" ">

                                    <a href="javaScript:void();">
                                        <i class="feather icon-shopping-cart" aria-hidden="true"></i><span>Inhouse
                                            orders</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>

                                    <ul class="vertical-submenu">

                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/offline-orders ">
                                                All Orders
                                            </a>
                                        </li>

                                        <li class="">
                                            <a
                                                href="https://emart.mediacity.co.in/demo/public/admin/offline-orders/create"></i>
                                                Create order
                                            </a>
                                        </li>

                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/offline_reports"></i>
                                                Reports
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li id="shippingtax" class="
                ">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-truck" aria-hidden="true"></i><span>Shipping &amp;
                                            Taxes</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/tax_class">Tax
                                                Classes</a></li>
                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/tax">Tax Rates</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/zone">Zones</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/shipping">Shipping</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/handling/charge">Handling
                                                charges</a></li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/shiping_charg/index">Shipping
                                                charges</a></li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/shi_cupan">Shipping
                                                coupan</a></li>
                                    </ul>
                                </li>



                                <li class="  ">
                                    <a href="javaScript:void();">
                                        <i class="fa fa-slack" aria-hidden="true"></i><span>Seller Payouts</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/sellerpayouts ">Pending
                                                Payouts</a></li>

                                        <li class=" "><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/completed/payouts">
                                                Completed Payouts
                                            </a></li>

                                    </ul>

                                </li>



                                <li class="header">Marketing</li>

                                <li class="      ">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-bar-chart-line-" aria-hidden="true"></i><span>Marketing
                                            Tools</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>

                                    <ul class="vertical-submenu">
                                        <li><a class=""
                                                href="https://emart.mediacity.co.in/demo/public/admin/hotdeal">Hot
                                                Deals</a></li>
                                        <li><a class=""
                                                href="https://emart.mediacity.co.in/demo/public/mobile/hotdeal">Mobile
                                                Hot Deals</a></li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/detailadvertise">Block
                                                Advertisments</a></li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/adv">Advertisements</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/testimonial ">Testimonials</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/offer-popup ">Offer
                                                PopUp Settings</a></li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/push-notifications">Push
                                                Notifications</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/flash-sales">Flash
                                                sales</a></li>

                                    </ul>

                                </li>

                                <li class=""><a
                                        href="https://emart.mediacity.co.in/demo/public/admin/wallet/settings"><i
                                            class="feather icon-briefcase"
                                            aria-hidden="true"></i><span>Wallet</span></a></li>



                                <li id="slider" class=" ">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-award"></i><span>
                                            Affiliate Manager
                                        </span>
                                        <i class="feather icon-chevron-right"></i>

                                        <small class="badge badge-success float-right">NEW</small>
                                        </span>
                                    </a>
                                    <ul class="vertical-submenu">
                                        <li class="">
                                            <a
                                                href="https://emart.mediacity.co.in/demo/public/admin/affiliate/settings ">
                                                Affiliate Settings
                                            </a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="header">Content</li>

                                <li class="   ">
                                    <a href="javaScript:void();">
                                        <i class="fa fa-file-text-o"></i> <span>Reports</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">

                                        <li class="">
                                            <a
                                                href="https://emart.mediacity.co.in/demo/public/admin/reports/stock-report"><span>Stock
                                                    report</span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a
                                                href="https://emart.mediacity.co.in/demo/public/admin/reports/sales-report"><span>Sales
                                                    report</span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a
                                                href="https://emart.mediacity.co.in/demo/public/admin/reports/most-view-products-report"><span>Most
                                                    viewed products</span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/device-logs"><span>Login
                                                    device history</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li id="menum" class="">
                                    <a href="https://emart.mediacity.co.in/demo/public/admin/menu">
                                        <i class="feather icon-sliders" aria-hidden="true"></i> <span>Menu
                                            Management</span>

                                    </a>
                                </li>

                                <li id="location" class="     ">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-globe" aria-hidden="true"></i> <span>Locations</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>


                                    <ul class="vertical-submenu">
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/country">Countries</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/state">States</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/city">Cities</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/destination">Delivery
                                                Locations</a></li>
                                    </ul>



                                </li>


                                <li class="header">Setting</li>

                                <li id="mscur" class=""><a
                                        href="https://emart.mediacity.co.in/demo/public/admin/multiCurrency "><i
                                            class="fa fa-money"></i><span>
                                            Currency settings
                                        </span></a>
                                </li>
                                <li class="">
                                    <a href="https://emart.mediacity.co.in/demo/public/admincustomisation"><i
                                            class="feather icon-settings text-secondary"></i><span><span>Admin Color
                                                Setting</span></a>
                                </li>

                                <li class="            ">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-settings" aria-hidden="true"></i> <span>Front
                                            Settings</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>

                                    <ul class="vertical-submenu">

                                        <li id="slider" class="treeview  ">
                                            <a href="#"><span>Sliders</span>
                                                <i class="feather icon-chevron-right"></i>
                                            </a>
                                            <ul class="vertical-submenu">
                                                <li class=""><a
                                                        href="https://emart.mediacity.co.in/demo/public/admin/slider ">Sliders</a>
                                                </li>
                                                <!-- <li class=""><a href="https://emart.mediacity.co.in/demo/public/admin/slider2 ">Sliders 2</a></li>
   <li class=""><a href="https://emart.mediacity.co.in/demo/public/admin/slider3 ">Sliders 3</a></li> -->
                                                <li class="">
                                                    <a
                                                        href="https://emart.mediacity.co.in/demo/public/admin/frontCategorySlider "><span>Top
                                                            Category Slider</span></a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class=""><a title="Progressive Web App Setting"
                                                href="https://emart.mediacity.co.in/demo/public/admin/pwa/setting "><span>PWA
                                                    Settings</span></a>
                                        </li>

                                        <li id="theme-settings" class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/theme-settings"><span>Color
                                                    Options</span>
                                            </a>
                                        </li>

                                        <li id="faqs" class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/faq "><span>FAQ&#039;s</span></a>
                                        </li>


                                        <li class="">

                                            <a href="https://emart.mediacity.co.in/demo/public/admin/widget/settings"><span>Widgets
                                                    Settings</span></span></a>

                                        </li>


                                        <li class="">

                                            <a href="https://emart.mediacity.co.in/demo/public/admin/payment/setting"><span>Payment
                                                    Gateway Settings</span></a>

                                        </li>

                                        <li class="">

                                            <a
                                                href="https://emart.mediacity.co.in/demo/public/admin/manual-payment-settings"><span>Offline
                                                    Payment Gateway</span></a>

                                        </li>

                                        <li class="">
                                            <a
                                                href="https://emart.mediacity.co.in/demo/public/admin/custom-style-settings"><span>Custom
                                                    Style and JS</span></a>
                                        </li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/footer ">Footer
                                                Customizations</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/social ">Social
                                                Handler Settings</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/blog">Blogs</a>
                                        </li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/page">Pages</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/front/content">Front
                                                Content</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/news/letter">News
                                                Letter</a></li>
                                    </ul>
                                </li>


                                <li id="sitesetting" class="




       ">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-grid" aria-hidden="true"></i><span>Site Settings</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/genral">General
                                                Settings</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/seo ">SEO</a>
                                        </li>
                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/seo-directory ">SEO
                                                directory</a></li>

                                        <li class=" "><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/language">Site
                                                Languages</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/mail-settings">Mail
                                                Settings</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/social-login-settings">Social
                                                Login Settings</a></li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/sms/settings">SMS
                                                Settings</a></li>

                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/dashbord-setting"><span>Admin
                                                    Dashboard Settings</span></a>
                                        </li>


                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/banner-setting"><span>Banner
                                                    Settings</span></a>
                                        </li>

                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/maintaince-mode"><span>Maintenance
                                                    Mode</span></a>
                                        </li>

                                        <li id="sitesetting" class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/user/term/settings"><span>Terms
                                                    Pages</span>
                                            </a>
                                        </li>

                                        <li class=""><a
                                                href="https://emart.mediacity.co.in/demo/public/admin/bank_details "></i><span>Bank
                                                    Details</span></a></li>


                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/abuse"><span>Abuse
                                                    Word Settings</span></a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="active"><a
                                        href="https://emart.mediacity.co.in/demo/public/media-manager"><i
                                            class="feather icon-image" aria-hidden="true"></i><span>Media
                                            Manager</span></a></li>

                                <li id="ticket" class="">
                                    <a href="https://emart.mediacity.co.in/demo/public/manage/chats">
                                        <i class="feather icon-message-circle" aria-hidden="true"></i><span>My
                                            Chats</span></a>
                                </li>

                                <li class=""><a
                                        href="https://emart.mediacity.co.in/demo/public/admin/addon-manger "><i
                                            class="feather icon-download"></i><span>Add-on Manager <small
                                                class="badge badge-success float-right">NEW</small></span>
                                    </a>
                                </li>

                                <li class="header">Support</li>


                                <li id="ticket" class=" ">
                                    <a href="https://emart.mediacity.co.in/demo/public/admin/tickets">
                                        <i class="feather icon-volume-1" aria-hidden="true"></i><span>Support
                                            Tickets</span></a>
                                </li>


                                <li class="   ">
                                    <a href="javaScript:void();">
                                        <i class="feather icon-help-circle" aria-hidden="true"></i><span>Help &amp;
                                            Support</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">

                                        <li class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/import-demo"><span>Import
                                                    Demo</span></a>
                                        </li>

                                        <li id="reppro" class="">
                                            <a href="https://emart.mediacity.co.in/demo/public/admin/backups"><span>Database
                                                    Backup</span></a>
                                        </li>

                                        <!--                     <li class="">
                      <a href="https://emart.mediacity.co.in/demo/public/system-status"><span>System Status</span>
                      </a>
                    </li>
                     -->

                                        <li class="">
                                            <a
                                                href="https://emart.mediacity.co.in/demo/public/remove-public-and-force-https"><span>Remove
                                                    Public &amp; Force HTTPS</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="https://emart.mediacity.co.in/demo/public/clear-cache">
                                        <i class="feather icon-zap"></i><span>Clear Cache</span>
                                    </a>
                                </li>

                            </ul>
                        </div>



                    </div>
                </div>
                <!-- End Navigationbar -->
            </div>
            <!-- End Sidebar -->
        </div>

        <div class="rightbar">

            <!-- Start Contentbar -->


            <!-- Start Topbar Mobile -->
            <div class="topbar-mobile">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="mobile-logobar">
                            <a href="https://emart.mediacity.co.in/demo/public" class="mobile-logo">

                                <img src="https://emart.mediacity.co.in/demo/public/images/genral/mainlogo.png"
                                    class="img-fluid" alt="logo" />

                            </a>
                        </div>
                        <div class="mobile-togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="topbar-toggle-icon">
                                        <a class="topbar-toggle-hamburger" href="javascript:void();">
                                            <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/svg-icon/horizontal.svg"
                                                class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                            <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/svg-icon/verticle.svg"
                                                class="img-fluid menu-hamburger-vertical" alt="verticle">
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/svg-icon/menu.svg"
                                                class="img-fluid menu-hamburger-collapse" alt="collapse">
                                            <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/svg-icon/close.svg"
                                                class="img-fluid menu-hamburger-close" alt="close">
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Topbar -->
            <div class="topbar">
                <!-- Start row -->
                <div class="row align-items-center">
                    <!-- Start col -->
                    <div class="col-md-12 align-self-center">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="breadcrumbbar">
                                    <h4 class="page-title">Media Manager</h4>
                                    <div class="breadcrumb-list">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a
                                                    href="https://emart.mediacity.co.in/demo/public/myadmin">Dashboard</a>
                                            </li>


                                            <li class="breadcrumb-item">Site Setting</li>

                                            <li class="breadcrumb-item">Media Manager</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="infobar">
                                    <ul class="list-inline mb-0">
                                        <li class="mt-2 list-inline-item">
                                            <a title="Visit site" href="https://emart.mediacity.co.in/demo/public"
                                                target="_blank">
                                                Visit Site <i class="feather icon-external-link"
                                                    aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="languagebar">
                                                <div class="dropdown">

                                                    <select class="langdropdown2 form-control" onchange="changeLang()"
                                                        id="changed_lng">
                                                        <option selected value="en">En</option>
                                                        <option value="hi">Hi</option>
                                                        <option value="es">Es</option>
                                                        <option value="Fr">Fr</option>
                                                        <option value="Ru">Ru</option>
                                                        <option value="ar">Ar</option>
                                                    </select>


                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="settingbar">
                                                <a href="javascript:void(0)" id="infobar-settings-open"
                                                    class="infobar-icon">
                                                    <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/svg-icon/settings.svg"
                                                        class="text-center img-fluid" alt="settings">
                                                </a>
                                            </div>
                                        </li>

                                        <li class="list-inline-item">
                                            <div class="settingbar">
                                                <a href="javascript:void(0)" id="notification-open"
                                                    class="infobar-icon">
                                                    <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/svg-icon/notifications.svg"
                                                        class="img-fluid" alt="settings">
                                                    <span class="live-icon">

                                                        <span id="countNoti" class="label label-warning">

                                                            71

                                                        </span>

                                                    </span>
                                                </a>
                                            </div>
                                        </li>


                                        <li class="list-inline-item">
                                            <div class="profilebar">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="profilelink" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">

                                                        <img src="https://emart.mediacity.co.in/demo/public/images/user/1628072295user2-160x160.jpg"
                                                            alt="profilephoto" class="rounded img-fluid">

                                                        <span class="live-icon">Admin</span><span
                                                            class="feather icon-chevron-down live-icon"></span></a>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="profilelink">
                                                        <div class="dropdown-item">
                                                            <div class="profilename">
                                                                <h5>Admin</h5>
                                                            </div>
                                                        </div>
                                                        <div class="userbox">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="media dropdown-item">

                                                                    <a href="https://emart.mediacity.co.in/demo/public/admin/users/1/edit"
                                                                        class="profile-icon"><img
                                                                            src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/svg-icon/crm.svg"
                                                                            class="img-fluid" alt="user">My
                                                                        Profile
                                                                    </a>

                                                                </li>

                                                                <li class="media dropdown-item">
                                                                    <a href="https://emart.mediacity.co.in/demo/public/admin/stores/1/edit"
                                                                        class="profile-icon"><img
                                                                            src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/svg-icon/ecommerce.svg"
                                                                            class="img-fluid" alt="user">Your
                                                                        store
                                                                    </a>
                                                                </li>


                                                                <li class="media dropdown-item">
                                                                    <a href="https://emart.mediacity.co.in/demo/public/logout"
                                                                        class="profile-icon"
                                                                        onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"><img
                                                                            src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/svg-icon/logout.svg"
                                                                            class="img-fluid"
                                                                            alt="logout">Logout</a>

                                                                    <form id="logout-form"
                                                                        action="https://emart.mediacity.co.in/demo/public/logout"
                                                                        method="POST" style="display: none;">
                                                                        <input type="hidden" name="_token"
                                                                            value="jbfRu7qwRHsXBaWY7lNzPlwXKDmUfpuj3EirX74A">
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- Sidebar quick settings -->
            <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">

                <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
                    <h4>Settings</h4><a href="javascript:void(0)" id="infobar-settings-close"
                        class="infobar-settings-close"><img
                            src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/svg-icon/close.svg"
                            class="img-fluid menu-hamburger-close" alt="close"></a>
                </div>
                <div class="infobar-settings-sidebar-body">
                    <div class="h-100 bg-primary-rgba p-3">

                        <form action="https://emart.mediacity.co.in/demo/public/update-quick-setting" method="POST">
                            <input type="hidden" name="_token" value="jbfRu7qwRHsXBaWY7lNzPlwXKDmUfpuj3EirX74A">
                            <div class="p-1 row align-items-center pb-2">

                                <div class="col-md-8">
                                    <h6 class="mb-0">Enable Multiseller</h6>
                                </div>
                                <div class="col-md-4 text-right"><input checked name="vendor_enable" type="checkbox"
                                        class="js-switch-setting-first" /></div>

                                <div class="col-md-12">
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> If enabled than
                                        Multiseller system will be active on your portal.</small>
                                </div>

                            </div>

                            <div class="p-1 row align-items-center pb-2">

                                <div class="col-md-8">
                                    <h6 class="mb-0">Enable Preloader</h6>
                                </div>
                                <div class="col-md-4 text-right"><input name="ENABLE_PRELOADER" type="checkbox"
                                        class="js-switch-setting-first" /></div>

                                <div class="col-md-12">
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> Enable or disable
                                        preloader by toggling it.</small>
                                </div>

                            </div>

                            <div class="p-1 row align-items-center pb-2">

                                <div class="col-md-8">
                                    <h6 class="mb-0">APP DEBUG</h6>
                                </div>
                                <div class="col-md-4 text-right"><input name="APP_DEBUG" type="checkbox"
                                        class="js-switch-setting-first" /></div>

                                <div class="col-md-12">
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> Turn it <b>ON</b>.
                                        IF you face 500 error.</small>
                                </div>

                            </div>

                            <div class="p-1 row align-items-center pb-2">

                                <div class="col-md-8">
                                    <h6 class="mb-0">Disable Right Click?</h6>
                                </div>
                                <div class="col-md-4 text-right"><input name="right_click" type="checkbox"
                                        class="js-switch-setting-first" /></div>

                                <div class="col-md-12">
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> If enabled than
                                        Right click will not work on whole project.</small>
                                </div>

                            </div>

                            <div class="p-1 row align-items-center pb-2">

                                <div class="col-md-8">
                                    <h6 class="mb-0">Disables Inspect Element?</h6>
                                </div>
                                <div class="col-md-4 text-right"><input type="checkbox"
                                        class="js-switch-setting-first" name="inspect" /></div>

                                <div class="col-md-12">
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> <b>CTRL+U OR
                                            CTRL+SHIFT+I</b> keys not work on whole project.</small>
                                </div>

                            </div>

                            <div class="p-1 row align-items-center pb-2">

                                <div class="col-md-8">
                                    <h6 class="mb-0">Login to display price</h6>
                                </div>
                                <div class="col-md-4 text-right"><input type="checkbox"
                                        class="js-switch-setting-first" name="login" checked /></div>

                                <div class="col-md-12">
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> If enabled only
                                        logged in users will able to see product prices.</small>
                                </div>

                            </div>

                            <div class="p-1 row align-items-center pb-2">

                                <div class="col-md-8">
                                    <h6 class="mb-0">Enable email verification on registration?</h6>
                                </div>
                                <div class="col-md-4 text-right"><input type="checkbox"
                                        class="js-switch-setting-first" name="email_verify_enable" checked /></div>

                                <div class="col-md-12">
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> If enabled than
                                        email will be sent to user when register.</small>
                                </div>

                            </div>

                            <div class="p-1 row align-items-center pb-2">

                                <div class="col-md-8">
                                    <h6 class="mb-0">Enable Cash on delivery?</h6>
                                </div>
                                <div class="col-md-4 text-right"><input type="checkbox"
                                        class="js-switch-setting-first" name="COD_ENABLE" /></div>

                                <div class="col-md-12">
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> If enabled than
                                        cash on delivery will enable on payment page.</small>
                                </div>

                            </div>

                            <div class="p-1 row align-items-center pb-2">

                                <div class="col-md-8">
                                    <h6 class="mb-0">Hide sidebar?</h6>
                                </div>
                                <div class="col-md-4 text-right"><input type="checkbox"
                                        class="js-switch-setting-first" name="HIDE_SIDEBAR" /></div>

                                <div class="col-md-12">
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> By toggling it
                                        make the full width front page it.</small>
                                </div>

                            </div>

                            <div class="text-right">
                                <button class="btn btn-md rounded btn-primary-rgba">
                                    <i class="feather icon-save"></i> Save settings
                                </button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            <!-- Notification Sidebar -->
            <div id="notification-sidebar" class="infobar-settings-sidebar">
                <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
                    <h4> You have 71 New Orders Notification!

                    </h4><a href="javascript:void(0)" id="notification-sidebar-close"
                        class="infobar-settings-close"><img
                            src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/svg-icon/close.svg"
                            class="img-fluid menu-hamburger-close" alt="close"></a>
                </div>
                <div class="infobar-settings-sidebar-body">
                    <a class="mr-3 float-right" href="https://emart.mediacity.co.in/demo/public/markasread/order">Mark
                        all as read</a>
                    <div class="clearfix"></div>
                    <div class="p-3" style="maxheight: 500px;overflow: auto">





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD65029defbeb72 Received"
                                onclick="markread('781ce279-37ad-43ab-b960-33d7580ed4e8')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/65029defbeb72">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD65029defbeb72 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>14th Sep 23</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD646c5d6f69fca Received"
                                onclick="markread('7733100a-a22a-4867-84ab-611af6abc61c')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/646c5d6f69fca">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD646c5d6f69fca Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>23rd May 23</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6385fe2cc6318 Received"
                                onclick="markread('42415e7e-da1d-4d56-a81a-0737bddafe53')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6385fe2cc6318">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6385fe2cc6318 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>29th Nov 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6385fd4c3a439 Received"
                                onclick="markread('4e63bec3-376e-4355-813e-d0f490118656')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6385fd4c3a439">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6385fd4c3a439 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>29th Nov 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6385efa0cd4c4 Received"
                                onclick="markread('75df1501-9937-4155-940c-8e610c564328')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6385efa0cd4c4">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6385efa0cd4c4 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>29th Nov 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6385e03f58bec Received"
                                onclick="markread('c91d5d5d-9207-44d1-84c8-a6519d2541db')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6385e03f58bec">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6385e03f58bec Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>29th Nov 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD638094d7ea403 Received"
                                onclick="markread('23c7d1d8-b12f-4567-a9a2-24eb1dc6567e')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/638094d7ea403">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD638094d7ea403 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>25th Nov 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6380444d106e8 Received"
                                onclick="markread('f3ca6ff5-47fb-4a35-a921-7840c98e6066')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6380444d106e8">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6380444d106e8 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>25th Nov 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD637fb9e7d24b7 Received"
                                onclick="markread('eedd4a04-d9c3-44f5-af36-afb9b656d019')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/637fb9e7d24b7">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD637fb9e7d24b7 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>24th Nov 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD62e3d4d3b2291 Received"
                                onclick="markread('cb0ccf1c-4820-419d-ac48-fccd8f00e5b8')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/62e3d4d3b2291">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD62e3d4d3b2291 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>29th Jul 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD62ac116d40e04 Received"
                                onclick="markread('1f96a95b-34fb-4e30-aa60-1e6c1800d204')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/62ac116d40e04">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD62ac116d40e04 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>17th Jun 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD62ab50f384121 Received"
                                onclick="markread('34fffc9c-31f7-4b89-a62b-cde0b193267d')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/62ab50f384121">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD62ab50f384121 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>16th Jun 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD62a9fdcaaa0e9 Received"
                                onclick="markread('cc318b70-459c-4db0-9893-9be97fc5a7fd')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/62a9fdcaaa0e9">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD62a9fdcaaa0e9 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>15th Jun 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD62a9fa66df732 Received"
                                onclick="markread('42ff7733-dfc9-4634-a838-7268234e5e7a')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/62a9fa66df732">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD62a9fa66df732 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>15th Jun 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD62a9f4de4b837 Received"
                                onclick="markread('a307ef06-1f9d-47a0-b295-9c39f6d3dcd0')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/62a9f4de4b837">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD62a9f4de4b837 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>15th Jun 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6296158321aa6 Received"
                                onclick="markread('b2816383-6c33-4934-903e-7298a3be87c9')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6296158321aa6">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6296158321aa6 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>31st May 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD629613dcc95c4 Received"
                                onclick="markread('cbc02305-7d48-42ec-8ee5-406c3699168e')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/629613dcc95c4">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD629613dcc95c4 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>31st May 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6296090ac71ff Received"
                                onclick="markread('39b447fa-1bae-4c6e-b99e-b47f58692ad0')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6296090ac71ff">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6296090ac71ff Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>31st May 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6288770a9fc0f Received"
                                onclick="markread('87e03dd3-2f31-4ad5-abd8-0cee56ed4210')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6288770a9fc0f">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6288770a9fc0f Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>21st May 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD628766f890760 Received"
                                onclick="markread('74c76fcb-75fe-46f0-b297-8e086fed7ca1')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/628766f890760">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD628766f890760 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>20th May 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD62873d2139249 Received"
                                onclick="markread('1ef5e6d7-331d-43c4-a80f-6b735f7a2a71')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/62873d2139249">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD62873d2139249 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>20th May 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD628739ec258fd Received"
                                onclick="markread('d129b07c-1c45-49c1-a5ba-9eb1f76a2204')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/628739ec258fd">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD628739ec258fd Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>20th May 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6285d33ad6ab8 Received"
                                onclick="markread('922561ae-5568-4665-9b40-00c7df926117')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6285d33ad6ab8">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6285d33ad6ab8 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>19th May 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61de85e044eb4 Received"
                                onclick="markread('e379ffbc-0385-4a0a-88e5-7b65931aa8d7')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61de85e044eb4">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61de85e044eb4 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>12th Jan 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61de84b3a1631 Received"
                                onclick="markread('3835d5e7-b35b-4168-9c69-9fdcc88bd748')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61de84b3a1631">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61de84b3a1631 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>12th Jan 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61de80a00b413 Received"
                                onclick="markread('3a2384e6-e0ad-4bd7-b4ea-8216e89c6c40')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61de80a00b413">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61de80a00b413 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>12th Jan 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61dd2b59b9861 Received"
                                onclick="markread('386e3c30-b9c0-440f-939b-0046b4f3fff4')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61dd2b59b9861">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61dd2b59b9861 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>11th Jan 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61d2d43917c8f Received"
                                onclick="markread('8ae69c8c-f98c-4041-b218-876a4960d1ff')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61d2d43917c8f">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61d2d43917c8f Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>3rd Jan 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61d2d3c3117f3 Received"
                                onclick="markread('fde4c0ea-eb4d-4bb5-9cf0-d18cb9845221')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61d2d3c3117f3">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61d2d3c3117f3 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>3rd Jan 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61d2d289487ee Received"
                                onclick="markread('d8eeb191-6fe2-4846-ab34-2be87163b9ed')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61d2d289487ee">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61d2d289487ee Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>3rd Jan 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD Received"
                                onclick="markread('42d6c0c5-0f37-4a34-89b2-de11324e76f3')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>3rd Jan 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61d291c01f5b7 Received"
                                onclick="markread('f214f8f9-e3b3-43ab-93ca-cf7cb07f0e9c')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61d291c01f5b7">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61d291c01f5b7 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>3rd Jan 22</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal"
                                title="For Order #EODD61ae04e449f1f Item Maggi Masala Ae Magic 6 g (Pack of 12)(  ) has been Cancelled"
                                onclick="markread('0df164e9-f50c-4c56-a659-16514017f9ba')"
                                href="https://emart.mediacity.co.in/demo/public/admin/ord/canceled">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #For Order #EODD61ae04e449f1f Item Maggi Masala Ae Magic 6 g (Pack of 12)( ) has been
                                Cancelled
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>6th Dec 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61ae04e449f1f Received"
                                onclick="markread('656917c8-9347-4d9e-bfe4-0cba03cc7a21')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61ae04e449f1f">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61ae04e449f1f Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>6th Dec 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61ab5c39ae90c Received"
                                onclick="markread('6f900bfe-7d8d-4fd0-8d52-931e4d3cb06a')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61ab5c39ae90c">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61ab5c39ae90c Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>4th Dec 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61ab5b5e6cbf3 Received"
                                onclick="markread('9648ed24-263e-4b6d-aa9d-454049e008f3')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61ab5b5e6cbf3">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61ab5b5e6cbf3 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>4th Dec 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61ab5a71b4af1 Received"
                                onclick="markread('b474de5e-3708-4d04-8707-a07ae5f4841b')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61ab5a71b4af1">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61ab5a71b4af1 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>4th Dec 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61ab5a134bd46 Received"
                                onclick="markread('d98475bd-8a2b-44d4-b5d8-70314a446d57')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61ab5a134bd46">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61ab5a134bd46 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>4th Dec 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61ab302ecf437 Received"
                                onclick="markread('d477fa7e-21a2-4e8e-b0d7-c66ed99a8b08')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61ab302ecf437">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61ab302ecf437 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>4th Dec 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61ab2977a3363 Received"
                                onclick="markread('eb7f69cb-abac-4e00-9d22-d75763947389')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61ab2977a3363">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61ab2977a3363 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>4th Dec 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61ab0e360e9bd Received"
                                onclick="markread('4cac0b11-88bc-4afb-b643-418c1e2ece1e')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61ab0e360e9bd">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61ab0e360e9bd Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>4th Dec 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61a5d71d9c4db Received"
                                onclick="markread('a55314c5-4766-494e-9ac0-14aecc452162')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61a5d71d9c4db">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61a5d71d9c4db Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>30th Nov 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61963e9e25972 Received"
                                onclick="markread('f0830965-cca4-43c8-84a5-a15ed4b1bcc8')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61963e9e25972">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61963e9e25972 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>18th Nov 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD618fa5529f60a Received"
                                onclick="markread('f531e133-fa4c-49a3-b515-f2ff1b62181d')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/618fa5529f60a">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD618fa5529f60a Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>13th Nov 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD618cdbe7316d1 Received"
                                onclick="markread('ca615738-c86f-4403-befe-b4064acd72db')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/618cdbe7316d1">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD618cdbe7316d1 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>11th Nov 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal"
                                title="For Order #EODD618b6a9989fb4 Item iTab(  ) has been Return Requested"
                                onclick="markread('86baab00-1cd6-4d92-9528-3ed02843d68e')"
                                href="https://emart.mediacity.co.in/demo/public/admin/update/returnOrder/4">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #For Order #EODD618b6a9989fb4 Item iTab( ) has been Return Requested
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>10th Nov 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal"
                                title="For Order #EODD 618b6a9989fb4 Item iTab () has been Return Requested"
                                onclick="markread('9c62ed38-c4cb-493c-8bbb-1ef48ea985ff')"
                                href="http://emart.test/seller/show/returnOrder/4">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #For Order #EODD 618b6a9989fb4 Item iTab () has been Return Requested
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>10th Nov 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD618b6a9989fb4 Received"
                                onclick="markread('e4be136e-11d5-4a88-8c7b-b25294154406')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/618b6a9989fb4">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD618b6a9989fb4 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>10th Nov 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD Received"
                                onclick="markread('a557ed98-dd35-4e9a-b64d-70d04c8e736e')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>10th Nov 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal"
                                title="For Order #EODD61753832753b0 Item iTab(  ) has been Return Requested"
                                onclick="markread('7a97b6a1-ee7e-4d22-b012-c8e9ba6221ac')"
                                href="https://emart.mediacity.co.in/demo/public/admin/update/returnOrder/3">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #For Order #EODD61753832753b0 Item iTab( ) has been Return Requested
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>9th Nov 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal"
                                title="For Order #EODD 61753832753b0 Item iTab () has been Return Requested"
                                onclick="markread('e086f463-4e5f-4320-8039-a483a74e05f9')"
                                href="http://emart.test/seller/show/returnOrder/3">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #For Order #EODD 61753832753b0 Item iTab () has been Return Requested
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>9th Nov 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61753832753b0 Received"
                                onclick="markread('dfc343da-9a3b-49a2-8b6c-d268582dff73')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61753832753b0">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61753832753b0 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>24th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6175302cad557 Received"
                                onclick="markread('00401dbe-baa5-498b-b869-e209142ff8c5')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6175302cad557">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6175302cad557 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>24th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD617529fb3c5b3 Received"
                                onclick="markread('9d5da5d9-43f3-40c2-b858-557938f3b322')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/617529fb3c5b3">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD617529fb3c5b3 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>24th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD Received"
                                onclick="markread('31538102-419f-4075-a11a-cb9fad08391f')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>24th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD616c1fb0d9dde Received"
                                onclick="markread('36da38d0-67d5-4cb5-a805-b33096acdf9a')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/616c1fb0d9dde">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD616c1fb0d9dde Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>17th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD616c1eb70b831 Received"
                                onclick="markread('7d838d22-89f4-4667-9efd-521fbc99bc55')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/616c1eb70b831">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD616c1eb70b831 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>17th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD616c1790b1e73 Received"
                                onclick="markread('068b6f8d-ab7a-40d1-8bc8-5c68bd782152')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/616c1790b1e73">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD616c1790b1e73 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>17th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD616aa95b0271d Received"
                                onclick="markread('984cd293-bd79-4f61-ab1a-ab44c30a8cf7')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/616aa95b0271d">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD616aa95b0271d Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>16th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD616aa5f735782 Received"
                                onclick="markread('20fe6fc1-e26a-44b7-be36-07437deb2418')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/616aa5f735782">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD616aa5f735782 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>16th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD616aa1d5577fd Received"
                                onclick="markread('bca11ec8-8442-42b9-b2b2-170e5f93d9ec')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/616aa1d5577fd">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD616aa1d5577fd Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>16th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61697cb3cdeda Received"
                                onclick="markread('9fede98a-45e4-42bd-8e49-5712eacd21a6')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61697cb3cdeda">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61697cb3cdeda Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>15th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6169743751314 Received"
                                onclick="markread('6fd3ba18-07bd-4430-b3bf-28960be34086')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6169743751314">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6169743751314 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>15th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61696103ce7d4 Received"
                                onclick="markread('08b53255-b06f-4b6f-b489-1397511523a9')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61696103ce7d4">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61696103ce7d4 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>15th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61695fed1877d Received"
                                onclick="markread('8f62cbb0-ed7e-4214-910a-290b9c783988')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61695fed1877d">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61695fed1877d Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>15th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61695f39a3086 Received"
                                onclick="markread('256b2c5f-919a-408d-b1cc-6aec4efc5090')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61695f39a3086">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61695f39a3086 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>15th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6169378a364d1 Received"
                                onclick="markread('27f923ca-a7f3-42d8-a554-61cf5bf15865')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6169378a364d1">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6169378a364d1 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>15th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD616936dfd5aaa Received"
                                onclick="markread('8cd48a0e-8f4a-4650-9756-1a4447e05d61')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/616936dfd5aaa">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD616936dfd5aaa Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>15th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD61693109c97ac Received"
                                onclick="markread('3ee03ba0-16f1-466e-86d7-1bcad0cf46bc')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/61693109c97ac">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD61693109c97ac Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>15th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6167da18c96b9 Received"
                                onclick="markread('e2c3f737-76f8-4745-ad0b-aa80f7b6b936')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6167da18c96b9">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6167da18c96b9 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>14th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>





                        <div class="bg-primary-rgba p-3">
                            <a class="font-weight-normal" title="New Order #EODD6167bfae59ce2 Received"
                                onclick="markread('40d83bc1-c69c-444c-9be5-2a1762641329')"
                                href="https://emart.mediacity.co.in/demo/public/admin/order/view/6167bfae59ce2">
                                <img src="https://emart.mediacity.co.in/demo/public/admin_new/assets/images/ecommerce/product_04.svg"
                                    class="img-fluid" width="35" alt="product">
                                #New Order #EODD6167bfae59ce2 Received
                            </a>
                            <div class="clearfix"></div>
                            <small class="clearfix float-right"><i class="feather icon-calendar"
                                    aria-hidden="true"></i>14th Oct 21</small>

                        </div>
                        <div class="clearfix"></div>






                    </div>

                </div>
            </div>
            <div class="contentbar bardashboard-card">
                <div class="row">

                    <div class="col-lg-12">



                        <div class="card m-b-30">
                            <div class="card-body">

                                <ul class="tabbable nav nav-pills mb-3" id="pills-tab" role="tablist">

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                            href="#brand" role="tab" aria-controls="brand"
                                            aria-selected="true"><i class="feather icon-folder"></i> Brand</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                            href="#logodir" role="tab" aria-controls="logodir"
                                            aria-selected="false"><i class="feather icon-folder"></i> Logo</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                            href="#simple_products" role="tab" aria-controls="simple_products"
                                            aria-selected="false"><i class="feather icon-folder"></i> Simple
                                            Products</a>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                            href="#product_files" role="tab" aria-controls="simple_products"
                                            aria-selected="false"><i class="feather icon-folder"></i> Digital
                                            Product Files</a>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                            href="#category_files" role="tab" aria-controls="simple_products"
                                            aria-selected="false"><i class="feather icon-folder"></i> Category
                                            Files</a>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                            href="#subcategory_files" role="tab"
                                            aria-controls="simple_products" aria-selected="false"><i
                                                class="feather icon-folder"></i> Subcategory Files</a>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                            href="#blog_files" role="tab" aria-controls="blog_files"
                                            aria-selected="false"><i class="feather icon-folder"></i> Blog Files</a>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                            href="#manual_payment" role="tab" aria-controls="blog_files"
                                            aria-selected="false"><i class="feather icon-folder"></i> Manual
                                            Payment</a>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                            href="#simple_pro_gallery" role="tab"
                                            aria-controls="simple_pro_gallery" aria-selected="false"><i
                                                class="feather icon-folder"></i> Simple Products Gallery</a>
                                    </li>

                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="brand" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <div data-midia-can_choose="false" id="media1"></div>
                                    </div>
                                    <div class="tab-pane fade" id="logodir" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div data-midia-can_choose="false" id="media2"></div>
                                    </div>
                                    <div class="tab-pane fade" id="simple_products" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <div data-midia-can_choose="false" id="media3"></div>
                                    </div>
                                    <div class="tab-pane fade" id="product_files" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <div data-midia-can_choose="false" id="media4"></div>
                                    </div>
                                    <div class="tab-pane fade" id="category_files" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <div data-midia-can_choose="false" id="media5"></div>
                                    </div>
                                    <div class="tab-pane fade" id="subcategory_files" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <div data-midia-can_choose="false" id="media6"></div>
                                    </div>
                                    <div class="tab-pane fade" id="blog_files" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <div data-midia-can_choose="false" id="media7"></div>
                                    </div>
                                    <div class="tab-pane fade" id="manual_payment" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <div data-midia-can_choose="false" id="media8"></div>
                                    </div>
                                    <div class="tab-pane fade" id="simple_pro_gallery" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <div data-midia-can_choose="false" id="media9"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Start Footerbar -->
            <div class="footerbar">
                <footer class="footer">
                    <p class="mb-0">
                        emart Copyright © 2023 emart.</strong>
                        <span class="pull-right"><b>v 4.1 (release 3.9.0)</b>
                    </p>
                </footer>
            </div>




            <!-- End Footerbar -->
        </div>

    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script type="text/javascript">
        toastr.options = [];
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/vendor/midia/dropzone.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/vendor/midia/clipboard.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/vendor/midia/midia.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/popper.min.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/bootstrap.min.js"></script>

    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/colorpicker/bootstrap-colorpicker.js">
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/custom/custom-form-colorpicker.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/jquery.dataTables.min.js">
    </script>
    <script
        src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/dataTables.bootstrap4.min.js">
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/dataTables.buttons.min.js">
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/buttons.bootstrap4.min.js">
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/jszip.min.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/buttons.html5.min.js">
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/buttons.print.min.js">
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/buttons.colVis.min.js">
    </script>
    <script
        src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/dataTables.responsive.min.js">
    </script>
    <script
        src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datatables/responsive.bootstrap4.min.js">
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/custom/custom-table-datatable.js"></script>



    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/bootstrap-iconpicker.bundle.min.js"></script>


    <!-- Tagsinput js -->
    <script
        src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js">
    </script>
    <script
        src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/bootstrap-tagsinput/typeahead.bundle.js">
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/modernizr.min.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/detect.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/jquery.slimscroll.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/vertical-menu.js"></script>

    <!-- chart js -->
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/chart.js/chart.min.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/chart.js/chart-bundle.min.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/front/vendor/js/moment-with-locales.js"></script>



    <!-- Switchery js -->
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/switchery/switchery.min.js"></script>
    <!-- Apex js -->
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/apexcharts/irregular-data-series.js">
    </script>
    <!-- Slick js -->
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/slick/slick.min.js"></script>
    <!-- Pnotify js -->
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/pnotify/js/pnotify.custom.min.js">
    </script>
    <!-- Select2 js -->
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/select2/select2.min.js"></script>

    <script
        src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js">
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/custom/custom-form-touchspin.js"></script>

    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/bs-custom-file-input.min.js"></script>

    <!-- datepicker -->
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datepicker/datepicker.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/datepicker/i18n/datepicker.en.js">
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/custom/custom-form-datepicker.js"></script>


    <!-- Vector Maps js -->
    <script
        src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js">
    </script>
    <script
        src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js">
    </script>
    <script>
        var rtl = false;
    </script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/custom/custom-dashboard.js"></script>

    <!-- TinyMCE Editor -->
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/tinymce/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/master.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/js/core.js"></script>
    <script src="https://emart.mediacity.co.in/demo/public/admin_new/assets/plugins/pace/pace.min.js"></script>

    <script>
        PNotify.desktop.permission();




        $('.select2').select2();

        $(function() {



            bsCustomFileInput.init()
        });
    </script>
    <script>
        var brandindexurl = "https://emart.mediacity.co.in/demo/public/admin/brand";
        var cityindex = "https:\/\/emart.mediacity.co.in\/demo\/public\/admin\/city";
        var countyindex = "https:\/\/emart.mediacity.co.in\/demo\/public\/admin\/country";
        var baseUrl = "https:\/\/emart.mediacity.co.in\/demo\/public";
    </script>
    <!-- Default Admin js -->
    <script src="https://emart.mediacity.co.in/demo/public/js/admin.js"></script>
    <!-- End js -->
    <script>
        $("#media1").midia({
            inline: true,
            base_url: 'https://emart.mediacity.co.in/demo/public',
            title: 'Brand Media Manager',
            directory_name: 'brand',
            dropzone: {
                acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif,.pdf,.docx,.doc'
            }
        });

        $("#media2").midia({
            inline: true,
            base_url: 'https://emart.mediacity.co.in/demo/public',
            title: 'Logo Media Manager',
            directory_name: 'logo'
        });

        $("#media3").midia({
            inline: true,
            base_url: 'https://emart.mediacity.co.in/demo/public',
            title: 'Simple Products Media Manager',
            directory_name: 'simple_products',
            dropzone: {
                acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif,.pdf,.docx,.doc'
            }
        });

        $("#media4").midia({
            inline: true,
            base_url: 'https://emart.mediacity.co.in/demo/public',
            title: 'Digital Product Files Media Manager',
            directory_name: 'product_files',
            dropzone: {
                acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif,.pdf,.docx,.doc'
            }
        });

        $("#media5").midia({
            inline: true,
            base_url: 'https://emart.mediacity.co.in/demo/public',
            title: 'Category Files Media Manager',
            directory_name: 'category',
            dropzone: {
                acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif,.pdf,.docx,.doc'
            }
        });

        $("#media6").midia({
            inline: true,
            base_url: 'https://emart.mediacity.co.in/demo/public',
            title: 'Subcategory Files Media Manager',
            directory_name: 'subcategory',
            dropzone: {
                acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif,.pdf,.docx,.doc'
            }
        });

        $("#media7").midia({
            inline: true,
            base_url: 'https://emart.mediacity.co.in/demo/public',
            title: 'Blog Files Media Manager',
            directory_name: 'blog',
            dropzone: {
                acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif,.pdf,.docx,.doc'
            }
        });

        $("#media8").midia({
            inline: true,
            base_url: 'https://emart.mediacity.co.in/demo/public',
            title: 'Manual Payment Files Media Manager',
            directory_name: 'manual_payment',
            dropzone: {
                acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif,.pdf,.docx,.doc'
            }
        });

        $("#media9").midia({
            inline: true,
            base_url: 'https://emart.mediacity.co.in/demo/public',
            title: 'Simple Products Gallery Files Media Manager',
            directory_name: 'simple_products_gallery',
            dropzone: {
                acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif,.pdf,.docx,.doc'
            }
        });
    </script>
</body>

</html>
