{{--
 * @author      Archie Disono (webmonsph@gmail.com)
 * @link        https://github.com/disono/Laravel-Template
 * @license     https://github.com/disono/Laravel-Template/blob/master/LICENSE
 * @copyright   Webmons Development Studio
--}}

<div class="modal-header">
    <h5 class="modal-title">File Explorer</h5>

    <button type="button" class="close dialogDismiss" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <div class="row">
        {{-- file list --}}
        <div class="col-sm-12 col-md-8">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link fileSelectorNav" href="#" data-type="all">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fileSelectorNav" href="#" data-type="photo">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fileSelectorNav" href="#" data-type="video">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fileSelectorNav" href="#" data-type="audio">Audios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fileSelectorNav" href="#" data-type="doc">Documents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fileSelectorNav" href="#" data-type="file">Files</a>
                </li>
            </ul>

            {{-- list --}}
            <div class="row text-center text-lg-left" id="fileSelectList"></div>
            <p class="text-center"><a href="#" id="fileSelectorLoad">Load more...</a></p>
        </div>

        {{-- uploader --}}
        <div class="col-sm-12 col-md-4">
            <form action="{{ route('module.file.store') }}" id="fileUploaderFrm">
                <div class="form-group">
                    <label for="name">Title</label>
                    <input id="name" type="text"
                           class="form-control"
                           name="title" value="">
                </div>

                <div class="form-group">
                    <label for="name">Description</label>
                    <input id="name" type="text"
                           class="form-control"
                           name="description" value="">
                </div>

                <div class="form-group">
                    <label for="file_selected">Select a file <strong class="text-danger">*</strong></label>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file_selected"
                               id="file_selected">
                        <label class="custom-file-label" for="file_selected">Choose file</label>
                    </div>
                </div>

                <button class="btn btn-primary btn-block btn-sm" type="submit">Upload</button>
            </form>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-light dialogDismiss">Dismiss</button>
    <button type="button" class="btn btn-primary dialogConfirm" style="display: none;">Select</button>
</div>