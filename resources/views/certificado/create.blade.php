@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        CERTIFICACION PRESUPUESTARIA
        @{{ $data }}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Fecha:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="form-control" v-model="fecha">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Saldo:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" step="0.01" v-model="saldo" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Literal:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea class="form-control" name="" id="" rows="3" disabled v-model="convert"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Gestión:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" v-model="gestion" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Secuencia:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="form-control" v-model="secuencia" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for=""></label>
                    </div>
                    <div class="col-md-8 pt-3">
                        <button class="btn btn-info btn-block" @click.prevent="reservation()">Reservar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div v-if="reserve" class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Entidad:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" disabled v-model="das.entidad">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="das.desc_entidad">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">D.A. :</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" disabled v-model="das.da">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="das.desc_da">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">U.E. :</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" v-model="ue" @keyup="findUE()">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="desc_ue">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Tipo Gasto:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" v-model="gast" @keyup="findGast()">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" disabled v-model="tipo_gasto">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Prog.:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" v-model="prog">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">Act.:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" v-model="act">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="">SISIN:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" disabled>
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
                        <input type="number" class="form-control" v-model="proy" @keyup="findDetail()">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Detalle:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" disabled v-model="nombre">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Activo:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" disabled v-model="cod">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <button class="btn btn-warning btn-block">Modificar</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success btn-block" @click.prevent="addCertificate()">Nuevo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div v-if="reserve" class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Entidad</th>
                    <th class="text-center">D.A.</th>
                    <th class="text-center">U.E.</th>
                    <th class="text-center">Tipo Gasto</th>
                    <th class="text-center">Prog</th>
                    <th class="text-center">Proy</th>
                    <th class="text-center">Act.</th>
                    <th class="text-center">Sisin</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th class="text-center">Entidad</th>
                    <th class="text-center">D.A.</th>
                    <th class="text-center">U.E.</th>
                    <th class="text-center">Tipo Gasto</th>
                    <th class="text-center">Prog</th>
                    <th class="text-center">Proy</th>
                    <th class="text-center">Act.</th>
                    <th class="text-center">Sisin</th>
                    <th class="text-center"></th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td class="text-center">@{{ cod }}</td>
                    <td class="text-center">@{{ das.entidad }}</td>
                    <td class="text-center">@{{ das.da }}</td>
                    <td class="text-center">@{{ ue }}</td>
                    <td class="text-center">@{{ gast }}</td>
                    <td class="text-center">@{{ prog }}</td>
                    <td class="text-center">@{{ proy }}</td>
                    <td class="text-center">@{{ act }}</td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                </tr>
                <tr v-for="(certificate, index) in certificados">
                    <td class="text-center">@{{ certificate.cod }}</td>
                    <td class="text-center">@{{ certificate.entidad }}</td>
                    <td class="text-center">@{{ certificate.da }}</td>
                    <td class="text-center">@{{ certificate.ue }}</td>
                    <td class="text-center">@{{ certificate.gast }}</td>
                    <td class="text-center">@{{ certificate.prog }}</td>
                    <td class="text-center">@{{ certificate.proy }}</td>
                    <td class="text-center">@{{ certificate.act }}</td>
                    <td class="text-center">@{{ certificate.sisin }}</td>
                    <td class="text-center"><button @click.prevent="deleteCert(index)">Borrar</button></td>
                </tr>
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
            reserve: true,
            certificado: {},
            certificados: [],
            convert: '',
            gestion: '',
            fecha: '',
            saldo: '',
            secuencia: '',
            das: {},
            ue: '',
            desc_ue: '',
            gast: '',
            tipo_gasto: '',
            proy: '',
            prog: '',
            act: '',
            nombre: '',
            cod: ''
        }
    },
    methods:{
        reservation(){
            this.reserve = true;
            var convert = numeroALetras(this.saldo, {
                plural: "Bolivianos",
                singular: "Boliviano",
                centPlural: "Centavos",
                centSingular: "Centavo"
            });
            this.convert = this.first(convert);
        },
        first(string){
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
        addCertificate(){
            this.certificado.cod = this.cod;
            this.certificado.entidad = this.das.entidad;
            this.certificado.da = this.das.da;
            this.certificado.ue = this.ue;
            this.certificado.gast = this.gast;
            this.certificado.prog = this.prog;
            this.certificado.proy = this.proy;
            this.certificado.act = this.act;
            this.certificado.sisin = '';
            this.certificados.push(this.certificado);
            this.certificado = {};
            this.cod = this.cod + 1;
        },
        deleteCert(index){
            this.certificados.splice(index, 1);
        },
        findUE(){
            if(this.ue != ''){
                axios.get('/find/findue/'+this.ue).then(response => {
                    const temp = response.data;
                    this.desc_ue = temp.desc_ue;
                    this.das = temp;
                });
            }
        },
        findGast(){
            if(this.gast != ''){
                axios.get('/find/findgast/'+this.gast).then(response => {
                    this.tipo_gasto = response.data;
                });
            }
        },
        findDetail(){
            if(this.das.da && this.ue && this.prog && this.act && this.proy){
                axios.get('/findnombre/'+this.das.da+'/'+this.ue+'/'+this.prog+'/'+this.act+'/'+this.proy).then(response => {
                    this.nombre = response.data;
                })
            }
        }
    },
    mounted() {
        var today = new Date();
        var dd = today.getDate();
        if(dd < 10){
            dd = '0'+dd;
        }
        var mm = today.getMonth()+1;
        if(mm < 10){
            mm = '0'+mm;
        }
        var yyyy = today.getFullYear();
        this.gestion = yyyy;
        this.fecha = yyyy+'-'+mm+'-'+dd;
        axios.get('/certificado/models').then(response =>{
            this.cod = response.data[1] + 1;

        });

    },
    
})
</script>
@endsection