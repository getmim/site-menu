# site-menu

Adalah module penyedia data site menu.

## Instalasi

Jalankan perintah di bawah di folder aplikasi:

```
mim app install site-menu
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