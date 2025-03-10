<style>
    .header {

    }

    .header .title {
        text-align: center;
        font-size: 24px;
        font-weight: 700;
        letter-spacing: 0.25rem;
        margin-bottom: 24px;
    }

    .header .container {

    }

    .header .container .text {
        font-size: 18px;
        white-space: pre;
    }

    .contract_number {
        font-size: 18px;
        height: 36px;
    }

    .contract_number .container {
        position: absolute;
        right: 0;
    }
</style>

<div class="header">
    <div class="title">{{ $title }}</div>
    @if(isset($showContractNumber) && $showContractNumber)
        <div class="contract_number">
            <div class="container">
                <span>编号：</span><span style="text-decoration: underline;">{{ $contractNumber }}</span>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="text">甲方（委 托 方）： {{ $firstParty[0] }}</div>
        <div class="text">注 册 地 址： {{ $firstParty[1] }}</div>
        <div class="text">法 定 代 表 人： {{ $firstParty[2] }}</div>
        <div class="text">联 系 人： {{ $firstParty[3] }}</div>
        <div class="text">联 系 电 话： {{ $firstParty[4] }}</div>
        <br/>
        <div class="text">乙方（受 托 方）：{{ $secondParty[0] }}</div>
        <div class="text">注 册 地 址：{{ $secondParty[1] }}</div>
        <div class="text">法 定 代 表 人：{{ $secondParty[2] }}</div>
        <div class="text">联 系 人：{{ $secondParty[3] }}</div>
        <div class="text">联 系 电 话：{{ $secondParty[4] }}</div>
    </div>
</div>
