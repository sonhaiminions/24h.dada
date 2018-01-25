import { Injectable } from '@angular/core';
import {Observable} from 'rxjs/Observable';
import {Http , Response} from '@angular/http';
import 'rxjs/add/operator/map';
@Injectable()
export class TittleService {
    private url= 'http://24h.dada/api/rscategory';
    constructor(private http: Http) { }
    GetList(): Observable<any[]> {
        return this.http.get(this.url).map((a: Response) => a.json());
    }
}
