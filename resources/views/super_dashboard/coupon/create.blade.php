{{ Form::open(['url' => 'coupons', 'method' => 'post', 'class' => 'needs-validation', 'novalidate']) }}
<div class="modal-body">



    <div class="row">
        <div class="form-group">
            {{ Form::label('name', __('Name'), ['class' => 'col-form-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control font-style', 'required' => 'required', 'placeholder' => __('Enter Name')]) }}
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('discount', __('Discount'), ['class' => 'col-form-label']) }}
            {{ Form::number('discount', null, ['class' => 'form-control', 'required' => 'required', 'step' => '0.01', 'placeholder' => __('Enter Discount')]) }}
            <span class="small">{{ __('Note: Discount in Percentage') }}</span>
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('limit', __('Limit'), ['class' => 'col-form-label']) }}
            {{ Form::number('limit', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Limit')]) }}
        </div>

        <div class="form-group col-md-12" id="auto">
            {{ Form::label('limit', __('Code'), ['class' => 'col-form-label']) }}
            <div class="input-group">
                {{ Form::text('autoCode', null, ['class' => 'form-control', 'id' => 'auto-code', 'required' => 'required', 'placeholder' => __('Enter Code')]) }}
                <button class="btn btn-outline-primary" type="button" id="code-generate"><i
                        class="fa fa-history pr-1"></i>{{ __(' Generate') }}</button>
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="{{ __('Cancel') }}" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Create') }}" class="btn  btn-primary">

</div>
{{ Form::close() }}
