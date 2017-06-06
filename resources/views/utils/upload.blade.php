<div id="fileupload" >
    <div class="row fileupload-buttonbar">
        {!! Form::open([ 'route' => $urlupload, 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' =>"multipart/form-data" ])!!}
        <div class="col-lg-5">
                
                {!! Form::file('archivo', null) !!}
                
        </div>
        <div class="col-lg-2">
            <button type="submit" class="btn btn-primary start">
                <i class="glyphicon glyphicon-upload"></i>
                <span>Start upload</span>
            </button>
        </div>
        {!! Form::close() !!}
    </div>
</div>