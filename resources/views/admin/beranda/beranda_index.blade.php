@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Server Process</h4>
                <h6 class="card-subtitle">Maecenas faucibus mollis interdum porttitor</h6>
    
                <div class="flot-chart flot-dynamic"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#sb-dashboard').addClass("active");
    })
</script>

@endsection