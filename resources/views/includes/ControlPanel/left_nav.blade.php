<div class="my-5 pb-5">
    <div class="accordion accordion-flush" id="left_nav_accordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed without_arrow" type="button">
                    <a href="{{ url('/control/panel/overview') }}" class="text-decoration-none">
                        @if ($activeNav === 'Overview')
                            <img src="{{ asset('/storage/images/default/ControlPanel/icons8-overview-328c59-20.png') }}" alt="Overview">
                            <span class="text_color_default  fw-bold">Overview</span>
                        @else
                            <img src="{{ asset('/storage/images/default/ControlPanel/icons8-overview-757575-20.png') }}" alt="Overview">
                            <span class="text_color_7 ">Overview</span>
                        @endif
                    </a>
                </button>
            </h2>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="operation_heading">
                @if($activeNav === 'Operation - Accounts' || $activeNav === 'Operation - Posted Items')
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#operation_body" aria-expanded="true" aria-controls="operation_body">
                        <a href="javascript:void(0)" class="text-decoration-none">
                            <img src="{{ asset('/storage/images/default/ControlPanel/icons8-operation-328c59-20.png') }}" alt="Messages">
                            <span class="text_color_default fw-bold">Operation</span>
                        </a>
                    </button>
                @else
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#operation_body" aria-expanded="false" aria-controls="operation_body">
                        <a href="javascript:void(0)" class="text-decoration-none">
                            <img src="{{ asset('/storage/images/default/ControlPanel/icons8-operation-757575-20.png') }}" alt="Messages">
                            <span class="text_color_7">Operation</span>
                        </a>
                    </button>
                @endif
            </h2>
            <div id="operation_body" class="accordion-collapse collapse @if ($activeNav === 'Operation - Accounts' || $activeNav === 'Operation - Posted Items') show @endif" aria-labelledby="operation_heading" data-bs-parent="#left_nav_accordion">
                <div class="accordion-body">
                    <div class="ps-4"><a href="{{ url('/control/panel/operation/account') }}" class="text-decoration-none @if ($activeNav === 'Operation - Accounts') text_color_default fw-bold @endif ">Accounts</a></div>
                    <div class="ps-4"><a href="{{ url('/control/panel/operation/posted-items') }}" class="text-decoration-none @if ($activeNav === 'Operation - Posted Items') text_color_default fw-bold @endif ">Posted Items</a></div>
                </div>
            </div>
        </div>


        <div class="accordion-item">
            <h2 class="accordion-header" id="configuration_heading">
                @if($activeNav === 'Configuration - Category Type' || $activeNav === 'Configuration - Section' || $activeNav === 'Configuration - Property' || $activeNav === 'Configuration - Category')
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#configuration_body" aria-expanded="true" aria-controls="configuration_body">
                        <a href="javascript:void(0)" class="text-decoration-none">
                            <img src="{{ asset('/storage/images/default/ControlPanel/icons8-configuration-328c59-20.png') }}" alt="Configuration">
                            <span class="text_color_default fw-bold">Configuration</span>
                        </a>
                    </button>
                @else
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#configuration_body" aria-expanded="false" aria-controls="configuration_body">
                        <a href="javascript:void(0)" class="text-decoration-none">
                            <img src="{{ asset('/storage/images/default/ControlPanel/icons8-configuration-757575-20.png') }}" alt="Configuration">
                            <span class="text_color_7">Configuration</span>
                        </a>
                    </button>
                @endif
            </h2>
            <div id="configuration_body" class="accordion-collapse collapse @if ($activeNav === 'Configuration - Category Type' || $activeNav === 'Configuration - Section' || $activeNav === 'Configuration - Property' || $activeNav === 'Configuration - Category') show @endif" aria-labelledby="configuration_heading" data-bs-parent="#left_nav_accordion">
                <div class="accordion-body">
                    <div class="ps-4"><a href="{{ url('/control/panel/configuration/category-type') }}" class="text-decoration-none @if ($activeNav === 'Configuration - Category Type') text_color_default fw-bold @endif ">Category Type</a></div>
                    <div class="ps-4"><a href="{{ url('/control/panel/configuration/section') }}" class="text-decoration-none @if ($activeNav === 'Configuration - Section') text_color_default fw-bold @endif ">Section</a></div>
                    <div class="ps-4"><a href="{{ url('/control/panel/configuration/property') }}" class="text-decoration-none @if ($activeNav === 'Configuration - Property') text_color_default fw-bold @endif ">Property</a></div>
                    <div class="ps-4"><a href="{{ url('/control/panel/configuration/category') }}" class="text-decoration-none @if ($activeNav === 'Configuration - Category') text_color_default fw-bold @endif ">Category</a></div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="settings_heading">
                @if($activeNav === 'Settings - Sales Tax')
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#settings_body" aria-expanded="true" aria-controls="settings_body">
                        <a href="javascript:void(0)" class="text-decoration-none">
                            <img src="{{ asset('/storage/images/default/ControlPanel/icons8-settings-328c59-20.png') }}" alt="Settings">
                            <span class="text_color_default fw-bold">Settings</span>
                        </a>
                    </button>
                @else
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#settings_body" aria-expanded="false" aria-controls="settings_body">
                        <a href="javascript:void(0)" class="text-decoration-none">
                            <img src="{{ asset('/storage/images/default/ControlPanel/icons8-settings-757575-20.png') }}" alt="Settings">
                            <span class="text_color_7 ">Settings</span>
                        </a>
                    </button>
                @endif
            </h2>
            <div id="settings_body" class="accordion-collapse collapse @if ($activeNav === 'Settings - Sales Tax') show @endif" aria-labelledby="settings_heading" data-bs-parent="#left_nav_accordion">
                <div class="accordion-body">
                    <div class="ps-4"><a href="{{ url('/control/panel/settings/sales-tax') }}" class="text-decoration-none @if ($activeNav === 'Settings - Sales Tax') text_color_default fw-bold @endif ">Sales Tax</a></div>
                </div>
            </div>
            <div id="settings_body" class="accordion-collapse collapse @if ($activeNav === 'Settings - Shipping Carriers') show @endif" aria-labelledby="settings_heading" data-bs-parent="#left_nav_accordion">
                <div class="accordion-body">
                    <div class="ps-4"><a href="{{ url('/control/panel/settings/shipping-carriers') }}" class="text-decoration-none @if ($activeNav === 'Settings - Shipping Carriers') text_color_default fw-bold @endif ">Shipping Carriers</a></div>
                </div>
            </div>
        </div>


        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed without_arrow" type="button">
                    <a href="{{ url('/control/panel/notification') }}" class="text-decoration-none">
                        @if ($activeNav === 'Notification')
                            <img src="{{ asset('/storage/images/default/ControlPanel/icons8-notification-328c59-20.png') }}" alt="Notification">
                            <span class="text_color_default fw-bold">Notification</span>
                        @else
                            <img src="{{ asset('/storage/images/default/ControlPanel/icons8-notification-757575-20.png') }}" alt="Notification">
                            <span class="text_color_7">Notification</span>
                        @endif
                    </a>
                </button>
            </h2>
        </div>
    </div>


</div>


<script type="text/javascript">


</script>
