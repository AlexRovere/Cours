import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { HomeComponent } from './home/home.component';
import { NotFoundComponent } from './not-found/not-found.component';
import { FourOhFourComponent } from './four-oh-four/four-oh-four.component';
import { ProgrammesComponent } from './programmes/programmes.component';
import { HttpClientModule } from '@angular/common/http';
import { ListeProduitsComponent } from './liste-produits/liste-produits.component';
import { ProduitComponent } from './liste-produits/produit/produit.component';
import { NgxPayPalModule } from 'ngx-paypal';
import { PostListComponent } from './post-list/post-list.component';
import { DetailArticleComponent } from './post-list/detail-article/detail-article.component';
import { StripeComponent } from './stripe/stripe.component';
import { SuccessComponent } from './success/success.component';
import { CancelComponent } from './cancel/cancel.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    HomeComponent,
    NotFoundComponent,
    FourOhFourComponent,
    ProgrammesComponent,
    ListeProduitsComponent,
    ProduitComponent,
    PostListComponent,
    DetailArticleComponent,
    StripeComponent,
    SuccessComponent,
    CancelComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    NgxPayPalModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
