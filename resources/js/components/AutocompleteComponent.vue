<template>


    <div class="form-group">
        <div>
            <input v-model="test" type="radio" id="contactChoice1"
                   name="contact" value="all" checked>
            <label v-model="test" for="contactChoice1">Все</label>

            <input v-model="test" type="radio" id="contactChoice2"
                   name="contact" value="strahovka">
            <label for="contactChoice2">страховка</label>

            <input v-model="test" type="radio" id="contactChoice3"
                   name="contact" value="anketa">
            <label for="contactChoice3">Анкета</label>
        </div>
        <div>
            <label for="giverName">Имя Страховщика</label>
            <span class="star">*</span>
            <input required id="giverName" v-model="giverName" name="giverName" type="text" class="form-control">
        </div>
        <div>
            <label for="giverLastName">Фамилия Страховщика</label>
            <span class="star">*</span>
            <input required id="giverLastName" v-model="giverLastName" name="giverLastName" type="text"
                   class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="lastNameGirl">Девичья Фамилия
                <button type="button" class="btn btn-sm btn-primary" @click="lastNameGirl = giverLastName">Импортировать
                    фамилию
                </button>
            </label>/anketa
            <input id="lastNameGirl" v-model="lastNameGirl" name="lastNameGirl" type="text" class="form-control">
            <br>

        </div>
        <div>
            <label for="passportNumber">Номер паспорта
                <button type="button" class="btn btn-sm btn-primary"
                        v-on:click="electronicNumber = Passports[0].electronicNumber; giverName = Passports[0].giverName; giverLastName = Passports[0].giverLastName; passportNumber = Passports[0].passportNumber; birthday = Passports[0].birthday; home = Passports[0].home; days = Passports[0].days; startdate = Passports[0].startdate; prem = Passports[0].prem; summ = Passports[0].summ; fran = Passports[0].fran; polNumber = Passports[0].polNumber; type = Passports[0].type; createDate = Passports[0].createDate; tel = Passports[0].tel; lastNameGirl = Passports[0].lastNameGirl; country = Passports[0].country; citizenship = Passports[0].citizenship; placeOfBirth = Passports[0].placeOfBirth; passportDate = Passports[0].passportDate; passportWhoGave = Passports[0].passportWhoGave; lastVizaBeginning1 = Passports[0].lastVizaBeginning1; lastVizaEnding1 = Passports[0].lastVizaEnding1; lastVizaBeginning2 = Passports[0].lastVizaBeginning2; lastVizaEnding2 = Passports[0].lastVizaEnding2; lastVizaBeginning3 = Passports[0].lastVizaBeginning3; lastVizaEnding3 = Passports[0].lastVizaEnding3; lastVizaBeginning4 = Passports[0].lastVizaBeginning4; lastVizaEnding4 = Passports[0].lastVizaEnding4;   tel = Passports[0].tel ">
                    Импортировать по номеру паспорта
                </button>
            </label>
            <span class="star">*</span>
            <input required id="passportNumber" v-model="passportNumber" name="passportNumber" type="text"
                   class="form-control">
        </div>
        <div>
            <label for="birthday">Дата рождения</label>
            <span class="star">*</span>
            <input required id="birthday" v-model="birthday" name="birthday" type="date" class="form-control">
        </div>
        <div>
            <label for="home">Место жительства</label>
            <span class="star">*</span>
            <input required id="home" v-model="home" name="home" type="text" class="form-control">
        </div>
        <div v-if="test === 'strahovka' || test === 'all'">
            <label for="days">Кол-во дней</label>
            <span class="star">*</span>
            <input required id="days" v-model="days" name="days" type="number" class="form-control">
        </div>
        <div v-if="test === 'strahovka' || test === 'all'">
            <label for="startdate">Дата начала</label>
            <span class="star">*</span>
            <input required id="startdate" v-model="startdate" name="startdate" type="date" class="form-control">
        </div>
        <div v-if="test === 'strahovka' || test === 'all'">
            <label for="prem">Страховой платеж</label>
            <span class="star">*</span>
            <input required id="prem" v-model="prem" name="prem" type="text" class="form-control">
        </div>
        <div v-if="test === 'strahovka' || test === 'all'">
            <label for="summ">Страховая сумма</label>
            <input id="summ" v-model="summ" name="summ" type="number" class="form-control">
        </div>
        <div v-if="test === 'strahovka' || test === 'all'">
            <label for="fran">Франшиза</label>
            <span class="star">*</span>
            <input required id="fran" v-model="fran" name="fran" type="number" class="form-control">
        </div>
        <div v-if="test === 'strahovka' || test === 'all'">
            <label for="polNumber">Номер полиса</label>
            <button type="button" class="btn btn-sm btn-primary"
                    v-on:click="days = Pols[0].days; startDate=Pols[0].startdate; prem = Pols[0].prem; summ = Pols[0].summ;  fran = Pols[0].fran; type = Pols[0].type; ">
                Импортировать по номеру полиса.
            </button>
            <span class="star">*</span>
            <input required id="polNumber" v-model="polNumber" name="polNumber" type="text" class="form-control">
        </div>
        <div v-if="test === 'strahovka' || test === 'all'">
            <label for="type">Вид страхования</label>
            <input id="type" v-model="type" name="type" type="text" class="form-control">
        </div>
        <div v-if="test === 'strahovka' || test === 'all'">
            <label for="createDate">Дата созддания полиса</label>
            <span class="star">*</span>
            <input required id="createDate" v-model="createDate" name="createDate" type="date" class="form-control">
        </div>
        <div>
            <label for="tel">Номер в месседжерах</label>
            <span class="star">*</span>
            <input required id="tel" v-model="tel" name="tel" type="tel" class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="country">Страна рождения</label>
            <input id="country" v-model="country" name="country" type="text" class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="citizenship">Гражданство</label>
            <input id="citizenship" v-model="citizenship" name="citizenship" type="text" class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="placeOfBirth">Место рождения</label>
            <input id="placeOfBirth" v-model="placeOfBirth" name="placeOfBirth" type="text" class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="passportDate">Дата выдачи паспорта</label>
            <input id="passportDate" v-model="passportDate" name="passportDate" type="date" class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="passportWhoGave">Кем выдан паспорт</label>
            <input id="passportWhoGave" v-model="passportWhoGave" name="passportWhoGave" type="text"
                   class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="lastVizaBeginning1">Предыдущие визы 1 начало</label>
            <input id="lastVizaBeginning1" v-model="lastVizaBeginning1" name="lastVizaBeginning1" type="text"
                   class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="lastVizaEnding1">Предыдущие визы 1 окончание</label>
            <input id="lastVizaEnding1" v-model="lastVizaEnding1" name="lastVizaEnding1" type="text"
                   class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="lastVizaBeginning2">Предыдущие визы 2 начало</label>
            <input id="lastVizaBeginning2" v-model="lastVizaBeginning2" name="lastVizaBeginning2" type="text"
                   class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="lastVizaEnding2">Предыдущие визы 2 окончание</label>
            <input id="lastVizaEnding2" v-model="lastVizaEnding2" name="lastVizaEnding2" type="text"
                   class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="lastVizaBeginning3">Предыдущие визы 3 начало</label>
            <input id="lastVizaBeginning3" v-model="lastVizaBeginning3" name="lastVizaBeginning3" type="text"
                   class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="lastVizaEnding3">Предыдущие визы 3 окончание</label>
            <input id="lastVizaEnding3" v-model="lastVizaEnding3" name="lastVizaEnding3" type="text"
                   class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="lastVizaBeginning4">Предыдущие визы 4 начало</label>
            <input id="lastVizaBeginning4" v-model="lastVizaBeginning4" name="lastVizaBeginning4" type="text"
                   class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="lastVizaEnding4">Предыдущие визы 4 окончание</label>
            <input id="lastVizaEnding4" v-model="lastVizaEnding4" name="lastVizaEnding4" type="text"
                   class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="firm">Название и адрес фирмы, которая приглашает</label>
            <button type="button" class="btn btn-sm btn-primary"
                    v-on:click="firm = Firms[0].firm; firmBody=Firms[0].firmBody; electronicNumber = Firms[0].electronicNumber">
                Импортировать по названию фирмы.
            </button>
            <input id="firm" v-model="firm" name="firm" type="text" class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="firmBody">Тел фирмы</label>
            <input id="firmBody" v-model="firmBody" name="firmBody" type="text" class="form-control">
        </div>
        <div v-if="test === 'anketa' || test === 'all'">
            <label for="electronicNumber">Электронный номер</label>
            <input id="electronicNumber" v-model="electronicNumber" name="electronicNumber" type="text"
                   class="form-control">
        </div>
    </div>


