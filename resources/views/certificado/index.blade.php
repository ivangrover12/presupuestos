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
            <button type="button" class="btn btn-info" title="Documentos guardados" disabled>Editar</button> 
            <button type="button" class="btn btn-danger" title="Editar Proveedor" disabled>Reporte 1</button> 
            <button type="button" class="btn btn-danger" title="Eliminar Proveedor" disabled>Reporte 2</button>
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
                            <th>Monto</th>
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
                            <th>Liter</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr v-for="(certificado, index) in certificados">
                            <td>@{{ certificado.secuencia }}</td>
                            <td>@{{ certificado.entidad }}</td>
                            <td>@{{ certificado.da }}</td>
                            <td>@{{ certificado.ue }}</td>
                            <td>@{{ certificado.prog }}</td>
                            <td>@{{ certificado.proy }}</td>
                            <td>@{{ certificado.gestion }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
        </div>
        
    </div>
    <div class="card-footer">
        <div class="row text-right">
            <div class="form-group">
                <select class="form-control" name="" id="" @change="changeyear()" v-model="select">
                    <option value="2019" selected>2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                </select>
            </div>
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
                select: '',
                certificados: []
            }
        },
        mounted() {
            
            var today = new Date();
            var yyyy = today.getFullYear();
            this.select = yyyy;
            axios.get('/getcertifi/'+this.select).then(response => {
                this.certificados = response.data;
                setTimeout(function(){$('#bootstrap-data-table-export').DataTable(
                {
                        "dom": '<"text-left"<f>>rtip',
                    //searching: false,
                    //paging: false,
                    "order": [[ 0, "desc" ]],
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
                        "search": "Buscar en las columnas:",
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
            });

        },
        methods: {
            changeyear(){
                $('#bootstrap-data-table-export').DataTable().destroy();
                axios.get('/getcertifi/'+this.select).then(response => {
                    //$('#bootstrap-data-table-export').DataTable().fnDestroy();
                    this.certificados = response.data;
                    setTimeout(function(){$('#bootstrap-data-table-export').DataTable(
                    {
                            "dom": '<"text-left"<f>>rtip',
                        //searching: false,
                        //paging: false,
                        "order": [[ 0, "desc" ]],
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
                            "search": "Buscar en las columnas:",
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
                });
            }
        },
});
</script>
@endsection