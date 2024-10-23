<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FLATICON ===============-->
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css" />

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!--=============== AJAX ===============-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--=============== MIDTRANS ===============-->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>


    <title>Snack Dari Buah Garing - {{ $Title }} </title>
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header">
        <div class="header__top">
            <div class="header__container container">
                <div class="header__contact">
                    <span>(+62) 8213-2460-155</span>
                </div>
                <p class="header__alert-news">
                    Camilan Garing Dari Buah Segar
                </p>
            </div>
        </div>

        <nav class="nav container">
            <a href="index.html" class="nav__logo">
                <img class="nav__logo-img" src="{{ asset('img/logo.png') }}" alt="website logo" />
            </a>
            <div class="nav__menu" id="nav-menu">
                <div class="nav__menu-top">
                    <a href="index.html" class="nav__menu-logo">
                        <img src="{{ asset('img/logo.png') }}" alt="">
                    </a>
                    <div class="nav__close" id="nav-close">
                        <i class="fi fi-rs-cross-small"></i>
                    </div>
                </div>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="{{ route('home') }}" class="nav__link active-link">Product</a>
                    </li>
                    @auth
                        <li class="nav__item">
                            <a href="{{ route('accounts') }}" class="nav__link">My Account</a>
                        </li>
                    @endauth
                </ul>
                <div class="header__search">
                    <input type="text" placeholder="Search For Items..." class="form__input" />
                    <button class="search__btn">
                        <img src="{{ asset('img/search.png') }}" alt="search icon" />
                    </button>
                </div>
            </div>
            <div class="header__user-actions">
                <a href="{{ route('cart') }}" class="header__action-btn" title="Cart">
                    <img src="{{ asset('img/icon-cart.svg') }}" alt="" />
                    <span class="count">{{ $Total }}</span>
                </a>
                <div class="header__action-btn nav__toggle" id="nav-toggle">
                    <img src="{{ asset('img/menu-burger.svg') }}" alt="">
                </div>
            </div>
        </nav>
    </header>
    @yield('container')
    <!--=============== FOOTER ===============-->
    <footer class="footer container">
        <div class="footer__container grid">
            <div class="footer__content">
                <a href="index.html" class="footer__logo">
                    <img src="{{ asset('img/logo.svg') }}" alt="" class="footer__logo-img" />
                </a>
                <h4 class="footer__subtitle">Contact</h4>
                <p class="footer__description">
                    <span>Jln:</span>Lettu Suyito RT 1 RW 1 Tulung Rejo, Trucuk Bojonegoro
                </p>
                <p class="footer__description">
                    <span>Phone:</span> (+62) 8213-2460-155
                </p>
                <p class="footer__description">
                    <span>Hours:</span> 08:00 - 16:30, Mon - Sat
                </p>
                <div class="footer__social">
                    <h4 class="footer__subtitle">Follow Me</h4>
                    <div class="footer__links flex">
                        <a href="#">
                            <img src="{{ asset('img/icon-facebook.svg') }}" alt=""
                                class="footer__social-icon" />
                        </a>
                        <a href="#">
                            <img src="{{ asset('img/icon-twitter.svg') }}" alt=""
                                class="footer__social-icon" />
                        </a>
                        <a href="#">
                            <img src="{{ asset('img/icon-instagram.svg') }}" alt=""
                                class="footer__social-icon" />
                        </a>
                        <a href="#">
                            <img src="{{ asset('img/icon-pinterest.svg') }}" alt=""
                                class="footer__social-icon" />
                        </a>
                        <a href="#">
                            <img src="./assets/img/icon-youtube.svg" alt="" class="footer__social-icon" />
                        </a>
                    </div>
                </div>
            </div>
            {{-- <div class="footer__content">
                <h3 class="footer__title">Jln.</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">About Us</a></li>
                    <li><a href="#" class="footer__link">Delivery Information</a></li>
                    <li><a href="#" class="footer__link">Privacy Policy</a></li>
                    <li><a href="#" class="footer__link">Terms & Conditions</a></li>
                    <li><a href="#" class="footer__link">Contact Us</a></li>
                    <li><a href="#" class="footer__link">Support Center</a></li>
                </ul>
            </div> --}}
            {{-- <div class="footer__content">
                <h3 class="footer__title">My Account</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">Sign In</a></li>
                    <li><a href="#" class="footer__link">View Cart</a></li>
                    <li><a href="#" class="footer__link">My Wishlist</a></li>
                    <li><a href="#" class="footer__link">Track My Order</a></li>
                    <li><a href="#" class="footer__link">Help</a></li>
                    <li><a href="#" class="footer__link">Order</a></li>
                </ul>
            </div> --}}
            <div class="footer__content">
                <h3 class="footer__title">Secured Payed Gateways</h3>
                <img src="{{ asset('img/payment-method.png') }}" alt="" class="payment__img" />
            </div>
        </div>
        <div class="footer__bottom">
            <p class="copyright">&copy; 2024 Evara. All right reserved</p>
            <span class="designer">Designer by Crypticalcoder</span>
        </div>
    </footer>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
