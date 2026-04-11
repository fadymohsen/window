@extends('dashboard.layouts.app')

@section('title', __('dashboard.blogs.create'))

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-sm-auto ms-auto">
                <a href="{{ route('dashboard.blogs.index') }}"><button class="btn btn-light"><i class="ri-arrow-go-forward-fill me-1 align-bottom"></i> @lang('dashboard.return')</button></a>
            </div>
        </div>
    </div>
</div>
<form id="create-blogs-form">
    <div class="d-flex gap-4 flex-wrap">
        <div class="col-md-8">
            <!-- Language Tabs -->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab-ar" role="tab">@lang('dashboard.ar.name') (العربية)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-en" role="tab">@lang('dashboard.en.name') (English)</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <!-- Arabic Tab -->
                        <div class="tab-pane active" id="tab-ar" role="tabpanel">
                            <div class="mb-3">
                                <label for="ar-title">@lang('dashboard.title') (العربية)</label>
                                <input id="ar-title" type="text" class="form-control" name="ar[title]" dir="rtl">
                            </div>
                            <div class="mb-3">
                                <label for="ar-description">@lang('dashboard.description') (العربية)</label>
                                <textarea id="ar-description" name="ar[description]" class="form-control" dir="rtl"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="ar-keywords">@lang('dashboard.keywords') (العربية)</label>
                                <input id="ar-keywords" type="text" class="form-control" name="ar[keywords]" dir="rtl">
                            </div>
                            <div class="mb-3">
                                <label for="ar-meta_title">@lang('dashboard.blog_meta_title')</label>
                                <input id="ar-meta_title" type="text" class="form-control" name="ar[meta_title]" dir="rtl">
                            </div>
                            <div class="mb-3">
                                <label for="ar-meta_description">@lang('dashboard.blog_meta_description')</label>
                                <textarea id="ar-meta_description" name="ar[meta_description]" class="form-control" rows="2" dir="rtl"></textarea>
                            </div>
                        </div>
                        <!-- English Tab -->
                        <div class="tab-pane" id="tab-en" role="tabpanel">
                            <div class="mb-3">
                                <label for="en-title">@lang('dashboard.title') (English)</label>
                                <input id="en-title" type="text" class="form-control" name="en[title]" dir="ltr">
                            </div>
                            <div class="mb-3">
                                <label for="en-description">@lang('dashboard.description') (English)</label>
                                <textarea id="en-description" name="en[description]" class="form-control" dir="ltr"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="en-keywords">@lang('dashboard.keywords') (English)</label>
                                <input id="en-keywords" type="text" class="form-control" name="en[keywords]" dir="ltr">
                            </div>
                            <div class="mb-3">
                                <label for="en-meta_title">@lang('dashboard.blog_meta_title')</label>
                                <input id="en-meta_title" type="text" class="form-control" name="en[meta_title]" dir="ltr">
                            </div>
                            <div class="mb-3">
                                <label for="en-meta_description">@lang('dashboard.blog_meta_description')</label>
                                <textarea id="en-meta_description" name="en[meta_description]" class="form-control" rows="2" dir="ltr"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-fill">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="text-center">
                            <p class="mb-0 fw-bold">@lang('dashboard.cover')</p>
                            <div class="position-relative d-inline-block auto-image-show">
                                <div class="position-absolute top-100 start-100 translate-middle">
                                    <label for="cover" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                <i class="ri-image-fill"></i>
                                            </div>
                                        </div>
                                    </label>
                                    <input class="form-control d-none" name="cover" id="cover" type="file" accept="image/png, image/gif, image/jpeg, image/webp">
                                </div>
                                <div class="avatar-lg" style="width: 12rem !important;">
                                    <div class="avatar-title bg-light rounded">
                                        <img src="" id="product-img" style="min-height: 100%;min-width: 100%;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="slug">@lang('dashboard.slug')</label>
                        <input id="slug" type="text" class="form-control" name="slug" placeholder="auto-generated-from-title" dir="ltr">
                        <small class="text-muted">@lang('dashboard.slug_hint')</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-end mb-3">
            <button type="submit" class="btn btn-success w-sm loader-btn ms-auto">
                <p class="mb-0">@lang('dashboard.create')</p>
                <div class="loader"></div>
            </button>
        </div>
    </div>
