import { Component, OnInit } from '@angular/core';
declare var Stripe: any;
@Component({
  selector: 'app-stripe',
  templateUrl: './stripe.component.html',
  styleUrls: ['./stripe.component.scss'],
})
export class StripeComponent implements OnInit {
  constructor() {}

  ngOnInit(): void {}

  fetch(id) {
    var sessionId;
    var stripe = new Stripe(
      'pk_test_51Ixpg5DmFmsRyV8BtHyBkox7eJ4zuzznNcTWAMdQ2swNMA0bMUfU9aBDmd3A3oQHdolRqF4NDhiT5uo0z3hUmWS600HSp6ohI9'
    );
    // var checkoutButton = document.getElementById('checkout-button');

    // checkoutButton.addEventListener('click', function () {
    // Create a new Checkout Session using the server-side endpoint you
    // created in step 3.
    fetch('https://127.0.0.1:8000/create-session', {
      method: 'POST',
      headers: {
        'content-Type': 'application/json',
      },
      body: JSON.stringify({ id: id }),
    })
      .then(function (r) {
        return r.json();
      })
      .then(function (response) {
        sessionId = response.id;
        return stripe.redirectToCheckout({ sessionId: sessionId });
      })
      .then(function (result) {
        // If `redirectToCheckout` fails due to a browser or network
        // error, you should display the localized error message to your
        // customer using `error.message`.
        if (result.error) {
          alert(result.error.message);
        }
      })
      .catch(function (error) {
        console.error('Error:', error);
      });
  }
}
