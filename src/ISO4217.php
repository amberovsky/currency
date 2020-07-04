<?php declare(strict_types=1);
/**
 * Currency ISO 4217
 * @See https://en.wikipedia.org/wiki/ISO_4217 for details
 * 
 * Copyright (C) Anton Zagorskii
 */

namespace Amberovsky\Money\Currency;

use Amberovsky\Money\Currency\Exception\UnknownAlphaCodeCurrencyException;
use Amberovsky\Money\Currency\Exception\UnknownNumericCodeCurrencyException;

class ISO4217 {
    /** List of fields in the data array */
    public const
        KEY_DESCRIPTION = 0, // Currency description
        KEY_MINOR_UNITS = 1, // Minor units (exponent)
        KEY_ALPHA_CODE  = 2, // Alphabetic code
        KEY_SYMBOL      = 3; // Currency symbol

    /** List of all numeric codes */
    public const
        AFN = 971, // Afghani
        EUR = 978, // Euro
        ALL = 8,   // Lek
        DZD = 12,  // Algerian Dinar
        USD = 840, // US Dollar
        AOA = 973, // Kwanza
        XCD = 951, // East Caribbean Dollar
        ARS = 32,  // Argentine Peso
        AMD = 51,  // Armenian Dram
        AWG = 533, // Aruban Florin
        AUD = 36,  // Australian Dollar
        AZN = 944, // Azerbaijan Manat
        BSD = 44,  // Bahamian Dollar
        BHD = 48,  // Bahraini Dinar
        BDT = 50,  // Taka
        BBD = 52,  // Barbados Dollar
        BYN = 933, // Belarusian Ruble
        BZD = 84,  // Belize Dollar
        XOF = 952, // CFA Franc BCEAO
        BMD = 60,  // Bermudian Dollar
        INR = 356, // Indian Rupee
        BTN = 64,  // Ngultrum
        BOB = 68,  // Boliviano
        BOV = 984, // Mvdol
        BAM = 977, // Convertible Mark
        BWP = 72,  // Pula
        NOK = 578, // Norwegian Krone
        BRL = 986, // Brazilian Real
        BND = 96,  // Brunei Dollar
        BGN = 975, // Bulgarian Lev
        BIF = 108, // Burundi Franc
        CVE = 132, // Cabo Verde Escudo
        KHR = 116, // Riel
        XAF = 950, // CFA Franc BEAC
        CAD = 124, // Canadian Dollar
        KYD = 136, // Cayman Islands Dollar
        CLP = 152, // Chilean Peso
        CLF = 990, // Unidad de Fomento
        CNY = 156, // Yuan Renminbi
        COP = 170, // Colombian Peso
        COU = 970, // Unidad de Valor Real
        KMF = 174, // Comorian Franc
        CDF = 976, // Congolese Franc
        NZD = 554, // New Zealand Dollar
        CRC = 188, // Costa Rican Colon
        HRK = 191, // Kuna
        CUP = 192, // Cuban Peso
        CUC = 931, // Peso Convertible
        ANG = 532, // Netherlands Antillean Guilder
        CZK = 203, // Czech Koruna
        DKK = 208, // Danish Krone
        DJF = 262, // Djibouti Franc
        DOP = 214, // Dominican Peso
        EGP = 818, // Egyptian Pound
        SVC = 222, // El Salvador Colon
        ERN = 232, // Nakfa
        ETB = 230, // Ethiopian Birr
        FKP = 238, // Falkland Islands Pound
        FJD = 242, // Fiji Dollar
        XPF = 953, // CFP Franc
        GMD = 270, // Dalasi
        GEL = 981, // Lari
        GHS = 936, // Ghana Cedi
        GIP = 292, // Gibraltar Pound
        GTQ = 320, // Quetzal
        GBP = 826, // Pound Sterling
        GNF = 324, // Guinean Franc
        GYD = 328, // Guyana Dollar
        HTG = 332, // Gourde
        HNL = 340, // Lempira
        HKD = 344, // Hong Kong Dollar
        HUF = 348, // Forint
        ISK = 352, // Iceland Krona
        IDR = 360, // Rupiah
        XDR = 960, // SDR (Special Drawing Right)
        IRR = 364, // Iranian Rial
        IQD = 368, // Iraqi Dinar
        ILS = 376, // New Israeli Sheqel
        JMD = 388, // Jamaican Dollar
        JPY = 392, // Yen
        JOD = 400, // Jordanian Dinar
        KZT = 398, // Tenge
        KES = 404, // Kenyan Shilling
        KPW = 408, // North Korean Won
        KRW = 410, // Won
        KWD = 414, // Kuwaiti Dinar
        KGS = 417, // Som
        LAK = 418, // Lao Kip
        LBP = 422, // Lebanese Pound
        LSL = 426, // Loti
        ZAR = 710, // Rand
        LRD = 430, // Liberian Dollar
        LYD = 434, // Libyan Dinar
        CHF = 756, // Swiss Franc
        MOP = 446, // Pataca
        MKD = 807, // Denar
        MGA = 969, // Malagasy Ariary
        MWK = 454, // Malawi Kwacha
        MYR = 458, // Malaysian Ringgit
        MVR = 462, // Rufiyaa
        MRU = 929, // Ouguiya
        MUR = 480, // Mauritius Rupee
        XUA = 965, // ADB Unit of Account
        MXN = 484, // Mexican Peso
        MXV = 979, // Mexican Unidad de Inversion (UDI)
        MDL = 498, // Moldovan Leu
        MNT = 496, // Tugrik
        MAD = 504, // Moroccan Dirham
        MZN = 943, // Mozambique Metical
        MMK = 104, // Kyat
        NAD = 516, // Namibia Dollar
        NPR = 524, // Nepalese Rupee
        NIO = 558, // Cordoba Oro
        NGN = 566, // Naira
        OMR = 512, // Rial Omani
        PKR = 586, // Pakistan Rupee
        PAB = 590, // Balboa
        PGK = 598, // Kina
        PYG = 600, // Guarani
        PEN = 604, // Sol
        PHP = 608, // Philippine Peso
        PLN = 985, // Zloty
        QAR = 634, // Qatari Rial
        RON = 946, // Romanian Leu
        RUB = 643, // Russian Ruble
        RWF = 646, // Rwanda Franc
        SHP = 654, // Saint Helena Pound
        WST = 882, // Tala
        STN = 930, // Dobra
        SAR = 682, // Saudi Riyal
        RSD = 941, // Serbian Dinar
        SCR = 690, // Seychelles Rupee
        SLL = 694, // Leone
        SGD = 702, // Singapore Dollar
        XSU = 994, // Sucre
        SBD = 90, // Solomon Islands Dollar
        SOS = 706, // Somali Shilling
        SSP = 728, // South Sudanese Pound
        LKR = 144, // Sri Lanka Rupee
        SDG = 938, // Sudanese Pound
        SRD = 968, // Surinam Dollar
        SZL = 748, // Lilangeni
        SEK = 752, // Swedish Krona
        CHE = 947, // WIR Euro
        CHW = 948, // WIR Franc
        SYP = 760, // Syrian Pound
        TWD = 901, // New Taiwan Dollar
        TJS = 972, // Somoni
        TZS = 834, // Tanzanian Shilling
        THB = 764, // Baht
        TOP = 776, // Pa’anga
        TTD = 780, // Trinidad and Tobago Dollar
        TND = 788, // Tunisian Dinar
        TRY = 949, // Turkish Lira
        TMT = 934, // Turkmenistan New Manat
        UGX = 800, // Uganda Shilling
        UAH = 980, // Hryvnia
        AED = 784, // UAE Dirham
        USN = 997, // US Dollar (Next day)
        UYU = 858, // Peso Uruguayo
        UYI = 940, // Uruguay Peso en Unidades Indexadas (UI)
        UYW = 927, // Unidad Previsional
        UZS = 860, // Uzbekistan Sum
        VUV = 548, // Vatu
        VES = 928, // Bolívar Soberano
        VND = 704, // Dong
        YER = 886, // Yemeni Rial
        ZMW = 967, // Zambian Kwacha
        ZWL = 932, // Zimbabwe Dollar
        XBA = 955, // Bond Markets Unit European Composite Unit (EURCO)
        XBB = 956, // Bond Markets Unit European Monetary Unit (E.M.U.-6)
        XBC = 957, // Bond Markets Unit European Unit of Account 9 (E.U.A.-9)
        XBD = 958, // Bond Markets Unit European Unit of Account 17 (E.U.A.-17)
        XTS = 963, // Codes specifically reserved for testing purposes
        XXX = 999, // The codes assigned for transactions where no currency is involved
        XAU = 959, // Gold
        XPD = 964, // Palladium
        XPT = 962, // Platinum
        XAG = 961; // Silver

