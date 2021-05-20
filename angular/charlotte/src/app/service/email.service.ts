import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class EmailService {

  constructor(private http: HttpClient) { }

  sendEmail(email, pdf) {
    let data = {
      email : email,
      pdf : pdf
    }
    this.http.post('http://localhost/projets/angular/charlotte/src/back-end/email.php', data).subscribe(
      (response: any) => {
        if (response['success']) {
          console.log('Mail bien envoyé')
        }
        else 
        {
          console.log(response['error'])
        }
      },
      (error) => console.log(error)
    ) 
  };
}
