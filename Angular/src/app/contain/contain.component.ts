import { Component, OnInit } from '@angular/core';
import {NewsService} from '../news.service';
import {TittleService} from '../tittle.service';

@Component({
  selector: 'app-contain',
  templateUrl: './contain.component.html',
  styleUrls: ['./contain.component.css'],
    providers: [ NewsService]
})
export class ContainComponent implements OnInit {
    public  newsss: any[];
    public cate2: any[];
    constructor(private new1: NewsService, private cate: TittleService) { }

    ngOnInit() {
        this.new1.GetList().subscribe((response: any[]) => {
            this.newsss = response;
        });
        this.cate.GetList().subscribe((response2: any[]) => {
            this.cate2 = response2;
        });
}
}