    /** @var int[]  */
    static private array $toNumericCodeMap = [
        'AED'   => self::AED, // (784) UAE Dirham
        'AFN'   => self::AFN, // (971) Afghani
        'ALL'   => self::ALL, // (8) Lek
        'AMD'   => self::AMD, // (51) Armenian Dram
        'ANG'   => self::ANG, // (532) Netherlands Antillean Guilder
        'AOA'   => self::AOA, // (973) Kwanza
        'ARS'   => self::ARS, // (32) Argentine Peso
        'AUD'   => self::AUD, // (36) Australian Dollar
        'AWG'   => self::AWG, // (533) Aruban Florin
        'AZN'   => self::AZN, // (944) Azerbaijan Manat
        'BAM'   => self::BAM, // (977) Convertible Mark
        'BBD'   => self::BBD, // (52) Barbados Dollar
        'BDT'   => self::BDT, // (50) Taka
        'BGN'   => self::BGN, // (975) Bulgarian Lev
        'BHD'   => self::BHD, // (48) Bahraini Dinar
        'BIF'   => self::BIF, // (108) Burundi Franc
        'BMD'   => self::BMD, // (60) Bermudian Dollar
        'BND'   => self::BND, // (96) Brunei Dollar
        'BOB'   => self::BOB, // (68) Boliviano
        'BOV'   => self::BOV, // (984) Mvdol
        'BRL'   => self::BRL, // (986) Brazilian Real
        'BSD'   => self::BSD, // (44) Bahamian Dollar
        'BTN'   => self::BTN, // (64) Ngultrum
        'BWP'   => self::BWP, // (72) Pula
        'BYN'   => self::BYN, // (933) Belarusian Ruble
        'BZD'   => self::BZD, // (84) Belize Dollar
        'CAD'   => self::CAD, // (124) Canadian Dollar
        'CDF'   => self::CDF, // (976) Congolese Franc
        'CHE'   => self::CHE, // (947) WIR Euro
        'CHF'   => self::CHF, // (756) Swiss Franc
        'CHW'   => self::CHW, // (948) WIR Franc
        'CLF'   => self::CLF, // (990) Unidad de Fomento
        'CLP'   => self::CLP, // (152) Chilean Peso
        'CNY'   => self::CNY, // (156) Yuan Renminbi
        'COP'   => self::COP, // (170) Colombian Peso
        'COU'   => self::COU, // (970) Unidad de Valor Real
        'CRC'   => self::CRC, // (188) Costa Rican Colon
        'CUC'   => self::CUC, // (931) Peso Convertible
        'CUP'   => self::CUP, // (192) Cuban Peso
        'CVE'   => self::CVE, // (132) Cabo Verde Escudo
        'CZK'   => self::CZK, // (203) Czech Koruna
        'DJF'   => self::DJF, // (262) Djibouti Franc
        'DKK'   => self::DKK, // (208) Danish Krone
        'DOP'   => self::DOP, // (214) Dominican Peso
        'DZD'   => self::DZD, // (12) Algerian Dinar
        'EGP'   => self::EGP, // (818) Egyptian Pound
        'ERN'   => self::ERN, // (232) Nakfa
        'ETB'   => self::ETB, // (230) Ethiopian Birr
        'EUR'   => self::EUR, // (978) Euro
        'FJD'   => self::FJD, // (242) Fiji Dollar
        'FKP'   => self::FKP, // (238) Falkland Islands Pound
        'GBP'   => self::GBP, // (826) Pound Sterling
        'GEL'   => self::GEL, // (981) Lari
        'GHS'   => self::GHS, // (936) Ghana Cedi
        'GIP'   => self::GIP, // (292) Gibraltar Pound
        'GMD'   => self::GMD, // (270) Dalasi
        'GNF'   => self::GNF, // (324) Guinean Franc
        'GTQ'   => self::GTQ, // (320) Quetzal
        'GYD'   => self::GYD, // (328) Guyana Dollar
        'HKD'   => self::HKD, // (344) Hong Kong Dollar
        'HNL'   => self::HNL, // (340) Lempira
        'HRK'   => self::HRK, // (191) Kuna
        'HTG'   => self::HTG, // (332) Gourde
        'HUF'   => self::HUF, // (348) Forint
        'IDR'   => self::IDR, // (360) Rupiah
        'ILS'   => self::ILS, // (376) New Israeli Sheqel
        'INR'   => self::INR, // (356) Indian Rupee
        'IQD'   => self::IQD, // (368) Iraqi Dinar
        'IRR'   => self::IRR, // (364) Iranian Rial
        'ISK'   => self::ISK, // (352) Iceland Krona
        'JMD'   => self::JMD, // (388) Jamaican Dollar
        'JOD'   => self::JOD, // (400) Jordanian Dinar
        'JPY'   => self::JPY, // (392) Yen
        'KES'   => self::KES, // (404) Kenyan Shilling
        'KGS'   => self::KGS, // (417) Som
        'KHR'   => self::KHR, // (116) Riel
        'KMF'   => self::KMF, // (174) Comorian Franc
        'KPW'   => self::KPW, // (408) North Korean Won
        'KRW'   => self::KRW, // (410) Won
        'KWD'   => self::KWD, // (414) Kuwaiti Dinar
        'KYD'   => self::KYD, // (136) Cayman Islands Dollar
        'KZT'   => self::KZT, // (398) Tenge
        'LAK'   => self::LAK, // (418) Lao Kip
        'LBP'   => self::LBP, // (422) Lebanese Pound
        'LKR'   => self::LKR, // (144) Sri Lanka Rupee
        'LRD'   => self::LRD, // (430) Liberian Dollar
        'LSL'   => self::LSL, // (426) Loti
        'LYD'   => self::LYD, // (434) Libyan Dinar
        'MAD'   => self::MAD, // (504) Moroccan Dirham
        'MDL'   => self::MDL, // (498) Moldovan Leu
        'MGA'   => self::MGA, // (969) Malagasy Ariary
        'MKD'   => self::MKD, // (807) Denar
        'MMK'   => self::MMK, // (104) Kyat
        'MNT'   => self::MNT, // (496) Tugrik
        'MOP'   => self::MOP, // (446) Pataca
        'MRU'   => self::MRU, // (929) Ouguiya
        'MUR'   => self::MUR, // (480) Mauritius Rupee
        'MVR'   => self::MVR, // (462) Rufiyaa
        'MWK'   => self::MWK, // (454) Malawi Kwacha
        'MXN'   => self::MXN, // (484) Mexican Peso
        'MXV'   => self::MXV, // (979) Mexican Unidad de Inversion (UDI)
        'MYR'   => self::MYR, // (458) Malaysian Ringgit
        'MZN'   => self::MZN, // (943) Mozambique Metical
        'NAD'   => self::NAD, // (516) Namibia Dollar
        'NGN'   => self::NGN, // (566) Naira
        'NIO'   => self::NIO, // (558) Cordoba Oro
        'NOK'   => self::NOK, // (578) Norwegian Krone
        'NPR'   => self::NPR, // (524) Nepalese Rupee
        'NZD'   => self::NZD, // (554) New Zealand Dollar
        'OMR'   => self::OMR, // (512) Rial Omani
        'PAB'   => self::PAB, // (590) Balboa
        'PEN'   => self::PEN, // (604) Sol
        'PGK'   => self::PGK, // (598) Kina
        'PHP'   => self::PHP, // (608) Philippine Peso
        'PKR'   => self::PKR, // (586) Pakistan Rupee
        'PLN'   => self::PLN, // (985) Zloty
        'PYG'   => self::PYG, // (600) Guarani
        'QAR'   => self::QAR, // (634) Qatari Rial
        'RON'   => self::RON, // (946) Romanian Leu
        'RSD'   => self::RSD, // (941) Serbian Dinar
        'RUB'   => self::RUB, // (643) Russian Ruble
        'RWF'   => self::RWF, // (646) Rwanda Franc
        'SAR'   => self::SAR, // (682) Saudi Riyal
        'SBD'   => self::SBD, // (90) Solomon Islands Dollar
        'SCR'   => self::SCR, // (690) Seychelles Rupee
        'SDG'   => self::SDG, // (938) Sudanese Pound
        'SEK'   => self::SEK, // (752) Swedish Krona
        'SGD'   => self::SGD, // (702) Singapore Dollar
        'SHP'   => self::SHP, // (654) Saint Helena Pound
        'SLL'   => self::SLL, // (694) Leone
        'SOS'   => self::SOS, // (706) Somali Shilling
        'SRD'   => self::SRD, // (968) Surinam Dollar
        'SSP'   => self::SSP, // (728) South Sudanese Pound
        'STN'   => self::STN, // (930) Dobra
        'SVC'   => self::SVC, // (222) El Salvador Colon
        'SYP'   => self::SYP, // (760) Syrian Pound
        'SZL'   => self::SZL, // (748) Lilangeni
        'THB'   => self::THB, // (764) Baht
        'TJS'   => self::TJS, // (972) Somoni
        'TMT'   => self::TMT, // (934) Turkmenistan New Manat
        'TND'   => self::TND, // (788) Tunisian Dinar
        'TOP'   => self::TOP, // (776) Pa’anga
        'TRY'   => self::TRY, // (949) Turkish Lira
        'TTD'   => self::TTD, // (780) Trinidad and Tobago Dollar
        'TWD'   => self::TWD, // (901) New Taiwan Dollar
        'TZS'   => self::TZS, // (834) Tanzanian Shilling
        'UAH'   => self::UAH, // (980) Hryvnia
        'UGX'   => self::UGX, // (800) Uganda Shilling
        'USD'   => self::USD, // (840) US Dollar
        'USN'   => self::USN, // (997) US Dollar (Next day)
        'UYI'   => self::UYI, // (940) Uruguay Peso en Unidades Indexadas (UI)
        'UYU'   => self::UYU, // (858) Peso Uruguayo
        'UYW'   => self::UYW, // (927) Unidad Previsional
        'UZS'   => self::UZS, // (860) Uzbekistan Sum
        'VES'   => self::VES, // (928) Bolívar Soberano
        'VND'   => self::VND, // (704) Dong
        'VUV'   => self::VUV, // (548) Vatu
        'WST'   => self::WST, // (882) Tala
        'XAF'   => self::XAF, // (950) CFA Franc BEAC
        'XAG'   => self::XAG, // (961) Silver
        'XAU'   => self::XAU, // (959) Gold
        'XBA'   => self::XBA, // (955) Bond Markets Unit European Composite Unit (EURCO)
        'XBB'   => self::XBB, // (956) Bond Markets Unit European Monetary Unit (E.M.U.-6)
        'XBC'   => self::XBC, // (957) Bond Markets Unit European Unit of Account 9 (E.U.A.-9)
        'XBD'   => self::XBD, // (958) Bond Markets Unit European Unit of Account 17 (E.U.A.-17)
        'XCD'   => self::XCD, // (951) East Caribbean Dollar
        'XDR'   => self::XDR, // (960) SDR (Special Drawing Right)
        'XOF'   => self::XOF, // (952) CFA Franc BCEAO
        'XPD'   => self::XPD, // (964) Palladium
        'XPF'   => self::XPF, // (953) CFP Franc
        'XPT'   => self::XPT, // (962) Platinum
        'XSU'   => self::XSU, // (994) Sucre
        'XTS'   => self::XTS, // (963) Codes specifically reserved for testing purposes
        'XUA'   => self::XUA, // (965) ADB Unit of Account
        'XXX'   => self::XXX, // (999) The codes assigned for transactions where no currency is involved
        'YER'   => self::YER, // (886) Yemeni Rial
        'ZAR'   => self::ZAR, // (710) Rand
        'ZMW'   => self::ZMW, // (967) Zambian Kwacha
        'ZWL'   => self::ZWL, // (932) Zimbabwe Dollar
    ];

    /** @var string[]  */
    static private array $toAlphaCodeMap = [
        8   => 'ALL', // Lek
        12  => 'DZD', // Algerian Dinar
        32  => 'ARS', // Argentine Peso
        36  => 'AUD', // Australian Dollar
        44  => 'BSD', // Bahamian Dollar
        48  => 'BHD', // Bahraini Dinar
        50  => 'BDT', // Taka
        51  => 'AMD', // Armenian Dram
        52  => 'BBD', // Barbados Dollar
        60  => 'BMD', // Bermudian Dollar
        64  => 'BTN', // Ngultrum
        68  => 'BOB', // Boliviano
        72  => 'BWP', // Pula
        84  => 'BZD', // Belize Dollar
        90  => 'SBD', // Solomon Islands Dollar
        96  => 'BND', // Brunei Dollar
        104 => 'MMK', // Kyat
        108 => 'BIF', // Burundi Franc
        116 => 'KHR', // Riel
        124 => 'CAD', // Canadian Dollar
        132 => 'CVE', // Cabo Verde Escudo
        136 => 'KYD', // Cayman Islands Dollar
        144 => 'LKR', // Sri Lanka Rupee
        152 => 'CLP', // Chilean Peso
        156 => 'CNY', // Yuan Renminbi
        170 => 'COP', // Colombian Peso
        174 => 'KMF', // Comorian Franc
        188 => 'CRC', // Costa Rican Colon
        191 => 'HRK', // Kuna
        192 => 'CUP', // Cuban Peso
        203 => 'CZK', // Czech Koruna
        208 => 'DKK', // Danish Krone
        214 => 'DOP', // Dominican Peso
        222 => 'SVC', // El Salvador Colon
        230 => 'ETB', // Ethiopian Birr
        232 => 'ERN', // Nakfa
        238 => 'FKP', // Falkland Islands Pound
        242 => 'FJD', // Fiji Dollar
        262 => 'DJF', // Djibouti Franc
        270 => 'GMD', // Dalasi
        292 => 'GIP', // Gibraltar Pound
        320 => 'GTQ', // Quetzal
        324 => 'GNF', // Guinean Franc
        328 => 'GYD', // Guyana Dollar
        332 => 'HTG', // Gourde
        340 => 'HNL', // Lempira
        344 => 'HKD', // Hong Kong Dollar
        348 => 'HUF', // Forint
        352 => 'ISK', // Iceland Krona
        356 => 'INR', // Indian Rupee
        360 => 'IDR', // Rupiah
        364 => 'IRR', // Iranian Rial
        368 => 'IQD', // Iraqi Dinar
        376 => 'ILS', // New Israeli Sheqel
        388 => 'JMD', // Jamaican Dollar
        392 => 'JPY', // Yen
        398 => 'KZT', // Tenge
        400 => 'JOD', // Jordanian Dinar
        404 => 'KES', // Kenyan Shilling
        408 => 'KPW', // North Korean Won
        410 => 'KRW', // Won
        414 => 'KWD', // Kuwaiti Dinar
        417 => 'KGS', // Som
        418 => 'LAK', // Lao Kip
        422 => 'LBP', // Lebanese Pound
        426 => 'LSL', // Loti
        430 => 'LRD', // Liberian Dollar
        434 => 'LYD', // Libyan Dinar
        446 => 'MOP', // Pataca
        454 => 'MWK', // Malawi Kwacha
        458 => 'MYR', // Malaysian Ringgit
        462 => 'MVR', // Rufiyaa
        480 => 'MUR', // Mauritius Rupee
        484 => 'MXN', // Mexican Peso
        496 => 'MNT', // Tugrik
        498 => 'MDL', // Moldovan Leu
        504 => 'MAD', // Moroccan Dirham
        512 => 'OMR', // Rial Omani
        516 => 'NAD', // Namibia Dollar
        524 => 'NPR', // Nepalese Rupee
        532 => 'ANG', // Netherlands Antillean Guilder
        533 => 'AWG', // Aruban Florin
        548 => 'VUV', // Vatu
        554 => 'NZD', // New Zealand Dollar
        558 => 'NIO', // Cordoba Oro
        566 => 'NGN', // Naira
        578 => 'NOK', // Norwegian Krone
        586 => 'PKR', // Pakistan Rupee
        590 => 'PAB', // Balboa
        598 => 'PGK', // Kina
        600 => 'PYG', // Guarani
        604 => 'PEN', // Sol
        608 => 'PHP', // Philippine Peso
        634 => 'QAR', // Qatari Rial
        643 => 'RUB', // Russian Ruble
        646 => 'RWF', // Rwanda Franc
        654 => 'SHP', // Saint Helena Pound
        682 => 'SAR', // Saudi Riyal
        690 => 'SCR', // Seychelles Rupee
        694 => 'SLL', // Leone
        702 => 'SGD', // Singapore Dollar
        704 => 'VND', // Dong
        706 => 'SOS', // Somali Shilling
        710 => 'ZAR', // Rand
        728 => 'SSP', // South Sudanese Pound
        748 => 'SZL', // Lilangeni
        752 => 'SEK', // Swedish Krona
        756 => 'CHF', // Swiss Franc
        760 => 'SYP', // Syrian Pound
        764 => 'THB', // Baht
        776 => 'TOP', // Pa’anga
        780 => 'TTD', // Trinidad and Tobago Dollar
        784 => 'AED', // UAE Dirham
        788 => 'TND', // Tunisian Dinar
        800 => 'UGX', // Uganda Shilling
        807 => 'MKD', // Denar
        818 => 'EGP', // Egyptian Pound
        826 => 'GBP', // Pound Sterling
        834 => 'TZS', // Tanzanian Shilling
        840 => 'USD', // US Dollar
        858 => 'UYU', // Peso Uruguayo
        860 => 'UZS', // Uzbekistan Sum
        882 => 'WST', // Tala
        886 => 'YER', // Yemeni Rial
        901 => 'TWD', // New Taiwan Dollar
        927 => 'UYW', // Unidad Previsional
        928 => 'VES', // Bolívar Soberano
        929 => 'MRU', // Ouguiya
        930 => 'STN', // Dobra
        931 => 'CUC', // Peso Convertible
        932 => 'ZWL', // Zimbabwe Dollar
        933 => 'BYN', // Belarusian Ruble
        934 => 'TMT', // Turkmenistan New Manat
        936 => 'GHS', // Ghana Cedi
        938 => 'SDG', // Sudanese Pound
        940 => 'UYI', // Uruguay Peso en Unidades Indexadas (UI)
        941 => 'RSD', // Serbian Dinar
        943 => 'MZN', // Mozambique Metical
        944 => 'AZN', // Azerbaijan Manat
        946 => 'RON', // Romanian Leu
        947 => 'CHE', // WIR Euro
        948 => 'CHW', // WIR Franc
        949 => 'TRY', // Turkish Lira
        950 => 'XAF', // CFA Franc BEAC
        951 => 'XCD', // East Caribbean Dollar
        952 => 'XOF', // CFA Franc BCEAO
        953 => 'XPF', // CFP Franc
        955 => 'XBA', // Bond Markets Unit European Composite Unit (EURCO)
        956 => 'XBB', // Bond Markets Unit European Monetary Unit (E.M.U.-6)
        957 => 'XBC', // Bond Markets Unit European Unit of Account 9 (E.U.A.-9)
        958 => 'XBD', // Bond Markets Unit European Unit of Account 17 (E.U.A.-17)
        959 => 'XAU', // Gold
        960 => 'XDR', // SDR (Special Drawing Right)
        961 => 'XAG', // Silver
        962 => 'XPT', // Platinum
        963 => 'XTS', // Codes specifically reserved for testing purposes
        964 => 'XPD', // Palladium
        965 => 'XUA', // ADB Unit of Account
        967 => 'ZMW', // Zambian Kwacha
        968 => 'SRD', // Surinam Dollar
        969 => 'MGA', // Malagasy Ariary
        970 => 'COU', // Unidad de Valor Real
        971 => 'AFN', // Afghani
        972 => 'TJS', // Somoni
        973 => 'AOA', // Kwanza
        975 => 'BGN', // Bulgarian Lev
        976 => 'CDF', // Congolese Franc
        977 => 'BAM', // Convertible Mark
        978 => 'EUR', // Euro
        979 => 'MXV', // Mexican Unidad de Inversion (UDI)
        980 => 'UAH', // Hryvnia
        981 => 'GEL', // Lari
        984 => 'BOV', // Mvdol
        985 => 'PLN', // Zloty
        986 => 'BRL', // Brazilian Real
        990 => 'CLF', // Unidad de Fomento
        994 => 'XSU', // Sucre
        997 => 'USN', // US Dollar (Next day)
        999 => 'XXX', // The codes assigned for transactions where no currency is involved
    ];

