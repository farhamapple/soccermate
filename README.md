# ⚽ SoccerMate

**SoccerMate** adalah aplikasi manajemen komunitas mini soccer & sepak bola.  
Dibangun dengan **Laravel 11 + Filament 4 (Admin Panel)** dan **Livewire 3 (Frontend Member)**.  
Tujuan utama aplikasi ini adalah mempermudah pengelolaan event, pembagian tim acak, pencatatan hasil pertandingan, serta rekap statistik individu maupun tim.

---

## 📖 Project Overview

Komunitas mini soccer dan sepak bola rutin mengadakan event setiap dua minggu sekali.  
Dalam setiap event, anggota komunitas mendaftar untuk ikut bermain, kemudian **sistem akan mengacak pembagian tim** (8 orang per tim untuk mini soccer, 11 orang per tim untuk sepak bola).  

Setiap event terdiri dari 6 pertandingan. Karena tim selalu acak, maka **statistik individu** menjadi fokus utama aplikasi ini.  
Aplikasi ini mendukung pencatatan gol, kartu, absensi, poin tim, dan klasemen, serta menyediakan arsip event.

---

## 🎯 Tujuan
- Mempermudah pengelolaan event komunitas.
- Membuat sistem pendaftaran dengan waiting list otomatis.
- Menghasilkan tim acak dengan kapasitas sesuai format (mini soccer/sepak bola).
- Mencatat hasil pertandingan (skor, gol, kartu, absensi).
- Menyediakan statistik individu & klasemen tim secara real-time.
- Menyediakan arsip event yang bisa diakses kembali.

---

## 📝 Requirements

### Functional Requirements
1. **User & Member Management**
   - CRUD Users & Members.
   - Aktivasi/deaktivasi member.
   - Relasi member ke komunitas.
   - Member dapat login untuk melihat jadwal & statistik pribadi.

2. **Event Management**
   - Buat event baru (mini soccer / sepak bola).
   - Parameter event: jumlah tim, jumlah pemain, tanggal.
   - Pendaftaran dengan **waiting list otomatis**.
   - Waiting list terpromosi otomatis jika ada slot kosong.

3. **Team Management**
   - Generate tim otomatis (acak).
   - Pindah pemain manual.
   - Atur posisi pemain (GK, DF, MF, FW).
   - Statistik tim otomatis.

4. **Match Management**
   - Generate 6 jadwal pertandingan otomatis.
   - Input hasil pertandingan:
     - Skor akhir
     - Pencetak gol
     - Kartu kuning/merah
     - Absensi
   - Update klasemen & statistik individu otomatis.

5. **Standings & Statistics**
   - Hitung klasemen tim (poin, goal difference, jumlah gol).
   - Statistik individu: total gol, rata-rata gol, kartu, % hadir.
   - Summary per event & lintas event.

6. **History & Reporting**
   - Event selesai → pindah ke arsip.
   - Admin bisa export laporan (fase lanjutan).
   - Member bisa lihat arsip event yang pernah diikuti.

### Non-Functional Requirements
- **Platform**: Laravel 11 + Filament 4 + Livewire 3.
- **Database**: PostgreSQL (disarankan).
- **Auth**: Filament Auth (admin), Breeze/Fortify (member).
- **Security**: Password hashed, CSRF protection, RBAC (fase lanjutan).
- **Performance**: Support 200+ member aktif.
- **Usability**: UI sederhana, mobile-friendly.
- **Scalability**: ERD memungkinkan penambahan fitur (pembayaran, notifikasi).

---

## 🚀 MVP Features (Fase Pertama)
1. Member Management (CRUD, aktivasi/deaktivasi, relasi komunitas).
2. Event Management (buat event, pendaftaran, waiting list, auto-assign tim).
3. Team Management (generate tim, ubah manual, posisi pemain).
4. Match & Score Recording (jadwal otomatis, input skor, gol, kartu, absensi).
5. Standings & Statistics (klasemen tim, statistik individu).
6. Waiting List System (otomatis pindahkan dari waiting list).
7. Auth & Dashboard (login, event aktif, klasemen, top scorer).

---

## 🔮 Future Enhancements
- Notifikasi WA/Email saat event dibuka atau jadwal keluar.
- Export PDF/Excel laporan event & statistik.
- Role Management (Super Admin, Event Manager, Member).
- Payment System (biaya pendaftaran event, payment gateway).

---

## 🛠️ Tech Stack
- **Backend**: Laravel 11
- **Admin Panel**: Filament 4
- **Frontend**: Livewire 3
- **Database**: PostgreSQL
- **Containerization**: Docker/Podman (opsional)

---

## 📂 Struktur ERD
![ERD](docs/erd.png)

---

## 📌 Development Setup

```bash
# Clone repo
git clone https://github.com/username/soccermate.git
cd soccermate

# Install dependencies
composer install
npm install && npm run dev

# Copy environment file
cp .env.example .env

# Generate key
php artisan key:generate

# Migrate database
php artisan migrate --seed

# Run server
php artisan serve
