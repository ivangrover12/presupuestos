@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        CERTIFICACION PRESUPUESTARIA
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Fecha:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Saldo:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" step=".01">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Literal:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea class="form-control" name="" id="" rows="2"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Gestión:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Secuencia:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for=""></label>
                    </div>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-info" value="Reservar">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection