// Import components and services etc here
import {
  MatInputModule,
  MatFormFieldModule,
  MatIconModule,
  MatDialogModule,
  MatButtonModule,
  MatCardModule,
  MatTableModule,
  MatPaginatorModule,
  MatOptionModule,
  MatAutocompleteModule,
  MatSelectModule,
  MatDividerModule,
  MatListModule,
  MatExpansionModule,
  MatCheckboxModule,
  MatProgressBarModule,
  MatRadioModule,
  MatDatepickerModule
} from '@angular/material';
import { TextMaskModule } from 'angular2-text-mask';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FlexLayoutModule } from '@angular/flex-layout';
import {  UserService} from './services/index';

import {
  UserFormComponent,
  UserViewComponent,
  UserListComponent,
} from './components';

export const __IMPORTS = [
  MatInputModule,
  MatFormFieldModule,
  MatIconModule,
  MatDialogModule,
  MatButtonModule,
  MatCardModule,
  FormsModule,
  ReactiveFormsModule,
  MatTableModule,
  MatPaginatorModule,
  MatAutocompleteModule,
  MatOptionModule,
  MatSelectModule,
  MatDividerModule,
  MatListModule,
  FlexLayoutModule,
  MatExpansionModule,
  MatCheckboxModule,
  MatProgressBarModule,
  MatRadioModule,
  TextMaskModule,
  MatDatepickerModule
];

export const __DECLARATIONS = [
  UserFormComponent,
  UserViewComponent,
  UserListComponent
];

export const __PROVIDERS = [
  UserService,
];

export const __ENTRY_COMPONENTS = [];
