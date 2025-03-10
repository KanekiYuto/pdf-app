<div
    @class(['paragraph'])
    @style(['text-indent: 2em' => $indentation])
>
    @foreach ($paragraph as $item)
        @php
            if (!isset($item[1])){
                $item[1] = [];
            }

            [$content, $classes] = $item;

            if (!is_array($classes)){
                $classes = [];
            }

            $classes = array_merge($classes, ['text']);
        @endphp
        @foreach(mb_str_split($content) as $text)
            <span @class($classes)>{{ $text }}</span>
        @endforeach
    @endforeach
</div>
