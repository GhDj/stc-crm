<template>


        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Raison Sociale</th>
                <th>Siren</th>
                <th>Responsable</th>
                <th>Ville</th>
                <th>Rendez-vous</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="prospect in prospects" :key="prospect.id">
                <td>{{ prospect.id }}</td>
                <td>{{ prospect.raison_sociale }}</td>
                <td>{{ prospect.SIREN }}</td>
                <td>{{ prospect.nom }} {{ prospect.prenom }}</td>
                <td>{{ prospect.ville }}</td>
                <td> <span v-if="prospect.rdv">{{ prospect.rdv.date }} </span> </td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: prospect.id }}" class="btn btn-primary">Modifier
                        </router-link>
                        <button class="btn btn-danger" @click="deleteProspect(prospect.id)">Supprimer</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

</template>

<script>
    export default {
        data() {
            return {
                prospects: []
            }
        },
        created() {
            this.axios
                .get('/api/prospects')
                .then(response => {
                    this.prospects = response.data.data;
                    console.log(this.prospects);
                });
        },
        methods: {
            deleteProspect(id) {
                this.axios
                    .delete(`/api/prospects/delete/${id}`)
                    .then(response => {
                        let i = this.prospects.map(item => item.id).indexOf(id); // find index of your object
                        this.prospects.splice(i, 1)
                    });
            }
        }
    }
</script>
