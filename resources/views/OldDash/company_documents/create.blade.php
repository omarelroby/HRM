    {{Form::open(array('url'=>'company-document-upload','method'=>'post', 'enctype' => "multipart/form-data"))}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                {{Form::text('name',null,array('class'=>'form-control','required'=>'required'))}}
            </div>
        </div>
        <div class="col-md-12">
            {{Form::label('document',__('Document'),['class'=>'form-control-label'])}}
            <div class="choose-file form-group">
                <label for="document" style="width: 100%" class="form-control-label">
                    <div>{{__('Choose file here')}}</div>
                    <input type="file" class="form-control" name="document" id="document" data-filename="document_create" required>
                </label>
                <p class="document_create"></p>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('description', __('Description'),['class'=>'form-control-label'])}}
                {{ Form::textarea('description',null, array('class' => 'form-control')) }}
            </div>
        </div>
        
        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
