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
                <a href="/clients">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Clients</p>
                </a>
            </li>

            <li @if ($pageSlug == 'providers') class="active " @endif>
                <a href="/products/{{$StockId}}">
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
                        <li @if ($pageSlug == 'tstats') class="active " @endif>
                            <a href="">
                                <i class="tim-icons icon-chart-pie-36"></i>
                                <p>Statistics</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'transactions') class="active " @endif>
                            <a href="">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'sales') class="active " @endif>
                            <a href="">
                                <i class="tim-icons icon-bag-16"></i>
                                <p>Sales</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'expenses') class="active " @endif>
                            <a href="">
                                <i class="tim-icons icon-coins"></i>
                                <p>Expenses</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'incomes') class="active " @endif>
                            <a href="">
                                <i class="tim-icons icon-credit-card"></i>
                                <p>Income</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'transfers') class="active " @endif>
                            <a href="">
                                <i class="tim-icons icon-send"></i>
                                <p>Transfers</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'payments') class="active " @endif>
                            <a href="">
                                <i class="tim-icons icon-money-coins"></i>
                                <p>Payments</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>



        </ul>
    </div>
</div>
