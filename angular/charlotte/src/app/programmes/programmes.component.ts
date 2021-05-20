import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { render } from 'creditcardpayments/creditCardPayments';
import { EmailService } from '../service/email.service';
import { ProduitService } from '../service/produit.service';


@Component({
  selector: 'app-programmes',
  templateUrl: './programmes.component.html',
  styleUrls: ['./programmes.component.scss']
})
export class ProgrammesComponent implements OnInit {

produits = null;


  constructor(private produitService: ProduitService, private router: Router, private emailService : EmailService) {
  } 
    
  ngOnInit(): void {
    this.serviceAllProducts();
  }

  serviceAllProducts(){
    this.produitService.getAllProducts().subscribe(
      (response:any) => {
        if (response['success']) {
          this.produits = response['produit'];
          this.paypal(this.produits[0].prix_produit);
        } 
        else {
          console.log(response['error'])
        }
      },
      (error) => console.log(error)
    );
  }

  paypal(prix) {

    render(
      {
        id:"#paypal",
        currency: "EUR",
        value: prix,
        onApprove: (details) => {
          this.produitService.downloadPdf(this.produits[0].lien_produit, this.produits[0].titre_produit)
          this.emailService.sendEmail(details.payer.email_address, this.produits[0].lien_produit)

        }
      }
    );
  }

  buttonPDF(){
    this.produitService.downloadPdf(this.produits[0].lien_produit, this.produits[0].titre_produit)
  }

  

}
