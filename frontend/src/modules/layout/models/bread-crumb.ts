import { Params } from '@angular/router';

export class IBreadcrumb {
  label: string;
  url: string[];
  disable?: boolean;
  constructor() {}
}
