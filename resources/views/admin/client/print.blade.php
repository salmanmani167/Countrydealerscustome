<!doctype html>
<html lang="en">

<head>
    <title>Print</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <main class="container my-5 px-3" style="border : 2px solid black">
        <div class="logo d-flex justify-content-end">
            <img src="{{ asset('assets/images/COUNTRY DEALERS LOGO AZ.svg') }}" alt="Logo Image" height="100px">
        </div>
        <h4 class="text-center"><u>Payment Receipt</u></h4>
        <p class="text-end"> <u>Date:{{ date('d/m/y') }}</u> </p>
        <p> <u>Paid By : {{ $data->name }}</u> </p>
        <p> <u>CNIC : {{ $data->cnic }}</u> </p>
        <p> <u>Plot Size : {{ $data->plot_size }}</u> </p>
        <p> <u>Location : {{ $data->location }}</u> </p>

        <div class="d-flex justify-content-center mt-5">
            <p style="width: 80%"> Dear Sir/Madam, <br>
                This is here by acknowledge that Country Dealers & Developers has Received Rs. 100,000/- (One Hundred
                Thousand Only) Thru (MCB) to Country Dealers as payment against Plot No. (A-143) as Remanning Amount.
                <br>
                Your Payment Status is as Follows:
            </p>
        </div>

        <div class="d-flex justify-content-center align-items-center flex-column my-5">
            <div class="d-flex justify-content-between" style="width: 40%;border-bottom: 1px solid black">
                <span> Total Price of Plot/Farm House/Hut:</span> <span>{{ $data->plot_sale_price }} </span>
            </div>
            <div class="d-flex justify-content-between" style="width: 40%;border-bottom: 1px solid black">
                <span>Previous Paid: </span> <span>
                    @php
                        $totalAmount = 0;
                    @endphp
                    @foreach ($data->installments as $installment)
                        @if ($installment->status == 'PAID')
                            @php
                                $totalAmount +=
                                    $installment->cheque_installment_amount + $installment->installment_payment; // Add the amounts to the total
                            @endphp
                        @endif
                    @endforeach
                    {{ $totalAmount }}
                </span>
            </div>
            <div class="d-flex justify-content-between" style="width: 40%;border-bottom: 1px solid black">
                <span> <b>Now Paid:</b> </span>
                <span>
                    @foreach ($data->installments as $installment)
                        @if ($installment->status == 'PAID')
                            @php
                                $totalAmount +=
                                    $installment->cheque_installment_amount + $installment->installment_payment; // Add the amounts to the total
                            @endphp
                        @endif
                    @endforeach
                </span>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
