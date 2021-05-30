import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ArticleService } from 'src/app/service/article.service';

@Component({
  selector: 'app-detail-article',
  templateUrl: './detail-article.component.html',
  styleUrls: ['./detail-article.component.scss'],
})
export class DetailArticleComponent implements OnInit {
  article;
  id;

  constructor(private articleService: ArticleService, private route: ActivatedRoute) {}

  ngOnInit(): void {
    this.route.paramMap.subscribe(params => {
      this.id = params.get('id');
    });
    this.getSinglePost(this.id);
  }

  getSinglePost(id : string) {
    this.articleService.getUrlSinglePost(id).subscribe(
      (response: any) => {
        this.article = response;
        console.log(response);
      },
      (error) => console.log(error)
    );
  }
}
