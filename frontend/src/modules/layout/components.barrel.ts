// Import components and services etc here
import { CommonModule } from '@angular/common';

import {
  MatSidenavModule,
  MatToolbarModule,
  MatMenuModule,
  MatListModule,
  MatButtonModule,
  MatTooltipModule,
  MatIconModule,
  MatCheckboxModule,
  MatProgressSpinnerModule
} from '@angular/material';
import { FlexLayoutModule } from '@angular/flex-layout';
import { LayoutService } from 'modules/layout/services';

import {
  LayoutComponent,
  DefaultLayoutComponent,
  HeaderComponent,
  SubHeaderComponent,
  FooterComponent,
  LeftNavComponent,
  FlashMessageComponent
} from './components';

export const __IMPORTS = [
  CommonModule,
  MatSidenavModule,
  MatToolbarModule,
  MatMenuModule,
  MatListModule,
  MatButtonModule,
  MatTooltipModule,
  FlexLayoutModule,
  MatIconModule,
  MatCheckboxModule,
  MatProgressSpinnerModule
];

export const __DECLARATIONS = [
  LayoutComponent,
  DefaultLayoutComponent,
  HeaderComponent,
  SubHeaderComponent,
  FooterComponent,
  LeftNavComponent,
  FlashMessageComponent
];

export const __PROVIDERS = [LayoutService];

export const __ENTRY_COMPONENTS = [];
