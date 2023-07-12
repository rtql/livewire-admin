<div>
    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="update">
        <div class="row">
            <div class="col-6">
                <div class="form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="Title" />
                    <third-tab-container>
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="thirdtabToggle02" name="third-tabs" value="2" checked />
                        <label class="thirdtabToggle02 intro" for="thirdtabToggle02" checked="checked">Armenian</label>
                        <input type="radio" id="thirdtabToggle01" name="third-tabs" value="1" />
                        <label class="thirdtabToggle01" for="thirdtabToggle01">English</label>
                        <input type="radio" id="thirdtabToggle03" name="third-tabs" value="3" />
                        <label class="thirdtabToggle03" for="thirdtabToggle03">Russian</label>
                        <third-tab-content>
                            <input type="text" name="title.en"
                                class="form-control @error('title.en') form-control-alternative is-invalid @enderror title-en"
                                id="en2" wire:model.defer="title.en" placeholder="Enter English Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" name="title.hy"
                                class="form-control @error('title.hy') form-control-alternative is-invalid @enderror title-hy"
                                id="hy2" wire:model.defer="title.hy" placeholder="Enter Armenian Title">
                        </third-tab-content>
                        <third-tab-content>
                            <input type="text" name="title.ru"
                                class="form-control @error('title.ru') form-control-alternative is-invalid @enderror title-ru"
                                id="ru2" wire:model.defer="title.ru" placeholder="Enter Russian Title">
                        </third-tab-content>
                    </third-tab-container>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3 d-grid align-content-around">
                <livewire:admin.supports.form-title name="Phone" />
                <input type="text" class="form-control" wire:model="phone">
            </div>
            <div class="col-md-3 d-grid align-content-around">
                <livewire:admin.supports.form-title name="Phone (Res.)" />
                <input type="text" class="form-control" wire:model="phone_res">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3 d-grid align-content-around">
                <livewire:admin.supports.form-title name="Whatsup" />
                <input type="text" class="form-control" wire:model="whatsup">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3 d-grid align-content-around">
                <livewire:admin.supports.form-title name="Email" />
                <input type="text" class="form-control" wire:model="email">
            </div>

            <div class="col-md-3 d-grid align-content-around">
                <livewire:admin.supports.form-title name="Map Link" />
                <input type="text" class="form-control" wire:model="map">
            </div>
        </div>

        <div class="row mt-4 mb-4">

            <livewire:admin.supports.form-title name="Address" />
            <sec-tab-container class="col-6" wire:ignore>
                <!-- TAB CONTROLS -->
                <input type="radio" id="sectabToggle02" name="sec-tabs" value="2" checked />
                <label class="sectabToggle02 intro" for="sectabToggle02" checked="checked">Armenian</label>
                <input type="radio" id="sectabToggle01" name="sec-tabs" value="1" />
                <label class="sectabToggle01" for="sectabToggle01">English</label>
                <input type="radio" id="sectabToggle03" name="sec-tabs" value="3" />
                <label class="sectabToggle03" for="sectabToggle03">Russian</label>
                <sec-tab-content>
                    <input type="text"
                        class="form-control @error('address.en') form-control-alternative is-invalid @enderror address-en"
                        id="en" wire:model.defer="address.en" placeholder="Enter Address in English">
                </sec-tab-content>
                <sec-tab-content>
                    <input type="text"
                        class="form-control @error('address.hy') form-control-alternative is-invalid @enderror address-hy"
                        id="hy" wire:model.defer="address.hy" placeholder="Enter Address in Armenian">
                </sec-tab-content>
                <sec-tab-content>
                    <input type="text"
                        class="form-control @error('address.ru') form-control-alternative is-invalid @enderror address-ru"
                        id="ru" wire:model.defer="address.ru" placeholder="Enter Address in Russian">
                </sec-tab-content>
            </sec-tab-container>
        </div>


        <div class="row mt-2">
            <div class="col-3">
                <livewire:admin.supports.form-title name="Facebook Link" />
                <input type="text" class="form-control" wire:model="facebook">
            </div>
            <div class="col-3">
                <livewire:admin.supports.form-title name="Instagram Link" />
                <input type="text" class="form-control" wire:model="instagram">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-3">
                <livewire:admin.supports.form-title name="Linkedin Link" />
                <input type="text" class="form-control" wire:model="linkedin">
            </div>
            <div class="col-3">
                <livewire:admin.supports.form-title name="Youtube Link" />
                <input type="text" class="form-control" wire:model="youtube">
            </div>
        </div>
        <button type="submit" class="btn btn-light py-3 px-5  mt-4 -ml-1text-black col-2">
            Save
        </button>
    </form>

</div>

@push('js')
    <script>
        CKEDITOR.replace('description_en', {
            filebrowserUploadUrl: "{{ route('admin.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
        });
        CKEDITOR.instances.description_en.on('change', function() {
            @this.set('description.en', this.getData());
        });
        CKEDITOR.replace('description_hy', {
            filebrowserUploadUrl: "{{ route('admin.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.instances.description_hy.on('change', function() {
            @this.set('description.hy', this.getData());
        });
        CKEDITOR.replace('description_ru', {
            filebrowserUploadUrl: "{{ route('admin.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.instances.description_ru.on('change', function() {
            @this.set('description.ru', this.getData());
        });
    </script>
@endpush
