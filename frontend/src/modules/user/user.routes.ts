import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import {
  UserFormComponent,
  UserViewComponent,
  UserListComponent,
} from './components';

/**
 * Available routing paths for /user
 */
const routes: Routes = [
  {
    path: '',
    component: UserListComponent,
  },
  {
    path: 'add',
    component: UserFormComponent,
    data: { act: 'add' }
  },
  {
    path: 'view/:id',
    component: UserViewComponent
  },
  {
    path: 'update/:id',
    component: UserFormComponent,
    data: { act: 'update' }
  }
];

/**
 * NgModule
 */
@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UserRoutes { }
