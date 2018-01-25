import { Injectable } from '@angular/core';
import {Http} from '@angular/http';
import 'rxjs/add/operator/toPromise';
@Injectable()

export class PromiseService {
    constructor(private http: Http) { }
    Get_Temp(thecity: string): any {
        return this.http.get( thecity).toPromise()
            .then(res => res.json());
    }

}