    /** @var array[]  */
    private static array $currencies = [
        self::ALL   => [
            self::KEY_DESCRIPTION   => 'Lek',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'ALL',
        ],
        self::DZD   => [
            self::KEY_DESCRIPTION   => 'Algerian Dinar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'DZD',
        ],
        self::ARS   => [
            self::KEY_DESCRIPTION   => 'Argentine Peso',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'ARS',
        ],
        self::AUD   => [
            self::KEY_DESCRIPTION   => 'Australian Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'AUD',
        ],
        self::BSD   => [
            self::KEY_DESCRIPTION   => 'Bahamian Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BSD',
        ],
        self::BHD   => [
            self::KEY_DESCRIPTION   => 'Bahraini Dinar',
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => 'BHD',
        ],
        self::BDT   => [
            self::KEY_DESCRIPTION   => 'Taka',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BDT',
        ],
        self::AMD   => [
            self::KEY_DESCRIPTION   => 'Armenian Dram',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'AMD',
        ],
        self::BBD   => [
            self::KEY_DESCRIPTION   => 'Barbados Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BBD',
        ],
        self::BMD   => [
            self::KEY_DESCRIPTION   => 'Bermudian Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BMD',
        ],
        self::BTN   => [
            self::KEY_DESCRIPTION   => 'Ngultrum',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BTN',
        ],
        self::BOB   => [
            self::KEY_DESCRIPTION   => 'Boliviano',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BOB',
        ],
        self::BWP   => [
            self::KEY_DESCRIPTION   => 'Pula',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BWP',
        ],
        self::BZD   => [
            self::KEY_DESCRIPTION   => 'Belize Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BZD',
        ],
        self::SBD   => [
            self::KEY_DESCRIPTION   => 'Solomon Islands Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SBD',
        ],
        self::BND   => [
            self::KEY_DESCRIPTION   => 'Brunei Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BND',
        ],
        self::MMK   => [
            self::KEY_DESCRIPTION   => 'Kyat',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MMK',
        ],
        self::BIF   => [
            self::KEY_DESCRIPTION   => 'Burundi Franc',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'BIF',
        ],
        self::KHR   => [
            self::KEY_DESCRIPTION   => 'Riel',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'KHR',
        ],
        self::CAD   => [
            self::KEY_DESCRIPTION   => 'Canadian Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'CAD',
        ],
        self::CVE   => [
            self::KEY_DESCRIPTION   => 'Cabo Verde Escudo',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'CVE',
        ],
        self::KYD   => [
            self::KEY_DESCRIPTION   => 'Cayman Islands Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'KYD',
        ],
        self::LKR   => [
            self::KEY_DESCRIPTION   => 'Sri Lanka Rupee',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'LKR',
        ],
        self::CLP   => [
            self::KEY_DESCRIPTION   => 'Chilean Peso',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'CLP',
        ],
        self::CNY   => [
            self::KEY_DESCRIPTION   => 'Yuan Renminbi',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'CNY',
        ],
        self::COP   => [
            self::KEY_DESCRIPTION   => 'Colombian Peso',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'COP',
        ],
        self::KMF   => [
            self::KEY_DESCRIPTION   => 'Comorian Franc ',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'KMF',
        ],
        self::CRC   => [
            self::KEY_DESCRIPTION   => 'Costa Rican Colon',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'CRC',
        ],
        self::HRK   => [
            self::KEY_DESCRIPTION   => 'Kuna',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'HRK',
        ],
        self::CUP   => [
            self::KEY_DESCRIPTION   => 'Cuban Peso',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'CUP',
        ],
        self::CZK   => [
            self::KEY_DESCRIPTION   => 'Czech Koruna',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'CZK',
        ],
        self::DKK   => [
            self::KEY_DESCRIPTION   => 'Danish Krone',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'DKK',
        ],
        self::DOP   => [
            self::KEY_DESCRIPTION   => 'Dominican Peso',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'DOP',
        ],
        self::SVC   => [
            self::KEY_DESCRIPTION   => 'El Salvador Colon',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SVC',
        ],
        self::ETB   => [
            self::KEY_DESCRIPTION   => 'Ethiopian Birr',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'ETB',
        ],
        self::ERN   => [
            self::KEY_DESCRIPTION   => 'Nakfa',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'ERN',
        ],
        self::FKP   => [
            self::KEY_DESCRIPTION   => 'Falkland Islands Pound',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'FKP',
        ],
        self::FJD   => [
            self::KEY_DESCRIPTION   => 'Fiji Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'FJD',
        ],
        self::DJF   => [
            self::KEY_DESCRIPTION   => 'Djibouti Franc',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'DJF',
        ],
        self::GMD   => [
            self::KEY_DESCRIPTION   => 'Dalasi',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'GMD',
        ],
        self::GIP   => [
            self::KEY_DESCRIPTION   => 'Gibraltar Pound',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'GIP',
        ],
        self::GTQ   => [
            self::KEY_DESCRIPTION   => 'Quetzal',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'GTQ',
        ],
        self::GNF   => [
            self::KEY_DESCRIPTION   => 'Guinean Franc',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'GNF',
        ],
        self::GYD   => [
            self::KEY_DESCRIPTION   => 'Guyana Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'GYD',
        ],
        self::HTG   => [
            self::KEY_DESCRIPTION   => 'Gourde',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'HTG',
        ],
        self::HNL   => [
            self::KEY_DESCRIPTION   => 'Lempira',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'HNL',
        ],
        self::HKD   => [
            self::KEY_DESCRIPTION   => 'Hong Kong Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'HKD',
        ],
        self::HUF   => [
            self::KEY_DESCRIPTION   => 'Forint',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'HUF',
        ],
        self::ISK   => [
            self::KEY_DESCRIPTION   => 'Iceland Krona',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'ISK',
        ],
        self::INR   => [
            self::KEY_DESCRIPTION   => 'Indian Rupee',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'INR',
        ],
        self::IDR   => [
            self::KEY_DESCRIPTION   => 'Rupiah',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'IDR',
        ],
        self::IRR   => [
            self::KEY_DESCRIPTION   => 'Iranian Rial',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'IRR',
        ],
        self::IQD   => [
            self::KEY_DESCRIPTION   => 'Iraqi Dinar',
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => 'IQD',
        ],
        self::ILS   => [
            self::KEY_DESCRIPTION   => 'New Israeli Sheqel',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'ILS',
        ],
        self::JMD   => [
            self::KEY_DESCRIPTION   => 'Jamaican Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'JMD',
        ],
        self::JPY   => [
            self::KEY_DESCRIPTION   => 'Yen',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'JPY',
        ],
        self::KZT   => [
            self::KEY_DESCRIPTION   => 'Tenge',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'KZT',
        ],
        self::JOD   => [
            self::KEY_DESCRIPTION   => 'Jordanian Dinar',
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => 'JOD',
        ],
        self::KES   => [
            self::KEY_DESCRIPTION   => 'Kenyan Shilling',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'KES',
        ],
        self::KPW   => [
            self::KEY_DESCRIPTION   => 'North Korean Won',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'KPW',
        ],
        self::KRW   => [
            self::KEY_DESCRIPTION   => 'Won',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'KRW',
        ],
        self::KWD   => [
            self::KEY_DESCRIPTION   => 'Kuwaiti Dinar',
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => 'KWD',
        ],
        self::KGS   => [
            self::KEY_DESCRIPTION   => 'Som',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'KGS',
        ],
        self::LAK   => [
            self::KEY_DESCRIPTION   => 'Lao Kip',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'LAK',
        ],
        self::LBP   => [
            self::KEY_DESCRIPTION   => 'Lebanese Pound',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'LBP',
        ],
        self::LSL   => [
            self::KEY_DESCRIPTION   => 'Loti',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'LSL',
        ],
        self::LRD   => [
            self::KEY_DESCRIPTION   => 'Liberian Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'LRD',
        ],
        self::LYD   => [
            self::KEY_DESCRIPTION   => 'Libyan Dinar',
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => 'LYD',
        ],
        self::MOP   => [
            self::KEY_DESCRIPTION   => 'Pataca',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MOP',
        ],
        self::MWK   => [
            self::KEY_DESCRIPTION   => 'Malawi Kwacha',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MWK',
        ],
        self::MYR   => [
            self::KEY_DESCRIPTION   => 'Malaysian Ringgit',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MYR',
        ],
        self::MVR   => [
            self::KEY_DESCRIPTION   => 'Rufiyaa',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MVR',
        ],
        self::MUR   => [
            self::KEY_DESCRIPTION   => 'Mauritius Rupee',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MUR',
        ],
        self::MXN   => [
            self::KEY_DESCRIPTION   => 'Mexican Peso',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MXN',
        ],
        self::MNT   => [
            self::KEY_DESCRIPTION   => 'Tugrik',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MNT',
        ],
        self::MDL   => [
            self::KEY_DESCRIPTION   => 'Moldovan Leu',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MDL',
        ],
        self::MAD   => [
            self::KEY_DESCRIPTION   => 'Moroccan Dirham',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MAD',
        ],
        self::OMR   => [
            self::KEY_DESCRIPTION   => 'Rial Omani',
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => 'OMR',
        ],
        self::NAD   => [
            self::KEY_DESCRIPTION   => 'Namibia Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'NAD',
        ],
        self::NPR   => [
            self::KEY_DESCRIPTION   => 'Nepalese Rupee',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'NPR',
        ],
        self::ANG   => [
            self::KEY_DESCRIPTION   => 'Netherlands Antillean Guilder',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'ANG',
        ],
        self::AWG   => [
            self::KEY_DESCRIPTION   => 'Aruban Florin',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'AWG',
        ],
        self::VUV   => [
            self::KEY_DESCRIPTION   => 'Vatu',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'VUV',
        ],
        self::NZD   => [
            self::KEY_DESCRIPTION   => 'New Zealand Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'NZD',
        ],
        self::NIO   => [
            self::KEY_DESCRIPTION   => 'Cordoba Oro',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'NIO',
        ],
        self::NGN   => [
            self::KEY_DESCRIPTION   => 'Naira',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'NGN',
        ],
        self::NOK   => [
            self::KEY_DESCRIPTION   => 'Norwegian Krone',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'NOK',
        ],
        self::PKR   => [
            self::KEY_DESCRIPTION   => 'Pakistan Rupee',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'PKR',
        ],
        self::PAB   => [
            self::KEY_DESCRIPTION   => 'Balboa',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'PAB',
        ],
        self::PGK   => [
            self::KEY_DESCRIPTION   => 'Kina',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'PGK',
        ],
        self::PYG   => [
            self::KEY_DESCRIPTION   => 'Guarani',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'PYG',
        ],
        self::PEN   => [
            self::KEY_DESCRIPTION   => 'Sol',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'PEN',
        ],
        self::PHP   => [
            self::KEY_DESCRIPTION   => 'Philippine Peso',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'PHP',
        ],
        self::QAR   => [
            self::KEY_DESCRIPTION   => 'Qatari Rial',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'QAR',
        ],
        self::RUB   => [
            self::KEY_DESCRIPTION   => 'Russian Ruble',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'RUB',
        ],
        self::RWF   => [
            self::KEY_DESCRIPTION   => 'Rwanda Franc',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'RWF',
        ],
        self::SHP   => [
            self::KEY_DESCRIPTION   => 'Saint Helena Pound',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SHP',
        ],
        self::SAR   => [
            self::KEY_DESCRIPTION   => 'Saudi Riyal',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SAR',
        ],
        self::SCR   => [
            self::KEY_DESCRIPTION   => 'Seychelles Rupee',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SCR',
        ],
        self::SLL   => [
            self::KEY_DESCRIPTION   => 'Leone',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SLL',
        ],
        self::SGD   => [
            self::KEY_DESCRIPTION   => 'Singapore Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SGD',
        ],
        self::VND   => [
            self::KEY_DESCRIPTION   => 'Dong',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'VND',
        ],
        self::SOS   => [
            self::KEY_DESCRIPTION   => 'Somali Shilling',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SOS',
        ],
        self::ZAR   => [
            self::KEY_DESCRIPTION   => 'Rand',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'ZAR',
        ],
        self::SSP   => [
            self::KEY_DESCRIPTION   => 'South Sudanese Pound',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SSP',
        ],
        self::SZL   => [
            self::KEY_DESCRIPTION   => 'Lilangeni',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SZL',
        ],
        self::SEK   => [
            self::KEY_DESCRIPTION   => 'Swedish Krona',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SEK',
        ],
        self::CHF   => [
            self::KEY_DESCRIPTION   => 'Swiss Franc',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'CHF',
        ],
        self::SYP   => [
            self::KEY_DESCRIPTION   => 'Syrian Pound',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SYP',
        ],
        self::THB   => [
            self::KEY_DESCRIPTION   => 'Baht',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'THB',
        ],
        self::TOP   => [
            self::KEY_DESCRIPTION   => 'Pa’anga',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'TOP',
        ],
        self::TTD   => [
            self::KEY_DESCRIPTION   => 'Trinidad and Tobago Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'TTD',
        ],
        self::AED   => [
            self::KEY_DESCRIPTION   => 'UAE Dirham',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'AED',
        ],
        self::TND   => [
            self::KEY_DESCRIPTION   => 'Tunisian Dinar',
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => 'TND',
        ],
        self::UGX   => [
            self::KEY_DESCRIPTION   => 'Uganda Shilling',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'UGX',
        ],
        self::MKD   => [
            self::KEY_DESCRIPTION   => 'Denar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MKD',
        ],
        self::EGP   => [
            self::KEY_DESCRIPTION   => 'Egyptian Pound',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'EGP',
        ],
        self::GBP   => [
            self::KEY_DESCRIPTION   => 'Pound Sterling',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'GBP',
            self::KEY_SYMBOL        => '£',
        ],
        self::TZS   => [
            self::KEY_DESCRIPTION   => 'Tanzanian Shilling',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'TZS',
        ],
        self::USD   => [
            self::KEY_DESCRIPTION   => 'US Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'USD',
            self::KEY_SYMBOL        => '$',
        ],
        self::UYU   => [
            self::KEY_DESCRIPTION   => 'Peso Uruguayo',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'UYU',
        ],
        self::UZS   => [
            self::KEY_DESCRIPTION   => 'Uzbekistan Sum',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'UZS',
        ],
        self::WST   => [
            self::KEY_DESCRIPTION   => 'Tala',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'WST',
        ],
        self::YER   => [
            self::KEY_DESCRIPTION   => 'Yemeni Rial',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'YER',
        ],
        self::TWD   => [
            self::KEY_DESCRIPTION   => 'New Taiwan Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'TWD',
        ],
        self::UYW   => [
            self::KEY_DESCRIPTION   => 'Unidad Previsional',
            self::KEY_MINOR_UNITS   => 4,
            self::KEY_ALPHA_CODE    => 'UYW',
        ],
        self::VES   => [
            self::KEY_DESCRIPTION   => 'Bolívar Soberano',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'VES',
        ],
        self::MRU   => [
            self::KEY_DESCRIPTION   => 'Ouguiya',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MRU',
        ],
        self::STN   => [
            self::KEY_DESCRIPTION   => 'Dobra',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'STN',
        ],
        self::CUC   => [
            self::KEY_DESCRIPTION   => 'Peso Convertible',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'CUC',
        ],
        self::ZWL   => [
            self::KEY_DESCRIPTION   => 'Zimbabwe Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'ZWL',
        ],
        self::BYN   => [
            self::KEY_DESCRIPTION   => 'Belarusian Ruble',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BYN',
        ],
        self::TMT   => [
            self::KEY_DESCRIPTION   => 'Turkmenistan New Manat',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'TMT',
        ],
        self::GHS   => [
            self::KEY_DESCRIPTION   => 'Ghana Cedi',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'GHS',
        ],
        self::SDG   => [
            self::KEY_DESCRIPTION   => 'Sudanese Pound',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SDG',
        ],
        self::UYI   => [
            self::KEY_DESCRIPTION   => 'Uruguay Peso en Unidades Indexadas (UI)',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'UYI',
        ],
        self::RSD   => [
            self::KEY_DESCRIPTION   => 'Serbian Dinar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'RSD',
        ],
        self::MZN   => [
            self::KEY_DESCRIPTION   => 'Mozambique Metical',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MZN',
        ],
        self::AZN   => [
            self::KEY_DESCRIPTION   => 'Azerbaijan Manat',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'AZN',
        ],
        self::RON   => [
            self::KEY_DESCRIPTION   => 'Romanian Leu',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'RON',
        ],
        self::CHE   => [
            self::KEY_DESCRIPTION   => 'WIR Euro',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'CHE',
        ],
        self::CHW   => [
            self::KEY_DESCRIPTION   => 'WIR Franc',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'CHW',
        ],
        self::TRY   => [
            self::KEY_DESCRIPTION   => 'Turkish Lira',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'TRY',
        ],
        self::XAF   => [
            self::KEY_DESCRIPTION   => 'CFA Franc BEAC',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XAF',
        ],
        self::XCD   => [
            self::KEY_DESCRIPTION   => 'East Caribbean Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'XCD',
        ],
        self::XOF   => [
            self::KEY_DESCRIPTION   => 'CFA Franc BCEAO',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XOF',
        ],
        self::XPF   => [
            self::KEY_DESCRIPTION   => 'CFP Franc',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XPF',
        ],
        self::XBA   => [
            self::KEY_DESCRIPTION   => 'Bond Markets Unit European Composite Unit (EURCO)',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XBA',
        ],
        self::XBB   => [
            self::KEY_DESCRIPTION   => 'Bond Markets Unit European Monetary Unit (E.M.U.-6)',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XBB',
        ],
        self::XBC   => [
            self::KEY_DESCRIPTION   => 'Bond Markets Unit European Unit of Account 9 (E.U.A.-9)',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XBC',
        ],
        self::XBD   => [
            self::KEY_DESCRIPTION   => 'Bond Markets Unit European Unit of Account 17 (E.U.A.-17)',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XBD',
        ],
        self::XAU   => [
            self::KEY_DESCRIPTION   => 'Gold',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XAU',
        ],
        self::XDR   => [
            self::KEY_DESCRIPTION   => 'SDR (Special Drawing Right)',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XDR',
        ],
        self::XAG   => [
            self::KEY_DESCRIPTION   => 'Silver',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XAG',
        ],
        self::XPT   => [
            self::KEY_DESCRIPTION   => 'Platinum',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XPT',
        ],
        self::XTS   => [
            self::KEY_DESCRIPTION   => 'Codes specifically reserved for testing purposes',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XTS',
        ],
        self::XPD   => [
            self::KEY_DESCRIPTION   => 'Palladium',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XPD',
        ],
        self::XUA   => [
            self::KEY_DESCRIPTION   => 'ADB Unit of Account',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XUA',
        ],
        self::ZMW   => [
            self::KEY_DESCRIPTION   => 'Zambian Kwacha',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'ZMW',
        ],
        self::SRD   => [
            self::KEY_DESCRIPTION   => 'Surinam Dollar',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'SRD',
        ],
        self::MGA   => [
            self::KEY_DESCRIPTION   => 'Malagasy Ariary',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MGA',
        ],
        self::COU   => [
            self::KEY_DESCRIPTION   => 'Unidad de Valor Real',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'COU',
        ],
        self::AFN   => [
            self::KEY_DESCRIPTION   => 'Afghani',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'AFN',
        ],
        self::TJS   => [
            self::KEY_DESCRIPTION   => 'Somoni',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'TJS',
        ],
        self::AOA   => [
            self::KEY_DESCRIPTION   => 'Kwanza',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'AOA',
        ],
        self::BGN   => [
            self::KEY_DESCRIPTION   => 'Bulgarian Lev',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BGN',
        ],
        self::CDF   => [
            self::KEY_DESCRIPTION   => 'Congolese Franc',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'CDF',
        ],
        self::BAM   => [
            self::KEY_DESCRIPTION   => 'Convertible Mark',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BAM',
        ],
        self::EUR   => [
            self::KEY_DESCRIPTION   => 'Euro',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'EUR',
            self::KEY_SYMBOL        => '€',
        ],
        self::MXV   => [
            self::KEY_DESCRIPTION   => 'Mexican Unidad de Inversion (UDI)',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'MXV',
        ],
        self::UAH   => [
            self::KEY_DESCRIPTION   => 'Hryvnia',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'UAH',
        ],
        self::GEL   => [
            self::KEY_DESCRIPTION   => 'Lari',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'GEL',
        ],
        self::BOV   => [
            self::KEY_DESCRIPTION   => 'Mvdol',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BOV',
        ],
        self::PLN   => [
            self::KEY_DESCRIPTION   => 'Zloty',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'PLN',
        ],
        self::BRL   => [
            self::KEY_DESCRIPTION   => 'Brazilian Real',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'BRL',
        ],
        self::CLF   => [
            self::KEY_DESCRIPTION   => 'Unidad de Fomento',
            self::KEY_MINOR_UNITS   => 4,
            self::KEY_ALPHA_CODE    => 'CLF',
        ],
        self::XSU   => [
            self::KEY_DESCRIPTION   => 'Sucre',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XSU',
        ],
        self::USN   => [
            self::KEY_DESCRIPTION   => 'US Dollar (Next day)',
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => 'USN',
        ],
        self::XXX   => [
            self::KEY_DESCRIPTION   => 'The codes assigned for transactions where no currency is involved',
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => 'XXX',
        ],
    ];

