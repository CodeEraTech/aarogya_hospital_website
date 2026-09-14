<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\{Doctor,Speciality,Setting};
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@aarogyahospital.com'], [
            'name' => 'Hospital Administrator',
            'email' => 'admin@aarogyahospital.com',
            'password' => 'ChangeMe@123',
        ]);

        foreach ([['Dr. Amit Bhutani','Orthopaedics & Joint Replacement Specialist','dr-amit-bhutani.jpg'],['Dr. Puja Bhutani','Obstetrics, Gynaecology & Infertility Specialist','dr-puja-bhutani.jpg'],['Dr. Deepak Gupta & Dr. Gunjan Gupta','Anaesthesia, Intensive Care & ICU','dr-deepak-gunjan-gupta.jpg'],['Dr. Sachin Thakral','Physiotherapy & Sports Injury Specialist','dr-sachin-thakral.jpg']] as [$name,$designation,$image]) Doctor::updateOrCreate(['slug'=>Str::slug($name)],['name'=>$name,'designation'=>$designation,'image'=>'uploads/doctors/'.$image]);
        foreach ([['Advanced Orthopaedics','Bone & Joint Care'],['Robotic Joint Replacement','Precision Surgery'],['Gynaecology & Infertility','Fertility Care'],['Emergency & Trauma Care','Round-the-clock Care']] as [$name,$label]) Speciality::updateOrCreate(['slug'=>Str::slug($name)],['name'=>$name,'short_label'=>$label,'description'=>'Specialist care with experienced clinicians and modern technology.']);
        foreach (['site_phone'=>'01662-245450','site_email'=>'care@aarogyahospital.com','whatsapp_number'=>'+918222049007','address'=>'Opposite Vishwas School, Near LIC Office, Urban Estate II, Hisar, Haryana 125001'] as $key=>$value) Setting::updateOrCreate(['key'=>$key],['value'=>$value,'group'=>'Contact']);
    }
}
