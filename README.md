# Telapor Backend
Backend Android Application Telapor

## Request Bodies
### POST /register
```json
{
  "namaLengkap": "", // string
  "email": "", // string
  "password": "", // string
  "status": "", // enum (Mahasiswa, Dosen, Staff)
  "role": "" // enum (Pelapor, Admin)
}
```

### POST /login
```json
{
  "email": "", // string
  "password": "" // string
}
```

### POST /logout
No request body required.

### GET /profile
No request body required.

### PUT /profile
```json
{
  "namaLengkap": "", // string
  "email": "", // string
  "password": "", // string
  "role": "" // enum (Pelapor, Admin)
}
```

### GET /laporan
No request body required.

### POST /laporan
```json
{
  "detail": "", // text
  "lokasi": "", // string
  "foto": "", // string (nullable)
  "tipe_laporan": "", // enum (Barang Hilang, Kerusakan Fasilitas)
  "conditional_fields": {
    "Barang Hilang": {
      "nama_barang": "", // string
      "status": "" // enum (hilang, Ditemukan, Dikembalikan)
    },
    "Kerusakan Fasilitas": {
      "nama_fasilitas": "", // string
      "tingkat_kerusakan": "", // enum (Ringan, Sedang, Berat)
      "status": "" // enum (Dilaporkan, Diperbaiki, Selesai)
    }
  }
}
```

### GET /laporan/{id}
No request body required.

### PUT /laporan/{id}
```json
{
  "detail": "", // text
  "lokasi": "", // string
  "foto": "", // string (nullable)
  "tipe_laporan": "", // enum (Barang Hilang, Kerusakan Fasilitas)
  "conditional_fields": {
    "Barang Hilang": {
      "nama_barang": "", // string
      "status": "" // enum (hilang, Ditemukan, Dikembalikan)
    },
    "Kerusakan Fasilitas": {
      "nama_fasilitas": "", // string
      "tingkat_kerusakan": "", // enum (Ringan, Sedang, Berat)
      "status": "" // enum (Dilaporkan, Diperbaiki, Selesai)
    }
  }
}
```

### DELETE /laporan/{id}
No request body required.
