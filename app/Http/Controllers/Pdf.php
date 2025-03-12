<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use Barryvdh\DomPDF\Facade\Pdf as PdfFacade;

class Pdf
{

    private static array $styles = [
        ['emphasize'],
        ['emphasize', 'underline'],
    ];

    public static function generate_1(Request $request): Response|View|string
    {
        $params = $request::validate([
            'type' => 'present|string|nullable',
            'p1' => 'present|string|nullable',
            'p2' => 'present|string|nullable',
            'p3' => 'present|string|nullable',
            'p4' => 'present|string|nullable',
            'p5' => 'present|string|nullable',
            //
            'p6' => 'present|string|nullable',
            'p7' => 'present|string|nullable',
            'p8' => 'present|string|nullable',
            //
            'p9' => 'present|string|nullable',
            'p10' => 'present|string|nullable',
            'p11' => 'present|string|nullable',
            //
            'p12' => 'present|string|nullable',
            //
            'p13' => 'present|string|nullable',
            'p14' => 'present|string|nullable',
            //
            'p15' => 'present|string|nullable',
            //
            'p16' => 'present|string|nullable',
        ]);

        $params = collect($params)->map(function (mixed $value) {
            return is_null($value) ? '' : $value;
        })->toArray();

        $url = urldecode(route('generate_1', array_merge($params, ['type' => 'stream'])));

        $params['p6'] = explode('-', $params['p6']);
        $params['p13'] = explode('-', $params['p13']);
        $params['p14'] = explode('-', $params['p14']);

        $params = [
            ...$params,
            'par1' => [
                ['甲乙双方于'],
                [$params['p6'][0], self::$styles[0]],
                ['年', ''],
                [$params['p6'][1], self::$styles[0]],
                ['月', ''],
                [$params['p6'][2], self::$styles[0]],
                ['日共同签署了《危险废物处置合同》（编号：'],
                [$params['p7'], self::$styles[0]],
                ['），双方本着互惠互利的原则，就原合同中委托处置“'],
                [$params['p8'], self::$styles[0]],
                ['”代码变更事项，特订立以下补充协议：'],
            ],
            'par2' => [
                ['一、原合同'],
                [$params['p9'], self::$styles[0]],
                ['危废代码“'],
                [$params['p10'], self::$styles[0]],
                ['”变更为“'],
                [$params['p11'], self::$styles[0]],
                ['”。'],
            ],
            'par3' => [
                ['二、除上述变更外，价格、废物质量标准、结算方式等其它一切条款按原《危险废物处置合同》（编号：'],
                [$params['p12'], self::$styles[1]],
                ['）执行。'],
            ],
            'par4' => [
                ['三、协议有效期自'],
                [$params['p13'][0], self::$styles[1]],
                ['年'],
                [$params['p13'][1], self::$styles[1]],
                ['月'],
                [$params['p13'][2], self::$styles[1]],
                ['日起至'],
                [$params['p14'][0], self::$styles[1]],
                ['年'],
                [$params['p14'][1], self::$styles[1]],
                ['月'],
                [$params['p14'][2], self::$styles[1]],
                ['日止。'],
            ],
            'par5' => [
                ['四、本协议生效后，即成为《危险废物处置合同》（编号：'],
                [$params['p15'], self::$styles[1]],
                ['）不可分割的组成部分，具有同等法律效应。'],
            ],
            'par6' => [['五、本协议如发生纠纷，双方将采取友好协商方式合理解决。']],
            'par7' => [['六、本补充协议一式陆份，经双方签字盖章后生效，甲、乙双方各执叁份。']],
        ];

        // 加载 HTML 内容并生成 PDF
        $pdf = PdfFacade::loadView('pdf.generate_1', $params);

        return match ($params['type']) {
            'download' => $pdf->download(),
            'stream' => $pdf->stream(),
            'html' => view('pdf.generate_1', $params),
            default => $url,
        };
    }

