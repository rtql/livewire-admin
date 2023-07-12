<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class _SectionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('sections')->delete();
        $sections = [
            [
                'route' => 'slider',
                'origin_title' => 'Slider',
                'tag' => 'front.main.main-slider.main-slider-component',
                'file' => null,
                'title' => null,
                'description' => null,
                'has_items' => true,
                'has_media' => true,
            ],
            [
                'route' => 'hero',
                'origin_title' => 'Hero',
                'tag' => 'front.main.hero.hero-component',
                'file' => 'hero.webp',
                'title' => [
                    'en' => 'CARGOLINE A',
                    'hy' => 'CARGOLINE A',
                    'ru' => 'CARGOLINE A',
                ],
                'description' =>    [
                    'en' => 'Description',
                    'hy' => 'Սկսած 1500-ականներից` lorem ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է:
                                    այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ:
                                    հակառակ ընդհանուր պատկերացմանը` lorem ipsum-ը այդքան էլ պատահական հավաքված տեքստ չէ: այս տեքստի արմատները հասնում են ք.ա. 45թ. դասական լատինական գրականություն. այն 2000 տարեկան է: ռիչարդ մքքլինտոքը` վիրջինիայի համպդեն-սիդնեյ քոլեջում լատիներենի մի դասախոս` ուսումնասիրելով lorem ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: lorem ipsum-ը ամրագրված է ք.ա 45թ. ցիցերոնի "de finibus bonorum et malorum" (չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում: այս գիրքը վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: lorem ipsum-ի առաջին տողը` "lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:',
                    'ru' => 'Описание',
                ],
                'has_items' => true,
                'has_media' => true,
            ],
            [
                'route' => 'transport',
                'origin_title' => 'Services',
                'tag' => 'front.main.transport.transport-component',
                'file' => 'transport.webp',
                'title' => null,
                'description' => null,
                'has_items' => true,
                'has_media' => true,
            ],
            [
                'route' => 'offer',
                'origin_title' => 'Offer',
                'tag' => 'front.main.offer.offer-component',
                'file' => 'offer.webp',
                'title' => [
                    'en' => 'Apply online',
                    'hy' => 'Օնլայն հայտ',
                    'ru' => 'Онлайн заявка',
                ],
                'description' =>    [
                    'en' => 'Apply online and our specialists will contact you as soon as possible.',
                    'hy' => 'Դիմեք մեզ օնլայն և մեր մասնագետները հնարավորինս արագ կկապնվեն ձեր հետ։',
                    'ru' => 'Подайте заявку онлайн, и наши специалисты свяжутся с вами в ближайшее время.',
                ],
                'has_items' => false,
                'has_media' => false,
            ],
            [
                'route' => 'news',
                'origin_title' => 'News',
                'tag' => 'front.main.news.news-component',
                'file' => null,
                'title' => null,
                'description' => null,
                'has_items' => true,
                'has_media' => true,
            ],
        ];

        foreach ($sections as $section) {
            \App\Models\_Section::create($section);
        }
    }
}
