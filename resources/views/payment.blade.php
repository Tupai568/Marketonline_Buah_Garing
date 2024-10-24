@extends('component')
@section('container')
    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== BREADCRUMB ===============-->
        <section class="breadcrumb">
            <ul class="breadcrumb__list flex container">
                <li><a href="{{ route('home') }}" class="breadcrumb__link">Home</a></li>
                <li><span class="breadcrumb__link"></span>></li>
                <li><span class="breadcrumb__link">Ceckout</span></li>
            </ul>
        </section>

        <!--=============== CART ===============-->
        <section class="cart section--lg container">
            <div class="cekout-table">
                <div class="item-cekout">
                    <div id="snap-container"></div>
                </div>
                <div class="item-cekout">
                    <div class="table__container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="dataCart">
                                @foreach ($Orders->orderItems as $item)
                                    <tr>
                                        <td data-label="Image"><img src="{{ asset('img/' . $item->product->image_url) }}" alt=""
                                                class="img-table-product"></td>
                                        <td data-label="Name">{{ $item->product->name }}</td>
                                        <td data-label="Price">{{ $item->product->price }}</td>
                                        <td data-label="Quantity">{{ $item->quantity }}</td>
                                        <td data-label="Subtotal">{{ $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="cart__actions">
                        <button class="btn flex btn__md total">
                            Total: {{ $subTotal }}
                        </button>
                        <button class="btn flex btn__md" id="pay-button">
                            <i class="fi-rs-shopping-bag"></i> Confirm Transaction
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="divider">
                <i class="fi fi-rs-fingerprint"></i>
            </div>
        </section>

        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
                // Also, use the embedId that you defined in the div above, here.
                window.snap.embed('{{ $snapToken }}', {
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
    </main>
@endsection
