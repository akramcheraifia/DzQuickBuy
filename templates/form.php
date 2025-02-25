<style>
    .dqb_instant_order_form {
        margin-bottom: 20px;
    }

    .dqb_checkout {
        background:
            <?php echo get_option('wcqof_product_summary_color', '#000000'); ?>
            !important;
        color:
            <?php echo get_option('wcqof_button_text_color', '#ffffff'); ?>
            !important;
    }

    /* Apply to both form and product summary */
    .delivery-section,
    .dqb_instant_order_form {
        border: 2px solid
            <?php echo get_option('wcqof_form_border_color', '#dddddd'); ?>
            !important;
        padding: 15px;
        border-radius: 8px;
    }

    /* Apply to all borders inside the product summary */
    .dqb_order_summary table,
    .dqb_order_summary_head,
    .dqb_order_summary th,
    .dqb_order_summary td,
    .dqb_order_summary tr {
        border: 1px solid
            <?php echo get_option('wcqof_form_border_color', '#dddddd'); ?>
            !important;
        border-radius: 8px !important;
    }

    .dqb_instant_order_form input,
    .dqb_instant_order_form select {
        border: 1.5px solid
            <?php echo get_option('wcqof_form_border_color', '#dddddd'); ?>
            !important;
    }

    .dqb_sticky_footer .dqb_buy_now {
        background:
            <?php echo get_option('wcqof_product_summary_color', '#000000'); ?>
            !important;
        color:
            <?php echo get_option('wcqof_button_text_color', '#ffffff'); ?>
            !important;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-block;
        text-align: center;
    }

    .dqb_footer_icons i {
        color:
            <?php echo get_option('wcqof_product_summary_color', '#000000'); ?>
            !important;
        font-size: 30px;
        margin: 0 5px;
    }


    .delivery-price,
    .dqb_order_summary i,
    .dqb_order_summary span,
    .dqb_order_qty,
    .dqb_order_summary .total_price,
    .dqb_row_total_price td {
        color:
            <?php echo get_option('wcqof_product_summary_color', '#000000'); ?>
            !important;
    }

    .dqb_order_qty {
        background: none !important;
    }

    .delivery-option:hover {
        border-color:
            <?php echo get_option('wcqof_product_summary_color', '#000000'); ?>
            !important;
    }

    .delivery-option input[type="radio"] {
        border: 1px solid
            <?php echo get_option('wcqof_product_summary_color', '#000000'); ?>
            !important;
    }

    .dqb_checkout:hover {
        color:
            <?php echo get_option('wcqof_product_summary_color', '#000000'); ?>
            !important;
        background: #fff !important;
        border-color:
            <?php echo get_option('wcqof_product_summary_color', '#000000'); ?>
            !important;
    }

    .dqb_buy_now:hover {
        color:
            <?php echo get_option('wcqof_product_summary_color', '#000000'); ?>
            !important;
        background: #fff !important;
        border-color:
            <?php echo get_option('wcqof_product_summary_color', '#000000'); ?>
            !important;
    }
</style>



