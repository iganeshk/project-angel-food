import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { UserRoutes } from './user.routes';
import { SharedModule } from 'modules/shared/shared.module';

import {
  __IMPORTS,
  __DECLARATIONS,
  __PROVIDERS,
  __ENTRY_COMPONENTS
} from './components.barrel';

@NgModule({
  imports: [
    CommonModule,
    RouterModule,
    SharedModule,
    UserRoutes,
    __IMPORTS
  ],
  declarations: [__DECLARATIONS],
  providers: [__PROVIDERS],
  entryComponents: [__ENTRY_COMPONENTS],
  exports: [__DECLARATIONS]
})
export class UserModule {}
