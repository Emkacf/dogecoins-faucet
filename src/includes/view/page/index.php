<?php defined('APP_PATH') OR die('Access denied'); ?>

<form class="form-horizontal gora" role="form" action="index.php/send" method="POST">
    <div class="form-group">
        <div class="col-sm-10">
            <input
                type="text"
                name="address"
                class="form-control input-lg"
                id="inputEmail3"
                placeholder="Input Ɖogecoin Wallet Address And Get Free Dogecoins"
            />
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-default btn-lg">To the moon!</button>
        </div>
    </div>
</form>

<p class="center">
    <?php if (1 == $status): ?>
        You gained <?php echo $doge; ?> <strong>DOGE</strong>.
        <br>
        Please donate us so there will be water in our bowl so we can give you <strong>DOGE</strong>.
        <br>
    <?php elseif (2 == $status): ?>
        Sorry but we are out of money T_T.
        <br>
        Please donate us so there will be water in our bowl so we can give you <strong>DOGE</strong>.
        <br>
    <?php elseif (3 == $status): ?>
        Sorry but you were using this faucet today. Please come back tommorrow.
        <br>
        Please donate us so there will be water in our bowl so we can give you <strong>DOGE</strong>.
        <br>
    <?php else: ?>
        This water bowl (aka "<strong>faucet</strong>") is a service
        that allows you to receive free <strong>DogeCoins</strong> by simply inputing your address.
        <br>
        Please donate us so there will be water in our bowl so we can give you <strong>DOGE</strong>.
        <br>
    <?php endif; ?>

    <?php echo $account_address; ?>
</p>

<div class="row gora2">
    <div class="col-sm-4 center">
        Average Payout:
        <br>
        <strong><?php echo $payout_average; ?></strong>
    </div>

    <div class="col-sm-4 center">
        Daily Payout:
        <br>
        <strong><?php echo $payout_daily; ?></strong>
    </div>

    <div class="col-sm-4 center">
        Total Payout:
        <br>
        <strong><?php echo $payout_total; ?></strong>
    </div>
</div>
