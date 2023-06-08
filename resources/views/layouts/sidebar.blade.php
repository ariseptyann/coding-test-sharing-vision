<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @php
                $item = [
                    'text' => 'All Post',
                    'url' => 'frontend.all_post',
                    'icon' => 'uil uil-newspaper',
                ];
                $menuAll = new MenuItem($item['text'], $item['url'], $item['icon']);
                $menuAll->isRoute();
            @endphp

            @include('layouts.sidebar-item', ['data' => $menuAll])

            @php
                $item = [
                    'text' => 'Add New',
                    'url' => 'frontend.add_new.form',
                    'icon' => 'uil uil-file-plus',
                ];
                $menuAdd = new MenuItem($item['text'], $item['url'], $item['icon']);
                $menuAdd->isRoute();
            @endphp
            @include('layouts.sidebar-item', ['data' => $menuAdd])

            @php
                $item = [
                    'text' => 'Preview',
                    'url' => 'frontend.preview',
                    'icon' => 'uil uil-eye',
                ];
                $menuPreview = new MenuItem($item['text'], $item['url'], $item['icon']);
                $menuPreview->isRoute();
            @endphp
            @include('layouts.sidebar-item', ['data' => $menuPreview])

            <li class="navigation-header">
                <span>&nbsp;</span>
            </li>
            {{-- @endcanany --}}
        </ul>
    </div>
</div>
