<template>
    <div class="note">
        <h1>Редактирование заметки</h1>
        <form v-on:submit.prevent="submitForm()">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control" id="title" placeholder="Введите заголовок" v-model="note.title" />
            </div>
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" class="form-control" id="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" v-model="note.date" />
            </div>
            <div class="form-group">
                <label for="text">Текст заметки</label>
                <input type="text" class="form-control" id="text" placeholder="Текст заметки" v-model="note.text" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        mounted() {
            let id = this.$route.params.id;
            this.noteId = id;
            axios.get('/api/notes/' + id)
                .then((response) => {
                    this.note = response.data;
                });
        },
        data: function () {
            return {
                noteId: null,
                note: {
                    title: '',
                    date: '',
                    text: '',
                }
            }
        },
        methods: {
            submitForm() {
                axios.patch('/api/notes/' + this.noteId, this.note)
                    .then((response) => {
                        this.$router.push('/');
                    })
                    .catch(error => console.log(error));
            }
        }
    }
</script>

<style scoped>
    .note {
        border: 1px solid grey;
        border-radius: 10px;
        margin: 10px 0;
        padding: 10px;
    }
</style>