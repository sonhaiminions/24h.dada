import { Injectable } from '@angular/core';
import {Http , Response} from '@angular/http';
import {Observable} from 'rxjs/Observable';
import 'rxjs/add/operator/map';

@Injectable()
export class CatnewService {
    constructor(private http: Http) { }
    GetList(idlink: string): Observable<any[]> {
        return this.http.get(idlink).map((a: Response) => a.json());
    }
}