</form>

@endsection

@section('additional-js-libs')


@endsection

@section('custom-js')
    <script src="{{ asset('back/js/blog-module.js') }}" type="module"></script>
    <script>
        const direction = document.body.getAttribute('dir');

        // Arabic keywords
        const arKeywordsInput = document.querySelector('#ar-keywords');
        const arChoices = new Choices(arKeywordsInput, {
            removeItems: true,
            removeItemButton: true,
            removeItemButtonAlignLeft: direction,
            loadingText: '@lang("front.loading")...',
            noResultsText: '@lang("front.no-results")',
            noChoicesText: '@lang("front.no-choices")',
            itemSelectText: '@lang("front.item-select")',
            uniqueItemText: '@lang("front.unique-item")',
            placeholderValue: '@lang("front.placeholder-value")',
        });

        // English keywords
        const enKeywordsInput = document.querySelector('#en-keywords');
        const enChoices = new Choices(enKeywordsInput, {
            removeItems: true,
            removeItemButton: true,
            removeItemButtonAlignLeft: false,
            loadingText: 'Loading...',
            noResultsText: 'No results',
            noChoicesText: 'No choices',
            itemSelectText: 'Press to select',
            uniqueItemText: 'Only unique values can be added',
            placeholderValue: 'Enter keywords',
        });

        window.imagesAr = [];
        window.imagesEn = [];

        function initCkEditor(selector, imagesArray, editorVarName) {
            ClassicEditor.create(document.querySelector(selector), {
                ckfinder: {
                    uploadUrl: '/dashboard/ckEditorUploadImage?command=QuickUpload&type=Images&responseType=json'
                },
                mediaEmbed: {
                    previewsInData: true,
                    providers: [
                        {
                            name: 'youtube',
                            url: [
                                /^youtube\.com\/watch\?v=([\w-]+)/,
                                /^youtu\.be\/([\w-]+)/
                            ],
                            html: match => (
                                `<div style="position: relative; padding-bottom: 56.25%; height: 0;">
                                    <iframe src="https://www.youtube.com/embed/${match[1]}"
                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                            frameborder="0" allowfullscreen></iframe>
                                </div>`
                            )
                        }
                    ]
                }
            }).then(editor => {
                window[editorVarName] = editor;
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return {
                        upload: () => {
                            return loader.file
                                .then(file => new Promise((resolve, reject) => {
                                    const formData = new FormData();
                                    formData.append('upload', file);

                                    fetch('/dashboard/ckEditorUploadImage', {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                        },
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        imagesArray.push({
                                            url: data.url,
                                            id: data.id
                                        })
                                        resolve({ default: data.url })
                                    })
                                    .catch(error => reject(error));
                                }));
                        }
                    };
                };
                editor.model.document.on('change:data', () => {
                    const currentImagesUrl = getImageSources(editor.getData());
                    const filtered = imagesArray.filter(img => currentImagesUrl.includes(img.url));
                    imagesArray.length = 0;
                    filtered.forEach(img => imagesArray.push(img));
                });
            })
            .catch(error => {
                console.error(error);
            });
        }

        function getImageSources(html) {
            const doc = new DOMParser().parseFromString(html, 'text/html');
            return Array.from(doc.querySelectorAll('img')).map(img => img.getAttribute('src'));
        }

        // Initialize both CKEditor instances
        initCkEditor('textarea#ar-description', window.imagesAr, 'ckEditorAr');
        initCkEditor('textarea#en-description', window.imagesEn, 'ckEditorEn');
    </script>
@endsection
