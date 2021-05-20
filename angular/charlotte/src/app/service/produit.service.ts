import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';


declare var require: any
const FileSaver = require('file-saver');

@Injectable({
  providedIn: 'root'
})
export class ProduitService {


  constructor(private http: HttpClient) { }

  getAllProducts() {
    return this.http.get('http://localhost/projets/angular/charlotte/src/back-end/listeProduits.php');
  }

  getSingleProduct(id) {
    return this.http.post('http://localhost/projets/angular/charlotte/src/back-end/produit.php', id)
  }

  downloadPdf(pdfUrl: string, pdfName: string ) {
    FileSaver.saveAs(pdfUrl, pdfName);
  }

}
