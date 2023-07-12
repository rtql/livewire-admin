<div>

    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$name}} Table</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Edit</th>
                                <th scope="col">Start day</th>
                                <th scope="col">End day</th>
                                <th scope="col">Season</th>
{{--                                <th scope="col"><i class="fa fa-cog"></i></th>--}}
                            </tr>
                            </thead>
                            <tbody  class="text-center">
                            @foreach($items as $key => $item)
                                <tr>
                                    <td>
                                        <button wire:click.prevent="edit({{$item->id}})">
                                            Edit
                                        </button>
                                    </td>
                                    @php
                                        $itemStartMonthDay = (\Carbon\Carbon::now()->format('Y')+1).$item->start_month_day;
                                        $itemEndMonthDay = (\Carbon\Carbon::now()->format('Y')+1).$item->end_month_day;
                                        if ((((\Carbon\Carbon::now()->format('Y').$item->end_month_day))> \Carbon\Carbon::now()))
                                        {
                                            $itemEndMonthDay = \Carbon\Carbon::now()->format('Y').$item->end_month_day;
                                        }
                                        if ((((\Carbon\Carbon::now()->format('Y').$item->start_month_day)) > \Carbon\Carbon::now()) ||  $itemEndMonthDay == \Carbon\Carbon::now()->format('Y').$item->end_month_day )
                                        {
                                            $itemStartMonthDay = \Carbon\Carbon::now()->format('Y').$item->start_month_day;
                                        }
                                    @endphp
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$itemStartMonthDay ?? ''}}</p>

                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$itemEndMonthDay ?? ''}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{!! $item->season !!}</p>
                                    </td>
{{--                                    <td class="align-middle">--}}
{{--                                        @can('room-delete')--}}
{{--                                            <a href="" style="margin-left: 10px;" wire:click.prevent="delete({{$item->id}})" class="px-2">--}}
{{--                                                <i class="fa fa-trash" title="Delete"></i>--}}
{{--                                            </a>--}}
{{--                                        @endcan--}}
{{--                                    </td>--}}
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
    @if($updateMode)
    <form wire:submit.prevent="updateSeasonPrice">

    <div class="row mt-4">
        <livewire:admin.supports.form-title name="Create new season time"/>
        <span class="text-danger">{{$disableMessage}}</span>
        <div class="col-4">
            <div class="form-group">
                <livewire:admin.supports.form-title name="Start time"/>

                <input type="text" class="form-control" wire:model="start_month_day" placeholder="example( -07-01)">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <livewire:admin.supports.form-title name="End time"/>

                <input type="text" class="form-control" wire:model="end_month_day" placeholder="example( -09-01)">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group " wire:ignore>
                <livewire:admin.supports.form-title name="Season"/>
                    <div class="col-md-6">
                        <select  wire:model="season"  data-show-subtext="false" data-live-search="true">
                            <option value="" readonly selected>Choose</option>
                            @foreach($seasons as $season)
                                <option value="{{ $season}}">
                                    {{ $season}}
                                </option>
                            @endforeach
                        </select>
                        @error('parent_id') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
            </div>
        </div>
        <button class="btn btn-outline-success" type="submit">Store</button>
    </div>

    </form>
    @endif
</div>



