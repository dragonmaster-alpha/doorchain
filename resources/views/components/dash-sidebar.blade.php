        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
				@if($role->id === 1)
                    @include('components.dash-admin-settings')
                    @include('components.dash-admin-user')
                    @include('components.dash-admin-verification')
                    @include('components.dash-admin-property')
                    {{-- @include('components.dash-admin-logs') --}}
                @elseif ($role->id > 1)
                    @include('components.dash-wallet')
                    @include('components.dash-property')
                    @include('components.dash-list')
                    @include('components.dash-lead')

                    {{-- @include('components.dash-profile')
                    @include('components.dash-wallet')
                    @if($role->id === 2)
                        @include('components.dash-property')
                    @endif
                    @include('components.dash-logs')
                    @include('components.dash-terms')

                    @if($role->id === 3)
                        @include('components.dash-subscription')
                        @include('components.dash-estimate-owner')
                    @else
                        @include('components.dash-estimate-user')
                    @endif --}}
                @endif
                </ul>

				{{-- <div class="add-menu-sidebar">
					<p>Generate Monthly Credit Report</p>
					<a href="javascript:void(0);">
					<svg width="24" height="12" viewBox="0 0 24 12" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M23.725 5.14889C23.7248 5.14861 23.7245 5.14828 23.7242 5.148L18.8256 0.272997C18.4586 -0.0922062 17.865 -0.0908471 17.4997 0.276184C17.1345 0.643169 17.1359 1.23675 17.5028 1.602L20.7918 4.875H0.9375C0.419719 4.875 0 5.29472 0 5.8125C0 6.33028 0.419719 6.75 0.9375 6.75H20.7917L17.5029 10.023C17.1359 10.3882 17.1345 10.9818 17.4998 11.3488C17.865 11.7159 18.4587 11.7172 18.8256 11.352L23.7242 6.477C23.7245 6.47672 23.7248 6.47639 23.7251 6.47611C24.0923 6.10964 24.0911 5.51414 23.725 5.14889Z" fill="white"/>
					</svg>
					</a>
				</div> --}}
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