    public static function generate_2(Request $request): Response|View|string
    {
        $params = $request::validate([
            'type' => 'present|string|nullable',
            'p1' => 'present|string|nullable',
            'p2' => 'present|string|nullable',
            'p3' => 'present|string|nullable',
            'p4' => 'present|string|nullable',
            'p5' => 'present|string|nullable',
            //
            'p6' => 'present|string|nullable',
            'p7' => 'present|string|nullable',
            'p8' => 'required|json',
            'p9' => 'present|string|nullable',
            'p10' => 'present|string|nullable',
            'p11' => 'present|string|nullable',
            'p12' => 'present|string|nullable',
            'p13' => 'present|string|nullable',
        ]);

        $params = collect($params)->map(function (mixed $value) {
            return is_null($value) ? '' : $value;
        })->toArray();

        $url = urldecode(route('generate_2', array_merge($params, ['type' => 'stream'])));

        $params['p6'] = explode('-', $params['p6']);
        $params['p8'] = json_decode($params['p8'], true);
        $params['p10'] = explode('-', $params['p10']);
        $params['p11'] = explode('-', $params['p11']);

        $params = [
            ...$params,
            'par1' => [
                ['甲乙双方于'],
                [$params['p6'][0], self::$styles[0]],
                ['年'],
                [$params['p6'][1], self::$styles[0]],
                ['月', ''],
                [$params['p6'][2], self::$styles[0]],
                ['日共同签署了《危险废物处置合同》（编号：', ''],
                [$params['p7'], self::$styles[1]],
                ['），由于近期市场环境变化，双方本着互惠互利的原则，就废物处置价格调整事宜，特订立以下补充协议：', ''],
            ],
            'par2' => [['一、废物种类、数量、处置费：']],
            'par3' => [
                ['二、除上述变更外，废物质量标准、结算方式等其它一切条款按原《危险废物处置合同》（编号'],
                [$params['p9'], self::$styles[1]],
                ['）执行。'],
            ],
            'par4' => [
                ['三、协议有效期自', ''],
                [$params['p10'][0], self::$styles[1]],
                ['年', ''],
                [$params['p10'][1], self::$styles[1]],
                ['月', ''],
                [$params['p10'][2], self::$styles[1]],
                ['日起至', ''],
                [$params['p11'][0], self::$styles[1]],
                ['年', ''],
                [$params['p11'][1], self::$styles[1]],
                ['月', ''],
                [$params['p11'][2], self::$styles[1]],
                ['日止。', ''],
            ],
            'par5' => [
                ['四、本协议生效后，即成为《危险废物处置合同》（编号：'],
                ['SFHB/HT4-YX-2023121501', self::$styles[1]],
                ['）不可分割的组成部分，具有同等法律效应。'],
            ],
            'par6' => [['五、本协议如发生纠纷，双方将采取友好协商方式合理解决。']],
            'par7' => [['六、本补充协议一式陆份，经双方签字盖章后生效，甲、乙双方各执叁份。']],
            'table' => [
                'columns' => [
                    [
                        'width' => 7,
                        'name' => '序号',
                    ], [
                        'width' => 30,
                        'name' => '废物名称',
                    ], [
                        'width' => 11,
                        'name' => '废物类别',
                    ], [
                        'width' => 11,
                        'name' => '废物代码',
                    ], [
                        'width' => 11,
                        'name' => '年申报量',
                    ], [
                        'width' => 8,
                        'name' => '性状',
                    ], [
                        'width' => 11,
                        'name' => '包装方式',
                    ], [
                        'width' => 11,
                        'name' => '含税单价(元/吨)',
                    ],
                ],
                'items' => $params['p8'],
            ],
        ];

        // 加载 HTML 内容并生成 PDF
        $pdf = PdfFacade::loadView('pdf.generate_2', $params);

        return match ($params['type']) {
            'download' => $pdf->download(),
            'stream' => $pdf->stream(),
            'html' => view('pdf.generate_2', $params),
            default => $url,
        };
    }