    /**
     * Converts alphabetical code to the numeric code
     *
     * @param string $alphaCode
     *
     * @return int
     *
     * @throws UnknownAlphaCodeCurrencyException
     */
    public function toNumericCode(string $alphaCode): int {
        $alphaCode = trim($alphaCode);
        $numericCode = self::$toNumericCodeMap[strtoupper($alphaCode)] ?? null;
        if (is_null($numericCode)) throw new UnknownAlphaCodeCurrencyException($alphaCode);

        return (int) $numericCode;
    }

    /**
     * @param int|string $numericCode
     *
     * @return int
     *
     * @throws UnknownNumericCodeCurrencyException
     */
    public function validateNumericCode($numericCode): int {
        $numericCode = (int) $numericCode;
        if (isset(self::$toAlphaCodeMap[$numericCode])) return $numericCode;

        throw new UnknownNumericCodeCurrencyException((string) $numericCode);
    }

    /**
     * @param int $numericCode
     *
     * @return Data additional currency data
     *
     * @throws UnknownNumericCodeCurrencyException
     */
    public function getData(int $numericCode): Data {
        $data = self::$currencies[self::validateNumericCode($numericCode)];
        return new Data(
            (string) $data[self::KEY_DESCRIPTION],
            (int) $data[self::KEY_MINOR_UNITS],
            (string) $data[self::KEY_ALPHA_CODE],
            (string) ($data[self::KEY_SYMBOL] ?? '')
        );
    }
}
