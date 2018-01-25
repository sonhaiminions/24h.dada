import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, ParamMap} from '@angular/router';
import {NewsService} from '../news.service';
import {TittleService} from '../tittle.service';

@Component({
  selector: 'app-detailcat',
  templateUrl: './detailcat.component.html',
  styleUrls: ['./detailcat.component.css']
})
export class DetailcatComponent implements OnInit {
    public idd = 0;
    public  newsss: any[];
    public cate2: any[];
  constructor(private route: ActivatedRoute, private new1: NewsService, private cate: TittleService) {
  }
  ngOnInit() {
      this.route.paramMap.subscribe((params: ParamMap) => {
          this.idd = parseInt(params.get('id') , 10);
      });
      this.new1.GetList().subscribe((response: any[]) => {
          this.newsss = response;
      });
      this.cate.GetList().subscribe((response2: any[]) => {
          this.cate2 = response2;
      });
  }

}
