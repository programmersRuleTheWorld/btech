    <div class="row">
        <div class="form-group col-md-6">
            Cardholder Name:
            <input class="form-control" id="card-holder-name" type="text" placeholder="Cardholder Name:">
        </div>
        <div class="form-group col-md-3 text-center">
        @if($clientApplication->deposit_payment_status == true)
            Payment Amount:
            @if($selectedList != null)
            <input class="form-control text-success bg-dark text-center" id="price" type="text" value="${{ $selectedList->list_balance }}" readonly>
            @else
            <input class="form-control text-success bg-dark text-center" id="price" type="text" value="$0" readonly>
            @endif
        @else
            Deposit Amount:
            <input class="form-control text-success bg-dark text-center" id="price" type="text" value="${{ $clientApplication->project_deposit }}" readonly>
        @endif
        </div>
    </div>

    <!-- Stripe Elements Placeholder -->
    <div id="card-element"></div>
    <div id="card-errors" role="alert"></div>

    <button class="btn btn-dark text-info" id="card-button">
    @if($clientApplication->deposit_payment_status == true)
        Process Payment
    @else
        Process Deposit
    @endif
    </button>
