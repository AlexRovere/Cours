import { Component, OnInit } from '@angular/core';
import { NavigationStart, Router } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent implements OnInit {
  title = 'Chachou Life Style';

  constructor(private router: Router) {}

  ngOnInit() {
    this.loadScript('https://js.stripe.com/v3/');
  }

  // Rechargement des scripts à chaque changement de routes
  loadScript(src: string) {
    this.router.events.subscribe((event) => {
      if (event instanceof NavigationStart) {
        let node = document.createElement('script');
        node.src = src;
        node.type = 'text/javascript';
        node.async = true;
        document.getElementsByTagName('head')[0].appendChild(node);
      }
    });
  }
}
