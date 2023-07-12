<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class _PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();
        $pages = [
            [
                'route' => 'landing',
                'type' => 'origin',
                'section' => 'Main',
                'origin_title' => 'Homepage',
                'file' => 'og.jpg',
                'subtitle' => null,
                'description' => null,
                'has_items' => true,
                'seo_title' => [
                    'en' => 'Cargo Line-A',
                    'hy' => 'Cargo Line-A',
                    'ru' => 'Cargo Line-A',
                ],
                'seo_description' => [
                    'en' => 'Cargo Line-A',
                    'hy' => 'Cargo Line-A',
                    'ru' => 'Cargo Line-A',
                ],
                'seo_keywords' => '',
            ],
            [
                'route' => 'about',
                'type' => 'origin',
                'section' => 'Main',
                'origin_title' => 'About',
                'file' => 'about1.webp',
                'subtitle' => [
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
                'seo_title' => '',
                'seo_description' => '',
                'seo_keywords' => '',
            ],
            [
                'route' => 'services',
                'type' => 'origin',
                'section' => 'Main',
                'origin_title' => 'Services',
                'file' => null,
                'subtitle' => null,
                'description' => null,
                'seo_title' => '',
                'seo_description' => '',
                'seo_keywords' => '',
                'has_items' => true,
                'has_media' => true,
            ],
            [
                'route' => 'faq',
                'type' => 'origin',
                'section' => 'Informational',
                'origin_title' => 'FAQ',
                'file' => null,
                'subtitle' => null,
                'description' => null,
                'seo_title' => '',
                'seo_description' => '',
                'seo_keywords' => '',
                'has_items' => true,
                'has_media' => true,
            ],
            [
                'route' => 'info',
                'type' => 'origin',
                'section' => 'Main',
                'origin_title' => 'Info',
                'file' => 'info.webp',
                'subtitle' => null,
                'description' =>    [
                    'en' => 'Description',
                    'hy' => 'Սկսած 1500-ականներից` lorem ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է:
                                    այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ:
                                    հակառակ ընդհանուր պատկերացմանը` lorem ipsum-ը այդքան էլ պատահական հավաքված տեքստ չէ: այս տեքստի արմատները հասնում են ք.ա. 45թ. դասական լատինական գրականություն. այն 2000 տարեկան է: ռիչարդ մքքլինտոքը` վիրջինիայի համպդեն-սիդնեյ քոլեջում լատիներենի մի դասախոս` ուսումնասիրելով lorem ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: lorem ipsum-ը ամրագրված է ք.ա 45թ. ցիցերոնի "de finibus bonorum et malorum" (չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում: այս գիրքը վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: lorem ipsum-ի առաջին տողը` "lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:',
                    'ru' => 'Описание',
                ],
                'seo_title' => '
                ',
                'seo_description' => '',
                'seo_keywords' => '',
                'documents_block' => true,
            ],
            [
                'route' => 'blog',
                'type' => 'origin',
                'section' => 'Informational',
                'origin_title' => 'Blog',
                'file' => '1.webp',
                'subtitle' => null,
                'description' => null,
                'seo_title' => '',
                'seo_description' => '',
                'seo_keywords' => '',
                'has_items' => true,
                'has_media' => true,
            ],
            [
                'route' => 'contacts',
                'type' => 'origin',
                'section' => 'Main',
                'origin_title' => 'Contacts',
                'file' => null,
                'subtitle' => null,
                'description' => null,
                'seo_title' => '',
                'seo_description' => '',
                'seo_keywords' => '',
            ],
            [
                'route' => 'custom',
                'type' => 'custom',
                'section' => 'Main',
                'origin_title' => 'Custom Page',
                'file' => 'custom.webp',
                'subtitle' => null,
                'description' =>    [
                    'en' => 'Description',
                    'hy' => 'Սկսած 1500-ականներից` lorem ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է:
                                    այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ:
                                    հակառակ ընդհանուր պատկերացմանը` lorem ipsum-ը այդքան էլ պատահական հավաքված տեքստ չէ: այս տեքստի արմատները հասնում են ք.ա. 45թ. դասական լատինական գրականություն. այն 2000 տարեկան է: ռիչարդ մքքլինտոքը` վիրջինիայի համպդեն-սիդնեյ քոլեջում լատիներենի մի դասախոս` ուսումնասիրելով lorem ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: lorem ipsum-ը ամրագրված է ք.ա 45թ. ցիցերոնի "de finibus bonorum et malorum" (չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում: այս գիրքը վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: lorem ipsum-ի առաջին տողը` "lorem ipsum dolor sit amet..", 1.10.32 բաժնից է:',
                    'ru' => 'Описание',
                ],
                'seo_title' => '
                ',
                'seo_description' => '',
                'seo_keywords' => '',
                'url' => 'custom',
                'documents_block' => true,
                'media_block' => true,
            ],
        ];

        foreach ($pages as $page) {
            \App\Models\_Page::create($page);
        }
    }
}
