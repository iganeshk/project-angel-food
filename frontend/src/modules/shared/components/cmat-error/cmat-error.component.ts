import { Component, Input } from '@angular/core';

/**
 * Custom Mat-Error
 *
 * How to use?
 *
 * <shared-cmat-error  [errorMsg]="'Your message is here'"></shared-cmat-error>
 */
@Component({
  selector: 'shared-cmat-error',
  templateUrl: './cmat-error.component.html',
  styleUrls: ['./cmat-error.component.css']
})
export class CMatErrorComponent {
  @Input() errorMsg: string;
  @Input() displayIcon: boolean = true;

  constructor() {}
}
