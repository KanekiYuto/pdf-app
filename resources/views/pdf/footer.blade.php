<style>
    .footer {

    }

    .footer .container {
        letter-spacing: 0.05rem;
        font-size: 18px;
        height: 36px;
    }
</style>

<div class="footer">
    <div class="container">
        <span style="position: absolute; left: 0;width: 200px;">甲 方（章）：{{ $information[0] }}</span>
        <span style="position: absolute; right: 0;width: 320px;">乙 方（章）：{{ $information[1] }}</span>
    </div>
    <div class="container">
        <span style="position: absolute; left: 0;width: 200px;">代表人：{{ $information[2] }}</span>
        <span style="position: absolute; right: 0;width: 320px;">代表人：{{ $information[3] }}</span>
    </div>
    <br/>
    <div class="container">
        @php
            $information[4] = date('Y 年 m 月 d 日', strtotime($information[4]));
        @endphp
        <span style="position: absolute; right: 0;width: 320px;">签订日期：{{ $information[4] }}</span>
    </div>
</div>
