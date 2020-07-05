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
     * Converts numeric code to the alphabetical code
     *
     * @param int $numericCode
     *
     * @return string
     *
     * @throws UnknownNumericCodeCurrencyException
     */
    public function toAlphaCode(int $numericCode): string {
        $alphaCode = self::$toAlphaCodeMap[$numericCode] ?? null;
        if (is_null($alphaCode)) throw new UnknownNumericCodeCurrencyException((string) $numericCode);

        return $alphaCode;

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
     * @return mixed[] additional currency data
     *
     * @throws UnknownNumericCodeCurrencyException
     */
    public function getData(int $numericCode): array {
        return self::$currencies[self::validateNumericCode($numericCode)];
    }

    /** List of fields in the data array */
    public const
        KEY_DESCRIPTION = 0, // Currency description
        KEY_MINOR_UNITS = 1, // Minor units (exponent)
        KEY_ALPHA_CODE  = 2, // Alphabetic code
        KEY_SYMBOL      = 3; // Currency symbol

    /** List of all numeric codes */
    public const
        NUMERIC_ALL = 8, // Lek
        NUMERIC_DZD = 12, // Algerian Dinar
        NUMERIC_ARS = 32, // Argentine Peso
        NUMERIC_AUD = 36, // Australian Dollar
        NUMERIC_BSD = 44, // Bahamian Dollar
        NUMERIC_BHD = 48, // Bahraini Dinar
        NUMERIC_BDT = 50, // Taka
        NUMERIC_AMD = 51, // Armenian Dram
        NUMERIC_BBD = 52, // Barbados Dollar
        NUMERIC_BMD = 60, // Bermudian Dollar
        NUMERIC_BTN = 64, // Ngultrum
        NUMERIC_BOB = 68, // Boliviano
        NUMERIC_BWP = 72, // Pula
        NUMERIC_BZD = 84, // Belize Dollar
        NUMERIC_SBD = 90, // Solomon Islands Dollar
        NUMERIC_BND = 96, // Brunei Dollar
        NUMERIC_MMK = 104, // Kyat
        NUMERIC_BIF = 108, // Burundi Franc
        NUMERIC_KHR = 116, // Riel
        NUMERIC_CAD = 124, // Canadian Dollar
        NUMERIC_CVE = 132, // Cabo Verde Escudo
        NUMERIC_KYD = 136, // Cayman Islands Dollar
        NUMERIC_LKR = 144, // Sri Lanka Rupee
        NUMERIC_CLP = 152, // Chilean Peso
        NUMERIC_CNY = 156, // Yuan Renminbi
        NUMERIC_COP = 170, // Colombian Peso
        NUMERIC_KMF = 174, // Comorian Franc
        NUMERIC_CRC = 188, // Costa Rican Colon
        NUMERIC_HRK = 191, // Kuna
        NUMERIC_CUP = 192, // Cuban Peso
        NUMERIC_CZK = 203, // Czech Koruna
        NUMERIC_DKK = 208, // Danish Krone
        NUMERIC_DOP = 214, // Dominican Peso
        NUMERIC_SVC = 222, // El Salvador Colon
        NUMERIC_ETB = 230, // Ethiopian Birr
        NUMERIC_ERN = 232, // Nakfa
        NUMERIC_FKP = 238, // Falkland Islands Pound
        NUMERIC_FJD = 242, // Fiji Dollar
        NUMERIC_DJF = 262, // Djibouti Franc
        NUMERIC_GMD = 270, // Dalasi
        NUMERIC_GIP = 292, // Gibraltar Pound
        NUMERIC_GTQ = 320, // Quetzal
        NUMERIC_GNF = 324, // Guinean Franc
        NUMERIC_GYD = 328, // Guyana Dollar
        NUMERIC_HTG = 332, // Gourde
        NUMERIC_HNL = 340, // Lempira
        NUMERIC_HKD = 344, // Hong Kong Dollar
        NUMERIC_HUF = 348, // Forint
        NUMERIC_ISK = 352, // Iceland Krona
        NUMERIC_INR = 356, // Indian Rupee
        NUMERIC_IDR = 360, // Rupiah
        NUMERIC_IRR = 364, // Iranian Rial
        NUMERIC_IQD = 368, // Iraqi Dinar
        NUMERIC_ILS = 376, // New Israeli Sheqel
        NUMERIC_JMD = 388, // Jamaican Dollar
        NUMERIC_JPY = 392, // Yen
        NUMERIC_KZT = 398, // Tenge
        NUMERIC_JOD = 400, // Jordanian Dinar
        NUMERIC_KES = 404, // Kenyan Shilling
        NUMERIC_KPW = 408, // North Korean Won
        NUMERIC_KRW = 410, // Won
        NUMERIC_KWD = 414, // Kuwaiti Dinar
        NUMERIC_KGS = 417, // Som
        NUMERIC_LAK = 418, // Lao Kip
        NUMERIC_LBP = 422, // Lebanese Pound
        NUMERIC_LSL = 426, // Loti
        NUMERIC_LRD = 430, // Liberian Dollar
        NUMERIC_LYD = 434, // Libyan Dinar
        NUMERIC_MOP = 446, // Pataca
        NUMERIC_MWK = 454, // Malawi Kwacha
        NUMERIC_MYR = 458, // Malaysian Ringgit
        NUMERIC_MVR = 462, // Rufiyaa
        NUMERIC_MUR = 480, // Mauritius Rupee
        NUMERIC_MXN = 484, // Mexican Peso
        NUMERIC_MNT = 496, // Tugrik
        NUMERIC_MDL = 498, // Moldovan Leu
        NUMERIC_MAD = 504, // Moroccan Dirham
        NUMERIC_OMR = 512, // Rial Omani
        NUMERIC_NAD = 516, // Namibia Dollar
        NUMERIC_NPR = 524, // Nepalese Rupee
        NUMERIC_ANG = 532, // Netherlands Antillean Guilder
        NUMERIC_AWG = 533, // Aruban Florin
        NUMERIC_VUV = 548, // Vatu
        NUMERIC_NZD = 554, // New Zealand Dollar
        NUMERIC_NIO = 558, // Cordoba Oro
        NUMERIC_NGN = 566, // Naira
        NUMERIC_NOK = 578, // Norwegian Krone
        NUMERIC_PKR = 586, // Pakistan Rupee
        NUMERIC_PAB = 590, // Balboa
        NUMERIC_PGK = 598, // Kina
        NUMERIC_PYG = 600, // Guarani
        NUMERIC_PEN = 604, // Sol
        NUMERIC_PHP = 608, // Philippine Peso
        NUMERIC_QAR = 634, // Qatari Rial
        NUMERIC_RUB = 643, // Russian Ruble
        NUMERIC_RWF = 646, // Rwanda Franc
        NUMERIC_SHP = 654, // Saint Helena Pound
        NUMERIC_SAR = 682, // Saudi Riyal
        NUMERIC_SCR = 690, // Seychelles Rupee
        NUMERIC_SLL = 694, // Leone
        NUMERIC_SGD = 702, // Singapore Dollar
        NUMERIC_VND = 704, // Dong
        NUMERIC_SOS = 706, // Somali Shilling
        NUMERIC_ZAR = 710, // Rand
        NUMERIC_SSP = 728, // South Sudanese Pound
        NUMERIC_SZL = 748, // Lilangeni
        NUMERIC_SEK = 752, // Swedish Krona
        NUMERIC_CHF = 756, // Swiss Franc
        NUMERIC_SYP = 760, // Syrian Pound
        NUMERIC_THB = 764, // Baht
        NUMERIC_TOP = 776, // Pa’anga
        NUMERIC_TTD = 780, // Trinidad and Tobago Dollar
        NUMERIC_AED = 784, // UAE Dirham
        NUMERIC_TND = 788, // Tunisian Dinar
        NUMERIC_UGX = 800, // Uganda Shilling
        NUMERIC_MKD = 807, // Denar
        NUMERIC_EGP = 818, // Egyptian Pound
        NUMERIC_GBP = 826, // Pound Sterling
        NUMERIC_TZS = 834, // Tanzanian Shilling
        NUMERIC_USD = 840, // US Dollar
        NUMERIC_UYU = 858, // Peso Uruguayo
        NUMERIC_UZS = 860, // Uzbekistan Sum
        NUMERIC_WST = 882, // Tala
        NUMERIC_YER = 886, // Yemeni Rial
        NUMERIC_TWD = 901, // New Taiwan Dollar
        NUMERIC_UYW = 927, // Unidad Previsional
        NUMERIC_VES = 928, // Bolívar Soberano
        NUMERIC_MRU = 929, // Ouguiya
        NUMERIC_STN = 930, // Dobra
        NUMERIC_CUC = 931, // Peso Convertible
        NUMERIC_ZWL = 932, // Zimbabwe Dollar
        NUMERIC_BYN = 933, // Belarusian Ruble
        NUMERIC_TMT = 934, // Turkmenistan New Manat
        NUMERIC_GHS = 936, // Ghana Cedi
        NUMERIC_SDG = 938, // Sudanese Pound
        NUMERIC_UYI = 940, // Uruguay Peso en Unidades Indexadas (UI)
        NUMERIC_RSD = 941, // Serbian Dinar
        NUMERIC_MZN = 943, // Mozambique Metical
        NUMERIC_AZN = 944, // Azerbaijan Manat
        NUMERIC_RON = 946, // Romanian Leu
        NUMERIC_CHE = 947, // WIR Euro
        NUMERIC_CHW = 948, // WIR Franc
        NUMERIC_TRY = 949, // Turkish Lira
        NUMERIC_XAF = 950, // CFA Franc BEAC
        NUMERIC_XCD = 951, // East Caribbean Dollar
        NUMERIC_XOF = 952, // CFA Franc BCEAO
        NUMERIC_XPF = 953, // CFP Franc
        NUMERIC_XBA = 955, // Bond Markets Unit European Composite Unit (EURCO)
        NUMERIC_XBB = 956, // Bond Markets Unit European Monetary Unit (E.M.U.-6)
        NUMERIC_XBC = 957, // Bond Markets Unit European Unit of Account 9 (E.U.A.-9)
        NUMERIC_XBD = 958, // Bond Markets Unit European Unit of Account 17 (E.U.A.-17)
        NUMERIC_XAU = 959, // Gold
        NUMERIC_XDR = 960, // SDR (Special Drawing Right)
        NUMERIC_XAG = 961, // Silver
        NUMERIC_XPT = 962, // Platinum
        NUMERIC_XTS = 963, // Codes specifically reserved for testing purposes
        NUMERIC_XPD = 964, // Palladium
        NUMERIC_XUA = 965, // ADB Unit of Account
        NUMERIC_ZMW = 967, // Zambian Kwacha
        NUMERIC_SRD = 968, // Surinam Dollar
        NUMERIC_MGA = 969, // Malagasy Ariary
        NUMERIC_COU = 970, // Unidad de Valor Real
        NUMERIC_AFN = 971, // Afghani
        NUMERIC_TJS = 972, // Somoni
        NUMERIC_AOA = 973, // Kwanza
        NUMERIC_BGN = 975, // Bulgarian Lev
        NUMERIC_CDF = 976, // Congolese Franc
        NUMERIC_BAM = 977, // Convertible Mark
        NUMERIC_EUR = 978, // Euro
        NUMERIC_MXV = 979, // Mexican Unidad de Inversion (UDI)
        NUMERIC_UAH = 980, // Hryvnia
        NUMERIC_GEL = 981, // Lari
        NUMERIC_BOV = 984, // Mvdol
        NUMERIC_PLN = 985, // Zloty
        NUMERIC_BRL = 986, // Brazilian Real
        NUMERIC_CLF = 990, // Unidad de Fomento
        NUMERIC_XSU = 994, // Sucre
        NUMERIC_USN = 997, // US Dollar (Next day)
        NUMERIC_XXX = 999; // The codes assigned for transactions where no currency is involved

    /** List of all alphabetical codes */
    public const
        ALPHA_ALL = "ALL", // Lek
        ALPHA_DZD = "DZD", // Algerian Dinar
        ALPHA_ARS = "ARS", // Argentine Peso
        ALPHA_AUD = "AUD", // Australian Dollar
        ALPHA_BSD = "BSD", // Bahamian Dollar
        ALPHA_BHD = "BHD", // Bahraini Dinar
        ALPHA_BDT = "BDT", // Taka
        ALPHA_AMD = "AMD", // Armenian Dram
        ALPHA_BBD = "BBD", // Barbados Dollar
        ALPHA_BMD = "BMD", // Bermudian Dollar
        ALPHA_BTN = "BTN", // Ngultrum
        ALPHA_BOB = "BOB", // Boliviano
        ALPHA_BWP = "BWP", // Pula
        ALPHA_BZD = "BZD", // Belize Dollar
        ALPHA_SBD = "SBD", // Solomon Islands Dollar
        ALPHA_BND = "BND", // Brunei Dollar
        ALPHA_MMK = "MMK", // Kyat
        ALPHA_BIF = "BIF", // Burundi Franc
        ALPHA_KHR = "KHR", // Riel
        ALPHA_CAD = "CAD", // Canadian Dollar
        ALPHA_CVE = "CVE", // Cabo Verde Escudo
        ALPHA_KYD = "KYD", // Cayman Islands Dollar
        ALPHA_LKR = "LKR", // Sri Lanka Rupee
        ALPHA_CLP = "CLP", // Chilean Peso
        ALPHA_CNY = "CNY", // Yuan Renminbi
        ALPHA_COP = "COP", // Colombian Peso
        ALPHA_KMF = "KMF", // Comorian Franc
        ALPHA_CRC = "CRC", // Costa Rican Colon
        ALPHA_HRK = "HRK", // Kuna
        ALPHA_CUP = "CUP", // Cuban Peso
        ALPHA_CZK = "CZK", // Czech Koruna
        ALPHA_DKK = "DKK", // Danish Krone
        ALPHA_DOP = "DOP", // Dominican Peso
        ALPHA_SVC = "SVC", // El Salvador Colon
        ALPHA_ETB = "ETB", // Ethiopian Birr
        ALPHA_ERN = "ERN", // Nakfa
        ALPHA_FKP = "FKP", // Falkland Islands Pound
        ALPHA_FJD = "FJD", // Fiji Dollar
        ALPHA_DJF = "DJF", // Djibouti Franc
        ALPHA_GMD = "GMD", // Dalasi
        ALPHA_GIP = "GIP", // Gibraltar Pound
        ALPHA_GTQ = "GTQ", // Quetzal
        ALPHA_GNF = "GNF", // Guinean Franc
        ALPHA_GYD = "GYD", // Guyana Dollar
        ALPHA_HTG = "HTG", // Gourde
        ALPHA_HNL = "HNL", // Lempira
        ALPHA_HKD = "HKD", // Hong Kong Dollar
        ALPHA_HUF = "HUF", // Forint
        ALPHA_ISK = "ISK", // Iceland Krona
        ALPHA_INR = "INR", // Indian Rupee
        ALPHA_IDR = "IDR", // Rupiah
        ALPHA_IRR = "IRR", // Iranian Rial
        ALPHA_IQD = "IQD", // Iraqi Dinar
        ALPHA_ILS = "ILS", // New Israeli Sheqel
        ALPHA_JMD = "JMD", // Jamaican Dollar
        ALPHA_JPY = "JPY", // Yen
        ALPHA_KZT = "KZT", // Tenge
        ALPHA_JOD = "JOD", // Jordanian Dinar
        ALPHA_KES = "KES", // Kenyan Shilling
        ALPHA_KPW = "KPW", // North Korean Won
        ALPHA_KRW = "KRW", // Won
        ALPHA_KWD = "KWD", // Kuwaiti Dinar
        ALPHA_KGS = "KGS", // Som
        ALPHA_LAK = "LAK", // Lao Kip
        ALPHA_LBP = "LBP", // Lebanese Pound
        ALPHA_LSL = "LSL", // Loti
        ALPHA_LRD = "LRD", // Liberian Dollar
        ALPHA_LYD = "LYD", // Libyan Dinar
        ALPHA_MOP = "MOP", // Pataca
        ALPHA_MWK = "MWK", // Malawi Kwacha
        ALPHA_MYR = "MYR", // Malaysian Ringgit
        ALPHA_MVR = "MVR", // Rufiyaa
        ALPHA_MUR = "MUR", // Mauritius Rupee
        ALPHA_MXN = "MXN", // Mexican Peso
        ALPHA_MNT = "MNT", // Tugrik
        ALPHA_MDL = "MDL", // Moldovan Leu
        ALPHA_MAD = "MAD", // Moroccan Dirham
        ALPHA_OMR = "OMR", // Rial Omani
        ALPHA_NAD = "NAD", // Namibia Dollar
        ALPHA_NPR = "NPR", // Nepalese Rupee
        ALPHA_ANG = "ANG", // Netherlands Antillean Guilder
        ALPHA_AWG = "AWG", // Aruban Florin
        ALPHA_VUV = "VUV", // Vatu
        ALPHA_NZD = "NZD", // New Zealand Dollar
        ALPHA_NIO = "NIO", // Cordoba Oro
        ALPHA_NGN = "NGN", // Naira
        ALPHA_NOK = "NOK", // Norwegian Krone
        ALPHA_PKR = "PKR", // Pakistan Rupee
        ALPHA_PAB = "PAB", // Balboa
        ALPHA_PGK = "PGK", // Kina
        ALPHA_PYG = "PYG", // Guarani
        ALPHA_PEN = "PEN", // Sol
        ALPHA_PHP = "PHP", // Philippine Peso
        ALPHA_QAR = "QAR", // Qatari Rial
        ALPHA_RUB = "RUB", // Russian Ruble
        ALPHA_RWF = "RWF", // Rwanda Franc
        ALPHA_SHP = "SHP", // Saint Helena Pound
        ALPHA_SAR = "SAR", // Saudi Riyal
        ALPHA_SCR = "SCR", // Seychelles Rupee
        ALPHA_SLL = "SLL", // Leone
        ALPHA_SGD = "SGD", // Singapore Dollar
        ALPHA_VND = "VND", // Dong
        ALPHA_SOS = "SOS", // Somali Shilling
        ALPHA_ZAR = "ZAR", // Rand
        ALPHA_SSP = "SSP", // South Sudanese Pound
        ALPHA_SZL = "SZL", // Lilangeni
        ALPHA_SEK = "SEK", // Swedish Krona
        ALPHA_CHF = "CHF", // Swiss Franc
        ALPHA_SYP = "SYP", // Syrian Pound
        ALPHA_THB = "THB", // Baht
        ALPHA_TOP = "TOP", // Pa’anga
        ALPHA_TTD = "TTD", // Trinidad and Tobago Dollar
        ALPHA_AED = "AED", // UAE Dirham
        ALPHA_TND = "TND", // Tunisian Dinar
        ALPHA_UGX = "UGX", // Uganda Shilling
        ALPHA_MKD = "MKD", // Denar
        ALPHA_EGP = "EGP", // Egyptian Pound
        ALPHA_GBP = "GBP", // Pound Sterling
        ALPHA_TZS = "TZS", // Tanzanian Shilling
        ALPHA_USD = "USD", // US Dollar
        ALPHA_UYU = "UYU", // Peso Uruguayo
        ALPHA_UZS = "UZS", // Uzbekistan Sum
        ALPHA_WST = "WST", // Tala
        ALPHA_YER = "YER", // Yemeni Rial
        ALPHA_TWD = "TWD", // New Taiwan Dollar
        ALPHA_UYW = "UYW", // Unidad Previsional
        ALPHA_VES = "VES", // Bolívar Soberano
        ALPHA_MRU = "MRU", // Ouguiya
        ALPHA_STN = "STN", // Dobra
        ALPHA_CUC = "CUC", // Peso Convertible
        ALPHA_ZWL = "ZWL", // Zimbabwe Dollar
        ALPHA_BYN = "BYN", // Belarusian Ruble
        ALPHA_TMT = "TMT", // Turkmenistan New Manat
        ALPHA_GHS = "GHS", // Ghana Cedi
        ALPHA_SDG = "SDG", // Sudanese Pound
        ALPHA_UYI = "UYI", // Uruguay Peso en Unidades Indexadas (UI)
        ALPHA_RSD = "RSD", // Serbian Dinar
        ALPHA_MZN = "MZN", // Mozambique Metical
        ALPHA_AZN = "AZN", // Azerbaijan Manat
        ALPHA_RON = "RON", // Romanian Leu
        ALPHA_CHE = "CHE", // WIR Euro
        ALPHA_CHW = "CHW", // WIR Franc
        ALPHA_TRY = "TRY", // Turkish Lira
        ALPHA_XAF = "XAF", // CFA Franc BEAC
        ALPHA_XCD = "XCD", // East Caribbean Dollar
        ALPHA_XOF = "XOF", // CFA Franc BCEAO
        ALPHA_XPF = "XPF", // CFP Franc
        ALPHA_XBA = "XBA", // Bond Markets Unit European Composite Unit (EURCO)
        ALPHA_XBB = "XBB", // Bond Markets Unit European Monetary Unit (E.M.U.-6)
        ALPHA_XBC = "XBC", // Bond Markets Unit European Unit of Account 9 (E.U.A.-9)
        ALPHA_XBD = "XBD", // Bond Markets Unit European Unit of Account 17 (E.U.A.-17)
        ALPHA_XAU = "XAU", // Gold
        ALPHA_XDR = "XDR", // SDR (Special Drawing Right)
        ALPHA_XAG = "XAG", // Silver
        ALPHA_XPT = "XPT", // Platinum
        ALPHA_XTS = "XTS", // Codes specifically reserved for testing purposes
        ALPHA_XPD = "XPD", // Palladium
        ALPHA_XUA = "XUA", // ADB Unit of Account
        ALPHA_ZMW = "ZMW", // Zambian Kwacha
        ALPHA_SRD = "SRD", // Surinam Dollar
        ALPHA_MGA = "MGA", // Malagasy Ariary
        ALPHA_COU = "COU", // Unidad de Valor Real
        ALPHA_AFN = "AFN", // Afghani
        ALPHA_TJS = "TJS", // Somoni
        ALPHA_AOA = "AOA", // Kwanza
        ALPHA_BGN = "BGN", // Bulgarian Lev
        ALPHA_CDF = "CDF", // Congolese Franc
        ALPHA_BAM = "BAM", // Convertible Mark
        ALPHA_EUR = "EUR", // Euro
        ALPHA_MXV = "MXV", // Mexican Unidad de Inversion (UDI)
        ALPHA_UAH = "UAH", // Hryvnia
        ALPHA_GEL = "GEL", // Lari
        ALPHA_BOV = "BOV", // Mvdol
        ALPHA_PLN = "PLN", // Zloty
        ALPHA_BRL = "BRL", // Brazilian Real
        ALPHA_CLF = "CLF", // Unidad de Fomento
        ALPHA_XSU = "XSU", // Sucre
        ALPHA_USN = "USN", // US Dollar (Next day)
        ALPHA_XXX = "XXX"; // The codes assigned for transactions where no currency is involved

    /** @var int[]  */
    static private array $toNumericCodeMap = [
        self::ALPHA_ALL => self::NUMERIC_ALL, // (8) Lek
        self::ALPHA_DZD => self::NUMERIC_DZD, // (12) Algerian Dinar
        self::ALPHA_ARS => self::NUMERIC_ARS, // (32) Argentine Peso
        self::ALPHA_AUD => self::NUMERIC_AUD, // (36) Australian Dollar
        self::ALPHA_BSD => self::NUMERIC_BSD, // (44) Bahamian Dollar
        self::ALPHA_BHD => self::NUMERIC_BHD, // (48) Bahraini Dinar
        self::ALPHA_BDT => self::NUMERIC_BDT, // (50) Taka
        self::ALPHA_AMD => self::NUMERIC_AMD, // (51) Armenian Dram
        self::ALPHA_BBD => self::NUMERIC_BBD, // (52) Barbados Dollar
        self::ALPHA_BMD => self::NUMERIC_BMD, // (60) Bermudian Dollar
        self::ALPHA_BTN => self::NUMERIC_BTN, // (64) Ngultrum
        self::ALPHA_BOB => self::NUMERIC_BOB, // (68) Boliviano
        self::ALPHA_BWP => self::NUMERIC_BWP, // (72) Pula
        self::ALPHA_BZD => self::NUMERIC_BZD, // (84) Belize Dollar
        self::ALPHA_SBD => self::NUMERIC_SBD, // (90) Solomon Islands Dollar
        self::ALPHA_BND => self::NUMERIC_BND, // (96) Brunei Dollar
        self::ALPHA_MMK => self::NUMERIC_MMK, // (104) Kyat
        self::ALPHA_BIF => self::NUMERIC_BIF, // (108) Burundi Franc
        self::ALPHA_KHR => self::NUMERIC_KHR, // (116) Riel
        self::ALPHA_CAD => self::NUMERIC_CAD, // (124) Canadian Dollar
        self::ALPHA_CVE => self::NUMERIC_CVE, // (132) Cabo Verde Escudo
        self::ALPHA_KYD => self::NUMERIC_KYD, // (136) Cayman Islands Dollar
        self::ALPHA_LKR => self::NUMERIC_LKR, // (144) Sri Lanka Rupee
        self::ALPHA_CLP => self::NUMERIC_CLP, // (152) Chilean Peso
        self::ALPHA_CNY => self::NUMERIC_CNY, // (156) Yuan Renminbi
        self::ALPHA_COP => self::NUMERIC_COP, // (170) Colombian Peso
        self::ALPHA_KMF => self::NUMERIC_KMF, // (174) Comorian Franc
        self::ALPHA_CRC => self::NUMERIC_CRC, // (188) Costa Rican Colon
        self::ALPHA_HRK => self::NUMERIC_HRK, // (191) Kuna
        self::ALPHA_CUP => self::NUMERIC_CUP, // (192) Cuban Peso
        self::ALPHA_CZK => self::NUMERIC_CZK, // (203) Czech Koruna
        self::ALPHA_DKK => self::NUMERIC_DKK, // (208) Danish Krone
        self::ALPHA_DOP => self::NUMERIC_DOP, // (214) Dominican Peso
        self::ALPHA_SVC => self::NUMERIC_SVC, // (222) El Salvador Colon
        self::ALPHA_ETB => self::NUMERIC_ETB, // (230) Ethiopian Birr
        self::ALPHA_ERN => self::NUMERIC_ERN, // (232) Nakfa
        self::ALPHA_FKP => self::NUMERIC_FKP, // (238) Falkland Islands Pound
        self::ALPHA_FJD => self::NUMERIC_FJD, // (242) Fiji Dollar
        self::ALPHA_DJF => self::NUMERIC_DJF, // (262) Djibouti Franc
        self::ALPHA_GMD => self::NUMERIC_GMD, // (270) Dalasi
        self::ALPHA_GIP => self::NUMERIC_GIP, // (292) Gibraltar Pound
        self::ALPHA_GTQ => self::NUMERIC_GTQ, // (320) Quetzal
        self::ALPHA_GNF => self::NUMERIC_GNF, // (324) Guinean Franc
        self::ALPHA_GYD => self::NUMERIC_GYD, // (328) Guyana Dollar
        self::ALPHA_HTG => self::NUMERIC_HTG, // (332) Gourde
        self::ALPHA_HNL => self::NUMERIC_HNL, // (340) Lempira
        self::ALPHA_HKD => self::NUMERIC_HKD, // (344) Hong Kong Dollar
        self::ALPHA_HUF => self::NUMERIC_HUF, // (348) Forint
        self::ALPHA_ISK => self::NUMERIC_ISK, // (352) Iceland Krona
        self::ALPHA_INR => self::NUMERIC_INR, // (356) Indian Rupee
        self::ALPHA_IDR => self::NUMERIC_IDR, // (360) Rupiah
        self::ALPHA_IRR => self::NUMERIC_IRR, // (364) Iranian Rial
        self::ALPHA_IQD => self::NUMERIC_IQD, // (368) Iraqi Dinar
        self::ALPHA_ILS => self::NUMERIC_ILS, // (376) New Israeli Sheqel
        self::ALPHA_JMD => self::NUMERIC_JMD, // (388) Jamaican Dollar
        self::ALPHA_JPY => self::NUMERIC_JPY, // (392) Yen
        self::ALPHA_KZT => self::NUMERIC_KZT, // (398) Tenge
        self::ALPHA_JOD => self::NUMERIC_JOD, // (400) Jordanian Dinar
        self::ALPHA_KES => self::NUMERIC_KES, // (404) Kenyan Shilling
        self::ALPHA_KPW => self::NUMERIC_KPW, // (408) North Korean Won
        self::ALPHA_KRW => self::NUMERIC_KRW, // (410) Won
        self::ALPHA_KWD => self::NUMERIC_KWD, // (414) Kuwaiti Dinar
        self::ALPHA_KGS => self::NUMERIC_KGS, // (417) Som
        self::ALPHA_LAK => self::NUMERIC_LAK, // (418) Lao Kip
        self::ALPHA_LBP => self::NUMERIC_LBP, // (422) Lebanese Pound
        self::ALPHA_LSL => self::NUMERIC_LSL, // (426) Loti
        self::ALPHA_LRD => self::NUMERIC_LRD, // (430) Liberian Dollar
        self::ALPHA_LYD => self::NUMERIC_LYD, // (434) Libyan Dinar
        self::ALPHA_MOP => self::NUMERIC_MOP, // (446) Pataca
        self::ALPHA_MWK => self::NUMERIC_MWK, // (454) Malawi Kwacha
        self::ALPHA_MYR => self::NUMERIC_MYR, // (458) Malaysian Ringgit
        self::ALPHA_MVR => self::NUMERIC_MVR, // (462) Rufiyaa
        self::ALPHA_MUR => self::NUMERIC_MUR, // (480) Mauritius Rupee
        self::ALPHA_MXN => self::NUMERIC_MXN, // (484) Mexican Peso
        self::ALPHA_MNT => self::NUMERIC_MNT, // (496) Tugrik
        self::ALPHA_MDL => self::NUMERIC_MDL, // (498) Moldovan Leu
        self::ALPHA_MAD => self::NUMERIC_MAD, // (504) Moroccan Dirham
        self::ALPHA_OMR => self::NUMERIC_OMR, // (512) Rial Omani
        self::ALPHA_NAD => self::NUMERIC_NAD, // (516) Namibia Dollar
        self::ALPHA_NPR => self::NUMERIC_NPR, // (524) Nepalese Rupee
        self::ALPHA_ANG => self::NUMERIC_ANG, // (532) Netherlands Antillean Guilder
        self::ALPHA_AWG => self::NUMERIC_AWG, // (533) Aruban Florin
        self::ALPHA_VUV => self::NUMERIC_VUV, // (548) Vatu
        self::ALPHA_NZD => self::NUMERIC_NZD, // (554) New Zealand Dollar
        self::ALPHA_NIO => self::NUMERIC_NIO, // (558) Cordoba Oro
        self::ALPHA_NGN => self::NUMERIC_NGN, // (566) Naira
        self::ALPHA_NOK => self::NUMERIC_NOK, // (578) Norwegian Krone
        self::ALPHA_PKR => self::NUMERIC_PKR, // (586) Pakistan Rupee
        self::ALPHA_PAB => self::NUMERIC_PAB, // (590) Balboa
        self::ALPHA_PGK => self::NUMERIC_PGK, // (598) Kina
        self::ALPHA_PYG => self::NUMERIC_PYG, // (600) Guarani
        self::ALPHA_PEN => self::NUMERIC_PEN, // (604) Sol
        self::ALPHA_PHP => self::NUMERIC_PHP, // (608) Philippine Peso
        self::ALPHA_QAR => self::NUMERIC_QAR, // (634) Qatari Rial
        self::ALPHA_RUB => self::NUMERIC_RUB, // (643) Russian Ruble
        self::ALPHA_RWF => self::NUMERIC_RWF, // (646) Rwanda Franc
        self::ALPHA_SHP => self::NUMERIC_SHP, // (654) Saint Helena Pound
        self::ALPHA_SAR => self::NUMERIC_SAR, // (682) Saudi Riyal
        self::ALPHA_SCR => self::NUMERIC_SCR, // (690) Seychelles Rupee
        self::ALPHA_SLL => self::NUMERIC_SLL, // (694) Leone
        self::ALPHA_SGD => self::NUMERIC_SGD, // (702) Singapore Dollar
        self::ALPHA_VND => self::NUMERIC_VND, // (704) Dong
        self::ALPHA_SOS => self::NUMERIC_SOS, // (706) Somali Shilling
        self::ALPHA_ZAR => self::NUMERIC_ZAR, // (710) Rand
        self::ALPHA_SSP => self::NUMERIC_SSP, // (728) South Sudanese Pound
        self::ALPHA_SZL => self::NUMERIC_SZL, // (748) Lilangeni
        self::ALPHA_SEK => self::NUMERIC_SEK, // (752) Swedish Krona
        self::ALPHA_CHF => self::NUMERIC_CHF, // (756) Swiss Franc
        self::ALPHA_SYP => self::NUMERIC_SYP, // (760) Syrian Pound
        self::ALPHA_THB => self::NUMERIC_THB, // (764) Baht
        self::ALPHA_TOP => self::NUMERIC_TOP, // (776) Pa’anga
        self::ALPHA_TTD => self::NUMERIC_TTD, // (780) Trinidad and Tobago Dollar
        self::ALPHA_AED => self::NUMERIC_AED, // (784) UAE Dirham
        self::ALPHA_TND => self::NUMERIC_TND, // (788) Tunisian Dinar
        self::ALPHA_UGX => self::NUMERIC_UGX, // (800) Uganda Shilling
        self::ALPHA_MKD => self::NUMERIC_MKD, // (807) Denar
        self::ALPHA_EGP => self::NUMERIC_EGP, // (818) Egyptian Pound
        self::ALPHA_GBP => self::NUMERIC_GBP, // (826) Pound Sterling
        self::ALPHA_TZS => self::NUMERIC_TZS, // (834) Tanzanian Shilling
        self::ALPHA_USD => self::NUMERIC_USD, // (840) US Dollar
        self::ALPHA_UYU => self::NUMERIC_UYU, // (858) Peso Uruguayo
        self::ALPHA_UZS => self::NUMERIC_UZS, // (860) Uzbekistan Sum
        self::ALPHA_WST => self::NUMERIC_WST, // (882) Tala
        self::ALPHA_YER => self::NUMERIC_YER, // (886) Yemeni Rial
        self::ALPHA_TWD => self::NUMERIC_TWD, // (901) New Taiwan Dollar
        self::ALPHA_UYW => self::NUMERIC_UYW, // (927) Unidad Previsional
        self::ALPHA_VES => self::NUMERIC_VES, // (928) Bolívar Soberano
        self::ALPHA_MRU => self::NUMERIC_MRU, // (929) Ouguiya
        self::ALPHA_STN => self::NUMERIC_STN, // (930) Dobra
        self::ALPHA_CUC => self::NUMERIC_CUC, // (931) Peso Convertible
        self::ALPHA_ZWL => self::NUMERIC_ZWL, // (932) Zimbabwe Dollar
        self::ALPHA_BYN => self::NUMERIC_BYN, // (933) Belarusian Ruble
        self::ALPHA_TMT => self::NUMERIC_TMT, // (934) Turkmenistan New Manat
        self::ALPHA_GHS => self::NUMERIC_GHS, // (936) Ghana Cedi
        self::ALPHA_SDG => self::NUMERIC_SDG, // (938) Sudanese Pound
        self::ALPHA_UYI => self::NUMERIC_UYI, // (940) Uruguay Peso en Unidades Indexadas (UI)
        self::ALPHA_RSD => self::NUMERIC_RSD, // (941) Serbian Dinar
        self::ALPHA_MZN => self::NUMERIC_MZN, // (943) Mozambique Metical
        self::ALPHA_AZN => self::NUMERIC_AZN, // (944) Azerbaijan Manat
        self::ALPHA_RON => self::NUMERIC_RON, // (946) Romanian Leu
        self::ALPHA_CHE => self::NUMERIC_CHE, // (947) WIR Euro
        self::ALPHA_CHW => self::NUMERIC_CHW, // (948) WIR Franc
        self::ALPHA_TRY => self::NUMERIC_TRY, // (949) Turkish Lira
        self::ALPHA_XAF => self::NUMERIC_XAF, // (950) CFA Franc BEAC
        self::ALPHA_XCD => self::NUMERIC_XCD, // (951) East Caribbean Dollar
        self::ALPHA_XOF => self::NUMERIC_XOF, // (952) CFA Franc BCEAO
        self::ALPHA_XPF => self::NUMERIC_XPF, // (953) CFP Franc
        self::ALPHA_XBA => self::NUMERIC_XBA, // (955) Bond Markets Unit European Composite Unit (EURCO)
        self::ALPHA_XBB => self::NUMERIC_XBB, // (956) Bond Markets Unit European Monetary Unit (E.M.U.-6)
        self::ALPHA_XBC => self::NUMERIC_XBC, // (957) Bond Markets Unit European Unit of Account 9 (E.U.A.-9)
        self::ALPHA_XBD => self::NUMERIC_XBD, // (958) Bond Markets Unit European Unit of Account 17 (E.U.A.-17)
        self::ALPHA_XAU => self::NUMERIC_XAU, // (959) Gold
        self::ALPHA_XDR => self::NUMERIC_XDR, // (960) SDR (Special Drawing Right)
        self::ALPHA_XAG => self::NUMERIC_XAG, // (961) Silver
        self::ALPHA_XPT => self::NUMERIC_XPT, // (962) Platinum
        self::ALPHA_XTS => self::NUMERIC_XTS, // (963) Codes specifically reserved for testing purposes
        self::ALPHA_XPD => self::NUMERIC_XPD, // (964) Palladium
        self::ALPHA_XUA => self::NUMERIC_XUA, // (965) ADB Unit of Account
        self::ALPHA_ZMW => self::NUMERIC_ZMW, // (967) Zambian Kwacha
        self::ALPHA_SRD => self::NUMERIC_SRD, // (968) Surinam Dollar
        self::ALPHA_MGA => self::NUMERIC_MGA, // (969) Malagasy Ariary
        self::ALPHA_COU => self::NUMERIC_COU, // (970) Unidad de Valor Real
        self::ALPHA_AFN => self::NUMERIC_AFN, // (971) Afghani
        self::ALPHA_TJS => self::NUMERIC_TJS, // (972) Somoni
        self::ALPHA_AOA => self::NUMERIC_AOA, // (973) Kwanza
        self::ALPHA_BGN => self::NUMERIC_BGN, // (975) Bulgarian Lev
        self::ALPHA_CDF => self::NUMERIC_CDF, // (976) Congolese Franc
        self::ALPHA_BAM => self::NUMERIC_BAM, // (977) Convertible Mark
        self::ALPHA_EUR => self::NUMERIC_EUR, // (978) Euro
        self::ALPHA_MXV => self::NUMERIC_MXV, // (979) Mexican Unidad de Inversion (UDI)
        self::ALPHA_UAH => self::NUMERIC_UAH, // (980) Hryvnia
        self::ALPHA_GEL => self::NUMERIC_GEL, // (981) Lari
        self::ALPHA_BOV => self::NUMERIC_BOV, // (984) Mvdol
        self::ALPHA_PLN => self::NUMERIC_PLN, // (985) Zloty
        self::ALPHA_BRL => self::NUMERIC_BRL, // (986) Brazilian Real
        self::ALPHA_CLF => self::NUMERIC_CLF, // (990) Unidad de Fomento
        self::ALPHA_XSU => self::NUMERIC_XSU, // (994) Sucre
        self::ALPHA_USN => self::NUMERIC_USN, // (997) US Dollar (Next day)
        self::ALPHA_XXX => self::NUMERIC_XXX, // (999) The codes assigned for transactions where no currency is involved
    ];

    /** @var string[]  */
    static private array $toAlphaCodeMap = [
        self::NUMERIC_ALL   => self::ALPHA_ALL, // (8) Lek
        self::NUMERIC_DZD   => self::ALPHA_DZD, // (12) Algerian Dinar
        self::NUMERIC_ARS   => self::ALPHA_ARS, // (32) Argentine Peso
        self::NUMERIC_AUD   => self::ALPHA_AUD, // (36) Australian Dollar
        self::NUMERIC_BSD   => self::ALPHA_BSD, // (44) Bahamian Dollar
        self::NUMERIC_BHD   => self::ALPHA_BHD, // (48) Bahraini Dinar
        self::NUMERIC_BDT   => self::ALPHA_BDT, // (50) Taka
        self::NUMERIC_AMD   => self::ALPHA_AMD, // (51) Armenian Dram
        self::NUMERIC_BBD   => self::ALPHA_BBD, // (52) Barbados Dollar
        self::NUMERIC_BMD   => self::ALPHA_BMD, // (60) Bermudian Dollar
        self::NUMERIC_BTN   => self::ALPHA_BTN, // (64) Ngultrum
        self::NUMERIC_BOB   => self::ALPHA_BOB, // (68) Boliviano
        self::NUMERIC_BWP   => self::ALPHA_BWP, // (72) Pula
        self::NUMERIC_BZD   => self::ALPHA_BZD, // (84) Belize Dollar
        self::NUMERIC_SBD   => self::ALPHA_SBD, // (90) Solomon Islands Dollar
        self::NUMERIC_BND   => self::ALPHA_BND, // (96) Brunei Dollar
        self::NUMERIC_MMK   => self::ALPHA_MMK, // (104) Kyat
        self::NUMERIC_BIF   => self::ALPHA_BIF, // (108) Burundi Franc
        self::NUMERIC_KHR   => self::ALPHA_KHR, // (116) Riel
        self::NUMERIC_CAD   => self::ALPHA_CAD, // (124) Canadian Dollar
        self::NUMERIC_CVE   => self::ALPHA_CVE, // (132) Cabo Verde Escudo
        self::NUMERIC_KYD   => self::ALPHA_KYD, // (136) Cayman Islands Dollar
        self::NUMERIC_LKR   => self::ALPHA_LKR, // (144) Sri Lanka Rupee
        self::NUMERIC_CLP   => self::ALPHA_CLP, // (152) Chilean Peso
        self::NUMERIC_CNY   => self::ALPHA_CNY, // (156) Yuan Renminbi
        self::NUMERIC_COP   => self::ALPHA_COP, // (170) Colombian Peso
        self::NUMERIC_KMF   => self::ALPHA_KMF, // (174) Comorian Franc
        self::NUMERIC_CRC   => self::ALPHA_CRC, // (188) Costa Rican Colon
        self::NUMERIC_HRK   => self::ALPHA_HRK, // (191) Kuna
        self::NUMERIC_CUP   => self::ALPHA_CUP, // (192) Cuban Peso
        self::NUMERIC_CZK   => self::ALPHA_CZK, // (203) Czech Koruna
        self::NUMERIC_DKK   => self::ALPHA_DKK, // (208) Danish Krone
        self::NUMERIC_DOP   => self::ALPHA_DOP, // (214) Dominican Peso
        self::NUMERIC_SVC   => self::ALPHA_SVC, // (222) El Salvador Colon
        self::NUMERIC_ETB   => self::ALPHA_ETB, // (230) Ethiopian Birr
        self::NUMERIC_ERN   => self::ALPHA_ERN, // (232) Nakfa
        self::NUMERIC_FKP   => self::ALPHA_FKP, // (238) Falkland Islands Pound
        self::NUMERIC_FJD   => self::ALPHA_FJD, // (242) Fiji Dollar
        self::NUMERIC_DJF   => self::ALPHA_DJF, // (262) Djibouti Franc
        self::NUMERIC_GMD   => self::ALPHA_GMD, // (270) Dalasi
        self::NUMERIC_GIP   => self::ALPHA_GIP, // (292) Gibraltar Pound
        self::NUMERIC_GTQ   => self::ALPHA_GTQ, // (320) Quetzal
        self::NUMERIC_GNF   => self::ALPHA_GNF, // (324) Guinean Franc
        self::NUMERIC_GYD   => self::ALPHA_GYD, // (328) Guyana Dollar
        self::NUMERIC_HTG   => self::ALPHA_HTG, // (332) Gourde
        self::NUMERIC_HNL   => self::ALPHA_HNL, // (340) Lempira
        self::NUMERIC_HKD   => self::ALPHA_HKD, // (344) Hong Kong Dollar
        self::NUMERIC_HUF   => self::ALPHA_HUF, // (348) Forint
        self::NUMERIC_ISK   => self::ALPHA_ISK, // (352) Iceland Krona
        self::NUMERIC_INR   => self::ALPHA_INR, // (356) Indian Rupee
        self::NUMERIC_IDR   => self::ALPHA_IDR, // (360) Rupiah
        self::NUMERIC_IRR   => self::ALPHA_IRR, // (364) Iranian Rial
        self::NUMERIC_IQD   => self::ALPHA_IQD, // (368) Iraqi Dinar
        self::NUMERIC_ILS   => self::ALPHA_ILS, // (376) New Israeli Sheqel
        self::NUMERIC_JMD   => self::ALPHA_JMD, // (388) Jamaican Dollar
        self::NUMERIC_JPY   => self::ALPHA_JPY, // (392) Yen
        self::NUMERIC_KZT   => self::ALPHA_KZT, // (398) Tenge
        self::NUMERIC_JOD   => self::ALPHA_JOD, // (400) Jordanian Dinar
        self::NUMERIC_KES   => self::ALPHA_KES, // (404) Kenyan Shilling
        self::NUMERIC_KPW   => self::ALPHA_KPW, // (408) North Korean Won
        self::NUMERIC_KRW   => self::ALPHA_KRW, // (410) Won
        self::NUMERIC_KWD   => self::ALPHA_KWD, // (414) Kuwaiti Dinar
        self::NUMERIC_KGS   => self::ALPHA_KGS, // (417) Som
        self::NUMERIC_LAK   => self::ALPHA_LAK, // (418) Lao Kip
        self::NUMERIC_LBP   => self::ALPHA_LBP, // (422) Lebanese Pound
        self::NUMERIC_LSL   => self::ALPHA_LSL, // (426) Loti
        self::NUMERIC_LRD   => self::ALPHA_LRD, // (430) Liberian Dollar
        self::NUMERIC_LYD   => self::ALPHA_LYD, // (434) Libyan Dinar
        self::NUMERIC_MOP   => self::ALPHA_MOP, // (446) Pataca
        self::NUMERIC_MWK   => self::ALPHA_MWK, // (454) Malawi Kwacha
        self::NUMERIC_MYR   => self::ALPHA_MYR, // (458) Malaysian Ringgit
        self::NUMERIC_MVR   => self::ALPHA_MVR, // (462) Rufiyaa
        self::NUMERIC_MUR   => self::ALPHA_MUR, // (480) Mauritius Rupee
        self::NUMERIC_MXN   => self::ALPHA_MXN, // (484) Mexican Peso
        self::NUMERIC_MNT   => self::ALPHA_MNT, // (496) Tugrik
        self::NUMERIC_MDL   => self::ALPHA_MDL, // (498) Moldovan Leu
        self::NUMERIC_MAD   => self::ALPHA_MAD, // (504) Moroccan Dirham
        self::NUMERIC_OMR   => self::ALPHA_OMR, // (512) Rial Omani
        self::NUMERIC_NAD   => self::ALPHA_NAD, // (516) Namibia Dollar
        self::NUMERIC_NPR   => self::ALPHA_NPR, // (524) Nepalese Rupee
        self::NUMERIC_ANG   => self::ALPHA_ANG, // (532) Netherlands Antillean Guilder
        self::NUMERIC_AWG   => self::ALPHA_AWG, // (533) Aruban Florin
        self::NUMERIC_VUV   => self::ALPHA_VUV, // (548) Vatu
        self::NUMERIC_NZD   => self::ALPHA_NZD, // (554) New Zealand Dollar
        self::NUMERIC_NIO   => self::ALPHA_NIO, // (558) Cordoba Oro
        self::NUMERIC_NGN   => self::ALPHA_NGN, // (566) Naira
        self::NUMERIC_NOK   => self::ALPHA_NOK, // (578) Norwegian Krone
        self::NUMERIC_PKR   => self::ALPHA_PKR, // (586) Pakistan Rupee
        self::NUMERIC_PAB   => self::ALPHA_PAB, // (590) Balboa
        self::NUMERIC_PGK   => self::ALPHA_PGK, // (598) Kina
        self::NUMERIC_PYG   => self::ALPHA_PYG, // (600) Guarani
        self::NUMERIC_PEN   => self::ALPHA_PEN, // (604) Sol
        self::NUMERIC_PHP   => self::ALPHA_PHP, // (608) Philippine Peso
        self::NUMERIC_QAR   => self::ALPHA_QAR, // (634) Qatari Rial
        self::NUMERIC_RUB   => self::ALPHA_RUB, // (643) Russian Ruble
        self::NUMERIC_RWF   => self::ALPHA_RWF, // (646) Rwanda Franc
        self::NUMERIC_SHP   => self::ALPHA_SHP, // (654) Saint Helena Pound
        self::NUMERIC_SAR   => self::ALPHA_SAR, // (682) Saudi Riyal
        self::NUMERIC_SCR   => self::ALPHA_SCR, // (690) Seychelles Rupee
        self::NUMERIC_SLL   => self::ALPHA_SLL, // (694) Leone
        self::NUMERIC_SGD   => self::ALPHA_SGD, // (702) Singapore Dollar
        self::NUMERIC_VND   => self::ALPHA_VND, // (704) Dong
        self::NUMERIC_SOS   => self::ALPHA_SOS, // (706) Somali Shilling
        self::NUMERIC_ZAR   => self::ALPHA_ZAR, // (710) Rand
        self::NUMERIC_SSP   => self::ALPHA_SSP, // (728) South Sudanese Pound
        self::NUMERIC_SZL   => self::ALPHA_SZL, // (748) Lilangeni
        self::NUMERIC_SEK   => self::ALPHA_SEK, // (752) Swedish Krona
        self::NUMERIC_CHF   => self::ALPHA_CHF, // (756) Swiss Franc
        self::NUMERIC_SYP   => self::ALPHA_SYP, // (760) Syrian Pound
        self::NUMERIC_THB   => self::ALPHA_THB, // (764) Baht
        self::NUMERIC_TOP   => self::ALPHA_TOP, // (776) Pa’anga
        self::NUMERIC_TTD   => self::ALPHA_TTD, // (780) Trinidad and Tobago Dollar
        self::NUMERIC_AED   => self::ALPHA_AED, // (784) UAE Dirham
        self::NUMERIC_TND   => self::ALPHA_TND, // (788) Tunisian Dinar
        self::NUMERIC_UGX   => self::ALPHA_UGX, // (800) Uganda Shilling
        self::NUMERIC_MKD   => self::ALPHA_MKD, // (807) Denar
        self::NUMERIC_EGP   => self::ALPHA_EGP, // (818) Egyptian Pound
        self::NUMERIC_GBP   => self::ALPHA_GBP, // (826) Pound Sterling
        self::NUMERIC_TZS   => self::ALPHA_TZS, // (834) Tanzanian Shilling
        self::NUMERIC_USD   => self::ALPHA_USD, // (840) US Dollar
        self::NUMERIC_UYU   => self::ALPHA_UYU, // (858) Peso Uruguayo
        self::NUMERIC_UZS   => self::ALPHA_UZS, // (860) Uzbekistan Sum
        self::NUMERIC_WST   => self::ALPHA_WST, // (882) Tala
        self::NUMERIC_YER   => self::ALPHA_YER, // (886) Yemeni Rial
        self::NUMERIC_TWD   => self::ALPHA_TWD, // (901) New Taiwan Dollar
        self::NUMERIC_UYW   => self::ALPHA_UYW, // (927) Unidad Previsional
        self::NUMERIC_VES   => self::ALPHA_VES, // (928) Bolívar Soberano
        self::NUMERIC_MRU   => self::ALPHA_MRU, // (929) Ouguiya
        self::NUMERIC_STN   => self::ALPHA_STN, // (930) Dobra
        self::NUMERIC_CUC   => self::ALPHA_CUC, // (931) Peso Convertible
        self::NUMERIC_ZWL   => self::ALPHA_ZWL, // (932) Zimbabwe Dollar
        self::NUMERIC_BYN   => self::ALPHA_BYN, // (933) Belarusian Ruble
        self::NUMERIC_TMT   => self::ALPHA_TMT, // (934) Turkmenistan New Manat
        self::NUMERIC_GHS   => self::ALPHA_GHS, // (936) Ghana Cedi
        self::NUMERIC_SDG   => self::ALPHA_SDG, // (938) Sudanese Pound
        self::NUMERIC_UYI   => self::ALPHA_UYI, // (940) Uruguay Peso en Unidades Indexadas (UI)
        self::NUMERIC_RSD   => self::ALPHA_RSD, // (941) Serbian Dinar
        self::NUMERIC_MZN   => self::ALPHA_MZN, // (943) Mozambique Metical
        self::NUMERIC_AZN   => self::ALPHA_AZN, // (944) Azerbaijan Manat
        self::NUMERIC_RON   => self::ALPHA_RON, // (946) Romanian Leu
        self::NUMERIC_CHE   => self::ALPHA_CHE, // (947) WIR Euro
        self::NUMERIC_CHW   => self::ALPHA_CHW, // (948) WIR Franc
        self::NUMERIC_TRY   => self::ALPHA_TRY, // (949) Turkish Lira
        self::NUMERIC_XAF   => self::ALPHA_XAF, // (950) CFA Franc BEAC
        self::NUMERIC_XCD   => self::ALPHA_XCD, // (951) East Caribbean Dollar
        self::NUMERIC_XOF   => self::ALPHA_XOF, // (952) CFA Franc BCEAO
        self::NUMERIC_XPF   => self::ALPHA_XPF, // (953) CFP Franc
        self::NUMERIC_XBA   => self::ALPHA_XBA, // (955) Bond Markets Unit European Composite Unit (EURCO)
        self::NUMERIC_XBB   => self::ALPHA_XBB, // (956) Bond Markets Unit European Monetary Unit (E.M.U.-6)
        self::NUMERIC_XBC   => self::ALPHA_XBC, // (957) Bond Markets Unit European Unit of Account 9 (E.U.A.-9)
        self::NUMERIC_XBD   => self::ALPHA_XBD, // (958) Bond Markets Unit European Unit of Account 17 (E.U.A.-17)
        self::NUMERIC_XAU   => self::ALPHA_XAU, // (959) Gold
        self::NUMERIC_XDR   => self::ALPHA_XDR, // (960) SDR (Special Drawing Right)
        self::NUMERIC_XAG   => self::ALPHA_XAG, // (961) Silver
        self::NUMERIC_XPT   => self::ALPHA_XPT, // (962) Platinum
        self::NUMERIC_XTS   => self::ALPHA_XTS, // (963) Codes specifically reserved for testing purposes
        self::NUMERIC_XPD   => self::ALPHA_XPD, // (964) Palladium
        self::NUMERIC_XUA   => self::ALPHA_XUA, // (965) ADB Unit of Account
        self::NUMERIC_ZMW   => self::ALPHA_ZMW, // (967) Zambian Kwacha
        self::NUMERIC_SRD   => self::ALPHA_SRD, // (968) Surinam Dollar
        self::NUMERIC_MGA   => self::ALPHA_MGA, // (969) Malagasy Ariary
        self::NUMERIC_COU   => self::ALPHA_COU, // (970) Unidad de Valor Real
        self::NUMERIC_AFN   => self::ALPHA_AFN, // (971) Afghani
        self::NUMERIC_TJS   => self::ALPHA_TJS, // (972) Somoni
        self::NUMERIC_AOA   => self::ALPHA_AOA, // (973) Kwanza
        self::NUMERIC_BGN   => self::ALPHA_BGN, // (975) Bulgarian Lev
        self::NUMERIC_CDF   => self::ALPHA_CDF, // (976) Congolese Franc
        self::NUMERIC_BAM   => self::ALPHA_BAM, // (977) Convertible Mark
        self::NUMERIC_EUR   => self::ALPHA_EUR, // (978) Euro
        self::NUMERIC_MXV   => self::ALPHA_MXV, // (979) Mexican Unidad de Inversion (UDI)
        self::NUMERIC_UAH   => self::ALPHA_UAH, // (980) Hryvnia
        self::NUMERIC_GEL   => self::ALPHA_GEL, // (981) Lari
        self::NUMERIC_BOV   => self::ALPHA_BOV, // (984) Mvdol
        self::NUMERIC_PLN   => self::ALPHA_PLN, // (985) Zloty
        self::NUMERIC_BRL   => self::ALPHA_BRL, // (986) Brazilian Real
        self::NUMERIC_CLF   => self::ALPHA_CLF, // (990) Unidad de Fomento
        self::NUMERIC_XSU   => self::ALPHA_XSU, // (994) Sucre
        self::NUMERIC_USN   => self::ALPHA_USN, // (997) US Dollar (Next day)
        self::NUMERIC_XXX   => self::ALPHA_XXX, // (999) The codes assigned for transactions where no currency is involved
    ];

    /** @var array[]  */
    private static array $currencies = [
        self::NUMERIC_ALL   => [
            self::KEY_DESCRIPTION   => "Lek",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_ALL,
        ],
        self::NUMERIC_DZD   => [
            self::KEY_DESCRIPTION   => "Algerian Dinar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_DZD,
        ],
        self::NUMERIC_ARS   => [
            self::KEY_DESCRIPTION   => "Argentine Peso",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_ARS,
        ],
        self::NUMERIC_AUD   => [
            self::KEY_DESCRIPTION   => "Australian Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_AUD,
        ],
        self::NUMERIC_BSD   => [
            self::KEY_DESCRIPTION   => "Bahamian Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BSD,
        ],
        self::NUMERIC_BHD   => [
            self::KEY_DESCRIPTION   => "Bahraini Dinar",
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => self::ALPHA_BHD,
        ],
        self::NUMERIC_BDT   => [
            self::KEY_DESCRIPTION   => "Taka",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BDT,
        ],
        self::NUMERIC_AMD   => [
            self::KEY_DESCRIPTION   => "Armenian Dram",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_AMD,
        ],
        self::NUMERIC_BBD   => [
            self::KEY_DESCRIPTION   => "Barbados Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BBD,
        ],
        self::NUMERIC_BMD   => [
            self::KEY_DESCRIPTION   => "Bermudian Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BMD,
        ],
        self::NUMERIC_BTN   => [
            self::KEY_DESCRIPTION   => "Ngultrum",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BTN,
        ],
        self::NUMERIC_BOB   => [
            self::KEY_DESCRIPTION   => "Boliviano",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BOB,
        ],
        self::NUMERIC_BWP   => [
            self::KEY_DESCRIPTION   => "Pula",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BWP,
        ],
        self::NUMERIC_BZD   => [
            self::KEY_DESCRIPTION   => "Belize Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BZD,
        ],
        self::NUMERIC_SBD   => [
            self::KEY_DESCRIPTION   => "Solomon Islands Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SBD,
        ],
        self::NUMERIC_BND   => [
            self::KEY_DESCRIPTION   => "Brunei Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BND,
        ],
        self::NUMERIC_MMK   => [
            self::KEY_DESCRIPTION   => "Kyat",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MMK,
        ],
        self::NUMERIC_BIF   => [
            self::KEY_DESCRIPTION   => "Burundi Franc",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_BIF,
        ],
        self::NUMERIC_KHR   => [
            self::KEY_DESCRIPTION   => "Riel",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_KHR,
        ],
        self::NUMERIC_CAD   => [
            self::KEY_DESCRIPTION   => "Canadian Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_CAD,
        ],
        self::NUMERIC_CVE   => [
            self::KEY_DESCRIPTION   => "Cabo Verde Escudo",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_CVE,
        ],
        self::NUMERIC_KYD   => [
            self::KEY_DESCRIPTION   => "Cayman Islands Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_KYD,
        ],
        self::NUMERIC_LKR   => [
            self::KEY_DESCRIPTION   => "Sri Lanka Rupee",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_LKR,
        ],
        self::NUMERIC_CLP   => [
            self::KEY_DESCRIPTION   => "Chilean Peso",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_CLP,
        ],
        self::NUMERIC_CNY   => [
            self::KEY_DESCRIPTION   => "Yuan Renminbi",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_CNY,
        ],
        self::NUMERIC_COP   => [
            self::KEY_DESCRIPTION   => "Colombian Peso",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_COP,
        ],
        self::NUMERIC_KMF   => [
            self::KEY_DESCRIPTION   => "Comorian Franc ",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_KMF,
        ],
        self::NUMERIC_CRC   => [
            self::KEY_DESCRIPTION   => "Costa Rican Colon",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_CRC,
        ],
        self::NUMERIC_HRK   => [
            self::KEY_DESCRIPTION   => "Kuna",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_HRK,
        ],
        self::NUMERIC_CUP   => [
            self::KEY_DESCRIPTION   => "Cuban Peso",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_CUP,
        ],
        self::NUMERIC_CZK   => [
            self::KEY_DESCRIPTION   => "Czech Koruna",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_CZK,
        ],
        self::NUMERIC_DKK   => [
            self::KEY_DESCRIPTION   => "Danish Krone",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_DKK,
        ],
        self::NUMERIC_DOP   => [
            self::KEY_DESCRIPTION   => "Dominican Peso",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_DOP,
        ],
        self::NUMERIC_SVC   => [
            self::KEY_DESCRIPTION   => "El Salvador Colon",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SVC,
        ],
        self::NUMERIC_ETB   => [
            self::KEY_DESCRIPTION   => "Ethiopian Birr",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_ETB,
        ],
        self::NUMERIC_ERN   => [
            self::KEY_DESCRIPTION   => "Nakfa",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_ERN,
        ],
        self::NUMERIC_FKP   => [
            self::KEY_DESCRIPTION   => "Falkland Islands Pound",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_FKP,
        ],
        self::NUMERIC_FJD   => [
            self::KEY_DESCRIPTION   => "Fiji Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_FJD,
        ],
        self::NUMERIC_DJF   => [
            self::KEY_DESCRIPTION   => "Djibouti Franc",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_DJF,
        ],
        self::NUMERIC_GMD   => [
            self::KEY_DESCRIPTION   => "Dalasi",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_GMD,
        ],
        self::NUMERIC_GIP   => [
            self::KEY_DESCRIPTION   => "Gibraltar Pound",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_GIP,
        ],
        self::NUMERIC_GTQ   => [
            self::KEY_DESCRIPTION   => "Quetzal",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_GTQ,
        ],
        self::NUMERIC_GNF   => [
            self::KEY_DESCRIPTION   => "Guinean Franc",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_GNF,
        ],
        self::NUMERIC_GYD   => [
            self::KEY_DESCRIPTION   => "Guyana Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_GYD,
        ],
        self::NUMERIC_HTG   => [
            self::KEY_DESCRIPTION   => "Gourde",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_HTG,
        ],
        self::NUMERIC_HNL   => [
            self::KEY_DESCRIPTION   => "Lempira",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_HNL,
        ],
        self::NUMERIC_HKD   => [
            self::KEY_DESCRIPTION   => "Hong Kong Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_HKD,
        ],
        self::NUMERIC_HUF   => [
            self::KEY_DESCRIPTION   => "Forint",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_HUF,
        ],
        self::NUMERIC_ISK   => [
            self::KEY_DESCRIPTION   => "Iceland Krona",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_ISK,
        ],
        self::NUMERIC_INR   => [
            self::KEY_DESCRIPTION   => "Indian Rupee",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_INR,
        ],
        self::NUMERIC_IDR   => [
            self::KEY_DESCRIPTION   => "Rupiah",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_IDR,
        ],
        self::NUMERIC_IRR   => [
            self::KEY_DESCRIPTION   => "Iranian Rial",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_IRR,
        ],
        self::NUMERIC_IQD   => [
            self::KEY_DESCRIPTION   => "Iraqi Dinar",
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => self::ALPHA_IQD,
        ],
        self::NUMERIC_ILS   => [
            self::KEY_DESCRIPTION   => "New Israeli Sheqel",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_ILS,
        ],
        self::NUMERIC_JMD   => [
            self::KEY_DESCRIPTION   => "Jamaican Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_JMD,
        ],
        self::NUMERIC_JPY   => [
            self::KEY_DESCRIPTION   => "Yen",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_JPY,
        ],
        self::NUMERIC_KZT   => [
            self::KEY_DESCRIPTION   => "Tenge",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_KZT,
        ],
        self::NUMERIC_JOD   => [
            self::KEY_DESCRIPTION   => "Jordanian Dinar",
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => self::ALPHA_JOD,
        ],
        self::NUMERIC_KES   => [
            self::KEY_DESCRIPTION   => "Kenyan Shilling",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_KES,
        ],
        self::NUMERIC_KPW   => [
            self::KEY_DESCRIPTION   => "North Korean Won",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_KPW,
        ],
        self::NUMERIC_KRW   => [
            self::KEY_DESCRIPTION   => "Won",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_KRW,
        ],
        self::NUMERIC_KWD   => [
            self::KEY_DESCRIPTION   => "Kuwaiti Dinar",
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => self::ALPHA_KWD,
        ],
        self::NUMERIC_KGS   => [
            self::KEY_DESCRIPTION   => "Som",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_KGS,
        ],
        self::NUMERIC_LAK   => [
            self::KEY_DESCRIPTION   => "Lao Kip",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_LAK,
        ],
        self::NUMERIC_LBP   => [
            self::KEY_DESCRIPTION   => "Lebanese Pound",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_LBP,
        ],
        self::NUMERIC_LSL   => [
            self::KEY_DESCRIPTION   => "Loti",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_LSL,
        ],
        self::NUMERIC_LRD   => [
            self::KEY_DESCRIPTION   => "Liberian Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_LRD,
        ],
        self::NUMERIC_LYD   => [
            self::KEY_DESCRIPTION   => "Libyan Dinar",
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => self::ALPHA_LYD,
        ],
        self::NUMERIC_MOP   => [
            self::KEY_DESCRIPTION   => "Pataca",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MOP,
        ],
        self::NUMERIC_MWK   => [
            self::KEY_DESCRIPTION   => "Malawi Kwacha",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MWK,
        ],
        self::NUMERIC_MYR   => [
            self::KEY_DESCRIPTION   => "Malaysian Ringgit",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MYR,
        ],
        self::NUMERIC_MVR   => [
            self::KEY_DESCRIPTION   => "Rufiyaa",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MVR,
        ],
        self::NUMERIC_MUR   => [
            self::KEY_DESCRIPTION   => "Mauritius Rupee",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MUR,
        ],
        self::NUMERIC_MXN   => [
            self::KEY_DESCRIPTION   => "Mexican Peso",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MXN,
        ],
        self::NUMERIC_MNT   => [
            self::KEY_DESCRIPTION   => "Tugrik",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MNT,
        ],
        self::NUMERIC_MDL   => [
            self::KEY_DESCRIPTION   => "Moldovan Leu",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MDL,
        ],
        self::NUMERIC_MAD   => [
            self::KEY_DESCRIPTION   => "Moroccan Dirham",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MAD,
        ],
        self::NUMERIC_OMR   => [
            self::KEY_DESCRIPTION   => "Rial Omani",
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => self::ALPHA_OMR,
        ],
        self::NUMERIC_NAD   => [
            self::KEY_DESCRIPTION   => "Namibia Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_NAD,
        ],
        self::NUMERIC_NPR   => [
            self::KEY_DESCRIPTION   => "Nepalese Rupee",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_NPR,
        ],
        self::NUMERIC_ANG   => [
            self::KEY_DESCRIPTION   => "Netherlands Antillean Guilder",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_ANG,
        ],
        self::NUMERIC_AWG   => [
            self::KEY_DESCRIPTION   => "Aruban Florin",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_AWG,
        ],
        self::NUMERIC_VUV   => [
            self::KEY_DESCRIPTION   => "Vatu",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_VUV,
        ],
        self::NUMERIC_NZD   => [
            self::KEY_DESCRIPTION   => "New Zealand Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_NZD,
        ],
        self::NUMERIC_NIO   => [
            self::KEY_DESCRIPTION   => "Cordoba Oro",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_NIO,
        ],
        self::NUMERIC_NGN   => [
            self::KEY_DESCRIPTION   => "Naira",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_NGN,
        ],
        self::NUMERIC_NOK   => [
            self::KEY_DESCRIPTION   => "Norwegian Krone",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_NOK,
        ],
        self::NUMERIC_PKR   => [
            self::KEY_DESCRIPTION   => "Pakistan Rupee",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_PKR,
        ],
        self::NUMERIC_PAB   => [
            self::KEY_DESCRIPTION   => "Balboa",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_PAB,
        ],
        self::NUMERIC_PGK   => [
            self::KEY_DESCRIPTION   => "Kina",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_PGK,
        ],
        self::NUMERIC_PYG   => [
            self::KEY_DESCRIPTION   => "Guarani",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_PYG,
        ],
        self::NUMERIC_PEN   => [
            self::KEY_DESCRIPTION   => "Sol",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_PEN,
        ],
        self::NUMERIC_PHP   => [
            self::KEY_DESCRIPTION   => "Philippine Peso",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_PHP,
        ],
        self::NUMERIC_QAR   => [
            self::KEY_DESCRIPTION   => "Qatari Rial",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_QAR,
        ],
        self::NUMERIC_RUB   => [
            self::KEY_DESCRIPTION   => "Russian Ruble",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_RUB,
        ],
        self::NUMERIC_RWF   => [
            self::KEY_DESCRIPTION   => "Rwanda Franc",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_RWF,
        ],
        self::NUMERIC_SHP   => [
            self::KEY_DESCRIPTION   => "Saint Helena Pound",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SHP,
        ],
        self::NUMERIC_SAR   => [
            self::KEY_DESCRIPTION   => "Saudi Riyal",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SAR,
        ],
        self::NUMERIC_SCR   => [
            self::KEY_DESCRIPTION   => "Seychelles Rupee",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SCR,
        ],
        self::NUMERIC_SLL   => [
            self::KEY_DESCRIPTION   => "Leone",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SLL,
        ],
        self::NUMERIC_SGD   => [
            self::KEY_DESCRIPTION   => "Singapore Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SGD,
        ],
        self::NUMERIC_VND   => [
            self::KEY_DESCRIPTION   => "Dong",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_VND,
        ],
        self::NUMERIC_SOS   => [
            self::KEY_DESCRIPTION   => "Somali Shilling",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SOS,
        ],
        self::NUMERIC_ZAR   => [
            self::KEY_DESCRIPTION   => "Rand",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_ZAR,
        ],
        self::NUMERIC_SSP   => [
            self::KEY_DESCRIPTION   => "South Sudanese Pound",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SSP,
        ],
        self::NUMERIC_SZL   => [
            self::KEY_DESCRIPTION   => "Lilangeni",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SZL,
        ],
        self::NUMERIC_SEK   => [
            self::KEY_DESCRIPTION   => "Swedish Krona",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SEK,
        ],
        self::NUMERIC_CHF   => [
            self::KEY_DESCRIPTION   => "Swiss Franc",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_CHF,
        ],
        self::NUMERIC_SYP   => [
            self::KEY_DESCRIPTION   => "Syrian Pound",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SYP,
        ],
        self::NUMERIC_THB   => [
            self::KEY_DESCRIPTION   => "Baht",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_THB,
        ],
        self::NUMERIC_TOP   => [
            self::KEY_DESCRIPTION   => "Pa’anga",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_TOP,
        ],
        self::NUMERIC_TTD   => [
            self::KEY_DESCRIPTION   => "Trinidad and Tobago Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_TTD,
        ],
        self::NUMERIC_AED   => [
            self::KEY_DESCRIPTION   => "UAE Dirham",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_AED,
        ],
        self::NUMERIC_TND   => [
            self::KEY_DESCRIPTION   => "Tunisian Dinar",
            self::KEY_MINOR_UNITS   => 3,
            self::KEY_ALPHA_CODE    => self::ALPHA_TND,
        ],
        self::NUMERIC_UGX   => [
            self::KEY_DESCRIPTION   => "Uganda Shilling",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_UGX,
        ],
        self::NUMERIC_MKD   => [
            self::KEY_DESCRIPTION   => "Denar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MKD,
        ],
        self::NUMERIC_EGP   => [
            self::KEY_DESCRIPTION   => "Egyptian Pound",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_EGP,
        ],
        self::NUMERIC_GBP   => [
            self::KEY_DESCRIPTION   => "Pound Sterling",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_GBP,
        ],
        self::NUMERIC_TZS   => [
            self::KEY_DESCRIPTION   => "Tanzanian Shilling",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_TZS,
        ],
        self::NUMERIC_USD   => [
            self::KEY_DESCRIPTION   => "US Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_USD,
            self::KEY_SYMBOL        => "$",
        ],
        self::NUMERIC_UYU   => [
            self::KEY_DESCRIPTION   => "Peso Uruguayo",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_UYU,
        ],
        self::NUMERIC_UZS   => [
            self::KEY_DESCRIPTION   => "Uzbekistan Sum",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_UZS,
        ],
        self::NUMERIC_WST   => [
            self::KEY_DESCRIPTION   => "Tala",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_WST,
        ],
        self::NUMERIC_YER   => [
            self::KEY_DESCRIPTION   => "Yemeni Rial",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_YER,
        ],
        self::NUMERIC_TWD   => [
            self::KEY_DESCRIPTION   => "New Taiwan Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_TWD,
        ],
        self::NUMERIC_UYW   => [
            self::KEY_DESCRIPTION   => "Unidad Previsional",
            self::KEY_MINOR_UNITS   => 4,
            self::KEY_ALPHA_CODE    => self::ALPHA_UYW,
        ],
        self::NUMERIC_VES   => [
            self::KEY_DESCRIPTION   => "Bolívar Soberano",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_VES,
        ],
        self::NUMERIC_MRU   => [
            self::KEY_DESCRIPTION   => "Ouguiya",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MRU,
        ],
        self::NUMERIC_STN   => [
            self::KEY_DESCRIPTION   => "Dobra",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_STN,
        ],
        self::NUMERIC_CUC   => [
            self::KEY_DESCRIPTION   => "Peso Convertible",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_CUC,
        ],
        self::NUMERIC_ZWL   => [
            self::KEY_DESCRIPTION   => "Zimbabwe Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_ZWL,
        ],
        self::NUMERIC_BYN   => [
            self::KEY_DESCRIPTION   => "Belarusian Ruble",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BYN,
        ],
        self::NUMERIC_TMT   => [
            self::KEY_DESCRIPTION   => "Turkmenistan New Manat",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_TMT,
        ],
        self::NUMERIC_GHS   => [
            self::KEY_DESCRIPTION   => "Ghana Cedi",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_GHS,
        ],
        self::NUMERIC_SDG   => [
            self::KEY_DESCRIPTION   => "Sudanese Pound",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SDG,
        ],
        self::NUMERIC_UYI   => [
            self::KEY_DESCRIPTION   => "Uruguay Peso en Unidades Indexadas (UI)",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_UYI,
        ],
        self::NUMERIC_RSD   => [
            self::KEY_DESCRIPTION   => "Serbian Dinar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_RSD,
        ],
        self::NUMERIC_MZN   => [
            self::KEY_DESCRIPTION   => "Mozambique Metical",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MZN,
        ],
        self::NUMERIC_AZN   => [
            self::KEY_DESCRIPTION   => "Azerbaijan Manat",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_AZN,
        ],
        self::NUMERIC_RON   => [
            self::KEY_DESCRIPTION   => "Romanian Leu",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_RON,
        ],
        self::NUMERIC_CHE   => [
            self::KEY_DESCRIPTION   => "WIR Euro",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_CHE,
        ],
        self::NUMERIC_CHW   => [
            self::KEY_DESCRIPTION   => "WIR Franc",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_CHW,
        ],
        self::NUMERIC_TRY   => [
            self::KEY_DESCRIPTION   => "Turkish Lira",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_TRY,
        ],
        self::NUMERIC_XAF   => [
            self::KEY_DESCRIPTION   => "CFA Franc BEAC",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XAF,
        ],
        self::NUMERIC_XCD   => [
            self::KEY_DESCRIPTION   => "East Caribbean Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_XCD,
        ],
        self::NUMERIC_XOF   => [
            self::KEY_DESCRIPTION   => "CFA Franc BCEAO",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XOF,
        ],
        self::NUMERIC_XPF   => [
            self::KEY_DESCRIPTION   => "CFP Franc",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XPF,
        ],
        self::NUMERIC_XBA   => [
            self::KEY_DESCRIPTION   => "Bond Markets Unit European Composite Unit (EURCO)",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XBA,
        ],
        self::NUMERIC_XBB   => [
            self::KEY_DESCRIPTION   => "Bond Markets Unit European Monetary Unit (E.M.U.-6)",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XBB,
        ],
        self::NUMERIC_XBC   => [
            self::KEY_DESCRIPTION   => "Bond Markets Unit European Unit of Account 9 (E.U.A.-9)",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XBC,
        ],
        self::NUMERIC_XBD   => [
            self::KEY_DESCRIPTION   => "Bond Markets Unit European Unit of Account 17 (E.U.A.-17)",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XBD,
        ],
        self::NUMERIC_XAU   => [
            self::KEY_DESCRIPTION   => "Gold",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XAU,
        ],
        self::NUMERIC_XDR   => [
            self::KEY_DESCRIPTION   => "SDR (Special Drawing Right)",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XDR,
        ],
        self::NUMERIC_XAG   => [
            self::KEY_DESCRIPTION   => "Silver",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XAG,
        ],
        self::NUMERIC_XPT   => [
            self::KEY_DESCRIPTION   => "Platinum",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XPT,
        ],
        self::NUMERIC_XTS   => [
            self::KEY_DESCRIPTION   => "Codes specifically reserved for testing purposes",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XTS,
        ],
        self::NUMERIC_XPD   => [
            self::KEY_DESCRIPTION   => "Palladium",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XPD,
        ],
        self::NUMERIC_XUA   => [
            self::KEY_DESCRIPTION   => "ADB Unit of Account",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XUA,
        ],
        self::NUMERIC_ZMW   => [
            self::KEY_DESCRIPTION   => "Zambian Kwacha",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_ZMW,
        ],
        self::NUMERIC_SRD   => [
            self::KEY_DESCRIPTION   => "Surinam Dollar",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_SRD,
        ],
        self::NUMERIC_MGA   => [
            self::KEY_DESCRIPTION   => "Malagasy Ariary",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MGA,
        ],
        self::NUMERIC_COU   => [
            self::KEY_DESCRIPTION   => "Unidad de Valor Real",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_COU,
        ],
        self::NUMERIC_AFN   => [
            self::KEY_DESCRIPTION   => "Afghani",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_AFN,
        ],
        self::NUMERIC_TJS   => [
            self::KEY_DESCRIPTION   => "Somoni",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_TJS,
        ],
        self::NUMERIC_AOA   => [
            self::KEY_DESCRIPTION   => "Kwanza",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_AOA,
        ],
        self::NUMERIC_BGN   => [
            self::KEY_DESCRIPTION   => "Bulgarian Lev",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BGN,
        ],
        self::NUMERIC_CDF   => [
            self::KEY_DESCRIPTION   => "Congolese Franc",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_CDF,
        ],
        self::NUMERIC_BAM   => [
            self::KEY_DESCRIPTION   => "Convertible Mark",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BAM,
        ],
        self::NUMERIC_EUR   => [
            self::KEY_DESCRIPTION   => "Euro",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_EUR,
        ],
        self::NUMERIC_MXV   => [
            self::KEY_DESCRIPTION   => "Mexican Unidad de Inversion (UDI)",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_MXV,
        ],
        self::NUMERIC_UAH   => [
            self::KEY_DESCRIPTION   => "Hryvnia",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_UAH,
        ],
        self::NUMERIC_GEL   => [
            self::KEY_DESCRIPTION   => "Lari",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_GEL,
        ],
        self::NUMERIC_BOV   => [
            self::KEY_DESCRIPTION   => "Mvdol",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BOV,
        ],
        self::NUMERIC_PLN   => [
            self::KEY_DESCRIPTION   => "Zloty",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_PLN,
        ],
        self::NUMERIC_BRL   => [
            self::KEY_DESCRIPTION   => "Brazilian Real",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_BRL,
        ],
        self::NUMERIC_CLF   => [
            self::KEY_DESCRIPTION   => "Unidad de Fomento",
            self::KEY_MINOR_UNITS   => 4,
            self::KEY_ALPHA_CODE    => self::ALPHA_CLF,
        ],
        self::NUMERIC_XSU   => [
            self::KEY_DESCRIPTION   => "Sucre",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XSU,
        ],
        self::NUMERIC_USN   => [
            self::KEY_DESCRIPTION   => "US Dollar (Next day)",
            self::KEY_MINOR_UNITS   => 2,
            self::KEY_ALPHA_CODE    => self::ALPHA_USN,
        ],
        self::NUMERIC_XXX   => [
            self::KEY_DESCRIPTION   => "The codes assigned for transactions where no currency is involved",
            self::KEY_MINOR_UNITS   => 0,
            self::KEY_ALPHA_CODE    => self::ALPHA_XXX,
        ],
    ];
}
