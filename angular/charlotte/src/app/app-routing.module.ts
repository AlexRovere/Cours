import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CancelComponent } from './cancel/cancel.component';
import { FourOhFourComponent } from './four-oh-four/four-oh-four.component';
import { HomeComponent } from './home/home.component';
import { ListeProduitsComponent } from './liste-produits/liste-produits.component';
import { ProduitComponent } from './liste-produits/produit/produit.component';
import { DetailArticleComponent } from './post-list/detail-article/detail-article.component';
import { PostListComponent } from './post-list/post-list.component';
import { ProgrammesComponent } from './programmes/programmes.component';
import { StripeComponent } from './stripe/stripe.component';
import { SuccessComponent } from './success/success.component';

const routes: Routes = [
  {
    path: 'home',
    component: HomeComponent,
  },
  {
    path: 'programmes',
    component: ProgrammesComponent,
  },
  {
    path: 'articles',
    component: PostListComponent,
  },
  {
    path: 'articles/detail-article/:id',
    component: DetailArticleComponent,
  },
  {
    path: 'stripe',
    component: StripeComponent,
  },
  {
    path: 'liste-produits',
    component: ListeProduitsComponent,
  },

  {
    path: 'liste-produits/produit/:id',
    component: ProduitComponent,
  },
  {
    path: 'success/:session_id',
    component: SuccessComponent,
  },
  {
    path: 'cancel',
    component: CancelComponent,
  },
  {
    path: 'not-found',
    component: FourOhFourComponent,
  },
  {
    path: '',
    component: HomeComponent,
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
