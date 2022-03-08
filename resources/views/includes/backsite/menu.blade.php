<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'active' : '' }}">
                <a href="{{ route('backsite.dashboard.index') }}">
                    <i
                        class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}"></i><span
                        class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>

            <li class=" navigation-header"><span data-i18n="Application">Application</span><i class="la la-ellipsis-h"
                    data-toggle="tooltip" data-placement="right" data-original-title="Application"></i>
            </li>

            @can('management_access')
                <li class=" nav-item"><a href="#"><i
                            class="{{ request()->is('backsite/permissions') || request()->is('backsite/permissions/*') || request()->is('backsite/*/permissions') || request()->is('backsite/*/permissions/*') || request()->is('backsite/roles') || request()->is('backsite/roles/*') || request()->is('backsite/*/roles') || request()->is('backsite/*/roles/*') || request()->is('backsite/users') || request()->is('backsite/users/*') || request()->is('backsite/*/users') || request()->is('backsite/*/users/*') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                            class="menu-title" data-i18n="Management Access">Management Access</span></a>
                    <ul class="menu-content">

                        @can('permission_access')
                            <li
                                class="{{ request()->is('backsite/permissions') || request()->is('backsite/permissions/*') || request()->is('backsite/*/permissions') || request()->is('backsite/*/permissions/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.permissions.index') }}">
                                    <i></i><span>Permission</span>
                                </a>
                            </li>
                        @endcan

                        @can('role_access')
                            <li
                                class="{{ request()->is('backsite/roles') || request()->is('backsite/roles/*') || request()->is('backsite/*/roles') || request()->is('backsite/*/roles/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.roles.index') }}">
                                    <i></i><span>Roles</span>
                                </a>
                            </li>
                        @endcan

                        @can('user_access')
                            <li
                                class="{{ request()->is('backsite/users') || request()->is('backsite/users/*') || request()->is('backsite/*/users') || request()->is('backsite/*/users/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.users.index') }}">
                                    <i></i><span>Users</span>
                                </a>
                            </li>
                        @endcan
                        
                    </ul>
                </li>
            @endcan

            @can('master_data_access')
                <li class=" nav-item"><a href="#"><i class=" {{ request()->is('backsite/country') || request()->is('backsite/country/*') || request()->is('backsite/*/country') || request()->is('backsite/*/country/*') || request()->is('backsite/province') || request()->is('backsite/province/*') || request()->is('backsite/*/province') || request()->is('backsite/*/province/*') || request()->is('backsite/regency') || request()->is('backsite/regency/*') || request()->is('backsite/*/regency') || request()->is('backsite/*/regency/*') || request()->is('backsite/district') || request()->is('backsite/district/*') || request()->is('backsite/*/district') || request()->is('backsite/*/district/*') || request()->is('backsite/user_type') || request()->is('backsite/user_type/*') || request()->is('backsite/*/user_type') || request()->is('backsite/*/user_type/*') || request()->is('backsite/category_complaint') || request()->is('backsite/category_complaint/*') || request()->is('backsite/*/category_complaint') || request()->is('backsite/*/category_complaint/*') ? 'bx bx-purchase-tag bx-flashing' : 'bx bx-purchase-tag' }} "></i><span class="menu-title" data-i18n="Master Data">Master Data</span></a>
                    <ul class="menu-content">

                        @can('country_access', 'province_access', 'regency_access', 'district_access')
                            <li><a class="menu-item" href="#"><i></i><span data-i18n="Area">Area</span></a>
                                <ul class="menu-content">

                                    <div class="dropdown-divider ml-5 mb-1"></div>

                                    @can('country_access')
                                        <li class="{{ request()->is('backsite/country') || request()->is('backsite/country/*') || request()->is('backsite/*/country') || request()->is('backsite/*/country/*') ? 'active' : '' }} ">
                                            <a class="menu-item" href="{{ route('backsite.country.index') }}">
                                                <i></i><span>Country</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('province_access')
                                        <li class="{{ request()->is('backsite/province') || request()->is('backsite/province/*') || request()->is('backsite/*/province') || request()->is('backsite/*/province/*') ? 'active' : '' }} ">
                                            <a class="menu-item" href="{{ route('backsite.province.index') }}">
                                                <i></i><span>Province</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('regency_access')
                                        <li class="{{ request()->is('backsite/regency') || request()->is('backsite/regency/*') || request()->is('backsite/*/regency') || request()->is('backsite/*/regency/*') ? 'active' : '' }} ">
                                            <a class="menu-item" href="{{ route('backsite.regency.index') }}">
                                                <i></i><span>Regency</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('district_access')
                                        <li class="{{ request()->is('backsite/district') || request()->is('backsite/district/*') || request()->is('backsite/*/district') || request()->is('backsite/*/district/*') ? 'active' : '' }} ">
                                            <a class="menu-item" href="{{ route('backsite.district.index') }}">
                                                <i></i><span>District</span>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcan

                        @can('user_type_access')
                             <li><a class="menu-item" href="#"><i></i><span data-i18n="Human Resource">Human Resource</span></a>
                                <ul class="menu-content">

                                    <div class="dropdown-divider ml-5 mb-1"></div>

                                    @can('user_type_access')
                                        <li class="{{ request()->is('backsite/user_type') || request()->is('backsite/user_type/*') || request()->is('backsite/*/user_type') || request()->is('backsite/*/user_type/*') ? 'active' : '' }} ">
                                            <a class="menu-item" href="{{ route('backsite.user_type.index') }}">
                                                <i></i><span>User Type</span>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                             </li>
                        @endcan

                        @can('category_complaint_access')
                            <li
                                class="{{ request()->is('backsite/category_complaint') || request()->is('backsite/category_complaint/*') || request()->is('backsite/*/category_complaint') || request()->is('backsite/*/category_complaint/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.category_complaint.index') }}">
                                    <i></i><span>Category Complaint</span>
                                </a>
                            </li>
                        @endcan
                        
                    </ul>
                </li>
            @endcan

            @can('operational_access')
                <li class=" nav-item"><a href="#"><i class="{{ request()->is('backsite/complaint') || request()->is('backsite/complaint/*') || request()->is('backsite/*/complaint') || request()->is('backsite/*/complaint/*') || request()->is('backsite/complaint_response') || request()->is('backsite/complaint_response/*') || request()->is('backsite/*/complaint_response') || request()->is('backsite/*/complaint_response/*')  ? 'bx bx-layer-plus bx-flashing' : 'bx bx-layer-plus' }}"></i><span class="menu-title" data-i18n="Operational">Operational</span></a>
                    <ul class="menu-content">

                        @can('complaint_access')
                            <li
                                class="{{ request()->is('backsite/complaint') || request()->is('backsite/complaint/*') || request()->is('backsite/*/complaint') || request()->is('backsite/*/complaint/*') || request()->is('backsite/complaint_response') || request()->is('backsite/complaint_response/*') || request()->is('backsite/*/complaint_response') || request()->is('backsite/*/complaint_response/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.complaint.index') }}">
                                    <i></i><span>Complaint</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

        </ul>
    </div>
</div>

<!-- END: Main Menu-->
