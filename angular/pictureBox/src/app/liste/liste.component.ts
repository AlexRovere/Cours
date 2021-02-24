import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-liste',
  templateUrl: './liste.component.html',
  styleUrls: ['./liste.component.scss']
})
export class ListeComponent implements OnInit {
  @Input() src !: string
  @Input() lieu !: string
  @Input() index !: number
  constructor() { }

  ngOnInit(): void {
  }

  affichePhoto() {
    console.log(this.index);
    return this.index
  }

}
