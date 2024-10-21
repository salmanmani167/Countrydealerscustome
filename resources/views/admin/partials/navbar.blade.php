<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('admin.index') }}">
            <img src="assets/images/COUNTRY DEALERS LOGO AZ.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('admin.index') }}">
            <img src="assets/images/COUNTRY DEALERS LOGO AZ.svg" alt="logo" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown" id="dropdpwn">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                    data-toggle="dropdown">
                    <i class="fas fa-bell mx-0"></i>
                    <span class="count">{{ App\Services\NotificationService::totalNotifications() }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <a class="dropdown-item">
                        <p class="mb-0 font-weight-normal float-left">You have
                            {{ App\Services\NotificationService::totalNotifications() }} new notifications
                        </p>
                    </a>
                    @foreach (App\Services\NotificationService::clientNotifications() as $clientNotification)
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="far fa-envelope mx-0"></i>
                                </div>
                            </div>

                            <div class="preview-item-content d-flex justify-content-between">
                                <div>
                                    <p class="preview-subject font-weight-medium">Upcoming Installment for Plot #
                                        {{ $clientNotification->client->plot_number }}
                                    </p>
                                    <span class="badge bg-success text-white m-0">Client</span>
                                </div>
                                <span
                                    class="ml-5 d-flex justify-content-center align-items-center p-0 me-auto markAsReadNotification"
                                    style="width:30px;height:30px;border-radius: 50%;border:1px solid rgba(0 ,0,0,.2);cursor: pointer;"
                                    data-paymentNotificationid="{{ $clientNotification->id }}" data-model="client">
                                    <I class="fas fa-check text-primary m-0"></I>
                                </span>
                            </div>
                        </a>
                    @endforeach
                    @foreach (App\Services\NotificationService::purchaseNotifications() as $purchaseNotification)
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="far fa-envelope mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex justify-content-between">
                                <div>
                                    <p class="preview-subject font-weight-medium">Upcoming Installment for Plot #
                                        {{ $purchaseNotification->purchase->plot_number }}
                                    </p>
                                    <span class="badge bg-success text-white m-0">Purchase</span>
                                </div>
                                <span
                                    class="ml-5 d-flex justify-content-center align-items-center p-0 markAsReadNotification"
                                    style="width:30px;height:30px;border-radius: 50%;border:1px solid rgba(0 ,0,0,.2);cursor: pointer;"
                                    data-paymentNotificationid="{{ $purchaseNotification->id }}" data-model="purchase">
                                    <I class="fas fa-check text-primary m-0"></I>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="assets/images/COUNTRY DEALERS LOGO AZ.svg" alt="logo"
                        style="width: 20px;border-radius: 50%;" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item">
                        <i class="fas fa-cog text-primary"></i>
                        Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" id="logoutBtn" style="cursor: pointer">
                        <i class="fas fa-power-off text-primary"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

@section('bottom-scripts')
    <script>
        $('#logoutBtn').on('click', function() {
            $('#logout-form').submit();
        })

        $(document).on('click', '.markAsReadNotification', function() {
            $('#dropdpwn').removeClass('dropdwon');
            var paymentNotificationId = $(this).data('paymentnotificationid');
            var model = $(this).data('model');
            $.ajax({
                type: "get",
                url: "admin/mark/as/read/notification/" + paymentNotificationId + '/' + model,
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) { // Correct syntax for error function
                    console.log(error); // Log the error in case something goes wrong
                }
            });
        });
    </script>
@endsection
