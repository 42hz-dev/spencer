<?php

declare(strict_types=1);

/*
 * SPENCER — The Birthday Issue
 *
 * 사이트 내용은 이 파일에서만 관리한다.
 * - 사진 번호 N 은 public/images/spencerN.jpeg
 * - 챕터 photos 의 첫 번째 사진이 챕터 대표(오프닝) 사진
 * - 설명 문구는 ['ko' => 한국어, 'en' => English]
 */
return [
    'birthday' => [
        'dog_name'   => 'Spencer',
        'age'        => 10,             // 촛불 개수로도 사용 (최대 20)
        'owner_name' => 'Terrileigh',
        'letter'     => [
            'ko' => <<<TXT
                멀리 있어서 직접 축하해주지는 못하지만, 이렇게라도 축하해주고 싶었어.

                Spencer의 열 번째 생일 축하해.
                앞으로도 지금처럼 건강하게, 오래오래 함께하길.

                — 멀리서, 친구가
                TXT,
            'en' => <<<TXT
                I'm far away and can't be there in person, but I still wanted to celebrate with you like this.

                Happy 10th birthday, Spencer.
                Stay healthy, and here's to many more years together.

                — From far away, your friend
                TXT,
        ],
    ],

    'cover' => [
        'photo'   => 21,
        'tagline' => 'The Birthday Issue',
    ],

    'birthday_photos' => [9, 11],

    // 촛불을 모두 끄면 터지는 축하 화면: 튀어나오는 사진 + 순서대로 바뀌는 문구
    'celebration' => [
        'photos'   => [5, 17, 33, 39, 45, 1],
        'messages' => [
            ['ko' => '펑! 소원 접수 완료 🎉', 'en' => 'Pop! Wish received 🎉'],
            ['ko' => 'Spencer의 소원은 아마… 망고 무한리필 🥭', 'en' => "Spencer's wish is probably… unlimited mango 🥭"],
            ['ko' => '10살 생일 축하해, Spencer!', 'en' => 'Happy 10th birthday, Spencer!'],
        ],
    ],

    'chapters' => [
        [
            'title'    => 'The Face',
            'subtitle' => ['ko' => '얼굴 클로즈업', 'en' => 'Up close'],
            'intro'    => [
                'ko' => '회색빛이 내려앉은 주둥이, 세상에서 제일 진지한 눈. 10년 동안 한 번도 질린 적 없는 얼굴을 가까이에서.',
                'en' => 'A muzzle touched with gray and the most serious eyes in the world. Ten years in, still the face we never get tired of.',
            ],
            'photos'   => [1, 19, 20, 24, 27, 32, 35, 36, 37],
        ],
        [
            'title'    => 'Slow Days',
            'subtitle' => ['ko' => '소파, 담요, 그리고 낮잠', 'en' => 'Sofas, blankets and naps'],
            'intro'    => [
                'ko' => '하루의 대부분은 담요 속에서. 느리게 흘러가는 오후가 누구보다 잘 어울린다.',
                'en' => 'Most of the day happens under a blanket. Slow afternoons suit Spencer better than anyone.',
            ],
            'photos'   => [15, 2, 6, 8, 12, 14, 16, 28, 29, 31, 34, 42],
        ],
        [
            'title'    => 'Favorite Spots',
            'subtitle' => ['ko' => '방석, 창가, 잔디', 'en' => 'Beds, windows and grass'],
            'intro'    => [
                'ko' => '햇볕 드는 잔디, 늘 앉는 초록 방석, 창밖을 구경하는 자리. Spencer만 아는 동네 지도.',
                'en' => 'Sunny grass, the usual green bed, a seat by the window. A map only Spencer knows.',
            ],
            'photos'   => [17, 7, 10, 18, 22, 26],
        ],
        [
            'title'    => 'Snack Time',
            'subtitle' => ['ko' => '간식 앞에서', 'en' => 'In front of treats'],
            'intro'    => [
                'ko' => '망고 한 조각이면 두 발로도 선다. 간식 앞에서만큼은 누구보다 부지런해지는 순간들.',
                'en' => 'One slice of mango is enough to stand on two feet. Nobody works harder when snacks are around.',
            ],
            'photos'   => [13, 3, 4, 38, 39, 40],
        ],
        [
            'title'    => 'In Good Hands',
            'subtitle' => ['ko' => '품에 안긴 순간', 'en' => 'In loving arms'],
            'intro'    => [
                'ko' => '배를 드러내고 안기는 건 믿는 사람 앞에서만. 가장 편안한 자리는 결국 사람의 품.',
                'en' => 'Belly up only for the people you trust. The comfiest place is always in someone\'s arms.',
            ],
            'photos'   => [5, 23, 25, 30, 33, 41, 43, 44, 45, 46],
        ],
    ],

    // 사진 번호 => 짧은 캡션
    'captions' => [
        1  => ['ko' => '세상에서 제일 진지한 눈빛', 'en' => 'The most serious eyes in the world'],
        2  => ['ko' => '리클라이너는 원래 내 자리', 'en' => 'The recliner was always mine'],
        3  => ['ko' => '일단 한 번 맛보고', 'en' => 'A little taste first'],
        4  => ['ko' => '두 발로 서면 더 잘 보이죠?', 'en' => 'Standing up so you can see me better'],
        5  => ['ko' => '바로 거기, 턱 밑', 'en' => 'Right there, under the chin'],
        6  => ['ko' => '오늘은 등으로 인사할게', 'en' => 'Saying hello with my back today'],
        7  => ['ko' => '껌 씹는 중, 방해 금지', 'en' => 'Busy chewing. Do not disturb'],
        8  => ['ko' => '바닥이 제일 시원해', 'en' => 'The floor is the coolest spot'],
        9  => ['ko' => '내 이름이 적힌 10살 케이크', 'en' => 'A cake for ten, with my name on it'],
        10 => ['ko' => '불렀어?', 'en' => 'Did you call me?'],
        11 => ['ko' => '생일 컵케이크는 핥아야 제맛', 'en' => 'Birthday cupcakes are for licking'],
        12 => ['ko' => '한국어 공부는 너무 졸려', 'en' => 'Korean lessons make me sleepy'],
        13 => ['ko' => '그 스파게티, 나도 조금만', 'en' => 'About that spaghetti… just a little?'],
        14 => ['ko' => '담요 속이 제일 따뜻해', 'en' => 'The warmest place is under the blanket'],
        15 => ['ko' => '앞발 모으고 꿀잠', 'en' => 'Paws tucked, deep asleep'],
        16 => ['ko' => '동글동글한 뒷모습', 'en' => 'A round little back'],
        17 => ['ko' => '햇볕 충전 중', 'en' => 'Recharging in the sun'],
        18 => ['ko' => '동그랗게 말면 완성', 'en' => 'Curled up just right'],
        19 => ['ko' => '빼꼼, 나 여기 있어', 'en' => 'Peekaboo, still here'],
        20 => ['ko' => '어깨 너머로 돌아보기', 'en' => 'A look over the shoulder'],
        21 => ['ko' => '오늘의 표지 모델', 'en' => "Today's cover star"],
        22 => ['ko' => '가족사진 구경 중', 'en' => 'Looking at the family photos'],
        23 => ['ko' => '저녁 바람 맞으며 배 보이기', 'en' => 'Evening breeze, belly up'],
        24 => ['ko' => '턱 괴고 생각 중', 'en' => 'Chin down, deep in thought'],
        25 => ['ko' => '산책 다녀와서 한숨 돌리기', 'en' => 'Resting after a walk'],
        26 => ['ko' => '창밖 동네 감시 중', 'en' => 'Keeping an eye on the neighborhood'],
        27 => ['ko' => '귀 만져주는 손이 좋아', 'en' => 'Love the hand that rubs my ears'],
        28 => ['ko' => '소파에서 오후 낮잠', 'en' => 'An afternoon nap on the sofa'],
        29 => ['ko' => '대자로 뻗어 자기', 'en' => 'Stretched out, fast asleep'],
        30 => ['ko' => '같이 누워 있는 시간', 'en' => 'Lying down together'],
        31 => ['ko' => '하아암, 벌써 졸려', 'en' => 'Big yawn, sleepy already'],
        32 => ['ko' => '따뜻한 빛 속 눈맞춤', 'en' => 'Eye contact in warm light'],
        33 => ['ko' => '거꾸로 봐도 귀여움', 'en' => 'Cute even upside down'],
        34 => ['ko' => '게임하는 옆에서 쿨쿨', 'en' => 'Napping through game time'],
        35 => ['ko' => '눈만 들어 올려다보기', 'en' => 'Just the eyes, looking up'],
        36 => ['ko' => '옆모습도 멋있게', 'en' => 'A good side profile'],
        37 => ['ko' => '이제 나 좀 봐줘', 'en' => 'Now look at me'],
        38 => ['ko' => '망고 한 조각만요', 'en' => 'Just one mango slice, please'],
        39 => ['ko' => '드디어 망고!', 'en' => 'Mango, at last!'],
        40 => ['ko' => '손가락까지 싹싹', 'en' => 'Licking every last crumb'],
        41 => ['ko' => '무릎 사이가 내 자리', 'en' => 'My spot between the knees'],
        42 => ['ko' => '눈꺼풀이 점점 무거워', 'en' => 'Eyelids getting heavy'],
        43 => ['ko' => '든든한 품에 안겨서', 'en' => 'Safe in strong arms'],
        44 => ['ko' => '신나서 사진이 흔들렸어', 'en' => 'Too excited to hold still'],
        45 => ['ko' => '덧니 보이는 편안한 얼굴', 'en' => 'Relaxed, a little tooth showing'],
        46 => ['ko' => '고마움은 뽀뽀로', 'en' => 'Saying thanks with kisses'],
    ],
];
