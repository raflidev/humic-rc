<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        User::create([
            'nip' => '16730040',
            'name' => 'SATRIA MANDALA, S. T., M.Sc., Ph.D.',
            'password' => bcrypt('16730040'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '16860043',
            'name' => 'DR. PUTU HARRY GUNAWAN, S.Si., M.Si., M.Sc.',
            'password' => bcrypt('16860043'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '06830027',
            'name' => 'ANGELINA PRIMA KURNIATI, S.T., M.T., Ph.D.',
            'password' => bcrypt('06830027'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '10830054',
            'name' => 'LEDYA NOVAMIZANTI, S.T., M.T.,',
            'password' => bcrypt('10830054'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '00740046',
            'name' => 'PROF. DR. ADIWIJAYA, S.SI., M.SI.',
            'password' => bcrypt('00740046'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '20920010',
            'name' => 'BRAHMANTYA AJI PRAMUDITA, S.SI., M.ENG.',
            'password' => bcrypt('20920010'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '16830005',
            'name' => 'DIDIT ADYTIA, S.SI., M.SI., PH.D.',
            'password' => bcrypt('16830005'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '07740045',
            'name' => 'ERWIN SUSANTO, S.T., M.T., PH.D.',
            'password' => bcrypt('07740045'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '14740022',
            'name' => 'ESTANANTO, S.T., M.SC., MBA, IPM',
            'password' => bcrypt('14740022'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '13810023',
            'name' => 'DR. IRNI YUNITA, S.T., M.M.',
            'password' => bcrypt('13810023'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '13860093',
            'name' => 'DR. HILAL HUDAN NUHA, S.T., M.T.',
            'password' => bcrypt('13860093'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '10820038',
            'name' => 'JUNARTO HALOMOAN, S.T., M.T.',
            'password' => bcrypt('10820038'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '03650029',
            'name' => 'DR. MOCHAMMAD ARIF BIJAKSANA, IR., M.TECH.',
            'password' => bcrypt('03650029'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '20920009',
            'name' => 'MUHAMMAD HABLUL BARRI, S.T., M.T.',
            'password' => bcrypt('20920009'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '99730017',
            'name' => 'DR. NACHWAN MUFTI ADRIANSYAH, S.T., M.T.',
            'password' => bcrypt('99730017'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '14870044',
            'name' => 'NURUL IKHSAN, S.SI., M.SI., M.SC., PH.D.',
            'password' => bcrypt('14870044'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '14860031',
            'name' => 'RAMDHAN NUGRAHA, SPd. M.T',
            'password' => bcrypt('14860031'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '06840042',
            'name' => 'DR. ADE ROMADHONY',
            'password' => bcrypt('06840042'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '21840004',
            'name' => 'Dr. RIFKI WIJAYA, S.Si., M.T.',
            'password' => bcrypt('21840004'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '20950006',
            'name' => 'RIZKA REZA PAHLEVI, S.KOM., M.KOM.',
            'password' => bcrypt('20950006'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '01750031',
            'name' => 'DR. ACHMAD RIZAL, S.T., M.T.',
            'password' => bcrypt('01750031'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '14790008',
            'name' => 'Dr. Tien Fabrianti Kusumasari, S.T., M.T.',
            'password' => bcrypt('14790008'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '15870066',
            'name' => 'ISMAN KURNIAWAN, Ph.D.',
            'password' => bcrypt('15870066'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '14880065',
            'name' => 'IRMA PALUPI, Ph.D.',
            'password' => bcrypt('14880065'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '4708059101',
            'name' => 'AULIA KHAMAS HEIKHMAKTHIAR, Ph.D.',
            'password' => bcrypt('4708059101'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '99740057',
            'name' => 'PROF. DR. SUYANTO',
            'password' => bcrypt('99740057'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '98690022',
            'name' => 'INDWIARTI, S.Si., M.Si.',
            'password' => bcrypt('98690022'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '15880028',
            'name' => 'ANIQ ATIQI ROHMAWATI, S.Si., M.Si.',
            'password' => bcrypt('15880028'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '21950003',
            'name' => 'DR. ADITYA FIRMAN IHSAN',
            'password' => bcrypt('21950003'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '08810079',
            'name' => 'DR. GUNTUR PRABAWA KUSUMA, S.T., M.T.',
            'password' => bcrypt('08810079'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '19820006',
            'name' => 'DR. Eng. WIKKY FAWWAZ AL MAKI, S.T., M.Eng. - HOF',
            'password' => bcrypt('19820006'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '15850084',
            'name' => 'DR. AJI GAUTAMA PUTRADA',
            'password' => bcrypt('15850084'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '99750013',
            'name' => 'DR. DENI SAEPUDIN',
            'password' => bcrypt('99750013'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '19900020',
            'name' => 'DR. RIO GUNTUR UTOMO',
            'password' => bcrypt('19900020'),
            'status' => 1,
            'role' => 'user'
        ]);

        User::create([
            'nip' => '20920015',
            'name' => 'DITA OKTARIA, M.T',
            'password' => bcrypt('20920015'),
            'status' => 1,
            'role' => 'user'
        ]);
    }
}
