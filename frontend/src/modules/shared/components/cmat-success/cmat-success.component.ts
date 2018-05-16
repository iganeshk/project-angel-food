import { Component, Input } from '@angular/core';

/**
 * Custom Mat-Success
 *
 * How to use?
 *
 * <shared-cmat-success  [successMsg]="'Your message is here'"></shared-cmat-success>
 */
@Component({
  selector: 'shared-cmat-success',
  templateUrl: './cmat-success.component.html',
  styleUrls: ['./cmat-success.component.css']
})
export class CMatSuccessComponent {
  @Input() successMsg: string;
  @Input() displayIcon: boolean = true;
  constructor() {}
}
