<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                <i class='fa fa-bars text-white nav_logo-icon' id="header-toggle"></i>
                <span class="nav_logo-name">Inventory</span>
            </a>
            <div class="nav_list">
                @can('view-any', App\Models\Customer::class)
                    <a class="nav_link {{ (request()->segment(1) == 'customers') ? 'active' : '' }}" href="{{ route('customers.index') }}"><i class="fa fa-person-chalkboard nav_logo-icon"></i><span class="nav_name">Customers</span></a>
                @endcan
                @can('view-any', App\Models\FoodEntry::class)
                    <a class="nav_link {{ (request()->segment(1) == 'food-entries') ? 'active' : '' }}" href="{{ route('food-entries.index') }}"><i class="fa fa-utensils nav_logo-icon"></i><span class="nav_name">Food Entries</span></a>
                @endcan
                @can('view-any', App\Models\FoodOrder::class)
                    <a class="nav_link {{ (request()->segment(1) == 'food-orders') ? 'active' : '' }}" href="{{ route('food-orders.index') }}"><i class="fa fa-cart-plus nav_logo-icon"></i><span class="nav_name">Food Orders</span></a>
                @endcan
                @can('view-any', App\Models\Member::class)
                    <a class="nav_link {{ (request()->segment(1) == 'members') ? 'active' : '' }}" href="{{ route('members.index') }}"><i class="fa fa-people-group nav_logo-icon"></i><span class="nav_name">Members</span></a>
                @endcan
                @can('view-any', App\Models\MemberType::class)
                    <a class="nav_link {{ (request()->segment(1) == 'member-types') ? 'active' : '' }}" href="{{ route('member-types.index') }}"><i class="fa fa-arrow-right nav_logo-icon"></i><span class="nav_name">Member Types</span></a>
                @endcan
                @can('view-any', App\Models\StockIn::class)
                    <a class="nav_link {{ (request()->segment(1) == 'stocks-in') ? 'active' : '' }}" href="{{ route('stocks-in.index') }}"><i class="fa fa-layer-group nav_logo-icon"></i><span class="nav_name">Stocks In</span></a>
                @endcan
            </div>

        </div>
        @guest
            <div class="">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fa fa-right-from-bracket nav_logo-icon"></i> <span class="nav_name">{{ __('Login') }}</span>
                </a>

                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="fa fa-right-from-bracket nav_logo-icon"></i> <span class="nav_name">{{ __('Register') }}</span>
                    </a>
                @endif
            </div>

        @else
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="nav_link"> <i
                        class="fa fa-right-from-bracket nav_logo-icon"></i> <span class="nav_name">{{ __('Logout') }}</span> </a>
            </form>

        @endguest
    </nav>
</div>
