<div class="panel widget center bgimage">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2>Done</h2>
                </div>
                <div class="panel-body">
                    {!! $done !!}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Failed
                </div>
                <div class="panel-body">
                    {!! $failed !!}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-warning">
                <div class="panel-heading">Done</div>
                <div class="panel-body">
                    {!! $done !!}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel panel-info">
                <div class="panel-heading">Info</div>
                <div class="panel-body">
                    <h3>Média:  {!! $mean_running_minutes !!} s</h3>
                    <h3>Máximo: {!! $max_running_minutes !!} s</h3>
                    <h3>Mínimo: {!! $min_running_minutes !!} s</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    
</style>