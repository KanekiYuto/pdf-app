<x-pdf-layout>
    @include('pdf.header', [
        'title' => '委托处置增量补充协议',
        'firstParty' => [
            $p2,
            $p3,
            $p4,
            $p5,
            $p6
        ],
        'secondParty' => [
            '绍兴凤登环保有限公司',
            '绍兴市斗门镇临海路1号',
            '章磊',
            '唐晓峰',
            '13905896007'
        ],
        'showContractNumber' => true,
        'contractNumber' => $p1,
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
            $p14
        ]
    ])
</x-pdf-layout>
