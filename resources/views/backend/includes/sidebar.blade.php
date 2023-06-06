<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                @can('dashboard index')
                    <li>
                        <a href="{{ route('backend.dashboard') }}" class="waves-effect">
                            <i class="ri-home-4-fill"></i>
                            <span>@lang('backend.dashboard')</span>
                        </a>
                    </li>
                @endcan
                @can('slider index')
                    <li>
                        <a href="{{ route('backend.slider.index') }}" class="waves-effect">
                            <i class="ri-equalizer-fill"></i>
                            <span>@lang('backend.slider')</span>
                        </a>
                    </li>
                @endcan
                @can('category index')
                    <li>
                        <a href="{{ route('backend.category.index') }}" class="waves-effect">
                            <i class="ri-list-check"></i>
                            <span>@lang('backend.category')</span>
                        </a>
                    </li>
                @endcan
                @can('products index')
                    <li>
                        <a href="{{ route('backend.products.index') }}" class="waves-effect">
                            <i class="ri-shopping-basket-fill"></i>
                            <span>@lang('backend.prdoucts')</span>
                        </a>
                    </li>
                @endcan


                @canany(['about index','contact-info index','social index'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-building-fill"></i>
                            <span>@lang('backend.company')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('about index')
                                <li>
                                    <a href="{{ route('backend.about.index') }}" class="waves-effect">
                                        <i class="ri-building-fill"></i>
                                        <span>@lang('backend.about')</span>
                                    </a>
                                </li>
                            @endcan
                            @can('contact-info index')
                                <li>
                                    <a href="{{ route('backend.contact-info.index') }}" class="waves-effect">
                                        <i class="ri-building-fill"></i>
                                        <span>@lang('backend.contact-info')</span>
                                    </a>
                                </li>
                            @endcan
                            @can('social index')
                                <li>
                                    <a href="{{ route('backend.social.index') }}" class="waves-effect">
                                        <i class="ri-instagram-fill"></i>
                                        <span>@lang('backend.social')</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany


               
                @can('message index')
                    <li>
                        <a href="{{ route('backend.message.index') }}" class="waves-effect">
                            <i class="ri-mail-fill"></i>
                            <span>@lang('backend.message')</span>
                        </a>
                    </li>
                @endcan
                <li class="menu-title">@lang('backend.site-setting')</li>
                @can('languages index')
                    <li>
                        <a href="{{ route('backend.site-languages.index') }}" class="waves-effect">
                            <i class="fas fa-language"></i>
                            <span>@lang('backend.languages')</span>
                        </a>
                    </li>
                @endcan
                @can('users index')
                    <li class="menu-title">@lang('backend.ap-setting')</li>

                    <li>
                        <a href="{{ route('backend.users.index') }}" class=" waves-effect">
                            <i class="ri-account-circle-fill"></i>
                            <span>@lang('backend.users')</span>
                        </a>
                    </li>
                @endcan
                @can('permissions index')
                    <li>
                        <a href="{{ route('backend.permissions.index') }}" class=" waves-effect">
                            <i class="ri-lock-2-fill"></i>
                            <span>@lang('backend.permissions')</span>
                        </a>
                    </li>
                @endcan
                @can('new-permission index')
                    <li>
                        <a href="{{ route('backend.givePermission') }}" class=" waves-effect">
                            <i class="ri-lock-unlock-fill"></i>
                            <span>@lang('backend.give-permission')</span>
                        </a>
                    </li>
                @endcan
                @can('report index')
                    <li>
                        <a href="{{ route('backend.report') }}" class="waves-effect">
                            <i class="fas fa-file"></i>
                            <span>@lang('backend.report')</span>
                        </a>
                    </li>
                @endcan
                @can('information index')
                    <li class="menu-title">@lang('backend.user-setting')</li>
                    <li>
                        <a href="{{ route('backend.my-informations.index') }}" class=" waves-effect">
                            <i class="ri-information-fill"></i>
                            <span>@lang('backend.informations')</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