    public static function generate_3(Request $request): Response|View|string
    {
        $params = $request::validate([
            'type' => 'present|string|nullable',
            'p1' => 'present|string|nullable',
            'p2' => 'present|string|nullable',
            'p3' => 'present|string|nullable',
            'p4' => 'present|string|nullable',
            'p5' => 'present|string|nullable',
            //
            'p6' => 'present|string|nullable',
            'p7' => 'present|string|nullable',
            'p8' => 'required|json',
            'p9' => 'present|string|nullable',
            'p10' => 'present|string|nullable',
            'p11' => 'present|string|nullable',
            'p12' => 'present|string|nullable',
            'p13' => 'present|string|nullable',
        ]);

        $params = collect($params)->map(function (mixed $value) {
            return is_null($value) ? '' : $value;
        })->toArray();

        $url = urldecode(route('generate_3', array_merge($params, ['type' => 'stream'])));

        $params['p6'] = explode('-', $params['p6']);
        $params['p8'] = json_decode($params['p8'], true);
        $params['p10'] = explode('-', $params['p10']);
        $params['p11'] = explode('-', $params['p11']);

        $params = [
            ...$params,
            'par1' => [
                ['甲乙双方于'],
                [$params['p6'][0], self::$styles[0]],
                ['年'],
                [$params['p6'][1], self::$styles[0]],
                ['月', ''],
                [$params['p6'][2], self::$styles[0]],
                ['日共同签署了《危险废物处置合同》（编号：', ''],
                [$params['p7'], self::$styles[1]],
                ['），双方本着互惠互利的原则，就原合同中未尽事项，特订立以下补充协议：', ''],
            ],
            'par2' => [['一、废物种类、数量、处置费：']],
            'par3' => [
                ['二、除上述变更外，废物质量标准、结算方式等其它一切条款按原《危险废物处置合同》（编号'],
                [$params['p9'], self::$styles[1]],
                ['）执行。'],
            ],
            'par4' => [
                ['三、协议有效期自', ''],
                [$params['p10'][0], self::$styles[1]],
                ['年', ''],
                [$params['p10'][1], self::$styles[1]],
                ['月', ''],
                [$params['p10'][2], self::$styles[1]],
                ['日起至', ''],
                [$params['p11'][0], self::$styles[1]],
                ['年', ''],
                [$params['p11'][1], self::$styles[1]],
                ['月', ''],
                [$params['p11'][2], self::$styles[1]],
                ['日止。', ''],
            ],
            'par5' => [
                ['四、本协议生效后，即成为《危险废物处置合同》（编号：'],
                [$params['p12'], self::$styles[1]],
                ['）不可分割的组成部分，具有同等法律效应。'],
            ],
            'par6' => [['五、本协议如发生纠纷，双方将采取友好协商方式合理解决。']],
            'par7' => [['六、本补充协议一式陆份，经双方签字盖章后生效，甲、乙双方各执叁份。']],
            'table' => [
                'columns' => [
                    [
                        'width' => 5,
                        'name' => '序号',
                    ], [
                        'width' => 30,
                        'name' => '废物名称',
                    ], [
                        'width' => 12,
                        'name' => '废物类别',
                    ], [
                        'width' => 12,
                        'name' => '废物代码',
                    ], [
                        'width' => 11,
                        'name' => '年申报量(吨)',
                    ], [
                        'width' => 15,
                        'name' => '原含税单价（元/吨）',
                    ], [
                        'width' => 15,
                        'name' => '现含税单价（元/吨）',
                    ],
                ],
                'items' => $params['p8'],
            ],
        ];

        // 加载 HTML 内容并生成 PDF
        $pdf = PdfFacade::loadView('pdf.generate_3', $params);

        return match ($params['type']) {
            'download' => $pdf->download(),
            'stream' => $pdf->stream(),
            'html' => view('pdf.generate_3', $params),
            default => $url,
        };
    }

