@inject('moduleService', 'App\Services\ModuleService')
@inject('permissionService', 'App\Services\PermissionService')
@inject('menuService', 'App\Services\MenuService')

@foreach ($moduleService->find(module()['name'])['menus'] as $index=> $menu)
@if($permissionService->menuGroupAccess(site(),module(),$menu))
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo{{ $index }}"
        aria-expanded="true" aria-controls="collapseTwo{{ $index }}">
        <i class="{{ $menu['icon']??'fas fa-check-square' }}"></i>
        <span>{{ $menu['title'] }} </span>
    </a>
    <div id="collapseTwo{{ $index }}" class="collapse {{ $index==session('module_menu_index')?'show':'' }}"
        aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @foreach ($menu['items'] as $i=>$item)
            @if(access($item['permission'],false))
            <a class="collapse-item" href="{{ route('module.menu.entry',[$index.'-'. $i] ) }}">
                {{ $item['title'] }}
            </a>
            @endif
            @endforeach
        </div>
    </div>
</li>
@endif
@endforeach
