<template>
    <div class="container justify-content-center align-content-center mt-5">
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="hora">Ingrese Fecha/Hora</label>
                <input type="datetime-local" class="form-control" id="hora" v-model="datetime">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
        <hr>
        <ul class="list-group">
            <li class="list-group-item" v-for="country in countries">
                <span class="font-weight-bold">{{ country.name }}: </span> {{ country.datetime }}
            </li>
        </ul>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    name: "ConvertUTCPHP",
    data() {
        return {
            datetime: null,
            countries: [],
        }
    },
    methods: {
        submit() {
            let datetime = moment.utc(moment(this.datetime)).format('YYYY-MM-DD H:m:s');
            axios.post('/api/utc-convert', { datetime })
                .then(response => {
                    this.countries = response.data;
                })
        },
    },
}
</script>

<style scoped>

</style>
