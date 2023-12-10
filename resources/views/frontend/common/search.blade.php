<form class="form-estate" action="/search" method="post">
    <div class="form-group">
        <label for="estate"><?= __('messages.your_search'); ?>?</label>
        <div class="form-wrapper">
            <select class="form-control" id="estate" name="estate">
                <option value="apartment">Квартиру</option>
                <option value="house">Дом</option>
                <option value="room">Комнату</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="status"><?= __('messages.status'); ?></label>
        <div class="form-wrapper">
            <select class="form-control" id="status" name="status">
                <option value="new"><?= __('messages.new_building'); ?></option>
                <option value="secondary"><?= __('messages.secondary'); ?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="bedrooms"><?= __('messages.bedroom'); ?></label>
        <div class="form-wrapper">
            <select class="form-control" id="bedrooms" name="bedrooms">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="price"><?= __('messages.price'); ?></label>
        <div class="form-wrapper">
            <div class="form-inner">
                <input type="text" class="form-control" id="price" name="price">
                <span>-</span>
                <input type="text" class="form-control" id="price_to" name="price_to">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="currency"><?= __('messages.currency'); ?></label>
        <div class="form-wrapper">
            <select class="form-control" id="currency" name="currency">
                <option value="RUB">RUB</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="city"><?= __('messages.city'); ?></label>
        <div class="form-wrapper">
            <input type="text" class="form-control" id="city" name="city">
        </div>
    </div>
    <button type="submit" class="btn btn-blue">
        <span>
            <span><?= __('messages.search'); ?></span>
            <svg width="16" height="16"><use xlink:href="images/icons.svg#arrow"></use></svg>
        </span>
    </button>
</form>