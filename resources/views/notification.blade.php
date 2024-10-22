    <!--=============== NOTIFICATION ===============-->
    @if (session()->has('success'))
        <div class="notification">
            <div class="notif success"> <span>{{ session('success') }}</span></div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="notification">
            <div class="notif danger"> <span>{{ session('error') }}</span></div>
        </div>
    @endif
    @if (session()->has('warning'))
        <div class="notification">
            <div class="notif warning"> <span>{!! session('warning') !!}</span></div>
        </div>
    @endif

    <script type="text/javascript">
        window.onload = function() {
            let notification = document.querySelector(".notification");
            if (notification) {
                setTimeout(function() {
                    // Menghapus elemen span dari DOM
                    notification.parentNode.removeChild(notification);
                }, 5000);
            }
        }
    </script>
