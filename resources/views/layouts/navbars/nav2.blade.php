<div class="sidebar">
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-bar-32"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li @if ($pageSlug == 'clients') class="active " @endif>
                <a href="/clients/{{$StockId}}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Clients</p>
                </a>
            </li>

            <li @if ($pageSlug == 'products') class="active " @endif>
                <a href="/stock/products/{{$StockId}}">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p>Products</p>
                </a>
            </li>

            <li>
                <a data-toggle="collapse" href="#transactions" {{ $section == 'transactions' ? 'aria-expanded=true' : '' }}>
                    <i class="tim-icons icon-bank" ></i>
                    <span class="nav-link-text">Transactions</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse {{ $section == 'transactions' ? 'show' : '' }}" id="transactions">
                    <ul class="nav pl-4">
{{--                        <li @if ($pageSlug == 'payments') class="active " @endif>--}}
{{--                            <a href="/payments/{{$StockId}}/">--}}
{{--                                <i class="tim-icons icon-chart-pie-36"></i>--}}
{{--                                <p>Make Payment</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li @if ($pageSlug == 'cart') class="active " @endif>
                            <a href="/cart/{{$StockId}}/">
                                <i class="tim-icons icon-cart"></i>
                                <p>Cart</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'stockhistory') class="active " @endif>
                            <a href="/stock_history/{{$StockId}}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>Stock History</p>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#debt" {{ $section == 'debt' ? 'aria-expanded=true' : '' }}>
                    <i class="tim-icons icon-bank" ></i>
                    <span class="nav-link-text">Debt</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse {{ $section == 'debt' ? 'show' : '' }}" id="debt">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'cart') class="active " @endif>
                            <a href="/create_debt/{{$StockId}}">
                                <i class="tim-icons icon-cart"></i>
                                <p> Create Debt</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'cart') class="active " @endif>
                            <a href="/create_debt/{{$StockId}}/">
                                <i class="tim-icons icon-cart"></i>
                                <p>Add Products To Debt</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'stockhistory') class="active " @endif>
                            <a href="/debt_history/{{$StockId}}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>Debt History</p>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>



        </ul>
    </div>
</div>
