import { Component, OnInit, OnDestroy } from '@angular/core';
import { Router } from '@angular/router/src/router';

import { LayoutService } from '../../../layout/services';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.css'],
})
export class AboutComponent implements OnInit {

  public loaded: boolean = true;


  constructor(private layoutService: LayoutService) {
  }

  /**
   * ngOnInit()
   */
  ngOnInit() {
    this.layoutService.setPageTitle({
      title: 'About'
    });

  }


}
