<div>

    <div class="row">


        <div class="col-lg-12">
            {{-- <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" /> --}}

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Applications</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    {{-- <th scope="col">Message</th> --}}
                                    <th scope="col">Type of request</th>
                                    <th scope="col" style="text-align: end;">Options</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <th>
                                            {{ $item->id }}
                                        </th>
                                        <td>
                                            {!! \Str::limit($item->user, 35) !!}
                                        </td>
                                        <td>
                                            {!! \Str::limit($item->email, 35) !!}
                                        </td>

                                        <td>
                                            {!! \Str::limit($item->phone, 15) !!}
                                        </td>
                                        <td>
                                            {{ $item->call_source }}
                                        </td>

                                        <td style="display:flex;justify-content: flex-end;">
                                            @if ($item->seen == false)
                                                <a href="{{ route('admin.applications.read', ['id' => $item->id ?? null]) }}"
                                                    style="margin-left: 10px;" wire:click="seen({{ $item->id }})"
                                                    target="_blank" class="px-2">
                                                    <i class="fa fa-envelope" title="Unread"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.applications.read', ['id' => $item->id ?? null]) }}"
                                                style="margin-left: 10px;" wire:click="seen({{ $item->id }})"
                                                target="_blank" class="px-2">
                                                <i class="fa fa-eye" title="Show"></i>
                                            </a>
                                            <a href="" style="margin-left: 10px;"
                                                wire:click.prevent="delete({{ $item->id }})" class="px-2">
                                                <i class="fa fa-trash" title="Delete"></i>
                                            </a>
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
    @push('js')
        <script>
            $(document).ready(function() {
                $('[data-toggle="popover"]').popover();
            });
        </script>
    @endpush
</div>