    public static function generate_4(Request $request): Response|View|string
    {
        $params = $request::validate([
            'type' => 'present|string|nullable',
            'p1' => 'present|string|nullable',
            //
            'p2' => 'present|string|nullable',
            'p3' => 'present|string|nullable',
            'p4' => 'present|string|nullable',
            'p5' => 'present|string|nullable',
            'p6' => 'present|string|nullable',
            //
            'p7' => 'present|string|nullable',
            'p8' => 'present|string|nullable',
            'p9' => 'required|json',
            'p10' => 'present|string|nullable',
            'p11' => 'present|string|nullable',
            'p12' => 'present|string|nullable',
            'p13' => 'present|string|nullable',
            'p14' => 'present|string|nullable',
        ]);

        $params = collect($params)->map(function (mixed $value) {
            return is_null($value) ? ' ' : $value;
        })->toArray();

        $url = urldecode(route('generate_4', array_merge($params, ['type' => 'stream'])));

        $params['p7'] = explode('-', $params['p7']);
        $params['p9'] = json_decode($params['p9'], true);
        $params['p11'] = explode('-', $params['p11']);
        $params['p12'] = explode('-', $params['p12']);

        $params = [
            ...$params,
            'par1' => [
                ['甲乙双方于'],
                [$params['p7'][0], self::$styles[0]],
                ['年'],
                [$params['p7'][1], self::$styles[0]],
                ['月', ''],
                [$params['p7'][2], self::$styles[0]],
                ['日共同签署了《危险废物处置合同》（编号：', ''],
                [$params['p8'], self::$styles[1]],
                ['），双方本着互惠互利的原则，就原合同中委托处置数量不足事项，特订立以下补充协议：', ''],
            ],
            'par2' => [['一、废物种类、数量：']],
            'par3' => [
                ['二、除上述变更外，价格、废物质量标准、结算方式等其它一切条款按原《危险废物处置合同》（编号'],
                [$params['p10'], self::$styles[1]],
                ['）执行。'],
            ],
            'par4' => [
                ['三、协议有效期自', ''],
                [$params['p11'][0], self::$styles[1]],
                ['年', ''],
                [$params['p11'][1], self::$styles[1]],
                ['月', ''],
                [$params['p11'][2], self::$styles[1]],
                ['日起至', ''],
                [$params['p12'][0], self::$styles[1]],
                ['年', ''],
                [$params['p12'][1], self::$styles[1]],
                ['月', ''],
                [$params['p12'][2], self::$styles[1]],
                ['日止。', ''],
            ],
            'par5' => [
                ['四、本协议生效后，即成为《危险废物处置合同》（编号：'],
                [$params['p13'], self::$styles[1]],
                ['）不可分割的组成部分，具有同等法律效应。'],
            ],
            'par6' => [['五、本协议如发生纠纷，双方将采取友好协商方式合理解决。']],
            'par7' => [['六、本补充协议一式陆份，经双方签字盖章后生效，甲、乙双方各执叁份。']],
            'table' => [
                'columns' => [
                    [
                        'width' => 7,
                        'name' => '序号',
                    ], [
                        'width' => 36,
                        'name' => '废物名称',
                    ], [
                        'width' => 11,
                        'name' => '废物类别',
                    ], [
                        'width' => 11,
                        'name' => '废物代码',
                    ], [
                        'width' => 11,
                        'name' => '年申报量（吨）',
                    ], [
                        'width' => 11,
                        'name' => '性状',
                    ], [
                        'width' => 13,
                        'name' => '含税单价（元/吨）',
                    ],
                ],
                'items' => $params['p9'],
            ],
        ];

        // 加载 HTML 内容并生成 PDF
        $pdf = PdfFacade::loadView('pdf.generate_4', $params);

        return match ($params['type']) {
            'download' => $pdf->download(),
            'stream' => $pdf->stream(),
            'html' => view('pdf.generate_4', $params),
            default => $url,
        };
    }

    public static function generate_5(Request $request): Response|View|string
    {
        $params = $request::validate([
            'type' => 'present|string|nullable',
            'data' => 'required|json',
        ]);

        $params = collect($params)->map(function (mixed $value) {
            return is_null($value) ? ' ' : $value;
        })->toArray();

        $params['data'] = json_decode($params['data'], true);

        $viewParams = [
            'columns' => [
                [
                    'width' => 3,
                    'name' => "序号",
                ], [
                    'width' => 5,
                    'name' => "区域组别",
                ], [
                    'width' => 5,
                    'name' => "区域组长",
                ], [
                    'width' => 5,
                    'name' => "危废名称",
                ], [
                    'width' => 5,
                    'name' => "包装方式",
                ], [
                    'width' => 10,
                    'name' => "产废单位",
                ], [
                    'width' => 8,
                    'name' => "来样时间",
                ], [
                    'width' => 5,
                    'name' => '数量/t',
                ], [
                    'width' => 5,
                    'name' => 'pH',
                ], [
                    'width' => 5,
                    'name' => "固含量(%)",
                ], [
                    'width' => 5,
                    'name' => "灰分(%)",
                ], [
                    'width' => 5,
                    'name' => "硫含量(%)",
                ], [
                    'width' => 5,
                    'name' => "热值(J/g)",
                ], [
                    'width' => 5,
                    'name' => "氟含量(mg/L)",
                ], [
                    'width' => 5,
                    'name' => "氯含量(%)",
                ], [
                    'width' => 5,
                    'name' => "总磷",
                ], [
                    'width' => 10,
                    'name' => "超限说明"
                ]
            ],
            'items' => $params['data'],
        ];

        $url = urldecode(route('generate_5', array_merge($params, ['type' => 'stream'])));

        // 加载 HTML 内容并生成 PDF
        $pdf = PdfFacade::loadView('pdf.generate_5', $viewParams)
            ->setPaper('a4', 'landscape');

        return match ($params['type']) {
            'download' => $pdf->download(),
            'stream' => $pdf->stream(),
            'html' => view('pdf.generate_5', $viewParams),
            default => $url,
        };
    }

}
