<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\Advantage;

class VisionMissionAdvantageSeeder extends Seeder
{
    public function run(): void
    {
        // Hanya isi jika tabel benar-benar kosong (opsional, bisa diganti truncate)
        if (Vision::truncate()) {
            Vision::create([
                'content' => 'Menjadi perusahaan kontraktor terdepan di Indonesia yang mengedepankan kualitas, keselamatan, dan inovasi.'
            ]);
            Vision::create([
                'content' => 'Mewujudkan ekosistem pembangunan berkelanjutan yang memberikan nilai tambah bagi masyarakat dan lingkungan.'
            ]);
        }

        if (Mission::truncate()) {
            Mission::create([
                'content' => 'Menyediakan jasa konstruksi berkualitas tinggi sesuai standar nasional dan internasional.'
            ]);
            Mission::create([
                'content' => 'Menerapkan teknologi terkini untuk efisiensi waktu dan biaya proyek.'
            ]);
            Mission::create([
                'content' => 'Membangun kemitraan jangka panjang dengan klien berdasarkan kepercayaan dan hasil nyata.'
            ]);
            Mission::create([
                'content' => 'Meningkatkan kompetensi sumber daya manusia secara berkelanjutan melalui pelatihan dan sertifikasi.'
            ]);
        }

        if (Advantage::truncate()) {
            Advantage::create([
                'name'    => 'Tenaga Ahli Berpengalaman',
                'content' => 'Tim kami terdiri dari para profesional bersertifikasi nasional dengan pengalaman di berbagai proyek besar.'
            ]);
            Advantage::create([
                'name'    => 'Material Berkualitas',
                'content' => 'Kami hanya menggunakan bahan baku premium yang telah teruji untuk menjamin kekuatan dan ketahanan bangunan.'
            ]);
            Advantage::create([
                'name'    => 'Harga Kompetitif',
                'content' => 'Dapatkan penawaran terbaik dengan transparansi biaya tanpa biaya tersembunyi.'
            ]);
            Advantage::create([
                'name'    => 'Tepat Waktu',
                'content' => 'Komitmen kami menyelesaikan setiap proyek sesuai jadwal yang disepakati tanpa mengorbankan kualitas.'
            ]);
        }
    }
}