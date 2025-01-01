@extends('layouts.app')

@section('page-name', 'CheckOut Details')
@section('admin-main')
    <link id="vendorsbundle" rel="stylesheet" media="screen, print"
        href="https://admissions.uoel.edu.pk/admin_asset/css/vendors.bundle.css">

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-12" class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Check out
                    </h2>
                </div>
                <div class="card-body show">
                    <div class="panel-content">

                        <form role="form" action="{{ route('admission.checkout.store') }}" method="post"
                            class="require-validation" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-6 form-group required'>
                                    <label class='control-label'>Name on Card</label>
                                    <input name="card_name" class='form-control @error('card_name') is-invalid @enderror'
                                        size='4' type='text' value="{{ old('card_name') }}">
                                    @error('card_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class='col-xs-12 col-md-6 form-group required'>
                                    <label class='control-label'>Card Number</label>
                                    <input name="card_number" autocomplete='off'
                                        class='form-control card-number @error('card_number') is-invalid @enderror'
                                        size='20' type='number' value="{{ old('card_number') }}">
                                    @error('card_number')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input name="card_cvc" autocomplete='off'
                                        class='form-control card-cvc @error('card_cvc') is-invalid @enderror'
                                        placeholder='ex. 311' size='4' type='number' value="{{ old('card_cvc') }}">
                                    @error('card_cvc')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label>
                                    <input name="card_expiry_month"
                                        class='form-control card-expiry-month @error('card_expiry_month') is-invalid @enderror'
                                        placeholder='MM' size='2' type='number'
                                        value="{{ old('card_expiry_month') }}">
                                    @error('card_expiry_month')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label>
                                    <input name="card_expiry_year"
                                        class='form-control card-expiry-year @error('card_expiry_year') is-invalid @enderror'
                                        placeholder='YYYY' size='4' type='number'
                                        value="{{ old('card_expiry_year') }}">
                                    @error('card_expiry_year')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="fee_id" value="{{ $fee_id }}">
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>

@endsection
