import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PaypalService {

  constructor(private http: HttpClient) { }


    verificationPaiement(data) {
    return this.http.post('http://localhost/projets/angular/charlotte/src/back-end/verification.php', data)
  }
}
