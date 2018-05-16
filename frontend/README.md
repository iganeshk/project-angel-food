<!-- <textarea rows="70" style="width:98%;border:solid 1px #e6e6e6; background-color: white;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;" disabled="true"> -->

# Project Angel Food - Operations Software System Frontend

Frontend webApp for Operation Systems Client Module.

## Prerequisites

You will need the following things properly installed on your computer.

* [Git](https://git-scm.com/)
* [Node.js](https://nodejs.org/) (v8.11.1 w/ npm v5.6.0)
* [Angular CLI](https://cli.angular.io/)

## Installation

* Install the latest angular, `npm install @angular/cli@latest -g`
* Clone this repository, `git clone <repository-url>`
* Change the working directory, `cd project-angel-food/frontend`
* Install the frontend dependencies, `npm install`

## API Configuration

Make sure you've edited `./src/environments/environment.ts` and `./src/environments/environment.prod.ts` respectively.

## Running / Development

* `ng serve`
* Visit the app at [http://localhost:4200](http://localhost:4200) with hot-reload enabled.

### Building

* `ng build` (development)
* `ng build --prod --base-href http://website-address` (production)


## Directory Structure
```
App
.
├── assets
│   ├── fonts
│   │   └── Roboto-Light.ttf
│   └── images
│       ├── active.jpg
│       ├── favicon.png
│       ├── inactive.jpg
│       ├── logo.png
│       ├── logo_white.png
│       ├── logo_white_header.png
│       └── user.png
├── environments
│   ├── environment.prod.ts
│   └── environment.ts
├── favicon.ico
├── index.html
├── main.ts
├── modules
│   ├── app
│   │   ├── app.module.ts
│   │   ├── app.routes.ts
│   │   ├── components
│   │   │   ├── about
│   │   │   │   ├── about.component.css
│   │   │   │   ├── about.component.html
│   │   │   │   └── about.component.ts
│   │   │   ├── app.component.css
│   │   │   ├── app.component.html
│   │   │   ├── app.component.spec.ts
│   │   │   ├── app.component.ts
│   │   │   ├── dashboard
│   │   │   │   ├── dashboard.component.css
│   │   │   │   ├── dashboard.component.html
│   │   │   │   └── dashboard.component.ts
│   │   │   ├── index.ts
│   │   │   └── login
│   │   │       ├── login.component.css
│   │   │       ├── login.component.html
│   │   │       ├── login.component.spec.ts
│   │   │       └── login.component.ts
│   │   ├── components.barrel.ts
│   │   ├── config
│   │   │   └── globals.ts
│   │   ├── models
│   │   │   ├── index.ts
│   │   │   └── login.model.ts
│   │   └── services
│   │       ├── auth-guard.service.ts
│   │       ├── base.service.ts
│   │       ├── index.ts
│   │       └── login.service.ts
│   ├── layout
│   │   ├── components
│   │   │   ├── default
│   │   │   │   ├── default-layout.component.css
│   │   │   │   ├── default-layout.component.html
│   │   │   │   ├── default-layout.component.ts
│   │   │   │   ├── footer
│   │   │   │   │   ├── footer.component.css
│   │   │   │   │   ├── footer.component.html
│   │   │   │   │   ├── footer.component.spec.ts
│   │   │   │   │   └── footer.component.ts
│   │   │   │   ├── header
│   │   │   │   │   ├── header.component.css
│   │   │   │   │   ├── header.component.html
│   │   │   │   │   ├── header.component.spec.ts
│   │   │   │   │   ├── header.component.ts
│   │   │   │   │   └── sub-header
│   │   │   │   │       ├── sub-header.component.css
│   │   │   │   │       ├── sub-header.component.html
│   │   │   │   │       ├── sub-header.component.spec.ts
│   │   │   │   │       └── sub-header.component.ts
│   │   │   │   └── left-nav
│   │   │   │       ├── left-nav.component.css
│   │   │   │       ├── left-nav.component.html
│   │   │   │       ├── left-nav.component.ts
│   │   │   │       └── navigation.component.spec.ts
│   │   │   ├── flash-message
│   │   │   │   ├── flash-message.component.css
│   │   │   │   ├── flash-message.component.html
│   │   │   │   └── flash-message.component.ts
│   │   │   ├── index.ts
│   │   │   ├── layout.component.css
│   │   │   ├── layout.component.html
│   │   │   └── layout.component.ts
│   │   ├── components.barrel.ts
│   │   ├── layout.module.ts
│   │   ├── models
│   │   │   ├── bread-crumb.ts
│   │   │   └── index.ts
│   │   └── services
│   │       ├── index.ts
│   │       └── layout.service.ts
│   ├── shared
│   │   ├── components
│   │   │   ├── alert-dialog
│   │   │   │   ├── alert-dialog.component.css
│   │   │   │   ├── alert-dialog.component.html
│   │   │   │   └── alert-dialog.component.ts
│   │   │   ├── cmat-error
│   │   │   │   ├── cmat-error.component.css
│   │   │   │   ├── cmat-error.component.html
│   │   │   │   └── cmat-error.component.ts
│   │   │   ├── cmat-success
│   │   │   │   ├── cmat-success.component.css
│   │   │   │   ├── cmat-success.component.html
│   │   │   │   ├── cmat-success.component.ts
│   │   │   │   └── csuccess-message.component.spec.ts
│   │   │   ├── confirm-dialog
│   │   │   │   ├── confirm-dialog.component.css
│   │   │   │   ├── confirm-dialog.component.html
│   │   │   │   └── confirm-dialog.component.ts
│   │   │   ├── index.ts
│   │   │   └── loaders
│   │   │       ├── mat-card-loader
│   │   │       │   ├── mat-card-loader.component.css
│   │   │       │   ├── mat-card-loader.component.html
│   │   │       │   └── mat-card-loader.component.ts
│   │   │       ├── page-loader
│   │   │       │   ├── page-loader.component.css
│   │   │       │   ├── page-loader.component.html
│   │   │       │   └── page-loader.component.ts
│   │   │       └── small-overlay
│   │   │           ├── small-overlay.component.css
│   │   │           ├── small-overlay.component.html
│   │   │           └── small-overlay.component.ts
│   │   ├── components.barrel.ts
│   │   ├── helper
│   │   │   ├── animations.ts
│   │   │   ├── index.ts
│   │   │   └── pipe
│   │   │       └── capitalize.pipe.ts
│   │   └── shared.module.ts
│   └── user
│       ├── components
│       │   ├── form
│       │   │   ├── user-form.component.css
│       │   │   ├── user-form.component.html
│       │   │   └── user-form.component.ts
│       │   ├── index.ts
│       │   ├── list
│       │   │   ├── user-list.component.css
│       │   │   ├── user-list.component.html
│       │   │   └── user-list.component.ts
│       │   └── view
│       │       ├── user-view.component.css
│       │       ├── user-view.component.html
│       │       └── user-view.component.ts
│       ├── components.barrel.ts
│       ├── models
│       │   ├── caseManager.model.ts
│       │   ├── gender.model.ts
│       │   ├── housingType.model.ts
│       │   ├── index.ts
│       │   ├── race.model.ts
│       │   ├── referType.model.ts
│       │   ├── sexualOrientation.model.ts
│       │   ├── user.model.ts
│       │   └── userType.model.ts
│       ├── services
│       │   ├── index.ts
│       │   └── user.service.ts
│       ├── user.module.ts
│       └── user.routes.ts
├── polyfills.ts
├── styles.css
├── test.ts
├── tsconfig.app.json
├── tsconfig.spec.json
└── typings.d.ts
```