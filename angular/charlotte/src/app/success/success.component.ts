import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-success',
  templateUrl: './success.component.html',
  styleUrls: ['./success.component.scss'],
})
export class SuccessComponent implements OnInit {
  session_id;
  payment_status = 'waiting';
  constructor(private route: ActivatedRoute, private http: HttpClient) {}

  ngOnInit(): void {
    this.route.paramMap.subscribe((params) => {
      const session_id = params.get('session_id');
      if (session_id) {
        this.session_id = session_id;
        console.log(this.session_id);
      }
    });
    this.getStatus();
  }

  getStatus() {
    this.http
      .get(
        'https://127.0.0.1:8000/session-status?session_id=' + this.session_id,
        { observe: 'response' }
      )
      .subscribe(
        (response: any) => {
          if (response.status === 200) {
            this.payment_status = response['body']['statut'];
            console.log(response);
          } else {
            console.log('Erreur : ', response.status);
          }
        },
        (error) => console.log(error)
      );
  }
}
