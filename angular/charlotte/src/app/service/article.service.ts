import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ArticleService {

  constructor(private http: HttpClient) { }

  API_SERVER = "https://127.0.0.1:8000/api";

  getUrlAllPosts() {
    return this.http.get(`${this.API_SERVER}/posts`);
  }

  getUrlSinglePost(id) {
    return this.http.get(`${this.API_SERVER}/posts/${id}`);
  }
  
}


