import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, ParamMap} from '@angular/router';
import {NewsService} from '../news.service';
import {TittleService} from '../tittle.service';
import {CatnewService} from '../catnew.service';

@Component({
    selector: 'app-detailnew',
    templateUrl: './detailnew.component.html',
    styleUrls: ['./detailnew.component.css'],
    providers: [CatnewService]
})
export class DetailnewComponent implements OnInit {
    public idd: any;
    public newsss: any;
    constructor(private route: ActivatedRoute , private te: CatnewService) {
    }
    ngOnInit() {
        this.route.paramMap.subscribe((params: ParamMap) => {
            this.idd = 'http://24h.dada/api/rsnews/' + params.get('id');
    });
        this.te.GetList(this.idd).subscribe((response2: any[]) => {
            this.newsss = response2;
        });

}
}
