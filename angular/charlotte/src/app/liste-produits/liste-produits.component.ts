import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ProduitService } from '../service/produit.service';

@Component({
  selector: 'app-liste-produits',
  templateUrl: './liste-produits.component.html',
  styleUrls: ['./liste-produits.component.scss']
})
export class ListeProduitsComponent implements OnInit {
  

  constructor(private produitService: ProduitService, private router: Router) { }

  produits = null

    ngOnInit(): void {
    this.serviceAllProducts();
  }

  serviceAllProducts(){
    this.produitService.getAllProducts().subscribe(
      (response:any) => {
        if (response['success']) {
          this.produits = response['produit'];
        } 
        else {
          console.log(response['error'])
        }
      },
      (error) => console.log(error)
    );
  }

}
