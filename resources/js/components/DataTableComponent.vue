<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel Vue Datatables Component Example</div>

                    <div class="card-body">
                        <datatable :columns="columns" :data="rows"></datatable>
                        <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Vue from 'vue';
    import { VuejsDatatableFactory } from 'vuejs-datatable';

    Vue.use( VuejsDatatableFactory );

    export default {
        components: { VuejsDatatableFactory },
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                columns: [
                    {label: 'id', field: 'id'},
                    {label: 'Raison Sociale', field: 'raison_sociale'},
                    {label: 'Siren', field: 'SIREN'},
                    {label: 'Responsable', representedAs: ({nom, prenom}) => `${nom} ${prenom}`, interpolate: true},
                    {label: 'Ville', field: 'ville'}
                ],
                rows: [],
                page: 1,
                per_page: 5,
            }
        },
        methods:{
            getProspects: function() {
                axios.get('/api/prospects').then(function(response){
                    this.rows = response.data;
                }.bind(this));
            }
        },
        created: function(){
            this.getProspects()
        }
    }
</script>
