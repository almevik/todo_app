<template>
    <div class="note">
        <h1>Добавление заметки</h1>
        <form>
            <p v-if="errors.length">
                <b>Пожалуйста исправьте указанные ошибки:</b>
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </p>
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       placeholder="Введите заголовок"
                       required
                       v-model="note.title"/>
            </div>
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" class="form-control" id="date" name="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                       required
                       v-model="note.date"/>
            </div>
            <div class="form-group">
                <label for="text">Текст заметки</label>
                <input type="text" class="form-control" id="text" name="text" placeholder="Текст заметки"
                       v-model="note.text"/>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" @click.prevent="addNote()">Создать</button>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                errors: [],
                note: {
                    title: 'test',
                    date: '2019-01-10',
                    text: 'Заметка 1',
                }
            }
        },
        methods: {
            addNote() {
                this.errors = [];
                axios({
                        method: 'post',
                        url: '/api/notes',
                        responseType: 'json',
                        data: this.note,
                        headers: {
                            'Content-type': 'application/json; charset=UTF-8',
                        }
                    }
                )
                    .then(response => (
                            //this.note = response.data
                            this.$router.push('/')
                        )
                    )
                    // .catch(error => console.log(error));
                    .catch(error => {
                        let errors = [];
                        $.each(error.response.data, function(key, value) {
                            // list.push(key);
                            errors.push(value.field + ': ' + value.message);
                        });
                        this.errors.push(errors);
                    });

            }
        },
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