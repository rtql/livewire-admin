<div>
    <div class="row">
        <div class="row pb-3">
            <div class="col-2">
                <a class="btn btn-light py-3 px-5 text-black w-100" href="
                {{-- {{ route('admin.pages.create') }} --}}
                ">Create New
                    Page</a>
            </div>
        </div>
        <div class="col-lg-12">
            {{-- <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" /> --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $name }}s</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col" style="text-align: left;" class="px-2">Page</th>
                                    <th scope="col" class="px-2">
                                        {{-- empty for subpages --}}
                                    </th>
                                    <th scope="col">Active</th>
                                    <th scope="col" style="text-align: right;">Options</th>
                                </tr>
                            </thead>
                            <tbody wire:sortable="updateOrdering" class="text-center">
                                @foreach ($items as $item)
                                    <tr wire:sortable.item="{{ $item->id }}" wire:key="slide-{{ $item->id }}">
                                        <th scope="row" wire:sortable.handle>
                                            <i class="ni ni-bullet-list-67" id="bullet"></i>
                                        </th>
                                        <td style="text-align: left;">
                                            {{ $item->title ?: $item->origin_title }}
                                        </td>
                                        <td style="text-align: right;">
                                            @if ($item->has_pages)
                                                <a class="subpages-button"
                                                    href="{{ route('admin.subpages', ['id' => $item->id ?? null]) }}">Subpages
                                                    ({{ $item->has_pages }})</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->route !== 'landing')
                                                @livewire('admin.supports.toggle-switch', ['model' => $item, 'field' => 'active'], key($item->id))
                                            @endif
                                        </td>
                                        <td style="text-align: right;">
                                            {{-- @if ($item->route == 'custom')
                                                <a href="{{ route('admin.documents', ['id' => $item->id ?? null]) }}"
                                                    class="px-2">
                                                    <i class="fa fa-file" title="Edit documents"></i>
                                                </a>
                                                <a href="{{ route('admin.certificates', ['id' => $item->id ?? null]) }}"
                                                    class="px-2">
                                                    <i class="fa fa-award" title="Edit licences"></i>
                                                </a>
                                                <a href="{{ route('admin.media', ['id' => $item->id ?? null]) }}"
                                                    class="px-2">
                                                    <i class="fa fa-images" title="Edit gallery"></i>
                                                </a>
                                            @endif --}}

                                            {{-- @if ($item->route == 'home')
                                                <a href="{{ route('admin.landing.items') }}" class="px-2">
                                                    <i class="fa fa-pager" title="Edit sections"></i>
                                                </a>
                                                <a href="{{ route('admin.sections') }}" class="px-2">
                                                    <i class="fa fa-edit" title="Edit page"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.pages.' . $item->route, ['id' => $item->id ?? null]) }}"
                                                    class="px-2">
                                                    <i class="fa fa-edit" title="Edit page"></i>
                                                </a>
                                            @endif
                                            @if ($item->route == 'custom')
                                                <a href="" wire:click.prevent="delete({{ $item->id }})"
                                                    class="px-2">
                                                    <i class="fa fa-trash" title="Delete"></i>
                                                </a>
                                            @endif --}}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $items->links('livewire::livewire-pagination') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->
    <style>
        .subpages-button {
            border: 1px solid gray;
            padding: 5px 20px;
            border-radius: 5px;
            transition: 0.4s;
        }

        .subpages-button:hover {
            color: white;
            background-color: gray;
        }
    </style>
</div>
