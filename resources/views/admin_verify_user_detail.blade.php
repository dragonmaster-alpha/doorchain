<x-app-layout>
    @include('components.dash-nav-header')
    @include('components.dash-chat-box')
    @include('components.dash-header',['titletxt' => 'User Verification'])
    @include('components.dash-sidebar')
    @include('template.admin-verify-user-detail')
</x-app-layout>
