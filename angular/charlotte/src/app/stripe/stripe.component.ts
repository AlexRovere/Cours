import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-stripe',
  templateUrl: './stripe.component.html',
  styleUrls: ['./stripe.component.scss'],
})
export class StripeComponent implements OnInit {
  constructor() {}

  ngOnInit(): void {}

  stripe() {
    var stripe = stripe(
      'pk_test_51Ixpg5DmFmsRyV8BtHyBkox7eJ4zuzznNcTWAMdQ2swNMA0bMUfU9aBDmd3A3oQHdolRqF4NDhiT5uo0z3hUmWS600HSp6ohI9'
    );
    // var checkoutButton = document.getElementById('checkout-button');

    // checkoutButton.addEventListener('click', function () {
    // Create a new Checkout Session using the server-side endpoint you
    // created in step 3.
    fetch('/create-checkout-session', { method: 'POST' })
      .then(function (response) {
        return response.json();
      })
      .then(function (session) {
        return stripe.redirectToCheckout({ sessionId: session.id });
        console.log(session);
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
