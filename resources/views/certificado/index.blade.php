@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap.min.css') }}">
<style>
.dataTables_filter{
    float: left;
}
</style>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      Listado de certificados
    </div>
    <div class="card-body">
        <div class="row">
            <button type="button" class="btn btn-info" title="Documentos guardados">Editar</button> 
            <button type="button" class="btn btn-danger" title="Editar Proveedor">Reporte 1</button> 
            <button type="button" class="btn btn-danger" title="Eliminar Proveedor">Reporte 2</button>
        </div>
        <div class="row mt-3">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Secuencia</th>
                            <th>Entidad</th>
                            <th>DA</th>
                            <th>UE</th>
                            <th>PROG</th>
                            <th>PROY</th>
                            <th>Fecha</th>
                            <th>Nacionalidad</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Secuencia</th>
                            <th>Entidad</th>
                            <th>DA</th>
                            <th>UE</th>
                            <th>PROG</th>
                            <th>PROY</th>
                            <th>Fecha</th>
                            <th>Nacionalidad</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($certificados as $certificado)
                            <tr>
                                <td>{{ $certificado->secuencia }}</td>
                                <td>{{ $certificado->entidad }}</td>
                                <td>{{ $certificado->da }}</td>
                                <td>{{ $certificado->ue }}</td>
                                <td>{{ $certificado->prog }}</td>
                                <td>{{ $certificado->proy }}</td>
                                <td>{{ $certificado->gestion }}</td>
                                <td>{{ $certificado->secuencia }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('js/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('js/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/data-table/buttons.colVis.min.js') }}"></script>
<script>
const app = new Vue({
        el: '#app',
        data(){
            return{
                
            }
        },
        mounted() {
            setTimeout(function(){$('#bootstrap-data-table-export').DataTable(
                {
                    "dom": '<"text-left"<f>>rtip',
                //searching: false,
                //paging: false,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
            }
            );}, 0);
        }
});
</script>
@endsection