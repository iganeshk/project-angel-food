// Import components and services etc here
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import {
  MatSelectModule,
  MatFormFieldModule,
  MatIconModule,
  MatDialogModule,
  MatButtonModule,
  MatProgressSpinnerModule,
  MatInputModule,
  MatTableModule,
  MatCardModule,
  MatDividerModule,
  MatListModule,
  MatSidenavModule,
  MatRadioModule,
  MatProgressBarModule,
  MatChipsModule,
  MatPaginatorModule,
  MatSortModule,
  MatTooltipModule,
  MatExpansionModule
} from '@angular/material';
import { FlexLayoutModule } from '@angular/flex-layout';

import {
  CMatErrorComponent,
  CMatSuccessComponent,
  ConfirmDialogComponent,
  PageLoaderComponent,
  AlertDialogComponent,
  SmallOverlayComponent,
  MatCardLoaderComponent,
} from './components';

import { CapitalizePipe } from './helper';

export const __IMPORTS = [
  FormsModule,
  ReactiveFormsModule,
  MatFormFieldModule,
  MatSelectModule,
  MatIconModule,
  MatDialogModule,
  MatButtonModule,
  MatProgressSpinnerModule,
  MatInputModule,
  FlexLayoutModule,
  MatTableModule,
  MatCardModule,
  MatDividerModule,
  FlexLayoutModule,
  MatProgressSpinnerModule,
  MatListModule,
  MatSidenavModule,
  MatRadioModule,
  MatProgressBarModule,
  MatChipsModule,
  MatPaginatorModule,
  MatSortModule,
  MatTooltipModule,
  MatExpansionModule
];

export const __DECLARATIONS = [
  CMatErrorComponent,
  CMatSuccessComponent,
  ConfirmDialogComponent,
  AlertDialogComponent,
  PageLoaderComponent,
  CapitalizePipe,
  SmallOverlayComponent,
  MatCardLoaderComponent,
];

export const __PROVIDERS = [];
export const __ENTRY_COMPONENTS = [ConfirmDialogComponent,  AlertDialogComponent];
