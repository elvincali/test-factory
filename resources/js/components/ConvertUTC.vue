<template>
    <div class="container justify-content-center align-content-center mt-5">
        <div class="form-group">
            <label for="hora">Ingrese Fecha/Hora</label>
            <input type="datetime-local" class="form-control" id="hora" v-model="datetime">
        </div>
        <hr>
        <ul class="list-group" v-if="datetime">
            <li class="list-group-item" v-for="country in countries">
                <span class="font-weight-bold">{{ country.name }}: </span> {{ country.datetime }}
            </li>
        </ul>
    </div>
</template>

<script>
const countries = [
    { id: 1, name: 'Bolivia', tz: 'America/La_Paz', datetime: '' },
    { id: 2, name: 'Peru', tz: 'America/Lima', datetime: '' },
    { id: 3, name: 'United States', tz: 'America/New_York', datetime: '' },
    { id: 4, name: 'España', tz: 'Europe/Madrid', datetime: '' },
];

export default {
    name: "ConvertUTC",
    data() {
        return {
            datetime: null,
            countries,
        }
    },
    methods: {
        convertForCountries() {
            this.countries.forEach(country => {
                country.datetime = this.convertTZ(this.datetime, country.tz);
            })
        },
        convertTZ(date, tzString) {
            return new Date(date).toLocaleString("en-US", { timeZone: tzString });
        },
    },
    watch: {
        datetime() {
            this.convertForCountries();
        },
    },
}
</script>

<style scoped>

</style>
