import { Router, ActivatedRoute } from '@angular/router';
import 'rxjs/add/operator/filter';
import { Component, OnInit, OnDestroy } from '@angular/core';
import { Subscription } from 'rxjs/Subscription';

import { LayoutService } from '../../../../services';
// import { LayoutService } from 'modules/layout/services';

@Component({
  selector: 'layout-sub-header',
  templateUrl: './sub-header.component.html',
  styleUrls: ['./sub-header.component.css']
})
export class SubHeaderComponent implements OnInit, OnDestroy {
  public pageTitle: string;
  protected pageTitleSubscription: Subscription;

  constructor(
    private layoutService: LayoutService,
    private activatedRoute: ActivatedRoute,
    private router: Router
  ) {
  }

  ngOnInit() {
    this.pageTitleSubscription = this.layoutService.setPageTitle$.subscribe(
      response => {
        this.pageTitle = response['title'];
      }
    );

  }


  /**
   * cancel form and go back
   */
  previous() {
    window.history.back();
  }
  ngOnDestroy() {
    this.pageTitleSubscription.unsubscribe();
  }
}
