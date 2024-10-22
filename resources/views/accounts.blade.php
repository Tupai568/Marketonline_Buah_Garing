@extends('component')
@section('container')



@include('notification')

    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== BREADCRUMB ===============-->
        <section class="breadcrumb">
            <ul class="breadcrumb__list flex container">
                <li><a href="{{ route("home") }}" class="breadcrumb__link">Home</a></li>
                <li><span class="breadcrumb__link">></span></li>
                <li><span class="breadcrumb__link">Account</span></li>
            </ul>
        </section>
        
        <!--=============== ACCOUNTS ===============-->
        <section class="accounts section--lg">
            <div class="accounts__container container grid">
                <div class="account__tabs">
                    <p class="account__tab active-tab" data-target="#dashboard">
                        <i class="fi fi-rs-settings-sliders"></i> Dashboard
                    </p>
                    <p class="account__tab" data-target="#orders">
                        <i class="fi fi-rs-shopping-bag"></i> Orders
                    </p>
                    <p class="account__tab" data-target="#update-profile">
                        <i class="fi fi-rs-user"></i> Update Profile
                    </p>
                    <p class="account__tab" data-target="#upload-product">
                        <i class="fi fi-rs-upload"></i> Upload Product
                    </p>
                    <p class="account__tab" data-target="#address">
                        <i class="fi fi-rs-marker"></i> My Address
                    </p>
                    <p class="account__tab" data-target="#change-password">
                        <i class="fi fi-rs-settings-sliders"></i> Change Password
                    </p>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">
                            <p class="account__tab"><i class="fi fi-rs-exit"></i> Logout</p>
                        </button>
                    </form>
                </div>
                <div class="tabs__content">
                    <div class="tab__content active-tab" content id="dashboard">
                        <h3 class="tab__header">Products</h3>
                        <div class="tab__body">
                            <table>
                                <thead>
                                  <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Categories</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Products as $product)
                                    <tr>
                                      <td data-label="Image"><img src="{{ asset("img/".$product->image_url) }}" alt="" class="img-table-product"></td>
                                      <td data-label="Name">{{ $product->name }}</td>
                                      <td data-label="Price">{{ $product->price }}</td>
                                      <td data-label="Stock">{{ $product->stock }}</td> 
                                      <td data-label="Total">{{ $product->category->name }}</td>
                                      <td data-label="Action">
                                          <div class="action-table">
                                                  <button type="submit" class="btn-table">
                                                      <i class="fi fi-rs-pen-square" id="edit"></i>
                                                  </button>
                                              <form action="{{ route("delete") }}" method="post" id="delete-product">
                                                  @csrf
                                                  <input type="hidden" name="id" value="{{ $product->id }}">
                                                  <button type="submit" onclick="confirmDelete()">
                                                      <i class="fi fi-rs-trash" id="delete"></i>
                                                  </button>
                                              </form>
                                          </div>
                                      </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <div class="tab__content" content id="orders">
                        <h3 class="tab__header">Your Orders</h3>
                        <div class="tab__body">
                            <table class="placed__order-table">
                                <thead>
                                    <tr>
                                        <th>Orders</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Totals</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#1357</td>
                                        <td>March 19, 2022</td>
                                        <td>Processing</td>
                                        <td>$125.00</td>
                                        <td><a href="#" class="view__order">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>#2468</td>
                                        <td>June 29, 2022</td>
                                        <td>Completed</td>
                                        <td>$364.00</td>
                                        <td><a href="#" class="view__order">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>#2366</td>
                                        <td>August 02, 2022</td>
                                        <td>Completed</td>
                                        <td>$280.00</td>
                                        <td><a href="#" class="view__order">View</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab__content" content id="update-profile">
                        <h3 class="tab__header">Update Profile</h3>
                        <div class="tab__body">
                            <form class="form grid" action="{{ route('update-profile') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <input type="text" placeholder="Username" name="name" class="form__input" />
                                <div class="form__btn">
                                    <button class="btn btn--md">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab__content" content id="upload-product">
                        <h3 class="tab__header">Upload Product</h3>
                        <div class="tab__body">
                            <form class="form grid" action="{{ route('store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="text" placeholder="Name Product" class="form__input" name="name" />
                                <input type="file" name="image_url">
                                <input type="number" placeholder="Price Product" class="form__input" name="price" />
                                <input type="number" placeholder="Total Stock" class="form__input" name="stock" />
                                <select id="Categories" class="form__input select" name="category_id">
                                    @foreach ($Categories as $Categorie)
                                        <option value="{{ $Categorie->id }}">{{ $Categorie->name }}</option>
                                    @endforeach
                                </select>
                                <textarea name="description" id="" cols="30" rows="10" class="textarea"
                                    placeholder="Description" name="description"></textarea>

                                <div class="form__btn">
                                    <button class="btn btn--md" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab__content" content id="address">
                        <h3 class="tab__header">Shipping Address</h3>
                        <div class="tab__body">
                            <address class="address">
                                3522 Interstate <br />
                                75 Business Spur, <br />
                                Sault Ste. <br />
                                Marie, Mi 49783
                            </address>
                            <p class="city">New York</p>
                            <a href="#" class="edit">Edit</a>
                        </div>
                    </div>
                    <div class="tab__content" content id="change-password">
                        <h3 class="tab__header">Change Password</h3>
                        <div class="tab__body">
                            <form class="form grid" action="{{ route("change-password") }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <input type="password" name="old" placeholder="Current Password" class="form__input" />
                                <input type="password" name="password" placeholder="New Password" class="form__input" />
                                <input type="password" name="confirm" placeholder="Confirm Password" class="form__input" />
                                <div class="form__btn">
                                    <button class="btn btn--md" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
        function confirmDelete() {
            if (confirm("Yakin Ingin Menghapus?")) {
                // Jika pengguna mengonfirmasi, kirim formulir
                document.getElementById('delete-product').submit();
            }else {
                // Jika pengguna membatalkan, hentikan pengiriman formulir
                event.preventDefault();
            }
            // Jika pengguna membatalkan, tidak ada tindakan yang diambil
        }
    </script>
@endsection
