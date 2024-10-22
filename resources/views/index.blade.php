@extends('component')
@section('container')
    <!--=============== MAIN ===============-->
    <main class="main">

        <!--=============== PRODUCTS ===============-->
        <section class="products container section">
            <div class="tab__btns">
                @foreach ($Categories as $categorie)
                @if ($categorie->name == "Buah")
                    <span class="tab__btn active-tab" data-target="#{{ $categorie->name }}">{{$categorie->name}}</span>
                @else
                    <span class="tab__btn" data-target="#{{ $categorie->name }}">{{$categorie->name}}</span>
                @endif
                @endforeach
                {{-- <span class="tab__btn" data-target="#popular">Popular</span>
                <span class="tab__btn" data-target="#new-added">New Added</span> --}}
            </div>

            <div class="tab__items">
                <div class="tab__item active-tab" content id="Buah">
                    <div class="products__container grid">
                        @foreach ($ProductBuah as $buah)
                            <div class="product__item">
                                <div class="product__banner">
                                    <a class="product__images">
                                        <img src="{{ asset("img/".$buah->image_url) }}" alt="" class="product__img default" />
                                    </a>
                                </div>
                                <div class="product__content">
                                    <span class="product__category">{{ $buah->category->name }}</span>
                                    <a>
                                        <h3 class="product__title">{{ $buah->name }}</h3>
                                    </a>
                                    <div class="product__price flex">
                                        <span class="new__price">Rp.{{ $buah->price }}</span>
                                    </div>
                                    <a class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="fi fi-rs-shopping-bag-add"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab__item" content id="Sayuran">
                    <div class="products__container grid">
                        @foreach ($ProductSayuran as $sayuran)
                            <div class="product__item">
                                <div class="product__banner">
                                    <a class="product__images">
                                        <img src="{{ asset("img/".$sayuran->image_url) }}" alt="" class="product__img default" />
                                    </a>
                                </div>
                                <div class="product__content">
                                    <span class="product__category">{{ $sayuran->category->name }}</span>
                                        <h3 class="product__title">{{ $sayuran->name }}</h3>
                                    <div class="product__price flex">
                                        <span class="new__price">Rp.{{ $sayuran->price }}</span>
                                    </div>
                                    <a class="action__btn cart__btn" aria-label="Add To Cart">
                                        <i class="fi fi-rs-shopping-bag-add"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!--=============== NEW ARRIVALS ===============-->
        <section class="new__arrivals container section">
            <h3 class="section__title"><span>New</span> Products</h3>
            <div class="new__container swiper">
                <div class="swiper-wrapper">
                    @foreach ($LatesProduct as $terbaru)
                        <div class="product__item swiper-slide">
                            <div class="product__banner">
                                <a href="details.html" class="product__images">
                                    <img src="{{ asset("img/".$terbaru->image_url) }}" alt="" class="product__img default" />
                                </a>
                            </div>
                            <div class="product__content">
                                <span class="product__category">{{ $terbaru->category->name }}</span>
                                <a href="details.html">
                                    <h3 class="product__title">{{ $terbaru->name }}</h3>
                                </a>
                                <div class="product__price flex">
                                    <span class="new__price">{{ $terbaru->price }}</span>
                                </div>
                                <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                                    <i class="fi fi-rs-shopping-bag-add"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-button-prev">
                    <i class="fi fi-rs-angle-left"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="fi fi-rs-angle-right"></i>
                </div>
            </div>
        </section>

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
