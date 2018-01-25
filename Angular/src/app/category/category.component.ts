import { Component, OnInit } from '@angular/core';
import {TittleService} from '../tittle.service';

@Component({
  selector: 'app-category',
  templateUrl: './category.component.html',
  styleUrls: ['./category.component.css'],
    providers: [TittleService]
})
export class CategoryComponent implements OnInit {
public category: any[];
  constructor(private cat: TittleService) { }

  ngOnInit() {
      this.cat.GetList().subscribe((response: any[]) => {
          this.category = response ;
      });
  }

}
