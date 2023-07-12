<div>

    <div class="row pb-3">
        <div class="col-2">
            <a class="btn btn-light py-3 px-5 text-black w-100" href="{{ route('admin.pages') }}">Back</a>
        </div>
    </div>
    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateSlide">

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

        {{-- <div class="col-6 form-group has-danger">
            <livewire:admin.supports.form-title name="" />
            <tab-container wire:ignore>
                <!-- TAB CONTROLS -->
                <input type="radio" id="tabToggle02" name="tabs" value="2" checked /><label
                    class="tabToggle02 intro" for="tabToggle02" checked="checked">Armenian</label>
                <input type="radio" id="tabToggle01" name="tabs" value="1" /><label class="tabToggle01"
                    for="tabToggle01">English</label>

                <input type="radio" id="tabToggle03" name="tabs" value="3" /><label class="tabToggle03"
                    for="tabToggle03">Russian</label>
                <tab-content>
                    <textarea type="text" name="description.en" class="form-control description-en" id="description_en"
                        wire:model.defer="description.en" placeholder="Enter English Description"></textarea>
                </tab-content>
                <tab-content>
                    <textarea type="text" name="description.hy" class="form-control description-hy" id="description_hy"
                        wire:model.defer="description.hy" placeholder="Enter Armenian Description"></textarea>
                </tab-content>
                <tab-content>
                    <textarea type="text" name="description.ru" class="form-control description-ru" id="description_ru"
                        wire:model.defer="description.ru" placeholder="Enter Russian Description"></textarea>
                </tab-content>
            </tab-container>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> --}}
        {{-- <div class="row">
            <div class="col-md-6 form-group has-danger d-flex" wire:ignore>
                <livewire:admin.supports.form-title name="Media Section" />
                <div class="form-check form-switch active-toggle ml-8" style="justify-content: unset">
                    <input class="form-check-input " wire:model.lazy="has_media" type="checkbox" role="switch"
                        @if ($has_media) checked @endif>
                </div>
            </div>
        </div> --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="col-6 form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="Seo Title"/>
                    <sec-tab-container >
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="sectabToggle02" name="sec-tabs" value="2"  checked />
                        <label class="sectabToggle02 intro" for="sectabToggle02">Armenian</label>
                        <input type="radio" id="sectabToggle01" name="sec-tabs" value="1"/>
                        <label class="sectabToggle01" for="sectabToggle01">English</label>
                        <input type="radio" id="sectabToggle03" name="sec-tabs" value="3" />
                        <label class="sectabToggle03" for="sectabToggle03">Russian</label>
                        <sec-tab-content>
                            <input type="text" name="seo_title.en" class="form-control @error('seo_title.en') form-control-alternative is-invalid @enderror seo_title-en" id="en" wire:model.defer="seo_title.en" placeholder="Enter English Seo Title">
                        </sec-tab-content>
                        <sec-tab-content>
                            <input type="text" name="seo_title.hy" class="form-control @error('seo_title.hy') form-control-alternative is-invalid @enderror seo_title-hy" id="hy" wire:model.defer="seo_title.hy" placeholder="Enter Armenian Seo Title">
                        </sec-tab-content>
                        <sec-tab-content>
                            <input type="text" name="seo_title.ru" class="form-control @error('seo_title.ru') form-control-alternative is-invalid @enderror seo_title-ru" id="ru" wire:model.defer="seo_title.ru" placeholder="Enter Russian Seo Title">
                        </sec-tab-content>

                    </sec-tab-container>
                    @error('seo_title.en') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-12">
                <div class="col-6 form-group has-danger" wire:ignore>
                    <livewire:admin.supports.form-title name="SEO Description" />
                    <four-tab-container>
                        <!-- TAB CONTROLS -->
                        <input type="radio" id="fourtabToggle02" name="four-tabs" value="2" checked />
                        <label class="fourtabToggle02 intro" for="fourtabToggle02">Armenian</label>
                        <input type="radio" id="fourtabToggle01" name="four-tabs" value="1" />
                        <label class="fourtabToggle01" for="fourtabToggle01">English</label>
                        <input type="radio" id="fourtabToggle03" name="four-tabs" value="3" />
                        <label class="fourtabToggle03" for="fourtabToggle03">Russian</label>
                        <four-tab-content>
                            <input type="text" name="seo_description.en"
                                class="form-control @error('seo_description.en') form-control-alternative is-invalid @enderror seo_description-en"
                                id="en2" wire:model.defer="seo_description.en"
                                placeholder="Enter English Seo Description">
                        </four-tab-content>
                        <four-tab-content>
                            <input type="text" name="seo_description.hy"
                                class="form-control @error('seo_description.hy') form-control-alternative is-invalid @enderror seo_description-hy"
                                id="hy2" wire:model.defer="seo_description.hy"
                                placeholder="Enter Armenian Seo Description">
                        </four-tab-content>
                        <four-tab-content>
                            <input type="text" name="seo_description.ru"
                                class="form-control @error('seo_description.ru') form-control-alternative is-invalid @enderror seo_description-ru"
                                id="ru2" wire:model.defer="seo_description.ru"
                                placeholder="Enter Russian Seo Description">
                        </four-tab-content>

                    </four-tab-container>
                    @error('seo_description.en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <livewire:admin.supports.form-title name="OG img (1200x630px)" />
                    <div class="custom-file">
                        <div x-data="{ isUploading: false, progress: 1 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = true; progress = 100"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <input wire:model.defer="newimage" type="file" class="custom-file-input"
                                id="customFile">
                            <div x-show.transition="isUploading" class="progress progress mt-2 rounded">
                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                    x-bind:style="`width: ${progress}%`">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </div>

                        <label class="custom-file-label" for="customFile" >
                            @if ($newimage)
                                {{ $newimage->getClientOriginalName() }}
                            @endif
                        </label>
                    </div>

                    @if ($newimage)
                        <img src="{{ $newimage->temporaryUrl() }}"
                            class="img d-block mt-2 w-50rounded uploading-image">
                    @else
                        <img src="{{ $page->getFile() }}" class="img d-block mb-2 w-50 rounded">
                    @endif
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-light py-3 px-5 text-black col-2">
            Save
        </button>
    </form>
</div>