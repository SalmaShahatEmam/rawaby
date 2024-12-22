<?php

namespace Database\Seeders;

use App\Models\Onboarding;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OnboardingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Onboarding::truncate();
        Onboarding::insert([
            [
                'name_ar' => 'ابحث عن المنزل المثالي للإيجار',
                'name_en' => 'Find the perfect home for rent',
                'desc_ar' => "اكتشف مجموعة واسعة من العقارات المتاحة للإيجار الشهري. سواء كنت تبحث عن استوديو مريح أو شقة فسيحة، فنحن نوفر لك كل ما تحتاجه.",
                'desc_en' => "Discover a wide range of properties available for monthly rent. Whether you are looking for a cozy studio or a spacious apartment, we provide you with everything you need.",
                'image' => 'onboarding/1.png',
            ],
            [
                'name_ar' => 'استعرض القوائم التي تتناسب مع نمط حياتك',
                'name_en' => 'Browse listings that suit your lifestyle',
                'desc_ar' => "قم بتصفية النتائج حسب الموقع والسعر والمرافق لتجد العقار الذي يناسب احتياجاتك. قارن الخيارات لتتخذ القرار الأفضل ",
                'desc_en' => "Filter results by location, price, and amenities to find the property that suits your needs. Compare options to make the best decision",
                'image' => 'onboarding/2.png',
            ],
            [
                'name_ar' => 'حجز سهل ومدفوعات آمنة',
                'name_en' => 'Easy booking and secure payments',
                'desc_ar' => "استمتع بتجربة حجز سلسة مع خيارات دفع آمنة وقوائم موثوقة. منزلك الجديد على بعد بضع نقرات فقط!",
                'desc_en' => "Enjoy a smooth booking experience with secure payment options and trusted listings. Your new home is just a few clicks away!",
                'image' => 'onboarding/3.png',
            ]
        ]);
    }
}
