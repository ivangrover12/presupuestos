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
                        <textarea class="form-control" name="" id="" rows="2" disabled></textarea>
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
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Entidad:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">D.A. :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" step=".01">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">U.E. :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Tipo Gasto:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" step=".01">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Prog.:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Act.:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" step=".01">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">SISIN:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row form-group">
                    <label for="">Observaciones:</label>
                </div>
                <div class="row form-group">
                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Proy.:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" step=".01">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Detalle:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" step=".01">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Activo:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <button class="btn btn-warning btn-block">Modificar</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success btn-block">Nuevo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Entidad</th>
                    <th>D.A.</th>
                    <th>U.E.</th>
                    <th>Tipo Gasto</th>
                    <th>Prog</th>
                    <th>Proy</th>
                    <th>Act.</th>
                    <th>Sisin</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Entidad</th>
                    <th>D.A.</th>
                    <th>U.E.</th>
                    <th>Tipo Gasto</th>
                    <th>Prog</th>
                    <th>Proy</th>
                    <th>Act.</th>
                    <th>Sisin</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
const app = new Vue({
    el: '#app',
    data(){
        return{
            step: false
        }
    },
    
})
</script>
@endsection