<form class="dqb_instant_order" id="dqb_instant_order">
    <div class="dqb_instant_order_form">
        <div id="dqb_message_box" class="dqb_hidden"></div>
        <p class="dqb_notice hidden">قم بإدخال المعلومات ثم إرسال الطلب</p>
        <p class="dqb_information_title">
            <?php echo get_option('wcqof_name_info_title', 'يمكنكم القيام بطلب عبر النموذج التالي أو الإتصال بنا على الرقم 0123456789'); ?>

        </p>
        <input type="text" name="dqb_name" id="dqb_name"
            placeholder="<?php echo get_option('wcqof_name_placeholder', '👦🏻 الاسم الكامل'); ?>" required=""
            maxlength="30" />
        <input type="tel" name="dqb_phone" id="dqb_phone" pattern="[0-9]+"
            placeholder="<?php echo get_option('wcqof_phone_placeholder', 'رقم الهاتف 📞'); ?>" required=""
            maxlength="14" />
        <select name="dqb_state" id="dqb_state" class="dqb_select"
            placeholder="<?php echo get_option('wcqof_state_placeholder', '🏠 الولاية / المنطقة'); ?>" required="">

            <option value=""><?php echo get_option('wcqof_state_placeholder', '🏠 الولاية / المنطقة'); ?></option>
            <option value="Adrar-01">01 Adrar - أدرار</option>
            <option value="Chlef-02">02 Chlef - الشلف</option>
            <option value="Laghouat-03">03 Laghouat - الأغواط</option>
            <option value="Oum El Bouaghi-04">04 Oum El Bouaghi - أم البواقي</option>
            <option value="Batna-05">05 Batna - باتنة</option>
            <option value="Béjaïa-06">06 Béjaïa - بجاية</option>
            <option value="Biskra-07">07 Biskra - بسكرة</option>
            <option value="Bechar-08">08 Bechar - بشار</option>
            <option value="Blida-09">09 Blida - البليدة</option>
            <option value="Bouira-10">10 Bouira - البويرة</option>
            <option value="Tamanrasset-11">11 Tamanrasset - تمنراست</option>
            <option value="Tébessa-12">12 Tébessa - تبسة</option>
            <option value="Tlemcen-13">13 Tlemcen - تلمسان</option>
            <option value="Tiaret-14">14 Tiaret - تيارت</option>
            <option value="Tizi Ouzou-15">15 Tizi Ouzou - تيزي وزو</option>
            <option value="Alger-16">16 Alger - الجزائر</option>
            <option value="Djelfa-17">17 Djelfa - الجلفة</option>
            <option value="Jijel-18">18 Jijel - جيجل</option>
            <option value="Sétif-19">19 Sétif - سطيف</option>
            <option value="Saïda-20">20 Saïda - سعيدة</option>
            <option value="Skikda-21">21 Skikda - سكيكدة</option>
            <option value="Sidi Bel Abbès-22">22 Sidi Bel Abbès - سيدي بلعباس</option>
            <option value="Annaba-23">23 Annaba - عنابة</option>
            <option value="Guelma-24">24 Guelma - قالمة</option>
            <option value="Constantine-25">25 Constantine - قسنطينة</option>
            <option value="Médéa-26">26 Médéa - المدية</option>
            <option value="Mostaganem-27">27 Mostaganem - مستغانم</option>
            <option value="MSila-28">28 MSila - مسيلة</option>
            <option value="Mascara-29">29 Mascara - معسكر</option>
            <option value="Ouargla-30">30 Ouargla - ورقلة</option>
            <option value="Oran-31">31 Oran - وهران</option>
            <option value="El Bayadh-32">32 El Bayadh - البيض</option>
            <option value="Illizi-33">33 Illizi - إليزي</option>
            <option value="Bordj Bou Arreridj-34">34 Bordj Bou Arreridj - برج بوعريريج</option>
            <option value="Boumerdès-35">35 Boumerdès - بومرداس</option>
            <option value="El Tarf-36">36 El Tarf - الطارف</option>
            <option value="Tindouf-37">37 Tindouf - تندوف</option>
            <option value="Tissemsilt-38">38 Tissemsilt - تيسمسيلت</option>
            <option value="El Oued-39">39 El Oued - الوادي</option>
            <option value="Khenchela-40">40 Khenchela - خنشلة</option>
            <option value="Souk Ahras-41">41 Souk Ahras - سوق أهراس</option>
            <option value="Tipaza-42">42 Tipaza - تيبازة</option>
            <option value="Mila-43">43 Mila - ميلة</option>
            <option value="Aïn Defla-44">44 Aïn Defla - عين الدفلى</option>
            <option value="Naâma-45">45 Naâma - النعامة</option>
            <option value="Aïn Témouchent-46">46 Aïn Témouchent - عين تموشنت</option>
            <option value="Ghardaïa-47">47 Ghardaïa - غرداية</option>
            <option value="Relizane-48">48 Relizane - غليزان</option>
            <option value="Timimoun-49">49 Timimoun - تيميمون</option>
            <option value="Bordj Baji Mokhtar-50">50 Bordj Baji Mokhtar - برج باجي مختار</option>
            <option value="Ouled Djellal-51">51 Ouled Djellal - أولاد جلال</option>
            <option value="Béni Abbès-52">52 Béni Abbès - بني عباس</option>
            <option value="Aïn Salah-53">53 Aïn Salah - عين صالح</option>
            <option value="In Guezzam-54">54 In Guezzam - عين قزام</option>
            <option value="Touggourt-55">55 Touggourt - تقرت</option>
            <option value="Djanet-56">56 Djanet - جانت</option>
            <option value="El Mghair-57">57 El Mghair - المغير</option>
            <option value="El Menia-58">58 El Menia - المنيعة</option>

        </select>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                var cities = {
                    "Adrar-01": [
                        "Adrar",
                        "Tamest",
                        "Charouine",
                        "Reggane",
                        "Inozghmir",
                        "Tit",
                        "Ksar Kaddour",
                        "Tsabit",
                        "Timimoun",
                        "Ouled Said",
                        "Zaouiet Kounta",
                        "Aoulef",
                        "Timokten",
                        "Tamentit",
                        "Fenoughil",
                        "Tinerkouk",
                        "Deldoul",
                        "Sali",
                        "Akabli",
                        "Metarfa",
                        "O Ahmed Timmi",
                        "Bouda",
                        "Aougrout",
                        "Talmine",
                        "B Badji Mokhtar",
                        "Sbaa",
                        "Ouled Aissa",
                        "Timiaouine",
                    ],
                    "Chlef-02": [
                        "Chlef",
                        "Tenes",
                        "Benairia",
                        "El Karimia",
                        "Tadjna",
                        "Taougrite",
                        "Beni Haoua",
                        "Sobha",
                        "Harchoun",
                        "Ouled Fares",
                        "Sidi Akacha",
                        "Boukadir",
                        "Beni Rached",
                        "Talassa",
                        "Herenfa",
                        "Oued Goussine",
                        "Dahra",
                        "Ouled Abbes",
                        "Sendjas",
                        "Zeboudja",
                        "Oued Sly",
                        "Abou El Hassen",
                        "El Marsa",
                        "Chettia",
                        "Sidi Abderrahmane",
                        "Moussadek",
                        "El Hadjadj",
                        "Labiod Medjadja",
                        "Oued Fodda",
                        "Ouled Ben Abdelkader",
                        "Bouzghaia",
                        "Ain Merane",
                        "Oum Drou",
                        "Breira",
                        "Ben Boutaleb",
                    ],
                    "Laghouat-03": [
                        "Laghouat",
                        "Ksar El Hirane",
                        "Benacer Ben Chohra",
                        "Sidi Makhlouf",
                        "Hassi Delaa",
                        "Hassi R Mel",
                        "Ain Mahdi",
                        "Tadjmout",
                        "Kheneg",
                        "Gueltat Sidi Saad",
                        "Ain Sidi Ali",
                        "Beidha",
                        "Brida",
                        "El Ghicha",
                        "Hadj Mechri",
                        "Sebgag",
                        "Taouiala",
                        "Tadjrouna",
                        "Aflou",
                        "El Assafia",
                        "Oued Morra",
                        "Oued M Zi",
                        "El Haouaita",
                        "Sidi Bouzid",
                    ],
                    "Oum El Bouaghi-04": [
                        "Oum El Bouaghi",
                        "Ain Beida",
                        "Ainmlila",
                        "Behir Chergui",
                        "El Amiria",
                        "Sigus",
                        "El Belala",
                        "Ain Babouche",
                        "Berriche",
                        "Ouled Hamla",
                        "Dhala",
                        "Ain Kercha",
                        "Hanchir Toumghani",
                        "El Djazia",
                        "Ain Diss",
                        "Fkirina",
                        "Souk Naamane",
                        "Zorg",
                        "El Fedjoudj Boughrar",
                        "Ouled Zouai",
                        "Bir Chouhada",
                        "Ksar Sbahi",
                        "Oued Nini",
                        "Meskiana",
                        "Ain Fekroune",
                        "Rahia",
                        "Ain Zitoun",
                        "Ouled Gacem",
                        "El Harmilia",
                    ],
                    "Batna-05": [
                        "Batna",
                        "Ghassira",
                        "Maafa",
                        "Merouana",
                        "Seriana",
                        "Menaa",
                        "El Madher",
                        "Tazoult",
                        "Ngaous",
                        "Guigba",
                        "Inoughissen",
                        "Ouyoun El Assafir",
                        "Djerma",
                        "Bitam",
                        "Metkaouak",
                        "Arris",
                        "Kimmel",
                        "Tilatou",
                        "Ain Djasser",
                        "Ouled Selam",
                        "Tigherghar",
                        "Ain Yagout",
                        "Fesdis",
                        "Sefiane",
                        "Rahbat",
                        "Tighanimine",
                        "Lemsane",
                        "Ksar Belezma",
                        "Seggana",
                        "Ichmoul",
                        "Foum Toub",
                        "Beni Foudhala El Hakania",
                        "Oued El Ma",
                        "Talkhamt",
                        "Bouzina",
                        "Chemora",
                        "Oued Chaaba",
                        "Taxlent",
                        "Gosbat",
                        "Ouled Aouf",
                        "Boumagueur",
                        "Barika",
                        "Djezzar",
                        "Tkout",
                        "Ain Touta",
                        "Hidoussa",
                        "Teniet El Abed",
                        "Oued Taga",
                        "Ouled Fadel",
                        "Timgad",
                        "Ras El Aioun",
                        "Chir",
                        "Ouled Si Slimane",
                        "Zanat El Beida",
                        "Amdoukal",
                        "Ouled Ammar",
                        "El Hassi",
                        "Lazrou",
                        "Boumia",
                        "Boulhilat",
                        "Larbaa",
                    ],
                    "Béjaïa-06": [
                        "Bejaia",
                        "Amizour",
                        "Ferraoun",
                        "Taourirt Ighil",
                        "Chelata",
                        "Tamokra",
                        "Timzrit",
                        "Souk El Thenine",
                        "Mcisna",
                        "Thinabdher",
                        "Tichi",
                        "Semaoun",
                        "Kendira",
                        "Tifra",
                        "Ighram",
                        "Amalou",
                        "Ighil Ali",
                        "Ifelain Ilmathen",
                        "Toudja",
                        "Darguina",
                        "Sidi Ayad",
                        "Aokas",
                        "Beni Djellil",
                        "Adekar",
                        "Akbou",
                        "Seddouk",
                        "Tazmalt",
                        "Ait Rizine",
                        "Chemini",
                        "Souk Oufella",
                        "Taskriout",
                        "Tibane",
                        "Tala Hamza",
                        "Barbacha",
                        "Beni Ksila",
                        "Ouzallaguen",
                        "Bouhamza",
                        "Beni Melikeche",
                        "Sidi Aich",
                        "El Kseur",
                        "Melbou",
                        "Akfadou",
                        "Leflaye",
                        "Kherrata",
                        "Draa Kaid",
                        "Tamridjet",
                        "Ait Smail",
                        "Boukhelifa",
                        "Tizi Nberber",
                        "Beni Maouch",
                        "Oued Ghir",
                        "Boudjellil",
                    ],
                    "Biskra-07": [
                        "Biskra",
                        "Oumache",
                        "Branis",
                        "Chetma",
                        "Ouled Djellal",
                        "Ras El Miaad",
                        "Besbes",
                        "Sidi Khaled",
                        "Doucen",
                        "Ech Chaiba",
                        "Sidi Okba",
                        "Mchouneche",
                        "El Haouch",
                        "Ain Naga",
                        "Zeribet El Oued",
                        "El Feidh",
                        "El Kantara",
                        "Ain Zaatout",
                        "El Outaya",
                        "Djemorah",
                        "Tolga",
                        "Lioua",
                        "Lichana",
                        "Ourlal",
                        "Mlili",
                        "Foughala",
                        "Bordj Ben Azzouz",
                        "Meziraa",
                        "Bouchagroun",
                        "Mekhadma",
                        "El Ghrous",
                        "El Hadjab",
                        "Khanguet Sidinadji",
                    ],
                    "Bechar-08": [
                        "Bechar",
                        "Erg Ferradj",
                        "Ouled Khoudir",
                        "Meridja",
                        "Timoudi",
                        "Lahmar",
                        "Beni Abbes",
                        "Beni Ikhlef",
                        "Mechraa Houari B",
                        "Kenedsa",
                        "Igli",
                        "Tabalbala",
                        "Taghit",
                        "El Ouata",
                        "Boukais",
                        "Mogheul",
                        "Abadla",
                        "Kerzaz",
                        "Ksabi",
                        "Tamtert",
                        "Beni Ounif",
                    ],
                    "Blida-09": [
                        "Blida",
                        "Chebli",
                        "Bouinan",
                        "Oued El Alleug",
                        "Ouled Yaich",
                        "Chrea",
                        "El Affroun",
                        "Chiffa",
                        "Hammam Melouane",
                        "Ben Khlil",
                        "Soumaa",
                        "Mouzaia",
                        "Souhane",
                        "Meftah",
                        "Ouled Selama",
                        "Boufarik",
                        "Larbaa",
                        "Oued Djer",
                        "Beni Tamou",
                        "Bouarfa",
                        "Beni Mered",
                        "Bougara",
                        "Guerrouaou",
                        "Ain Romana",
                        "Djebabra",
                    ],
                    "Bouira-10": [
                        "Bouira",
                        "El Asnam",
                        "Guerrouma",
                        "Souk El Khemis",
                        "Kadiria",
                        "Hanif",
                        "Dirah",
                        "Ait Laaziz",
                        "Taghzout",
                        "Raouraoua",
                        "Mezdour",
                        "Haizer",
                        "Lakhdaria",
                        "Maala",
                        "El Hachimia",
                        "Aomar",
                        "Chorfa",
                        "Bordj Oukhriss",
                        "El Adjiba",
                        "El Hakimia",
                        "El Khebouzia",
                        "Ahl El Ksar",
                        "Bouderbala",
                        "Zbarbar",
                        "Ain El Hadjar",
                        "Djebahia",
                        "Aghbalou",
                        "Taguedit",
                        "Ain Turk",
                        "Saharidj",
                        "Dechmia",
                        "Ridane",
                        "Bechloul",
                        "Boukram",
                        "Ain Bessam",
                        "Bir Ghbalou",
                        "Mchedallah",
                        "Sour El Ghozlane",
                        "Maamora",
                        "Ouled Rached",
                        "Ain Laloui",
                        "Hadjera Zerga",
                        "Ath Mansour",
                        "El Mokrani",
                        "Oued El Berdi",
                    ],
                    "Tamanrasset-11": [
                        "Tamanghasset",
                        "Abalessa",
                        "In Ghar",
                        "In Guezzam",
                        "Idles",
                        "Tazouk",
                        "Tinzaouatine",
                        "In Salah",
                        "In Amguel",
                        "Foggaret Ezzaouia",
                    ],
                    "Tébessa-12": [
                        "Tebessa",
                        "Bir El Ater",
                        "Cheria",
                        "Stah Guentis",
                        "El Aouinet",
                        "Lahouidjbet",
                        "Safsaf El Ouesra",
                        "Hammamet",
                        "Negrine",
                        "Bir El Mokadem",
                        "El Kouif",
                        "Morsott",
                        "El Ogla",
                        "Bir Dheheb",
                        "El Ogla El Malha",
                        "Gorriguer",
                        "Bekkaria",
                        "Boukhadra",
                        "Ouenza",
                        "El Ma El Biodh",
                        "Oum Ali",
                        "Thlidjene",
                        "Ain Zerga",
                        "El Meridj",
                        "Boulhaf Dyr",
                        "Bedjene",
                        "El Mazeraa",
                        "Ferkane",
                    ],
                    "Tlemcen-13": [
                        "Tlemcen",
                        "Beni Mester",
                        "Ain Tallout",
                        "Remchi",
                        "El Fehoul",
                        "Sabra",
                        "Ghazaouet",
                        "Souani",
                        "Djebala",
                        "El Gor",
                        "Oued Chouly",
                        "Ain Fezza",
                        "Ouled Mimoun",
                        "Amieur",
                        "Ain Youcef",
                        "Zenata",
                        "Beni Snous",
                        "Bab El Assa",
                        "Dar Yaghmouracene",
                        "Fellaoucene",
                        "Azails",
                        "Sebbaa Chioukh",
                        "Terni Beni Hediel",
                        "Bensekrane",
                        "Ain Nehala",
                        "Hennaya",
                        "Maghnia",
                        "Hammam Boughrara",
                        "Souahlia",
                        "Msirda Fouaga",
                        "Ain Fetah",
                        "El Aricha",
                        "Souk Thlata",
                        "Sidi Abdelli",
                        "Sebdou",
                        "Beni Ouarsous",
                        "Sidi Medjahed",
                        "Beni Boussaid",
                        "Marsa Ben Mhidi",
                        "Nedroma",
                        "Sidi Djillali",
                        "Beni Bahdel",
                        "El Bouihi",
                        "Honaine",
                        "Tianet",
                        "Ouled Riyah",
                        "Bouhlou",
                        "Souk El Khemis",
                        "Ain Ghoraba",
                        "Chetouane",
                        "Mansourah",
                        "Beni Semiel",
                        "Ain Kebira",
                    ],
                    "Tiaret-14": [
                        "Tiaret",
                        "Medroussa",
                        "Ain Bouchekif",
                        "Sidi Ali Mellal",
                        "Ain Zarit",
                        "Ain Deheb",
                        "Sidi Bakhti",
                        "Medrissa",
                        "Zmalet El Emir Aek",
                        "Madna",
                        "Sebt",
                        "Mellakou",
                        "Dahmouni",
                        "Rahouia",
                        "Mahdia",
                        "Sougueur",
                        "Sidi Abdelghani",
                        "Ain El Hadid",
                        "Ouled Djerad",
                        "Naima",
                        "Meghila",
                        "Guertoufa",
                        "Sidi Hosni",
                        "Djillali Ben Amar",
                        "Sebaine",
                        "Tousnina",
                        "Frenda",
                        "Ain Kermes",
                        "Ksar Chellala",
                        "Rechaiga",
                        "Nadorah",
                        "Tagdemt",
                        "Oued Lilli",
                        "Mechraa Safa",
                        "Hamadia",
                        "Chehaima",
                        "Takhemaret",
                        "Sidi Abderrahmane",
                        "Serghine",
                        "Bougara",
                        "Faidja",
                        "Tidda",
                    ],
                    "Tizi Ouzou-15": [
                        "Tizi Ouzou",
                        "Ain El Hammam",
                        "Akbil",
                        "Freha",
                        "Souamaa",
                        "Mechtrass",
                        "Irdjen",
                        "Timizart",
                        "Makouda",
                        "Draa El Mizan",
                        "Tizi Ghenif",
                        "Bounouh",
                        "Ait Chaffaa",
                        "Frikat",
                        "Beni Aissi",
                        "Beni Zmenzer",
                        "Iferhounene",
                        "Azazga",
                        "Iloula Oumalou",
                        "Yakouren",
                        "Larba Nait Irathen",
                        "Tizi Rached",
                        "Zekri",
                        "Ouaguenoun",
                        "Ain Zaouia",
                        "Mkira",
                        "Ait Yahia",
                        "Ait Mahmoud",
                        "Maatka",
                        "Ait Boumehdi",
                        "Abi Youcef",
                        "Beni Douala",
                        "Illilten",
                        "Bouzguen",
                        "Ait Aggouacha",
                        "Ouadhia",
                        "Azzefoun",
                        "Tigzirt",
                        "Ait Aissa Mimoun",
                        "Boghni",
                        "Ifigha",
                        "Ait Oumalou",
                        "Tirmitine",
                        "Akerrou",
                        "Yatafen",
                        "Beni Ziki",
                        "Draa Ben Khedda",
                        "Ouacif",
                        "Idjeur",
                        "Mekla",
                        "Tizi Nthlata",
                        "Beni Yenni",
                        "Aghrib",
                        "Iflissen",
                        "Boudjima",
                        "Ait Yahia Moussa",
                        "Souk El Thenine",
                        "Ait Khelil",
                        "Sidi Naamane",
                        "Iboudraren",
                        "Aghni Goughran",
                        "Mizrana",
                        "Imsouhal",
                        "Tadmait",
                        "Ait Bouadou",
                        "Assi Youcef",
                        "Ait Toudert",
                    ],
                    "Alger-16": [
                        "Alger Centre",
                        "Sidi Mhamed",
                        "El Madania",
                        "Hamma Anassers",
                        "Bab El Oued",
                        "Bologhine Ibn Ziri",
                        "Casbah",
                        "Oued Koriche",
                        "Bir Mourad Rais",
                        "El Biar",
                        "Bouzareah",
                        "Birkhadem",
                        "El Harrach",
                        "Baraki",
                        "Oued Smar",
                        "Bourouba",
                        "Hussein Dey",
                        "Kouba",
                        "Bachedjerah",
                        "Dar El Beida",
                        "Bab Azzouar",
                        "Ben Aknoun",
                        "Dely Ibrahim",
                        "Bains Romains",
                        "Rais Hamidou",
                        "Djasr Kasentina",
                        "El Mouradia",
                        "Hydra",
                        "Mohammadia",
                        "Bordj El Kiffan",
                        "El Magharia",
                        "Beni Messous",
                        "Les Eucalyptus",
                        "Birtouta",
                        "Tassala El Merdja",
                        "Ouled Chebel",
                        "Sidi Moussa",
                        "Ain Taya",
                        "Bordj El Bahri",
                        "Marsa",
                        "Haraoua",
                        "Rouiba",
                        "Reghaia",
                        "Ain Benian",
                        "Staoueli",
                        "Zeralda",
                        "Mahelma",
                        "Rahmania",
                        "Souidania",
                        "Cheraga",
                        "Ouled Fayet",
                        "El Achour",
                        "Draria",
                        "Douera",
                        "Baba Hassen",
                        "Khracia",
                        "Saoula",
                    ],
                    "Djelfa-17": [
                        "Djelfa",
                        "Moudjebara",
                        "El Guedid",
                        "Hassi Bahbah",
                        "Ain Maabed",
                        "Sed Rahal",
                        "Feidh El Botma",
                        "Birine",
                        "Bouira Lahdeb",
                        "Zaccar",
                        "El Khemis",
                        "Sidi Baizid",
                        "Mliliha",
                        "El Idrissia",
                        "Douis",
                        "Hassi El Euch",
                        "Messaad",
                        "Guettara",
                        "Sidi Ladjel",
                        "Had Sahary",
                        "Guernini",
                        "Selmana",
                        "Ain Chouhada",
                        "Oum Laadham",
                        "Dar Chouikh",
                        "Charef",
                        "Beni Yacoub",
                        "Zaafrane",
                        "Deldoul",
                        "Ain El Ibel",
                        "Ain Oussera",
                        "Benhar",
                        "Hassi Fedoul",
                        "Amourah",
                        "Ain Fekka",
                        "Tadmit",
                    ],
                    "Jijel-18": [
                        "Jijel",
                        "Erraguene",
                        "El Aouana",
                        "Ziamma Mansouriah",
                        "Taher",
                        "Emir Abdelkader",
                        "Chekfa",
                        "Chahna",
                        "El Milia",
                        "Sidi Maarouf",
                        "Settara",
                        "El Ancer",
                        "Sidi Abdelaziz",
                        "Kaous",
                        "Ghebala",
                        "Bouraoui Belhadef",
                        "Djmila",
                        "Selma Benziada",
                        "Boussif Ouled Askeur",
                        "El Kennar Nouchfi",
                        "Ouled Yahia Khadrouch",
                        "Boudria Beni Yadjis",
                        "Kemir Oued Adjoul",
                        "Texena",
                        "Djemaa Beni Habibi",
                        "Bordj Taher",
                        "Ouled Rabah",
                        "Ouadjana",
                    ],
                    "Sétif-19": [
                        "Setif",
                        "Ain El Kebira",
                        "Beni Aziz",
                        "Ouled Sidi Ahmed",
                        "Boutaleb",
                        "Ain Roua",
                        "Draa Kebila",
                        "Bir El Arch",
                        "Beni Chebana",
                        "Ouled Tebben",
                        "Hamma",
                        "Maaouia",
                        "Ain Legraj",
                        "Ain Abessa",
                        "Dehamcha",
                        "Babor",
                        "Guidjel",
                        "Ain Lahdjar",
                        "Bousselam",
                        "El Eulma",
                        "Djemila",
                        "Beni Ouartilane",
                        "Rosfa",
                        "Ouled Addouane",
                        "Belaa",
                        "Ain Arnat",
                        "Amoucha",
                        "Ain Oulmane",
                        "Beidha Bordj",
                        "Bouandas",
                        "Bazer Sakhra",
                        "Hammam Essokhna",
                        "Mezloug",
                        "Bir Haddada",
                        "Serdj El Ghoul",
                        "Harbil",
                        "El Ouricia",
                        "Tizi Nbechar",
                        "Salah Bey",
                        "Ain Azal",
                        "Guenzet",
                        "Talaifacene",
                        "Bougaa",
                        "Beni Fouda",
                        "Tachouda",
                        "Beni Mouhli",
                        "Ouled Sabor",
                        "Guellal",
                        "Ain Sebt",
                        "Hammam Guergour",
                        "Ait Naoual Mezada",
                        "Ksar El Abtal",
                        "Beni Hocine",
                        "Ait Tizi",
                        "Maouklane",
                        "Guelta Zerka",
                        "Oued El Barad",
                        "Taya",
                        "El Ouldja",
                        "Tella",
                    ],
                    "Saïda-20": [
                        "Saida",
                        "Doui Thabet",
                        "Ain El Hadjar",
                        "Ouled Khaled",
                        "Moulay Larbi",
                        "Youb",
                        "Hounet",
                        "Sidi Amar",
                        "Sidi Boubekeur",
                        "El Hassasna",
                        "Maamora",
                        "Sidi Ahmed",
                        "Ain Sekhouna",
                        "Ouled Brahim",
                        "Tircine",
                        "Ain Soltane",
                    ],
                    "Skikda-21": [
                        "Skikda",
                        "Ain Zouit",
                        "El Hadaik",
                        "Azzaba",
                        "Djendel Saadi Mohamed",
                        "Ain Cherchar",
                        "Bekkouche Lakhdar",
                        "Benazouz",
                        "Es Sebt",
                        "Collo",
                        "Beni Zid",
                        "Kerkera",
                        "Ouled Attia",
                        "Oued Zehour",
                        "Zitouna",
                        "El Harrouch",
                        "Zerdazas",
                        "Ouled Hebaba",
                        "Sidi Mezghiche",
                        "Emdjez Edchich",
                        "Beni Oulbane",
                        "Ain Bouziane",
                        "Ramdane Djamel",
                        "Beni Bachir",
                        "Salah Bouchaour",
                        "Tamalous",
                        "Ain Kechra",
                        "Oum Toub",
                        "Bein El Ouiden",
                        "Fil Fila",
                        "Cheraia",
                        "Kanoua",
                        "El Ghedir",
                        "Bouchtata",
                        "Ouldja Boulbalout",
                        "Kheneg Mayoum",
                        "Hamadi Krouma",
                        "El Marsa",
                    ],
                    "Sidi Bel Abbès-22": [
                        "Sidi Bel Abbes",
                        "Tessala",
                        "Sidi Brahim",
                        "Mostefa Ben Brahim",
                        "Telagh",
                        "Mezaourou",
                        "Boukhanafis",
                        "Sidi Ali Boussidi",
                        "Badredine El Mokrani",
                        "Marhoum",
                        "Tafissour",
                        "Amarnas",
                        "Tilmouni",
                        "Sidi Lahcene",
                        "Ain Thrid",
                        "Makedra",
                        "Tenira",
                        "Moulay Slissen",
                        "El Hacaiba",
                        "Hassi Zehana",
                        "Tabia",
                        "Merine",
                        "Ras El Ma",
                        "Ain Tindamine",
                        "Ain Kada",
                        "Mcid",
                        "Sidi Khaled",
                        "Ain El Berd",
                        "Sfissef",
                        "Ain Adden",
                        "Oued Taourira",
                        "Dhaya",
                        "Zerouala",
                        "Lamtar",
                        "Sidi Chaib",
                        "Sidi Dahou Dezairs",
                        "Oued Sbaa",
                        "Boudjebaa El Bordj",
                        "Sehala Thaoura",
                        "Sidi Yacoub",
                        "Sidi Hamadouche",
                        "Belarbi",
                        "Oued Sefioun",
                        "Teghalimet",
                        "Ben Badis",
                        "Sidi Ali Benyoub",
                        "Chetouane Belaila",
                        "Bir El Hammam",
                        "Taoudmout",
                        "Redjem Demouche",
                        "Benachiba Chelia",
                        "Hassi Dahou",
                    ],
                    "Annaba-23": [
                        "Annaba",
                        "Berrahel",
                        "El Hadjar",
                        "Eulma",
                        "El Bouni",
                        "Oued El Aneb",
                        "Cheurfa",
                        "Seraidi",
                        "Ain Berda",
                        "Chetaibi",
                        "Sidi Amer",
                        "Treat",
                    ],
                    "Guelma-24": [
                        "Guelma",
                        "Nechmaya",
                        "Bouati Mahmoud",
                        "Oued Zenati",
                        "Tamlouka",
                        "Oued Fragha",
                        "Ain Sandel",
                        "Ras El Agba",
                        "Dahouara",
                        "Belkhir",
                        "Ben Djarah",
                        "Bou Hamdane",
                        "Ain Makhlouf",
                        "Ain Ben Beida",
                        "Khezara",
                        "Beni Mezline",
                        "Bou Hachana",
                        "Guelaat Bou Sbaa",
                        "Hammam Maskhoutine",
                        "El Fedjoudj",
                        "Bordj Sabat",
                        "Hamman Nbail",
                        "Ain Larbi",
                        "Medjez Amar",
                        "Bouchegouf",
                        "Heliopolis",
                        "Ain Hessania",
                        "Roknia",
                        "Salaoua Announa",
                        "Medjez Sfa",
                        "Boumahra Ahmed",
                        "Ain Reggada",
                        "Oued Cheham",
                        "Djeballah Khemissi",
                    ],
                    "Constantine-25": [
                        "Constantine",
                        "Hamma Bouziane",
                        "El Haria",
                        "Zighoud Youcef",
                        "Didouche Mourad",
                        "El Khroub",
                        "Ain Abid",
                        "Beni Hamiden",
                        "Ouled Rahmoune",
                        "Ain Smara",
                        "Mesaoud Boudjeriou",
                        "Ibn Ziad",
                    ],
                    "Médéa-26": [
                        "Medea",
                        "Ouzera",
                        "Ouled Maaref",
                        "Ain Boucif",
                        "Aissaouia",
                        "Ouled Deide",
                        "El Omaria",
                        "Derrag",
                        "El Guelbelkebir",
                        "Bouaiche",
                        "Mezerena",
                        "Ouled Brahim",
                        "Damiat",
                        "Sidi Ziane",
                        "Tamesguida",
                        "El Hamdania",
                        "Kef Lakhdar",
                        "Chelalet El Adhaoura",
                        "Bouskene",
                        "Rebaia",
                        "Bouchrahil",
                        "Ouled Hellal",
                        "Tafraout",
                        "Baata",
                        "Boghar",
                        "Sidi Naamane",
                        "Ouled Bouachra",
                        "Sidi Zahar",
                        "Oued Harbil",
                        "Benchicao",
                        "Sidi Damed",
                        "Aziz",
                        "Souagui",
                        "Zoubiria",
                        "Ksar El Boukhari",
                        "El Azizia",
                        "Djouab",
                        "Chahbounia",
                        "Meghraoua",
                        "Cheniguel",
                        "Ain Ouksir",
                        "Oum El Djalil",
                        "Ouamri",
                        "Si Mahdjoub",
                        "Tlatet Eddoair",
                        "Beni Slimane",
                        "Berrouaghia",
                        "Seghouane",
                        "Meftaha",
                        "Mihoub",
                        "Boughezoul",
                        "Tablat",
                        "Deux Bassins",
                        "Draa Essamar",
                        "Sidi Errabia",
                        "Bir Ben Laabed",
                        "El Ouinet",
                        "Ouled Antar",
                        "Bouaichoune",
                        "Hannacha",
                        "Sedraia",
                        "Medjebar",
                        "Khams Djouamaa",
                        "Saneg",
                    ],
                    "Mostaganem-27": [
                        "Mostaganem",
                        "Sayada",
                        "Fornaka",
                        "Stidia",
                        "Ain Nouissy",
                        "Hassi Maameche",
                        "Ain Tadles",
                        "Sour",
                        "Oued El Kheir",
                        "Sidi Bellater",
                        "Kheiredine ",
                        "Sidi Ali",
                        "Abdelmalek Ramdane",
                        "Hadjadj",
                        "Nekmaria",
                        "Sidi Lakhdar",
                        "Achaacha",
                        "Khadra",
                        "Bouguirat",
                        "Sirat",
                        "Ain Sidi Cherif",
                        "Mesra",
                        "Mansourah",
                        "Souaflia",
                        "Ouled Boughalem",
                        "Ouled Maallah",
                        "Mezghrane",
                        "Ain Boudinar",
                        "Tazgait",
                        "Safsaf",
                        "Touahria",
                        "El Hassiane",
                    ],
                    "MSila-28": [
                        "Msila",
                        "Maadid",
                        "Hammam Dhalaa",
                        "Ouled Derradj",
                        "Tarmount",
                        "Mtarfa",
                        "Khoubana",
                        "Mcif",
                        "Chellal",
                        "Ouled Madhi",
                        "Magra",
                        "Berhoum",
                        "Ain Khadra",
                        "Ouled Addi Guebala",
                        "Belaiba",
                        "Sidi Aissa",
                        "Ain El Hadjel",
                        "Sidi Hadjeres",
                        "Ouanougha",
                        "Bou Saada",
                        "Ouled Sidi Brahim",
                        "Sidi Ameur",
                        "Tamsa",
                        "Ben Srour",
                        "Ouled Slimane",
                        "El Houamed",
                        "El Hamel",
                        "Ouled Mansour",
                        "Maarif",
                        "Dehahna",
                        "Bouti Sayah",
                        "Khettouti Sed Djir",
                        "Zarzour",
                        "Oued Chair",
                        "Benzouh",
                        "Bir Foda",
                        "Ain Fares",
                        "Sidi Mhamed",
                        "Ouled Atia",
                        "Souamaa",
                        "Ain El Melh",
                        "Medjedel",
                        "Slim",
                        "Ain Errich",
                        "Beni Ilmane",
                        "Oultene",
                        "Djebel Messaad",
                    ],
                    "Mascara-29": [
                        "Mascara",
                        "Bou Hanifia",
                        "Tizi",
                        "Hacine",
                        "Maoussa",
                        "Teghennif",
                        "El Hachem",
                        "Sidi Kada",
                        "Zelmata",
                        "Oued El Abtal",
                        "Ain Ferah",
                        "Ghriss",
                        "Froha",
                        "Matemore",
                        "Makdha",
                        "Sidi Boussaid",
                        "El Bordj",
                        "Ain Fekan",
                        "Benian",
                        "Khalouia",
                        "El Menaouer",
                        "Oued Taria",
                        "Aouf",
                        "Ain Fares",
                        "Ain Frass",
                        "Sig",
                        "Oggaz",
                        "Alaimia",
                        "El Gaada",
                        "Zahana",
                        "Mohammadia",
                        "Sidi Abdelmoumene",
                        "Ferraguig",
                        "El Ghomri",
                        "Sedjerara",
                        "Moctadouz",
                        "Bou Henni",
                        "Guettena",
                        "El Mamounia",
                        "El Keurt",
                        "Gharrous",
                        "Gherdjoum",
                        "Chorfa",
                        "Ras Ain Amirouche",
                        "Nesmot",
                        "Sidi Abdeldjebar",
                        "Sehailia",
                    ],
                    "Ouargla-30": [
                        "Ouargla",
                        "Ain Beida",
                        "Ngoussa",
                        "Hassi Messaoud",
                        "Rouissat",
                        "Balidat Ameur",
                        "Tebesbest",
                        "Nezla",
                        "Zaouia El Abidia",
                        "Sidi Slimane",
                        "Sidi Khouiled",
                        "Hassi Ben Abdellah",
                        "Touggourt",
                        "El Hadjira",
                        "Taibet",
                        "Tamacine",
                        "Benaceur",
                        "Mnaguer",
                        "Megarine",
                        "El Allia",
                        "El Borma",
                    ],
                    "Oran-31": [
                        "Oran",
                        "Gdyel",
                        "Bir El Djir",
                        "Hassi Bounif",
                        "Es Senia",
                        "Arzew",
                        "Bethioua",
                        "Marsat El Hadjadj",
                        "Ain Turk",
                        "El Ancar",
                        "Oued Tlelat",
                        "Tafraoui",
                        "Sidi Chami",
                        "Boufatis",
                        "Mers El Kebir",
                        "Bousfer",
                        "El Karma",
                        "El Braya",
                        "Hassi Ben Okba",
                        "Ben Freha",
                        "Hassi Mefsoukh",
                        "Sidi Ben Yabka",
                        "Messerghin",
                        "Boutlelis",
                        "Ain Kerma",
                        "Ain Biya",
                    ],
                    "El Bayadh-32": [
                        "El Bayadh",
                        "Rogassa",
                        "Stitten",
                        "Brezina",
                        "Ghassoul",
                        "Boualem",
                        "El Abiodh Sidi Cheikh",
                        "Ain El Orak",
                        "Arbaouat",
                        "Bougtoub",
                        "El Kheither",
                        "Kef El Ahmar",
                        "Boussemghoun",
                        "Chellala",
                        "Krakda",
                        "El Bnoud",
                        "Cheguig",
                        "Sidi Ameur",
                        "El Mehara",
                        "Tousmouline",
                        "Sidi Slimane",
                        "Sidi Tifour",
                    ],
                    "Illizi-33": [
                        "Illizi",
                        "Djanet",
                        "Debdeb",
                        "Bordj Omar Driss",
                        "Bordj El Haouasse",
                        "In Amenas",
                    ],
                    "Bordj Bou Arreridj-34": [
                        "Bordj Bou Arreridj",
                        "Ras El Oued",
                        "Bordj Zemoura",
                        "Mansoura",
                        "El Mhir",
                        "Ben Daoud",
                        "El Achir",
                        "Ain Taghrout",
                        "Bordj Ghdir",
                        "Sidi Embarek",
                        "El Hamadia",
                        "Belimour",
                        "Medjana",
                        "Teniet En Nasr",
                        "Djaafra",
                        "El Main",
                        "Ouled Brahem",
                        "Ouled Dahmane",
                        "Hasnaoua",
                        "Khelil",
                        "Taglait",
                        "Ksour",
                        "Ouled Sidi Brahim",
                        "Tafreg",
                        "Colla",
                        "Tixter",
                        "El Ach",
                        "El Anseur",
                        "Tesmart",
                        "Ain Tesra",
                        "Bir Kasdali",
                        "Ghilassa",
                        "Rabta",
                        "Haraza",
                    ],
                    "Boumerdès-35": [
                        "Boumerdes",
                        "Boudouaou",
                        "Afir",
                        "Bordj Menaiel",
                        "Baghlia",
                        "Sidi Daoud",
                        "Naciria",
                        "Djinet",
                        "Isser",
                        "Zemmouri",
                        "Si Mustapha",
                        "Tidjelabine",
                        "Chabet El Ameur",
                        "Thenia",
                        "Timezrit",
                        "Corso",
                        "Ouled Moussa",
                        "Larbatache",
                        "Bouzegza Keddara",
                        "Taourga",
                        "Ouled Aissa",
                        "Ben Choud",
                        "Dellys",
                        "Ammal",
                        "Beni Amrane",
                        "Souk El Had",
                        "Boudouaou El Bahri",
                        "Ouled Hedadj",
                        "Laghata",
                        "Hammedi",
                        "Khemis El Khechna",
                        "El Kharrouba",
                    ],
                    "El Tarf-36": [
                        "El Tarf",
                        "Bouhadjar",
                        "Ben Mhidi",
                        "Bougous",
                        "El Kala",
                        "Ain El Assel",
                        "El Aioun",
                        "Bouteldja",
                        "Souarekh",
                        "Berrihane",
                        "Lac Des Oiseaux",
                        "Chefia",
                        "Drean",
                        "Chihani",
                        "Chebaita Mokhtar",
                        "Besbes",
                        "Asfour",
                        "Echatt",
                        "Zerizer",
                        "Zitouna",
                        "Ain Kerma",
                        "Oued Zitoun",
                        "Hammam Beni Salah",
                        "Raml Souk",
                    ],
                    "Tindouf-37": ["Tindouf", "Oum El Assel"],
                    "Tissemsilt-38": [
                        "Tissemsilt",
                        "Bordj Bou Naama",
                        "Theniet El Had",
                        "Lazharia",
                        "Beni Chaib",
                        "Lardjem",
                        "Melaab",
                        "Sidi Lantri",
                        "Bordj El Emir Abdelkader",
                        "Layoune",
                        "Khemisti",
                        "Ouled Bessem",
                        "Ammari",
                        "Youssoufia",
                        "Sidi Boutouchent",
                        "Larbaa",
                        "Maasem",
                        "Sidi Abed",
                        "Tamalaht",
                        "Sidi Slimane",
                        "Boucaid",
                        "Beni Lahcene",
                    ],
                    "El Oued-39": [
                        "El Oued",
                        "Robbah",
                        "Oued El Alenda",
                        "Bayadha",
                        "Nakhla",
                        "Guemar",
                        "Kouinine",
                        "Reguiba",
                        "Hamraia",
                        "Taghzout",
                        "Debila",
                        "Hassani Abdelkrim",
                        "Hassi Khelifa",
                        "Taleb Larbi",
                        "Douar El Ma",
                        "Sidi Aoun",
                        "Trifaoui",
                        "Magrane",
                        "Beni Guecha",
                        "Ourmas",
                        "Still",
                        "Mrara",
                        "Sidi Khellil",
                        "Tendla",
                        "El Ogla",
                        "Mih Ouansa",
                        "El Mghair",
                        "Djamaa",
                        "Oum Touyour",
                        "Sidi Amrane",
                    ],
                    "Khenchela-40": [
                        "Khenchela",
                        "Mtoussa",
                        "Kais",
                        "Baghai",
                        "El Hamma",
                        "Ain Touila",
                        "Taouzianat",
                        "Bouhmama",
                        "El Oueldja",
                        "Remila",
                        "Cherchar",
                        "Djellal",
                        "Babar",
                        "Tamza",
                        "Ensigha",
                        "Ouled Rechache",
                        "El Mahmal",
                        "Msara",
                        "Yabous",
                        "Khirane",
                        "Chelia",
                    ],
                    "Souk Ahras-41": [
                        "Souk Ahras",
                        "Sedrata",
                        "Hanancha",
                        "Mechroha",
                        "Ouled Driss",
                        "Tiffech",
                        "Zaarouria",
                        "Taoura",
                        "Drea",
                        "Haddada",
                        "Khedara",
                        "Merahna",
                        "Ouled Moumen",
                        "Bir Bouhouche",
                        "Mdaourouche",
                        "Oum El Adhaim",
                        "Ain Zana",
                        "Ain Soltane",
                        "Quillen",
                        "Sidi Fredj",
                        "Safel El Ouiden",
                        "Ragouba",
                        "Khemissa",
                        "Oued Keberit",
                        "Terraguelt",
                        "Zouabi",
                    ],
                    "Tipaza-42": [
                        "Tipaza",
                        "Menaceur",
                        "Larhat",
                        "Douaouda",
                        "Bourkika",
                        "Khemisti",
                        "Aghabal",
                        "Hadjout",
                        "Sidi Amar",
                        "Gouraya",
                        "Nodor",
                        "Chaiba",
                        "Ain Tagourait",
                        "Cherchel",
                        "Damous",
                        "Meurad",
                        "Fouka",
                        "Bou Ismail",
                        "Ahmer El Ain",
                        "Bou Haroun",
                        "Sidi Ghiles",
                        "Messelmoun",
                        "Sidi Rached",
                        "Kolea",
                        "Attatba",
                        "Sidi Semiane",
                        "Beni Milleuk",
                        "Hadjerat Ennous",
                    ],
                    "Mila-43": [
                        "Mila",
                        "Ferdjioua",
                        "Chelghoum Laid",
                        "Oued Athmenia",
                        "Ain Mellouk",
                        "Telerghma",
                        "Oued Seguen",
                        "Tadjenanet",
                        "Benyahia Abderrahmane",
                        "Oued Endja",
                        "Ahmed Rachedi",
                        "Ouled Khalouf",
                        "Tiberguent",
                        "Bouhatem",
                        "Rouached",
                        "Tessala Lamatai",
                        "Grarem Gouga",
                        "Sidi Merouane",
                        "Tassadane Haddada",
                        "Derradji Bousselah",
                        "Minar Zarza",
                        "Amira Arras",
                        "Terrai Bainen",
                        "Hamala",
                        "Ain Tine",
                        "El Mechira",
                        "Sidi Khelifa",
                        "Zeghaia",
                        "Elayadi Barbes",
                        "Ain Beida Harriche",
                        "Yahia Beniguecha",
                        "Chigara",
                    ],
                    "Aïn Defla-44": [
                        "Ain Defla",
                        "Miliana",
                        "Boumedfaa",
                        "Khemis Miliana",
                        "Hammam Righa",
                        "Arib",
                        "Djelida",
                        "El Amra",
                        "Bourached",
                        "El Attaf",
                        "El Abadia",
                        "Djendel",
                        "Oued Chorfa",
                        "Ain Lechiakh",
                        "Oued Djemaa",
                        "Rouina",
                        "Zeddine",
                        "El Hassania",
                        "Bir Ouled Khelifa",
                        "Ain Soltane",
                        "Tarik Ibn Ziad",
                        "Bordj Emir Khaled",
                        "Ain Torki",
                        "Sidi Lakhdar",
                        "Ben Allal",
                        "Ain Benian",
                        "Hoceinia",
                        "Barbouche",
                        "Djemaa Ouled Chikh",
                        "Mekhatria",
                        "Bathia",
                        "Tachta Zegagha",
                        "Ain Bouyahia",
                        "El Maine",
                        "Tiberkanine",
                        "Belaas",
                    ],
                    "Naâma-45": [
                        "Naama",
                        "Mechria",
                        "Ain Sefra",
                        "Tiout",
                        "Sfissifa",
                        "Moghrar",
                        "Assela",
                        "Djeniane Bourzeg",
                        "Ain Ben Khelil",
                        "Makman Ben Amer",
                        "Kasdir",
                        "El Biod",
                    ],
                    "Aïn Témouchent-46": [
                        "Ain Temouchent",
                        "Chaabet El Ham",
                        "Ain Kihal",
                        "Hammam Bouhadjar",
                        "Bou Zedjar",
                        "Oued Berkeche",
                        "Aghlal",
                        "Terga",
                        "Ain El Arbaa",
                        "Tamzoura",
                        "Chentouf",
                        "Sidi Ben Adda",
                        "Aoubellil",
                        "El Malah",
                        "Sidi Boumediene",
                        "Oued Sabah",
                        "Ouled Boudjemaa",
                        "Ain Tolba",
                        "El Amria",
                        "Hassi El Ghella",
                        "Hassasna",
                        "Ouled Kihal",
                        "Beni Saf",
                        "Sidi Safi",
                        "Oulhaca El Gheraba",
                        "Tadmaya",
                        "El Emir Abdelkader",
                        "El Messaid",
                    ],
                    "Ghardaïa-47": [
                        "Ghardaia",
                        "El Meniaa",
                        "Dhayet Bendhahoua",
                        "Berriane",
                        "Metlili",
                        "El Guerrara",
                        "El Atteuf",
                        "Zelfana",
                        "Sebseb",
                        "Bounoura",
                        "Hassi Fehal",
                        "Hassi Gara",
                        "Mansoura",
                    ],
                    "Relizane-48": [
                        "Relizane",
                        "Oued Rhiou",
                        "Belaassel Bouzegza",
                        "Sidi Saada",
                        "Ouled Aiche",
                        "Sidi Lazreg",
                        "El Hamadna",
                        "Sidi Mhamed Ben Ali",
                        "Mediouna",
                        "Sidi Khettab",
                        "Ammi Moussa",
                        "Zemmoura",
                        "Beni Dergoun",
                        "Djidiouia",
                        "El Guettar",
                        "Hamri",
                        "El Matmar",
                        "Sidi Mhamed Ben Aouda",
                        "Ain Tarek",
                        "Oued Essalem",
                        "Ouarizane",
                        "Mazouna",
                        "Kalaa",
                        "Ain Rahma",
                        "Yellel",
                        "Oued El Djemaa",
                        "Ramka",
                        "Mendes",
                        "Lahlef",
                        "Beni Zentis",
                        "Souk El Haad",
                        "Dar Ben Abdellah",
                        "El Hassi",
                        "Had Echkalla",
                        "Bendaoud",
                        "El Ouldja",
                        "Merdja Sidi Abed",
                        "Ouled Sidi Mihoub",
                    ],
                    "Timimoun-49": [
                        "Timimoun",
                        "Charouine",
                        "Ksar Kaddour",
                        "Ouled Said",
                        "Tinerkouk",
                        "Deldoul",
                        "Metarfa",
                        "Aougrout",
                        "Talmine",
                        "Ouled Aissa",
                    ],
                    "Bordj Baji Mokhtar-50": ["B Badji Mokhtar", "Timiaouine"],
                    "Ouled Djellal-51": [
                        "Ouled Djellal",
                        "Sidi Khaled",
                        "Ras El Miad",
                        "Besbes",
                        "Chaiba",
                        "Doucen",
                    ],
                    "Béni Abbès-52": [
                        "Beni Abbes",
                        "Tamtert",
                        "Kerzaz",
                        "Timoudi",
                        "Beni Ikhlef",
                        "El Ouata",
                        "Tabelbala",
                        "Ouled Khoudir",
                        "Ksabi",
                        "Igli",
                    ],
                    "Aïn Salah-53": ["In Salah", "In Ghar", "Foggaret Azzaouia"],
                    "In Guezzam-54": ["In Guezzam", "Tinzaouatine"],
                    "Touggourt-55": [
                        "Touggourt",
                        "Nezla",
                        "Tebesbest",
                        "Zaouia El Abidia",
                        "Temacine",
                        "Blidet Amor",
                        "Megarine",
                        "Mnaguer",
                        "Taibet",
                        "Benaceur",
                        "Sidi Slimane",
                        "El-hadjira",
                        "El Alia",
                    ],
                    "Djanet-56": ["Djanet", "Bordj El Haouasse"],
                    "El MGhair-57": [
                        "El-mghair",
                        "Oum Touyour",
                        "Still",
                        "Sidi Khelil",
                        "Djamaa",
                        "Sidi Amrane",
                        "Tenedla",
                        "Mrara",
                    ],
                    "El Menia-58": ["El Meniaa", "Hassi Gara", "Hassi Fehal"],
                };
                var placeholder = "البلدية📍";
                var city_field_template =
                    '<select name="dqb_city" id="dqb_city" class="select " data-placeholder="' +
                    placeholder +
                    '" required="required"><option value="">' +
                    placeholder +
                    "</option>";

                function createCityField(options) {
                    return city_field_template + options + "</select>";
                }

                function updateCityField(states) {
                    var city_options = "";
                    $.each(cities[states], function (city_id, city_name) {
                        city_options +=
                            '<option value="' + city_name + '">' + city_name + "</option>";
                    });

                    // Remove the existing city field
                    $("#dqb_city").remove();

                    // Add the new city field to the form
                    var city_field =
                        city_options.length > 1
                            ? createCityField(city_options)
                            : createCityField("");
                    $("#dqb_state").after(city_field);
                }

                // Initial city field
                $("#dqb_state").after(createCityField(""));

                // Update city field on state change
                $("select#dqb_state").change(function () {
                    updateCityField($(this).val());
                });
            });
        </script>
        <div id="dqb_delivery_section" class="delivery-section">
            <h3>🚚 سعر التوصيل</h3>

            <label class="delivery-option">
                <input type="radio" name="dqb_delivery_type" value="home" required />
                <span class="delivery-text">🏠 توصيل إلى المنزل</span>
                <span class="delivery-price" id="home_delivery_price">د.ج 0</span>
            </label>

            <label class="delivery-option">
                <input type="radio" name="dqb_delivery_type" value="office" required />
                <span class="delivery-text">🏢 توصيل إلى المكتب</span>
                <span class="delivery-price" id="office_delivery_price">د.ج 0</span>
            </label>
        </div>
        <!-- 🟢 Color & Size Selection -->
        <ul class="dqb_variations modern_ui">
            <?php
            $product_id = get_the_ID();
            $product = wc_get_product($product_id);
            $attributes = $product->get_attributes();

            foreach ($attributes as $attribute_name => $attribute) {
                // ✅ Decode the attribute name to properly display Arabic characters
                $attribute_label = wc_attribute_label(rawurldecode($attribute_name));
                $attribute_label = mb_convert_encoding($attribute_label, 'UTF-8', 'auto');

                // ✅ Handle Global Attributes (Taxonomy-based attributes)
                if ($attribute->is_taxonomy()) {
                    $terms = wp_get_post_terms($product_id, $attribute->get_name());

                    if (!empty($terms)) {
                        echo '<li class="attribute_modern_ui"><h4>' . esc_html($attribute_label) . ' :</h4>';
                        foreach ($terms as $term) {
                            // ✅ Properly decode and escape Arabic terms
                            $term_name = esc_html(rawurldecode($term->name));
                            $term_slug = sanitize_title($term_name);

                            echo '<div class="attribute_inner">
                        <input type="radio" name="dqb_' . esc_attr($attribute_name) . '" value="' . esc_attr($term_name) . '" id="' . esc_attr($term_slug) . '" >
                        <label for="' . esc_attr($term_slug) . '">' . esc_html($term_name) . '</label>
                    </div>';
                        }
                        echo '</li>';
                    }
                }
                // ✅ Handle Custom Attributes (Local Attributes)
                else {
                    $custom_values = array_map('trim', explode('|', implode('|', $attribute->get_options())));

                    if (!empty($custom_values)) {
                        echo '<li class="attribute_modern_ui"><h4>' . esc_html($attribute_label) . ' :</h4>';
                        foreach ($custom_values as $custom_value) {
                            // ✅ Properly decode Arabic custom values
                            $custom_value_clean = sanitize_text_field(rawurldecode($custom_value));
                            $custom_value_slug = sanitize_title($custom_value_clean);

                            echo '<div class="attribute_inner">
                        <input type="radio" name="dqb_' . esc_attr($attribute_name) . '" value="' . esc_attr($custom_value_clean) . '" id="' . esc_attr($custom_value_slug) . '" >
                        <label for="' . esc_attr($custom_value_slug) . '">' . esc_html($custom_value_clean) . '</label>
                    </div>';
                        }
                        echo '</li>';
                    }
                }
            }
            ?>
        </ul>





        <input type="hidden" name="dqb_delivery_price" id="dqb_delivery_price" value="0" />

        <div class="dqb_placeholder"></div>
        <div class="dqb_quantity_container">
            <div class="dqb_quantity">
                <span class="dqb_minus"><i class="fa-solid fa-minus"></i></span>
                <input type="number" value="1" min="1" name="dqb_qty" id="dqb_qty" required="" readonly="" />
                <span class="dqb_plus"><i class="fa-solid fa-plus"></i></span>
            </div>
            <button type="submit" class="dqb_checkout" id="wcqof-place-order-btn">
                <span><?php echo get_option('wcqof_place_order_text', 'اطلب الان'); ?></span>
                <span class="dqb_btn_loader"></span>
            </button>
        </div>
        <!-- Order summary -->
    </div>
    <input type="hidden" name="product_id" value="<?php echo get_the_ID(); ?>">
    <div class="dqb_order_summary active">
        <div class="dqb_order_summary_head">
            <div class="dqb_order_summary_title">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>ملخص الطلب</span>
            </div>
            <i class="fa-solid fa-chevron-down woocommerce_toggle_icon"></i> <!-- Added a class to the icon -->
        </div>

        <div class="dqb_price_table">
            <div class="order_loader_container">
                <span class="dqb_order_loader"></span>
            </div>

            <table>
                <tbody>
                    <!-- Product Name -->
                    <tr>
                        <td class="product_name"><?php echo get_the_title(); ?></td>
                        <td class="product_price">
                            <span class="dqb_order_qty">x<span id="dqb_qty_display">1</span></span>
                            <span class="dqb_price"><?php echo wc_get_product(get_the_ID())->get_price(); ?>
                                <span id="dqb_product_price">د.ج </span>
                            </span>

                            <input type="hidden" id="dqb_price"
                                value="<?php echo wc_get_product(get_the_ID())->get_price(); ?>" />
                        </td>
                    </tr>

                    <!-- Shipping -->
                    <tr>
                        <td>سعر الشحن
                            <div class="dqb_shipping_prices">
                            </div>
                        </td>
                        <td class="shipping_price"><span id="dqb_shipping_price">0</span>د.ج </td>
                    </tr>
                    <!-- Total Price -->
                    <tr class="dqb_row_total_price">
                        <td>السعر الإجمالي</td>
                        <td class="total_price">
                            <span class="dqb_price"><span
                                    id="dqb_total_price"><?php echo wc_get_product(get_the_ID())->get_price(); ?></span>د.ج
                            </span>
                            <input type="hidden" id="dqb_total_price_input"
                                value="<?php echo wc_get_product(get_the_ID())->get_price(); ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" id="dqb_total_price_input" name="dqb_total_price"
        value="<?php echo wc_get_product(get_the_ID())->get_price(); ?>" />
</form>
<div class="dqb_sticky_footer">
    <a href="#dqb_instant_order" class="dqb_buy_now">اشتري الان</a>
    <div class="dqb_footer_icons">
        <a href="tel:<?php echo get_option('wcqof_phone_number', '+213561571407'); ?>" class="href">
            <i class="fa-solid fa-phone"></i>
        </a>
        <a target="_blank" href="https://wa.me/<?php echo get_option('wcqof_whatsapp_number', '+213561571407'); ?>"
            class="href">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>
</div>