</template>

<script>

export default {

    props: [
        'test',
        'giverName',
        'giverLastName',
        'passportNumber',
        'birthday',
        'home',
        'days',
        'startdate',
        'prem',
        'summ',
        'fran',
        'polNumber',
        'type',
        'createDate',
        'tel',
        'lastNameGirl',
        'country',
        'citizenship',
        'placeOfBirth',
        'passportDate',
        'passportWhoGave',
        'lastVizaBeginning1',
        'lastVizaEnding1',
        'lastVizaBeginning2',
        'lastVizaEnding2',
        'lastVizaBeginning3',
        'lastVizaEnding3',
        'lastVizaBeginning4',
        'lastVizaEnding4',
        'firm',
        'firmBody',
        'electronicNumber'
    ],
    data() {
        return {
            passportNumber: null,
            Passports: [],
            code: '',
            test: 'all',
            Firms: [],
            Pols: []

        };
    },
    watch: {
        passportNumber(after, before) {
            this.getResults();
        },
        firm(after, before) {
            this.getResultsFirms();
        },
        polNumber(after, before) {
            this.getResultsInsurances();
        },
        birthday() {
            this.birthday = moment();
        }
    },
    methods: {
        getResults() {
            axios.get('/liveSearch', {params: {passportNumber: this.passportNumber}})
                .then(res => this.Passports = res.data)
                .catch(error => {
                });
        },
        getResultsFirms() {
            axios.get('/liveSearchFirms', {params: {firm: this.firm}})
                .then(res => this.Firms = res.data)
                .catch(error => {
                });
        },
        getResultsInsurances() {
            axios.get('/liveSearchInsurance', {params: {polNumber: this.polNumber}})
                .then(res => this.Pols = res.data)
                .catch(error => {
                });
        },

    }
}
</script>

<style scoped>
.star {
    color: red;
}
</style>
