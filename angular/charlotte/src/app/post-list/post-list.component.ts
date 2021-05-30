import { Component, OnInit } from '@angular/core';
import { ArticleService } from '../service/article.service';

@Component({
  selector: 'app-post-list',
  templateUrl: './post-list.component.html',
  styleUrls: ['./post-list.component.scss']
})
export class PostListComponent implements OnInit {

  articles = [];

  constructor(private articleService: ArticleService) { }

  ngOnInit(): void {
    this.getAllPosts();
  }

  getAllPosts(){
    this.articleService.getUrlAllPosts().subscribe(
      (response:any) => {
          response['hydra:member'].forEach(data => {
            this.articles.push(data);
          });
          console.log(this.articles);
          console.log(response);
      },
      (error) => console.log(error)
    );
  }
}
