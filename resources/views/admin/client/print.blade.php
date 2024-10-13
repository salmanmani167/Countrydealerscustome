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
    <main class="px-3" style="border : 2px solid black">
        <button class="btn btn-sm btn-primary mt-2" id="printButton">Print</button>
        <div class="logo d-flex justify-content-end">
            <img src="{{ asset('assets/images/COUNTRY DEALERS LOGO AZ.svg') }}" alt="Logo Image" height="50px">
        </div>
        <h6 class="text-center"><u>Payment Receipt</u></h6>
        <p class="text-end"> <u>Date:{{ date('d/m/y') }}</u> </p>
        <p> <u>Paid By : <input type="text" value="{{ $data->name }}"
                    style="border:none; border-bottom: 1px solid black; outline:none; background:transparent;outline: none;position: relative; bottom: 4px;">
            </u> </p>
        <p> <u>CNIC : {{ $data->cnic }}</u> </p>
        <p> <u>Plot Size : {{ $data->plot_size }}</u> </p>
        <p> <u>Location : {{ $data->location }}</u> </p>
        <div class="d-flex justify-content-center">
            <p style="width: 80%"> Dear Sir/Madam, <br>
                This is here by acknowledge that Country Dealers & Developers has Received Rs.
                {{ $newInstallment->installment_payment }}/-
                (<input type="text" id="dynamicInput" style="width: 100px;border:none; background:transparent;outline: none;">
                <span id="hiddenSpan" style="position: absolute; visibility: hidden; white-space: nowrap;"></span>
                )
                Thru ( <input type="text" id="banknameInput" style="border:none; background:transparent;outline: none;width: 85px"
                    value="Bank Name Here">
                    <span id="banknameInputSpan" style="position: absolute; visibility: hidden; white-space: nowrap;"></span>) to Country Dealers as payment against Plot No. ({{ $data->plot_number }}) as
                Remanning Amount.
                <br>
                Your Payment Status is as Follows:
            </p>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="d-flex justify-content-between" style="width: 60%;border-bottom: 1px solid black">
                <span> Total Price of Plot/Farm House/Hut:</span> <span>{{ $data->plot_sale_price }} </span>
            </div>
            <div class="d-flex justify-content-between" style="width: 60%;border-bottom: 1px solid black">
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
            <div class="d-flex justify-content-between" style="width: 60%;border-bottom: 1px solid black">
                <span> <b>Now Paid:</b> </span>
                <span>
                    <b>{{ $newInstallment->installment_payment }}</b>
                </span>
            </div>
            <div class="d-flex justify-content-between" style="width: 60%;border-bottom: 1px solid black">
                <span>Total Paid (new): </span>
                <span>
                    {{ $newInstallment->installment_payment + $totalAmount }}
                </span>
            </div>
            <div class="d-flex justify-content-between" style="width: 60%;border-bottom: 1px solid black">
                <span> Total remaining Amount: </span>
                <span>
                    @php
                        $totalRemainingAmount = 0;
                    @endphp
                    @foreach ($data->installments as $installment)
                        @if ($installment->status == null)
                            @php
                                $totalRemainingAmount +=
                                    $installment->cheque_installment_amount + $installment->installment_payment; // Add the amounts to the total
                            @endphp
                        @endif
                    @endforeach
                    {{ $totalRemainingAmount - $data->adjustment_price }}
                </span>
            </div>
            @foreach ($data->installments as $installment)
                @if (
                    ($installment->status == null && $installment->payment_method == 'cash') ||
                        ($installment->status == null && $installment->payment_method == 'cheque'))
                    <div class="d-flex justify-content-between"
                        style="width: 60%; border-bottom: 1px solid black;">
                        <span>Next Payment Due Date: </span>
                        <span class="text-danger fw-bolder">
                            @if ($installment->payment_method == 'cash')
                                {{ \Carbon\Carbon::parse($installment->payment_installment_due_date)->format('d-M-Y') }}
                            @elseif($installment->payment_method == 'cheque')
                                {{ \Carbon\Carbon::parse($installment->cheque_installment_due_date)->format('d-M-Y') }}
                            @endif
                        </span>
                    </div>
                @break
            @endif
        @endforeach
        <div class="d-flex justify-content-between mb-1" style="width: 60%;border-bottom: 1px solid black">
            <span> Properties/Vehicle Adjusted: </span>
            <span>
                {{ $data->adjustment_price }}
            </span>
        </div>
        <p style="font-size: 10px" class="p-0">Note: This is a Computer-Generated Receipt/Invoice. In Case of any
            Discrepancies/Queries/Objections, Please Notify Country Dealers & Developers.</p>

        <div class="d-flex justify-content-end align-items-end flex-column" style="width: 50%">
            <img src="{{ asset('/assets/images/signatures.png') }}" alt="" width="200px">
            <div class="d-flex flex-column">
                <input type="text" value="Muhammad Hassan Chheenah"
                    style="border:none; border-bottom: 1px solid black; outline:none; background:transparent;outline: none;position: relative; bottom: 4px;width: 250px">
                <span>CEO Murree Resorts</span>
            </div>
        </div>
        <div class="bg-primary py-2 w-100">
        </div>
        <div class="d-flex justify-content-start align-items-start w-100">
            <ul type="square" class="mt-1">
                <li>+92512321790-91</li>
                <li>Main Murree Road Near BOP Bhara Kahu, Islamabad </li>
                <li><a href="https://www.CountryDealers.com" target="_blank">www.CountryDealers.com</a></li>
            </ul>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dynamicInput').on('input', function() {
            var inputVal = $(this).val();
            $('#hiddenSpan').text(inputVal);
            // Adjust the input width based on the hidden span width
            $(this).css('width', $('#hiddenSpan').width() + 5); // Add some padding (e.g., 20px)
        });
        $('#banknameInput').on('input', function() {
            var inputVal = $(this).val();
            $('#banknameInputSpan').text(inputVal);
            // Adjust the input width based on the hidden span width
            $(this).css('width', $('#banknameInputSpan').width() + 5); // Add some padding (e.g., 20px)
        });

        $('#printButton').on('click' , function() {
            $(this).hide();
            print();
        })
    });
</script>
</body>

</html>
