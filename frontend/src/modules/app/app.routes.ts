import { NgModule } from '@angular/core';
import { Routes, RouterModule, CanActivate } from '@angular/router';

import { AppComponent, LoginComponent, DashboardComponent, AboutComponent } from 'modules/app/components';
import { AuthGuardService as AuthGuard } from 'modules/app/services';

import { LayoutComponent } from 'modules/layout/components';


/**
 * Available routing paths
 */
const routes: Routes = [
  { path: 'login', component: LoginComponent },
  {
    path: '',
    canActivate: [AuthGuard],
    component: LayoutComponent,
    children: [
      {
        path: 'dashboard',
        component: DashboardComponent
      },
      {
        path: 'about',
        component: AboutComponent
      },
      {
        path: 'users',
        loadChildren: 'modules/user/user.module#UserModule',
      }
    ]
  },

  { path: '**', redirectTo: '' }
];

/**
 * NgModule
 */
@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutes { }
