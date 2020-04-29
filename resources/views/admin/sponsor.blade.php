@extends('layouts.app')
@section("content")
    <!-- Braintree -->
  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
        @csrf
        @method("POST")
        <div class="container mt-5" style=height:500px;>
          <h2 class="ml-3 mb-3 font-weight-bold">Se vuoi mettere in evidenza il tuo appartamento acquista uno dei nostri pacchetti!</h2>
          <form action="{{route("admin.pay")}}" method ="POST">
            <select class="btn ml-3" name="payment" id="">
              <option  value="2">Sponsorizza per 24h : Basic 2.99€</option>
              <option  value="3">Sponsorizza per 72h : Silver 5.99€</option>
              <option  value="4">Sponsorizza per 144h : Gold 9.99€</option>
            </select>
            <input type="hidden" name="id" value = "{{$flat->id}}">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div id="dropin-container"></div>
                  <button class="btn mt-3" type="submit" id="submit-button">Paga</button>
                </div>
              </div>
            </div>
          </form>
        </div>
  <script>
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
      authorization: "{{\Braintree\ClientToken::generate()}}",
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
          $.get('{{ route('payment.process') }}', {payload}, function (response) {
            if (response.success) {
              alert('Payment successfull!');
            } else {
              alert('Payment failed');
            }
          }, 'json');
        });
      });
    });
  </script>

@endsection
