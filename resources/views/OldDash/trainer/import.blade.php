    {{ Form::open(array('route' => array('trainer.import'),'method'=>'post', 'enctype' => "multipart/form-data")) }}
    <div class="row">
        <div class="col-md-12 mb-2 d-flex align-items-center justify-content-between">
            {{Form::label('file',__('Download sample customer CSV file'),['class'=>'form-control-label'])}}
            <a href="{{asset(Storage::url('uploads/sample')).'/sample-trainer.csv'}}" class="btn btn-primary btn-icon-only width-auto">
                <i class="fa fa-download"></i> {{__('Download')}}
            </a>
        </div>
        <div class="col-md-12">
            {{Form::label('file',__('Select CSV File'),['class'=>'form-control-label'])}}
            <div class="choose-file form-group">
                <label for="file" class="form-control-label">
                    <div>{{__('Choose file here')}}</div>
                    <input type="file" class="form-control" name="file" id="file" data-filename="upload_file" required>
                </label>
                <p class="upload_file"></p>
            </div>
        </div>
        <div class="col-md-12 mt-2 text-right">
            <input type="submit" value="{{__('Upload')}}" class="btn btn-primary line_height_auto text-white border-none">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white line_height_auto border-none" data-dismiss="modal">
        </div>
    </div>
    {{ Form::close() }}
