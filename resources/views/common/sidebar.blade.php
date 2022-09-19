<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                <i class='fa fa-bars text-white nav_logo-icon' id="header-toggle"></i>
                <span class="nav_logo-name">Inventory</span>
            </a>
            <div class="nav_list">
                @can('view-any', App\Models\MembershipType::class)
                    <a class="nav_link {{ (request()->segment(1) == 'membership-types') ? 'active' : '' }}" href="{{ route('membership-types.index') }}"><i class="fa fa-square nav_logo-icon"></i><span class="nav_name">Membership</span></a>
                @endcan
                @can('view-any', App\Models\Member::class)
                    <a class="nav_link {{ (request()->segment(1) == 'members') ? 'active' : '' }}" href="{{ route('members.index') }}"><i class="fa fa-people-group nav_logo-icon"></i><span class="nav_name">Members</span></a>
                @endcan
                @can('view-any', App\Models\FoodEntry::class)
                    <a class="nav_link {{ (request()->segment(1) == 'food-entries') ? 'active' : '' }}" href="{{ route('food-entries.index') }}"><i class="fa fa-utensils nav_logo-icon"></i><span class="nav_name">Food Entries</span></a>
                @endcan
                @can('view-any', App\Models\FoodOrder::class)
                    <a class="nav_link {{ (request()->segment(1) == 'food-orders') ? 'active' : '' }}" href="{{ route('food-orders.index') }}"><i class="fa fa-cart-plus nav_logo-icon"></i><span class="nav_name">Food Orders</span></a>
                @endcan


                @can('view-any', App\Models\StockIn::class)
                    <a class="nav_link {{ (request()->segment(1) == 'stocks-in') ? 'active' : '' }}" href="{{ route('stocks-in.index') }}"><i class="fa fa-layer-group nav_logo-icon"></i><span class="nav_name">Stocks In</span></a>
                @endcan

                @can('view-any', App\Models\PaymentType::class)
                    <a class="nav_link {{ (request()->segment(1) == 'payment-types') ? 'active' : '' }}" href="{{ route('payment-types.index') }}"><i class="fa fa-credit-card nav_logo-icon"></i><span class="nav_name">Payment Types</span></a>
                @endcan

                    <a class="nav_link {{ (request()->segment(1) == 'sales-report') ? 'active' : '' }}" href="{{ route('sales-report') }}"><i class="fa fa-square nav_logo-icon"></i><span class="nav_name">Sales Report</span></a>
            </div>

        </div>
    </nav>
</div>
