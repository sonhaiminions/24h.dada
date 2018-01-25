// import { Component, OnInit } from '@angular/core';
// import {NgForm} from '@angular/forms';
// import { Http, Headers } from '@angular/http';
// // import 'rxjs/add/operator/toPromise';
// import {Admin} from '../admin';
//
//
//
// @Component({
//   selector: 'app-login',
//   templateUrl: './login.component.html',
//   styleUrls: ['./login.component.css']
// })
// export class LoginComponent implements OnInit {
//     title = 'Laravel Angular 4 App';
//     ngOnInit() {
//     }
//     onSubmit(abc) {
//         console.log(abc);
//     }
//
// }
import { Component, OnInit } from '@angular/core';
import {NgForm} from '@angular/forms';
import { Http, Headers } from '@angular/http';
import 'rxjs/add/operator/toPromise';
import {Admin} from '../admin';



@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
    title = 'Laravel Angular 4 App';
    constructor(private _http: Http) {}
    private headers = new Headers({'Content-Type': 'application/x-www-form-urlencoded'});
    ngOnInit() {
    }
    onSubmit(form: NgForm): Promise <Admin> {
        return this._http.post('http://grooo_store.dada/api/user', JSON.stringify(form.value), {headers: this.headers})
            .toPromise()
            .then(res => res.json().data)
            .catch(this.handleError);
    }
    private handleError(error: any): Promise<any> {
        console.error('An error occurred', error); // for demo purposes only
        return Promise.reject(error.message || error);
    }

}

