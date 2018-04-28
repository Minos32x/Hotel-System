
<h1>payment page</h1>

<form action="/client/payment/{{$room->id}}/room" method="post">
{{csrf_field()}}

<input type="hidden" value="{{$Accompany_num}}" name="Accompany_num">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_ma1tUIdSbL9x7ONUcGm0km6o"
    data-amount="{{$room->price}}"
    data-name="Stripe.com"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-zip-code="true">
  </script>
</form>