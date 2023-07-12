<div>
    <div class="col-2">
        <a class="btn btn-light py-3 px-5 text-black w-100" href="{{ route('admin.pages') }}">Back</a>
    </div>
    <div class="row">

        <div class="col-lg-12">
            {{-- <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" /> --}}

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $name }}</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col" style="text-align: left;" class="px-2">Section</th>
                                    <th scope="col">Display on homepage</th>
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
                                            {{ //  $item->title ??
                                                $item->origin_title }}
                                        </td>
                                        <td>
                                            @livewire('admin.supports.toggle-switch', ['model' => $item, 'field' => 'active'], key($item->id))
                                        </td>
                                        <td style="text-align: right;">
                                            {{-- @if ($item['has_items'])
                                                @if ( $item->route == 'news')
                                                <a href="{{ route('admin.blog.items') }}"
                                                    class="px-2">
                                                    <i class="fa fa-images" title="Edit content"></i>
                                                </a>
                                                @else
                                                    
                                                <a href="{{ route('admin.' . $item->route . '.items') }}"
                                                    class="px-2">
                                                    <i class="fa fa-images" title="Edit content"></i>
                                                </a>
                                                @endif
                                            @endif --}}
                                            @if ($item->route != 'slider')
                                                <a href="{{ route('admin.sections.' . $item->route) }}" class="px-2">
                                                    <i class="fa fa-edit" title="Edit section"></i>
                                                </a>
                                            @endif
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
</div>
