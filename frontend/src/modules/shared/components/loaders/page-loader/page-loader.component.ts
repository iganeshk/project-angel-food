import { Component } from '@angular/core';
import { Subscription } from 'rxjs/Subscription';
/**
 * Overlay Component
 *
 * How to use?
 *
 * <shared-page-loader *ngIf="!loaded"> </shared-page-loader>
 */
@Component({
  selector: 'shared-page-loader',
  templateUrl: './page-loader.component.html',
  styleUrls: ['./page-loader.component.css'],
})
export class PageLoaderComponent {

  public subscription: Subscription;

  public startLoading = false;

  constructor() { 
    setTimeout(() => {
      this.startLoading = true;
    }, 400);
  }
}
