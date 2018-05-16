// import { UserFormComponent } from './security/users/form/user-form.component';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';

import { AppComponent } from 'modules/app/components';
import { AppRoutes } from 'modules/app/app.routes';
import { LayoutModule } from 'modules/layout/layout.module';
import { SharedModule } from 'modules/shared/shared.module';

import {
  __IMPORTS,
  __DECLARATIONS,
  __PROVIDERS,
  __ENTRY_COMPONENTS
} from './components.barrel';

@NgModule({
  declarations: [__DECLARATIONS],
  entryComponents: [__ENTRY_COMPONENTS],
  imports: [
    RouterModule,
    AppRoutes,
    LayoutModule,
    SharedModule,
    __IMPORTS
  ],
  providers: [__PROVIDERS],
  bootstrap: [AppComponent]
})
export class AppModule {}
