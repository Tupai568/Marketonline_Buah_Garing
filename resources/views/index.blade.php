@extends('component')
@section('container')
    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== HOME ===============-->
        <section class="home section--lg">
            <div class="home__container container grid">
                <div class="home__content">
                    <span class="home__subtitle">Camilan Menggugah Selera</span>
                    <h1 class="home__title">
                        Camilan Enak <br><span>Kering & Renyah</span>
                    </h1>
                    <p class="home__description">
                        Camilan Praktis untuk Segala Kesempatan
                    </p>
                    <a href="shop.html" class="btn">Shop Now</a>
                </div>
                <img src="{{ asset('img/buah.png') }}" class="home__img" alt="hats" />
            </div>
        </section>

        <section class=""></section>

        <!--=============== PRODUCTS ===============-->
        <section class="products container section">
            <div class="tab__items">
                <div class="tab__item active-tab" content id="featured">
                    <div class="products__container grid">
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="details.html" class="product__images">
                                    <img src="{{ asset('img/Snack.jpg') }}" alt="" class="product__img default" />
                                    <img src="assets/img/product-1-2.jpg" alt="" class="product__img hover" />
                                </a>
                                <div class="product__actions">
                                    <a href="#" class="action__btn" aria-label="Quick View">
                                        <i class="fi fi-rs-eye"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Add to Wishlist">
                                        <i class="fi fi-rs-heart"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Compare">
                                        <i class="fi fi-rs-shuffle"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product__content">
                                <span class="product__category">Snack</span>
                                <a href="details.html">
                                    <h3 class="product__title">Buah Garing Pisang</h3>
                                </a>
                                <div class="product__price flex">
                                    <span class="new__price">Rp.25,000</span>
                                </div>
                                <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="fi fi-rs-shopping-bag-add"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="details.html" class="product__images">
                                    <img src="{{ asset('img/Snack.jpg') }}" alt="" class="product__img default" />
                                    <img src="assets/img/product-1-2.jpg" alt="" class="product__img hover" />
                                </a>
                                <div class="product__actions">
                                    <a href="#" class="action__btn" aria-label="Quick View">
                                        <i class="fi fi-rs-eye"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Add to Wishlist">
                                        <i class="fi fi-rs-heart"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Compare">
                                        <i class="fi fi-rs-shuffle"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product__content">
                                <span class="product__category">Snack</span>
                                <a href="details.html">
                                    <h3 class="product__title">Buah Garing Pisang</h3>
                                </a>
                                <div class="product__price flex">
                                    <span class="new__price">Rp.25,000</span>
                                </div>
                                <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="fi fi-rs-shopping-bag-add"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="details.html" class="product__images">
                                    <img src="{{ asset('img/Snack.jpg') }}" alt="" class="product__img default" />
                                    <img src="assets/img/product-1-2.jpg" alt="" class="product__img hover" />
                                </a>
                                <div class="product__actions">
                                    <a href="#" class="action__btn" aria-label="Quick View">
                                        <i class="fi fi-rs-eye"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Add to Wishlist">
                                        <i class="fi fi-rs-heart"></i>
                                    </a>
                                    <a href="#" class="action__btn" aria-label="Compare">
                                        <i class="fi fi-rs-shuffle"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product__content">
                                <span class="product__category">Snack</span>
                                <a href="details.html">
                                    <h3 class="product__title">Buah Garing Pisang</h3>
                                </a>
                                <div class="product__price flex">
                                    <span class="new__price">Rp.25,000</span>
                                </div>
                                <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="fi fi-rs-shopping-bag-add"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=============== DEALS ===============-->

        <!--=============== NEW ARRIVALS ===============-->

        <!--=============== SHOWCASE ===============-->

        <!--=============== NEWSLETTER ===============-->
        <section class="newsletter section home__newsletter">
            <div class="newsletter__container container grid">
                <h3 class="newsletter__title flex">
                    <img src="./assets/img/icon-email.svg" alt="" class="newsletter__icon" />
                    Sign in to Newsletter
                </h3>
                <p class="newsletter__description">
                    ...and receive $25 coupon for first shopping.
                </p>
                <form action="" class="newsletter__form">
                    <input type="text" placeholder="Enter Your Email" class="newsletter__input" />
                    <button type="submit" class="newsletter__btn">Subscribe</button>
                </form>
            </div>
        </section>
    </main>
@endsection
