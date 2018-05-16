import { Subscription } from 'rxjs/Subscription';
import { LayoutService } from 'modules/layout/services';
import { Component, OnDestroy } from '@angular/core';

@Component({
  selector: 'layout-classic-component',
  templateUrl: './layout.component.html',
  styleUrls: ['./layout.component.css']
})
export class LayoutComponent implements OnDestroy {
  public subNavSub: Subscription;

  public subNavActive: boolean = false;

  constructor(private layoutService: LayoutService) {
    this.subNavSub = this.layoutService.subNav$.subscribe(response => {
      this.subNavActive = response;
    });
  }

  ngOnDestroy() {
    this.subNavSub.unsubscribe();
  }
}
