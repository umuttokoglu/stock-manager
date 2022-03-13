<ul class="list-unstyled menu-categories ps" id="accordionExample">
    <li class="menu">
        <a href="{{ route(\App\Constants\RouteNameConstants::DASHBOARD) }}" data-active="{{ (request()->segment(1) === null) ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                <span> Yönetim Paneli</span>
            </div>
        </a>
    </li>
    <li class="menu">
        <a href="{{ route(\App\Constants\RouteNameConstants::PRODUCTS) }}"
           data-active="{{ (request()->segment(1) === 'products' || request()->segment(1) === 'product') ? 'true' : 'false' }}"
           aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                <span> Ürünler</span>
            </div>
        </a>
    </li>
    <li class="menu">
        <a href="{{ route(\App\Constants\RouteNameConstants::CUSTOMERS) }}" data-active="{{ (request()->segment(1) === 'customers') ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                <span> Müşteriler</span>
            </div>
        </a>
    </li>
    <li class="menu">
        <a href="{{ route(\App\Constants\RouteNameConstants::ORDERS) }}" data-active="{{ (request()->segment(1) === 'orders') ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                <span> Siparişler</span>
            </div>
        </a>
    </li>
</ul>
