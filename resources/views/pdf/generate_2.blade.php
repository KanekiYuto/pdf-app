<x-pdf-layout>
    @include('pdf.header', [
        'title' => '危废代码新增补充协议',
        'firstParty' => [
            $p1,
            $p2,
            $p3,
            $p4,
            $p5
        ],
        'secondParty' => [
            '绍兴凤登环保有限公司',
            '绍兴市斗门镇临海路1号',
            '章磊',
            '龚晨',
            '18358993678'
        ],
    ])
    <br/>
    <div>
        @include('pdf.paragraph', [
            'indentation' => true,
            'paragraph' => $par1,
        ])

        @include('pdf.paragraph', [
            'indentation' => false,
            'paragraph' => $par2,
        ])

        @include('pdf.table', [
            'columns' => $table['columns'],
            'items' => $table['items'],
        ])

        @include('pdf.paragraph', [
            'indentation' => false,
            'paragraph' => $par3,
        ])

        @include('pdf.paragraph', [
            'indentation' => false,
            'paragraph' => $par4,
        ])

        @include('pdf.paragraph', [
            'indentation' => false,
            'paragraph' => $par5,
        ])

        @include('pdf.paragraph', [
            'indentation' => false,
            'paragraph' => $par6,
        ])

        @include('pdf.paragraph', [
            'indentation' => false,
            'paragraph' => $par7,
        ])
    </div>
    <br/>
    @include('pdf.footer', [
        'information' => [
            '',
            '绍兴凤登环保有限公司',
            '',
            '',
            $p13
        ]
    ])
</x-pdf-layout>
