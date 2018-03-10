# angka-melek-huruf

[![Join the chat at https://gitter.im/angka-melek-huruf/Lobby](https://badges.gitter.im/angka-melek-huruf/Lobby.svg)](https://gitter.im/angka-melek-huruf/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/angka-melek-huruf/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/angka-melek-huruf/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/angka-melek-huruf/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/angka-melek-huruf/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/angka-melek-huruf/v/stable)](https://packagist.org/packages/bantenprov/angka-melek-huruf)
[![Total Downloads](https://poser.pugx.org/bantenprov/angka-melek-huruf/downloads)](https://packagist.org/packages/bantenprov/angka-melek-huruf)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/angka-melek-huruf/v/unstable)](https://packagist.org/packages/bantenprov/angka-melek-huruf)
[![License](https://poser.pugx.org/bantenprov/angka-melek-huruf/license)](https://packagist.org/packages/bantenprov/angka-melek-huruf)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/angka-melek-huruf/d/monthly)](https://packagist.org/packages/bantenprov/angka-melek-huruf)
[![Daily Downloads](https://poser.pugx.org/bantenprov/angka-melek-huruf/d/daily)](https://packagist.org/packages/bantenprov/angka-melek-huruf)

Angka Melek Huruf (AMH) Menurut Kabupaten/Kota

### Install via composer

- Development snapshot

```bash
$ composer require bantenprov/angka-melek-huruf:dev-master
```

- Latest release:

```bash
$ composer require bantenprov/angka-melek-huruf
```

### Download via github

```bash
$ git clone https://github.com/bantenprov/angka-melek-huruf.git
```

#### Edit `config/app.php` :

```php
'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\AngkaMelekHuruf\AngkaMelekHurufServiceProvider::class,
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=angka-melek-huruf-seeds

```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovAngkaMelekHurufSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=angka-melek-huruf-assets
$ php artisan vendor:publish --tag=angka-melek-huruf-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
        path: '/dashboard/angka-melek-huruf',
        components: {
            main: resolve => require(['./components/views/bantenprov/angka-melek-huruf/DashboardAngkaMelekHuruf.vue'], resolve),
            navbar: resolve => require(['./components/Navbar.vue'], resolve),
            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
            title: "Angka Melek Huruf"
        }
      }
        //== ...
    ]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/angka-melek-huruf',
            components: {
                main: resolve => require(['./components/bantenprov/angka-melek-huruf/AngkaMelekHuruf.index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Angka Melek Huruf"
            }
        },
        {
            path: '/admin/angka-melek-huruf/create',
            components: {
                main: resolve => require(['./components/bantenprov/angka-melek-huruf/AngkaMelekHuruf.add.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Angka Melek Huruf"
            }
        },
        {
            path: '/admin/angka-melek-huruf/:id',
            components: {
                main: resolve => require(['./components/bantenprov/angka-melek-huruf/AngkaMelekHuruf.show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Angka Melek Huruf"
            }
        },
        {
            path: '/admin/angka-melek-huruf/:id/edit',
            components: {
                main: resolve => require(['./components/bantenprov/angka-melek-huruf/AngkaMelekHuruf.edit.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Angka Melek Huruf"
            }
        },
        //== ...
    ]
},
```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
          name: 'Angka Melek Huruf',
          link: '/dashboard/angka-melek-huruf',
          icon: 'fa fa-angle-double-right'
      }
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
            name: 'Angka Melek Huruf',
            link: '/admin/angka-melek-huruf',
            icon: 'fa fa-angle-double-right'
          }
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript
//== Example Vuetable

// Angka Melek Huruf
import AngkaMelekHuruf from './components/bantenprov/angka-melek-huruf/AngkaMelekHuruf.chart.vue';
Vue.component('echarts-dpp-bank-dunia', AngkaMelekHuruf);

import AngkaMelekHurufKota from './components/bantenprov/angka-melek-huruf/AngkaMelekHurufKota.chart.vue';
Vue.component('echarts-angka-melek-huruf-kota', AngkaMelekHurufKota);

import AngkaMelekHurufTahun from './components/bantenprov/angka-melek-huruf/AngkaMelekHuruf.chart.vue';
Vue.component('echarts-angka-melek-huruf-tahun', AngkaMelekHurufTahun);

import AngkaMelekHurufAdminShow from './components/bantenprov/angka-melek-huruf/AngkaMelekHurufAdmin.show.vue';
Vue.component('admin-view-angka-melek-huruf-tahun', AngkaMelekHurufAdminShow);

//== Echarts Angka Melek Huruf

import AngkaMelekHurufBar01 from './components/views/bantenprov/angka-melek-huruf/AngkaMelekHurufBar01.vue';
Vue.component('angka-melek-huruf-bar-01', AngkaMelekHurufBar01);

import AngkaMelekHurufBar02 from './components/views/bantenprov/angka-melek-huruf/AngkaMelekHurufBar02.vue';
Vue.component('angka-melek-huruf-bar-02', AngkaMelekHurufBar02);

//== mini bar charts
import AngkaMelekHurufBar03 from './components/views/bantenprov/angka-melek-huruf/AngkaMelekHurufBar03.vue';
Vue.component('angka-melek-huruf-bar-03', AngkaMelekHurufBar03);

import AngkaMelekHurufPie01 from './components/views/bantenprov/angka-melek-huruf/AngkaMelekHurufPie01.vue';
Vue.component('angka-melek-huruf-pie-01', AngkaMelekHurufPie01);

import AngkaMelekHurufPie02 from './components/views/bantenprov/angka-melek-huruf/AngkaMelekHurufPie02.vue';
Vue.component('angka-melek-huruf-pie-02', AngkaMelekHurufPie02);

//== mini pie charts
import AngkaMelekHurufPie03 from './components/views/bantenprov/angka-melek-huruf/AngkaMelekHurufPie03.vue';
Vue.component('angka-melek-huruf-pie-03', AngkaMelekHurufPie03);
