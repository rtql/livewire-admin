<div>
    <div class="row pb-3">
        <div class="col-6">
            <a class="btn btn-light py-3 px-5 text-black w-100" href="{{ route('admin.applications') }}">Go Back</a>
        </div>

    </div>

    <div>

        <div class="row">

            <div class="col-6">
                <div class="form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="Name" />
                    <sec-tab-content>
                        <textarea type="text" class="form-control" value="{{ $item->user }}" disabled="disabled" rows=2>{{ $item->user }}</textarea>
                    </sec-tab-content>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group has-danger">
                    <livewire:admin.supports.form-title name="Email" />
                    <sec-tab-content>
                        <textarea type="text" class="form-control" value="{{ $item->email }}" disabled="disabled" rows=2>{{ $item->user }}</textarea>
                    </sec-tab-content>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="Phone" />
                    <sec-tab-content>
                        <input type="text" class="form-control" value="{{ $item->phone }}" disabled="disabled">
                    </sec-tab-content>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group has-danger">
                    <livewire:admin.supports.form-title name="Message" />

                    <sec-tab-content>
                        <textarea type="text" class="form-control" disabled="disabled" rows="5">
                                {{ $item->message }}
                            </textarea>
                    </sec-tab-content>
                </div>
            </div>
        </div>


    </div>

</div>
