<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $places = [
            [
                'title' => 'ផ្ទះលើទឹកបឹងទន្លេសាប',
                'category' => 'sea',
                'description' => 'ផ្ទះលើទឹកនៅបឹងទន្លេសាបគឺជាទ្រព្យសម្បត្តិធម្មជាតិនិងវប្បធម៌ដ៏អស្ចារ្យរបស់ប្រជាជននៅតំបន់មេគង្គ។ ផ្ទះទាំងនេះស្ថិតលើជើងឈើ ឬលើទូកធំៗ ដែលអណ្ដែតលើផ្ទៃទឹក។',
                'description1' => 'ផ្ទះលើទឹកបឹងទន្លេសាប គឺជាប្រភេទលំនៅដ្ឋានបែបប្រពៃណី ដែលស្ថិតនៅលើទឹកដោយសារបឹងទន្លេសាបមានទំហំធំ និងជាបឹងធម្មជាតិដ៏សំខាន់បំផុតនៅកម្ពុជា។ ប្រជាជនដែលរស់នៅផ្ទះលើទឹកភាគច្រើនជាអ្នកនេសាទ ឬជួញដូរលើទឹក ដូចជា លក់ត្រី សណ្ដែក បន្លែ។',
                'img' => 'https://oss4.tnaot.com/tnaot/image/2021/09/23/92b5d1b11e8c462f8082b04783e3671b.jpg',
                'img1' => 'https://cdn.cc-times.com/kh.cc-times.com/images/2102/large/%E1%9E%94%E1%9E%B9%E1%9E%84%E1%9E%91%E1%9E%93%E1%9F%92%E1%9E%9B%E1%9F%81%E1%9E%9F%E1%9E%B6%E1%9E%94.jpg?1597122815',
                'img2' => 'https://png.pngtree.com/png-vector/20230413/ourmid/pngtree-3d-location-icon-clipart-in-transparent-background-vector-png-image_6704161.png',
                'description2' => 'ភូមិកំពង់ភ្លុក ជាភូមិមួយដែលស្ថិតនៅតំបន់លិចទឹកទន្លេសាប នាខេត្តសៀមរាប ចម្ងាយប្រហែល ៣០ គម ពីខេត្តសៀមរាប',
                'order' => 1,
                'options' => [
                    ['type' => 'Resort', 'img' => 'https://s.rfi.fr/media/display/f1d9862a-0e20-11ea-af7c-005056a9aa4d/w:1280/p:3x4/149345_728920857156414_5659791099384268858_n.jpg', 'text' => 'សម្រាកលំហែនៅលើទឹកបែបលក្ខណៈប្រជាជននៅក្នុងភូមិសហគមន៍'],
                    ['type' => 'Camping', 'img' => 'https://s3.ams.com.kh/central/media/2020/12/Graves-Island-camping-stars-1068x601.jpg', 'text' => 'ជាប្រភេទតង់ដែលអាចទាក់ខាងសហគមន៍ ដើម្បីកក់ទុកឲ្យរៀបចំ។'],
                ],
            ],
            [
                'title' => 'កោះរ៉ុង រីស៊ត',
                'category' => 'island',
                'description' => 'កោះរ៉ុង (Koh Rong) គឺជាកោះធំទីពីររបស់ប្រទេសកម្ពុជា ដែលមានឆ្នេរសមុទ្រស្អាតបំផុតមួយនៅអាស៊ីអាគ្នេយ៍ ដោយមានខ្សាច់ពណ៌សស្អាតដូចជាម្សៅស្ករ។',
                'description1' => 'កោះរ៉ុង រីសត ជាទីកន្លែងស្នាក់លំហែសម្បូរបែបដែលស្ថិតនៅលើកោះរ៉ុង ខេត្តព្រះសីហនុ។ អ្នកអាចរីករាយជាមួយសកម្មភាពជាច្រើនដូចជា អណ្តែតទឹក ជិះទូក ការហែលទឹក ឬជិះកាយ៉ាក់ជុំវិញឆ្នេរ។',
                'img' => 'https://construction-property.com/wp-content/uploads/2019/06/islands-established-as-new-districts-of-preah-sihanoukville-province.jpg',
                'img1' => 'https://angkorcamblog.wordpress.com/wp-content/uploads/2017/06/koh-rong-1.jpg?w=679&h=435',
                'img2' => 'https://png.pngtree.com/png-vector/20230413/ourmid/pngtree-3d-location-icon-clipart-in-transparent-background-vector-png-image_6704161.png',
                'description2' => 'ភូមិកំពង់ភ្លុក ជាភូមិមួយដែលស្ថិតនៅតំបន់លិចទឹកទន្លេសាប នាខេត្តសៀមរាប ចម្ងាយប្រហែល ៣០ គម ពីខេត្តសៀមរាប',
                'order' => 2,
                'options' => [
                    ['type' => 'Resort', 'img' => 'https://rongsamloem.com/wp-content/uploads/2019/02/one6.jpg', 'text' => 'រមណីយដ្ឋានកោះដ៏ប្រណិត ផ្តល់ជូនបឹងហ្គាឡូទាន់សម័យក្នុងចំណោមដើមត្នោត និងអាងហែលទឹកគ្មានដែនកំណត់'],
                    ['type' => 'Camping', 'img' => 'https://media.glampinghub.com/CACHE/images/accommodations/on-the-rocks-glamping-tent-1573117814086/cb66cdb12c4304551a53a6761413528c.jpg', 'text' => 'តង់ដ៏ប្រណិតជិតឆ្នេរនៅលើកោះរ៉ុងសន្លឹម មានគ្រែខ្នាតធំ និងបន្ទប់ទឹករួម'],
                ],
            ],
            [
                'title' => 'កោះសាម្លូត',
                'category' => 'island',
                'description' => 'កោះធម្មជាតិស្រស់ស្អាត មានទេសភាពភ្នំសមុទ្រចម្រង់គ្នា។',
                'description1' => 'កោះសាម្លូត គឺជាកោះតូចស្រស់ស្អាតស្ថិតនៅតំបន់ឆ្នេរខេត្តកោះកុង ដែលមានទេសភាពធម្មជាតិស្រស់ស្អាត និងភាពស្ងប់ស្ងាត់ផ្តល់បទពិសោធន៍ពិតប្រាកដនៃការផ្សារភាពជាមួយធម្មជាតិ។',
                'img' => 'https://demo.cambodia.gov.kh/wp-content/uploads/2021/03/%E1%9E%80%E1%9F%86%E1%9E%96%E1%9E%84%E1%9F%8B%E1%9E%9F%E1%9F%84%E1%9E%98-%E1%9E%80%E1%9F%84%E1%9F%87%E1%9E%9F%E1%9E%84%E1%9F%92%E1%9E%9F%E1%9E%B6%E1%9E%9A%E1%9F%A2.jpg',
                'img1' => 'https://refile.tnaot.com/image/2020/07/06/867c30de18c04cd5b5f8a8ad3d959264.jpg',
                'img2' => 'https://png.pngtree.com/png-vector/20230413/ourmid/pngtree-3d-location-icon-clipart-in-transparent-background-vector-png-image_6704161.png',
                'description2' => 'ភូមិកំពង់ភ្លុក ជាភូមិមួយដែលស្ថិតនៅតំបន់លិចទឹកទន្លេសាប នាខេត្តសៀមរាប ចម្ងាយប្រហែល ៣០ គម ពីខេត្តសៀមរាប',
                'order' => 3,
                'options' => [
                    ['type' => 'Resort', 'img' => 'https://img.harbor-property.com/bkcontent/2023/05/04/17800001.jpg', 'text' => 'Four Rivers Floating Lodge៖ រីសតធម្មជាតិជាប់ទឹកជ្រោះតាតៃ មានបឹងកាឡូឯកជនដាច់ដោយឡែក'],
                    ['type' => 'Camping', 'img' => 'https://khmerplaces.com/storage/posts/May2019/o4O40G4HLnuLSjfHGNMg.jpg', 'text' => 'ក្តាតឡាតង់៖ ទីស្នាក់បែបបោះតង់ និងបឹងកាឡូក្បែរមាត់សមុទ្រ និងជើងភ្នំបូកគោ'],
                ],
            ],
            [
                'title' => 'ខ្នងផ្សារ',
                'category' => 'mountain',
                'description' => 'ខ្នងផ្សារ (Khnong Phsar) គឺជាតំបន់ទេសចរណ៍ធម្មជាតិដ៏ស្រស់ស្អាតស្ថិតនៅខេត្តពោធិ៍សាត់ តាមបណ្តោយជួរភ្នំក្រវាញ ជិតព្រំដែនប្រទេសថៃ។ កម្ពស់ប្រហែល ១,៥០០ ម៉ែត្រ លើមាត្រដ្ឋានទឹកសមុទ្រ។',
                'img' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEib_XkZY4zy86tzseR7dJfOWjZe1isGtLzPQEpexZSMA-8jtoDzgFzNSoksnNfTPJDSeUDVRtxkxF6V78k7mqpTrU81nzn2Z9l794_k2c1COSAfHwJqvPsOygGQ39eeHwHvuOV0CeACESITKTUXLAjN7BnmRRemAAMJ97qCqjjM-9l8IAoMVNEOkxjSkx8/s2048/441871002_435944379196927_8695711388997017842_n.jpg',
                'order' => 4,
            ],
            [
                'title' => 'ភ្នំ១៥០០',
                'category' => 'mountain',
                'description' => 'ភ្នំ១៥០០ (Phnom 1500) គឺជាតំបន់ទេសចរណ៍ធម្មជាតិដែលស្ថិតនៅខេត្តពោធិ៍សាត់ តាមបណ្តោយភ្នំក្រវាញ ជិតព្រំដែនថៃ។ កំពស់ប្រហែល ១,៥០០ ម៉ែត្រ ធ្វើឲ្យអាកាសធាតុត្រជាក់ស្រួល។',
                'img' => 'https://i.pinimg.com/736x/a9/ec/71/a9ec71e2067d075394c0a783d0fe32b3.jpg',
                'order' => 5,
            ],
            [
                'title' => 'ផ្កាព្រៃរីស៊ត',
                'category' => 'mountain',
                'description' => 'ផ្កាព្រៃ រីស៊ត (Phka Prey Resort) ជាតំបន់ទេសចរណ៍ធម្មជាតិដ៏ស្រស់ស្អាតស្ថិតនៅខេត្តពោធិ៍សាត់ ជិតខ្នងផ្សារ និងភ្នំ១៥០០។',
                'img' => 'https://business-cambodia.com/cms/assets/07347994-cf90-4d54-ab16-dd274770c24c?width=2048&height=1254',
                'order' => 6,
            ],
            [
                'title' => 'ជីផាត់',
                'category' => 'mountain',
                'description' => 'ជីផាត់ (Chi Phat) ស្ថិតនៅស្រុកថ្មបាំង ខេត្តកោះកុង ជាតំបន់ទេសចរណ៍អេកូដែលគ្រប់គ្រងដោយសហគមន៍ក្នុងស្រុក សម្រាប់អ្នកចង់ស្វែងរកធម្មជាតិពិតប្រាកដ។',
                'img' => 'https://www.cnc.com.kh/news/cef76369f103b75660d8542384be1ed3.jpg',
                'order' => 7,
            ],
            [
                'title' => 'កោះកុងក្រៅ',
                'category' => 'island',
                'description' => 'កោះកុងក្រៅ (Koh Kong Krao) គឺជាកោះធំជាងគេបំផុតនៅកម្ពុជា ស្ថិតនៅខេត្តកោះកុង មានទំហំប្រហែល ១០០ គីឡូម៉ែត្រការ៉េ ត្រូវបានចាត់ទុកថាស្ងប់ស្ងាត់ និងស្អាតបំផុត។',
                'img' => 'https://s3.ams.com.kh/economy/2024/01/2024-01-04-14.22.36-scaled.jpg',
                'order' => 8,
            ],
            [
                'title' => 'មណ្ឌលគិរី',
                'category' => 'mountain',
                'description' => 'ខេត្តមណ្ឌលគិរី ស្ថិតនៅភាគខាងកើតកម្ពុជា ជាខេត្តធំបំផុតក្នុងប្រទេស ល្បីដោយសារទេសភាពភ្នំត្រជាក់ ព្រៃបៃតង និងទឹកជ្រោះធម្មជាតិដ៏អស្ចារ្យ។',
                'img' => 'https://s3.ams.com.kh/economy/2025/02/3-1-1.jpg',
                'order' => 9,
            ],
            [
                'title' => 'ប្រាសាទតាមាន់',
                'category' => 'temple',
                'description' => 'ប្រាសាទតាមាន់ (Prasat Ta Muen) គឺជាសំណង់ប្រាសាទបុរាណសម័យអាណាចក្រខ្មែរ ស្ថិតនៅភ្នំដំបូងនៃខេត្តឧត្តរមានជ័យ ជិតព្រំដែនកម្ពុជា-ថៃ។',
                'img' => 'https://upload.wikimedia.org/wikipedia/commons/8/82/Prasat_Ta_Muen_Toch-3-HDR.jpg',
                'order' => 10,
            ],
            [
                'title' => 'ប្រាសាទតាក្របី',
                'category' => 'temple',
                'description' => 'ប្រាសាទតាក្របី (Prasat Ta Krabei) ស្ថិតនៅស្រុកបន្ទាយអំពិល ខេត្តឧត្តរមានជ័យ ជាប្រាសាទបុរាណដែលមានសិល្បៈ និងស្ថាបត្យកម្មបែបខ្មែរ សតវត្សរ៍ទី ១០–១២។',
                'img' => 'https://phkaslapartner.com/wp-content/uploads/2023/06/image_2023-06-21_08-47-00-edited.jpg',
                'order' => 11,
            ],
            [
                'title' => 'ប្រាសាទព្រះវិហារ',
                'category' => 'temple',
                'description' => 'ប្រាសាទព្រះវិហារ គឺជាប្រាសាទមួយមានតម្លៃប្រវត្តិសាស្ត្រនិងស្ថាបត្យកម្មសំខាន់នៅកម្ពុជា សាងសង់ក្នុងសម្ព័ន្ធសិល្បៈខ្មែរ ដោយប្រើថ្ម។',
                'img' => 'https://phenveth.wordpress.com/wp-content/uploads/2019/03/e19e94e19f92e19e9ae19eb6e19e9fe19eb6e19e91e19e96e19f92e19e9ae19f87e19e9ce19eb7e19ea0e19eb6e19e9ae19fa1e19fa7.jpg',
                'order' => 12,
            ],
        ];

        foreach ($places as $place) {
            $options = $place['options'] ?? [];
            unset($place['options']);
            $place['is_active'] = true;

            $destination = Destination::create($place);

            foreach ($options as $i => $option) {
                $option['order'] = $i + 1;
                $destination->options()->create($option);
            }
        }
    }
}