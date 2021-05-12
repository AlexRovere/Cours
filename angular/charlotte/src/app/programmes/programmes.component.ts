import { AfterContentInit, Component, OnDestroy, OnInit } from '@angular/core';

@Component({
  selector: 'app-programmes',
  templateUrl: './programmes.component.html',
  styleUrls: ['./programmes.component.scss']
})
export class ProgrammesComponent implements OnInit {

  readonly scriptNode: HTMLScriptElement;
  constructor() {} 
    

  ngOnInit(): void {
    
  }


  testApi()
  {
    fetch("https://gumroadzakutynskyv1.p.rapidapi.com/getSingleProduct", {
    "method": "POST",
    "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "x-rapidapi-key": "SIGN-UP-FOR-KEY",
        "x-rapidapi-host": "GumroadzakutynskyV1.p.rapidapi.com"
    },
    "body": {
        "id": "ec2f25022cbef19be45134f35543f50a909a76af70f3d079b80de0c09f90b1d0",
        "accessToken": "6b6c9b8d13a6a2a5255918452855c56a44257f2bc1031943c0c69ef45732e781"
    }
})
.then(response => {
    console.log(response);
})
.catch(err => {
    console.error(err);
});
  }
}
