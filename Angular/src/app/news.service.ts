import { Injectable } from '@angular/core';
import {Http , Response} from '@angular/http';
import {Observable} from 'rxjs/Observable';
import 'rxjs/add/operator/map';
@Injectable()
export class NewsService {
  private url= 'http://24h.dada/api/rsnews';
  constructor(private http: Http) { }
    GetList(): Observable<any[]> {
        return this.http.get(this.url).map((a: Response) => a.json());
    }
}
