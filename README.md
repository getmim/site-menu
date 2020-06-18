# site-menu

Adalah module penyedia data site menu.

## Instalasi

Jalankan perintah di bawah di folder aplikasi:

```
mim app install site-menu
```

## Penggunaan

Module ini menambahkan satu library dengan nama `SiteMenu\Library\SiteMenu` yang bisa digunakan
untuk mengambil menu berdasarkan nama menu:

```php
use SiteMenu\Library\SiteMenu;

$menu = SiteMenu::get('menu-name');
```

## Struktur Konten

Data yang disimpan di tabel `site_menu` kolom `content` berisi daftar menu
site dengan struktur json sebagai berikut:

```json
[
    {
        "label": "/Menu Label/",
        "link": "/menu-link/",
        "children": [
            {
                "label": "/Submenu Label/",
                "link": "/submeny-link/",
                "children": [
                    // ...
                ]
            },
            // ...
        ]
    },
    // ...
]
```