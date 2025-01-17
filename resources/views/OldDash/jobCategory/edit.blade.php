    {{Form::model($jobCategory,array('route' => array('job-category.update', $jobCategory->id), 'method' => 'PUT')) }}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('title',__('Title'),['class'=>'form-control-label'])}}
                {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter category title')))}}
            </div>
        </div>
          <div class="col-md-12">
            <div class="form-group">
                {{Form::label('title_ar',__('Title_ar'),['class'=>'form-control-label'])}}
                {{Form::text('title_ar',null,array('class'=>'form-control','placeholder'=>__('Enter category title arabic')))}}
            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
