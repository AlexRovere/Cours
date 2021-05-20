import { Component, OnInit, OnDestroy } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ICreateOrderRequest, IPayPalConfig } from 'ngx-paypal';
import { Subscription } from 'rxjs';
import { PaypalService } from 'src/app/service/paypal.service';
import { ProduitService } from 'src/app/service/produit.service';

@Component({
  selector: 'app-produit',
  templateUrl: './produit.component.html',
  styleUrls: ['./produit.component.scss']
})
export class ProduitComponent implements OnInit {

  private routeSub: Subscription
  private id
  public produit
  public payPalConfig ? : IPayPalConfig
  public showSuccess
  public showCancel
  public showError


  constructor(private route: ActivatedRoute, private produitService: ProduitService, private paypalService: PaypalService) { }



  ngOnInit(): void {
    this.routeSub = this.route.params.subscribe(params => {
      this.id = params;
      this.serviceSingleProduct()
      this.initConfig()
    })
  }
  ngOnDestroy() {
    this.routeSub.unsubscribe()
  }

  
  serviceSingleProduct(){
    this.produitService.getSingleProduct(this.id).subscribe(
      (response:any) => {
        if (response['success']) {
          this.produit = response['produit'];
        } 
        else {
          console.log(response['error'])
        }
      },
      (error) => console.log(error)
    );
  }

  private initConfig(): void {
    this.payPalConfig = {
        currency: 'EUR',
        clientId: 'sb',
        createOrderOnClient: (data) => < ICreateOrderRequest > {
            intent: 'CAPTURE',
            purchase_units: [{
                amount: {
                    currency_code: 'EUR',
                    value: '9.99',
                    breakdown: {
                        item_total: {
                            currency_code: 'EUR',
                            value: '9.99'
                        }
                    }
                },
                items: [{
                    name: 'Enterprise Subscription',
                    quantity: '1',
                    category: 'DIGITAL_GOODS',
                    unit_amount: {
                        currency_code: 'EUR',
                        value: '9.99',
                    },
                }]
            }]
        },
        advanced: {
            commit: 'true'
        },
        style: {
            label: 'paypal',
            layout: 'vertical'
        },
        onApprove: (data, actions) => {
            console.log('onApprove - transaction was approved, but not authorized', data, actions);
            actions.order.get().then(details => {
                console.log('onApprove - you can get full order details inside onApprove: ', details);
            });

        },
        onClientAuthorization: (data) => {
            // console.log('onClientAuthorization - you should probably inform your server about completed transaction at this point', data);
            this.paypalService.verificationPaiement(data).subscribe(
            (response:any) => {
              if (response['success']) {
                this.showSuccess = true;
                console.log(response['resultat']) 
                console.log(response['resultat']['payer']['email_address'])
                console.log(response['resultat']['id'])
                console.log(response['token'])
              } 
              else {
                console.log(response['error'])
              }
            },
            (error) => console.log(error)
          );
        },
        onCancel: (data, actions) => {
            console.log('OnCancel', data, actions);
            this.showCancel = true;

        },
        onError: err => {
            console.log('OnError', err);
            this.showError = true;
        },
        onClick: (data, actions) => {
            console.log('onClick', data, actions);
            // this.resetStatus();
        }
    };

}
  


}
