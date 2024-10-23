@extends('component')
@section('container')
    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== BREADCRUMB ===============-->
        <section class="breadcrumb">
            <ul class="breadcrumb__list flex container">
                <li><a href="{{ route('home') }}" class="breadcrumb__link">Home</a></li>
                <li><span class="breadcrumb__link"></span>></li>
                <li><span class="breadcrumb__link">Cart</span></li>
            </ul>
        </section>

        <!--=============== CART ===============-->
        <section class="cart section--lg container">
            <div class="table__container">
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody class="dataCart">
                        @foreach ($CartItems as $item)
                            <tr>
                                <td data-label="Image"><img src="{{ asset('img/' . $item['image']) }}" alt=""
                                        class="img-table-product"></td>
                                <td data-label="Name">{{ $item['name'] }}</td>
                                <td data-label="Price">{{ $item['price'] }}</td>
                                <td data-label="Quantity">{{ $item['quantity'] }}</td>
                                <td data-label="Subtotal">{{ $item['total_amount'] }}</td>
                                <td data-label="Delete"><i class="fi fi-rs-trash table__trash delete-cart"
                                        data-id="{{ $item['id'] }}"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart__actions">
                <a href="{{ route('home') }}" class="btn flex btn__md">
                    <i class="fi-rs-shopping-bag"></i> Continue Shopping
                </a>
            </div>

            <div class="divider">
                <i class="fi fi-rs-fingerprint"></i>
            </div>

            <div class="cart__group grid">
                <div>
                    <div class="cart__shippinp">
                        <h3 class="section__title">Calculate Shipping</h3>
                        <form action="" class="form grid">
                            <input type="text" class="form__input" placeholder="State / Country" />
                            <div class="form__group grid">
                                <input type="text" class="form__input" placeholder="City" />
                                <input type="text" class="form__input" placeholder="PostCode" />
                            </div>
                            <div class="form__btn">
                                <button class="btn flex btn--sm">
                                    <i class="fi-rs-shuffle"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="cart__coupon">
                        <h3 class="section__title">Apply Coupon</h3>
                        <form action="" class="coupon__form form grid">
                            <div class="form__group grid">
                                <input type="text" class="form__input" placeholder="Enter Your Coupon" />
                                <div class="form__btn">
                                    <button class="btn flex btn--sm">
                                        <i class="fi-rs-label"></i> Aplly
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="cart__total">
                    <h3 class="section__title">Cart Totals</h3>
                    <table class="cart__total-table">
                        <tr>
                            <td><span class="cart__total-title">Cart Subtotal</span></td>
                            <td><span class="cart__total-price">{{ number_format($TotalHarga, 0, ',', '.') }}</span></td>
                        </tr>
                        <tr>
                            <td><span class="cart__total-title">Ongkir</span></td>
                            <td><span class="cart__total-price">{{ number_format($Ongkir, 0, ',', '.') }}</span></td>
                        </tr>
                        <tr>
                            <td><span class="cart__total-title">Total</span></td>
                            <td><span class="cart__total-price">{{ number_format($TotalKeseluruhan, 0, ',', '.') }}</span>
                            </td>
                        </tr>
                    </table>
                    <form action="{{ route('ceckout') }}" method="post" class="form grid">
                        @csrf
                        <input type="text" placeholder="Name"
                            class="form__input {{ $errors->has('customer_name') ? 'input-danger' : '' }}"
                            name="customer_name" value="{{ old('customer_name') }}" />
                        <input type="tel" placeholder="Phone"
                            class="form__input {{ $errors->has('customer_phone') ? 'input-danger' : '' }}"
                            name="customer_phone" value="{{ old('customer_phone') }}" />
                        <input type="text" placeholder="Address"
                            class="form__input {{ $errors->has('customer_address') ? 'input-danger' : '' }}"
                            name="customer_address" value="{{ old('customer_address') }}" />
                        <button type="submit" class="btn flex btn--md">
                            <i class="fi fi-rs-box-alt ceckout"></i> Proceed To Checkout
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!--=============== NEWSLETTER ===============-->
        <section class="newsletter section">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete-cart').click(function(event) {
                event.preventDefault(); // Mencegah perilaku default tautan

                const productId = $(this).data('id');
                $.ajax({
                    url: '/delete-cart', // URL endpoint untuk menambahkan ke keranjang
                    method: 'POST',
                    data: {
                        id: productId,
                        _token: '{{ csrf_token() }}' // Token CSRF
                    },
                    success: function(response) {
                        // Tampilkan pesan sukses atau pembaruan keranjang
                        location.reload()
                    },
                    error: function(xhr) {
                        console.error(xhr);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
            // Also, use the embedId that you defined in the div above, here.
            window.snap.embed('YOUR_SNAP_TOKEN', {
                embedId: 'snap-container',
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>
@endsection
